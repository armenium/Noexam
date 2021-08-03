<?php

namespace app\modules\admin\controllers;

use app\components\BaseController;
use app\models\ResourcesCompanies;
use app\models\ResourcesCompare;
use app\modules\admin\controllers\AdminController;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * ResourceCompareController implements the CRUD actions for ResourcesCompare model.
 */
class ResourceCompareController extends AdminController{

	public $default_pageSize = 7;
	public $pageSize_list = [7 => 7, 10 => 10, 20 => 20, 30 => 30, 40 => 40, 50 => 50, 100 => 100];

	/**
	 * @inheritdoc
	 */
	public function behaviors(){
		return [
			'verbs' => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
					'import' => ['POST'],
					'export' => ['POST'],
					'post' => ['POST'],
					'logout' => ['post'],
				],
			],
		];
	}

	public function beforeAction($action){
		$this->layout = 'main';

		return parent::beforeAction($action);
	}

	/**
	 * Lists all ResourcesCompare models.
	 * @return mixed
	 */
	public function actionIndex(){

		$pageSize = Yii::$app->request->get('per-page');

		$searchModel  = new ResourcesCompare();

		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize = $pageSize ? $pageSize : $this->default_pageSize;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'pageSize' => $pageSize,
			'pageSize_list' => $this->pageSize_list,
		]);
	}

	/**
	 * Displays a single ResourcesCompare model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id){

		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new ResourcesCompare model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate(){
		$model        = new ResourcesCompare();

		if($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['view', 'id' => $model->id]);
		}else{
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing ResourcesCompare model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionUpdate($id){
		$model        = $this->findModel($id);

		if($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['view', 'id' => $model->id]);
		}else{
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing ResourcesCompare model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionDelete($id){
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the ResourcesCompare model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return ResourcesCompare the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id){
		if(($model = ResourcesCompare::findOne($id)) !== null){
			return $model;
		}else{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	public function getCompanies(){
		$ret       = [];
		$model     = new ResourcesCompanies();
		$companies = $model->getCompanies();

		foreach($companies as $company){
			$ret[$company->id] = $company->title;
		}

		return $ret;
	}

}
