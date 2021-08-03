<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "customers".
 * @property int $id
 * @property string $sid
 * @property string $ip
 * @property string $state
 * @property string $gender
 * @property int $age
 * @property int $byear
 * @property string $health
 * @property int $amount
 * @property int $term
 * @property string $prices
 * @property string $iniciator
 * @property string $status
 * @property int $updates
 * @property string $created_at
 * @property string $updated_at
 */
class Customers extends ActiveRecord{

	const SCENARIO_RATE_DATA = 'rate-calc-flat';

	public $form_name;

	public static $avg_amounts2 = [
		'100000',
		'200000',
		'250000',
		'300000',
		'400000',
		'500000',
		'750000',
		'1000000',
	];
	public static $term_lengths3 = [
		'10' => '10 yr',
		'15' => '15 yr',
		'20' => '20 yr',
		'30' => '30 yr',
	];
	public static $healths = [
		'excellent' => 'Excellent', // 5
		'very-good' => 'Very Good', // 4
		'good' => 'Good', // 3
		'fair' => 'Fair', // 2
		'none' => 'Fair', // 1
	];


	/**
	 * {@inheritdoc}
	 */
	public static function tableName(){
		return 'customers';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules(){
		return [
			[['sid'], 'required'],
			[['age', 'byear', 'amount', 'term', 'updates'], 'integer'],
			[['prices'], 'string'],
			[['updated_at', 'created_at'], 'safe'],
			[['sid', 'ip'], 'string', 'max' => 32],
			[['state'], 'string', 'max' => 4],
			[['gender'], 'string', 'max' => 1],
			[['health'], 'string', 'max' => 15],
			[['iniciator'], 'string', 'max' => 50],
			[['status'], 'string', 'max' => 10],
			[['sid'], 'unique'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels(){
		return [
			'id' => 'ID',
			'sid' => 'Sid',
			'ip' => 'Ip',
			'state' => 'State',
			'gender' => 'Gender',
			'age' => 'Age',
			'byear' => 'Byear',
			'health' => 'Health',
			'amount' => 'Amount',
			'term' => 'Term',
			'prices' => 'Prices',
			'iniciator' => 'Iniciator',
			'status' => 'Status',
			'updates' => 'Updates',
			'updated_at' => 'Updated At',
			'created_at' => 'Created At',
		];
	}

	public function update($runValidation = false, $attributeNames = null){
		return parent::update($runValidation);
	}

	public function beforeSave($insert){
		if(parent::beforeSave($insert)){
			return true;
		}

		return false;
	}

	public function scenarios(){
		$scenarios = parent::scenarios();
		$scenarios[self::SCENARIO_RATE_DATA] = ['sid', 'ip', 'state', 'gender', 'age', 'byear', 'health', 'amount', 'term', 'prices', 'iniciator'];

		return $scenarios;
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCustomersPrices(){
		return $this->hasMany(CustomersPrices::className(), ['customer_id' => 'id']);
	}
}
