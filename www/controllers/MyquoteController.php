<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\CustomerData;
use app\models\Faqs;
use Yii;
use yii\helpers\VarDumper;

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
				case 'overall-health':
					$status = 'create';
					$model = $this->getCustomeData($status, false);
					
					$scenario     = CustomerData::SCENARIO_OVERALL_HEALTH;
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
								
								//VarDumper::dump($json_decoded, 10, 1); exit;
								
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
					//VarDumper::dump($request_post, 10, 1);
					//VarDumper::dump($model, 10, 1);
				}
				
				Yii::info('Redirecting to "'.$redirect_url.'"', 'noexam');
				
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
	
	public function actionDateOfBirth(){
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
		
		return $this->render('date-of-birth', ['customer_data' => $customer_data]);
	}
	
	
}
