<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\ResourcesCats;
use app\models\ResourcesGrid;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ResourceGridController implements the CRUD actions for ResourcesGrid model.
 */
class ResourceGridController extends BaseController{
	/**
	 * @inheritdoc
	 */
	public function behaviors(){
		return [
			'verbs' => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all ResourcesGrid models.
	 * @return mixed
	 */
	public function actionIndex(){
		$this->layout = 'admin';
		$dataProvider = new ActiveDataProvider([
			'query' => ResourcesGrid::find(),
		]);

		$catsModel = new ResourcesCats();

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'catsModel'    => $catsModel,
		]);
	}

	/**
	 * Displays a single ResourcesGrid model.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionView($id){
		$this->layout = 'admin';
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new ResourcesGrid model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate(){
		$this->layout = 'admin';
		$model        = new ResourcesGrid();
		$old_image = $model->bgimage;

		if($model->load(Yii::$app->request->post())){
			$model->bgimage = $this->doUpload($old_image);
			$model->save();
			return $this->redirect(['view', 'id' => $model->id]);
		}else{
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing ResourcesGrid model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionUpdate($id){
		$this->layout = 'admin';
		$model = $this->findModel($id);
		$old_image = $model->bgimage;

		#\yii\helpers\VarDumper::dump(Yii::$app->request->post()['remove_bgimage'], 10, 1);

		if($model->load(Yii::$app->request->post())){
			if(intval(Yii::$app->request->post()['remove_bgimage']) == 1){
				$model->bgimage = '';
			}else{
				$model->bgimage = $this->doUpload($old_image);
			}
			$model->save();
			return $this->redirect(['view', 'id' => $model->id]);
		}else{
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing ResourcesGrid model.
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
	 * Finds the ResourcesGrid model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return ResourcesGrid the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id){
		if(($model = ResourcesGrid::findOne($id)) !== null){
			return $model;
		}else{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	public function doUpload($old_image){
		$ret = $old_image;

		$model = new ResourcesGrid();

		if(Yii::$app->request->isPost){
			$model->file = UploadedFile::getInstance($model, 'file');
			if($model->file){
				$model->file->saveAs(Yii::getAlias('@app').'/web/uploads/'.$model->file->baseName.'.'.$model->file->extension);
				$ret = '/uploads/'.$model->file->baseName.'.'.$model->file->extension;
			}
		}
		return $ret;
	}

	public function getCatsTree(){
		$ret       = [];
		$catsModel = new ResourcesCats();
		$cats      = $cats2 = $catsModel->getCategories();

		foreach($cats as $cat){
			if($cat->parent_id == 0){
				$ret[$cat->id] = $cat->title;
				foreach($cats2 as $cat2){
					if($cat2->parent_id == $cat->id){
						$ret[$cat2->id] = '- '.$cat2->title;
					}
				}
			}
		}

		return $ret;
	}

}
