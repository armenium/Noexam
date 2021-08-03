<?php
namespace app\components;

use app\models\RatesDataCache;
use yii\base\Component;
use yii\helpers\VarDumper;

class HLClient extends Component{

	private static $instance = null;
	private $auth_data = NULL;
	public $test_api_key = null;
	public $cache_time = 86400;
	public $api_key = null; // = API token
	public $api_endpoint = NULL; // = https://quotes.havenlife.com
	public $source = NULL; // = NOEXAM_WIDGET_CLIENT
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
	 * @param $method = GET /quote/coverage
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

		$http_params = http_build_query($params);

		$url = $this->api_endpoint.'/'.$method.'?'.$http_params;

		$headers = [
			'Content-type: application/json',
			'Authorization: Bearer '.$this->api_key,
			'Source: '.$this->source,
		];

		//VarDumper::dump($url, 10, 1);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
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
			'coverageAmount' => $args['avarage_amount'],
			'termLength' => (isset($args['term_length']) ? intval($args['term_length']) : (isset($args['term']) ? intval($args['term']) : 15)),
			'gender' => $args['sex'],
			'dateOfBirth' => date('Y-m-d', mktime(0, 0, 0, date('n'), date('j'), date('Y') - $args['age'])),
			'isSmoker' => $args['smoker'],
			'state' => $args['state'],
			//'age' => date('Y') - date('Y', strtotime($args['birthdate'])),
			'healthCategory' => $args['health_rating'],
			'productIdentifier' => 'HavenTerm',
			'includeBestCoverage' => 'false',
			'includeWaiverPremium' => 'false',
		];

		if(!empty($_GET) && !$args['igonre_get_params']){
			$params = $_GET;
		}

		#return $params;

		#VarDumper::dump($args, 10, 1);
		#VarDumper::dump($params, 10, 1);
		$params_hash = md5(json_encode($params));
		#VarDumper::dump($params_hash, 10, 1);

		$rates_data_cache_model = RatesDataCache::find()
		                                        ->where(['data_source' => 'HavenLife'])
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
			$data = $this->get_results('quote/coverage', $params);
			#VarDumper::dump($data, 10, 1);

			if(intval($data['status']) == 200){
				$data = $this->appendAdditionalFields($args, $data);
				$model_request = [
					'id'                  => $id,
					'data_source'         => 'HavenLife',
					'params_hash'         => $params_hash,
					'request_params'      => json_encode($params),
					'response_status'     => $data['status'],
					'response_results_id' => 'null',
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

		return $data;
	}

	private function appendAdditionalFields($args, $data){
		foreach($data['response']['quotes'] as $k => $v){
			$premium_annual = $v['monthlyRate'] * 12;
			$data['response']['quotes'][$k]['term']  = $v['termLength'];
			$data['response']['quotes'][$k]['monthly_price']  = $v['monthlyRate'];
			$data['response']['quotes'][$k]['premium_monthly']  = $v['monthlyRate'];
			$data['response']['quotes'][$k]['premium_annual']  = round($premium_annual - ($premium_annual * $this->premium_annual_percent / 100), 2);
			$data['response']['quotes'][$k]['rate_class_name'] = $args['health_rating'];
			$data['response']['quotes'][$k]['company_code']    = 'haven_life';
			$data['response']['quotes'][$k]['company_name']    = 'HavenLife';
			$data['response']['quotes'][$k]['product_code']    = 'haven_term';
			$data['response']['quotes'][$k]['product_name']    = 'HavenTerm';
			$data['response']['quotes'][$k]['logo_url']        = '/img/company_logos/logo_haven_life.png';
			$data['response']['quotes'][$k]['rating']        = 'A+';
		}

		return $data;
	}
}
