<?php


namespace app\widgets;

use app\assets\AppAsset;
use app\models\CustomerData;
use Yii;
use yii\base\Widget;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\web\JqueryAsset;
use app\components\BaseController;
use yii\helpers\VarDumper;

class ApplyNowForm extends Widget{
	
	public $form = 'apply-now-form';
	public $title = 'Compare and Save. Get a Quote Today.';
	public $position = 'center';
	public $width = 'auto';
	public $display_title = true;
	private $customer_data;
	private $isMobile;
	private $days = [];
	private $months = [];
	private $years = [];
	private $wigths = [];
	
	public function init(){
		parent::init();
		
		$bc = new BaseController('BaseController', null);
		$model = $bc->getCustomeData(['create', 'new', 'completed'], false);
		if(!is_null($model)){
			$model->attributes = $model->decodeData();
			$this->customer_data = $model;
		}else{
			$this->customer_data = new CustomerData();
		}
		#VarDumper::dump($this->customer_data, 10, 1);
		
		$this->isMobile = Yii::$app->params['devicedetect']['isMobile'];
		
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
		
		$this->view->registerCssFile('@web/v2/widgets/css/apply-now-form.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
		$this->view->registerJsFile('@web/v2/widgets/js/apply-now-form.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
		
	}
	
	public function run(){
		return $this->render(sprintf('@app/views/widgets/%s.php', $this->form), [
			'title' => $this->title,
			'position' => $this->position,
			'width' => $this->width,
			'display_title' => $this->display_title,
			'customer_data' => $this->customer_data,
			'isMobile' => $this->isMobile,
			'days' => $this->days,
			'months' => $this->months,
			'years' => $this->years,
			'wigths' => $this->wigths,
		]);
	}
	
}
