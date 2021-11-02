<?php


namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class CompanyRating extends Widget{
	
	public $rate;
	
	public function init(){
		parent::init();
		
	}
	
	public function run(){
		return $this->render('@app/views/widgets/company-rating.php', [
			'updated_date' => $this->updated_date
		]);
	}
}
