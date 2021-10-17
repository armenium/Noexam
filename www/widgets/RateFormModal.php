<?php


namespace app\widgets;

use app\models\CustomerData;
use app\models\Customers;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\VarDumper;

class RateFormModal extends Widget{
	
	public $action = null;
	private $customer_data;
	private $isMobile;
	private $from = 5;
	
	public function init(){
		parent::init();
		
		$this->isMobile = Yii::$app->params['devicedetect']['isMobile'];
		
		$this->customer_data = Customers::find()->where(['sid' => Yii::$app->session->id])->one();
		if(is_null($this->customer_data)){
			$this->customer_data = new Customers(['scenario' => Customers::SCENARIO_RATE_DATA]);
		}

		if(is_null($this->action)){
			$this->action = '/companies-filter/post-rate-flat/';
		}
		#VarDumper::dump($this->customer_data, 10, 1);
		
		if(!is_null($this->customer_data->amount)){
			$from = 0;
			$this->customer_data->amount /= 1000;
			foreach($this->customer_data::$coverage_amounts as $k => $v){
				if($k == $this->customer_data->amount){
					break;
				}
				$from++;
			}
			$this->from = $from;
		}
		
		if(is_null($this->customer_data->gender)){
			$this->customer_data->gender = 'm';
		}
		
		if(is_null($this->customer_data->term)){
			$this->customer_data->term = '15';
		}
		
		if(is_null($this->customer_data->age)){
			$this->customer_data->age = 55;
		}
		
		if(is_null($this->customer_data->health)){
			$this->customer_data->health = 'very-good';
		}
		
	}
	
	public function run(){
		return $this->render('@app/views/widgets/rate-form-modal.php', [
			'customer_data' => $this->customer_data,
			'isMobile' => $this->isMobile,
			'action' => $this->action,
			'from' => $this->from,
		]);
	}
	
}
