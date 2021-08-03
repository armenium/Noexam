<?php

namespace app\components;

use Yii;
use yii\base\Component;

class Sagicor extends Component{

	protected $table_sbli_rates = 'sbli_rates';
	protected $table_nast_rates = 'nast_rates';
	protected $table_na_rates = 'na_rates';
	protected $table_sbli_prices = 'sbli_prices';
	protected $table_nast_prices = 'nast_prices';
	protected $table_na_prices = 'na_prices';
	protected $table_sagicor_rates = 'sagicor_rates';
	protected $table_sagicor_bands = 'sagicor_bands';
	protected $table_sagicor_10 = 'sagicor_10';
	protected $table_sagicor_15 = 'sagicor_15';
	protected $table_sagicor_20 = 'sagicor_20';

	private $Health_rate = [
		56 => [
			["Preferred", 83, 115], // Changed From Preferred Plus
			["Preferred", 115, 137],
			["Standard", 137, 147],
			["Rated", 147, 186]
		],
		57 => [
			["Preferred", 86, 120], // Changed From Preferred Plus
			["Preferred", 120, 142],
			["Standard", 142, 151],
			["Rated", 151, 192]
		],
		58 => [
			["Preferred", 89, 124], // Changed From Preferred Plus
			["Preferred", 124, 147],
			["Standard", 147, 155],
			["Rated", 155, 199]
		],
		59 => [
			["Preferred", 92, 128], // Changed From Preferred Plus
			["Preferred", 128, 152],
			["Standard", 152, 161],
			["Rated", 161, 206]
		],
		60 => [
			["Preferred", 94, 132], // Changed From Preferred Plus
			["Preferred", 132, 157],
			["Standard", 157, 166],
			["Rated", 166, 231]
		],
		61 => [
			["Preferred", 98, 136], // Changed From Preferred Plus
			["Preferred", 136, 164],
			["Standard", 164, 172],
			["Rated", 172, 220]

		],
		62 => [
			["Preferred", 102, 141], // Changed From Preferred Plus
			["Preferred", 141, 169],
			["Standard", 169, 178],
			["Rated", 178, 227]
		],
		63 => [
			["Preferred", 105, 146], // Changed From Preferred Plus
			["Preferred", 146, 174],
			["Standard", 174, 184],
			["Rated", 184, 235]
		],
		64 => [
			["Preferred", 108, 150], // Changed From Preferred Plus
			["Preferred", 150, 179],
			["Standard", 179, 190],
			["Rated", 190, 242]
		],
		65 => [
			["Preferred", 112, 155], // Changed From Preferred Plus
			["Preferred", 155, 184],
			["Standard", 184, 196],
			["Rated", 196, 250]
		],
		66 => [
			["Preferred", 115, 160], // Changed From Preferred Plus
			["Preferred", 160, 189],
			["Standard", 189, 202],
			["Rated", 202, 258]
		],
		67 => [
			["Preferred", 119, 165], // Changed From Preferred Plus
			["Preferred", 165, 194],
			["Standard", 194, 208],
			["Rated", 208, 265]
		],
		68 => [
			["Preferred", 122, 170], // Changed From Preferred Plus
			["Preferred", 170, 200],
			["Standard", 200, 215],
			["Rated", 215, 273]
		],
		69 => [
			["Preferred", 126, 174], // Changed From Preferred Plus
			["Preferred", 174, 205],
			["Standard", 205, 221],
			["Rated", 221, 282]
		],
		70 => [
			["Preferred", 129, 179], // Changed From Preferred Plus
			["Preferred", 179, 211],
			["Standard", 211, 228],
			["Rated", 228, 290]
		],
		71 => [
			["Preferred", 134, 184], // Changed From Preferred Plus
			["Preferred", 184, 216],
			["Standard", 216, 235],
			["Rated", 235, 298]
		],
		72 => [
			["Preferred", 137, 190], // Changed From Preferred Plus
			["Preferred", 190, 223],
			["Standard", 223, 242],
			["Rated", 242, 306]
		],
		73 => [
			["Preferred", 141, 194], // Changed From Preferred Plus
			["Preferred", 194, 228],
			["Standard", 228, 248],
			["Rated", 248, 315]
		],
		74 => [
			["Preferred", 145, 200], // Changed From Preferred Plus
			["Preferred", 200, 235],
			["Standard", 235, 255],
			["Rated", 255, 324]
		],
		75 => [
			["Preferred", 148, 205], // Changed From Preferred Plus
			["Preferred", 205, 241],
			["Standard", 241, 263],
			["Rated", 263, 333]
		],
		76 => [
			["Preferred", 152, 210], // Changed From Preferred Plus
			["Preferred", 210, 247],
			["Standard", 247, 270],
			["Rated", 270, 341]
		],
		77 => [
			["Preferred", 156, 216], // Changed From Preferred Plus
			["Preferred", 216, 254],
			["Standard", 254, 277],
			["Rated", 277, 350]
		],
		78 => [
			["Preferred", 161, 222], // Changed From Preferred Plus
			["Preferred", 222, 261],
			["Standard", 261, 284],
			["Rated", 284, 360]
		],
		79 => [
			["Preferred", 165, 228], // Changed From Preferred Plus
			["Preferred", 228, 268],
			["Standard", 268, 292],
			["Rated", 292, 369]
		],
		80 => [
			["Preferred", 169, 234], // Changed From Preferred Plus
			["Preferred", 234, 275],
			["Standard", 275, 299],
			["Rated", 299, 378]
		],
		81 => [
			["Preferred", 173, 240], // Changed From Preferred Plus
			["Preferred", 240, 282],
			["Standard", 282, 307],
			["Rated", 307, 388]
		],
		82 => [
			["Preferred", 178, 247], // Changed From Preferred Plus
			["Preferred", 247, 290],
			["Standard", 290, 315],
			["Rated", 315, 398]
		],
		83 => [
			["Preferred", 182, 253], // Changed From Preferred Plus
			["Preferred", 253, 298],
			["Standard", 298, 323],
			["Rated", 323, 408]
		],
	];
	private $DISALLOWED_STATES = [
		'sagicor' => ['AK', 'CT', 'ME', 'MT', 'NY', 'VT'],
		'sbli'    => ['NY', 'MT', 'CA', 'PA', 'AL', 'GA', 'IL', 'NJ', 'NC', 'SC', 'OH', 'IA', 'MN', 'FL', 'TX', 'MI', 'AZ', 'NV', 'AR', 'MD', 'LA', 'MA', 'CO', 'MO', 'WI', 'WA', 'OR', 'VA', 'UT', 'RI', 'IN', 'WV', 'KY', 'TN', 'NH', 'MS', 'KS', 'OK'],
		'na'      => ['NY']
	];
	private $FaceAmount;

	public function getSagicorPlans(array $args){
		$message = '';
		//VarDumper::dump($args, 10, 1);
		if(empty($args)){
			$request = Yii::$app->request;

			$post = $request->post();
			//VarDumper::dump($post, 10, 1);

			$this->FaceAmount = intval($request->post('avarage_amount')) * 1000;
			$birthdate        = $request->post('birthdate');
			$Height_ft        = $request->post('h_foot');
			$Height_in        = $request->post('h_inch');
			$weight           = $request->post('weight');
			$Smoker           = $request->post('tobaco');
			$Sex              = $request->post('sex');
			$State            = $request->post('state');
			$term_length      = false;
		}else{
			$this->FaceAmount = intval($args['avarage_amount']) * 1000;
			$birthdate        = $args['birthdate'];
			$Height_ft        = $args['h_foot'];
			$Height_in        = $args['h_inch'];
			$weight           = $args['weight'];
			$Smoker           = $args['tobaco'];
			$Sex              = $args['sex'];
			$State            = $args['state'];
			$term_length      = $args['term_length'];
		}
		$na_age           = $this->getAge($birthdate);
		$age              = $this->calculate_age($birthdate);
		$height           = $Height_ft * 12 + $Height_in;
		$HealthClass      = Helpers::rateCalc($Height_ft, $Height_in, $weight, $this->Health_rate);
		$_birthdates      = $this->getBirthdates($birthdate);
		$BirthMonth       = $_birthdates[0];
		$Birthday         = $_birthdates[1];
		$BirthYear        = $_birthdates[2];
		$FirstName        = '';
		$LastName         = '';
		$HomePhone        = '';
		$Email            = '';
		$form_short       = '';
		$referrer         = '';

		/*VarDumper::dump([
			$na_age, $age, $height, $HealthClass, $_birthdates
		], 10, 1);*/

		switch($Smoker){
			case 1:
				$Smok = 'Tobacco';
				break;
			case 0:
				$Smok = 'Non Tobacco';
				break;
		}

		// it will return one of these rate class string: PPNN, PNN, SNN, STNN, PN, STN
		$sbli_rate = $this->getSBLIRate(['Height_ft' => $Height_ft, 'Height_in' => $Height_in, 'weight' => $weight, 'smoker' => $Smoker]);
		$na_rate   = $this->getNARate(['Height_ft' => $Height_ft, 'Height_in' => $Height_in, 'sex' => $Sex, 'weight' => $weight, 'smoker' => $Smoker]);
		$nast_rate = $this->getNASTRate(['Height_ft' => $Height_ft, 'Height_in' => $Height_in, 'sex' => $Sex, 'weight' => $weight, 'smoker' => $Smoker]);
		//get sbli prices
		// $sbli_prices = $this->getSBLIPrices(['sex' => $Sex, 'type' => $sbli_rate, 'age' => $age, 'state' => $State]);
		//get na prices, it is using an independent age measurement system
		$na_prices   = $this->getNAPrices(['sex' => $Sex, 'type' => $na_rate, 'age' => $na_age, 'state' => $State]);
		$nast_prices = $this->getNASTPrices(['sex' => $Sex, 'type' => $nast_rate, 'age' => $na_age, 'state' => $State]);


		$Health    = Helpers::HealthClass2Health($HealthClass);
		$rateclass = Helpers::HealthClass2RateClass($HealthClass);

		$quotesdata = "";
		//        $terms = [10, 15, 20, 25, 30);
		$terms = [10 => 'Most Popular', 15 => 'Great Value', 20 => 'Best Value'];

		// build price array
		$prices = ['sagicor' => [], 'na' => []];
		// $sbli_band = getSBLIBand($this->FaceAmount);
		$na_band         = $this->getNABand($this->FaceAmount);
		$nast_band       = $this->getNABand($this->FaceAmount);
		$sbli_rate_class = $this->getSBLIRateClassName($sbli_rate);
		$na_rate_class   = $this->getNARateClassName($na_rate);
		$nast_rate_class = $this->getNARateClassName($nast_rate);

		//product collection information
		$product_collection = [
			'na'      => [
				'logo_url'          => 'http://noexam.staging.wpengine.com/wp-content/themes/no-exam-theme/images/na-logo.png',
				'product_name'      => 'NA Term',
				'phone_interview'   => 'Yes',
				'avg_approval_time' => 'Instant',
				'rate_class'        => $na_rate_class
			],
			'nast'    => [
				'logo_url'          => 'http://noexam.staging.wpengine.com/wp-content/themes/no-exam-theme/images/na-logo.png',
				'product_name'      => 'NA Simple Term',
				'phone_interview'   => 'Yes',
				'avg_approval_time' => 'Instant',
				'rate_class'        => $nast_rate_class
			],
			'sagicor' => [
				'logo_url'          => '/img/company_logos/logo_sagicor.png',
				'product_name'      => 'Sage Term',
				'phone_interview'   => 'No',
				'avg_approval_time' => '24 - 48 Hours',
				'rate_class'        => $rateclass
			],
			/* 'sbli' => [
				 'logo_url' => 'http://noexam.staging.wpengine.com/wp-content/themes/no-exam-theme/images/sb-logo.png',
				 'product_name' => 'SBLI Term',
				 'phone_interview' => 'Yes',
				 'avg_approval_time' => '3 - 6 Weeks',
				 'rate_class' => $sbli_rate_class
			 ]*/
		];

		foreach($na_prices as &$na_price){
			$na_price->annual  = $this->getNAPrice($na_price, $na_band, 'year');
			$na_price->monthly = $this->getNAPrice($na_price, $na_band, 'month');
			if($na_price->annual == 0 && $na_price->monthly == 0){
				continue;
			}
			$prices['na'][(string)$na_price->term] = $na_price;
		}

		foreach($nast_prices as &$nast_price){
			if($nast_band == 3 && $na_age >= 56){
				continue;
			}

			if($na_age >= 51 && $na_age <= 55 && $this->FaceAmount > 300000){
				continue;
			}

			if($na_age >= 56 && $na_age <= 60 && $this->FaceAmount > 200000){
				continue;
			}

			$nast_price->annual  = $this->getNAPrice($nast_price, $nast_band, 'year');
			$nast_price->monthly = $this->getNAPrice($nast_price, $nast_band, 'month');

			if($nast_price->annual == 0 && $nast_price->monthly == 0){
				continue;
			}

			$prices['nast'][(string)$nast_price->term] = $nast_price;
		}

		// this is for 10 year: sagicor
		if(!in_array($State, $this->DISALLOWED_STATES['sagicor'], true)){
			if($term_length !== false){
				switch($term_length){
					case 10:
						$len = 10;
						$cat = 3;
						break;
					case 15:
						$len = 15;
						$cat = 4;
						break;
					case 20:
						$len = 20;
						$cat = 5;
						break;
				}
				$prices['sagicor'][$len] = $this->getProducts($cat, $BirthMonth, $Birthday, $BirthYear, $Sex, $State, $Smoker, $Health, $this->FaceAmount, $FirstName, $LastName, $HealthClass, $HomePhone, $Email, $weight, $height, $Height_ft, $Height_in, $form_short, $referrer);
			}else{
				$prices['sagicor']['10'] = $this->getProducts(3, $BirthMonth, $Birthday, $BirthYear, $Sex, $State, $Smoker, $Health, $this->FaceAmount, $FirstName, $LastName, $HealthClass, $HomePhone, $Email, $weight, $height, $Height_ft, $Height_in, $form_short, $referrer);
				$prices['sagicor']['15'] = $this->getProducts(4, $BirthMonth, $Birthday, $BirthYear, $Sex, $State, $Smoker, $Health, $this->FaceAmount, $FirstName, $LastName, $HealthClass, $HomePhone, $Email, $weight, $height, $Height_ft, $Height_in, $form_short, $referrer);
				$prices['sagicor']['20'] = $this->getProducts(5, $BirthMonth, $Birthday, $BirthYear, $Sex, $State, $Smoker, $Health, $this->FaceAmount, $FirstName, $LastName, $HealthClass, $HomePhone, $Email, $weight, $height, $Height_ft, $Height_in, $form_short, $referrer);
			}
		}
		//VarDumper::dump($prices, 10, 1);

		foreach($prices['sagicor'] as $key => $value){
			if(!$value){
				unset($prices['sagicor'][$key]);
			}
		}

		if(!count($prices['na'])){
			unset($prices['na']);
		}

		if($age > 45 && $age <= 55 && $this->FaceAmount > 750000){
			unset($prices['sagicor']);
			$message = 'There are no available plans for your age and desired coverage amount. Please reduce the coverage amount to see available options.';
		}
		//VarDumper::dump($age, 10, 1);
		if($age > 55 && $age <= 65){
			if($this->FaceAmount <= 500000){
				if($Smoker == 'Y'){
					unset($prices['sagicor']['20']);
				}
			}else{
				unset($prices['sagicor']);
				$message = 'There are no available plans for your age and desired coverage amount. Please reduce the coverage amount to see available options.';
			}
		}
		// Remove NA products in any case!!!!! 18.08.18
		// if( $na_age == 50 ){
		unset($prices['na']);
		unset($prices['nast']);

		// }

		$gclid = '';
		$bingid = '';
		$url = "/post-page/";
		$plans = [];

		foreach($terms as $term => $label){
			// Remove block of terms if its doesn't has any term.
			$remove_line = 1;
			foreach($prices as $arr){
				if(array_key_exists($term, $arr)){
					$remove_line = 0;
					break;
				}
			}

			if($remove_line){
				continue;
			}

			foreach($product_collection as $product_key => $product_item){
				if($prices[$product_key][$term] && $prices[$product_key][$term]->annual > 0){
					$plans[$product_key][$term]['Company']           = $product_item['logo_url'];
					$plans[$product_key][$term]['label']             = $label;
					$plans[$product_key][$term]['Product']           = $product_item['product_name'];
					$plans[$product_key][$term]['rate']              = $product_item['rate_class'];
					$plans[$product_key][$term]['annual']            = number_format($prices[$product_key][$term]->annual, 2);
					$plans[$product_key][$term]['month']             = number_format($prices[$product_key][$term]->monthly, 2);
					$plans[$product_key][$term]['Phone-Interview']   = $product_collection[$product_key]['phone_interview'];
					$plans[$product_key][$term]['Avg-Approval-Time'] = $product_collection[$product_key]['avg_approval_time'];

					// Ninja Quoter format
					$plans[$product_key][$term]['company_code'] = 'sagicor';
					$plans[$product_key][$term]['company_name'] = 'Sagicor Life Insurance';
					$plans[$product_key][$term]['product_code'] = 'sagicor_sage_term_'.$term;
					$plans[$product_key][$term]['product_name'] = $product_item['product_name'].' '.$term;
					$plans[$product_key][$term]['policy_fee'] = '0.0';
					$plans[$product_key][$term]['rate_class_name'] = $product_item['rate_class'];
					$plans[$product_key][$term]['coverage'] = $this->FaceAmount;
					$plans[$product_key][$term]['term'] = $term;
					$plans[$product_key][$term]['premium_annual'] = number_format($prices[$product_key][$term]->annual, 2);
					$plans[$product_key][$term]['premium_monthly'] = number_format($prices[$product_key][$term]->monthly, 2);
					$plans[$product_key][$term]['premium_modal'] = null;
					$plans[$product_key][$term]['product_type'] = 'term';
					$plans[$product_key][$term]['logo_url'] = $product_item['logo_url'];
					$plans[$product_key][$term]['rating'] = 'A-';
					// end

					/*$plans[]['form']['url']                        = $url;
					$plans[]['form'][$product_key]['fFirstName']   = $FirstName;
					$plans[]['form'][$product_key]['fLastName']    = $LastName;
					$plans[]['form'][$product_key]['fHomePhone']   = $HomePhone;
					$plans[]['form'][$product_key]['fEmail']       = $Email;
					$plans[]['form'][$product_key]['fBirthMonth']  = $BirthMonth;
					$plans[]['form'][$product_key]['fBirthday']    = $Birthday;
					$plans[]['form'][$product_key]['fBirthYear']   = $BirthYear;
					$plans[]['form'][$product_key]['fSex']         = $Sex;
					$plans[]['form'][$product_key]['fState']       = $State;
					$plans[]['form'][$product_key]['fSmoker']      = $Smoker;
					$plans[]['form'][$product_key]['fHealthClass'] = $HealthClass;
					$plans[]['form'][$product_key]['fFaceAmount']  = $this->FaceAmount;
					$plans[]['form'][$product_key]['fheight']      = $height;
					$plans[]['form'][$product_key]['fHeight_ft']   = $Height_ft;
					$plans[]['form'][$product_key]['fHeight_in']   = $Height_in;
					$plans[]['form'][$product_key]['fweight']      = $weight;
					$plans[]['form'][$product_key]['fCatagory']    = $prices[$product_key][$term]->category;
					$plans[]['form'][$product_key]['form_short']   = $form_short;
					$plans[]['form'][$product_key]['referrer']     = $referrer;
					//fields from VAMdB
					$plans[]['form'][$product_key]['fterm']          = $term;
					$plans[]['form'][$product_key]['fpremium']       = number_format($prices[$product_key][$term]->monthly, 2);
					$plans[]['form'][$product_key]['fannualpremium'] = number_format($prices[$product_key][$term]->annual, 2);
					//undefined fields
					$plans[]['form'][$product_key]['fHealth']      = $Health;
					$plans[]['form'][$product_key]['fgclid_field'] = $gclid;
					$plans[]['form'][$product_key]['fbing_field']  = $bingid;
					if($product_key == 'sagicor'){
						$plans[]['form'][$product_key]['pageID'] = 2;
						//fields from VAMdB
						$plans[]['form'][$product_key]['frateclass']    = $HealthClass.' '.$Smok;
						$plans[]['form'][$product_key]['fproduct_name'] = 'Sage Term';
						$plans[]['form'][$product_key]['fcompany']      = 'Sagicor Life Insurance Company';
						$plans[]['form'][$product_key]['fproduct']      = 'SI - Sage Term '.$term.' (Simplified Issue)';
					}elseif($product_key == 'sbli'){
						$plans[]['form'][$product_key]['pageID'] = 100;
						//fields from VAMdB
						$plans[]['form'][$product_key]['frateclass'] = $product_item['rate_class'];
						$plans[]['form'][$product_key]['fcompany']   = 'SBLI';
						$plans[]['form'][$product_key]['fproduct']   = 'SBLI Term '.$term;
					}elseif($product_key == 'na' || $product_key == 'nast'){
						$plans[]['form'][$product_key]['pageID'] = 300;
						//fields from VAMdB
						$plans[]['form'][$product_key]['frateclass'] = $product_item['rate_class'];
						$plans[]['form'][$product_key]['fcompany']   = 'NA';
						if($product_key == 'na'){
							$plans[]['form'][$product_key]['fproduct_name'] = 'LifeVue Term';
						}else{
							$plans[]['form'][$product_key]['fproduct_name'] = 'Simple Term';
						}
						$plans[]['form'][$product_key]['fproduct'] = 'NA Term '.$term;
					}*/
					if($product_key == 'sagicor' && $age > 65){
						$message = 'Applicants applying with Sagicor that are over the age of 65 will be required to take a medical exam. Please check this box to acknowledge this.';
					}
				}
			}
		}

		//VarDumper::dump($plans, 10, 1);

		return ['message' => $message, 'plans' => $plans];
	}

	function getAge($birthdate){
		//VarDumper::dump($birthdate, 10, 1);
		/*if(strstr($birthdate, '/') !== false){
			$birthdate = str_replace('/', '.', $birthdate);
		}*/
		$birthdate = date('d.m.Y', strtotime($birthdate));
		//VarDumper::dump($birthdate, 10, 1);
		//exit;
		$interval = date_diff(date_create($birthdate.' 00:00:00'), date_create());
		$age      = $interval->format('%Y');

		if($interval->format('%M') > 6){
			$age++;
		}

		return $age;
	}

	function calculate_age($birthday){
		$birthday_timestamp = strtotime($birthday);
		$age                = date('Y') - date('Y', $birthday_timestamp);

		if(date('md', $birthday_timestamp) > date('md')){
			$age--;
		}

		return $age;
	}

	function getBirthdates($birthdate){
		/*$t = strtotime($birthdate);
		$d = date('d', $t);
		$m = date('n', $t);
		$y = date('Y', $t);
		return [$m, $d, $y];*/
		return explode('/', $birthdate);
	}

	function PostToHost($host, $path, $data_to_send){
		$fp  = fsockopen($host, 80);
		$rf1 = @$_SERVER['HTTP_HOST'];
		$rf2 = @$_SERVER['SCRIPT_NAME'];
		$rf3 = @$_SERVER['SCRIPT_FILENAME'];

		fputs($fp, "POST $path HTTP/1.1\n");
		fputs($fp, "Host: $host\n");
		fputs($fp, "Referer: $rf1$rf2\r\n");
		fputs($fp, "Ref2: $rf3\r\n");
		fputs($fp, "Content-type: application/x-www-form-urlencoded\n");
		fputs($fp, "Content-length: ".strlen($data_to_send)."\n");
		fputs($fp, "Connection: close\n\n");
		fputs($fp, $data_to_send);

		$y = 0;
		while(!feof($fp)){
			$datavalue = fgets($fp, 1280);
			if(preg_match("/VAMdB/", $datavalue)){
				$result[$y] = $datavalue;
				$y++;
			}
		}
		fclose($fp);

		return $result;
	}

	// Get offers
	function getProducts($cat, $BirthMonth, $Birthday, $BirthYear, $Sex, $State, $Smoker, $Health, $FaceAmount, $FirstName, $LastName, $HealthClass, $HomePhone, $Email, $weight, $height, $Height_ft, $Height_in, $form_short, $referrer){

		$host = "www.vamdb.com";
		$path = "/quotes/qts.php";
		$Cat = $cat;
		//	$dataA = "BirthMonth=$BirthMonth&Birthday=$Birthday&BirthYear=$BirthYear&Sex=$Sex&State=$State&Smoker=$Smoker&Health=$Health&FaceAmount=$FaceAmount&NewCategory=$Cat&ModeUsed=M&usl=JH74964HS7&cid=dfg84kd84ks3";
		// var_dump($HealthClass);
		$dataDB = [
			'Birthday'    => $BirthYear.'-'.$BirthMonth.'-'.$Birthday,
			'Sex'         => $Sex,
			'FaceAmount'  => $FaceAmount,
			'HealthClass' => $HealthClass,
			'Smoker'      => $Smoker,
			'Health'      => $Health,
			'Cat'         => $Cat
		];

		// $resA = PostToHost($host, $path, $dataA);
		// echo "<pre>";
		// var_dump($resA);
		// echo "</pre>";
		//VarDumper::dump($dataDB, 10, 1);
		$resNew = $this->PostToDB($dataDB);
		//VarDumper::dump($resNew, 10, 1);
		switch($Cat){
			case '5':
				$Term = '20';
				break;
			case '4':
				$Term = '15';
				break;
			case '3':
				$Term = '10';
				break;

		}

		$obj = new \stdClass();

		// prepered data
		if($resNew[0] != null){
			$resDb = "";
			$resDb .= "Sagicor Life Insurance Company";
			$resDb .= " VAMdB ";
			$resDb .= "SI - Sage Term ".$Term." (Simplified Issue)";
			$resDb .= " VAMdB ";
			$resDb .= $resNew[0]['price'];
			$resDb .= " VAMdB ";
			$resDb .= $HealthClass.' '.$Smok;
			$resDb .= " VAMdB ";
			$resDb .= $resNew[0]['price'] * 12;
			$resDb .= " VAMdB ";
			$resDb .= "SAGI";
			$resA  = ['0' => $resDb];

			$coef            = $dataDB['FaceAmount'] / 1000;
			$annual          = round($resNew[0]['price'] * $coef * 1 + 70, 2);
			$monthly         = round($resNew[0]['price'] * $coef * 0.09 + 70 * 0.09, 2);
			$obj->annual     = $annual;
			$obj->monthly    = $monthly;
			$obj->rate_class = $HealthClass.' '.$Smok;
			$obj->category   = $Cat;
			//VarDumper::dump($obj, 10, 1);
			return $obj;
		}else{
			$resA = '';
		}

		return false;
	}

	// get rate for SBLI
	function getSBLIRate($data){
		$sql    = "SELECT * FROM $this->table_sbli_rates WHERE `foot` = :foot  AND `inch` = :inch";
		$result = Yii::$app->db->createCommand($sql, [
			':foot' => $data['Height_ft'],
			':inch' => $data['Height_in']
		])->queryAll();

		if(!$result){
			return null;
		}

		if($data['smoker'] == 'N'){
			if($data['weight'] <= $result[0]->ppnn_hi){
				return 'PPNN';
			}else if($data['weight'] <= $result[0]->pnn_hi){
				return 'PNN';
			}else if($data['weight'] <= $result[0]->snn_hi){
				return 'SNN';
			}else if($data['weight'] <= $result[0]->stnn_hi){
				return 'STNN';
			}
		}else{
			if($data['weight'] <= $result[0]->pn_hi){
				return 'PN';
			}else if($data['weight'] <= $result[0]->stn_hi){
				return 'STN';
			}else{
				return '';
			}
		}

	}

	// get rate for NA
	function getNARate($data){
		$sql    = "SELECT * FROM $this->table_na_rates WHERE foot = :foot  AND inch = :inch AND sex = :sex";
		$result = Yii::$app->db->createCommand($sql, [
			':foot' => $data['Height_ft'],
			':inch' => $data['Height_in'],
			':sex'  => $data['sex']
		])->queryAll();

		if(!$result){
			return null;
		}

		if($data['smoker'] == 'N'){
			if($data['weight'] >= $result[0]->sp_lo && $data['weight'] <= $result[0]->sp_hi){
				return 'PP'; //super preferred, preferred plus
			}else if($data['weight'] >= $result[0]->p_lo && $data['weight'] <= $result[0]->p_hi){
				return 'P';
			}else if($data['weight'] >= $result[0]->snt_lo && $data['weight'] <= $result[0]->snt_hi){
				return 'NT';
			}else if($data['weight'] >= $result[0]->ssnt_lo && $data['weight'] <= $result[0]->ssnt_hi){
				return 'SSNT';
			}
		}else{
			if($data['weight'] >= $result[0]->sp_lo && $data['weight'] <= $result[0]->p_hi){
				return 'PT';
			}else if($data['weight'] >= $result[0]->snt_lo && $data['weight'] <= $result[0]->snt_hi){
				return 'T';
			}/*else if ($data['weight'] >= $result[0]->ssnt_lo && $data['weight'] <= $result[0]->ssnt_hi) {
				return 'SST';
			}*/
		}

		return '';
	}

	// get rate for NAST
	function getNASTRate($data){
		$sql    = "SELECT * FROM $this->table_nast_rates WHERE foot = :foot  AND inch = :inch";
		$result = Yii::$app->db->createCommand($sql, [
			':foot' => $data['Height_ft'],
			':inch' => $data['Height_in']
		])->queryAll();

		if(!$result){
			return null;// remove
		}

		if($data['smoker'] == 'N'){
			if($data['weight'] >= $result[0]->snt_lo && $data['weight'] <= $result[0]->snt_hi){
				return 'NT';
			}
		}else{
			if($data['weight'] >= $result[0]->snt_lo && $data['weight'] <= $result[0]->snt_hi){
				return 'T';
			}/*else if($data['weight'] >= $result[0]->ssnt_lo && $data['weight'] <= $result[0]->ssnt_hi){
				return 'SST';
			}*/
		}

		return '';
	}

	// generate sbli rate class name
	function getSBLIRateClassName($type){
		if($type == 'PPNN'){
			return 'Preferred + Non-Nicotine';
		}else if($type == 'PNN'){
			return 'Preferred Non-Nicotine';
		}else if($type == 'SNN'){
			return 'Select Non-Nicotine';
		}else if($type == 'STNN'){
			return 'Standard Non-Nicotine';
		}else if($type == 'PN'){
			return 'Preferred Nicotine';
		}else if($type == 'STN'){
			return 'Standard Nicotine';
		}

		return 'Unknown';
	}

	// generate na rate class name
	function getNARateClassName($type){
		if($type == 'PP'){
			return 'Preferred Plus'; // Super Plus = Referred Plus
		}else if($type == 'P'){
			return 'Preferred';
		}else if($type == 'NT'){
			return 'Standard Non Tobacco';
		}else if($type == 'SSNT'){
			return 'Sub Standard Non Tobacco';
		}else if($type == 'PT'){
			return 'Preferred Tobacco';
		}else if($type == 'T'){
			return 'Tobacco';
		}else if($type == 'SST'){
			return 'Sub Standard Tobacco';
		}

		return 'Unknown';
	}

	// Get Annual Price: SBLI
	function getSBLIAnnualPrice($sbli_price, $band){
		// (500*.276+72)
		// $500: $500,000 / 1000, $72: fee : Constant

		$price = 0;
		if($band == 1){
			$price = $sbli_price->band1;
		}else if($band == 2){
			$price = $sbli_price->band2;
		}else if($band == 3){
			$price = $sbli_price->band3;
		}else if($band == 4){
			$price = $sbli_price->band4;
		}else if($band == 5){
			$price = $sbli_price->band5;
		}else{
			return 0;
		}

		return ($this->FaceAmount / 1000.0 * $price + 72);
	}

	// Get Annual Price: NA
	function getNAPrice($na_price, $band, $duration){

		// $1.20 * 250 * 1 + $65
		// 250: $this->FaceAmount / 1000, $65: annual

		$price = 0;
		if($band == 1){
			$price = $na_price->band1;
		}else if($band == 2){
			$price = $na_price->band2;
		}else if($band == 3){
			$price = $na_price->band3;
		}else{
			return 0;
		}

		if($duration == 'year'){
			return ($this->FaceAmount / 1000.0 * $price * 1 + 65);
		}else if($duration == 'semi'){
			return ($this->FaceAmount / 1000.0 * $price * 0.522 + 33.93);
		}else if($duration == 'quarter'){
			return ($this->FaceAmount / 1000.0 * $price * 0.274 + 17.81);
		}else if($duration == 'month'){
			return ($this->FaceAmount / 1000.0 * $price * 0.088 + 5.72);
		}

	}

	// Get SBLI Band
	function getSBLIBand($amount){
		if($amount >= 100000 && $amount <= 249999){
			return 1;
		}else if($amount >= 250000 && $amount <= 499999){
			return 2;
		}else if($amount == 500000){
			return 3;
		}else if($amount >= 500001 && $amount <= 999999){
			return 4;
		}else if($amount >= 100000){
			return 5;
		}

		return 0;
	}

	// Get NA Band
	function getNABand($amount){
		if($amount >= 50000 && $amount <= 99999){
			return 1;
		}else if($amount >= 100000 && $amount <= 249999){
			return 2;
		}else if($amount >= 250000 && $amount <= 500000){
			return 3;
		}

		return 0;
	}

	// returns the record filtered by age, type, sex
	function getSBLIPrices($data){

		if(in_array($data['state'], $this->DISALLOWED_STATES['sbli'], true)){
			return [];
		}

		$sql    = "SELECT * FROM $this->table_sbli_prices WHERE age = :age  AND type = :type AND sex = :sex";
		$result = Yii::$app->db->createCommand($sql, [
			':age' => $data['age'],
			':type' => $data['type'],
			':sex' => $data['sex']
		])->queryAll();

		return $result;

	}

	// returns the na company record filtered by age, type, sex
	function getNAPrices($data){

		if(in_array($data['state'], $this->DISALLOWED_STATES['na'], true)){
			return [];
		}

		$sql    = "SELECT * FROM $this->table_na_prices WHERE age = :age  AND type = :type AND sex = :sex";
		$result = Yii::$app->db->createCommand($sql, [
			':age' => $data['age'],
			':type' => $data['type'],
			':sex' => $data['sex']
		])->queryAll();

		return $result;

	}

	// returns the na company record filtered by age, type, sex
	function getNASTPrices($data){

		if(in_array($data['state'], $this->DISALLOWED_STATES['na'], true)){
			return [];
		}

		$sql    = "SELECT * FROM $this->table_nast_prices WHERE age = :age  AND type = :type AND sex = :sex";
		$result = Yii::$app->db->createCommand($sql, [
			':age' => $data['age'],
			':type' => $data['type'],
			':sex' => $data['sex']
		])->queryAll();

		return $result;

	}

	function PostToDB($data){

		$band = $this->choose_sagicor_band($data['FaceAmount']);
		//VarDumper::dump($band, 10, 1);
		$age  = $this->calculate_age($data['Birthday']);

		switch(strtoupper($data['Sex'])){
			case 'M':
				$sex = 'male';
				break;
			case 'F':
				$sex = 'female';
				break;
		}

		switch($data['Smoker']){
			case '1':
				$Smoker = 'T';
				break;
			case '0':
				$Smoker = 'NT';
				break;
		}

		$Health = $data['Health'];

		if($data['Health'] == 'RP'){
			$Health = 'S';
		}

		switch($data['Cat']){
			case '5':
				$term = '20';
				break;
			case '4':
				$term = '15';
				break;
			case '3':
				$term = '10';
				break;
		}


		$sql    = "SELECT * FROM $this->table_sagicor_rates WHERE term = :term AND sex = :sex  AND age = :age  AND band = :band  AND type = :type";
		$where = [
			':term' => $term,
			':sex'  => $sex,
			':age'  => $age,
			':band' => $band['name'],
			':type' => $Health.$Smoker
		];
		$result = Yii::$app->db->createCommand($sql, $where)->queryAll();

		//VarDumper::dump($result, 10, 1);

		return $result;
	}

	function choose_sagicor_band($amount){
		$sql    = "SELECT * FROM $this->table_sagicor_bands WHERE ".$amount." BETWEEN min AND max OR ".$amount." IN(min, max)";
		$result = Yii::$app->db->createCommand($sql)->queryAll();
		//VarDumper::dump($result, 10, 1);
		return $result[0];
	}

}

