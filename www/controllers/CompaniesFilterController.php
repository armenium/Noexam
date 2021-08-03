<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\CompaniesFilter;
use app\models\Customers;
use app\models\CustomersPrices;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Response;
use yii\helpers\VarDumper;

class CompaniesFilterController extends BaseController{

	public function __construct($id, $module, $config = []){
		parent::__construct($id, $module, $config);
	}

	public function getCompanies($items = [], $get_by_slug = false){
		$query = CompaniesFilter::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => -1,
			],
			'sort' => [
				'defaultOrder' => [
					'most_popular' => SORT_DESC,
				]
			],
		]);

		$query->andFilterWhere(['display_in_page' => 1]);

		if(!empty($items)){
			if($get_by_slug){
				$query->andFilterWhere(['IN', 'slug', $items]);
			}else{
				$query->andFilterWhere(['IN', 'id', $items]);
			}
		}

		$dataProvider = $this->addProps($dataProvider);

		return $dataProvider;
	}

	public function getBestCompanies($items = [], $get_by_slug = false){
		$query = CompaniesFilter::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => -1,
			],
			'sort' => [
				'defaultOrder' => [
					'most_popular' => SORT_DESC,
				]
			],
		]);

		$query->andFilterWhere(['display_in_page' => 1, 'best_company' => 1]);

		if(!empty($items)){
			if($get_by_slug){
				$query->andFilterWhere(['IN', 'slug', $items]);
			}else{
				$query->andFilterWhere(['IN', 'id', $items]);
			}
		}

		$dataProvider = $this->addProps($dataProvider);

		return $dataProvider;
	}

	private function addProps($dataProvider){
		$session = Yii::$app->session;

		$customer = Customers::findOne(['sid' => $session->id]);
		#VarDumper::dump($customer, 10, 1); exit;

		foreach($dataProvider->getModels() as $model){
			$model->props = $this->_getProps($model);
			$model->prices = $this->_getCustomerPrices($customer, $model);
		}

		return $dataProvider;
	}

	private function _getProps($model){
		$ret = [];

		$company_age = empty($model->year_founded) ? $model->year_founded : date('Y') - $model->year_founded.' Years';
		$prices_available = empty($model->internal_code) ? 'No' : 'Yes';

		$ret[] = ['title' => 'Type of coverage', 'value' => $model->types_offered, 'link_id' => 2, 'display_in_card' => 1];
		$ret[] = ['title' => 'Financial Strength', 'value' => $model->financial_strength, 'link_id' => 3, 'display_in_card' => 1];
		$ret[] = ['title' => 'Underwriting Time', 'value' => $model->underwriting_time, 'link_id' => 4, 'display_in_card' => 1];
		$ret[] = ['title' => 'Company Size', 'value' => $model->number_of_employees, 'link_id' => 5, 'display_in_card' => 1];
		//$ret[] = ['title' => 'State', 'value' => $model->state_availability, 'link_id' => 6, 'display_in_card' => 0];
		$ret[] = ['title' => 'Average Complaints', 'value' => $model->complaint_index, 'link_id' => 7, 'display_in_card' => 1];
		$ret[] = ['title' => 'BBB Rating', 'value' => $model->bbb, 'link_id' => 8, 'display_in_card' => 1];
		$ret[] = ['title' => 'Company Age', 'value' => $company_age, 'link_id' => 9, 'display_in_card' => 1];
		$ret[] = ['title' => 'Ways to Buy', 'value' => $model->ways_to_buy, 'link_id' => 9, 'display_in_card' => 0];
		$ret[] = ['title' => 'Prices Available', 'value' => $prices_available, 'link_id' => 9, 'display_in_card' => 0];

		return $ret;
	}

	private function _getCustomerPrices($customer, $company){
		$ret = null;

		if(!empty($customer)){
			$ret = [
				'amount' => $customer->amount,
				'term' => $customer->term,
				'price' => 'N/A',
			];

			foreach($customer->customersPrices as $price){
				if($company->internal_code == $price->company_code){
					$ret['price'] = '$'.$price->premium_monthly;
				}
			}
		}

		if($ret){
			$ret = (object) $ret;
		}

		return $ret;
	}

	private function _formatComparePageTitle($dataProvider){
		$titles = [];

		foreach($dataProvider->getModels() as $model){
			$titles[] = $model->title;
		}

		return implode(', ', $titles);
	}

	public function actionPostRateFlat(){
		$ret = ['error' => 0, 'message' => '', 'request' => '', 'data' => ''];

		$request = Yii::$app->request;
		$session = Yii::$app->session;
		Yii::$app->response->format = Response::FORMAT_JSON;

		if($request->isPost){
			$request_post     = $request->post();
			$requestCustomers = $request->post('Customers');
			$model            = Customers::find()->where(['sid' => $session->id])->one();
			$status           = 'new';
			$updates          = 1;
			$iniciator        = $requestCustomers['form_name'];
			$scenario         = Customers::SCENARIO_RATE_DATA;

			if(count($model)){
				$model->load($request_post);
				$model->scenario = $scenario;
				$model->status = 'updated';
				$updates = $model->updates + 1;
				$ret['message']  = 'Customers - updated record - '.$model->id;
			}else{
				$model = new Customers(['scenario' => $scenario]);
				$model->load($request_post);
				$model->status = $status;
				$model->iniciator = $iniciator;
				$ret['message'] = 'Customers - new record is created - '.$model->id;
			}
			$model->sid = $session->id;
			$model->ip = $_SERVER['HTTP_X_REAL_IP'];
			$model->state = $this->state_code;
			$model->byear = intval(date('Y')) - $requestCustomers['age'];
			$model->updates = $updates;

			$ret['request'] = $requestCustomers;

			$RateCalcArgs = [
				'igonre_get_params' => true,
				'sex' => $requestCustomers['gender'],
				'avg_amount' => $requestCustomers['amount'],
				'term_length' => $requestCustomers['term'],
				'health' => $requestCustomers['health'],
				'age' => $requestCustomers['age'],
			];
			$RateCalcAPIsData = $this->getRateCalcAPIsData($RateCalcArgs, 2);
			//$model->prices = json_encode($RateCalcAPIsData['plans']);

			if($model->validate()){
				if($model->save()){
					//$ret['data'] = $RateCalcAPIsData;
					if(!empty($RateCalcAPIsData['plans'])){
						CustomersPrices::deleteAll(['customer_id' => $model->id]);
						foreach($RateCalcAPIsData['plans'] as $plan){
							$customer_prices = new CustomersPrices();
							$customer_prices->setAttributes($plan);
							$customer_prices->link('customer', $model);
						}
					}
				}else{
					$ret['error']   = 1;
					$ret['message'] = "Customers - new record didn't created.";
				}
			}else{
				$ret['error']   = 1;
				$ret['message'] = $model->getErrors();
			}

		}

		return $ret;
	}

	public function actionGetCompanies(){
		$ret = ['error' => 0, 'message' => '', 'request' => '', 'selected' => '', 'html' => '', 'count' => 0];

		$request = Yii::$app->request;
		$session = Yii::$app->session;
		Yii::$app->response->format = Response::FORMAT_JSON;


		if($request->isPost){
			$CompaniesFilterArgs = $request->post('CompaniesFilter');

			//$ret['request'] = $CompaniesFilterArgs;

			$params = [];

			foreach($CompaniesFilterArgs as $k => $v){
				if(!empty($v)){
					$params[str_replace('filter_', '', $k)] = $v;
				}
			}

			$ret['selected_html'] = $this->renderPartial('/main/partials/companies/filter-selected', ['params' => $CompaniesFilterArgs]);

			$searchModel  = new CompaniesFilter();
			$dataProvider = $searchModel->search($params);
			$dataProvider = $this->addProps($dataProvider);

			$ret['count'] = $dataProvider->getCount();

			$ret['html'] = $this->renderPartial('/main/partials/companies/items', [
				'searchModel'  => $searchModel,
				'dataProvider' => $dataProvider,
			]);

		}

		return $ret;
	}

	public function actionGetBestCompanies(){
		$ret = ['error' => 0, 'message' => '', 'request' => '', 'selected' => '', 'html' => '', 'count' => 0];

		$request = Yii::$app->request;
		Yii::$app->response->format = Response::FORMAT_JSON;


		if($request->isPost){
			$dataProvider = $this->getBestCompanies();

			$ret['count'] = $dataProvider->getCount();

			$ret['html'] = $this->renderPartial('/main/partials/companies/best-items', [
				'dataProviderBest' => $dataProvider,
			]);
		}

		return $ret;
	}

	public function actionComparison(){
		$this->layout = 'resource_fw_modern';

		$request = Yii::$app->request;
		#VarDumper::dump($request->get(), 10, 1);

		$items = $request->get('items');
		$slugs = $request->get('slug');

		if($items){
			$items = explode(':', $items);
			$dataProvider = $this->getCompanies($items, false);
		}elseif($slugs){
			$slugs = explode('-vs-', $slugs);
			$dataProvider = $this->getCompanies($slugs, true);
		}

		$page_title = $this->_formatComparePageTitle($dataProvider);

		$session = Yii::$app->session;
		$customer = Customers::findOne(['sid' => $session->id]);
		$has_customer = $customer ? true : false;

		return $this->render('/main/resources/companies-comparison', ['items' => $items, 'has_customer' => $has_customer, 'page_title' => $page_title, 'dataProvider' => $dataProvider]);
	}

}
