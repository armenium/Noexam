<?php


namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\FileHelper;
use yii\helpers\VarDumper;

class CompanyRating extends Widget{
	
	public $logo_url;
	public $logo_alt;
	public $reviews;
	public $rating = 4;
	
	private $svg_template_url = "/v2/widgets/img/rating-stars-%d.svg";
	private $svg_template_file = "@app/web/v2/widgets/img/rating-stars%s.svg";
	private $stars_img = "";
	private $replacement_patterns = [
		'{CUSTOM_MASK_ID}' => '',
		'{CUSTOM_MASK_WIDTH}' => '',
	];
	private $percent = 0;
	
	public function init(){
		parent::init();
		
		$this->percent = round(100 / 5 * $this->rating, 0);
		$this->replacement_patterns['{CUSTOM_MASK_ID}'] = 'mask_'.time();
		$this->replacement_patterns['{CUSTOM_MASK_WIDTH}'] = $this->percent.'%';
		$this->prepareSvgFile();
	}
	
	public function run(){
		return $this->render('@app/views/widgets/company-rating.php', [
			'logo_url' => $this->logo_url,
			'logo_alt' => $this->logo_alt,
			'reviews' => $this->reviews,
			'stars_img' => $this->stars_img,
			'rating' => $this->rating,
		]);
	}
	
	private function prepareSvgFile(){
		$file = Yii::getAlias(sprintf($this->svg_template_file, '-'.$this->percent));
		
		if(!file_exists($file)){
			$file_content = file_get_contents(Yii::getAlias(sprintf($this->svg_template_file, '')));
			
			foreach($this->replacement_patterns as $k => $v)
				$file_content = str_replace($k, $v, $file_content);
			
			file_put_contents($file, $file_content);
		}
		
		$this->stars_img = sprintf($this->svg_template_url, $this->percent);
	}
	
	
}
