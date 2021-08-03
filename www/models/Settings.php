<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "settings".
 * @property int $id
 * @property string $setting_name
 * @property string $setting_value
 * @property string $field_type
 * @property string $field_options
 * @property int $order
 * @property int $active
 * @property integer $created_at
 * @property integer $updated_at
 */
class Settings extends ActiveRecord {
	
	public $logo;
	
	/**
	 * {@inheritdoc}
	 */
	public static function tableName(){
		return 'settings';
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function rules(){
		return [
			[['order', 'active', 'created_at', 'updated_at'], 'integer'],
			[['setting_value', 'field_options'], 'string'],
			[['setting_name', 'field_type'], 'string', 'max' => 255],
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels(){
		return [
			'id'            => 'ID',
			'setting_name'  => 'Setting Name',
			'setting_value' => 'Setting Value',
			'field_type'    => 'Field Type',
			'field_options' => 'Field Options',
			'order'         => 'Field order',
			'active'        => 'Active',
			'created_at' => 'Created at',
			'updated_at' => 'Updated at',
		];
	}

	#public static function get
	
}
