<?php

namespace app\models;

/**
 * This is the model class for table "subqestions".
 * @property integer $id
 * @property integer $parent_id
 * @property integer $reflex
 * @property string $text
 * @property string $num
 * @property string $type
 * @property string $options
 */
class Subqestions extends \yii\db\ActiveRecord{
	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'subqestions';
	}

	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['parent_id', 'reflex'], 'integer'],
			[['text'], 'string', 'max' => 1000],
			[['num'], 'string', 'max' => 2],
			[['type', 'options'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'        => 'ID',
			'parent_id' => 'Parent ID',
			'reflex'    => 'Reflex',
			'text'      => 'Text',
			'num'       => 'Num',
			'type'      => 'Type',
			'options'   => 'Options',
		];
	}
}
