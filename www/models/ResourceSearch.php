<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ResourceSearch represents the model behind the search form about `app\models\Resources`.
 */
class ResourceSearch extends Resources{
	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['id', 'published', 'category_id', 'activity'], 'integer'],
			[['content', 'title', 'slug', 'excerpt', 'label'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios(){
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params){
		$query = Resources::find();

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
			'activity'    => $this->activity,
		]);

		$query->andFilterWhere(['like', 'content', $this->content])->andFilterWhere(['like', 'title', $this->title])->andFilterWhere(['like', 'excerpt', $this->excerpt])->andFilterWhere([
				'like',
				'label',
				$this->label
			]);

		return $dataProvider;
	}
}
