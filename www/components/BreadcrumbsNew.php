<?php


namespace app\components;

use Yii;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\helpers\VarDumper;

class BreadcrumbsNew extends Breadcrumbs{
	
	public static function widget($config = []){
		
		$defaults = [
			'options' => ['class' => 'breadcrumbs__list'],
			'itemTemplate' => '<li class="breadcrumbs__item">{link}</li>',
			'activeItemTemplate' => '<li class="breadcrumbs__item tags active">{link}</li>',
			'homeLink' => ['label' => Yii::t('yii', 'Home'), 'url' => Yii::$app->homeUrl, 'class' => 'breadcrumbs__link tags'],
			#'links' => $config['links'],
		];
		
		$params = array_merge($config, $defaults);
		
		return parent::widget($params);
	}
}
