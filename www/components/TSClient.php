<?php

namespace app\components;

use app\models\RatesDataCache;
use yii\base\Component;
use yii\helpers\VarDumper;
use app\models\Options;
use DateTime;
use app\models\Customers;

class TSClient extends Component{

	private static $instance = null;
	private $data_source = 'TruStage';
	private $product_key = 'trustage';
	
	public $env = 'demo';
	public $channel = 'phone';
	public $demo = [];
	public $prod = [];
	public $cache_time = 86400;
	public $api_key = null;
	public $test_api_key = null;
	public $access_token = null;
	public $token_type = 'Bearer';
	public $expires_in = 1800;
	public $expires_time = 0;
	public $max_coverage = 0;

	public static function getInstance(){
		if(null === self::$instance){
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __clone(){}

	public function __construct($config = []){
		parent::__construct($config);
		
		$options = Options::find()->where(['option_name' => 'ts_access_token'])->one();
		
		if(is_null($options)){
			$this->get_access_token();
		}else{
			$option_value = json_decode($options['option_value'], true);
			foreach($option_value as $k => $v)
				$this->{$k} = $v;

			if($this->expires_time < time())
				$this->get_access_token();
		}

		#VarDumper::dump($this->expires_time, 10, 1);
	}
	
	private function get_access_token(){
		$config = $this->{$this->env};
		
		$content = http_build_query([
			'username' => $config['userName'],
			'password' => $config['password'],
			'grant_type' => 'password',
			'scope' => 'openid profile address email',
		]);
		
		$headers = [
			"X-IBM-Client-Id: ".$config['clientId']['quote_api'],
			"Content-type: application/x-www-form-urlencoded",
			"Accept: */*",
			"Cache-Control: no-cache",
		];
		
		$curl = curl_init($config['api_endpoints']['get_token']);
		
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		
		$json_response = curl_exec($curl);
		$response      = json_decode($json_response, true);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);
		
		if($status == 200){
			foreach($response as $k => $v)
				$this->{$k} = $v;
			
			$this->expires_time = $response['expires_time'] = time() + $response['expires_in'];
			
			$json_response = json_encode($response);
			
			$options = Options::find()->where(['option_name' => 'ts_access_token'])->one();
			if(is_null($options)){
				$options = new Options();
				$options->option_name = 'ts_access_token';
			}
			$options->option_value = $json_response;
			$options->save(false);
		}else{
			#VarDumper::dump($response, 10, 1);
		}
		
		return $response;
	}

	private function quote_request($params = []){
		$config = $this->{$this->env};
		
		$headers = [
			"X-IBM-Client-Id: ".$config['clientId']['quote_api'],
			"Authorization: Bearer ".$this->access_token,
			"Content-type: application/json",
			"Accept: */*",
			"Cache-Control: no-cache",
		];
		
		
		$curl = curl_init($config['api_endpoints']['get_quote']);
		
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		
		$json_response = curl_exec($curl);
		$response      = json_decode($json_response, true);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);

		return ['status' => $status, 'response' => $response];
	}
	
	private function quote_link_request($params = []){
		$config = $this->{$this->env};
		
		$headers = [
			"X-IBM-Client-Id: ".$config['clientId']['quote_api'],
			"Authorization: Bearer ".$this->access_token,
			"Content-type: application/json",
			#"Accept: */*",
			#"Cache-Control: no-cache",
		];
		
		
		$curl = curl_init($config['api_endpoints']['get_quote_link']);
		
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		
		$json_response = curl_exec($curl);
		$response      = json_decode($json_response, true);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);

		return ['status' => $status, 'response' => $response];
	}
	
	private function quote_link_request2($params = []){
		$config = $this->{$this->env};
		
		$headers = [
			"X-IBM-Client-Id: ".$config['clientId']['quote_link_api'],
			"Authorization: Bearer ".$this->access_token,
			"Content-type: application/json",
			#"Accept: */*",
			#"Cache-Control: no-cache",
		];
		
		$curl = curl_init($config['api_endpoints']['get_quote_link2']);
		
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		
		$json_response = curl_exec($curl);
		$response      = json_decode($json_response, true);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);

		return ['status' => $status, 'response' => $response];
	}
	
	public function get_quotes($args = []){
		
		#VarDumper::dump($args, 10, 1); exit;
		
		$args['avarage_amount'] = intval($args['avarage_amount']);
		$args['avarage_amount'] = ($args['avarage_amount'] > 1000 ? $args['avarage_amount'] : $args['avarage_amount'] * 1000);

		$params = [
			'state' => $args['state'],
			'birthDate' => date('Y-m-d', strtotime($args['birthdate'])),
			'gender' => $args['sex'] == 'm' ? 'male' : 'female',
			'tobaccoUse' => (intval($args['tobaco']) == 0 ? false : true),
			'channel' => $this->channel,
			'minCoverage' => ($args['avarage_amount'] > 100000) ? 100000 : $args['avarage_amount'] - 1,
			'maxCoverage' => $args['avarage_amount'],
			'postalCode' => $args['zip'],
		];
		
		$link_args = [
			#"firstName" => $args['first_name'],
			#"lastName" => $args['last_name'],
			#"email" => $args['email'],
			#"phoneNumber" => str_replace(['-', '(', ')', ' ', '+'], '', $args['phone']),
			#"streetAddress1" => "5910 Mineral Point Rd",
			#"streetAddress2" => "",
			#"city" => "Madison",
			"productCategory" => "SIT",
			"postalCode" => $params['postalCode'],
			"stateCode" => $params['state'],
			"birthDate" => $params['birthDate'],
			"gender" => $params['gender']
		];
		
		if($this->max_coverage > 0 && $this->max_coverage < $args['avarage_amount']){
			return ['plans' => []];
		}

		//return $params;

		if(!empty($_GET) && !$args['igonre_get_params']){
			$params = $_GET;
		}
		
		if(isset($params['state']) && isset($params['postalCode'])){
			#unset($params['state'], $link_args['stateCode']);
			unset($params['postalCode']);
		}
		
		#VarDumper::dump($args, 10, 1);
		#VarDumper::dump($params, 10, 1);
		
		$params_hash = md5(json_encode($params));
		#VarDumper::dump($params_hash, 10, 1); exit;

		$rates_data_cache_model = RatesDataCache::find()
			->where(['data_source' => $this->data_source])
			->andWhere(['params_hash' => $params_hash])
			//->andWhere('updated > date_sub(now(), interval 1 hour)')
			->orderBy(['updated' => 'DESC'])
			->one();
		#VarDumper::dump($rates_data_cache_model, 10, 1); exit;
		
		$data = [];
		$plans = [];
		$update = true;
		$id = null;
		if(!is_null($rates_data_cache_model)){
			$date = new DateTime();
			$tz = $date->getTimezone();
			
			$id = $rates_data_cache_model->id;
			$updated = strtotime($rates_data_cache_model->updated);
			if($updated + $this->cache_time - $tz->getOffset($date) > time()){
				$update = false;
				
				$data = [
					'status'   => $rates_data_cache_model['response_status'],
					'response' => [],
				];
				
				$data['response']['created_at'] = $rates_data_cache_model['response_created_at'];
				
				$plans = json_decode($rates_data_cache_model['response_results'], true);
				
				return ['plans' => $plans];
			}
		}
		#VarDumper::dump($id, 10, 1);

		if($update){
			$data = $this->quote_request($params);
			#VarDumper::dump($data, 10, 1); exit;
			#$data = $this->set_ratings($data);
			#$data = $this->change_logos($data);

			if(intval($data['status']) == 200){
			}else{
				#VarDumper::dump($data, 10, 1);
			}
		}
		
		if(intval($data['status']) == 200){
			$link = '';
			/*$link_args = [
				"firstName" => $args['first_name'],
				"lastName" => $args['last_name'],
				"email" => $args['email'],
				"phoneNumber" => str_replace(['-', '(', ')', ' ', '+'], '', $args['phone']),
				#"streetAddress1" => "5910 Mineral Point Rd",
				#"streetAddress2" => "",
				#"city" => "Madison",
				#"postalCode" => "53711",
				"stateCode" => $params['state'],
				"birthDate" => $params['birthDate'],
				"gender" => $params['gender']
			];
			$link_result = $this->quote_link_request($link_args);*/
			
			$link_result = $this->quote_link_request($link_args);
			#$link_result = $this->quote_link_request2($link_args);
			#VarDumper::dump($link_args, 10, 1);
			#VarDumper::dump($link_result, 10, 1);
			
			if($link_result['status'] == 200){
				if(isset($link_result['response']['quoteLink']))
					$link = $link_result['response']['quoteLink'];
				elseif(isset($link_result['response']['url']))
					$link = $link_result['response']['url'];
			}
			
			$allow_coverages = array_map(function($k){return $k * 1000;}, array_keys(Customers::$coverage_amounts));
			#VarDumper::dump($allow_coverages, 10, 1); exit;
			
			foreach($data['response']['quotes'] as $quotes){
				if(empty($quotes['errors']) && !empty($quotes['coverageOptions'])){
					foreach($quotes['coverageOptions'] as $coverageOption){
						if(in_array($coverageOption['coverage'], $allow_coverages)){
							$plans[$this->product_key][$coverageOption['coverage']]['company_code']    = $this->product_key;
							$plans[$this->product_key][$coverageOption['coverage']]['company_name']    = $this->data_source;
							$plans[$this->product_key][$coverageOption['coverage']]['product_code']    = $coverageOption['productCode'];
							$plans[$this->product_key][$coverageOption['coverage']]['product_name']    = $quotes['productCode'];
							$plans[$this->product_key][$coverageOption['coverage']]['premium_annual']  = $coverageOption['premiums'][0]['premium'];
							$plans[$this->product_key][$coverageOption['coverage']]['premium_monthly'] = $coverageOption['premiums'][1]['premium'];
							$plans[$this->product_key][$coverageOption['coverage']]['rate_class_name'] = 'Preferred';
							$plans[$this->product_key][$coverageOption['coverage']]['logo_url']        = '/img/company_logos/logo_trustage.svg';
							$plans[$this->product_key][$coverageOption['coverage']]['rating']          = 'A';
							$plans[$this->product_key][$coverageOption['coverage']]['link']            = $link;
						}
					}
				}
			}
			
			$model_request = [
				'id'                  => $id,
				'data_source'         => $this->data_source,
				'params_hash'         => $params_hash,
				'request_params'      => json_encode($params),
				'response_status'     => $data['status'],
				#'response_results_id' => $data['response']['results_id'],
				'response_results'    => json_encode($plans),
				'response_created_at' => date('Y-m-d\TH:i:s'),
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
		
		#VarDumper::dump($plans, 10, 1);
		
		return ['plans' => $plans];
	}

}
