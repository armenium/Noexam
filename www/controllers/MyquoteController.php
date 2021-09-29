<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\CustomerData;
use app\models\Faqs;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Response;

class MyquoteController extends BaseController {

	public $layout = 'v2/myquote';

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
		
		if($request->isPost){
			$request_post = $request->post();
			$scenario = null;
			$CustomerData = $request->post('CustomerData');
			
			switch($CustomerData['form_name']){
				#After STEP 1
				case 'start-quote':
					$status = 'create';
					$model = $this->getCustomeData($status, false);
					
					$scenario     = CustomerData::SCENARIO_SELECT_COVERAGE;
					$redirect_url = '/'.$CustomerData['redirect'];
					Yii::info('Step - "'.$CustomerData['form_name'].'". Planing redirect to "'.$redirect_url.'".', 'noexam');
					$iniciator = $CustomerData['form_name'];
					
					$request_post['CustomerData']['avg_amount'] = str_replace(['k', 'm'], ['000', '0000'], $CustomerData['coverage_amount']);
					unset($request_post['CustomerData']['coverage_amount']);
					break;

				#After STEP 2
				case 'overall-health':
					$status = 'create';
					$model = $this->getCustomeData($status, false);
					
					$scenario     = CustomerData::SCENARIO_OVERALL_HEALTH;
					$redirect_url = '/'.$CustomerData['redirect'];
					Yii::info('Step - "'.$CustomerData['form_name'].'". Planing redirect to "'.$redirect_url.'".', 'noexam');
					$iniciator = $CustomerData['form_name'];
					break;

				#After STEP 3
				case 'date-of-birth':
					$status = 'create';
					$model = $this->getCustomeData($status, false);
					
					$scenario     = CustomerData::SCENARIO_DATE_OF_BIRTH;
					$redirect_url = '/'.$CustomerData['redirect'];
					Yii::info('Step - "'.$CustomerData['form_name'].'". Planing redirect to "'.$redirect_url.'".', 'noexam');
					$iniciator = $CustomerData['form_name'];
					
					$day = intval($CustomerData['birthday']['day']);
					$month = intval($CustomerData['birthday']['month']);
					$year = intval($CustomerData['birthday']['year']);
					$birthday = date('d/m/Y', strtotime($day.'.'.$month.'.'.$year));
					unset($request_post['CustomerData']['birthday']);
					$request_post['CustomerData']['birthday'] = $birthday;
					break;

				#After STEP 4
				case 'contact-details':
					$status = 'create';
					$model = $this->getCustomeData($status, false);
					$status = 'new';
					
					$scenario     = CustomerData::SCENARIO_CONTACT_DETAILS;
					$redirect_url = '/'.$CustomerData['redirect'];
					Yii::info('Step - "'.$CustomerData['form_name'].'". Planing redirect to "'.$redirect_url.'".', 'noexam');
					$iniciator = $CustomerData['form_name'];
					break;

				default:
					Yii::info('Requested wrong form name in post request.', 'noexam' );
					return false;
					break;
			}
			
			if(!is_null($model)){
				
				$model->load($request_post);
				$model->scenario = $scenario;
				$model->iniciator = $iniciator;
				$model->status    = $status;
				
				if($model->validate()){
					
					if($model->save()){
						Yii::info('CustomerData - updated record - '.$model->id, 'noexam');
						
						$SF_process_flag = false;
						
						if($model->company_code == 'sagicor' && $model->scenario == CustomerData::SCENARIO_PAYMENT){
							$SF_process_flag = true;
						}elseif($model->company_code != 'sagicor'){
							$SF_process_flag = true;
						}
						
						if($SF_process_flag){
							$json_decoded  = json_decode($model->data, true);
							$search_result = $this->searchSFLead($json_decoded);
							
							if(is_array($search_result)){
								Yii::info('Updating lead with existing email --- '.$json_decoded['email'], 'noexam');
								// $completed = $this->getSFLeadField( $search_result[ 'id' ], 'Completed_Application__c' );
								// $completed = $completed['records'][0]['Completed_Application__c'];
								// if( 'Yes' == $completed){
								$json_decoded['Updated_Lead_to_App'] = 'Yes';
								// }
								
								$lead_result = $this->updateSFLead($search_result['id'], $json_decoded, $item->sid);
								if($lead_result){
									Yii::info('Lead --- '.$search_result['id'].' --- successfuly updated.', 'noexam');
								}else{
									Yii::info('Lead --- '.$search_result['id'].' --- didn\'t updated.', 'noexam');
								}
							}else{
								$search_result = $this->searchSFLead($json_decoded, 'email');
								
								if(is_array($search_result)){
									$random_int = random_int(10000, 99999);
									preg_match_all("/^(?<user>[\w.']+)@(?<domain>[\w.']+)/", $json_decoded['email'], $email_match, PREG_SET_ORDER);
									$parsed_email = $email_match[0]['user'].'+'.$random_int.'@'.$email_match[0]['domain'];
									
									$json_decoded['email'] = $parsed_email;
									Yii::info('Creating lead with special email --- '.$json_decoded['email'], 'noexam');
									$lead_result = $this->createSFLead($json_decoded, $item->sid);
								}else{
									Yii::info('Creating new lead.', 'noexam');
									$lead_result = $this->createSFLead($json_decoded, $item->sid);
								}
							}
							
							if($lead_result){
								if($model->company_code == 'sagicor' && $model->scenario == CustomerData::SCENARIO_PAYMENT){
									$model->scenario = CustomerData::SCENARIO_COMPLETED;
									$model->status   = 'completed';
									if($model->save()){
										Yii::info('Record - '.$model->id.' marked as "completed".', 'noexam');
									}
								}
							}
						}
					}else{
						Yii::info('CustomerData - record hasn\'t updated - '.$model->id, 'noexam');
					}
				}else{
					VarDumper::dump($model->getErrors(), 10, 1);
				}
				
				Yii::info('Redirecting to "'.$redirect_url.'"', 'noexam');
				
				return $this->redirect([$redirect_url]);
			}else{
				$model = new CustomerData(['scenario' => $scenario]);
				$model->load($request_post);
				$model->sid       = $session->id;
				$model->status    = $status;
				$model->iniciator = $iniciator;
				
				if($model->validate()){
					if($model->save()){
						Yii::info('CustomerData - new record is created - '.$model->id, 'noexam');
					}else{
						Yii::info('CustomerData - new record didn\'t created.', 'noexam');
					}
				}
				
				Yii::info('Redirecting to "'.$redirect_url.'"', 'noexam');
				
				return $this->redirect([$redirect_url]);
			}
		}
		
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
		$request_post['CustomerData']['avg_amount'] = str_replace(['k', 'm'], ['000', '0000'], $CustomerData['coverage_amount']);
		unset($request_post['CustomerData']['coverage_amount']);
		
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
						$html = $this->renderPartial('partials/quote-results-list', $this->getQuoteResults($model));
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
	public function actionStartQuote(){
		$customer_data = $this->getCustomeData('create', false);

		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
			$customer_data->coverage_amount = $customer_data->avg_amount / 1000;
		}else{
			$customer_data = new CustomerData();
			$customer_data->coverage_amount = 300;
			$customer_data->term_length = '10';
			$customer_data->tobaco = '0';
		}
		
		$from = 0;
		foreach($customer_data::$avg_amounts4 as $k => $v){
			if($k == $customer_data->coverage_amount) break;
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
		
		$display_form = false;
		$prices = [];
		$no_plans_count = 0;
		$yes_plans_count = 0;
		$total_plans_count = 0;
		$total_terms_count = 0;
		
		if(is_null($customer_data)){
			$display_form = true;
			$customer_data = new CustomerData();
			$customer_data->coverage_amount = 300;
			$customer_data->term_length = '10';
		}else{
			$customer_data->attributes = $customer_data->decodeData();
			$customer_data->coverage_amount = $customer_data->avg_amount / 1000;

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
			
			$db = $sagicor->getBirthdates($customer_data->birthday);
			$args = [
				'birthdate'      => $db[1].'/'.$db[0].'/'.$db[2],
				'sex'            => $sex,
				'avarage_amount' => $customer_data->avg_amount,
				'h_foot'         => $foot,
				'h_inch'         => $inch,
				'weight'         => $weight,
				'tobaco'         => $smoker,
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
		
		$from = 0;
		foreach($customer_data::$avg_amounts4 as $k => $v){
			if($k == $customer_data->coverage_amount) break;
			$from++;
		}
		
		$params = $this->getQuoteResults($customer_data);
		$params['display_form'] = $display_form;
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
			$customer_data->coverage_amount = 300;
			$customer_data->term_length = '10';
		}else{
			$customer_data->attributes = $customer_data->decodeData();
			$customer_data->coverage_amount = $customer_data->avg_amount / 1000;

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
			
			$db = $sagicor->getBirthdates($customer_data->birthday);
			$args = [
				'birthdate'      => $db[1].'/'.$db[0].'/'.$db[2],
				'sex'            => $sex,
				'avarage_amount' => $customer_data->avg_amount,
				'h_foot'         => $foot,
				'h_inch'         => $inch,
				'weight'         => $weight,
				'tobaco'         => $smoker,
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
