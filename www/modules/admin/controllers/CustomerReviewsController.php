<?php

namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminController;
use Yii;
use app\components\BaseController;
use app\models\CustomerReviews;
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;

/**
 * ReviewsController implements the CRUD actions for Faqs model.
 */
class CustomerReviewsController extends AdminController {

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
     * Lists all CustomerReviews models.
     * @return mixed
     */
	public function actionIndex(){

		$pageSize = Yii::$app->request->get('per-page');

		$searchModel  = new CustomerReviews();

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
	 * Displays a single CustomerReviews model.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException
	 */
    public function actionView($id){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CustomerReviews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
	public function actionCreate(){
		$model = new CustomerReviews();
		
		if($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['view', 'id' => $model->id]);
		}else{
			$model->review_date_alt = date('F j, Y');
			return $this->render('create', ['model' => $model]);
		}
	}
	
	/**
	 * Updates an existing CustomerReviews model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException
	 */
	public function actionUpdate($id){
		$model = $this->findModel($id);
		
		if($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['view', 'id' => $model->id]);
		}else{
			$model->review_date_alt = date('F j, Y', strtotime($model->review_date));
			return $this->render('update', ['model' => $model]);
		}
	}
	
	/**
	 * Deletes an existing CustomerReviews model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws \Throwable
	 */
    public function actionDelete($id){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	public function actionRemoveImage($id){
		$ret = ['error' => 0];
		
		Yii::$app->response->format = 'json';
		$request_data = Yii::$app->request->post('data');
		
		if(Yii::$app->request->isAjax){
			$model = $this->findModel($id);
			
			switch($request_data['field']){
				case "customer_avatar":
					if(!$this->removeAvatar($model, $request_data))
						$ret['error'] = 1;
					break;
			}
			
			return $ret;
		}
	}
	
	private function removeAvatar($model, $data){
		$model->customer_avatar = '';
		
		if($ret = $model->save(false)){
			$this->removeImageFile($data);
		}
		
		return $ret;
	}
	
	private function removeImageFile($data){
		$dir = Yii::getAlias('@reviews_images').'/';
		
		
		$files = [
			$dir.$data['id'].'/'.$data['file'],
			$dir.$data['id'].'/thumbs/'.$data['file']
		];
		
		$thumbs_directory = array_diff(scandir($dir.$data['id'].'/thumbs/'), ['..', '.']);
		if(!empty($thumbs_directory)){
			foreach($thumbs_directory as $file){
				if(strstr($file, pathinfo($data['file'])['filename']) !== false){
					$files[] = $dir.$data['id'].'/thumbs/'.$file;
				}
			}
		}
		
		foreach($files as $file)
			if(file_exists($file))
				FileHelper::unlink($file);
	}
	
	/**
     * Finds the CustomerReviews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomerReviews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
	protected function findModel($id){
		if(($model = CustomerReviews::findOne($id)) !== null){
			return $model;
		}else{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

}
