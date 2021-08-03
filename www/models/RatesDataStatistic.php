<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "resources".
 * @property integer $id
 * @property integer $age
 * @property integer $smoker
 * @property string $health
 * @property string $gender
 * @property string $generation
 * @property string $state
 * @property integer $coverage
 * @property integer $term
 * @property string $ins_company_name
 * @property string $ins_company_code
 * @property float $ins_monthly_price
 * @property float $ins_annual_price
 */
class RatesDataStatistic extends ActiveRecord {


	public function update($runValidation = false, $attributeNames = null){
		return parent::update($runValidation);
	}

	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'rates_data_statistic';
	}


	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['age', 'smoker', 'coverage', 'term'], 'integer'],
			[['ins_monthly_price', 'ins_annual_price'], 'double'],
			[['gender', 'generation', 'ins_company_name', 'ins_company_code', 'state', 'health'], 'string'],
			//[['age','smoker','health','gender','generation','ins_company_code','ins_monthly_price'], 'unique', 'message' => 'Entry already exists!']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'                => 'ID',
			'age'               => 'Age',
			'smoker'            => 'Smoker',
			'health'            => 'Health',
			'state'             => 'State',
			'gender'            => 'Gender',
			'generation'        => 'Generation',
			'coverage'          => 'Coverage',
			'term'              => 'Term',
			'ins_company_name'  => 'Company name',
			'ins_company_code'  => 'Company code',
			'ins_monthly_price' => 'Monthly price',
			'ins_annual_price'  => 'Annual price',
		];
	}



}
