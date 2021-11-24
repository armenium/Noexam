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
					$scenario     = CustomerData::SCENARIO_APP_STEP_1;
					break;
				case 'step-2':
					$scenario     = CustomerData::SCENARIO_APP_STEP_2;
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
					$scenario     = CustomerData::SCENARIO_APP_STEP_1;
					$redirect_url = '/online-application-step-2/';
					break;
				case 'step-2': #Personal Info 2
					$scenario     = CustomerData::SCENARIO_APP_STEP_2;
					$redirect_url = '/online-application-step-questions/';
					$model->attributes = $model->decodeData();
					$model->payment = $request_post['CustomerData']['payment'];
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
					#$model = CustomerData::find()->where(['sid' => $session->id])->one();
					#$scenario     = CustomerData::SCENARIO_PAYMENT;
					#$redirect_url = '/success/';
					#$model->attributes = $model->decodeData();
					#$model->payment = $request_post['CustomerData']['payment'];
					$model->success = $this->generatePDFReport(25);
					$model->completed_application = 'Yes';
					break;
				case 'success':
					Yii::info( 'Step - "success". All done.', 'noexam' );
					$scenario     = CustomerData::SCENARIO_SUCCESS;
					//$redirect_url = '/success/';
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
	public function actionOnlineApplicationStepQuestions(){
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
		
		return $this->render('step-questions', ['question' => $questions, 'subquestions' => $subquestions]);
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
	
	public function actionGetQuestions(){
		$isMobile = Yii::$app->params['devicedetect']['isMobile'];
		$request = Yii::$app->request->post();
		
		$reflexes;
		
		if(isset($request['answers']) && !empty($request['answers'])){
			foreach($request['answers'] as $key => $answer){
				$result_q[$key] = Questions::findOne(['id' => $answer['id']]);
				$result_q[$key]->q_answer = $answer['answer'];
				$condition = $result_q[$key]->getCondition($answer['answer'])->one();
				
				if($condition->spec_q){
					$result_q[$key]->spec_q = $condition->spec_q;
				}
				
				$result_q[$key]->q_answer = $answer['answer'];
				
				switch($condition->condition){
					case 'ne':
						echo 'ne';
						exit;
						break;
					case 'rtu':
						echo 'rtu';
						exit;
						break;
				}
				
				
			}
		}
		
		//if(!is_null($questions)){
			$questions = Questions::find()->where(['type' => 'question', 'num' => $request['number'] + 1])->one();
		
			if(is_null($questions)){
				return $this->redirect($this->getStepUrl(CustomerData::SCENARIO_BENEFICIARY), 200);
			}
			
			$subquestions = $questions->subquestion;
			if(!is_null($subquestions)){
				$subquestions = array_chunk($subquestions, ($isMobile ? 1 : 3));
			}
			
			return $this->renderPartial('_questions', ['question' => $questions, 'subquestions' => $subquestions]);
		//}
	}
	
	public function actionGetReflex(){
		
		$this->layout = 'questions';
		$request      = Yii::$app->request;
		$session      = Yii::$app->session;
		
		$customer_data = $this->getCustomeData('new', false);
		
		if(!is_null($customer_data)){
			return false;
		}
		$questionId     = $request->post('questionId');
		$parentId       = $request->post('parentId');
		$questionNumber = $request->post('questionNumber');
		$questionAnswer = $request->post('questionAnswer');
		
		$parent = Questions::findOne($parentId);
		
		if(!is_null($parent)){
			return false;
		}
		
		switch($parent->type){
			case 'question':
				$question = $parent->getSubquestionById($questionId)->one();
				break;
			case 'sub':
				$question = $parent->getReflexQuestionById($questionId)->one();
				break;
			case 'reflex':
				$question = $parent->getReflexQuestionById($questionId)->one();
				break;
			
			default:
				return false;
				break;
		}
		
		$customer_data->attributes = $customer_data->decodeData();
		
		if(!is_array($customer_data->questions)){
			$customer_data->questions = [];
		}
		
		$preparedQuestionsData = [
			$question->xml_num => [
				'answer' => $questionAnswer[0],
			],
		];
		
		if(!$this->arraySearchRecursive2($customer_data->questions, $parent->xml_num, $preparedQuestionsData)){
			$customer_data->questions[$parent->xml_num] = $preparedQuestionsData;
		}

		$customer_data->scenario = CustomerData::SCENARIO_ADDQ;
		$customer_data->save();
		
		if($question->getCondition($questionAnswer[0])->one()->condition != 'reflex'){
			return false;
		}
		if($question->getCondition($questionAnswer[0])->one()->spec_q){
			$reflexQuestions = Questions::find()->where(['id' => explode(',', $question->getCondition($questionAnswer[0])->one()->spec_q)])->all();
			
		}else{
			
			$reflexQuestions = $question->reflexquestion;
		}
		
		if(!$reflexQuestions){
			return false;
		}
		
		return $this->renderPartial('_reflex', ['reflex' => $reflexQuestions, 'questionNumber' => $questionNumber, 'parentQustionId' => $questionId]);
		
	}
	
}
