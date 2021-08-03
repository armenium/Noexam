<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "faqs".
 * @property integer $id
 * @property string $question
 * @property string $answer
 * @property string $answer_tpl
 * @property integer $item_order
 * @property string $category
 * @property string $slug
 * @property string $links_area
 * @property string $meta_title
 * @property string $meta_desc
 */
class Faqs extends ActiveRecord{

	public function beforeSave($insert){
		if(parent::beforeSave($insert)){

			if(empty($this->item_order)){
				$this->item_order = '0';
			}
			if(empty($this->category)){
				$this->category = 'anywhere';
			}

			//VarDumper::dump($this->item_order, 10, 1);

			return true;
		}

		return false;
	}


	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'faqs';
	}

	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['question', 'answer', 'slug', 'links_area', 'meta_title', 'meta_desc'], 'string'],
			[['id', 'item_order'], 'integer'],
			[['answer_tpl', 'category', 'slug', 'meta_title', 'meta_desc'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'         => 'ID',
			'question'   => 'Question',
			'answer'     => 'Answer',
			'answer_tpl' => 'Answer Tpl',
			'item_order' => 'Item Order',
			'category'   => 'Display location',
			'slug'       => 'Slug',
			'links_area' => 'Links Area',
			'meta_title' => 'Meta-title',
			'meta_desc'  => 'Meta-description',
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
			'item_order' => $this->item_order,
		]);

		$query->
		andFilterWhere(['like', 'slug', $this->slug])->
		andFilterWhere(['like', 'question', $this->question])->
		andFilterWhere(['like', 'answer', $this->answer])->
		andFilterWhere(['like', 'answer_tpl', $this->answer_tpl])->
		andFilterWhere(['like', 'category', $this->category]);

		return $dataProvider;
	}

}
