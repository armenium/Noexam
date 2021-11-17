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

class MyQuestionsController extends BaseController {

	public $layout = 'v2/my-quote';

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
