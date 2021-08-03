<?php

namespace app\components\shortcodes;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\VarDumper;

class AuthorsSmallShortcode extends Widget{
	public $message;
	public $id = 0;
	public $model = "ResourcesCats";
	
	public function init(){
		parent::init();
		
		if($this->message === null){
			$this->normalizeModelName();
			
			$model = $this->model::findOne(['id' => $this->id]);
			
			$db_time = strtotime($model->updated);
			$file_time = filemtime(__FILE__);
			$updated_date = ($db_time > $file_time) ? $db_time : $file_time;
			
			$this->message = $this->render('/main/widgets/authors-small.php', ['updated_date' => $updated_date]);
		}
	}
	
	public function run(){
		return $this->message;
	}
	
	private function normalizeModelName(){
		if(!empty($this->model)){
			$pos = strpos($this->model, '-');
			if($pos !== -1){
				$symbol      = substr($this->model, $pos + 1, 1);
				$this->model = "app\models\\".ucfirst(str_replace('-'.$symbol, strtoupper($symbol), $this->model));
			}
		}
	}
}
