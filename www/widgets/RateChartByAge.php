<?php


namespace app\widgets;

use Yii;
use app\assets\AppAsset;
use yii\base\Widget;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\web\JqueryAsset;

class RateChartByAge extends Widget{
	
	public $view_file = 'rate-chart-by-age';
	public $view_dir = 'rate-chart-by-age';
	private $id;
	private $charts = [
		'10-year' => '10 years term',
		'15-year' => '15 years term',
		'20-year' => '20 years term',
		'30-year' => '30 years term',
		'universal' => 'Universal term',
	];
	private $template_path;
	
	public function init(){
		parent::init();
		
		if(empty($this->view_file))
			$this->view_file = 'rate-chart-by-age';
		
		if(strstr($this->view_file, '.php') !== false)
			$this->view_file = str_replace('.php', '', $this->view_file);
		
		$this->template_path = ($this->view_file == 'rate-chart-by-age')
			? sprintf('@app/views/widgets/%s.php', $this->view_file)
			: sprintf('@app/views/widgets/%s/%s.php', $this->view_dir, $this->view_file);
		
		
		$this->view->registerCssFile('@web/v2/widgets/css/rate-chart-by-age.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
		$this->view->registerJsFile('@web/v2/widgets/js/rate-chart-by-age.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
	}
	
	public function run(){
		return $this->render($this->template_path, [
			'id' => Yii::$app->getSecurity()->generateRandomString(8),
			'main_dir' => $this->view_dir,
			'view_dir' => $this->view_file,
			'charts' => $this->charts,
		]);
	}
	
}
