<?php


namespace app\components;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecordInterface;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\helpers\VarDumper;

class BreadcrumbsNew extends Breadcrumbs{
	
	private static $model;
	private static $url;
	
	public static function widget($config = []){
		
		$defaults = [
			'options' => ['class' => 'breadcrumbs__list'],
			'itemTemplate' => '<li class="breadcrumbs__item">{link}</li>',
			'activeItemTemplate' => '<li class="breadcrumbs__item tags active">{link}</li>',
			'homeLink' => ['label' => Yii::t('yii', 'Home'), 'url' => Yii::$app->homeUrl, 'class' => 'breadcrumbs__link tags'],
			#'links' => $config['links'],
		];

		
		if(isset($config['links_by_url'])){
			self::$model = $config['links_by_url']['model'];
			
			if(isset($config['links_by_url']['url']))
				self::$url = $config['links_by_url']['url'];
			
			$config['links'] = self::createLinksByUrl();
			unset($config['links_by_url']);
		}

		
		$params = array_merge($config, $defaults);
		
		return parent::widget($params);
	}
	
	private static function createLinksByUrl(){
		$links = [];
		
		if(is_null(self::$url)){
			$url = trim(Yii::$app->request->url, '/');
		}else{
			$url = trim(self::$url, '/');
		}
		
		$url_fragments = explode('/', $url);
		
		$find_url = '/';
		foreach($url_fragments as $fragment){
			$find_url .= sprintf('%s/', $fragment);
			$result = self::$model::find()->select(['title', 'url'])->where(['url' => $find_url])->one();
			if($result['url'] != self::$url){
				$links[] = ['label' => $result['title'], 'url' => $result['url'], 'class' => 'breadcrumbs__link tags'];
			}else{
				$links[] = $result['title'];
			}
		}
		
		return $links;
	}
}
