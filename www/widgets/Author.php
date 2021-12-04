<?php


namespace app\widgets;

use app\assets\AppAsset;
use yii\base\Widget;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\web\JqueryAsset;

class Author extends Widget{
	
	public $db_time;
	public $file_time;
	public $updated_date;
	
	public function init(){
		parent::init();
		
		$this->db_time = strtotime($this->db_time);
		$this->updated_date = ($this->db_time > $this->file_time) ? $this->db_time : $this->file_time;
		
		$this->view->registerCssFile('@web/v2/widgets/css/author.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
	}
	
	public function run(){
		return $this->render('@app/views/widgets/author.php', [
			'updated_date' => $this->updated_date
		]);
	}
}
