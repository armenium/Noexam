<?php
namespace app\modules\admin\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model {

	public $email;
	public $password;

	public function rules() {
		return [
			// удалим случайные пробелы для двух полей
			[['email', 'password'], 'trim'],
			// email и пароль обязательны для заполнения
			[
				['email', 'password'],
				'required',
				'message' => 'Required field'
			],
			// поле email должно быть адресом почты
			['email', 'email'],
			// пароль не может быть короче 12 символов
			[['password'], 'string', 'min' => 3],
		];
	}

	public function attributeLabels() {
		return [
			'username' => 'Email',
			'password' => 'Password',
		];
	}

	public static function login() {
		$session = Yii::$app->session;
		$session->open();
		$session->set('auth_site_admin', true);
	}

	public static function logout() {
		$session = Yii::$app->session;
		$session->open();
		if ($session->has('auth_site_admin')) {
			$session->remove('auth_site_admin');
		}
	}
}