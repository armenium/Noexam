<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "resources".
 * @property integer $id
 * @property string $data_source
 * @property string $params_hash
 * @property string $request_params
 * @property integer $response_status
 * @property integer $response_results_id
 * @property string $response_results
 * @property string $response_created_at
 * @property integer $updated
 * @property integer $parsed
 */
class RatesDataCache extends ActiveRecord{

	public function update($runValidation = false, $attributeNames = null){
		return parent::update($runValidation);
	}

	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'rates_data_cache';
	}


	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['id', 'response_status', 'response_results_id', 'parsed'], 'integer'],
			[['request_params', 'data_source', 'params_hash', 'response_results', 'response_created_at'], 'string'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'                  => 'ID',
			'data_source'         => 'Data source',
			'params_hash'         => 'Request params hash',
			'request_params'      => 'Request params',
			'response_status'     => 'Response status code',
			'response_results_id' => 'Response result ID',
			'response_results'    => 'Response results (JSON)',
			'response_created_at' => 'Response created at',
			'updated'             => 'Updated',
			'parsed'              => 'Parsed',
		];
	}


}
