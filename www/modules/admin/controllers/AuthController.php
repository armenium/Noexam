<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\LoginForm;
use Yii;
use yii\web\Controller;
use yii\helpers\VarDumper;

class AuthController extends Controller{
	
	public function beforeAction($action){

		$ip = $_SERVER['REMOTE_ADDR'];
		if($ip == '127.0.0.1'){
			$ip = $_SERVER['HTTP_X_REAL_IP'];
		}
		$adminAllowedIPs = Yii::$app->params['adminAllowedIPs'];
		
		#VarDumper::dump($adminAllowedIPs, 10, 1);
		
		if(!in_array($ip, $adminAllowedIPs)){
			$this->redirect('/');
			return false;
		}
		
		return parent::beforeAction($action);
	}
	
	public function actionLogin(){
		$model = new LoginForm();
		/*
		 * Если пришли post-данные, загружаем их в модель...
		 */
		if($model->load(Yii::$app->request->post())){
			// ...и проверяем эти данные
			if($model->validate()){
				// данные корректные, пробуем авторизовать
				if(Yii::$app->params['adminEmail'] == $model->email && Yii::$app->params['adminPassword'] == $model->password){
					LoginForm::login();

					return $this->redirect('/admin/');
				}else{
					return $this->refresh();
				}
			}
		}

		return $this->render('login', ['model' => $model]);;
	}

	public function actionLogout(){
		LoginForm::logout();

		return $this->redirect('/admin/auth/login');
	}
}