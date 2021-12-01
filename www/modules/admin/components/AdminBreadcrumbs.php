<?php


namespace app\modules\admin\components;

use Yii;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\helpers\VarDumper;

class AdminBreadcrumbs extends Breadcrumbs{
	
	public static function widget($config = []){
		$html = [];
		
		$defaults = [
			'tag' => 'ol',
			'options' => ['class' => 'breadcrumb'],
			'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
			'activeItemTemplate' => '<li class="breadcrumb-item active" aria-current="page">{link}</li>',
			'homeLink' => ['label' => Yii::t('yii', 'Home'), 'url' => Yii::$app->homeUrl, 'class' => 'breadcrumb-item'],
			#'links' => $config['links'],
		];
		
		$params = array_merge($config, $defaults);
		
		$html[] = '<nav aria-label="breadcrumb">';
		$html[] = parent::widget($params);
		$html[] = '</nav>';
		
		return implode('', $html);
	}
}
