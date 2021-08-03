<?php

namespace app\models;

use app\models\ResourcesCompanies;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "resources_compare".
 * @property integer $id
 * @property integer $company1_id
 * @property integer $company2_id
 * @property string $title
 * @property string $content
 * @property integer $no_index
 * @property integer $no_follow
 */
class ResourcesCompare extends \yii\db\ActiveRecord{
	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'resources_compare';
	}

	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['id', 'company1_id', 'company2_id', 'no_index', 'no_follow'], 'integer'],
			[['content'], 'string'],
			[['title'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'          => 'ID',
			'company1_id' => 'Company 1',
			'company2_id' => 'Compant 2',
			'title'       => 'Title',
			'content'     => 'Content',
			'no_index'     => 'NoIndex',
			'no_follow'     => 'NoFollow',
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
			'company1_id' => $this->company1_id,
			'company2_id' => $this->company2_id,
			'no_index' => $this->no_index,
			'no_follow' => $this->no_follow,
		]);

		$query->
		andFilterWhere(['like', 'title', $this->title])->
		andFilterWhere(['like',	'content', $this->content]);

		return $dataProvider;
	}

	public function getCompanyName($company_id){
		$catsModel = new ResourcesCompanies();
		$ret       = $catsModel->find()->where(['id' => $company_id])->one();

		return $ret->title;
	}

}
