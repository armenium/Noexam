<?php


namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;

class SmokingVsNonSmoking extends Widget {
	
	public $title = 'Life Insurance Rates – Smoking vs Non-Smoking Price Chart';
	public $subtitle = 'Rates are for a 20-year-term policy with a $500,000 death benefit. Rates are quoted for a 50-year-old man in excellent health.';
	public $chart_width = 760;
	public $chart_height = 400;
	public $chart_legend_1 = 'Smoking Rate Per Month';
	public $chart_legend_2 = 'Non-Smoking Rate Per Month';
	
	public function init(){
		parent::init();
		
		$this->view->registerCssFile('@web/v2/plugins/css/chart.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
		$this->view->registerCssFile('@web/v2/widgets/css/smoking-vs-nonsmoking.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

		$this->view->registerJsFile('@web/v2/plugins/js/chart.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
		$this->view->registerJsFile('@web/v2/widgets/js/smoking-vs-nonsmoking.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
		
	}
	
	public function run(){
		return $this->render('@app/views/widgets/smoking-vs-nonsmoking.php', [
			'title' => $this->title,
			'subtitle' => $this->subtitle,
			'chart_width' => $this->chart_width,
			'chart_height' => $this->chart_height,
			'chart_legend_1' => $this->chart_legend_1,
			'chart_legend_2' => $this->chart_legend_2,
		]);
	}
}
