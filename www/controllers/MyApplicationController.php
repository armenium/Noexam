<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\CustomerData;
use app\models\Faqs;
use app\models\Questions;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Cookie;
use yii\web\Response;
use yii\widgets\ActiveForm;

class MyApplicationController extends BaseController {

	public $layout = 'v2/my-quote';

	public function beforeAction($action){
		$this->enableCsrfValidation = ($action->id !== "crl");
		
		return parent::beforeAction($action);
	}
	
	public function actionValidation(){
		if(Yii::$app->request->isAjax){
			switch(Yii::$app->request->post('CustomerData')['form_name']){
				
				case 'term':
					$scenario     = CustomerData::SCENARIO_TERM;
					break;
				case 'plan':
					$scenario     = CustomerData::SCENARIO_PI;
					break;
				case 'step-1':
					$scenario     = CustomerData::SCENARIO_PI;
					break;
				case 'pi2':
					$scenario     = CustomerData::SCENARIO_PI2;
					break;
				case 'benef':
					$scenario     = CustomerData::SCENARIO_BENEFICIARY;
					break;
				case 'payment':
					$scenario     = CustomerData::SCENARIO_PAYMENT;
					break;
				default:
					return false;
					break;
			}
			
			Yii::$app->response->format = Response::FORMAT_JSON;
			
			$model           = new CustomerData;
			$model->scenario = $scenario;
			$model->load(Yii::$app->request->post());
			
			return ActiveForm::validate($model);
		}
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
			
			$model = $this->getCustomeData('new', false);
			#VarDumper::dump($request->post('CustomerData'), 10, 1); exit;
			#VarDumper::dump($model, 10, 1); exit;
			
			switch($request->post('CustomerData')['form_name']){
				case 'step-1': #Personal Info
					$scenario     = CustomerData::SCENARIO_PI;
					$redirect_url = '/online-application-step-2/';
					break;
				case 'step-2': #Personal Info 2
					$scenario     = CustomerData::SCENARIO_PI2;
					$redirect_url = '/questions2/';
					$model->attributes = $model->decodeData();
					if($model->company_code != 'sagicor'){
						$redirect_url = '/online-application-step-3/';
					}
					break;
				case 'benef':
					if(!count($model)){
						$model = CustomerData::find()->where(['sid' => $session->id])->one();
					}
					Yii::info('Step - "benef". Planing redirect to "/paymentinfo/" page.', 'noexam' );
					$scenario     = CustomerData::SCENARIO_BENEFICIARY;
					$redirect_url = '/paymentinfo/';
					$model->attributes = $model->decodeData();
					$model->beneficiary = $request_post['CustomerData']['beneficiary'];
					$model->completed_application = 'No';
					if($model->company_code != 'sagicor'){
						$model->success = $this->generatePDFReport(25, $session->id);
						$model->completed_application = 'Yes';
						$model->status   = 'completed';
						$redirect_url = '/success/';
					}
					break;
				case 'payment':
					if(!count($model)){
						$model = CustomerData::find()->where(['sid' => $session->id])->one();
					}
					Yii::info('Step - "payment". Model: '.count($model), 'noexam');
					Yii::info('Step - "payment". Session ID: '.$session->id, 'noexam');
					Yii::info('Step - "payment". Planing redirect to "/success/" page.', 'noexam');
					$scenario     = CustomerData::SCENARIO_PAYMENT;
					$redirect_url = '/success/';
					$model->attributes = $model->decodeData();
					$model->payment = $request_post['CustomerData']['payment'];
					$model->success = $this->generatePDFReport(25);
					$model->completed_application = 'Yes';
					break;
				case 'success':
					Yii::info( 'Step - "success". All done.', 'noexam' );
					$scenario     = CustomerData::SCENARIO_SUCCESS;
					//$redirect_url = '/success/';
					break;
				case 'homeform':
					$scenario     = CustomerData::SCENARIO_APPLY_NOW_HOME;
					$redirect_url = '/'.$request->post('CustomerData')['redirect'];
					Yii::info( 'Step - "'.$request->post('CustomerData')['form_name'].'". Planing redirect to "' . $redirect_url . '".', 'noexam' );
					$status = 'new';
					$iniciator = $request->post('CustomerData')['form_name'];
					
					#VarDumper::dump($request_post, 10, 1); exit;
					$day = intval($request_post['CustomerData']['birthday']['day']);
					$month = intval($request_post['CustomerData']['birthday']['month']);
					$year = intval($request_post['CustomerData']['birthday']['year']);
					$birthday = date('d/m/Y', strtotime($day.'.'.$month.'.'.$year));
					$request_post['CustomerData']['birthday'] = $birthday;
					//VarDumper::dump($request_post, 10, 1); exit;
					
					$height_arr = explode('|', $request_post['CustomerData']['height']);
					$request_post['CustomerData']['h_foot'] = $height_arr[0];
					$request_post['CustomerData']['h_inch'] = $height_arr[1];
					unset($request_post['CustomerData']['height']);
					//VarDumper::dump($scenario);
					break;
				case 'applynow':
				case 'contentform':
					$scenario     = CustomerData::SCENARIO_APPLY_NOW;
					$redirect_url = '/'.$request->post('CustomerData')['redirect'];
					Yii::info( 'Step - "'.$request->post('CustomerData')['form_name'].'". Planing redirect to "' . $redirect_url . '".', 'noexam' );
					$status = 'new';
					$iniciator = $request->post('CustomerData')['form_name'];
					
					#VarDumper::dump($request_post, 10, 1); exit;
					$day = intval($request_post['CustomerData']['birthday']['day']);
					$month = intval($request_post['CustomerData']['birthday']['month']);
					$year = intval($request_post['CustomerData']['birthday']['year']);
					$birthday = date('d/m/Y', strtotime($day.'.'.$month.'.'.$year));
					$request_post['CustomerData']['birthday'] = $birthday;
					//VarDumper::dump($request_post, 10, 1); exit;
					
					$height_arr = explode('|', $request_post['CustomerData']['height']);
					$request_post['CustomerData']['h_foot'] = $height_arr[0];
					$request_post['CustomerData']['h_inch'] = $height_arr[1];
					unset($request_post['CustomerData']['height']);
					//VarDumper::dump($scenario);
					break;
				case 'quote-result':
					Yii::debug( 'Step - "quote-result". Planing redirect to "personalinfo".', 'noexam' );
					$scenario     = CustomerData::SCENARIO_QUOTE_RESULT;
					$redirect_url = '/personalinfo/';
					$model->attributes = $model->decodeData();
					if($request->post('CustomerData')['company_code'] != 'sagicor'){
						Yii::debug('Step - "quote-result". company_code = '.$request->post('CustomerData')['company_code'].'. Planing redirect to "intermediary-questions".', 'noexam' );
						$redirect_url = '/intermediary-questions/';
					}else{
						Yii::debug('Step - "quote-result". Planing redirect to "personalinfo".', 'noexam' );
					}
					//VarDumper::dump($redirect_url, 10, 1); exit;
					break;
				case "intermediary_questions":
					Yii::debug('Step - "intermediary-questions". Planing redirect to "personalinfo".', 'noexam' );
					$scenario     = CustomerData::SCENARIO_IMQ;
					//VarDumper::dump($scenario, 10, 1);
					$status = 'new';
					$iniciator = $request->post('CustomerData')['form_name'];
					$redirect_url = '/personalinfo/';
					break;
				default:
					Yii::debug('Requested wrong form name in post request.', 'noexam' );
					return false;
					break;
			}
			
			Yii::debug($request->post('CustomerData')['form_name'].'. Planing redirect to "'.$redirect_url.'" page.', 'noexam');
			
			if(!is_null($model)){
				
				$model->load($request_post);
				$model->scenario = $scenario;
				
				if($model->validate()){
					
					if($model->save()){
						Yii::debug('CustomerData - updated record - '.$model->id, 'noexam');
						
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
								Yii::debug('Updating lead with existing email --- '.$json_decoded['email'], 'noexam');
								// $completed = $this->getSFLeadField( $search_result[ 'id' ], 'Completed_Application__c' );
								// $completed = $completed['records'][0]['Completed_Application__c'];
								// if( 'Yes' == $completed){
								$json_decoded['Updated_Lead_to_App'] = 'Yes';
								// }
								
								//VarDumper::dump($json_decoded, 10, 1); exit;
								
								$lead_result = $this->updateSFLead($search_result['id'], $json_decoded, $item->sid);
								if($lead_result){
									Yii::debug('Lead --- '.$search_result['id'].' --- successfuly updated.', 'noexam');
								}else{
									Yii::debug('Lead --- '.$search_result['id'].' --- didn\'t updated.', 'noexam');
								}
							}else{
								$search_result = $this->searchSFLead($json_decoded, 'email');
								
								if(is_array($search_result)){
									$random_int = random_int(10000, 99999);
									preg_match_all("/^(?<user>[\w.']+)@(?<domain>[\w.']+)/", $json_decoded['email'], $email_match, PREG_SET_ORDER);
									$parsed_email = $email_match[0]['user'].'+'.$random_int.'@'.$email_match[0]['domain'];
									
									$json_decoded['email'] = $parsed_email;
									Yii::debug('Creating lead with special email --- '.$json_decoded['email'], 'noexam');
									$lead_result = $this->createSFLead($json_decoded, $item->sid);
								}else{
									Yii::debug('Creating new lead.', 'noexam');
									$lead_result = $this->createSFLead($json_decoded, $item->sid);
								}
							}
							
							if($lead_result){
								if($model->company_code == 'sagicor' && $model->scenario == CustomerData::SCENARIO_PAYMENT){
									$model->scenario = CustomerData::SCENARIO_COMPLETED;
									$model->status   = 'completed';
									if($model->save()){
										Yii::debug('Record - '.$model->id.' marked as "completed".', 'noexam');
									}
								}
							}
						}
					}else{
						Yii::debug('CustomerData - record hasn\'t updated - '.$model->id, 'noexam');
					}
				}else{
					VarDumper::dump($model->getErrors(), 10, 1);
					//VarDumper::dump($request_post, 10, 1);
					//VarDumper::dump($model, 10, 1);
				}
				
				Yii::debug('Redirecting to "'.$redirect_url.'"', 'noexam');
				
				//VarDumper::dump($redirect_url, 10, 1); exit;
				return $this->redirect([$redirect_url]);
				//header("Location:$redirect_url", true, 200);
				//return Yii::$app->getResponse()->redirect($redirect_url, 303, false);
			}else{
				
				$model = new CustomerData(['scenario' => $scenario]);
				$model->load($request_post);
				$model->sid       = $session->id;
				$model->status    = $status;
				$model->iniciator = $iniciator;
				
				if($model->validate()){
					
					if($model->save()){
						Yii::debug('CustomerData - new record is created - '.$model->id, 'noexam');
					}else{
						Yii::debug('CustomerData - new record didn\'t created.', 'noexam');
					}
					
				}
				Yii::debug('Redirecting to "'.$redirect_url.'"', 'noexam');
				
				return $this->redirect([$redirect_url]);
			}
			
		}
		
		Yii::debug('This is not POST request. Redirecting to "'.$redirect_url.'"', 'noexam');
		return $this->redirect([$redirect_url]);
	}
	
	public function actionGoback(){
		Yii::$app->response->format = Response::FORMAT_JSON;
		
		$redirect = '/start-quote/';
		
		$current_url = Yii::$app->request->post('current_url');
		$u = explode($_SERVER['HTTP_HOST'], $current_url);
		$current_uri = $u[1];
		//VarDumper::dump($current_uri);
		
		switch($current_uri){
			case "/personalinfo/":
				$redirect = "/";
				break;
			case "/personalinfo2/":
				$redirect = "/personalinfo/";
				break;
			case "/questions2/":
				$redirect = "/personalinfo2/";
				break;
			case "/beneficiary/":
				$redirect = "/questions2/";
				break;
			case "/paymentinfo/":
				$redirect = "/beneficiary/";
				break;
			default:
				$session = Yii::$app->session;
				$customer_data = CustomerData::find()->where(['sid' => $session->id])->one();
				if(!is_null($customer_data)){
					$attributes = $customer_data->decodeData();
					if(!empty($attributes['referer'])){
						if(strstr($attributes['referer'], 'apply-now') !== false){
							$redirect = '/apply-now/';
						}
					}
				}
				break;
		}
		
		return ['error' => empty($redirect) ? 1 : 0, 'redirect' => $redirect];
	}
	
	#Personal Info
	public function actionOnlineApplicationStep1(){
		$customer_data = $this->getCustomeData('new', false);

		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
		}else{
			return $this->redirect('/');
		}
		
		return $this->render('step-1', ['customer_data' => $customer_data]);
	}
	
	#Personal Info 2
	public function actionOnlineApplicationStep2(){
		$customer_data = $this->getCustomeData('new', false);
		
		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
		}else{
			return $this->redirect('/');
		}
		
		return $this->render('step-2', ['customer_data' => $customer_data]);
	}
	
	#Questions
	public function actionOnlineApplicationStep3(){
		$isMobile = Yii::$app->params['devicedetect']['isMobile'];

		$customer_data = $this->getCustomeData('new', false);
		
		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
			
			$questions    = Questions::find()->where(['type' => 'question', 'num' => '1'])->one();
			$subquestions = $questions->subquestion;
			
			if(count($subquestions)){
				$subquestions = array_chunk($subquestions, ($isMobile ? 1 : 3));
			}
		}else{
			return $this->redirect('/');
		}
		
		return $this->render('step-3', ['question' => $questions, 'subquestions' => $subquestions]);
	}
	
	#Beneficiary
	public function actionOnlineApplicationStep4(){
		$customer_data = $this->getCustomeData('new', false);
		
		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
			
			if($customer_data->step != CustomerData::SCENARIO_ADDQ && $customer_data->step != CustomerData::SCENARIO_PI2){
				if($customer_data->step == CustomerData::SCENARIO_BENEFICIARY){
				
				}else{
					return $this->redirect($this->getStepUrl($customer_data->step));
				}
			}
		}else{
			$customer_data = new CustomerData();
		}
		
		$bf_id = 1;
		
		return $this->render('step-4', ["bf_id" => $bf_id, 'customer_data' => $customer_data]);
	}
	
	#Payment Info
	public function actionOnlineApplicationStep5(){
		
		$customer_data = $this->getCustomeData('new', false);
		
		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
		}else{
			return $this->redirect('/');
		}
		
		return $this->render('step-5', ['customer_data' => $customer_data]);
	}
	
	public function actionSuccess(){
		$customer_data = $this->getCustomeData('new', true);
		
		if(!is_null($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
			$report                    = $customer_data->success;
			
			if($customer_data->step == CustomerData::SCENARIO_COMPLETED){
				Yii::info('Success page - COMPLETED', 'noexam');
			}else{
				Yii::info('Success page - redirecting to step - '.$customer_data->step, 'noexam');
			}
			
		}else{
			return $this->redirect('/');
		}
		
		return $this->render('success', ['report_data' => $report]);
	}
	
	public function actionNotEligible(){
		return $this->render('not-eligible');
	}
	
	public function actionIntermediaryQuestions(){
		$isMobile     = Yii::$app->params['devicedetect']['isMobile'];
		$session      = Yii::$app->session;
		$this->layout = 'planinformation';
		
		//$customer_data = $this->getCustomeData();
		$customer_data = CustomerData::find()->where(['sid' => $session->id])->one();
		//VarDumper::dump($customer_data, 10, true);
		if(count($customer_data)){
			$customer_data->attributes = $customer_data->decodeData();
			//if($customer_data->step != 'add-question' && $customer_data->step != 'personal-info2'){
			//return $this->redirect($this->getStepUrl($customer_data->step));
			//}
		}else{
			return $this->redirect('/');
		}
		
		$_questions = [];
		$_subquestions = [];
		
		$questions    = Questions::find()->where(['type' => 'question_nq'])->orderBy('item_order ASC')->all();
		foreach($questions as $k => $question){
			$questions[$k]->sub_questions = $question->getSubquestion()->all();
		}
		//VarDumper::dump($questions, 10, true);
		//$subquestions = $questions->subquestion;
		//VarDumper::dump($subquestions, 10, true);
		
		//VarDumper::dump($questions, 10, 1);
		
		return $this->render('intermediary', ['questions' => $questions]);
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
