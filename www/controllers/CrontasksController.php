<?php


namespace app\controllers;

use app\models\RatesDataCache;
use app\models\RatesDataStatistic;
use app\models\CustomerData;
use Yii;
use yii\console\Controller;
use yii\helpers\VarDumper;
use app\components\BaseController;

class CrontasksController extends BaseController {


	public function actionInit(){
		Yii::info('Cron - actionInit', 'cron');

	}

	public function actionIndex(){
		Yii::info('Cron - actionIndex', 'cron');

		#return '000';
	}

	public function actionParseRatesData(){
		#Yii::info('Cron - actionParseRatesData', 'cron');

		#$this->parseRatesData();
		$this->removeOlderRateCalcEntries();
		
		return 'done';
	}

}