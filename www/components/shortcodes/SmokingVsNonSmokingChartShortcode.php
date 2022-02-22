<?php

namespace app\components\shortcodes;

use app\assets\AppAsset;
use yii\base\Widget;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use app\widgets\SmokingVsNonSmoking;

class SmokingVsNonSmokingChartShortcode extends Widget{
	private $config = [];
	
	public $title;
	public $subtitle;
	public $chart_width;
	public $chart_height;
	public $chart_legend_1;
	public $chart_legend_2;
	public $with_wrap_tags = 1;
	
	public function init(){
		parent::init();
		
		if(!empty($this->title))
			$this->config['title'] = $this->title;
		
		if(!empty($this->subtitle))
			$this->config['subtitle'] = $this->subtitle;
		
		if(!empty($this->chart_width))
			$this->config['chart_width'] = $this->chart_width;
		
		if(!empty($this->chart_height))
			$this->config['chart_height'] = $this->chart_height;
		
		if(!empty($this->chart_legend_1))
			$this->config['chart_legend_1'] = $this->chart_legend_1;
		
		if(!empty($this->chart_legend_2))
			$this->config['chart_legend_2'] = $this->chart_legend_2;
		
		$this->with_wrap_tags = (bool) $this->with_wrap_tags;
		
		#$this->view->registerCssFile('@web/v2/widgets/css/get-quote.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
	}
	
	public function run(){
		$result = SmokingVsNonSmoking::widget($this->config);
		
		if($this->with_wrap_tags){
			$result = '<div class="main-wrapp bg1"><div class="wrapp">'.$result.'</div></div>';
		}
		
		return $result;
	}
	
	
}
