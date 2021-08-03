<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class AdminController extends Controller {
	
	public static $layout_class = "container";
	
	public function beforeAction($action) {
		$session = Yii::$app->session;
		$session->open();
		if (!$session->has('auth_site_admin')) {
			$this->redirect('/admin/auth/login');
			return false;
		}

		return parent::beforeAction($action);
	}

	public static function isGuest(){
		$session = Yii::$app->session;

		if(!$session->has('auth_site_admin')){
			return true;
		}

		return false;
	}

	public static function isAdmin(){
		$session = Yii::$app->session;

		if($session->has('auth_site_admin')){
			return true;
		}

		return false;
	}
	
	public static function getLayoutClass(){
		return self::$layout_class;
	}
	
}
