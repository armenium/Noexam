<?php

namespace app\components\shortcodes;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\VarDumper;

class RateCalcFormShortcode extends Widget{
	public $message;
	public $position = "center";
	public $title = "";
	public $width = "";
	public $cols = 1;
	public $autoload = 0;
	public $guessing = 0;
	public $guessing_statistic_type = "short";
	
	public function init(){
		parent::init();
		
		if($this->message === null){
			$this->message = $this->render('/main/widgets/rate-calc-form.php', [
				'position' => $this->position,
				'width' => $this->width,
				'cols' => $this->cols,
				'autoload' => $this->autoload,
				'title' => $this->title,
				'guessing' => $this->guessing,
				'guessing_statistic_type' => $this->guessing_statistic_type
			]);
		}
	}
	
	public function run(){
		return $this->message;
	}
	
	
}
