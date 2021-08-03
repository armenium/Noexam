<?php

namespace app\models;

use yii\helpers\VarDumper;

/**
 * This is the model class for table "apply_now2".
 *
 * @property integer $id
 * @property string $sid
 * @property string $data
 * @property string $universal_leadid
 */
class ApplyNow2 extends \yii\db\ActiveRecord {

	const SCENARIO_DEFAULT = 'default';

	public $coverage_amount; // step 1 (amount field)
	public $coverage_type; // step 1 (term field)
	public $major_condition; // step 1

	public $birth_date; // step 2
	public $gender; // step 2
	public $height; // step 2
	public $weight; // step 2
	public $weekly_exercise_hours; // step 2

	public $address; // step 3
    public $address_2; // step 3
	public $first_name; // step 3
	public $middle_name; // step 3
	public $last_name; // step 3
	public $city; // step 3
	public $state; // step 3
	public $zip; // step 3
	public $email; // step 3
	public $phone; // step 3

    public $contact;
    public $credit_rating;
    public $current_company;
    public $currently_insured;
	public $marital_status;
	public $military;
	public $prescription_medications;
	public $tcpa;
    public $tobaco;
    public $trusted_form_certificate_id;
    public $illnesses;
	public $step;

	public static $states = [
		"AL" => "Alabama",
		"AK" => "Alaska",
		"AZ" => "Arizona",
		"AR" => "Arkansas",
		"CA" => "California",
		"CO" => "Colorado",
		"CT" => "Connecticut",
		"DE" => "Delaware",
		"DC" => "Dist. Columbia",
		"FL" => "Florida",
		"GA" => "Georgia",
		"HI" => "Hawaii",
		"ID" => "Idaho",
		"IL" => "Illinois",
		"IN" => "Indiana",
		"IA" => "Iowa",
		"KS" => "Kansas",
		"KY" => "Kentucky",
		"LA" => "Louisiana",
		"MA" => "Massachusetts",
		"ME" => "Maine",
		"MD" => "Maryland",
		"MI" => "Michigan",
		"MN" => "Minnesota",
		"MS" => "Mississippi",
		"MO" => "Missouri",
		"MT" => "Montana",
		"NE" => "Nebraska",
		"NH" => "New Hampshire",
		"NM" => "New Mexico",
		"NV" => "Nevada",
		"NJ" => "New Jersey",
		"NC" => "North Carolina",
		"ND" => "North Dakota",
		"OH" => "Ohio",
		"OK" => "Oklahoma",
		"OR" => "Oregon",
		"PA" => "Pennsylvania",
		"RI" => "Rhode Island",
		"SC" => "South Carolina",
		"SD" => "South Dakota",
		"TN" => "Tennessee",
		"TX" => "Texas",
		"UT" => "Utah",
		"VT" => "Vermont",
		"VA" => "Virginia",
		"WA" => "Washington",
		"WV" => "West Virginia",
		"WI" => "Wisconsin",
		"WY" => "Wyoming",
	];
	public static $states_short = [
		'AL' => 'AL',
		'AK' => 'AK',
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
		'MA' => 'MA',
		'ME' => 'ME',
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
		'ND' => 'ND',
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
	public static $countries = [
		'Afghanistan'                                  => 'Afghanistan',
		'Aland Islands'                                => 'Aland Islands',
		'Albania'                                      => 'Albania',
		'Algeria'                                      => 'Algeria',
		'American Samoa'                               => 'American Samoa',
		'Andorra'                                      => 'Andorra',
		'Angola'                                       => 'Angola',
		'Anguilla'                                     => 'Anguilla',
		'Antarctica'                                   => 'Antarctica',
		'Antigua and Barbuda'                          => 'Antigua and Barbuda',
		'Argentina'                                    => 'Argentina',
		'Armenia'                                      => 'Armenia',
		'Aruba'                                        => 'Aruba',
		'Australia'                                    => 'Australia',
		'Austria'                                      => 'Austria',
		'Azerbaijan'                                   => 'Azerbaijan',
		'Bahamas'                                      => 'Bahamas',
		'Bahrain'                                      => 'Bahrain',
		'Bangladesh'                                   => 'Bangladesh',
		'Barbados'                                     => 'Barbados',
		'Belarus'                                      => 'Belarus',
		'Belgium'                                      => 'Belgium',
		'Belize'                                       => 'Belize',
		'Benin'                                        => 'Benin',
		'Bermuda'                                      => 'Bermuda',
		'Bhutan'                                       => 'Bhutan',
		'Bolivia'                                      => 'Bolivia',
		'Bonaire'                                      => 'Bonaire',
		'Bosnia and Herzegovina'                       => 'Bosnia and Herzegovina',
		'Botswana'                                     => 'Botswana',
		'Bouvet Island'                                => 'Bouvet Island',
		'Brazil'                                       => 'Brazil',
		'British Indian Ocean Territory'               => 'British Indian Ocean Territory',
		'Brunei Darussalam'                            => 'Brunei Darussalam',
		'Bulgaria'                                     => 'Bulgaria',
		'Burkina Faso'                                 => 'Burkina Faso',
		'Burma'                                        => 'Burma',
		'Burundi'                                      => 'Burundi',
		'Cambodia'                                     => 'Cambodia',
		'Cameroon'                                     => 'Cameroon',
		'Canada'                                       => 'Canada',
		'Canary Islands'                               => 'Canary Islands',
		'Cape Verde'                                   => 'Cape Verde',
		'Cayman Islands'                               => 'Cayman Islands',
		'Central African Republic'                     => 'Central African Republic',
		'Chad'                                         => 'Chad',
		'Chile'                                        => 'Chile',
		'China'                                        => 'China',
		'Christmas Island'                             => 'Christmas Island',
		'Cocos (Keeling) Islands'                      => 'Cocos (Keeling) Islands',
		'Colombia'                                     => 'Colombia',
		'Comoros'                                      => 'Comoros',
		'Congo'                                        => 'Congo',
		'Congo, Democratic Republic of the'            => 'Congo, Democratic Republic of the',
		'Cook Islands'                                 => 'Cook Islands',
		'Costa Rica'                                   => 'Costa Rica',
		'Cote d\'Ivoire'                               => 'Cote d\'Ivoire',
		'Croatia'                                      => 'Croatia',
		'Cuba'                                         => 'Cuba',
		'Curacao'                                      => 'Curacao',
		'Cyprus'                                       => 'Cyprus',
		'Czech Republic'                               => 'Czech Republic',
		'Denmark'                                      => 'Denmark',
		'Djibouti'                                     => 'Djibouti',
		'Dominica'                                     => 'Dominica',
		'Dominican Republic'                           => 'Dominican Republic',
		'Ecuador'                                      => 'Ecuador',
		'Egypt'                                        => 'Egypt',
		'El Salvador'                                  => 'El Salvador',
		'Equatorial Guinea'                            => 'Equatorial Guinea',
		'Eritrea'                                      => 'Eritrea',
		'Estonia'                                      => 'Estonia',
		'Ethiopia'                                     => 'Ethiopia',
		'Falkland Islands (Malvinas)'                  => 'Falkland Islands (Malvinas)',
		'Faroe Islands'                                => 'Faroe Islands',
		'Fiji'                                         => 'Fiji',
		'Finland'                                      => 'Finland',
		'France'                                       => 'France',
		'French Guiana'                                => 'French Guiana',
		'French Polynesia'                             => 'French Polynesia',
		'French Southern Territories'                  => 'French Southern Territories',
		'Gabon'                                        => 'Gabon',
		'Gambia'                                       => 'Gambia',
		'Gaza'                                         => 'Gaza',
		'Georgia'                                      => 'Georgia',
		'Germany'                                      => 'Germany',
		'Ghana'                                        => 'Ghana',
		'Gibraltar'                                    => 'Gibraltar',
		'Greece'                                       => 'Greece',
		'Greenland'                                    => 'Greenland',
		'Grenada'                                      => 'Grenada',
		'Guadeloupe'                                   => 'Guadeloupe',
		'Guam'                                         => 'Guam',
		'Guatemala'                                    => 'Guatemala',
		'Guernsey'                                     => 'Guernsey',
		'Guinea'                                       => 'Guinea',
		'Guinea-Bissau'                                => 'Guinea-Bissau',
		'Guyana'                                       => 'Guyana',
		'Haiti'                                        => 'Haiti',
		'Heard Island and McDonald Islands'            => 'Heard Island and McDonald Islands',
		'Holy See (Vatican City State)'                => 'Holy See (Vatican City State)',
		'Honduras'                                     => 'Honduras',
		'Hong Kong'                                    => 'Hong Kong',
		'Hungary'                                      => 'Hungary',
		'Iceland'                                      => 'Iceland',
		'India'                                        => 'India',
		'Indonesia'                                    => 'Indonesia',
		'Iran'                                         => 'Iran',
		'Iran, Islamic Republic of'                    => 'Iran, Islamic Republic of',
		'Iraq'                                         => 'Iraq',
		'Ireland'                                      => 'Ireland',
		'Ireland (Northern )'                          => 'Ireland (Northern )',
		'Isle of Man'                                  => 'Isle of Man',
		'Israel'                                       => 'Israel',
		'Italy'                                        => 'Italy',
		'Ivory Coast'                                  => 'Ivory Coast',
		'Jamaica'                                      => 'Jamaica',
		'Japan'                                        => 'Japan',
		'Jersey'                                       => 'Jersey',
		'Jordan'                                       => 'Jordan',
		'Kazakhstan'                                   => 'Kazakhstan',
		'Kenya'                                        => 'Kenya',
		'Kiribati'                                     => 'Kiribati',
		'Korea, N.'                                    => 'Korea, N.',
		'Korea, S. '                                   => 'Korea, S. ',
		'Kosovo'                                       => 'Kosovo',
		'Kuwait'                                       => 'Kuwait',
		'Kyrgyzstan'                                   => 'Kyrgyzstan',
		'Lao People\'s Democratic Republic'            => 'Lao People\'s Democratic Republic',
		'Laos'                                         => 'Laos',
		'Latvia'                                       => 'Latvia',
		'Lebanon'                                      => 'Lebanon',
		'Lesotho'                                      => 'Lesotho',
		'Liberia'                                      => 'Liberia',
		'Libya '                                       => 'Libya ',
		'Libyan Arab Jamahiriya'                       => 'Libyan Arab Jamahiriya',
		'Liechtenstein'                                => 'Liechtenstein',
		'Lithuania'                                    => 'Lithuania',
		'Luxembourg'                                   => 'Luxembourg',
		'Macau'                                        => 'Macau',
		'Macedonia, The Former Yugoslav Republic of'   => 'Macedonia, The Former Yugoslav Republic of',
		'Madagascar'                                   => 'Madagascar',
		'Malawi'                                       => 'Malawi',
		'Malaysia'                                     => 'Malaysia',
		'Maldives'                                     => 'Maldives',
		'Mali'                                         => 'Mali',
		'Malta'                                        => 'Malta',
		'Marshall Islands'                             => 'Marshall Islands',
		'Martinique'                                   => 'Martinique',
		'Mauritania'                                   => 'Mauritania',
		'Mauritius'                                    => 'Mauritius',
		'Mayotte'                                      => 'Mayotte',
		'Mexico'                                       => 'Mexico',
		'Micronesia, Federated States of'              => 'Micronesia, Federated States of',
		'Moldova, Republic of'                         => 'Moldova, Republic of',
		'Monaco'                                       => 'Monaco',
		'Mongolia'                                     => 'Mongolia',
		'Montenegro'                                   => 'Montenegro',
		'Montserrat'                                   => 'Montserrat',
		'Morocco'                                      => 'Morocco',
		'Mozambique'                                   => 'Mozambique',
		'Myanmar'                                      => 'Myanmar',
		'Namibia'                                      => 'Namibia',
		'Nauru'                                        => 'Nauru',
		'Nepal'                                        => 'Nepal',
		'Netherlands'                                  => 'Netherlands',
		'Netherlands Antilles'                         => 'Netherlands Antilles',
		'New Caledonia'                                => 'New Caledonia',
		'New Zealand'                                  => 'New Zealand',
		'Nicaragua'                                    => 'Nicaragua',
		'Niger'                                        => 'Niger',
		'Nigeria'                                      => 'Nigeria',
		'Niue'                                         => 'Niue',
		'Norfolk Island'                               => 'Norfolk Island',
		'North Yemen'                                  => 'North Yemen',
		'Northern Mariana Islands'                     => 'Northern Mariana Islands',
		'Norway'                                       => 'Norway',
		'Oman'                                         => 'Oman',
		'Other'                                        => 'Other',
		'Pakistan'                                     => 'Pakistan',
		'Palau'                                        => 'Palau',
		'Palestinian Territory, Occupied'              => 'Palestinian Territory, Occupied',
		'Panama (also known as Canal Zone)'            => 'Panama (also known as Canal Zone)',
		'Papua New Guinea'                             => 'Papua New Guinea',
		'Paraguay'                                     => 'Paraguay',
		'Peru'                                         => 'Peru',
		'Philippines'                                  => 'Philippines',
		'Pitcairn'                                     => 'Pitcairn',
		'Poland'                                       => 'Poland',
		'Portugal'                                     => 'Portugal',
		'Puerto Rico'                                  => 'Puerto Rico',
		'Qatar'                                        => 'Qatar',
		'Reunion'                                      => 'Reunion',
		'Romania'                                      => 'Romania',
		'Russian Federation'                          => 'Russian Federation',
		'Rwanda'                                       => 'Rwanda',
		'Saint Barthelemy'                             => 'Saint Barthelemy',
		'Saint Helena'                                 => 'Saint Helena',
		'Saint Kitts and Nevis'                        => 'Saint Kitts and Nevis',
		'Saint Lucia'                                  => 'Saint Lucia',
		'Saint Martin'                                 => 'Saint Martin',
		'Saint Pierre and Miquelon'                    => 'Saint Pierre and Miquelon',
		'Saint Vincent and the Grenadines'             => 'Saint Vincent and the Grenadines',
		'Samoa'                                        => 'Samoa',
		'San Marino'                                   => 'San Marino',
		'Sao Tome and Principe'                        => 'Sao Tome and Principe',
		'Saudi Arabia'                                 => 'Saudi Arabia',
		'Senegal'                                      => 'Senegal',
		'Serbia'                                       => 'Serbia',
		'Seychelles'                                   => 'Seychelles',
		'Sierra Leone'                                 => 'Sierra Leone',
		'Singapore'                                    => 'Singapore',
		'Sint Maarten'                                 => 'Sint Maarten',
		'Slovakia'                                     => 'Slovakia',
		'Slovenia'                                     => 'Slovenia',
		'Solomon Islands'                              => 'Solomon Islands',
		'Somalia'                                      => 'Somalia',
		'South Africa'                                 => 'South Africa',
		'South Georgia and the South Sandwich Islands' => 'South Georgia and the South Sandwich Islands',
		'South Sudan'                                  => 'South Sudan',
		'South Yemen'                                  => 'South Yemen',
		'Spain'                                        => 'Spain',
		'Sri Lanka'                                    => 'Sri Lanka',
		'Sudan'                                        => 'Sudan',
		'Suriname'                                     => 'Suriname',
		'Svalbard and Jan Mayen'                       => 'Svalbard and Jan Mayen',
		'Swaziland'                                    => 'Swaziland',
		'Sweden'                                       => 'Sweden',
		'Switzerland'                                  => 'Switzerland',
		'Syria'                                        => 'Syria',
		'Syrian Arab Republic'                         => 'Syrian Arab Republic',
		'Taiwan, Province of China'                    => 'Taiwan, Province of China',
		'Tajikistan'                                   => 'Tajikistan',
		'Tanzania, United Republic of'                 => 'Tanzania, United Republic of',
		'Thailand'                                     => 'Thailand',
		'Timor-Leste'                                  => 'Timor-Leste',
		'Togo'                                         => 'Togo',
		'Tokelau'                                      => 'Tokelau',
		'Tonga'                                        => 'Tonga',
		'Trinidad and Tobago'                          => 'Trinidad and Tobago',
		'Tunisia'                                      => 'Tunisia',
		'Turkey'                                       => 'Turkey',
		'Turkmenistan'                                 => 'Turkmenistan',
		'Turks and Caicos Islands'                     => 'Turks and Caicos Islands',
		'Tuvalu'                                       => 'Tuvalu',
		'Uganda'                                       => 'Uganda',
		'Ukraine'                                      => 'Ukraine',
		'Union of Soviet Socialist Republics'          => 'Union of Soviet Socialist Republics',
		'United Arab Emirates'                         => 'United Arab Emirates',
		'United Kingdom'                               => 'United Kingdom',
		'United States Minor Outlying Islands'         => 'United States Minor Outlying Islands',
		'United States of America'                     => 'United States of America',
		'Unknown'                                      => 'Unknown',
		'Uruguay'                                      => 'Uruguay',
		'Uzbekistan'                                   => 'Uzbekistan',
		'Vanuatu'                                      => 'Vanuatu',
		'Vatican City'                                 => 'Vatican City',
		'Venezuela'                                    => 'Venezuela',
		'Vietnam'                                      => 'Vietnam',
		'Virgin Islands, British'                      => 'Virgin Islands, British',
		'Virgin Islands, US'                           => 'Virgin Islands, US',
		'Wallis and Futuna'                            => 'Wallis and Futuna',
		'West Bank'                                    => 'West Bank',
		'Western Sahara'                               => 'Western Sahara',
		'Yemen'                                        => 'Yemen',
		'Yugoslavia'                                   => 'Yugoslavia',
		'Zaire'                                        => 'Zaire',
		'Zambia'                                       => 'Zambia',
		'Zimbabwe'                                     => 'Zimbabwe'
	];
	public static $foots = [
		'4' => '4’',
		'5' => '5’',
		'6' => '6’',
	];
	public static $inchs = [
		'0'  => '0"',
		'1'  => '1"',
		'2'  => '2"',
		'3'  => '3"',
		'4'  => '4"',
		'5'  => '5"',
		'6'  => '6"',
		'7'  => '7"',
		'8'  => '8"',
		'9'  => '9"',
		'10' => '10"',
		'11' => '11"',
	];
	public static $amounts = [
		//'50'  => '$50,000',
		'100' => '$100,000',
		'150' => '$150,000',
		'200' => '$200,000',
		'250' => '$250,000',
		'300' => '$300,000',
		//'350' => '$350,000',
		'400' => '$400,000',
		//'450' => '$450,000',
		'500' => '$500,000',
		'600' => '$600,000',
		'700' => '$700,000',
		'800' => '$800,000',
		'900' => '$900,000',
		'1000' => '$1,000,000',
	];
	public static $heights = [
		'4|8' => '4’8"',
		'4|9' => '4’9"',
		'4|10' => '4’10"',
		'4|11' => '4’11"',
		'5|0' => '5’0"',
		'5|1' => '5’1"',
		'5|2' => '5’2"',
		'5|3' => '5’3"',
		'5|4' => '5’4"',
		'5|5' => '5’5"',
		'5|6' => '5’6"',
		'5|7' => '5’7"',
		'5|8' => '5’8"',
		'5|9' => '5’9"',
		'5|10' => '5’10"',
		'5|11' => '5’11"',
		'6|0' => '6’0"',
		'6|1' => '6’1"',
		'6|2' => '6’2"',
		'6|3' => '6’3"',
		'6|4' => '6’4"',
		'6|5' => '6’5"',
		'6|6' => '6’6"',
	];
	public static $wigths = [
		'140' => '140 lbs',
		'145' => '145 lbs',
		'150' => '150 lbs',
		'155' => '155 lbs',
		'161' => '161 lbs',
		'166' => '166 lbs',
		'172' => '172 lbs',
		'177' => '177 lbs',
		'183' => '183 lbs',
		'189' => '189 lbs',
		'195' => '195 lbs',
		'201' => '201 lbs',
		'207' => '207 lbs',
		'213' => '213 lbs',
		'219' => '219 lbs',
		'225' => '225 lbs',
		'232' => '232 lbs',
		'238' => '238 lbs',
		'245' => '245 lbs',
		'252' => '252 lbs',
		'258' => '258 lbs',
		'265' => '265 lbs',
		'272' => '272 lbs',
	];
	public static $terms = [
		'Term 1 Year' => 'Term 1 Year',
		'Term 5 Years' => 'Term 5 Years',
		'Term 10 Years' => 'Term 10 Years',
		'Term 15 Years' => 'Term 15 Years',
		'Term 20 Years' => 'Term 20 Years',
		'Term 25 Years' => 'Term 25 Years',
		'Term 30 Years' => 'Term 30 Years',
		'Whole Life' => 'Whole Life',
		'Universal Life' => 'Universal Life',
		'Variable Life' => 'Variable Life',
		'Final Expense' => 'Final Expense',
		'Investment' => 'Investment',
		'Cash Value' => 'Cash Value',
		'Not Sure' => 'Not Sure',
	];
	public static $major_conditions = [
		'major_condition_aids_hiv' => 'AIDS/HIV',
		'major_condition_alcohol_drug_abuse' => '',
		'major_condition_alzheimers_dementia' => '',
		'major_condition_asthma' => '',
		'major_condition_cancer' => '',
		'major_condition_clinical_depression' => '',
		'major_condition_diabetes' => '',
		'major_condition_emphysema' => '',
		'major_condition_epilepsy' => '',
		'major_condition_heart_attack' => '',
		'major_condition_heart_disease' => '',
		'major_condition_hepatitis_liver' => '',
		'major_condition_high_blood_pressure' => '',
		'major_condition_high_cholesterol' => '',
		'major_condition_kidney_disease' => '',
		'major_condition_mental_illness' => '',
		'major_condition_multiple_sclerosis' => '',
		'major_condition_pulmonary_disease' => '',
		'major_condition_stroke' => '',
		'major_condition_ulcers' => '',
		'major_condition_vascular_disease' => '',
		'major_condition_other' => '',
	];
	public static $months_full = [
		1 => 'January',
		2 => 'February',
		3 => 'March',
		4 => 'April',
		5 => 'May',
		6 => 'June',
		7 => 'July',
		8 => 'August',
		9 => 'September',
		10 => 'October',
		11 => 'November',
		12 => 'December',
	];

	public function beforeSave($insert){
		if(parent::beforeSave($insert)){

			//VarDumper::dump($this, 10, 1);

			$data = null;

			if(!$insert){
				$this->data = json_decode($this->data, true);
				$data       = $this->data;
			}

			foreach($this->scenarios()[$this->scenario] as $scenario){
				$data[$scenario] = $this->{$scenario};
			}

			$data['step'] = $this->scenario;
			if($this->scenario == $this::SCENARIO_DEFAULT){
				$data['step'] = '';
			}
			$this->data = json_encode($data);

			return true;
		}

		return false;
	}

	public function update($runValidation = true, $attributeNames = null){
		return parent::update($runValidation, ['data', 'universal_leadid']);
	}

    /**
     * @inheritdoc
     */
	public static function tableName(){
		return 'apply_now2';
	}

    /**
     * @inheritdoc
     */
	public function scenarios(){
		$scenarios = parent::scenarios();
		$scenarios['default'] = [
			'coverage_amount',
			'coverage_type',
			'birth_date',
			'gender',
			'height',
			'weight',
			'weekly_exercise_hours',
			'first_name',
			'middle_name',
			'last_name',
			'address',
			'city',
			'state',
			'zip',
			'phone',
			'email',
		];

		return $scenarios;
	}

    public function checkIsArray(){
    
    }

    /**
     * @inheritdoc
     */
	public function rules(){
		return [
			[['id', 'weight', 'coverage_amount', 'zip', 'weekly_exercise_hours'], 'integer'],
			//[['sid', 'dls', 'step', 'birth_state', 'birth_country', 'occupation'], 'string', 'max' => 255],
			[['last_name', 'first_name'], 'validateFirstName'],
			[['last_name', 'first_name'], 'string', 'max' => 255],
			[['middle_name'], 'validateMiddleName'],
			[['middle_name'], 'string', 'max' => 1],
			//[['city'], 'validateCity'],
			[['city'], 'string', 'max' => 31],
			//[['address'], 'validateStreetAddress'],
			[['address'], 'string', 'max' => 255],
			[['zip'], 'string', 'length' => [5, 9]],
			[['phone'], 'string', 'length' => [10, 15]],
			[['universal_leadid'], 'string', 'max' => 40],
			//[['form_name'], 'in', 'range' => ['term', 'pi', 'pi2']],
			[['data'], 'string', 'max' => 5000],
			//[['questions'], 'checkIsArray'],
			[['gender'], 'string', 'max' => 10],
			[['weight'], 'number', 'max' => 402, 'min' => 84],
			[['state'], 'string', 'max' => 2, 'min' => 2],
			[['tobaco'], 'in', 'range' => [0, 1]],
			[['email'], 'email'],
			[['email'], 'string', 'max' => 40],
			//[['birth_date'], 'date', 'format' => 'dd/mm/yyyy'],
			//[['form_name', 'leadid_id', 'coverage_amount', 'coverage_type', 'birth_date', 'gender', 'height', 'weight', 'weekly_exercise_hours', 'first_name', 'middle_name', 'last_name', 'address', 'city', 'state', 'zip', 'phone', 'email'], 'required', 'on' => self::SCENARIO_DEFAULT],
			//[['agree'], 'required', 'on' => self::SCENARIO_PLAN],
			//[['agree'], 'in', 'range' => [1], 'message' => 'Please select checkbox'],
		];
	}

    /**
     * @inheritdoc
     */
	public function attributeLabels(){
		return [
			'id'          => 'ID',
			'sid'         => 'Sid',
			'data'        => 'Data',
			'first_name'  => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name'   => 'Last Name',
			'address'     => 'Street address',
			'address_2'   => 'Street address, second line',
			'city'        => 'City',
			'state'       => 'State',
			'zip'         => 'Zip Code',
			'phone'       => 'Phone Number',
			'email'       => 'Email Address',
			'universal_leadid'   => 'LeadiD',
		];
	}

	public function decodeData(){
		return json_decode($this->data, true);
	}

	public function validateFirstName($attribute){
		if(!preg_match('/^[a-zA-Z-\'\s]*$/', $this->$attribute)){
			$this->addError($attribute, 'The only Special Characters allowed are Hyphen (-), Apostrophe (\') and blank space.');
		}
	}

	public function validateMiddleName($attribute){
		if(!preg_match('/^[a-zA-Z]*$/', $this->$attribute)){
			$this->addError($attribute, 'The only alphabets allowed.');
		}
	}

	public function validateCity($attribute){
		if(!preg_match('/^[a-zA-Z#\s]*$/', $this->$attribute)){
			$this->addError($attribute, 'The only alphabets, spaces and Pound/Hash (#) allowed.');
		}
	}

	public function validateStreetAddress($attribute){
		if(!preg_match('/^[0-9a-zA-Z-\'\s#&]*$/', $this->$attribute)){
			$this->addError($attribute, 'The only allowed special characters are Hyphen (-), Apostrophe (\'), Pound/Hash (#), ampersand (&), and blank space( ).');
		}
	}

	public function alphaNumeric($attribute){
		if(!preg_match('/^[0-9a-zA-Z]*$/', $this->$attribute)){
			$this->addError($attribute, 'The only Alphanumeric allowed.');
		}
	}

	public function validateEmail($attribute){
		/*if(filter_var($this->$attribute, FILTER_VALIDATE_EMAIL)) {
			$this->addError($attribute, 'Email not in format.');
		}*/
		if(!preg_match('/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', $this->$attribute)){
			$this->addError($attribute, 'Email Address is not a valid email address.');
		}

	}
}
