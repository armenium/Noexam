<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "settings".
 * @property int $id
 * @property string $option_name
 * @property string $option_value
 * @property integer $created_at
 * @property integer $updated_at
 */
class Options extends ActiveRecord {
	
	public $logo;
	
	/**
	 * {@inheritdoc}
	 */
	public static function tableName(){
		return 'options';
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function rules(){
		return [
			[['created_at', 'updated_at'], 'string'],
			[['option_value'], 'string'],
			[['option_name'], 'string', 'max' => 255],
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels(){
		return [
			'id'            => 'ID',
			'option_name'  => 'Option Name',
			'option_value' => 'Option Value',
			'created_at' => 'Created at',
			'updated_at' => 'Updated at',
		];
	}

	#public static function get
	
}
