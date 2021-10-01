<?php

namespace app\controllers;

use app\components\BaseController;
use yii\helpers\VarDumper;

class PagesController extends BaseController {

	public $layout = 'v2/main';
	
	public function __construct($id, $module, $config = []){
		parent::__construct($id, $module, $config);
	}
	
	public function beforeAction($action){
		$this->enableCsrfValidation = ($action->id !== "crl");
		
		return parent::beforeAction($action);
	}


	public function actionAbout(){
		return $this->render('about', []);
	}

}
