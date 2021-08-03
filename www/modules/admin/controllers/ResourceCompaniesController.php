<?php

namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminController;
use Yii;
use app\components\BaseController;
use app\models\ResourcesCompanies;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;

/**
 * ResourceCompaniesController implements the CRUD actions for ResourcesCompanies model.
 */
class ResourceCompaniesController extends AdminController {
	
	public $default_pageSize = 100;
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
     * Lists all ResourcesCompanies models.
     * @return mixed
     */
	public function actionIndex(){
		parent::$layout_class = "container-fluid";

		$pageSize = Yii::$app->request->get('per-page');

		$searchModel  = new ResourcesCompanies();
		#VarDumper::dump(Yii::$app->request->queryParams, 10, 1); exit;
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize = $pageSize ? $pageSize : $this->default_pageSize;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'pageSize' => $pageSize ? $pageSize : $this->default_pageSize,
			'pageSize_list' => $this->pageSize_list,
		]);
	}

    /**
     * Displays a single ResourcesCompanies model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ResourcesCompanies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $model = new ResourcesCompanies();
	    $old_image = $model->logo;

	    if($model->load(Yii::$app->request->post())){
		    if(!empty($_POST['ResourcesCompanies']['ways_to_buy'])){
			    $model->ways_to_buy = implode(",", $_POST['ResourcesCompanies']['ways_to_buy']);
		    }else{
			    $model->ways_to_buy = '';
		    }

		    $model->logo = $this->doUpload($old_image);
		    $model->save();
		    return $this->redirect(['view', 'id' => $model->id]);
	    }else{
		    return $this->render('create', [
			    'model' => $model,
		    ]);
	    }
    }

    /**
     * Updates an existing ResourcesCompanies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);
	    $old_image = $model->logo;

	    if(!empty($model->ways_to_buy)){
		    $model->ways_to_buy = explode(',', $model->ways_to_buy);
	    }

	    if($model->load(Yii::$app->request->post())){
		    if(!empty($_POST['ResourcesCompanies']['ways_to_buy'])){
			    $model->ways_to_buy = implode(",", $_POST['ResourcesCompanies']['ways_to_buy']);
		    }else{
			    $model->ways_to_buy = '';
		    }

		    if(intval(Yii::$app->request->post()['remove_logo']) == 1){
			    $model->logo = '';
		    }else{
			    $model->logo = $this->doUpload($old_image);
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
     * Deletes an existing ResourcesCompanies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ResourcesCompanies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ResourcesCompanies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id){
        if (($model = ResourcesCompanies::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	public function doUpload($old_image){
		$ret = $old_image;

		$model = new ResourcesCompanies();

		if(Yii::$app->request->isPost){
			$model->file = UploadedFile::getInstance($model, 'file');
			if($model->file){
				$model->file->saveAs(Yii::getAlias('@app').'/web/uploads/'.$model->file->baseName.'.'.$model->file->extension);
				$ret = '/uploads/'.$model->file->baseName.'.'.$model->file->extension;
			}
		}
		return $ret;
	}

}
