<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\image\drivers\Image;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;
use yii\helpers\Html;

/**
 * This is the model class for table "customer_reviews".
 * @property integer $id
 * @property string $customer_name
 * @property string $customer_avatar
 * @property string $review_title
 * @property string $review_content
 * @property integer $review_stars
 * @property integer $review_date
 */
class CustomerReviews extends ActiveRecord{

	public $preview;
	public $review_date_time;
	public $review_date_alt;
	
	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'customer_reviews';
	}

	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['customer_name', 'customer_avatar', 'review_title', 'review_content', 'review_date', 'review_date_alt'], 'string'],
			[['id', 'review_stars'], 'integer'],
			[['customer_avatar', 'review_title'], 'string', 'max' => 255],
			[['customer_name'], 'string', 'max' => 50],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'              => 'ID',
			'customer_name'   => 'Customer Name',
			'customer_avatar' => 'Customer Avatar',
			'review_title'    => 'Review Title',
			'review_content'  => 'Review Content',
			'review_date'     => 'Review Date',
			'review_stars'    => 'Review Stars',
		];
	}

	public function search($params){
		$query = self::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if(!$this->validate()){
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'id' => $this->id,
			'review_date' => $this->review_date,
		]);

		$query
			->andFilterWhere(['like', 'customer_name', $this->customer_name])
			->andFilterWhere(['like', 'review_title', $this->review_title]);

		return $dataProvider;
	}
	
	public function beforeSave($insert){
		
		if(!$insert){
			$this->saveImages($insert);
		}
		
		if(parent::beforeSave($insert)){
			if(!empty($this->review_date_alt)){
			#VarDumper::dump($this->review_date_alt); exit;
				$this->review_date = date('Y-m-d H:i:s', strtotime($this->review_date_alt));
			}
			
			return true;
		}
		
		return false;
	}
	
	public function afterSave($insert, $changedAttributes){
		parent::afterSave($insert, $changedAttributes);
		
		if($insert){
			$this->saveImages($insert);
		}
	}
	
	private function saveImages($insert){
		$dir = Yii::getAlias('@reviews_images').'/'.$this->id;
		
		if(!is_dir($dir)){
			FileHelper::createDirectory($dir, 0777);
			FileHelper::createDirectory($dir.'/thumbs', 0777);
		}
		
		if($file = UploadedFile::getInstance($this, 'preview')){
			#VarDumper::dump($file, 10, 1); exit;
			if(file_exists($dir.'/'.$this->customer_avatar) && is_file($dir.'/'.$this->customer_avatar)){
				FileHelper::unlink($dir.'/'.$this->customer_avatar);
			}
			if(file_exists($dir.'/thumbs/'.$this->customer_avatar) && is_file($dir.'/thumbs/'.$this->customer_avatar)){
				FileHelper::unlink($dir.'/thumbs/'.$this->customer_avatar);
			}
			
			$this->customer_avatar = $this->id.'_'.time().'_'.rand(137, 999).'.'.$file->extension;
			
			$file->saveAs($dir.'/'.$this->customer_avatar);
			
			foreach(Yii::$app->params['avatar_sizes'] as $name => $size){
				$image = Yii::$app->image->load($dir.'/'.$this->customer_avatar);
				$image->background('#fff', 0);
				$image->resize($size, null, Image::INVERSE);
				$image->save($dir.'/thumbs/'.str_replace('.'.$file->extension, '_'.$size.'.'.$file->extension, $this->customer_avatar), 90);
			}
		}
		
		if($insert){
			$this->save();
		}
	}
	
	public function getAvatar($size = '150'){
		$image = Yii::$app->urlManager->baseUrl.'/v2/common/images/noimage.svg';
		
		if($this->customer_avatar){
			$pathinfo = pathinfo($this->customer_avatar);
			if($size == 'full' || $size == ''){
				$file_name = $pathinfo['filename'].'.'.$pathinfo['extension'];
				$file = $this->id.'/'.$file_name;
			}else{
				$file_name = $pathinfo['filename'].'_'.$size.'.'.$pathinfo['extension'];
				$file = $this->id.'/thumbs/'.$file_name;
			}
			
			if(file_exists(Yii::getAlias('@reviews_images').'/'.$file)){
				$image = Yii::$app->urlManager->baseUrl.'/uploads/reviews/'.$file;
			}
		}
		
		return $image;
	}

	public function getFormatedAvatar(){
		$ava_image_src = $this->getAvatar();
		
		if(basename($ava_image_src) == 'noimage.svg'){
			$html = Html::tag('div', strtoupper($this->customer_name[0]), ['class' => 'reviews__author-photo ava']);
		}else{
			$html = Html::img($ava_image_src, ['class' => 'reviews__author-photo']);
		}
		
		return $html;
	}
	
	public function getFormatedDate(){
		return date('F j, Y', strtotime($this->review_date));
	}
}
