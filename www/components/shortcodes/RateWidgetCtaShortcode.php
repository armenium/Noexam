<?php

namespace app\components\shortcodes;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\VarDumper;

class RateWidgetCtaShortcode extends Widget{
	public $message;
	public $class = "";
	
	public function init(){
		parent::init();
		
		if($this->message === null){
			$this->message = $this->render('/main/widgets/rate-widget-cta.php');
		}
	}
	
	public function run(){
		return $this->message;
	}
	
	
}
