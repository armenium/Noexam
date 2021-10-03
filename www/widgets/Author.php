<?php


namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class Author extends Widget{
	
	public $db_time;
	public $file_time;
	public $updated_date;
	
	public function init(){
		parent::init();
		
		$this->db_time = strtotime($this->db_time);
		$this->updated_date = ($this->db_time > $this->file_time) ? $this->db_time : $this->file_time;
	}
	
	public function run(){
		return $this->render('@app/views/widgets/author.php', [
			'updated_date' => $this->updated_date
		]);
	}
}
