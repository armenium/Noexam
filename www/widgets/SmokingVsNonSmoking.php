<?php


namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;

class SmokingVsNonSmoking extends Widget {
	
	public $title = 'Life Insurance Rates – Smoking vs Non-Smoking Price Chart';
	public $subtitle = 'Rates are for a 20-year-term policy with a $500,000 death benefit. Rates are quoted for a 50-year-old man in excellent health.';
	public $chart_width = 760;
	public $chart_height = 760;
	public $chart_legend_1 = 'Smoking Rate Per Month';
	public $chart_legend_2 = 'Non-Smoking Rate Per Month';
	
	public function init(){
		parent::init();
		
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
