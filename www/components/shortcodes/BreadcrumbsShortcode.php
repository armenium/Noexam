<?php

namespace app\components\shortcodes;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\Breadcrumbs;

class BreadcrumbsShortcode extends Widget{
	public $message;
	public $params = [];
	
	public function init(){
		parent::init();
		
		if($this->message === null){
			$this->message = Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);
		}
	}
	
	public function run(){
		return $this->message;
	}
	
	
}
