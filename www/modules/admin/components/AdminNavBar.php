<?php

namespace app\modules\admin\components;

use Yii;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

class AdminNavBar extends NavBar{
	
	public static function widget($config = []){
		return parent::widget($params);
	}
	
	public function init(){
		$this->clientOptions = false;
		$this->options['id'] = $this->getId();
		
		if(empty($this->options['class'])){
			Html::addCssClass($this->options, ['navbar', 'navbar-default']);
		}else{
			Html::addCssClass($this->options, ['widget' => 'navbar']);
		}
		$options = $this->options;
		$tag     = ArrayHelper::remove($options, 'tag', 'nav');
		echo Html::beginTag($tag, $options);
		if($this->renderInnerContainer){
			if(!isset($this->innerContainerOptions['class'])){
				Html::addCssClass($this->innerContainerOptions, 'container');
			}
			echo Html::beginTag('div', $this->innerContainerOptions);
		}
		#echo Html::beginTag('div', ['class' => 'navbar-header']);
		if(!isset($this->containerOptions['id'])){
			$this->containerOptions['id'] = "{$this->options['id']}-collapse";
		}
		if($this->brandImage !== false){
			$this->brandLabel = Html::img($this->brandImage);
		}
		if($this->brandLabel !== false){
			Html::addCssClass($this->brandOptions, ['widget' => 'navbar-brand']);
			echo Html::a($this->brandLabel, $this->brandUrl === false ? Yii::$app->homeUrl : $this->brandUrl, $this->brandOptions);
		}
		echo $this->renderToggleButton();
		echo $this->headerContent;
		#echo Html::endTag('div');
		Html::addCssClass($this->containerOptions, ['collapse' => 'collapse', 'widget' => 'navbar-collapse']);
		$options = $this->containerOptions;
		$tag     = ArrayHelper::remove($options, 'tag', 'div');
		echo Html::beginTag($tag, $options);
		
		#parent::init();
	}
	
	protected function renderToggleButton(){
		$screenReader = "<span class=\"navbar-toggler-icon\"></span>";
		
		return Html::button("{$screenReader}", [
			'class'       => 'navbar-toggler',
			'data-toggle' => 'collapse',
			'data-target' => "#{$this->containerOptions['id']}",
		]);
	}
	
}
