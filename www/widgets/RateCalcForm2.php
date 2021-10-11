<?php


namespace app\widgets;

use app\models\CustomerData;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class RateCalcForm2 extends Widget{
	
	public $autoload = 'off'; # off | ajax | instantly
	public $autoscroll = 0;
	public $display_title = true;
	public $title = 'Compare Life Insurance Rates by Age';
	public $submit_text = 'Load Rates';

	private $customer_data;
	private $isMobile;
	private $days = [];
	private $months = [];
	private $years = [];
	private $wigths = [];
	private $quots_count = 0;
	private $default_results = '';
	
	public function init(){
		parent::init();
		
		$this->customer_data = new CustomerData(['scenario' => CustomerData::SCENARIO_RATE_CALC_TABLE]);
		$this->isMobile = Yii::$app->params['devicedetect']['isMobile'];
		
		$quots_count = Yii::$app->controller->getUsageCounterFromRateCalc();
		$this->quots_count = number_format((intval($quots_count) / 3), 0, '.', ',');
		
		if($autoload == 'instantly'){
			$this->default_results = Yii::$app->controller->getRateCalcTableDefaultResults();
		}
		
		for($i = 1; $i <= 31; $i++){
			if(strlen($i) == 1){
				$n = '0'.$i;
			}else{
				$n = $i;
			}
			$this->days[$n] = $i;
			if($i <= 12){
				$this->months[$n] = $i;
			}
		}
		
		$y = date('Y');
		
		for($i = $y; $i >= $y - 100; $i--){
			$this->years[$i] = $i;
		}
		
		for($i = 80; $i <= 400; $i++){
			$this->wigths[$i] = $i.' lbs';
		}
	}
	
	public function run(){
		return $this->render('@app/views/widgets/rate-calc-form-2.php', [
			'title' => $this->title,
			'submit_text' => $this->submit_text,
			'autoload' => $this->autoload,
			'autoscroll' => $this->autoscroll,
			'display_title' => $this->display_title,
			'customer_data' => $this->customer_data,
			'isMobile' => $this->isMobile,
			'days' => $this->days,
			'months' => $this->months,
			'years' => $this->years,
			'wigths' => $this->wigths,
			'quots_count' => $this->quots_count,
			'default_results' => $this->default_results,
		]);
	}
	
}
