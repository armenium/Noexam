<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\CustomerData;
use app\models\Faqs;
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
	
	public function actionHome(){
		$faq_items = $this->getFaqs(['homepage']);
		
		return $this->render('home', ['faq_items' => $faq_items]);
	}

	public function actionAbout(){
		return $this->render('about');
	}
	
	public function actionApplyNow(){
		$customer_data = new CustomerData();
		
		$faq_items = $this->getFaqs(['homepage']);
		
		return $this->render('applynow', ['customer_data' => $customer_data, 'display_form' => true, 'faq_items' => $faq_items]);
	}
	
	## OTHERS
	
	public function getFaqs($cats){
		$cats[] = 'anywhere';
		$cats = array_unique($cats);
		$model = Faqs::find()->where(['IN', 'category', $cats])->orderBy('item_order ASC')->all();
		
		return $model;
	}
	
}
