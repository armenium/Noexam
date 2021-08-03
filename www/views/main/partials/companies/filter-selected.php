<?php
use Yii;
use yii\helpers\VarDumper;
use app\models\CompaniesFilter;

if(isset($params['sorting']))
	unset($params['sorting']);

if(isset($params['ids']))
	unset($params['ids']);


foreach($params as $k => $param){
	switch($k){
		case "filter_state_availability":
			$param = trim($param);
			if(!empty($param)){
				$params[$k] = $param;
			}else{
				unset($params[$k]);
			}
			break;
		case "filter_our_rating":
			$params[$k] = Yii::t('yii', '{delta, plural, =1{# star} other{# stars}}', ['delta' => $param], 'en-US');
			break;
		case "filter_types_offered":
			foreach($param as $i => $v){
				$params[$k][$i] = CompaniesFilter::$types_offered_list[$v];
			}
			break;
		case "filter_financial_strength":
			foreach($param as $i => $v){
				$params[$k][$i] = CompaniesFilter::$financial_strength_list_alt[$v];
			}
			break;
		case "filter_underwriting_time":
			foreach($param as $i => $v){
				$params[$k][$i] = CompaniesFilter::$underwriting_time_list[$v];
			}
			break;
		case "filter_number_of_employees":
			foreach($param as $i => $v){
				$params[$k][$i] = CompaniesFilter::$number_of_employees_list[$v];
			}
			break;
		case "filter_bbb_rating":
			foreach($param as $i => $v){
				$params[$k][$i] = CompaniesFilter::$bbb_rating_list[$v];
			}
			break;
		case "filter_ways_to_buy":
			foreach($param as $i => $v){
				$params[$k][$i] = CompaniesFilter::$ways_to_buy_list[$v];
			}
			break;
		case "filter_prices_svailable":
			foreach($param as $i => $v){
				$params[$k][$i] = CompaniesFilter::$prices_svailable_list[$v];
			}
			break;
		case "filter_company_age":
			foreach($param as $i => $v){
				$params[$k][$i] = CompaniesFilter::$company_age_list[$v];
			}
			break;
	}
}

$pattern = '<a role="button" class="btn-clear-filter" data-item="%s" data-parent="%s">%s</a>';

#VarDumper::dump($params, 10, 1);
if(!empty($params)){
	printf($pattern, 'all', 'none', 'Clear all');
	foreach($params as $k => $param){
		if(is_array($param)){
			foreach($param as $i => $v){
				printf($pattern, $i, $k, $v);
			}
		}else{
			printf($pattern, 'none', $k, $param);
		}
	}
}
