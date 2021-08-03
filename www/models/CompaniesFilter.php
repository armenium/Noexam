<?php

namespace app\models;

use app\models\ResourcesCompanies;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

class CompaniesFilter extends ResourcesCompanies {

	public $filter_our_rating;
	public $filter_types_offered;
	public $filter_financial_strength;
	public $filter_underwriting_time;
	public $filter_number_of_employees;
	public $filter_state_availability;
	public $filter_bbb_rating;
	public $filter_ways_to_buy;
	public $filter_company_age;
	public $filter_prices_svailable;
	public $props;
	public $prices;

	public static $states_short = [
		'AL' => 'AL',
		//'AK' => 'AK',
		'AZ' => 'AZ',
		'AR' => 'AR',
		'CA' => 'CA',
		'CO' => 'CO',
		'CT' => 'CT',
		'DE' => 'DE',
		'DC' => 'DC',
		'FL' => 'FL',
		'GA' => 'GA',
		'HI' => 'HI',
		'ID' => 'ID',
		'IL' => 'IL',
		'IN' => 'IN',
		'IA' => 'IA',
		'KS' => 'KS',
		'KY' => 'KY',
		'LA' => 'LA',
		//'MA' => 'MA',
		//'ME' => 'ME',
		'MD' => 'MD',
		'MI' => 'MI',
		'MN' => 'MN',
		'MS' => 'MS',
		'MO' => 'MO',
		'MT' => 'MT',
		'NE' => 'NE',
		'NH' => 'NH',
		'NM' => 'NM',
		'NV' => 'NV',
		'NJ' => 'NJ',
		'NC' => 'NC',
		//'ND' => 'ND',
		'OH' => 'OH',
		'OK' => 'OK',
		'OR' => 'OR',
		'PA' => 'PA',
		'RI' => 'RI',
		'SC' => 'SC',
		'SD' => 'SD',
		'TN' => 'TN',
		'TX' => 'TX',
		'UT' => 'UT',
		'VT' => 'VT',
		'VA' => 'VA',
		'WA' => 'WA',
		'WV' => 'WV',
		'WI' => 'WI',
		'WY' => 'WY',
	];

	public static $filter_links = [
		1  => ['link_title' => 'Our Rating Methodology', 'link_url' => '#our-rating-methodology'],
		2  => ['link_title' => 'What is the difference?', 'link_url' => '#types-of-coverage'],
		3  => ['link_title' => 'What are financial ratings?', 'link_url' => '#what-are-financial-ratings'],
		4  => ['link_title' => 'Why underwriting time varies?', 'link_url' => '#underwriting-time'],
		5  => ['link_title' => 'Why does company size matter?', 'link_url' => '#company-size'],
		6  => ['link_title' => 'Why does state matter?', 'link_url' => '#state'],
		7  => ['link_title' => 'Why does BBB rating matter?', 'link_url' => '#complaints'],
		8  => ['link_title' => 'Why does BBB rating matter?', 'link_url' => '#complaints'],
		9  => ['link_title' => 'Why does age matter?', 'link_url' => '#company-age'],
		10 => ['link_title' => 'Does it make a difference?', 'link_url' => '#ways-to-buy'],
		11 => ['link_title' => 'Is cheaper always better?', 'link_url' => '#price'],
	];

	public static $filter_data = [
		1 => ['caption' => 'Our Rating'],
		2 => ['caption' => 'Type of Coverage'],
		3 => ['caption' => 'Financial Strength'],
		4 => ['caption' => 'Underwriting Time'],
		5 => ['caption' => 'Company Size'],
		6 => ['caption' => 'State'],
		7 => ['caption' => 'Average Complaints'],
		8 => ['caption' => 'BBB Rating'],
		9 => ['caption' => 'Company Age'],
		10 => ['caption' => 'Ways to Buy'],
		11 => ['caption' => 'Prices Available'],
	];

	public static $our_ratings_list = [
		5 => 5,
		4 => 4,
		3 => 3,
		2 => 2,
		1 => 1,
	];

	public static $sort_list = [
		0 => 'Our Rating',
		1 => 'Financial Strength',
		//2 => 'Lowest Price',
		3 => 'Most Popular',
	];

	/**
	 * 1. If "Term" -> result = entries, where "Term" and "Term, Whole"
	 * 2. If "Term" and "Whole" -> result = entries, where "Term", "Whole" and "Term, Whole"
	 */
	public static $types_offered_list = [
		'Term' => 'Term',
		'Whole' => 'Whole',
	];

	/**
	 * A++, A+ (Superior) = A++ or A+
	 * A, A- (Excellent) =  A or A-
	 */
	public static $financial_strength_list = [
		'S' => 'A++, A+ (Superior)',
		'E' => 'A, A- (Excellent)',
	];
	public static $financial_strength_list_alt = [
		'S' => 'A++, A+',
		'E' => 'A, A-',
	];

	public static $underwriting_time_list = [
		'I' => 'Instant',
		'S' => '1-2 Weeks',
		'L' => '4-6 Weeks',
	];

	/**
	 * Small: 2-50, 51-200, 201-500
	 * Medium: 501-1000, 1001-5000
	 * Large: 5001-10,000, 10,000+
	 */
	public static $number_of_employees_list = [
		'L' => 'Large',
		'M' => 'Medium',
		'S' => 'Small',
	];

	/**
	 * A or higher - это A-, A, A+, A++
	 * B or higher - это B-, B, B+
	 * C or higher - это C-, C, C+
	 */
	public static $bbb_rating_list = [
		'A' => 'A or higher',
		'B' => 'B or higher',
		'C' => 'C or higher',
	];

	public static $company_age_list = [
		'A' => '100+ Years',
		'B' => '50+ Years',
		'C' => 'Less than 50 Years',
	];

	public static $ways_to_buy_list = [
		'Online' => 'Online',
		'Phone' => 'Phone',
		'In Person' => 'In Person',
	];

	public static $prices_svailable_list = [
		'yes' => 'Prices Available',
	];

	#-----------------------------------------------------------------------------

	/**
	 * Filter rules
	 */
	private $sorting_rules = [
		0 => ['our_rating' => SORT_DESC],
		//1 => ['FIELD(financial_strength, "A++", "A+", "A", "A-", "")' => SORT_ASC],
		1 => ['financial_strength_sorting' => SORT_DESC],
		2 => ['lowest_price' => SORT_ASC],
		3 => ['most_popular' => SORT_DESC],
	];
	private $financial_strength_rules = [
		'S' => ['A++', 'A+'],
		'E' => ['A', 'A-'],
	];
	private $underwriting_time_rules = [
		'I' => ['Instant', 'instant'],
		'S' => ['1-2 Weeks', '1-2 weeks'],
		'L' => ['4-6 Weeks', '4-6 weeks'],
	];
	private $number_of_employees_rules = [
		'L' => ['5001-10000', '5001-10,000', '10000+', '10,000+'],
		'M' => ['501-1000', '1001-5000'],
		'S' => ['2-50', '51-200', '201-500'],
	];
	private $bbb_rating_rules = [
		'A' => ['A-', 'A', 'A+', 'A++'],
		'B' => ['B-', 'B', 'B+'],
		'C' => ['C-', 'C', 'C+'],
	];
	private $company_age_rules = [
		'A' => ['year_founded', '<', 100],
		'B' => ['year_founded', '<=', 50, '>=', 100],
		'C' => ['year_founded', '>', 50],
	];

	#-----------------------------------------------------------------------------

	/**
	 * @param $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params){
		$query = self::find();

		$query->orderBy($this->sorting_rules[intval($params['sorting'])]);

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => -1,
			],
			/*'sort' => [
				'defaultOrder' =>
					$this->sorting_rules[intval($params['sorting'])]

			],*/
		]);

		$ids = $params['ids'];

		$query->andFilterWhere(['display_in_page' => 1]);

		if(isset($params['prices_svailable'])){
			$query->andWhere(['<>', 'internal_code', '']);
		}

		if(isset($params['our_rating'])){
			$query->andFilterWhere(['=', 'our_rating', $params['our_rating']]);
		}

		if(isset($params['types_offered'])){
			$query->andFilterWhere(['OR LIKE', 'types_offered', $params['types_offered']]);
		}

		if(isset($params['financial_strength'])){
			$args = [];
			foreach($params['financial_strength'] as $k => $v){
				$args = array_merge($args, $this->financial_strength_rules[$v]);
			}
			$query->andFilterWhere(['IN', 'financial_strength', $args]);
		}

		if(isset($params['underwriting_time'])){
			$args = [];
			foreach($params['underwriting_time'] as $k => $v){
				$args = array_merge($args, $this->underwriting_time_rules[$v]);
			}
			$query->andFilterWhere(['IN', 'underwriting_time', $args]);
		}

		if(isset($params['number_of_employees'])){
			$args = [];
			foreach($params['number_of_employees'] as $k => $v){
				$args = array_merge($args, $this->number_of_employees_rules[$v]);
			}
			$query->andFilterWhere(['IN', 'number_of_employees', $args]);
		}

		if(isset($params['bbb_rating'])){
			$args = [];
			foreach($params['bbb_rating'] as $k => $v){
				$args = array_merge($args, $this->bbb_rating_rules[$v]);
			}
			$query->andFilterWhere(['IN', 'bbb', $args]);
		}

		if(isset($params['state_availability'])){
			$query->andFilterWhere(['LIKE', 'state_availability', $params['state_availability']]);
		}

		if(isset($params['ways_to_buy'])){
			$query->andFilterWhere(['OR LIKE', 'ways_to_buy', $params['ways_to_buy']]);
		}

		if(isset($params['company_age'])){
			if(count($params['company_age']) == count($this->company_age_rules)){
				$query->andWhere(['<>', 'year_founded', '']);
			}else{
				$year = date('Y');
				$args = [];
				foreach($params['company_age'] as $k => $v){
					$a = [];
					switch($v){
						case "A":
						case "C":
							$end_year = $year - $this->company_age_rules[$v][2];
							$a = [$this->company_age_rules[$v][1], $this->company_age_rules[$v][0], $end_year];
							break;
						case "B":
							$start_year = $year - 50;
							$end_year   = $year - 100;
							$a = ['AND', [$this->company_age_rules[$v][1], $this->company_age_rules[$v][0], $start_year], [$this->company_age_rules[$v][3], $this->company_age_rules[$v][0], $end_year]];
							break;
					}
					$args = array_merge($args, [$a]);
				}
				$args = array_merge(['OR'], $args);
				$query->andWhere($args);
			}
		}

		#echo Yii::$app->db->queryBuilder->build($query)[0];

		return $dataProvider;
	}

}
