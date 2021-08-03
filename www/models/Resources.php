<?php

namespace app\models;

/**
 * This is the model class for table "resources".
 * @property integer $id
 * @property integer $published
 * @property integer $category_id
 * @property string $content
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property integer $activity
 * @property string $label
 */
class Resources extends \yii\db\ActiveRecord{


	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'resources';
	}

	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['published', 'category_id', 'activity'], 'integer'],
			[['content', 'excerpt'], 'string'],
			[['title'], 'string', 'max' => 255],
			[['slug'], 'string', 'max' => 255],
			[['label'], 'string', 'max' => 10],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'          => 'ID',
			'published'   => 'Published',
			'category_id' => 'Category ID',
			'content'        => 'Content',
			'title'       => 'Title',
			'slug'       => 'Slug',
			'excerpt'     => 'Excerpt',
			'activity'    => 'Activity',
			'label'       => 'Label',
		];
	}



}
