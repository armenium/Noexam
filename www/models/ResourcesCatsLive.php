<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "resources_cats".
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $url
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keys
 * @property string $template
 * @property string $item_order
 * @property string $child_to_parent_links
 */
class ResourcesCatsLive extends ActiveRecord {

	public $sub_categories;

	public static function getDb() {
		return Yii::$app->get('db_live');
	}

	public function beforeSave($insert){
		if(parent::beforeSave($insert)){

			if(empty($this->item_order)){
				$this->item_order = '0';
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
		return 'resources_cats';
	}

	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['id', 'parent_id', 'item_order', 'child_to_parent_links', 'company_id'], 'integer'],
			[['title', 'meta_title', 'meta_desc', 'meta_keys', 'url', 'template'], 'string', 'max' => 255],
			//[['custom_childs_links'], 'string', 'max' => 1024],
			[['url'], 'unique'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'         => 'ID',
			'parent_id'  => 'Parent ID',
			'title'      => 'Title',
			'url'       => 'Page URL',
			'meta_title' => 'Meta-Title',
			'meta_desc'  => 'Meta-description',
			'meta_keys'  => 'Meta-Keywords',
			'template'  => 'Template file',
			'item_order'  => 'Item order',
			'child_to_parent_links'  => 'Replace the links',
			'custom_childs_links'  => 'Custom childs',
			'company_id'  => 'Company',
		];
	}

	/*public function search($params){
		$query = ResourcesCats::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort'=> ['defaultOrder' => ['item_order' => SORT_ASC, 'parent_id' => SORT_ASC]]
		]);

		VarDumper::dump($dataProvider, 10, 1);

		return $dataProvider;
	}*/

	public function search($params){
		$query = ResourcesCatsLive::find();

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
			'parent_id' => $this->parent_id,
			'item_order'    => $this->item_order,
			'child_to_parent_links'    => $this->child_to_parent_links,
		]);

		$query->
		andFilterWhere(['like', 'title', $this->title])->
		andFilterWhere(['like', 'meta_title', $this->meta_title])->
		andFilterWhere(['like', 'url', $this->url])->
		andFilterWhere(['like',	'template', $this->template]);

		return $dataProvider;
	}


	public function getCategories($parent_id = 0){
		return $this->find()->orderBy('item_order ASC', 'title ASC')->all();
	}

	public function getCatName($cat_id){
		$ret = $this->find()->where(['id' => $cat_id])->one();
		return $ret->title;
	}

	public function getCategoryDropdown(){
		#VarDumper::dump($this->parent_id, 10, 1);
		$listCategory   = $this->find()->select('id, title')
		                          ->where(['parent_id' => $this->parent_id])
		                          ->all();

		$list   = ArrayHelper::map( $listCategory,'id','title');

		return $list;
	}

	public function getCompanyName($company_id){

		$model = new ResourcesCompanies();
		$ret = $model->getCompanyName($company_id);
		#VarDumper::dump($ret);

		return $ret;
	}

}
