<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

/**
 * This is the model class for table "resources_grid".
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $content
 * @property string $link
 * @property string $label
 * @property string $placement
 * @property string $bgimage
 * @property string $bgcolor
 * @property string $txcolor
 * @property string $lbcolor
 */
class ResourcesGrid extends \yii\db\ActiveRecord {

	/**
	 * @var UploadedFile file attribute
	 */
	public $file;

	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'resources_grid';
	}

	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			//[['category_id', 'title'], 'required'],
			[['id', 'category_id'], 'integer'],
			[['content', 'placement', 'txcolor'], 'string'],
			[['title', 'link', 'bgimage'], 'string', 'max' => 255],
			[['label'], 'string', 'max' => 30],
			[['bgcolor', 'lbcolor'], 'string', 'max' => 7],
			//[['bgimage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'gif, jpg, png'],
			[['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'gif, jpg, jpeg, png'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'          => 'ID',
			'category_id' => 'Category ID',
			'title'       => 'Title',
			'content'     => 'Content',
			'link'        => 'Link',
			'label'       => 'Label',
			'placement'   => 'Placement',
			'bgimage'     => 'Background image',
			'file'     => 'Background image',
			'bgcolor'     => 'Background color',
			'txcolor'     => 'Text color',
			'lbcolor'     => 'Label color',
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
			'id'          => $this->id,
			'category_id' => $this->category_id,
		]);

		$query->
		andFilterWhere(['like', 'title', $this->title])->
		andFilterWhere(['like', 'link', $this->link])->
		andFilterWhere(['like', 'label', $this->label])->
		andFilterWhere(['like',	'placement', $this->placement])->
		andFilterWhere(['like',	'bgimage', $this->bgimage])->
		andFilterWhere(['like',	'bgcolor', $this->bgcolor])->
		andFilterWhere(['like',	'lbcolor', $this->lbcolor])->
		andFilterWhere(['like',	'txcolor', $this->txcolor]);

		return $dataProvider;
	}

	public function getCatName($cat_id){
		$catsModel = new ResourcesCats();
		$ret       = $catsModel->find()->where(['id' => $cat_id])->one();

		return $ret->title;
	}

	public function getGridData($cat_id = 0, $cat_url = ''){
		if(!empty($cat_url) && $cat_id == 0){
			$sql = "SELECT rg.* 
					FROM ".self::tableName()." rg 
					LEFT JOIN ".ResourcesCats::tableName()." rc 
						ON rg.category_id = rc.id 
					WHERE rc.url = :rc_url 
					ORDER BY rg.placement ASC";
			return $this->findBySql($sql, [':rc_url' => $cat_url])->all();
		}else{
			return $this->find()->where(['category_id' => $cat_id])->all();
		}
	}
}
