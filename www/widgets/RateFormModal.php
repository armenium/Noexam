<?php


namespace app\widgets;

use app\models\CustomerData;
use app\models\Customers;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class RateFormModal extends Widget{
	
	private $customer_data;
	private $isMobile;
	public $action;
	
	public function init(){
		parent::init();
		
		$this->customer_data = new CustomerData(['scenario' => Customers::SCENARIO_RATE_DATA]);
		$this->isMobile = Yii::$app->params['devicedetect']['isMobile'];
		if(is_null($this->action)){
			$this->action = '/companies-filter/post-rate-flat/';
		}
	}
	
	public function run(){
		return $this->render('@app/views/widgets/rate-form-modal.php', [
			'customer_data' => $this->customer_data,
			'isMobile' => $this->isMobile,
			'action' => $this->action,
		]);
	}
	
}
