<?php


namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class GetQuote extends Widget{
	
	public $title;
	public $subtitle;
	public $button_text;
	public $button_link;
	
	public function init(){
		parent::init();
		
		if(empty($this->title))
			$this->title = 'Get a Quote';
		
		if(empty($this->button_text))
			$this->button_text = 'apply now';
		
		if(empty($this->button_link))
			$this->button_link = '/start-quote/';
		
		if(empty($this->subtitle))
			$this->subtitle = 'No phone calls or emails. Quickly compare prices with our free comparison tool.';
	}
	
	public function run(){
		return $this->render('@app/views/widgets/get-quote.php', [
			'title' => $this->title,
			'subtitle' => $this->subtitle,
			'button_text' => $this->button_text,
			'button_link' => $this->button_link,
		]);
	}
}
