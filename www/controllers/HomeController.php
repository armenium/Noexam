<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\Faqs;
use Yii;
use yii\helpers\VarDumper;

class HomeController extends BaseController {

	public $layout = 'v2/main';

	public function beforeAction($action){
		$this->enableCsrfValidation = ($action->id !== "crl");
		
		return parent::beforeAction($action);
	}


	/**
	 * Homepage
	 * @return string|\yii\web\Response
	 */
	public function actionIndex(){
		$faq_items = $this->getFaqs(['homepage']);
		
		return $this->render('index', ['faq_items' => $faq_items]);
	}
	
	public function getFaqs($cats){
		$cats[] = 'anywhere';
		$cats = array_unique($cats);
		$model = Faqs::find()->where(['IN', 'category', $cats])->orderBy('item_order ASC')->all();
		
		return $model;
	}
	
}
