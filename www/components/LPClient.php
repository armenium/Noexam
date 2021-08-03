<?php
namespace app\components;

use app\models\RatesDataCache;
use yii\base\Component;
use yii\helpers\VarDumper;

class LPClient extends Component{

	private static $instance = null;
	private $auth_data = NULL;
	public $cache_time = 86400;
	public $api_key = null;
	public $api_key_dev = null;
	public $api_endpoint = NULL; // = https://www.ladderlife.com/api/v1
	public $premium_annual_percent = 0;

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

	/**
	 * @param $method = GET /calculator
	 * @param array $params = $_GET[args]
	 *
	 * @return array
	 */
	private function get_results($method, $params = []){
		/*$this->auth_data = array_merge([
			'token' => $this->api_key,
			//'rate_class' => 'pp',
		], $params);
		$http_params = http_build_query($this->auth_data);*/

		$content = json_encode($params);

		$url = $this->api_endpoint.'/'.$method;

		$headers = [
			'Authorization: Bearer '.$this->api_key_dev,
			'Content-type: application/json',
		];

		//VarDumper::dump($url, 10, 1);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $content);

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
			'sex' => $args['sex'],
			'date_of_birth' => date('Y-m-d', mktime(0, 0, 0, date('n'), date('j'), date('Y') - $args['age'])),
			'smoker' => $args['smoker'],
			'health_rating' => $args['health_rating'], // from 1 to 5
		];

		if(isset($args['h_foot']) && isset($args['h_inch'])){
			$params['height_inches'] = intval($args['h_foot']) * 12 + intval($args['h_inch']);
		}

		if(isset($args['weight'])){
			$params['weight_pounds'] = intval($args['weight']);
		}

		if(isset($args['zipcode'])){
			$params['zipcode'] = $args['zipcode'];
		}

		if(isset($args['state'])){
			$params['state'] = $args['state'];
		}

		#return $params;

		if(!empty($_GET) && !$args['igonre_get_params']){
			$params = $_GET;
		}

		#VarDumper::dump($args, 10, 1);
		#VarDumper::dump($params, 10, 1);
		$params_hash = md5(json_encode($params));
		#VarDumper::dump($params_hash, 10, 1);

		$rates_data_cache_model = RatesDataCache::find()
		                                        ->where(['data_source' => 'Ladder'])
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
					'quotes' => json_decode($rates_data_cache_model['response_results'], true),
				],
			];
		}
		#VarDumper::dump($id, 10, 1);

		if($update){
			$data = $this->get_results('quoter', $params);
			#VarDumper::dump($data, 10, 1);

			if(intval($data['status']) == 200){
				$data = $this->appendAdditionalFields($args, $data);
				$model_request = [
					'id'                  => $id,
					'data_source'         => 'Ladder',
					'params_hash'         => $params_hash,
					'request_params'      => json_encode($params),
					'response_status'     => $data['status'],
					'response_results_id' => $data['response']['id'],
					'response_results'    => json_encode($data['response']['quotes']),
					'response_created_at' => date('Y-m-d\TH:i:s.vP'),
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

		/*if(!empty($data)){
			$data['rate_class_name'] = '';
			$data['premium_annual']  = '';
			$data['company_code']    = '';
			$data['company_name']    = '';
			$data['product_code']    = '';
			$data['product_name']    = '';
			$data['logo_url'] = '/img/company_logos/logo_ladder.png';
		}*/


		return $data;
	}

	private function appendAdditionalFields($args, $data){
		foreach($data['response']['quotes'] as $k => $v){
			$premium_annual = $v['monthly_premium'] * 12;
			$data['response']['quotes'][$k]['monthly_price']  = $v['monthly_premium'];
			$data['response']['quotes'][$k]['premium_monthly']  = $v['monthly_premium'];
			$data['response']['quotes'][$k]['premium_annual']  = round($premium_annual - ($premium_annual * $this->premium_annual_percent / 100), 2);
			$data['response']['quotes'][$k]['rate_class_name'] = $args['health_rating'];
			$data['response']['quotes'][$k]['company_code']    = 'ladder';
			$data['response']['quotes'][$k]['company_name']    = 'Ladder';
			$data['response']['quotes'][$k]['product_code']    = 'ladder_term';
			$data['response']['quotes'][$k]['product_name']    = 'LadderTerm';
			$data['response']['quotes'][$k]['logo_url']        = '/img/company_logos/logo_ladder.png';
			$data['response']['quotes'][$k]['rating']        = 'A+';
		}

		return $data;
	}

}
