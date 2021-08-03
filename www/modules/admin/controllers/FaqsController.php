<?php

namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminController;
use Yii;
use app\components\BaseController;
use app\models\Faqs;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;

/**
 * FaqsController implements the CRUD actions for Faqs model.
 */
class FaqsController extends AdminController {

	public $default_pageSize = 7;
	public $pageSize_list = [7 => 7, 10 => 10, 20 => 20, 30 => 30, 40 => 40, 50 => 50, 100 => 100];

	public $categories = [
		'anywhere' => 'Anywhere',
		'homepage' => 'Home page',
		'faqpage' => 'FAQ page',
	];

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
     * Lists all Faqs models.
     * @return mixed
     */
	public function actionIndex(){

		$pageSize = Yii::$app->request->get('per-page');

		$searchModel  = new Faqs();

		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize = $pageSize ? $pageSize : $this->default_pageSize;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'pageSize' => $pageSize,
			'pageSize_list' => $this->pageSize_list,
			'categories' => $this->categories,
		]);
	}

    /**
     * Displays a single Faqs model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Faqs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $model = new Faqs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Faqs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Faqs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Faqs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faqs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id){
        if (($model = Faqs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


	/* Additional methods */

	public function getCats(){
		return $this->categories;
	}

	public function getTemplatesTree($dir = ''){
		$result = [];

		$root = Yii::getAlias('@app');

		if(empty($dir)){
			$dir = $root.'/views/main/faqs';
		}

		$cdir = array_diff(scandir($dir), ['..', '.']);
		//VarDumper::dump($cdir, 10, 1);

		foreach($cdir as $key => $value){
			if(is_dir($dir.DIRECTORY_SEPARATOR.$value)){
				$result[$value] = $this->getTemplatesTree($dir.DIRECTORY_SEPARATOR.$value);
			}else{
				$path = str_replace($root, '', $dir.DIRECTORY_SEPARATOR.$value);
				$result[$path] = $value;
			}
		}

		ksort($result);
		reset($result);
		//VarDumper::dump($result, 10, 1);

		return $result;
	}

}
