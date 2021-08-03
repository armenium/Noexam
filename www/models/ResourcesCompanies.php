<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "resources_companies".
 * @property integer $id
 * @property string $internal_code
 * @property string $title
 * @property string $slug
 * @property string $logo
 * @property string $website
 * @property string $phone
 * @property integer $year_founded
 * @property string $current_ceo
 * @property string $available
 * @property string $address
 * @property string $top_awards
 * @property string $pros
 * @property string $cons
 * @property string $jd_power
 * @property string $bbb
 * @property string $am_best
 * @property string $moodys
 * @property string $fitch
 * @property string $standard_poor
 * @property string $comdex_score
 * @property string $total_assets
 * @property string $life_insurance_in_force
 * @property string $types_of_insurance
 * @property string $products_offered
 * @property string $riders_available
 * @property integer $our_rating
 * @property string $state_availability
 * @property string $underwriting_time
 * @property string $number_of_employees
 * @property string $types_offered
 * @property string $complaint_index
 * @property string $content
 * @property string $financial_strength
 * @property integer $financial_strength_sorting
 * @property string $ways_to_buy
 * @property integer $most_popular
 * @property string $companys_field_1
 * @property string $companys_field_2
 * @property string $companys_field_3
 * @property string $companys_field_4
 * @property string $companys_field_5
 * @property integer $display_in_page
 * @property integer $best_company
 */
class ResourcesCompanies extends \yii\db\ActiveRecord{

	/**
	 * @var UploadedFile file attribute
	 */
	public $file;

	public $values = [
		'complaint_index' => [ // Complaint Index Rating (Below average = 5, Above average = 4)
			'Below Average' => 5,
			'Below average' => 5,
			'below average' => 5,
			'Above Average' => 4,
			'Above average' => 4,
			'above average' => 4,
		],
		'types_offered' => [ // Product Offering (3 or more products = 5, 2 products= 4.5, only one product = 3)
			3 => 5,
			2 => 4.5,
			1 => 3,
		],
		'financial_strength' => [ // Financial Rating (A++ or A+ = 5)(A, A- = 4) (B++ or B+ = 3)
			'A++' => 5,
			'A+' => 5,
			'A' => 4,
			'A-' => 4,
			'B++' => 3,
			'B+' => 3,
			'B' => 3,
		],
		'underwriting_time' => [ // Underwriting Time (Instant = 5), (24-48 Hours = 4.5), (1-2 weeks = 4) (2-4 weeks = 3.5), (4-8 weeks = 3)
			'Instant' => 5,
			'24-48 Hours' => 4.5,
			'24-48 hours' => 4.5,
			'1-2 weeks' => 4,
			'1-2 Weeks' => 4,
			'2-4 weeks' => 3.5,
			'2-4 Weeks' => 3.5,
			'4-6 weeks' => 3,
			'4-6 Weeks' => 3,
			'4-8 weeks' => 3,
			'4-8 Weeks' => 3,
		],
	];

	public $_ways_to_buy_list = [
		'Online' => 'Online',
		'Phone' => 'Phone',
		'In Person' => 'In Person',
	];

	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'resources_companies';
	}

	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['id', 'year_founded', 'our_rating', 'most_popular', 'display_in_page', 'financial_strength_sorting', 'best_company'], 'integer'],
			[[
				'top_awards',
				'pros',
				'cons',
				'types_of_insurance',
				'products_offered',
				'riders_available',
				'companys_field_1',
				'companys_field_2',
				'companys_field_3',
				'companys_field_4',
				'companys_field_5',
				'state_availability',
				'underwriting_time',
				'number_of_employees',
				'financial_strength',
				'types_offered',
				'complaint_index',
				'content',
				'internal_code',
			], 'string'],
			[['title', 'slug', 'logo', 'website', 'phone', 'current_ceo', 'available', 'address', 'total_assets', 'life_insurance_in_force'], 'string', 'max' => 255],
			[['jd_power', 'bbb', 'am_best', 'moodys', 'fitch', 'standard_poor', 'comdex_score'], 'string', 'max' => 10],
			[['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'gif, jpg, jpeg, png'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'                      => 'ID',
			'title'                   => 'Title',
			'slug'                    => 'Slug',
			'logo'                    => 'Logo',
			'file'                    => 'Logo image',
			'website'                 => 'Website',
			'phone'                   => 'Phone',
			'year_founded'            => 'Year Founded',
			'current_ceo'             => 'Current Ceo',
			'available'               => 'Available',
			'address'                 => 'Address',
			'top_awards'              => 'Top Awards',
			'pros'                    => 'Pros',
			'cons'                    => 'Cons',
			'jd_power'                => 'Jd Power',
			'bbb'                     => 'Bbb',
			'am_best'                 => 'Am Best',
			'moodys'                  => 'Moodys',
			'fitch'                   => 'Fitch',
			'standard_poor'           => 'Standard & Poor',
			'comdex_score'            => 'Comdex Score',
			'total_assets'            => 'Total Assets',
			'life_insurance_in_force' => 'Life Insurance In Force',
			'types_of_insurance'      => 'Types Of Insurance',
			'products_offered'        => 'Products Offered',
			'riders_available'        => 'Riders Available',
			'companys_field_1'        => 'Company’s Share of Complaints US Market',
			'companys_field_2'        => 'Company’s Total Complaints',
			'companys_field_3'        => 'Company’s Share of Premiums US Market',
			'companys_field_4'        => 'Companies Annual Premium',
			'companys_field_5'        => 'Company’s Complaint Index',
			'our_rating'              => 'Our Rating',
			'state_availability'      => 'State Availability',
			'underwriting_time'       => 'Underwriting Time',
			'number_of_employees'     => 'Number Of Employees',
			'types_offered'           => 'Types Offered',
			'complaint_index'         => 'Average Complaints',
			'content'                 => 'Content area',
			'financial_strength'                 => 'Financial strength',
			'financial_strength_sorting'                 => 'Financial strength sorting',
			'most_popular'                 => 'Most popular',
			'internal_code'                 => 'Internal code',
			'display_in_page'                 => 'Display in page',
			'ways_to_buy'                 => 'Ways to Buy',
			'best_company'                 => 'Best Company',
		];
	}

	public function beforeSave($insert){
		if(parent::beforeSave($insert)){

			if(empty($this->our_rating) || intval($this->our_rating) == 0){
				$values = [];

				$this->our_rating = 0;

				if(!empty($this->complaint_index)){
					if(isset($this->values['complaint_index'][$this->complaint_index])){
						$values[] = $this->values['complaint_index'][$this->complaint_index];
					}
				}

				if(!empty($this->types_offered)){
					$a = array_map('trim', explode(',', $this->types_offered));
					$count = count($a);
					if($count > 3) $count = 3;
					if(isset($this->values['types_offered'][$count])){
						$values[] = $this->values['types_offered'][$count];
					}
				}

				if(!empty($this->financial_strength)){
					if(isset($this->values['financial_strength'][$this->financial_strength])){
						$values[] = $this->values['financial_strength'][$this->financial_strength];
					}
				}

				if(!empty($this->underwriting_time)){
					if(isset($this->values['underwriting_time'][$this->underwriting_time])){
						$values[] = $this->values['underwriting_time'][$this->underwriting_time];
					}
				}

				if(!empty($values)){
					$our_rating = round((array_sum($values) / 4), 0);
					if($our_rating > 5) $our_rating = 5;
					$this->our_rating = $our_rating;
					#VarDumper::dump($this->our_rating, 10, 1); exit;
				}

			}

			return true;
		}

		return false;
	}

	public function search($params){
		$query = self::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if(!$this->validate()){
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'id' => $this->id,
			'best_company' => $this->best_company,
			'financial_strength' => $this->financial_strength,
			'financial_strength_sorting' => $this->financial_strength_sorting,
			'most_popular' => $this->most_popular,
			'our_rating' => $this->our_rating,
			'year_founded' => $this->year_founded,
			'bbb' => $this->bbb,
		]);

		$query->
			andFilterWhere(['like', 'title', $this->title])->
			andFilterWhere(['like', 'slug', $this->slug])->
			andFilterWhere(['like', 'logo', $this->logo])->
			andFilterWhere(['like', 'underwriting_time', $this->underwriting_time])->
			andFilterWhere(['like', 'number_of_employees', $this->number_of_employees])->
			andFilterWhere(['like', 'types_offered', $this->types_offered])->
			andFilterWhere(['like', 'complaint_index', $this->complaint_index])->
			andFilterWhere(['like',	'website', $this->website]);

		return $dataProvider;
	}

	public function getCompanies($parent_id = 0){
		return $this->find()->orderBy('title ASC')->all();
	}

	public function getCompanyName($company_id){
		$ret = $this->find()->where(['id' => $company_id])->one();

		return $ret->title;
	}

	public function getCompaniesWithSlug(){
		$ret       = [];
		$companies = $this->getCompanies();

		foreach($companies as $company){
			$ret[$company->slug] = $company->title;
		}

		return $ret;
	}

	public function getCompaniesWithId(){
		$ret       = [];
		$companies = $this->getCompanies();

		foreach($companies as $company){
			$ret[$company->id] = $company->title;
		}

		return $ret;
	}

}
