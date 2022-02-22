<?php

namespace app\components\shortcodes;

use app\assets\AppAsset;
use yii\base\Widget;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use app\widgets\GetQuote;

class GetQuoteShortcode extends Widget{
	private $config = [];
	
	public $title;
	public $subtitle;
	public $button_text;
	public $button_link;
	public $left_decor;
	public $right_decor;
	public $with_wrap_tags = 1;
	
	public function init(){
		parent::init();
		
		if(!empty($this->title))
			$this->config['title'] = $this->title;
		
		if(!empty($this->subtitle))
			$this->config['subtitle'] = $this->subtitle;
		
		if(!empty($this->button_text))
			$this->config['button_text'] = $this->button_text;
		
		if(!empty($this->button_link))
			$this->config['button_link'] = $this->button_link;
		
		if(!empty($this->left_decor))
			$this->config['left_decor'] = $this->left_decor;
		
		if(!empty($this->right_decor))
			$this->config['right_decor'] = $this->right_decor;
		
		$this->with_wrap_tags = (bool) $this->with_wrap_tags;
		
		$this->view->registerCssFile('@web/v2/widgets/css/get-quote.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
	}
	
	public function run(){
		$result = GetQuote::widget($this->config);
		
		if($this->with_wrap_tags){
			$result = '<div class="main-wrapp bg1"><div class="wrapp">'.$result.'</div></div>';
		}
		
		return $result;
	}
	
	
}
