<?php

namespace app\modules\admin\controllers;

use app\components\BaseController;
use app\models\ResourcesCompanies;
use app\models\ResourceCatsSearch;
use app\models\ResourcesCats;
use app\models\ResourcesCatsLive;
use app\modules\admin\controllers\AdminController;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Cookie;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ResourceCatsController implements the CRUD actions for ResourcesCats model.
 */
class ResourceCatsController extends AdminController {

	public $default_pageSize = 7;
	public $pageSize_list = [7 => 7, 10 => 10, 20 => 20, 30 => 30, 40 => 40, 50 => 50, 100 => 100];

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
	
	public function actions(){
		return [
			'images-get' => [
				'class' => 'vova07\imperavi\actions\GetImagesAction',
				'url' => '/uploads/images/', // Directory URL address, where files are stored.
				'path' => Yii::getAlias('@uploads').'/images', // Or absolute path to directory where files are stored.
				'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.ico']], // These options are by default.
			],
			'image-upload' => [
				'class' => 'vova07\imperavi\actions\UploadFileAction',
				'url' => '/uploads/images/', // Directory URL address, where files are stored.
				'path' => Yii::getAlias('@uploads').'/images', // Or absolute path to directory where files are stored.
			],
		];
	}
	
	public function actionIndex(){

		$pageSize = Yii::$app->request->get('per-page');

		$searchModel  = new ResourcesCats();

		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize = $pageSize ? $pageSize : $this->default_pageSize;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'pageSize' => $pageSize,
			'pageSize_list' => $this->pageSize_list,
		]);
	}

	public function actionView($id){
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}
	
	public function actionCreate(){
		$ResourcesCompanies = new ResourcesCompanies();
		
		$model        = new ResourcesCats();
		$old_header_image = $model->header_image;

		if($model->load(Yii::$app->request->post())){
			if(!empty($_POST['ResourcesCats']['custom_childs_links'])){
				$model->custom_childs_links = implode(",", $_POST['ResourcesCats']['custom_childs_links']);
			}else{
				$model->custom_childs_links = '';
			}

			if(empty($_POST['ResourcesCats']['company_id'])){
				$model->company_id = 0;
			}

			$model->header_image = $this->doUpload($old_header_image);
			$model->save();
			
			if(Yii::$app->request->isAjax){
				Yii::$app->response->format = Response::FORMAT_JSON;
				return ['error' => $model->errors ? 1 : 0, 'url' => $model->url];
			}else{
				return $this->redirect(['view', 'id' => $model->id]);
			}
		}else{
			return $this->render('create', [
				'model' => $model,
				'resources_companies' => $ResourcesCompanies,
			]);
		}
	}

	public function actionUpdate($id){
		$ResourcesCompanies = new ResourcesCompanies();
		
		$model = $this->findModel($id);
		$old_header_image = $model->header_image;

		if(!empty($model->custom_childs_links)){
			$model->custom_childs_links = explode(',', $model->custom_childs_links);
		}

		if($model->load(Yii::$app->request->post())){
			#VarDumper::dump($_POST, 10, 1); exit;
			if(!empty($_POST['ResourcesCats']['custom_childs_links'])){
				$model->custom_childs_links = implode(",", $_POST['ResourcesCats']['custom_childs_links']);
			}else{
				$model->custom_childs_links = '';
			}

			if(empty($_POST['ResourcesCats']['company_id'])){
				$model->company_id = 0;
			}

			if(intval(Yii::$app->request->post()['remove_header_image']) == 1){
				$model->header_image = '';
			}else{
				$model->header_image = $this->doUpload($old_header_image);
			}
			$model->save();
			
			if(Yii::$app->request->isAjax){
				Yii::$app->response->format = Response::FORMAT_JSON;
				return ['error' => $model->errors ? 1 : 0, 'url' => $model->url];
			}else{
				return $this->redirect(['view', 'id' => $model->id]);
			}
		}else{
			return $this->render('update', [
				'model' => $model,
				'resources_companies' => $ResourcesCompanies,
			]);
		}
	}

	public function actionDelete($id){
		#VarDumper::dump($id, 10, 1);
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	public function actionExport($id){
		if($this->db_server == 'live'){
			$action = 'export_to_dev';
		}elseif($this->db_server == 'dev'){
			$action = 'export_to_live';
		}
		Yii::$app->request->setBodyParams(['fields' => 'all', 'src_id' => $id, 'dst_id' => $id, $action => '1']);
		$this->actionPost();
	}

	public function actionImport($id){
		if($this->db_server == 'live'){
			$action = 'import_from_dev';
		}elseif($this->db_server == 'dev'){
			$action = 'import_from_live';
		}
		Yii::$app->request->setBodyParams(['fields' => 'all', 'src_id' => $id, 'dst_id' => $id, $action => '1']);
		$this->actionPost();
	}

	public function actionCompare($id){

		$dev_model = ResourcesCats::findOne(['id' => $id]);
		$live_model = ResourcesCatsLive::findOne(['id' => $id]);

		$fields = $dev_data = $live_data = [];

		if(!is_null($dev_model)){
			$fields = $dev_model->attributes;
			foreach($fields as $k => $v){
				$fields[$k] = ['label' => $dev_model->getAttributeLabel($k), 'value' => '-'];
			}
		}elseif(!is_null($live_model)){
			$fields = $live_model->attributes;
			foreach($fields as $k => $v){
				$fields[$k] = ['label' => $live_model->getAttributeLabel($k), 'value' => '-'];
			}
		}

		if(!empty($fields)){
			$dev_data = $live_data = $fields;

			if(!is_null($dev_model)){
				foreach($dev_model->attributes as $col => $value){
					$dev_data[$col]['value'] = $value;
				}
			}

			if(!is_null($live_model)){
				foreach($live_model->attributes as $col => $value){
					$live_data[$col]['value'] = $value;
				}
			}
		}

		/*VarDumper::dump($fields, 10, 1);
		VarDumper::dump($dev_data, 10, 1);
		VarDumper::dump($live_data, 10, 1);
		exit;*/

		$display_export_btn = $display_import_btn = true;

		if($this->db_server == 'live'){
			$src_data = $live_data;
			$dst_data = $dev_data;
			if(is_null($dev_model)){
				$display_import_btn = false;
			}
			if(is_null($live_model)){
				$display_export_btn = false;
			}
		}else{
			$src_data = $dev_data;
			$dst_data = $live_data;
			if(is_null($dev_model)){
				$display_export_btn = false;
			}
			if(is_null($live_model)){
				$display_import_btn = false;
			}
		}

		return $this->render('compare', [
			'src_data' => $src_data,
			'dst_data' => $dst_data,
			'db_server' => $this->db_server,
			'display_export_btn' => $display_export_btn,
			'display_import_btn' => $display_import_btn,
		]);

	}

	public function actionPost(){
		$_post = Yii::$app->request->post();
		VarDumper::dump($_post, 10, 1);


		if(is_array($_post['fields'])){

		}else{
			if($_post['fields'] == 'all'){

			}
		}

		if(isset($_post['export_to_dev']) || isset($_post['import_from_live'])){
			//$dev_model = ResourcesCats::findOne(['id' => $id]);
			//$live_model = ResourcesCatsLive::findOne(['id' => $id]);
		}

		if(isset($_post['export_to_live']) || isset($_post['import_from_dev'])){

		}

		#return $this->redirect(['index']);
	}

	protected function findModel($id){

		if(($model = ResourcesCats::findOne($id)) !== null){
			return $model;
		}else{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	public function doUpload($old_image){
		$ret = $old_image;

		$model = new ResourcesCats();

		if(Yii::$app->request->isPost){
			$model->file = UploadedFile::getInstance($model, 'file');
			if($model->file){
				$model->file->saveAs(Yii::getAlias('@uploads').'/'.$model->file->baseName.'.'.$model->file->extension);
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

	public function getTemplatesTree($dir = ''){
		$result = [];

		$root = Yii::getAlias('@app');

		if(empty($dir)){
			#$dir = $root.'/views/main/resources';
			$dir = $root.'/views/life-insurance';
		}

		$cdir = array_diff(scandir($dir), ['..', '.']);
		//VarDumper::dump($cdir, 10, 1);

		foreach($cdir as $key => $value){
			if(is_dir($dir.DIRECTORY_SEPARATOR.$value)){
				if(substr($value, 0, 1) != '_'){
					$result[$value] = $this->getTemplatesTree($dir.DIRECTORY_SEPARATOR.$value);
				}
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

	public function getLayouts($dir = ''){
		$result = [];

		$root = Yii::getAlias('@app');

		if(empty($dir)){
			$dir = $root.'/views/layouts';
		}

		$cdir = array_diff(scandir($dir), ['..', '.']);
		//VarDumper::dump($cdir, 10, 1);
		
		foreach($cdir as $key => $value){
			if(is_dir($dir.DIRECTORY_SEPARATOR.$value)){
				if(substr($value, 0, 1) != '_'){
					$data = $this->getLayouts($dir.DIRECTORY_SEPARATOR.$value);
					if(!empty($data)){
						$result[$value] = $data;
					}
				}
			}else{
				$path = str_replace($root, '', $dir.DIRECTORY_SEPARATOR.$value);
				$layout_name = $this->get_file_description($dir.DIRECTORY_SEPARATOR.$value);
				if($layout_name !== false){
					$result[$path] = $layout_name;
				}
			}
		}

		ksort($result);
		reset($result);
		//VarDumper::dump($result, 10, 1);

		return $result;
	}

	public function get_file_description($file_path){
		$template_data = implode('', file($file_path));
		if(preg_match('|Layout Name:(.*)$|mi', $template_data, $name)){
			return sprintf('%s', trim(preg_replace('/\s*(?:\*\/|\?>).*/', '', $name[1])));
		}
		return false;
		return trim(basename($file_path));
	}
	
}
