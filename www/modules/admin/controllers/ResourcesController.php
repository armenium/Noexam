<?php

namespace app\modules\admin\controllers;

use \app\models\ResourcesCats;
use app\components\BaseController;
use app\models\Resources;
use app\models\ResourceSearch;
use app\modules\admin\controllers\AdminController;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\VarDumper;

/**
 * ResourcesController implements the CRUD actions for Resources model.
 */
class ResourcesController extends AdminController{

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
	 * Lists all Resources models.
	 * @return mixed
	 */
	public function actionIndex(){
		$searchModel  = new ResourceSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		//VarDumper::dump($_GET, 10, 1);

		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionCategory(){
		$searchModel  = new ResourceSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		/*echo 'Category<pre>';
		VarDumper::dump($_GET);
		echo '</pre>';*/

		return $this->render('category', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionLifeInsurance(){
		$searchModel  = new ResourceSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		/*echo 'Index<pre>';
		VarDumper::dump($_GET);
		echo '</pre>';*/

		return $this->render('life-insurance', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}


	/**
	 * Displays a single Resource model.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionView($id){
		return $this->render('view', ['model' => $this->findModel($id)]);
	}

	/**
	 * Creates a new Resource model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate(){
		$model = new Resource();

		if($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['view', 'id' => $model->id]);
		}else{
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Resource model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionUpdate($id){
		$model = $this->findModel($id);

		if($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['view', 'id' => $model->id]);
		}else{
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Resource model.
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
	 * Finds the Resource model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return Resource the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id){
		if(($model = Resource::findOne($id)) !== null){
			return $model;
		}else{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	public function getCatsTree(){
		$catsModel  = new ResourcesCats();
		$cats = $catsModel->getCategories(0);
		return $cats;
	}
}
