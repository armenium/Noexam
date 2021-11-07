<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\CustomerData;
use app\models\Faqs;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Response;

class ApplicationController extends BaseController {

	public $layout = 'v2/application';

	public function beforeAction($action){
		$this->enableCsrfValidation = ($action->id !== "crl");
		
		return parent::beforeAction($action);
	}
	
	public function actionPost(){
		
		$model = null;
		$request = Yii::$app->request;
		$session = Yii::$app->session;
		
		#VarDumper::dump([$request->post('CustomerData'), $session->id], 10, 1); exit;
		
		$redirect_url = '/';
		
		
		Yii::info( 'This is not POST request. Redirecting to "' . $redirect_url .'"', 'noexam' );
		return $this->redirect([$redirect_url]);
	}
	
	public function actionAjax(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$request = Yii::$app->request;
		$session = Yii::$app->session;
		$request_post = $request->post();
		$CustomerData = $request->post('CustomerData');
		$iniciator = $CustomerData['form_name'];
		$scenario = CustomerData::SCENARIO_SELECT_COVERAGE;
		$request_post['CustomerData']['avg_amount'] = str_replace(['k', 'm'], ['', '000'], $CustomerData['avg_amount']);
		
		$html = '';
		$error = 0;
		
		if($iniciator == 'quote-results'){
			$model = $this->getCustomeData(null, false);
			if(!is_null($model)){
				$model->load($request_post);
				$model->scenario = $scenario;
				$model->iniciator = $iniciator;
				if($model->validate()){
					if($model->save()){
						$html = $this->renderPartial('partials/quote-results-list', $this->getQuoteResults($this->getCustomeData(null, false)));
					}else{
						$error = 3;
					}
				}else{
					$error = 2;
				}
			}
		}else{
			$error = 1;
		}
		
		return ['error' => $error, 'html' => $html];
	}
	
	#STEP 1
	public function actionPersonalinfo(){
		$customer_data = $this->getCustomeData('create', false);

		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
			$customer_data->avg_amount = intval($customer_data->avg_amount);
			if($customer_data->avg_amount > 1000)
				$customer_data->avg_amount /= 1000;
		}else{
			$customer_data = new CustomerData();
			$customer_data->avg_amount = 300;
			$customer_data->term_length = '10';
			$customer_data->tobaco = '0';
		}
		
		#VarDumper::dump($customer_data->avg_amount, 10, 1);
		
		$from = 0;
		foreach($customer_data::$coverage_amounts as $k => $v){
			if($k == $customer_data->avg_amount) break;
			$from++;
		}
		
		
		return $this->render('start-quote', ['customer_data' => $customer_data, 'from' => $from]);
	}
	
	#STEP 2
	public function actionOverallHealth(){
		$customer_data = $this->getCustomeData('create', false);
		
		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
			if(empty($customer_data->health)) $customer_data->health = 'very-good';
			if(empty($customer_data->tobaco)) $customer_data->tobaco = 0;
			if(empty($customer_data->sex)) $customer_data->sex = 'm';
		}else{
			$customer_data = new CustomerData();
			$customer_data->health = 'very-good';
			$customer_data->tobaco = 0;
			$customer_data->health = 'm';
		}
		
		return $this->render('overall-health', ['customer_data' => $customer_data]);
	}
	
	#STEP 3
	public function actionDateOfBirth(){
		$customer_data = $this->getCustomeData('create', false);
		
		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
			if(!empty($customer_data->birthday)){
				$d = explode("/", $customer_data->birthday);
				$customer_data->birthday = [];
				$customer_data->birthday['day'] = $d[0];
				$customer_data->birthday['month'] = $d[1];
				$customer_data->birthday['year'] = $d[2];
			}else{
				$customer_data->birthday = [];
				$customer_data->birthday['day'] = '01';
				$customer_data->birthday['month'] = '01';
				$customer_data->birthday['year'] = 1970;
			}
		}else{
			$customer_data = new CustomerData();
			$customer_data->birthday = [];
			$customer_data->birthday['day'] = '01';
			$customer_data->birthday['month'] = '01';
			$customer_data->birthday['year'] = 1970;
		}
		
		return $this->render('date-of-birth', ['customer_data' => $customer_data]);
	}
	
	#STEP 4
	public function actionContactDetails(){
		$customer_data = $this->getCustomeData('create', false);
		
		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
		}else{
			$customer_data = new CustomerData();
		}
		
		return $this->render('contact-details', ['customer_data' => $customer_data]);
	}
	
	#STEP 5
	public function actionQuoteResults(){
		$this->layout = 'v2/myquoteresults';
		
		$customer_data = $this->getCustomeData('new', false);
		
		if(is_null($customer_data)){
			$customer_data = new CustomerData();
			$customer_data->avg_amount = 300;
			$customer_data->term_length = '10';
		}else{
			$customer_data->attributes      = $customer_data->decodeData();
			$customer_data->avg_amount = $customer_data->avg_amount > 1000 ? $customer_data->avg_amount / 1000 : $customer_data->avg_amount;
		}
		
		$from = 0;
		foreach($customer_data::$coverage_amounts as $k => $v){
			if($k == $customer_data->avg_amount) break;
			$from++;
		}
		
		$params = $this->getQuoteResults($customer_data);
		$params['from'] = $from;
		$params['faq_items'] = $this->getFaqs(['homepage']);
		
		
		return $this->render('quote-results', $params);
	}
	
	public function getQuoteResults($customer_data){
		
		$prices = [];
		$no_plans_count = 0;
		$yes_plans_count = 0;
		$total_plans_count = 0;
		$total_terms_count = 0;
		
		if(is_null($customer_data)){
			$customer_data = new CustomerData();
			$customer_data->avg_amount = 300;
			$customer_data->term_length = '10';
		}else{
			$customer_data->attributes = $customer_data->decodeData();
			$customer_data->avg_amount = $customer_data->avg_amount > 1000 ? $customer_data->avg_amount / 1000 : $customer_data->avg_amount;

			$sagicor = Yii::$app->Sagicor;
			$nq_client = Yii::$app->NQClient;
			$ts_client = Yii::$app->TSClient;
			
			$customer_data->attributes = $customer_data->decodeData();
			$age            = $this->getAge($customer_data->birthday);
			$foot           = $customer_data->h_foot;
			$inch           = $customer_data->h_inch;
			$weight         = $customer_data->weight;
			$avarage_amount = $customer_data->avg_amount.'000';
			$smoker         = isset($customer_data->tobaco) ? $customer_data->tobaco : 0;
			$sex            = $customer_data->sex;
			$zip            = $customer_data->zip;
			
			$db = $sagicor->getBirthdates($customer_data->birthday);
			$args = [
				'birthdate'      => $db[1].'/'.$db[0].'/'.$db[2],
				'sex'            => $sex,
				'avarage_amount' => $customer_data->avg_amount,
				'h_foot'         => $foot,
				'h_inch'         => $inch,
				'weight'         => $weight,
				'tobaco'         => $smoker,
				'zip'         => $zip,
				'state'          => isset($customer_data->state) ? $customer_data->state : 'AL',
				'term_length' => $customer_data->term_length,
			];
			
			#VarDumper::dump([$request->post(), $args], 10, 1); exit;
			#VarDumper::dump($customer_data->attributes, 10, 1); exit;
			
			#TruStage
			$ts_args = $args;
			$ts_args['first_name'] = $customer_data->first_name;
			$ts_args['last_name'] = $customer_data->last_name;
			$ts_args['email'] = $customer_data->email;
			$ts_args['phone'] = $customer_data->phone_number;
			$ts_prices = $ts_client->get_quotes($ts_args);
			$prices['plans']['exam_no']['trustage'] = $ts_prices['plans']['trustage'];
			
			#Sagicor
			$sg_prices = $sagicor->getSagicorPlans($args);
			$prices['plans']['exam_no']['sagicor'] = $sg_prices['plans']['sagicor'];
			$prices['plans']['exam_yes'] = [];
			
			#Ninja Quoter
			$nq_prices = $nq_client->get_quotes($args);
			
			if(intval($nq_prices['status']) == 200 && !empty($nq_prices['response']['results'])){
				foreach($nq_prices['response']['results'] as $k => $result){
					switch($result['company_code']){
						case "sagicor":
							$prices['plans']['exam_no'][$result['company_code']] = [];
							$prices['plans']['exam_no'][$result['company_code']][$result['term']] = $result;
							break;
						case "sagicor_express_issue":
							break;
						case "mutual_omaha":
							$prices['plans']['exam_yes'][$result['company_code']][$result['term']] = $result;
							break;
						case "mutual_omaha_express":
							$prices['plans']['exam_no'][$result['company_code']][$result['term']] = $result;
							break;
						case "phoenix":
							$prices['plans']['exam_no'][$result['company_code']][$result['term']] = $result;
							break;
						case "phoenix_express":
							break;
						case "protective":
							$pc = implode("_", array_slice(explode("_", $result['product_code']), 0, 3));
							switch($pc){
								case "protective_classic_choice":
									$prices['plans']['exam_yes'][$result['company_code']][$result['term']] = $result;
									break;
								case "protective_custom_choice":
									break;
							}
							break;
						case "north_american":
							break;
						case "pacific_life":
							$prices['plans']['exam_yes'][$result['company_code']][$result['term']] = $result;
							break;
						case "principal":
							break;
						case "foresters":
							break;
						case "foresters_express":
							$prices['plans']['exam_no'][$result['company_code']][$result['term']] = $result;
							break;
						case "john_hancock":
							break;
						case "american_general":
							break;
						case "assurity":
							break;
						case "transamerica_lb":
							switch($result['product_code']){
								case "transamerica_trendsetter_lb_10":
									break;
								case "transamerica_trendsetter_lb_10_all":
									break;
							}
							break;
						case "transamerica":
							break;
						case "banner":
							break;
						case "prudential":
							$prices['plans']['exam_yes'][$result['company_code']][$result['term']] = $result;
							break;
						case "lincoln_financial":
						case "lincoln_financial_express":
							break;
						case "sbli":
							break;
						case "sbli_express":
							$prices['plans']['exam_no'][$result['company_code']][$result['term']] = $result;
							break;
						case "american_national":
							break;
					}
				}
			}
			
			#VarDumper::dump($prices, 10, 1); exit;
			
			foreach($prices['plans']['exam_no'] as $company_terms){
				if(!is_null($company_terms) && is_array($company_terms)){
					$total_terms_count += count($company_terms);
					$no_plans_count += count($company_terms);
				}
			}
			foreach($prices['plans']['exam_yes'] as $company_terms){
				if(!is_null($company_terms) && is_array($company_terms)){
					$total_terms_count += count($company_terms);
					$yes_plans_count += count($company_terms);
				}
			}
			
			$total_plans_count = count($prices['plans']['exam_no']) + count($prices['plans']['exam_yes']);
			
			#VarDumper::dump($total_terms_count, 10, 1);
			
			/*$na_rates = NaRates::find()->where(['foot' => $foot, 'inch' => $inch, 'sex' => $sex])->all();
			/// Получаем Band
			$band = $this->getNaBand($avarage_amount);
			//Получаем rate в зависимости курящий или нет.
			$rate = $this->getNaRate($na_rates, $weight, $smoker);
			$na_prices = NaPrices::find()->where(['type' => $rate, 'age' => $age, 'sex' => $sex])->orderBy('term ASC')->all();
			//Получаем цены.
			$prices = $this->calculateAllPrices($na_prices, $avarage_amount, $band);*/
		}
		
	
		return [
			'customer_data' => $customer_data,
			'prices' => $prices,
			'no_plans_count' => $no_plans_count,
			'yes_plans_count' => $yes_plans_count,
			'total_plans_count' => $total_plans_count,
			'total_terms_count' => $total_terms_count,
		];
	}
	
	public function getFaqs($cats){
		$cats[] = 'anywhere';
		$cats = array_unique($cats);
		$model = Faqs::find()->where(['IN', 'category', $cats])->orderBy('item_order ASC')->all();
		
		return $model;
	}
	
}
