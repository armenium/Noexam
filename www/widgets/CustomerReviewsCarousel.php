<?php


namespace app\widgets;

use app\assets\AppAsset;
use yii\base\Widget;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\helpers\VarDumper;
use app\models\CustomerReviews;

class CustomerReviewsCarousel extends Widget{
	
	public $title = 'Customer Reviews';
	public $limit = 4;
	private $reviews = null;
	
	public function init(){
		parent::init();
		
		$this->reviews = CustomerReviews::find()->orderBy(['review_date' => 'DESC'])->limit($this->limit)->all();
		
		
		$this->view->registerCssFile('@web/v2/widgets/css/customer-reviews-carousel.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
		$this->view->registerJsFile('@web/v2/widgets/js/customer-reviews-carousel.js', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
	}
	
	public function run(){
		return $this->render('@app/views/widgets/customer-reviews-carousel', [
			'title' => $this->title,
			'reviews' => $this->reviews,
			'found' => count($this->reviews),
		]);
	}
}
