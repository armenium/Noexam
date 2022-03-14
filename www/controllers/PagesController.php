<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\CustomerData;
use app\models\Faqs;
use Yii;
use yii\helpers\VarDumper;
use yii\web\HttpException;

class PagesController extends BaseController {

	public $layout = 'v2/main';
	
	public function __construct($id, $module, $config = []){
		parent::__construct($id, $module, $config);
	}
	
	public function beforeAction($action){
		$this->enableCsrfValidation = ($action->id !== "crl");
		
		return parent::beforeAction($action);
	}

	## ACTIONS
	
	public function actionView(){
		$request = trim(Yii::$app->request->url, '/');
		$options = [];
		
		#VarDumper::dump($request, 10, 1); exit;
		
		switch($request){
			case "careers":
				return $this->redirect('/careers/getting-started-life-insurance/', 302);
				break;
			case "careers/getting-started-life-insurance":
				$view = 'careers';
				break;
			case "help":
			case "about":
			case "privacy":
			case "licenses":
			case "calculator":
			case "partnership":
			case "get-my-price":
				$view = $request;
				break;
			case "apply-now":
				$view = 'applynow';
				$customer_data = new CustomerData();
				$options = ['faq_items' => $this->getFaqs(['homepage']), 'customer_data' => $customer_data, 'display_form' => true];
				break;
			default:
				$view = 'home';
				$options = ['faq_items' => $this->getFaqs(['homepage'])];
				break;
		}
		
		return $this->render($view, $options);
	}

	/*
	public function actionHome(){
		$faq_items = $this->getFaqs(['homepage']);
		
		return $this->render('home', ['faq_items' => $faq_items]);
	}

	public function actionAbout(){
		return $this->render('about');
	}
	
	public function actionLicenses(){
		return $this->render('licenses');
	}
	
	public function actionPrivacy(){
		return $this->render('privacy');
	}
	
	public function actionCareers(){
		return $this->render('careers');
	}
	
	public function actionHelp(){
		return $this->render('help');
	}
	
	public function actionCalculator(){
		return $this->render('calculator');
	}
	
	public function actionPartnership(){
		return $this->render('partnership');
	}
	
	public function actionGetMyPrice(){
		return $this->render('get-my-price');
	}
	
	public function actionApplyNow(){
		$customer_data = new CustomerData();
		
		$faq_items = $this->getFaqs(['homepage']);
		
		return $this->render('applynow', ['customer_data' => $customer_data, 'display_form' => true, 'faq_items' => $faq_items]);
	}
	*/
	
	## OTHERS
	
	public function getFaqs($cats){
		$cats[] = 'anywhere';
		$cats = array_unique($cats);
		$model = Faqs::find()->where(['IN', 'category', $cats])->orderBy('item_order ASC')->all();
		
		return $model;
	}
	
}
