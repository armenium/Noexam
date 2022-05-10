<?php

namespace app\models;

use himiklab\yii2\recaptcha\ReCaptchaValidator3;
use Yii;
use yii\helpers\VarDumper;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "customer_data".
 *
 * @property integer $id
 * @property string $sid
 * @property string $data
 * @property string $status
 * @property string $iniciator
 */
class CustomerData extends ActiveRecord {

    const SCENARIO_TERM = 'term';
    const SCENARIO_PI = 'personal-info';
    const SCENARIO_PI2 = 'personal-info2';
    const SCENARIO_ADDQ = 'add-question';
    const SCENARIO_PLAN = 'plan-information';
    const SCENARIO_APPLY_NOW = 'apply-now';
    const SCENARIO_APPLY_NOW_HOME = 'apply-now-home';
    const SCENARIO_QUOTE_RESULT = 'quote-result';
    const SCENARIO_BENEFICIARY = 'beneficiary';
    const SCENARIO_PAYMENT = 'paymentinfo';
    const SCENARIO_SUCCESS = 'success';
    const SCENARIO_DSR = 'dsr';
    const SCENARIO_COMPLETED = 'completed';
    const SCENARIO_IMQ = 'intermediary-questions';
    const SCENARIO_RATE_CALC = 'rate-calc';
    const SCENARIO_RATE_CALC_TABLE = 'rate-calc-table';
    const SCENARIO_SELECT_COVERAGE = 'select-coverage';
    const SCENARIO_OVERALL_HEALTH = 'overall-health';
    const SCENARIO_DATE_OF_BIRTH = 'date-of-birth';
    const SCENARIO_CONTACT_DETAILS = 'contact-details';

    const SCENARIO_APP_STEP_1 = 'app_step_1';
    const SCENARIO_APP_STEP_2 = 'app_step_2';
    const SCENARIO_APP_STEP_3 = 'app_step_3';
    const SCENARIO_APP_STEP_QUESTIONS = 'app_step_questions';
    const SCENARIO_APP_STEP_FINISH = 'app_step_finish';
	
	public $reCaptcha;
    public $agree;
    public $form_name;
    public $redirect;
    public $avg_amount;
    public $completed_application;
    public $monthly_premium;
    public $premium_amount;
    public $rate_class;
    public $birthday;
    public $birth_month;
    public $birth_day;
    public $birth_year;
    public $h_foot;
    public $h_inch;
    public $weight;
    public $sex;
    public $tobaco;
    public $term;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $street_address;
    public $city;
    public $state;
    public $zip;
    public $phone_number;
    public $email;
    public $birth_state;
    public $birth_country;
    public $occupation;
    public $household_income;
    public $ssn;
    public $dls;
    public $dln;
    public $step;
    public $questions;
    public $beneficiary;
    public $payment;
    public $success;
    public $view_data;
    public $height;
    public $referer;
    public $term_length;
    public $company_code;
    public $company_name;
    public $product_code;
    public $product_name;
    public $im_questions;
    public $age;
    public $health;
    public $guessing_statistic_type;
    public $gender;
	public static $states = [
		"AL" => "Alabama",
		//"AK" => "Alaska",
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
		//"MA" => "Massachusetts",
		//"ME" => "Maine",
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
		//"ND" => "North Dakota",
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
	public static $avg_amounts = [
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
	public static $avg_amounts2 = [
		'100000',
		'200000',
		'250000',
		'300000',
		'400000',
		'500000',
		'750000',
		'1000000',
	];
	public static $avg_amounts3 = [
		100 => '100000',
		200 => '200000',
		250 => '250000',
		300 => '300000',
		400 => '400000',
		500 => '500000',
		750 => '750000',
		1000 => '1000000',
	];
	public static $coverage_amounts = [
		100 => '100k',
		150 => '150k',
		200 => '200k',
		250 => '250k',
		300 => '300k',
		400 => '400k',
		500 => '500k',
		600 => '600k',
		700 => '700k',
		800 => '800k',
		900 => '900k',
		1000 => '1m',
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
	public static $relationships = [
		'Spouse' => 'Spouse',
		'Child' => 'Child',
		'Parent' => 'Parent',
		'Sibling' => 'Sibling',
		'Family' => 'Family',
		'Employee' => 'Employee',
		'Employer' => 'Employer',
		'Business Partner' => 'Business Partner',
		'Domestic Partner' => 'Domestic Partner',
		'Trustee' => 'Trustee',
		'Grandparent' => 'Grandparent',
		'Grandchild' => 'Grandchild',
		'Fiance' => 'Fiance',
		'Foster Parent' => 'Foster Parent',
		'School' => 'School',
		'Self' => 'Self',
		'Other' => 'Other',
	];
	public static $term_lengths = [
		'10' => '10 Year Term',
		'15' => '15 Year Term',
		'20' => '20 Year Term',
		//'25' => '25 Year Term',
		'30' => '30 Year Term',
		'rt' => 'Convertible Term',
		//'15rop' => '15 Year Return of Premium',
		//'20rop' => '20 Year Return of Premium',
		//'25rop' => '25 Year Return of Premium',
		//'30rop' => '30 Year Return of Premium',
		//'90ul' => 'Universal Life Age 90',
		//'95ul' => 'Universal Life Age 95',
		//'100ul' => 'Universal Life Age 100',
		//'105ul' => 'Universal Life Age 105',
		//'110ul' => 'Universal Life Age 110',
		//'121ul' => 'Universal Life Age 121',
		//'fex' => 'Final Expense',
	];
	public static $term_lengths2 = [
		'10' => '10 years',
		'15' => '15 years',
		'20' => '20 years',
		'30' => '30 years',
		'rt' => 'Convertible Term',
	];
	public static $term_lengths3 = [
		'10' => '10 yr',
		'15' => '15 yr',
		'20' => '20 yr',
		'30' => '30 yr',
		'rt' => 'Convertible Term',
	];
	public static $healths = [
		'excellent' => 'Excellent', // 5
		'very-good' => 'Very Good', // 4
		'good' => 'Good', // 3
		'fair' => 'Fair', // 2
		'none' => 'Fair', // 1
	];
	public static $healths2 = [
		'excellent' => 'Excellent', // 5
		'very-good' => 'Very Good', // 4
		'good' => 'Good', // 3
		'fair' => 'Fair', // 2
	];
	public static $healths3 = [
		'very-good' => 'Сompletely healthy', // 4
		'good' => 'Moderately healthy', // 3
		'fair' => 'Serious health conditions', // 2
	];
	public static $amount_range = [
		100000,
		200000,
		250000,
		300000,
		400000,
		500000,
		750000,
		1000000,
		//2000000,
		//3000000,
	];
	public static $yes_no = [
		1 => 'Yes',
		0 => 'No',
	];
	public static $genders = [
		'm' => 'Male',
		'f' => 'Female',
	];
	public static $payment_methods = [
		'payment-method-eft' => 'EFT Checking Account',
		#'payment-method-card' => 'Credit Card',
	];

	public function beforeSave($insert){
		if(parent::beforeSave($insert)){


			if( $this->scenario == 'dsr' ){
				return true;
			}
			
			$data = [];

			if(!$insert){

				$this->data = json_decode($this->data, true);
				$data       = $this->data;
		
			}

			foreach($this->scenarios()[$this->scenario] as $scenario){
				$data[$scenario] = $this->{$scenario};
			}

			//VarDumper::dump('beforeSave');
			$data['step'] = $this->scenario;
			if($this->scenario == $this::SCENARIO_QUOTE_RESULT){
				$data['step'] = 'term';
			}
			$u = explode($_SERVER['HTTP_HOST'], $_SERVER['HTTP_REFERER']);
			$data['referer'] = $u[1];
			$this->data   = json_encode($data);
			$this->user_ip = $_SERVER['HTTP_X_REAL_IP'];
			#VarDumper::dump($this->user_ip);

			return true;
		}

		return false;
	}

	public function update($runValidation = true, $attributeNames = null){
		return parent::update($runValidation, ['data', 'status', 'iniciator', 'user_ip', 'guess_price', 'guess_result']);
	}

    /**
     * @inheritdoc
     */
	public static function tableName(){
		return 'customer_data';
	}

    /**
     * @inheritdoc
     */
	public function scenarios(){
		$scenarios = parent::scenarios();
		
		$scenarios[self::SCENARIO_SELECT_COVERAGE] = ['avg_amount', 'term_length'];
		$scenarios[self::SCENARIO_OVERALL_HEALTH] = ['health', 'tobaco', 'sex'];
		$scenarios[self::SCENARIO_DATE_OF_BIRTH] = ['birthday'];
		$scenarios[self::SCENARIO_CONTACT_DETAILS] = ['first_name', 'last_name', 'state', 'zip', 'phone_number', 'email'];
		
		$scenarios[self::SCENARIO_TERM] = ['avg_amount', 'birthday', 'h_foot', 'h_inch', 'weight', 'sex', 'state', 'tobaco', 'term', 'status', 'iniciator', 'rate_class', 'monthly_premium', 'premium_amount'];
		$scenarios[self::SCENARIO_PI]   = ['first_name', 'middle_name', 'last_name', 'street_address', 'state', 'city', 'zip', 'phone_number', 'email'];
		$scenarios[self::SCENARIO_PI2]  = ['birth_state', 'birth_country', 'occupation', 'household_income', 'ssn', 'dls', 'dln',];
		$scenarios[self::SCENARIO_ADDQ] = ['questions'];
		$scenarios[self::SCENARIO_BENEFICIARY] = ['beneficiary', 'completed_application'];
		$scenarios[self::SCENARIO_PAYMENT] = ['payment', 'completed_application'];
		$scenarios[self::SCENARIO_SUCCESS] = ['success'];
		$scenarios[self::SCENARIO_PLAN] = ['agree'];
		$scenarios[self::SCENARIO_APPLY_NOW] = ['avg_amount', 'birthday', 'birth_day', 'birth_month', 'birth_year', 'h_foot', 'h_inch', 'weight', 'sex', 'first_name', 'last_name', 'phone_number', 'email', 'state', 'tobaco', 'term_length'];
		$scenarios[self::SCENARIO_APPLY_NOW_HOME] = ['avg_amount', 'birthday', 'h_foot', 'h_inch', 'weight', 'sex', 'first_name', 'last_name', 'phone_number', 'email', 'state', 'tobaco', 'term_length', 'reCaptcha'];
		$scenarios[self::SCENARIO_QUOTE_RESULT] = ['term', 'rate_class', 'monthly_premium', 'premium_amount', 'company_code', 'company_name', 'product_code', 'product_name'];
		$scenarios[self::SCENARIO_DSR] = ['status'];
		$scenarios[self::SCENARIO_COMPLETED] = ['status'];
		$scenarios[self::SCENARIO_IMQ] = ['im_questions'];
		$scenarios[self::SCENARIO_RATE_CALC] = ['age', 'sex', 'avg_amount', 'term_length', 'health', 'user_ip'];
		$scenarios[self::SCENARIO_RATE_CALC_TABLE] = ['age', 'sex', 'term_length', 'health', 'user_ip'];
		
		$scenarios[self::SCENARIO_APP_STEP_1] = ['first_name', 'middle_name', 'last_name', 'street_address', 'state', 'city', 'zip', 'phone_number', 'email'];
		$scenarios[self::SCENARIO_APP_STEP_2] = ['birth_state', 'birth_country', 'occupation', 'household_income', 'ssn', 'dls', 'dln', 'payment'];
		$scenarios[self::SCENARIO_APP_STEP_3] = ['beneficiary', 'completed_application'];
		$scenarios[self::SCENARIO_APP_STEP_QUESTIONS] = ['questions'];
		
		return $scenarios;
	}

    public function checkIsArray(){
    
    }

    /**
     * @inheritdoc
     */
	public function rules(){
		return [
			[['id', 'h_foot', 'h_inch', 'weight', 'term', 'ssn', 'zip', 'agree', 'age', 'guess_price', 'birth_day', 'birth_month', 'birth_year'], 'integer'],
			[['avg_amount'], 'string'],
			[['household_income', 'monthly_premium', 'premium_amount'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/'],
			[['last_name', 'first_name', 'sid', 'dls', 'step', 'birth_state', 'birth_country', 'occupation', 'status', 'iniciator', 'rate_class', 'completed_application', 'term_length', 'company_code', 'company_name', 'product_code', 'product_name', 'guess_result'], 'string', 'max' => 255],
			[['last_name', 'first_name'], 'validateFirstName'],
			[['middle_name'], 'validateMiddleName'],
			[['middle_name'], 'string', 'max' => 1],
			[['city'], 'validateCity'],
			[['city'], 'string', 'max' => 31],
			[['street_address'], 'validateStreetAddress'],
			[['street_address'], 'string', 'max' => 45],
			// [['zip'], 'integer'],
			[['zip'], 'string', 'length' => [5, 9]],
			// [['phone_number'], 'integer'],
			[['phone_number'], 'string', 'length' => [10, 14]],
			//[['phone_number'], 'number', 'numberPattern' => '([0-9]{3}) [0-9]{3}-[0-9]{4}'],
			[['occupation', 'health'], 'string', 'max' => 40], [
				['occupation'],
				'in',
				'not'   => true,
				'range' => [
					'Professional athlete',
					'Automobile racer',
					'Motorcycle racer',
					'Snowmobile racer',
					'Powerboat racer',
					'Major league baseball player',
					'Football player',
					'Soccer player',
					'Hockey player',
					'Rugby player',
					'Boxer',
					'Kickboxer',
					'Martial arts fighter',
					'Wrestler',
					'Pacific Northwest Fisherman',
					'Commercial Crab Fisherman',
			]],
			[['household_income'], 'string', 'max' => 12],
			[['ssn'], 'string', 'length' => [9, 9]],
			[['dln'], 'alphaNumeric'],
			[['dln'], 'string', 'max' => 20],
			[['form_name'], 'in', 'range' => ['term', 'pi', 'pi2']],
			[['data, questions, beneficiary, payment, im_questions', 'success'], 'string', 'max' => 5000],
			[['questions'], 'checkIsArray'],
			[['im_questions'], 'checkIsArray'],
			[['beneficiary'], 'checkIsArray'],
			[['payment'], 'checkIsArray'],
			[['success'], 'checkIsArray'],
			[['sex'], 'string', 'max' => 1],
			[['weight'], 'number', 'max' => 402, 'min' => 84],
			[['state'], 'string', 'max' => 2, 'min' => 2],
			[['tobaco'], 'in', 'range' => [0, 1]],
			[['email'], 'email'],
			[['email'], 'string', 'max' => 40],
			[['user_ip'], 'string', 'max' => 15],
			[['birthday'], 'date', 'format' => 'dd/mm/yyyy'],
			//[['birthday'], 'validateBirthday'],
			[['form_name', 'avg_amount', 'birthday', 'h_foot', 'h_inch', 'weight', 'sex', 'state', 'tobaco', 'term', 'status', 'iniciator', 'rate_class', 'monthly_premium', 'premium_amount'], 'required', 'on' => self::SCENARIO_TERM],
			[['form_name', 'first_name', 'middle_name', 'last_name', 'street_address', 'city', 'state', 'zip', 'phone_number', 'email'], 'required', 'on' => self::SCENARIO_PI],
			[['form_name', 'birth_state', 'birth_country', 'occupation', 'household_income', 'ssn', 'dls', 'dln'], 'required', 'on' => self::SCENARIO_PI2],
			[['questions'], 'required', 'on' => self::SCENARIO_ADDQ],
			[['im_questions'], 'required', 'on' => self::SCENARIO_IMQ],
			[['beneficiary', 'completed_application'], 'required', 'on' => self::SCENARIO_BENEFICIARY],
			[['payment', 'completed_application'], 'required', 'on' => self::SCENARIO_PAYMENT],
			[['success'], 'required', 'on' => self::SCENARIO_SUCCESS],
			[['agree'], 'required', 'on' => self::SCENARIO_PLAN],
			[['status'], 'required', 'on' => self::SCENARIO_DSR],
			[['status'], 'required', 'on' => self::SCENARIO_COMPLETED],
			//[['form_name', 'avg_amount', 'birthday', 'sex', 'height', 'weight', 'first_name', 'last_name', 'phone_number', 'email', 'term_length'], 'required', 'on' => self::SCENARIO_APPLY_NOW],
			[['reCaptcha'], 'required', 'on' => self::SCENARIO_APPLY_NOW_HOME],
			[['reCaptcha'], 'required', 'on' => self::SCENARIO_APPLY_NOW],
			[['agree'], 'in', 'range' => [1], 'message' => 'Please select checkbox'],
			[['age', 'sex', 'avg_amount', 'term_length', 'health', 'user_ip'], 'required', 'on' => self::SCENARIO_RATE_CALC],
			[['age', 'sex', 'term_length', 'health', 'user_ip'], 'required', 'on' => self::SCENARIO_RATE_CALC_TABLE],
			[['first_name', 'last_name', 'state', 'zip', 'phone_number', 'email'], 'required', 'on' => self::SCENARIO_CONTACT_DETAILS],
			[['redirect', 'referer'], 'safe'],
			[['reCaptcha'], ReCaptchaValidator3::className(),
				'threshold' => 0.1,
				#'secret' => 'your secret key', // unnecessary if reСaptcha is already configured
				#'action' => 'post',
			],
		];
	}

    /**
     * @inheritdoc
     */
	public function attributeLabels(){
		return [
			'id'               => 'ID',
			'sid'              => 'Sid',
			'data'             => 'Data',
			'user_ip'             => 'User IP',
			'guess_price'             => 'User guess price',
			'guess_result'             => 'User guess result',
			//'ssn'              => 'SSN',
			'first_name'       => 'First Name',
			'middle_name'      => 'Middle Name',
			'last_name'        => 'Last Name',
			'street_address'   => 'Street Address',
			'city'             => 'City',
			'state'            => 'State',
			'zip'              => 'Zip Code',
			'phone_number'     => 'Phone Number',
			'email'            => 'Email Address',
			'birth_state'      => 'Birth State',
			'birth_country'    => 'Birth Country',
			'occupation'       => 'Occupation',
			'household_income' => 'Household Income',
			'ssn'              => 'Social Security Number',
			'dln'              => 'Drivers License Number',
			'dls'              => 'Drivers License State',
			'status'              => 'Status',
			'iniciator'              => 'Iniciator',
			'term_length'              => 'Term length',
		];
	}

	public function decodeData(){
		return json_decode($this->data, true);
	}

	public function validateFirstName($attribute){
		if(!preg_match('/^[a-zA-Z-\'\s]*$/', $this->$attribute)){
			#VarDumper::dump($this->$attribute, 10, 1);
			#die('The only Special Characters allowed are Hyphen (-), Apostrophe (\') and blank space.');
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

	public function validateBirthday($attribute){
		if(!strtotime($this->$attribute)){
			$this->addError($attribute, $attribute . ' was not a valid date');
		}
	}

	public function get_user_guess_price(){
		$ret = 0;
		$model = self::find()->where(['sid' => Yii::$app->session->id, 'user_ip' => $_SERVER['HTTP_X_REAL_IP']])->one();
		#VarDumper::dump($model, 10, 1);

		if(!is_null($model)){
			$ret = intval($model->guess_price);
		}

		return $ret;
	}

	public function get_users_guessed_price(){
		$ret = [];
		$results = self::find()->where('guess_price > 0')->andWhere("sid != '".Yii::$app->session->id."'")->andWhere("user_ip != '".$_SERVER['HTTP_X_REAL_IP']."'")->all();
		//VarDumper::dump($users);

		if(!is_null($results)){
			foreach($results as $result){
				$ret[] = $result->guess_price;
			}
		}

		//VarDumper::dump($ret);

		return $ret;
	}

	public function get_high_low_guessed_prices_count($current_guess_price){
		$ret = ['high' => 0, 'low' => 0, 'total' => 0];

		$ret['total'] = self::find()->where('guess_price > 0')->andWhere("sid != '".Yii::$app->session->id."'")->andWhere("user_ip != '".$_SERVER['HTTP_X_REAL_IP']."'")->count();
		$ret['high'] = self::find()->where('guess_price > 0')->andWhere('guess_price > '.$current_guess_price)->andWhere("sid != '".Yii::$app->session->id."'")->andWhere("user_ip != '".$_SERVER['HTTP_X_REAL_IP']."'")->count();
		$ret['low'] = self::find()->where('guess_price > 0')->andWhere('guess_price < '.$current_guess_price)->andWhere("sid != '".Yii::$app->session->id."'")->andWhere("user_ip != '".$_SERVER['HTTP_X_REAL_IP']."'")->count();

		#VarDumper::dump($ret);

		return $ret;
	}

	public function get_guessed_prices_by_generations($current_guess_price){
		$ret = [
			'GenZ' => ['high' => 0, 'low' => 0, 'total' => 0],
			'Millennials' => ['high' => 0, 'low' => 0, 'total' => 0],
			'Generation X' => ['high' => 0, 'low' => 0, 'total' => 0],
			'Baby Boomers' => ['high' => 0, 'low' => 0, 'total' => 0],
			'Others' => ['high' => 0, 'low' => 0, 'total' => 0]
		];

		$y = intval(date('Y'));

		$results = self::find()->where('guess_price > 0')->andWhere("sid != '".Yii::$app->session->id."'")->andWhere("user_ip != '".$_SERVER['HTTP_X_REAL_IP']."'")->all();

		if(!is_null($results)){
			foreach($results as $result){
				$data = $result->decodeData();
				#VarDumper::dump($result->guess_price, 10, 1);
				if(isset($data['age'])){
					$born_year = $y - intval($data['age']);

					if($born_year >= 1996){
						$ret['GenZ']['total']++;
						if($result->guess_price > $current_guess_price){
							$ret['GenZ']['high']++;
						}else{
							$ret['GenZ']['low']++;
						}
					}elseif($born_year >= 1977 && $born_year <= 1995){
						$ret['Millennials']['total']++;
						if($result->guess_price > $current_guess_price){
							$ret['Millennials']['high']++;
						}else{
							$ret['Millennials']['low']++;
						}
					}elseif($born_year >= 1965 && $born_year <= 1976){
						$ret['Generation X']['total']++;
						if($result->guess_price > $current_guess_price){
							$ret['Generation X']['high']++;
						}else{
							$ret['Generation X']['low']++;
						}
					}elseif($born_year >= 1946 && $born_year <= 1964){
						$ret['Baby Boomers']['total']++;
						if($result->guess_price > $current_guess_price){
							$ret['Baby Boomers']['high']++;
						}else{
							$ret['Baby Boomers']['low']++;
						}
					}else{
						$ret['Others']['total']++;
						if($result->guess_price > $current_guess_price){
							$ret['Others']['high']++;
						}else{
							$ret['Others']['low']++;
						}
					}
				}
			}
		}

		#VarDumper::dump($ret);

		return $ret;
	}

	public function get_guessed_prices_by_generations_all(){
		$ret = [
			'GenZ'         => ['high' => 0, 'low' => 0, 'correct' => 0, 'total' => 0],
			'Millennials'  => ['high' => 0, 'low' => 0, 'correct' => 0, 'total' => 0],
			'Generation X' => ['high' => 0, 'low' => 0, 'correct' => 0, 'total' => 0],
			'Baby Boomers' => ['high' => 0, 'low' => 0, 'correct' => 0, 'total' => 0],
			'Others'       => ['high' => 0, 'low' => 0, 'correct' => 0, 'total' => 0]
		];

		$y = intval(date('Y'));

		$results = self::find()->where('guess_price > 0')->andWhere(['!=', 'guess_result', ''])->all();
		#VarDumper::dump($results, 10, 1);

		if(!is_null($results)){
			foreach($results as $result){
				$data = $result->decodeData();
				#VarDumper::dump($data, 10, 1);
				if(isset($data['age'])){
					$born_year = $y - intval($data['age']);
				}elseif(isset($data['birthday'])){
					$born_year = intval(date('Y', strtotime($data['birthday'])));
				}

				if($born_year >= 1996){
					$ret['GenZ']['total']++;
					$ret['GenZ'][$result->guess_result]++;
				}elseif($born_year >= 1977 && $born_year <= 1995){
					$ret['Millennials']['total']++;
					$ret['Millennials'][$result->guess_result]++;
				}elseif($born_year >= 1965 && $born_year <= 1976){
					$ret['Generation X']['total']++;
					$ret['Generation X'][$result->guess_result]++;
				}elseif($born_year >= 1946 && $born_year <= 1964){
					$ret['Baby Boomers']['total']++;
					$ret['Baby Boomers'][$result->guess_result]++;
				}else{
					$ret['Others']['total']++;
					$ret['Others'][$result->guess_result]++;
				}

			}
		}

		#VarDumper::dump($ret);

		return $ret;
	}

}
