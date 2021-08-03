<?php
/**
 * API Documentation
 * https://docs.google.com/document/d/1M8MxWmfgtpy34yUjzIspA-DMUEyHZcPCLZ9-QkSROp4/edit#
 */

namespace app\components;

use app\models\RatesDataCache;
use yii\base\Component;
use yii\helpers\VarDumper;

class NQClient extends Component{

	private static $instance = null;
	private $auth_data = NULL;
	public $cache_time = 86400;
	public $api_key = null;
	public $test_api_key = null;
	public $api_endpoint = NULL;

	public static function getInstance(){
		if(null === self::$instance){
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __clone(){}

	public function __construct($config = []){
		parent::__construct($config);
	}

	private function get_results($method, $params = []){
		$this->auth_data = array_merge([
			'key' => $this->api_key,
			'rate_class' => 'pp',
		], $params);

		$http_params = http_build_query($this->auth_data);

		$url = $this->api_endpoint.'/'.$method.'?'.$http_params;
		#VarDumper::dump($url, 10, 1);
		#VarDumper::dump(base64_encode($this->api_key), 10, 1);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Basic ".base64_encode($this->api_key)));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);

		$result = curl_exec($ch);
		$response = json_decode($result, true);
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);

		return ['status' => $status, 'response' => $response];


	}

	public function get_quotes($args = []){

		$args['avarage_amount'] = intval($args['avarage_amount']);
		$args['avarage_amount'] = ($args['avarage_amount'] > 1000 ? $args['avarage_amount'] : $args['avarage_amount'] * 1000);

		$params = [
			'coverage' => $args['avarage_amount'],
			'term' => (isset($args['term_length']) ? intval($args['term_length']) : (isset($args['term']) ? intval($args['term']) : 15)),
			'gender' => $args['sex'],
			'birthdate' => date('Y-m-d', strtotime($args['birthdate'])),
			'smoker' => (intval($args['tobaco']) == 0 ? 'false' : 'true'),
			'rate_class' => !empty($args['rate_class']) ? $args['rate_class'] : 'pp',
			'state' => $args['state'],
		];

		if(isset($args['h_foot']) && isset($args['h_inch'])){
			$params['height'] = intval($args['h_foot']) * 12 + intval($args['h_inch']);
		}

		if(isset($args['weight'])){
			$params['weight'] = intval($args['weight']);
		}

		//return $params;

		if(!empty($_GET) && !$args['igonre_get_params']){
			$params = $_GET;
		}

		#VarDumper::dump($args, 10, 1);
		#VarDumper::dump($params, 10, 1);
		$params_hash = md5(json_encode($params));
		#VarDumper::dump($params_hash, 10, 1);

		$rates_data_cache_model = RatesDataCache::find()
												->where(['data_source' => 'NinjaQuoter'])
		                                        ->andWhere(['params_hash' => $params_hash])
		                                        //->andWhere('updated > date_sub(now(), interval 1 hour)')
												->orderBy(['updated' => 'DESC'])
		                                        ->one();
		#VarDumper::dump($rates_data_cache_model, 10, 1);

		$data = [];
		$update = true;
		$id = null;
		if(!is_null($rates_data_cache_model)){
			$id = $rates_data_cache_model->id;
			$updated = strtotime($rates_data_cache_model->updated);
			if($updated + $this->cache_time > time()){
				$update = false;
			}

			$data = [
				'status' => $rates_data_cache_model['response_status'],
				'response' => [
					'created_at' => $rates_data_cache_model['response_created_at'],
					'results_id' => $rates_data_cache_model['response_results_id'],
					'results' => json_decode($rates_data_cache_model['response_results'], true),
				],
			];
		}
		#VarDumper::dump($id, 10, 1);

		if($update){
			$data = $this->get_results('api/quoter/quotes', $params);
			#VarDumper::dump($data, 10, 1);
			$data = $this->set_ratings($data);
			$data = $this->change_logos($data);

			if(intval($data['status']) == 200){
				$model_request = [
					'id'                  => $id,
					'data_source'         => 'NinjaQuoter',
					'params_hash'         => $params_hash,
					'request_params'      => json_encode($params),
					'response_status'     => $data['status'],
					'response_results_id' => $data['response']['results_id'],
					'response_results'    => json_encode($data['response']['results']),
					'response_created_at' => $data['response']['created_at'],
					'parsed' => 0
				];

				if(is_null($id)){
					$rates_data_cache_model = new RatesDataCache($model_request);
					$rates_data_cache_model->save(false);
				}else{
					$rates_data_cache_model->attributes = $model_request;
					$rates_data_cache_model->save(false);
				}
			}
		}

		return $data;
	}

	public function change_logos($data){
		$logos_path = '/img/company_logos/%s.png';
		if(intval($data['status']) == 200 && !empty($data['response']['results'])){
			foreach($data['response']['results'] as $k => $result){
				switch($result['company_code']){
					case "sagicor":
					case "sagicor_express_issue":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_sagicor');
						break;
					case "mutual_omaha":
					case "mutual_omaha_express":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_mutual_omaha');
						break;
					case "phoenix":
					case "phoenix_express":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_phoenix');
						break;
					case "protective":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_protective');
						break;
					case "north_american":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_north_american');
						break;
					case "pacific_life":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_pacific');
						break;
					case "principal":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_principal');
						break;
					case "foresters":
					case "foresters_express":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_foresters');
						break;
					case "john_hancock":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_john_hancock');
						break;
					case "american_general":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_aig');
						break;
					case "assurity":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_assurity');
						break;
					case "transamerica_lb":
					case "transamerica":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_transamerica');
						break;
					case "banner":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_banner');
						break;
					case "prudential":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_prudential');
						break;
					case "lincoln_financial":
					case "lincoln_financial_express":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_lincoln_national');
						break;
					case "sbli":
					case "sbli_express":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_sbli');
						break;
					case "american_national":
						$data['response']['results'][$k]['logo_url'] = sprintf($logos_path, 'logo_american_national');
						break;
				}
			}
		}

		return $data;
	}

	public function set_ratings($data){
		if(intval($data['status']) == 200 && !empty($data['response']['results'])){
			foreach($data['response']['results'] as $k => $result){
				switch($result['company_code']){
					case "sagicor":
					case "sagicor_express_issue":
						$data['response']['results'][$k]['rating'] = 'A-';
						break;
					case "mutual_omaha":
					case "mutual_omaha_express":
						$data['response']['results'][$k]['rating'] = 'A+';
						break;
					case "phoenix":
					case "phoenix_express":
						$data['response']['results'][$k]['rating'] = 'B';
						break;
					case "protective":
						$data['response']['results'][$k]['rating'] = 'A+';
						break;
					case "north_american":
						$data['response']['results'][$k]['rating'] = 'A+';
						break;
					case "pacific_life":
						$data['response']['results'][$k]['rating'] = 'A+';
						break;
					case "principal":
						$data['response']['results'][$k]['rating'] = 'A+';
						break;
					case "foresters":
					case "foresters_express":
						$data['response']['results'][$k]['rating'] = 'A';
						break;
					case "john_hancock":
						$data['response']['results'][$k]['rating'] = 'A+';
						break;
					case "american_general":
						$data['response']['results'][$k]['rating'] = 'A';
						break;
					case "assurity":
						$data['response']['results'][$k]['rating'] = 'A-';
						break;
					case "transamerica_lb":
					case "transamerica":
						$data['response']['results'][$k]['rating'] = 'A+';
						break;
					case "banner":
						$data['response']['results'][$k]['rating'] = 'A+';
						break;
					case "prudential":
						$data['response']['results'][$k]['rating'] = 'A+';
						break;
					case "lincoln_financial":
					case "lincoln_financial_express":
						$data['response']['results'][$k]['rating'] = 'A+';
						break;
					case "sbli":
					case "sbli_express":
						$data['response']['results'][$k]['rating'] = 'A';
						break;
					case "american_national":
						$data['response']['results'][$k]['rating'] = 'A';
						break;
				}
			}
		}

		return $data;
	}
}
