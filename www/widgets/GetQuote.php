<?php


namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;

class GetQuote extends Widget{
	
	public $title;
	public $subtitle;
	public $button_text;
	public $button_link;
	public $left_decor = '/v2/widgets/img/get-quote-decor-left.svg';
	public $right_decor = '/v2/widgets/img/get-quote-decor-right.svg';
	
	public function init(){
		parent::init();
		
		if(empty($this->title))
			$this->title = 'Get a Quote';
		
		if(empty($this->button_text))
			$this->button_text = 'Apply Now';
		
		if(empty($this->button_link))
			$this->button_link = '/start-quote/';
		
		if(empty($this->subtitle))
			$this->subtitle = 'No phone calls or emails. Quickly compare prices with our free comparison tool.';
		
		$this->view->registerCssFile('@web/v2/widgets/css/get-quote.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
		
	}
	
	public function run(){
		return $this->render('@app/views/widgets/get-quote.php', [
			'title' => $this->title,
			'subtitle' => $this->subtitle,
			'button_text' => $this->button_text,
			'button_link' => $this->button_link,
			'left_decor' => $this->left_decor,
			'right_decor' => $this->right_decor,
		]);
	}
}
