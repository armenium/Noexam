<?php
namespace app\components;
use app\models\Answers;
use app\models\CustomerData;
use app\models\Questions;
use app\models\RatesDataCache;
use app\models\RatesDataStatistic;
use app\models\Subquestions;
use rudissaar\fpdf\FPDFPlus;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Cookie;
use app\models\ResourcesCats;
use app\models\ResourcesGrid;
use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;
use yii\web\Request;
use yii\db\Query;

//use app\components\BaseController;

class BaseController extends Controller{

	public $body_class = '';
	public $country_code = '';
	public $state_code = '';
	public $postal_code = '';
	public $generation_rules = [
		'GenZ'         => ['min' => 1996, 'max' => 2029],
		'Millennials'  => ['min' => 1977, 'max' => 1995],
		'Generation X' => ['min' => 1965, 'max' => 1976],
		'Baby Boomers' => ['min' => 1946, 'max' => 1964],
		'Others'       => ['min' => 1900, 'max' => 1945],
	];
	public $healths_by_ladder = [
		5 => 'excellent',
		4 => 'very-good',
		3 => 'good',
		2 => 'fair',
		1 => 'fair',
	];
	public $healths_by_ninjaquoter = [
		'pp' => 'excellent',
		'p' => 'very-good',
		'sp' => 'good',
		's' => 'fair',
	];

	public function init(){
		parent::init();

	}

	public function beforeAction($action){

		parent::beforeAction($action);
	    $session = Yii::$app->session;
	    $session->open();
		//$session->set('expire', 3600);
		//$session->set('lifetime', 3600);
	    // print_r($session->id);
		$this->getStateIsoCode();
	    return true;

	}

	public function getBodyClasses($classes = ''){
		$body_class = [
			$classes,
			Yii::$app->controller->id,
			Yii::$app->controller->action->id,
			Yii::$app->controller->body_class,
		];
		$request = Yii::$app->request;

		$url = $request->url;
		if(strstr($url, '?') !== false){
			$a = explode('?', $url);
			$url = $a[0];
		}
		$url = str_replace('-', '', $url);
		$a = explode('/', $url);
		if(count($a)){
			$body_class = array_unique(array_merge($body_class, $a));
		}

		return implode(' ', $body_class);
	}

	public function getNaRate($na_rates, $weight, $smoker){
		if(!$smoker){
			if($weight >= $na_rates[0]->sp_lo && $weight <= $na_rates[0]->sp_hi){
				return 'PP';
			}else if($weight >= $na_rates[0]->p_lo && $weight <= $na_rates[0]->p_hi){
				return 'P';
			}else if($weight >= $na_rates[0]->snt_lo && $weight <= $na_rates[0]->snt_hi){
				return 'NT';
			}else if($weight >= $na_rates[0]->ssnt_lo && $weight <= $na_rates[0]->ssnt_hi){
				return 'SSNT';
			}
		}else{
			if($weight >= $na_rates[0]->sp_lo && $weight <= $na_rates[0]->p_hi){
				return 'PT';
			}else if($weight >= $na_rates[0]->snt_lo && $weight <= $na_rates[0]->snt_hi){
				return 'T';
			}
		}
	}

	public function getNaPrices(){}

	public function getNaBand($avarage_amount){
		if($avarage_amount >= 50000 && $avarage_amount <= 99999){
			return 1;
		}else if($avarage_amount >= 100000 && $avarage_amount <= 249999){
			return 2;
		}else if($avarage_amount >= 250000 && $avarage_amount <= 500000){
			return 3;
		}
	}

	public function getAge($birthdate){
		/*
		//explode the date to get month, day and year
		$birthDate = explode("/", $birthdate);
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
		  ? ((date("Y") - $birthDate[2]) - 1)
		  : (date("Y") - $birthDate[2]));
		return $age;*/
		$birthdate = str_replace('/', '.', $birthdate);
		//VarDumper::dump($birthdate, 10, 1); exit;
		$interval = date_diff(date_create($birthdate.' 00:00:00'), date_create());
		$age      = $interval->format('%Y');

		if($interval->format('%M') > 6){
			$age++;
		}

		return $age;
	}

	public function getCustomerViewData($customer_data){
		$ret = [];
		$ret['age'] = $this->formatCustomerValue('age', $customer_data->birthday);
		$ret['gender'] = $this->formatCustomerValue('gender', $customer_data->sex);
		$ret['amount'] = $this->formatCustomerValue('amount', $customer_data->avg_amount);
		$ret['tobaco'] = $this->formatCustomerValue('tobaco', $customer_data->tobaco);
		$ret['state'] = $this->formatCustomerValue('state', $customer_data->state);

		return (object) $ret;
	}

	public function formatCustomerValue($field, $value){
		$ret = $value;

		switch($field){
			case "gender":
				switch($value){
					case "m":
						$ret = 'Male';
						break;
					case "f":
						$ret = 'Female';
						break;
				}
				break;
			case "amount":
				$ret = '$'.number_format(($value * 1000), 0, '.', ',');
				break;
			case "tobaco":
				switch($value){
					case "0":
						$ret = 'That does not use Tobacco';
						break;
					case "1":
						$ret = 'That does use Tobacco';
						break;
				}
				break;
			case "age":
				$interval = date_diff(date_create($value.' 00:00:00'), date_create());
				$ret      = $interval->format('%Y');

				if($interval->format('%M') > 6){
					$ret++;
				}
				break;
			case "state":
				$ret = CustomerData::$states[$value];
				break;
		}

		return $ret;
	}

	public function calculateAllPrices($na_prices, $avarage_amount, $band){
		$terms = [];
		foreach($na_prices as $term){
			$terms[$term->term]['year']    = ($avarage_amount / 1000.0 * $term->{'band'.$band} * 1 + 65);
			$terms[$term->term]['semi']    = ($avarage_amount / 1000.0 * $term->{'band'.$band} * 0.522 + 33.93);
			$terms[$term->term]['quarter'] = ($avarage_amount / 1000.0 * $term->{'band'.$band} * 0.274 + 17.81);
			$terms[$term->term]['month']   = ($avarage_amount / 1000.0 * $term->{'band'.$band} * 0.088 + 5.72);
		}

		return $terms;
	}

	public function getStepUrl($step = null){
		switch($step){
			case 'apply-now':
				return '/apply-now/quote-result/';
				break;
			case 'quote-result':
				return '/personalinfo/';
				break;
			case 'term':
				return '/personalinfo/';
				break;
			case 'plan-information':
				return '/personalinfo/';
				break;
			case 'personal-info':
				return '/personalinfo2/';
				break;
			case 'personal-info2':
				return '/questions2/';
				break;
			case 'add-question':
				return '/questions2/';
				break;
			case 'beneficiary':
				return '/beneficiary/';
				break;
			case 'paymentinfo':
				return '/paymentinfo/';
				break;
			case 'success':
				return '/success/';
				break;
			default:
				return '/';
				break;
		}
	}

    public function createGuid(){
        if (function_exists('com_create_guid') === true){
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    /**
     * Function will search through the array by needle
     * @param  array $arr Array where will be serach.
     * @param  string $key Needle which
     * @return mixed      [description]
     */
    public function arraySearchRecursive($arr, $key, $preparedQuestionsData){
        $result = false;

        if(array_key_exists($key, $arr)){
            return true;
        }

        foreach ($arr as $keyeach => $value) {
            if(is_array($value)){
               $res = $this->arraySearchRecursive($value, $key, $preparedQuestionsData);
               if($res == true){
                    if($res === true){
                      $result[$keyeach] = $preparedQuestionsData;
                    }else{
                        $result[$keyeach] = $res;
                    }
                    break;
               }
            }
        }

        return $result;
    }

    public function arraySearchRecursive2(array &$arr, $key, array $data){

    	if(array_key_exists($key, $arr)){
    		if(is_array($data)){
    			$data_key = key($data);
    			reset($data);
    			if(array_key_exists($data_key, $arr[$key])){
    				$arr[$key][$data_key] = $data[$data_key];
    				return $arr;
    			}else{

    				 $arr[$key] = array_merge($arr[$key], $data);
    				 return $arr;

    			}
    		}
    	}

    	foreach ($arr as $key_each => $value_each) {

    		if(is_array($value_each)){

    			$res = $this->arraySearchRecursive2($value_each, $key, $data);

    			if($res){
    				$arr[$key_each] = $res;
    				return $arr;
    			}

    		}else{
    			continue;
    		}

    	}

    	return false;

    }

    public function getFormInstance(){

        // header("Content-Type: text/xml; charset=utf-8");
        $request = Yii::$app->request;
        $session = Yii::$app->session;

        $customer_data = CustomerData::find()->where(['sid'=>$session->id])->one();
        $json_decoded = json_decode($customer_data->data, true);
       /* print_r($json_decoded['questions']);
        die;*/
        $ARDCounter = 1;
        $FRCounter = 2;
        $FRCounterLvl1 = 1;
        $FRCounterLvl2 = 1;
        $FRCounterLvl3 = 1;
        $FRCounterLvl4 = 1;
        $XML = '';
        /*$XML .= '<?xml version="1.0" encoding="utf-8"?>';*/
        $XML .=  '<FormInstance id="Form_1">';
        // $mainQuesstions = Questions::find()->where(['type'=>'question'])->all();

        foreach ($json_decoded['questions'] as $mainQusteionName => $mainQuestions) {
            $FRCounterLvl1 = ($FRCounter==2)?1:$FRCounter++;
            // $subQuestions = $mainQuestion->subquestion;
            $q_data = Questions::find()->where(['xml_num'=>$mainQusteionName])->one();
            $XML .=  '<FormResponse id="Form_Response_'.$FRCounterLvl1++.'">';
            $XML .=  '<QuestionNumber>'.$q_data->xml_num.'</QuestionNumber>';
            $XML .=  '<QuestionText>'.$q_data->text.'</QuestionText>';

            if($mainQuestions['answer']){
                $XML .=  '<ResponseCode>'.(($mainQuestions['answer']=='yes')?1:2).'</ResponseCode>';
                $XML .=  '<ResponseData>'.$mainQuestions['answer'].'</ResponseData>';
            }

            if($q_data->group_num){
                $XML .=  '<SectionIdentifier>'.$q_data->group_num.'</SectionIdentifier>';
            }

            if($mainQuestions){
                $FRCounterLvl1=$FRCounter;
                foreach ($mainQuestions as $q_name => $mainQuestion) {
                    if($q_name=='answer') continue;
                    $XML .=  '<AssociatedResponseData id="Assoc_Response_Data_'.$ARDCounter++.'" ActualObjectID="Form_Response_'.$FRCounter++.'"/>';
                }

            }

            $XML .=  '</FormResponse>';

             if($mainQuestions){

                $FRCounterLvl2=$FRCounter;
                foreach ($mainQuestions as $mq_name => $subQuestions) {
                    $reflexQuestions = $subQuestions->reflexquestion;
                    $q_data = Questions::find()->where(['xml_num'=>$mq_name])->one();
                    $XML .=  '<FormResponse id="Form_Response_'.$FRCounterLvl1++.'">';
                    $XML .=  '<QuestionNumber>'.$q_data->xml_num.'</QuestionNumber>';
                    $XML .=  '<QuestionText>'.$q_data->text.'</QuestionText>';

                    if($subQuestions['answer']){
                        $XML .=  '<ResponseCode>'.(($subQuestions['answer']=='y')?1:2).'</ResponseCode>';
                        $XML .=  '<ResponseData>'.$subQuestions['answer'].'</ResponseData>';
                    }
                    if($q_data->group_num){
                        $XML .=  '<SectionIdentifier>'.$q_data->group_num.'</SectionIdentifier>';
                    }

                    if($subQuestions){
                        $FRCounterLvl2=$FRCounter;
                        foreach ($subQuestions as $subq_name => $reflexQuestion) {
                            if($subq_name=='answer') continue;
                            $XML .=  '<AssociatedResponseData id="Assoc_Response_Data_'.$ARDCounter++.'" ActualObjectID="Form_Response_'.$FRCounter++.'"/>';
                        }

                    }

                    $XML .=  '</FormResponse>';

                    if($subQuestions){

                        $FRCounterLvl3 = $FRCounter;
                        foreach ($subQuestions as $mq_name => $reflexQuestion) {
                            if($mq_name=='answer') continue;
                            $reflexQuestionsLvl2 = $reflexQuestion->reflexquestion;

                            $q_data = Questions::find()->where(['xml_num'=>$mq_name])->one();
                            $XML .=  '<FormResponse id="Form_Response_'.$FRCounterLvl2++.'">';
                            $XML .=  '<QuestionNumber>'.$q_data->xml_num.'</QuestionNumber>';
                            $XML .=  '<QuestionText>'.$q_data->text.'</QuestionText>';

                            if($reflexQuestion['answer']){
                                $XML .=  '<ResponseCode>'.(($reflexQuestion['answer']=='y')?1:2).'</ResponseCode>';
                                $XML .=  '<ResponseData>'.$reflexQuestion['answer'].'</ResponseData>';
                            }
                            if($q_data->group_num){
                                $XML .=  '<SectionIdentifier>'.$q_data->group_num.'</SectionIdentifier>';
                            }

                            if($reflexQuestion){
                                $FRCounterLvl3=$FRCounter;
                                foreach ($reflexQuestion as $subq_name => $reflexQuestion_item) {
                                    if($subq_name=='answer') continue;
                                    $XML .=  '<AssociatedResponseData id="Assoc_Response_Data_'.$ARDCounter++.'" ActualObjectID="Form_Response_'.$FRCounter++.'"/>';
                                }

                            }

                            $XML .= '</FormResponse>';

                            if($reflexQuestion){
                                $FRCounterLvl4 = $FRCounter;
                                foreach ($reflexQuestion as $mq_name => $reflexQuestion) {

                                  if($mq_name=='answer') continue;
                                  $reflexQuestionsLvl2 = $reflexQuestion->reflexquestion;

                                  $q_data = Questions::find()->where(['xml_num'=>$mq_name])->one();
                                  $XML .=  '<FormResponse id="Form_Response_'.$FRCounterLvl3++.'">';
                                  $XML .=  '<QuestionNumber>'.$q_data->xml_num.'</QuestionNumber>';
                                  $XML .=  '<QuestionText>'.$q_data->text.'</QuestionText>';

                                  if($reflexQuestion['answer']){
                                      $XML .=  '<ResponseCode>'.(($reflexQuestion['answer']=='y')?1:2).'</ResponseCode>';
                                      $XML .=  '<ResponseData>'.$reflexQuestion['answer'].'</ResponseData>';
                                  }
                                  if($q_data->group_num){
                                      $XML .=  '<SectionIdentifier>'.$q_data->group_num.'</SectionIdentifier>';
                                  }

                                  if($reflexQuestion){
                                      $FRCounterLvl4=$FRCounter;
                                      foreach ($reflexQuestion as $subq_name => $reflexQuestion) {
                                          if($subq_name=='answer') continue;
                                          $XML .=  '<AssociatedResponseData id="Assoc_Response_Data_'.$ARDCounter++.'" ActualObjectID="Form_Response_'.$FRCounter++.'"/>';
                                      }

                                  }

                                  $XML .= '</FormResponse>';
                                }
                            }
                        }

                    }




                }
             }
        }
     $XML .=  '</FormInstance>';
     return $XML;
    }

    public function generatePDFReport( $leadtype = 25, $ssid = NULL ){

	    if(is_null($ssid)){
		    $session = Yii::$app->session;
		    $ssid    = $session->id;
	    }

	    $customer_data = CustomerData::find()->where(['sid' => $ssid])->one();

	    if(is_null($customer_data)){
		    Yii::info('PDF - no data.', 'noexam');
		    return false;
	    }

	    $customer_data->attributes = $customer_data->decodeData();

	    $questions = [];

	    if(!is_array($customer_data->questions)){
		    if(isset($customer_data->im_questions) && is_array($customer_data->im_questions)){
			    $questions = $customer_data->im_questions;
		    }else{
			    return false;
		    }
	    }else{
		    $questions = $customer_data->questions;
	    }

	    //VarDumper::dump($questions, 10, 1);

	    $pdf_file_name = $customer_data->id.'_'.$ssid.'.pdf';

	    $f_path = Yii::getAlias('@webroot/reports/'.$pdf_file_name);
	    $f_url = '/reports/'.$pdf_file_name;

	    $pdf = new FPDFPlus();

	    // title
	    $pdf->SetFont('Arial', '', 22);
	    $pdf->AddPage();
	    //$pdf->Image(Yii::getAlias('@web/img/noexam-logo.png'), 174, 12, -300);
	    $pdf->Image(Yii::getAlias('@app/web/img/noexam-logo.png'), 174, 12, -300);
	    $pdf->cell(0, 10, "Client details");
	    $pdf->ln(10);
	    switch($leadtype){
		    case 25:
			    $clientType = "Quote Request";
			    break;
		    case 26:
			    $clientType = "App Request";
			    break;
		    case 27:
			    $clientType = "Medical Questions";
			    break;
		    case 28:
			    $clientType = "Additional Questions";
			    break;
		    case 29:
			    $clientType = "Additional Questions 2";
			    break;
		    case 30:
			    $clientType = "General Info";
			    break;
		    case 31:
			    $clientType = "NA";
			    break;
		    case 137:
			    $clientType = "Declined Through Kill Question";
			    break;
		    default:
			    $clientType = "";
		    	break;
	    }
	    $pdf->SetFont('Arial', '', 18);
	    $pdf->cell(0, 10, "Lead type: $clientType");
	    $pdf->ln(15);

	    // Adding Questions
	    foreach($questions as $q_key => $subquestions){
	    	$Questions = Questions::findOne(['xml_num' => $q_key]);
	    	$title = (!empty($Questions->pdf_text) ? $Questions->pdf_text : $Questions->text);
	    	//VarDumper::dump($subquestions, 10, 1);
		    $pdf->SetFont('Arial', '', 14);
		    $pdf->SetTextColor(74, 156, 172);
		    $pdf->MultiCell(0, 6, $title);
		    $pdf->ln(5);
		    //$inverse_YN_color = (intval($Questions->num) === 1 ? true : false);
		    if(is_array($subquestions) && !empty($subquestions)){
			    foreach($subquestions as $sq_key => $answers){
				    $SubQuestion = Questions::findOne(['xml_num' => $sq_key]);
				    $subtitle    = $SubQuestion->num.'. '.(!empty($SubQuestion->pdf_text) ? $SubQuestion->pdf_text : $SubQuestion->text);
				    //VarDumper::dump($answers, 10, 1);
				    $pdf->SetFont('Arial', '', 10);
				    $pdf->SetTextColor(0, 0, 0);
				    $pdf->MultiCell(0, 4, $subtitle);
				    //$pdf->ln(5);
				    $i = 0;
				    //VarDumper::dump($SubQuestion->xml_num, 10, 1);
				    $inverse_YN_color = ($SubQuestion->xml_num == 'citizen' ? false : true);
				    foreach($answers as $a_key => $answer){
					    if($answer == 'yes' || $answer == 'no'){
						    $pdf->SetFont('Arial', 'B', 10);
						    $pdf = $this->setYesNoColor($pdf, $answer, $inverse_YN_color);
						    $pdf->MultiCell(0, 6, ucfirst($answer));
					    }elseif(is_array($answer)){
						    $i++;
						    $ReflexQuestion = Questions::findOne(['xml_num' => $a_key]);
						    $reflextitle    = $SubQuestion->num.'.'.$i.'. '.(!empty($ReflexQuestion->pdf_text) ? $ReflexQuestion->pdf_text : $ReflexQuestion->text);
						    $pdf->SetFont('Arial', '', 10);
						    $pdf->SetTextColor(0, 0, 0);
						    $pdf->SetX(15);
						    $pdf->MultiCell(0, 6, $reflextitle);
						    foreach($answer as $v_key => $variants){
							    //VarDumper::dump($variants, 10, 1);
							    foreach($variants as $vv_key => $variant){
								    if($variant == 'yes' || $variant == 'no'){
									    $pdf->SetFont('Arial', 'B', 10);
									    $pdf->SetX(15);
									    $pdf = $this->setYesNoColor($pdf, $variant, $inverse_YN_color);
									    //$pdf->SetTextColor(159, 209, 219);
									    $pdf->SetX(20);
									    $pdf->MultiCell(0, 6, ucfirst($variant));
								    }elseif(is_array($variant)){
									    foreach($variant as $k => $v){
										    $pdf->SetFont('Arial', '', 10);
										    $pdf->SetTextColor(0, 0, 0);
										    $pdf->SetX(15);
										    $pdf->Cell(0, 6, 'Extended answer:');
										    $pdf->ln(5);
										    $pdf->SetFont('Arial', 'I', 9);
										    $pdf->SetTextColor(0, 0, 0);
										    $pdf->SetX(20);
										    $pdf->MultiCell(0, 6, $v);
									    }
								    }else{
									    $pdf->SetFont('Arial', '', 10);
									    //$pdf->SetTextColor(150, 150, 150);
									    switch($vv_key){
										    case "prescription_medication":
											    $pdf->SetX(20);
											    $pdf->Cell(0, 6, 'Prescription medication:');
											    $pdf->ln(5);
											    $pdf->SetFont('Arial', 'I', 9);
											    $pdf->SetTextColor(0, 0, 0);
											    $pdf->SetX(25);
											    $pdf->MultiCell(0, 4, $variant);
											    break;
										    case "date_of_diagnosis":
											    $pdf->SetX(20);
											    $pdf->Cell(0, 6, 'Date of diagnosis:');
											    $pdf->ln(5);
											    $pdf->SetFont('Arial', 'I', 9);
											    $pdf->SetTextColor(0, 0, 0);
											    $pdf->SetX(25);
											    $pdf->MultiCell(0, 5, $variant);
											    break;
										    default:
											    $pdf->SetFont('Arial', 'I', 9);
											    $pdf->SetTextColor(0, 0, 0);
											    $pdf->SetX(20);
											    if(substr($vv_key, 0, 2) == 'q_'){
												    $qid         = substr($vv_key, 2);
												    $data_Answer = Answers::findOne(['q_id' => intval($qid), 'value' => $variant]);
												    //VarDumper::dump($qid, 10, 1);
												    //VarDumper::dump($variant, 10, 1);
												    //VarDumper::dump($data_Answer, 10, 1);
												    $pdf->MultiCell(0, 6, $data_Answer->text);
											    }else{
												    $pdf->MultiCell(0, 6, $variant);
											    }
											    break;
									    }

								    }
							    }
						    }
					    }else{
						    $answer = json_decode($answer, true);
						    //VarDumper::dump($answer, 10, 1);
						    // table
						    $pdf->ln(3);
						    $pdf->SetFillColor(159, 209, 219);
						    //$pdf->SetTextColor(50);
						    $pdf->SetDrawColor(139, 189, 199);
						    $pdf->SetLineWidth(.1);
						    //table header
						    $pdf->Cell(40, 7, "Family member", 1, 0, 'C', true);
						    $pdf->Cell(30, 7, "Living", 1, 0, 'C', true);
						    $pdf->Cell(90, 7, "Cause of death", 1, 0, 'C', true);
						    $pdf->Cell(30, 7, "Age of death", 1, 0, 'C', true);
						    $pdf->ln(7);

						    $pdf->SetFillColor(255, 255, 255);
						    // row 1
						    $pdf->Cell(40, 7, "Mother", 1, 0, 'C', true);
						    $pdf = $this->setYesNoColor($pdf, $answer['mother_living']);
						    $pdf->Cell(30, 7, $answer['mother_living'], 1, 0, 'C', true);
						    $pdf->SetTextColor(0);
						    $pdf->Cell(90, 7, $this->setTableCellVal($answer['mother_cdeath']), 1, 0, 'C', true);
						    $pdf->Cell(30, 7, $this->setTableCellVal($answer['mother_adeath']), 1, 0, 'C', true);
						    $pdf->ln(7);
						    // row 2
						    $pdf->Cell(40, 7, "Father", 1, 0, 'C', true);
						    $pdf = $this->setYesNoColor($pdf, $answer['father_living']);
						    $pdf->Cell(30, 7, $answer['father_living'], 1, 0, 'C', true);
						    $pdf->SetTextColor(0);
						    $pdf->Cell(90, 7, $this->setTableCellVal($answer['father_cdeath']), 1, 0, 'C', true);
						    $pdf->Cell(30, 7, $this->setTableCellVal($answer['father_adeath']), 1, 0, 'C', true);
						    $pdf->ln(7);
						    // row 3
						    $pdf->Cell(40, 7, "Sister(s)", 1, 0, 'C', true);
						    $pdf = $this->setYesNoColor($pdf, $answer['sisters_living']);
						    $pdf->Cell(30, 7, $answer['sisters_living'], 1, 0, 'C', true);
						    $pdf->SetTextColor(0);
						    $pdf->Cell(90, 7, $this->setTableCellVal($answer['sisters_cdeath']), 1, 0, 'C', true);
						    $pdf->Cell(30, 7, $this->setTableCellVal($answer['sisters_adeath']), 1, 0, 'C', true);
						    $pdf->ln(7);
						    // row 4
						    $pdf->Cell(40, 7, "Brother(s)", 1, 0, 'C', true);
						    $pdf = $this->setYesNoColor($pdf, $answer['brothers_living']);
						    $pdf->Cell(30, 7, $answer['brothers_living'], 1, 0, 'C', true);
						    $pdf->SetTextColor(0);
						    $pdf->Cell(90, 7, $this->setTableCellVal($answer['brothers_cdeath']), 1, 0, 'C', true);
						    $pdf->Cell(30, 7, $this->setTableCellVal($answer['brothers_adeath']), 1, 0, 'C', true);
						    $pdf->ln(10);

					    }
					    //$pdf->ln(3);
				    }
				    $pdf->ln(5);
			    }
		    }else{ //im_questions answers
			    $answer = $subquestions;
			    $sub_questions = $Questions->getSubquestion()->all();
			    //VarDumper::dump($answer, 10, 1);
			    if(!empty($sub_questions)){
			    	$shift = 90;
				    $idn = 15;
				    $pdf->SetFont('Arial', '', 10);
				    $pdf->SetTextColor(100, 100, 100);
				    foreach($sub_questions as $sub_question){
					    $pdf->SetX($idn);
					    $pdf->Cell(0, 6, '- '.$sub_question->text);
					    if($idn == $shift){
						    $pdf->ln(5);
					    }
					    $idn = ($idn == 15) ? $shift : 15;
			    	}
				    $pdf->ln(5);
				    $pdf->SetFont('Arial', 'B', 14);
				    $pdf->SetX(10);
				    $pdf->Cell(0, 6, 'Answer:');
				    $pdf = $this->setYesNoColor($pdf, strtolower($answer), true);
				    $pdf->SetX(35);
				    $pdf->Cell(0, 6, $answer);
				    $pdf->ln(10);
			    }
		    }
		    $pdf->ln(1);
		    $pdf->SetDrawColor(200, 200, 200);
		    $pdf->SetLineWidth(.1);
		    $pdf->Cell(190, 0, "", 1, 0, '', true);
		    $pdf->ln(5);
	    }

	    if(!empty($customer_data->beneficiary)){
		    // Adding Beneficiaries
		    $pdf->SetFont('Arial', '', 14);
		    $pdf->SetTextColor(74, 156, 172);
		    $pdf->MultiCell(0, 6, "Beneficiaries");
		    $pdf->SetTextColor(0, 0, 0);
		    $pdf->ln(5);

		    /*foreach($customer_data->beneficiary as $b_key => $beneficiaries){
				$pdf -> SetFont('Arial','B',11);
				$pdf->MultiCell(0, 7, "Beneficiary #".$b_key);
				$pdf->ln(1);
				$pdf -> SetFont('Arial','',10);
				foreach($beneficiaries as $k => $v){
					//VarDumper::dump($beneficiary, 10, 1);
					$pdf->SetFillColor(250, 250, 250);
					$pdf->Cell(30, 7, $this->getBanafLabel($k), 1, 0, 'L', true);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(100, 7, $v, 1, 0, 'L', true);
					$pdf->ln(7);
				}
				$pdf->ln(7);
			}*/


		    //table header
		    $cols[-1] = '#';
		    $cols += array_keys($customer_data->beneficiary[1]);
		    $pdf = $this->createBenefsTableHeader($pdf, $cols);
		    $pdf->ln(7);
		    $pdf->SetFillColor(255, 255, 255);
		    $pdf->SetFont('Arial', '', 8);
		    foreach($customer_data->beneficiary as $b_key => $beneficiaries){
			    foreach($cols as $k => $v){
				    $col_params = $this->getBanafLabel($v);
				    if($k == -1){
				    	$pdf->Cell($col_params['width'], 7, $b_key, 1, 0, 'L', true);
				    }else{
				    	$pdf->Cell($col_params['width'], 7, $beneficiaries[$v], 1, 0, 'L', true);
				    }
			    }
			    $pdf->ln(7);
		    }
	    }


	    $pdf->Output('F', $f_path);

	    return (object)['path' => $f_path, 'url' => $f_url];
    }

    private function setYesNoColor($pdf, $val, $inverse = false){
    	if($inverse){
		    if($val == 'yes'){
			    $val = 'no';
		    }elseif($val == 'no'){
			    $val = 'yes';
		    }
	    }

	    if($val == 'yes'){
		    $pdf->SetTextColor(137, 204, 135);
	    }elseif($val == 'no'){
		    $pdf->SetTextColor(209, 153, 153);
	    }else{
	    	$pdf->SetTextColor(0);
	    }

	    return $pdf;
    }

    private function setTableCellVal($val){
	    return (isset($val) && !empty($val)) ? $val : '-';
    }

    private function getBanafLabel($key){
    	$ret = ['label' => $key, 'width' => 5];

	    switch ($key){
		    case "first-name":
		    	$ret['label'] = "First name";
		    	$ret['width'] = 30;
			    break;
		    case "last-name":
		    	$ret['label'] = "Last name";
			    $ret['width'] = 30;
			    break;
		    case "relationship":
		    	$ret['label'] = "Relationship";
			    $ret['width'] = 25;
			    break;
		    case "percentage":
		    	$ret['label'] = "Perc(%)";
			    $ret['width'] = 14;
			    break;
		    case "street-address":
		    	$ret['label'] = "Street";
			    $ret['width'] = 35;
			    break;
		    case "city":
		    	$ret['label'] = "City";
			    $ret['width'] = 25;
			    break;
		    case "state":
		    	$ret['label'] = "State";
			    $ret['width'] = 11;
			    break;
		    case "zip":
		    	$ret['label'] = "Zip code";
			    $ret['width'] = 15;
			    break;
	    }

	    return $ret;
    }

    private function createBenefsTableHeader($pdf, $cols){
	    $pdf->SetFillColor(159, 209, 219);
	    $pdf->SetDrawColor(139, 189, 199);
	    $pdf->SetLineWidth(.1);
	    $pdf->SetFont('Arial', '', 9);
	    //table header
	    foreach($cols as $k => $v){
	    	$col_params = $this->getBanafLabel($v);
		    $pdf->Cell($col_params['width'], 7, $col_params['label'], 1, 0, 'L', true);
	    }

	    return $pdf;
    }

	/**
	 * Function looks for the hieghst bid buyer.
	 *
	 * @param  array $buyers Array of objects (buyers). Each elemnt should be as Object.
	 * @param  mixed $filters [optional] Accepts string or array of filtered words.
	 *
	 * @return object          Return object of the hieghst bid. Return just one element.
	 */
    public function maxBidBuyer( $buyers = NULL, $filters = NULL ){

    	if( is_null( $buyers ) || !is_array( $buyers ) || !count( $buyers ) ) return false;

    	$bids = [];
    	$parsed_buyers = [];

    	foreach ($buyers as $key => $buyer) {

    		if( !is_null( $filters ) ){

    			if( property_exists( $buyer, 'type' ) ){

    				if( is_array( $filters ) ){

    					if( !in_array( $buyer->type, $filters ) ) continue;

    				}elseif( is_string( $filters ) ){

    					if( $filters != $buyer->type ) continue;

    				}

    			}

    		}

    		if( !is_object( $buyer ) && !property_exists( $buyer, 'bid' ) ) continue;


    		$bids[] = (string)$buyer->bid;

    		$parsed_buyers[ (string)$buyer->bid ] = $buyer;

    	}

    	if( !count( $bids ) ) return false;
    	$max_bid = max( $bids );

    	return $parsed_buyers[ $max_bid ];

    }

    public function createSFLead( $cutomer_data = NULL, $ssid = NULL ){

    	if( is_null( $cutomer_data  ) || !is_array( $cutomer_data  )) return false;

    	$SFClient = Yii::$app->SFClient;

    	$prepared_data = $SFClient->prepare_data( $cutomer_data  );

    	$searh_result = $this->searchSFLead( $prepared_data );
    	// VarDumper::dump( $prepared_data , 10, 1 );

    	if( !$searh_result ){

    		$result = $SFClient->create_lead($prepared_data);

    	}else{

			Yii::info( 'Lead with email  - '.$prepared_data['Email'] . ' - currently exists - ' . $searh_result[ 'id' ], 'noexam' );
    		return false;
    	}


    	if( is_array( $result ) && array_key_exists( 'success', $result ) && $result[ 'success' ] ){

    		$lead_id = $result[ 'id' ];
    		Yii::info( 'New lead is created - ' . $lead_id, 'noexam' );

			$pdf_data = $this->generatePDFReport( 25, $ssid );
			$attach_result = $this->attachSFFile( $lead_id, $pdf_data );

			if( !$attach_result ){

				Yii::info( 'Didn\'t attached PDF - ' . $pdf_data->path . ' for lead - ' . $lead_id, 'noexam' );

			}else{

				Yii::info( 'Successfuly attached PDF. File ID - ' . $attach_result[ 'file_id' ] . ' for lead - ' . $lead_id . '. Feed ID - ' . $attach_result[ 'feed_id' ], 'noexam' );

			}

    		return true;

    	}else{

    		Yii::info( 'New lead hasn\'t created.', 'noexam' );

    		if( is_array( $result ) ){

    			foreach ($result as $key => $error) {

    				if( array_key_exists( 'message', $error ) ){

    					Yii::info( $error[ 'message' ], 'noexam' );
    				}

    			}
    		}

    		return false;

    	}

    }

    public function updateSFLead( $lead_id = NULL, $cutomer_data = NULL, $ssid = NULL ){

    	if( is_null( $cutomer_data  ) || !is_array( $cutomer_data  )) return false;

    	if( is_null( $lead_id  ) ) return false;

    	$SFClient = Yii::$app->SFClient;

    	$prepared_data = $SFClient->prepare_data( $cutomer_data  );

    	$updated = $SFClient->update_lead( $lead_id, $prepared_data );

    	if( $updated == '1' ){


			$pdf_data = $this->generatePDFReport( 25, $ssid );
			$attach_result = $this->attachSFFile( $lead_id, $pdf_data );

			if( !$attach_result ){

				Yii::info( 'Didn\'t attached PDF - ' . $pdf_data->path . ' for lead - ' . $lead_id, 'noexam' );

			}else{

				Yii::info( 'Successfuly attached PDF. File ID - ' . $attach_result[ 'file_id' ] . ' for lead - ' . $lead_id . '. Feed ID - ' . $attach_result[ 'feed_id' ], 'noexam' );

			}

    		return true;



    	}else{

    		return false;


    	}




    }

    public function getSFLeadField( $lead_id = NULL, $field = NULL ){

    	if( is_null( $field  ) ) return false;

    	if( is_null( $lead_id  ) ) return false;
    	$SFClient = Yii::$app->SFClient;


    	$result = $SFClient->get_field( $lead_id, $field );

    	return $result;



    }
	
	public function searchSFLead($data = null, $search_type = 'full'){
		if(is_null($data) || !is_array($data)){
			return false;
		}

		$SFClient      = Yii::$app->SFClient;
		$prepared_data = $SFClient->prepare_data($data);

		switch($search_type){
			case 'full':
				if($prepared_data['Email'] == '' || $prepared_data['FirstName'] == '' || $prepared_data['LastName'] == ''){
					return false;
				}
				break;
			case 'email':
				if($prepared_data['Email'] == ''){
					return false;
				}
				break;
			default:
				if($prepared_data['Email'] == '' || $prepared_data['FirstName'] == '' || $prepared_data['LastName'] == ''){
					return false;
				}
				break;
		};
		
		/*VarDumper::dump($search_type, 10, 1);
		VarDumper::dump($prepared_data, 10, 1);
		exit;*/
		
		$search_result = $SFClient->search_lead($prepared_data['Email'], ($prepared_data['FirstName'].' '.$prepared_data['LastName']), $search_type);

		//if($search_result != null){
		if(array_key_exists('done', $search_result) && array_key_exists('totalSize', $search_result)){
			if($search_result['totalSize'] != 0){
				return [
					'status' => true,
					'id'     => $search_result['records'][0]['Id'],
				];
			}
		}
		
		//}
		
		return false;
		
	}

    public function attachSFFile( $lead_id = NULL, $pdf_data = NULL ){

    	if( is_null( $pdf_data ) || is_null( $lead_id )  || !is_string( $lead_id ) || !is_object( $pdf_data ) ){

    		Yii::info( 'Lead ID or PDF data isn\'t correct.', 'noexam' );
    		return false;

    	}

    	if( !file_exists( $pdf_data->path ) ){

	    	Yii::info( 'File - ' . $pdf_data->path . ' doesn\'t exists.', 'noexam' );
	    	return false;

    	}

		$SFClient = Yii::$app->SFClient;

		$pdf_name = array_pop( explode( '/', $pdf_data->path ) );

		$result_pdf = $SFClient->upload_file_to_lead( $lead_id, $pdf_data->path, $pdf_name, 'Test description.' );

		if( !array_key_exists( 'file_id', $result_pdf ) ){

			Yii::info( $result_pdf[0][ 'message' ], 'noexam' );
			return false;
		}

		return $result_pdf;


    }
	
	public function getCustomeData(){
		
		$session       = Yii::$app->session;
		$cookies       = Yii::$app->response->cookies;
		$customer_data = CustomerData::find()->where(['sid' => $session->id, 'status' => 'new'])->one();
		#VarDumper::dump($customer_data, 10, 1); exit;
		
		if(!is_null($customer_data)){
			return $customer_data;
		}
		
		$cookies->add(new Cookie([
			'name'   => 'PHPSESSID',
			'expire' => -3600,
		]));
		
		return null;
	}

    public function createVelocifyRecord( $data = NULL ){

    	if( is_null( $data ) ) {

    		Yii::info( 'VEL - input data is not correct.', 'noexam' );
    		return false;
    	}

    	$Velocify = Yii::$app->Velocify;

    	$VData = [
    		'FirstName'		=> $data['first_name'],
    		'LastName' 		=> $data['last_name'],
    		'HomePhone' 	=> $data['phone_number'],
    		'Email'			=> $data['email'],
    		'Address' 		=> $data['street_address'],
    		'City' 			=> $data['city'],
    		'State'			=> $data['state'],
    		'ZipCode' 		=> $data['zip'],
    		'Term' 			=> $data['term'],
    		'faceAmount'	=> $data['avg_amount'] . '000',
    		'DOB' 			=> preg_replace('/\//', '.', $data[ 'birthday' ] ),
    		'Gender' 		=> $data['sex'],
    		'RateClass' 	=>  $data['rate_class'],
    		'Smoker' 		=> $data['tobaco'],
    		'Company' 		=> 'Sagicor Life Insurance Company',
    		'Product' 		=> 'Sage Term',
    		'annprem' 		=> $data['premium_amount'],
    		'premium' 		=> $data['monthly_premium'],
    	];

    	$birthday = explode( '/', $data[ 'birthday' ] );
    	$VData['HomePhone'] = substr( preg_replace("/[^0-9]/", '', $VData['HomePhone']) , 0, 14);

    	Yii::info( 'VEL - pushing data.', 'noexam' );

    	$Velocify->add_params($VData);
    	$vel_res = $Velocify->push();

    	if( $Velocify->has_error() ){

    		Yii::info( 'VEL - record didn\'t created because of error - "' . $Velocify->get_error()[ 0 ] . '"', 'noexam' );
    		return false;

    	}else{

    		Yii::info( 'VEL - record has been successfuly created.', 'noexam' );
    		return true;

    	}

    	return false;

    }

    public function processApplyNow2( $data = NULL ){

    	if( is_null( $data ) ){

    		Yii::info( 'Apply Now 2 - data is not correct.', 'noexam' );
			return false;

    	}

    	$bid_filters = [ 'exclusive' ];
    	$IEIClient = Yii::$app->IEIClient;

    	$IEIPingData = [
    		'api_token' => 'wmqyyrgichattvm3Dk4IiP',
    		'placement_id' => 'SyCDCAg3oAsgpS1KeQXRwagnQ7bZ5A',
    		'version' => 18,
    		'local_hour' => 12,
    		'date_time' => date( 'Y-m-d h:i:s' ),
    		'ip' => Yii::$app->request->userIP,
    		'ua' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.44 Safari/537.36',
    		'url' => 'http://phpstack-223893-690316.cloudwaysapps.com/apply-now2/',
    		'data' => [
    			'birth_date' => $data[ 'birth_date' ],
    			'coverage_amount' => $data[ 'coverage_amount' ] . '000',
    			'coverage_type' => $data[ 'coverage_type' ],
    			'currently_insured' => 0,
    			'dui' => 0,
    			'gender' => $data[ 'gender' ],
    			'height' => $data[ 'height' ],
    			'high_risk' => 0,
    			'military' => 0,
    			'tobacco' => 0,
    			'weight' => $data[ 'weight' ],
    			'zip' => $data[ 'zip' ],
    			'tcpa' => [
    				'text' => 'By submitting your quote request, you represent that you are at least 18 and agree to our Privacy Policy and Terms of Use. You also authorize QuoteLab and/or its marketing partners to contact you for marketing/telemarketing purposes at the number and address provided above, including your wireless number, if provided, using live operators, automated telephone dialing systems, pre-recorded messages, text messages and/or emails. You are not required to consent as a condition of purchasing goods or services and may revoke consent at anytime.',
    				'url' => 'http://www.quotelab.com/privacy-policy.html'
    			]
    		]
    	];

    	$IEIPostData = [
    		"api_token" => "wmqyyrgichattvm3Dk4IiP",
    		"placement_id" => "SyCDCAg3oAsgpS1KeQXRwagnQ7bZ5A",
    		"version" => 18,
    		// "ping_id" => "9-0rtb7EEtbyindXLNK6KccQKz1-EA",
    		// "bid_ids" => [ "d_DUfAbwkBPZfwQ-VbrZDM5b8DTH5g", "an4-uVpu2VE-0oV_fI2qznuQmH6bcQ" ],
    		"data" => [
    			"address" => $data[ 'address' ],
    			"address_2" => $data[ 'address' ],
    			"contact" => $data[ 'first_name' ] . ' ' . $data[ 'middle_name' ] . '. ' . $data[ 'last_name' ],
    			"email" => $data[ 'email' ],
    			"phone" => $data[ 'phone' ]
    		]
    	];

    	$IEIClient->add_params( $IEIPingData );
    	$IEIClient->ping_request();
    	// Yii::trace( $IEIData, 'noexam' );
    	if( $IEIClient->has_error() ){

    		// Push data to SF.
    		if( $IEIClient->get_error() == 'No match.' ){
    			Yii::info( 'IEI - Pushing data to SF becuse Ping request error - No match.', 'noexam' );

    		}
    		Yii::error( $IEIClient->get_error(), 'noexam' );

    	}else{

    		$buyers = $IEIClient->get_buyers();

    		if( !is_null( $buyers ) ){

    			$max_bid_buyer = $this->maxBidBuyer( $buyers, $bid_filters );

    			if( is_object( $max_bid_buyer ) && count( $max_bid_buyer ) ){
    				$IEIPostData[ 'bid_ids' ] = [ $max_bid_buyer->bid_id ];
    				$IEIPostData[ 'ping_id' ] = $IEIClient->get_ping_id();

    				$IEIClient->add_params( $IEIPostData );
    				Yii::info( 'IEI - getting POST request.', 'noexam' );
    				$IEIClient->post_request();






    				if( $IEIClient->has_error() ){

    					Yii::info( 'IEI - POST request has errors. "' . $IEIClient->get_error() . '"', 'noexam' );

    				}

    				Yii::info( 'IEI - pishing data to SF.', 'noexam' );


    				if( !$this->createSFLead( $data ) ){

    					Yii::info( 'Apply Now 2 - SF lead is not created.', 'noexam' );

    				}


    				$post_result = $IEIClient->get_result();

    				if( is_object( $post_result ) ){

    					if( property_exists( $post_result, 'status' ) ){

    						if( $post_result->status == 'succeeded' ){

    							Yii::info( 'IEI - Post request is succeeded', 'noexam' );

    							// VarDumper::dump( $IEIClient->get_result(), 10, 1 );

    						}elseif( $post_result->status == 'failed' ){

    							if( property_exists( $post_result, 'error' ) ){

    								Yii::info( 'IEI - POST request. Error - FAILED --- "' . $post_result->error . '"', 'noexam' );

    							}elseif( property_exists( $post_result, 'buyers' ) ){

    								Yii::info( 'IEI - POST request. Error from buyer - FAILED --- "' . $post_result->buyers[ 0 ]->error . '"', 'noexam' );
    							}

    						}

    					}else{

    						Yii::error( 'IEI - No STATUS.', 'noexam' );

    					}

    				}else{

    					Yii::error( 'IEI - No result after POST request', 'noexam' );
    				}



    			}else{
    				Yii::error( 'IEI - No Max Bid Buyer.', 'noexam' );
    			}

    		}else{
    			Yii::error( 'IEI - No buyers.', 'noexam' );
    		}


    	}

    }

    public function get_bio_updated_date(){
	    #VarDumper::dump($this->current_cat, 10, true);

		/*$rc_last_date = ResourcesCats::find()->orderBy('updated DESC')->one();
		$rg_last_date = ResourcesGrid::find()->orderBy('updated DESC')->one();

	    $max_date = max(strtotime($rc_last_date->updated), strtotime($rg_last_date->updated));
	    $ret = date('F j, Y', $max_date);*/


	    $ret = date('F j, Y', strtotime($this->current_cat->updated));

		return $ret;
    }

    public function getRateCalcAPIsDataByAmountRange($args, $amount_range){
    	$data = [];
	    $companies = [];
	    $cols = [];
	    $prices_range = [];
	    
	    if(isset($args['state'])){
	    	$this->state_code = $args['state'];
	    }
	    
	    #VarDumper::dump($amount_range, 10, 1);
    	foreach($amount_range as $item){
    		$_args = $args;
		    $_args['avg_amount'] = $item;
		    $RateCalcAPIsData = $this->getRateCalcAPIsData($_args, 3);
		    $data[$item] = $RateCalcAPIsData['plans'];
		    foreach($RateCalcAPIsData['plans'] as $plan){
		        $cols[$plan['code']] = $plan['name'];
		    }
	    }

    	ksort($cols);
	    reset($cols);

    	foreach($cols as $company_code => $company_name){
    		foreach($data as $amount => $companies_data){
    			//$price = isset($companies_data[$company_code]['price']) ? number_format($companies_data[$company_code]['price'], 2, '.', ',') : 'N/A';
    			$price = isset($companies_data[$company_code]['price']) ? intval($companies_data[$company_code]['price']) : 'N/A';
			    $companies[$company_code][$amount] = [
				    'name' => $company_name,
				    'price' => $price,
			    ];
			    if($price != 'N/A'){
				    $prices_range[$price] = $price;
			    }
		    }
	    }
    	unset($data);

	    $prices_range = $this->generatePriceColor($prices_range);

	    foreach($companies as $company_code => $company_data){
		    foreach($company_data as $amount => $amount_data){
			    $companies[$company_code][$amount]['b_color'] = $prices_range[$amount_data['price']]['b_color'];
			    $companies[$company_code][$amount]['f_color'] = $prices_range[$amount_data['price']]['f_color'];
		    }
	    }

	    return ['cols' => $cols, 'prices_range' => $prices_range, 'companies' => $companies];
    }

    public function getRateCalcAPIsData($args, $plans_type = 1){
	    $LP_client = Yii::$app->LPClient;
	    $HL_client = Yii::$app->HLClient;
	    $ET_client = Yii::$app->ETClient;
	    $NQ_client = Yii::$app->NQClient;

	    $plans = [];

	    $health_categories = [
    		'excellent' => ['NQ' => 'pp', 'HL' => 'excellent', 'LP' => 5, 'ET' => '?', 'weight' => ['m' => 160, 'f' => 120]],
    		'very-good' => ['NQ' => 'p', 'HL' => 'very good', 'LP' => 4, 'ET' => '?', 'weight' => ['m' => 180, 'f' => 140]],
    		'good' => ['NQ' => 'sp', 'HL' => 'good', 'LP' => 3, 'ET' => '?', 'weight' => ['m' => 200, 'f' => 160]],
    		'fair' => ['NQ' => 's', 'HL' => 'fair', 'LP' => 2, 'ET' => '?', 'weight' => ['m' => 220, 'f' => 180]],
    		'none' => ['NQ' => 's', 'HL' => 'fair', 'LP' => 1, 'ET' => '?', 'weight' => ['m' => 240, 'f' => 200]],
	    ];
    	$genders = ['m' => 'male', 'f' => 'female'];
    	$height  = ['m' => ['h_foot' => 5, 'h_inch' => 8], 'f' => ['h_foot' => 5, 'h_inch' => 10]];

	    $apis_data = [];


	    $apis_data['HL'] = $HL_client->get_quotes([
		    'igonre_get_params' => $args['igonre_get_params'],
		    'smoker' => isset($args['tobaco']) ? ($args['tobaco'] == true ? 'true' : 'false') : 'false',
		    'avarage_amount' => $args['avg_amount'],
		    'term_length' => $args['term_length'],
		    'health_rating' => $health_categories[$args['health']]['HL'],
		    'sex' => $genders[$args['sex']],
		    'age' => $args['age'],
		    'state' => $this->state_code,
	    ]);

	    $apis_data['ET'] = $ET_client->get_quotes([
		    'igonre_get_params' => $args['igonre_get_params'],
		    'smoker' => isset($args['tobaco']) ? ($args['tobaco'] == true ? 'true' : 'false') : 'false',
		    'avarage_amount' => $args['avg_amount'],
		    'term_length' => $args['term_length'],
		    'health_rating' => $health_categories[$args['health']]['ET'],
		    'sex' => $genders[$args['sex']],
		    'age' => $args['age'],
		    'state' => $this->state_code,
	    ]);

	    $apis_data['LP'] = $LP_client->get_quotes([
		    'igonre_get_params' => $args['igonre_get_params'],
		    'smoker' => isset($args['tobaco']) ? $args['tobaco'] : false,
		    'avarage_amount' => $args['avg_amount'],
		    'term_length' => $args['term_length'],
		    'health_rating' => $health_categories[$args['health']]['LP'],
		    'h_foot' => $height[$args['sex']]['h_foot'],
		    'h_inch' => $height[$args['sex']]['h_inch'],
		    'weight' => $health_categories[$args['health']]['weight'][$args['sex']],
		    'sex' => $genders[$args['sex']],
		    'age' => $args['age'],
		    'zipcode' => $this->postal_code,
		    'state' => $this->state_code,
	    ]);

	    $apis_data['NQ'] = $NQ_client->get_quotes([
		    'igonre_get_params' => $args['igonre_get_params'],
		    'smoker' => isset($args['tobaco']) ? $args['tobaco'] : false,
		    'avarage_amount' => $args['avg_amount'],
		    'term_length' => $args['term_length'],
		    'rate_class' => $health_categories[$args['health']]['NQ'],
		    'sex' => $genders[$args['sex']],
		    'birthdate' => date('Y-m-d', mktime(0, 0, 0, date('n'), date('j'), date('Y') - $args['age'])),
		    'state' => $this->state_code,
	    ]);

	    switch($plans_type){
		    case 1:
		        $plans = $this->prepareResults($args, $apis_data);
		        break;
		    case 2:
		        $plans = $this->prepareResults2($args, $apis_data);
		        break;
		    case 3:
		        $plans = $this->prepareResults3($args, $apis_data);
		        break;
	    }

	    return ['apis_data' => $apis_data, 'plans' => $plans];
    }

    private function prepareResults($args, $apis_data){

    	$monthly_price_sum = 0;

    	$ret = [
    		'total_plans_count' => 0,
    		'avg_price' => 0,
		    'plans' => [
	            'haven_life' => [],
	            'american_general' => [],
	            'legal_general' => [],
	            'prudential' => [],
	            'mutual_omaha' => [],
	            //'mutual_omaha_express' => [],
	            'transamerica' => [],
	            //'transamerica_lb' => [],
	            'ethos' => [],
	            'ladder' => [],
		    ]
	    ];

	    $ext_links = [
		    'haven_life' => '/out/haven.php',
		    'american_general' => '/out/aig.php',
		    'legal_general' => '/out/quotes-2.php',
		    'prudential' => '/out/quotes-2.php',
		    'mutual_omaha' => '/out/quotes-2.php',
		    //'mutual_omaha_express' => '',
		    'transamerica' => '/out/quotes-2.php',
		    //'transamerica_lb' => '',
		    'ethos' => '',
		    'ladder' => '/out/ladder.php',
	    ];

    	foreach($apis_data as $k => $data){
    		if(!empty($data)){
			    switch($k){
				    case "LP":
					    if(!empty($data['response']['quotes'])){
						    foreach($data['response']['quotes'] as $j => $v){
							    if(intval($v['term']) == intval($args['term_length'])){
							    	$v['ext_link'] = $ext_links['ladder'];
								    $ret['plans']['ladder'] = $v;
								    $ret['total_plans_count']++;
								    $monthly_price_sum += floatval($v['monthly_premium']);
							    }
						    }
					    }
					    break;
				    case "HL":
				    	if(!empty($data['response']['quotes'])){
				    		foreach($data['response']['quotes'] as $j => $v){
				    			if(intval($v['termLength']) == intval($args['term_length'])){
								    $v['ext_link'] = $ext_links['haven_life'];
								    $ret['plans']['haven_life'] = $v;
								    $ret['total_plans_count']++;
								    $monthly_price_sum += floatval($v['monthlyRate']);
							    }
						    }
					    }
					    break;
				    case "NQ":
					    if(!empty($data['response']['results'])){
						    foreach($data['response']['results'] as $j => $v){
							    if(in_array($v['company_code'], array_keys($ret['plans']))){
								    $v['ext_link'] = $ext_links[$v['company_code']];
								    $ret['plans'][$v['company_code']] = $v;
								    $ret['total_plans_count']++;
								    $monthly_price_sum += floatval($v['premium_monthly']);
							    }
							    if($v['company_code'] == 'banner'){
								    $v['ext_link'] = $ext_links['legal_general'];
							    	$v['company_code'] = 'legal_general';
							    	$v['company_name'] = 'Legal & General America';
							    	$v['product_code'] = str_replace('banner', 'legal_general', $v['product_code']);
							    	$v['logo_url'] = '/img/company_logos/logo_legal_general.png';
								    $ret['plans']['legal_general'] = $v;
								    $ret['total_plans_count']++;
								    $monthly_price_sum += floatval($v['premium_monthly']);
							    }
						    }
					    }
					    break;
				    case "ET":
					    if(!empty($data['response']['quotes'])){
						    foreach($data['response']['quotes'] as $j => $v){
							    if(intval($v['termLength']) == intval($args['term_length'])){
								    $v['ext_link'] = $ext_links['ethos'];
								    $ret['plans']['ethos'] = $v;
								    $ret['plans']['ethos']['monthly_price'] = $v['monthly_premium'];
								    $monthly_price_sum += floatval($v['monthly_premium']);
								    $ret['total_plans_count']++;
							    }
						    }
					    }
					    break;
			    }
		    }
	    }

    	if($ret['total_plans_count'] > 0 && $monthly_price_sum > 0){
    		$ret['avg_price'] = round($monthly_price_sum / $ret['total_plans_count'], 2);
	    }

    	return $ret;
    }

	private function prepareResults2($args, $apis_data){

		$ret = [];

		foreach($apis_data as $k => $data){
			if(!empty($data)){
				switch($k){
					case "LP":
						if(!empty($data['response']['quotes'])){
							foreach($data['response']['quotes'] as $j => $v){
								if(intval($v['term']) == intval($args['term_length'])){
									unset($v['coverageAmount'], $v['logo_url'], $v['termLength'], $v['productIdentifier'], $v['premiumWaiverAmount'], $v['monthlyRate'], $v['premium_modal'], $v['monthly_premium'], $v['monthly_price']);
									$ret['ladder'] = $v;
								}
							}
						}
						break;
					case "HL":
						if(!empty($data['response']['quotes'])){
							foreach($data['response']['quotes'] as $j => $v){
								if(intval($v['termLength']) == intval($args['term_length'])){
									$v['coverage'] = $v['coverageAmount'];
									unset($v['coverageAmount'], $v['logo_url'], $v['termLength'], $v['productIdentifier'], $v['premiumWaiverAmount'], $v['monthlyRate'], $v['premium_modal'], $v['monthly_premium'], $v['monthly_price']);
									$ret['haven_life'] = $v;
								}
							}
						}
						break;
					case "NQ":
						if(!empty($data['response']['results'])){
							foreach($data['response']['results'] as $j => $v){
								if(intval($v['term']) == intval($args['term_length'])){
									unset($v['coverageAmount'], $v['logo_url'], $v['termLength'], $v['productIdentifier'], $v['premiumWaiverAmount'], $v['monthlyRate'], $v['premium_modal'], $v['monthly_premium'], $v['monthly_price']);
									$ret[$v['company_code']] = $v;
								}
								if($v['company_code'] == 'banner'){
									$v['company_code'] = 'legal_general';
									$v['company_name'] = 'Legal & General America';
									$v['product_code'] = str_replace('banner', 'legal_general', $v['product_code']);
								}
							}
						}
						break;
					case "ET":
						if(!empty($data['response']['quotes'])){
							foreach($data['response']['quotes'] as $j => $v){
								if(intval($v['termLength']) == intval($args['term_length'])){
									unset($v['coverageAmount'], $v['logo_url'], $v['termLength'], $v['productIdentifier'], $v['premiumWaiverAmount'], $v['monthlyRate'], $v['premium_modal'], $v['monthly_premium'], $v['monthly_price']);
									$ret['ethos'] = $v;
									$ret['ethos']['monthly_price'] = $v['monthly_premium'];
								}
							}
						}
						break;
				}
			}
		}

		return $ret;
	}

	private function prepareResults3($args, $apis_data){

    	$exclude_companies = [
    		'transamerica_lb',
    		'united_home_life',
    		'mutual_omaha_express',
    		'foresters_express',
		
		    'american_general',
	        'american_national',
	        'american_amicable',
	        'americo',
	        'ameritas',
	        'assurity',
	        //'banner',
	        'fidelity',
	        'foresters',
	        //'haven_life',
	        'john_hancock',
	        'lincoln_financial',
	        'lincoln_financial_express',
	        //'mutual_omaha',
	        'north_american',
	        'pacific_life',
	        'principal',
	        //'protective',
	        //'prudential',
	        'sagicor',
	        'sagicor_express_issue',
	        'sbli',
	        'sbli_express',
	        'transamerica',
	        'ladder',
	    ];

		$ret = [];

		#VarDumper::dump($apis_data, 10, 1);
		
		foreach($apis_data as $k => $data){
			if(!empty($data)){
				switch($k){
					case "LP":
						if(!empty($data['response']['quotes'])){
							foreach($data['response']['quotes'] as $j => $v){
								if(!in_array($v['company_code'], $exclude_companies)){
									if(intval($v['term']) == intval($args['term_length'])){
										$ret['ladder'] = [
											'code'     => $v['company_code'],
											'name'     => $this->shortnarCompanyName($v['company_name']),
											'coverage' => intval($v['coverage']),
											'price'    => floatval($v['premium_monthly']),
											'term'     => intval($v['term']),
											'health'   => $v['rate_class_name'],
										];
									}
								}
							}
						}
						break;
					case "HL":
						if(!empty($data['response']['quotes'])){
							foreach($data['response']['quotes'] as $j => $v){
								if(!in_array($v['company_code'], $exclude_companies)){
									if(intval($v['termLength']) == intval($args['term_length'])){
										$ret['haven_life'] = [
											'code'     => $v['company_code'],
											'name'     => $this->shortnarCompanyName($v['company_name']),
											'coverage' => intval($v['coverageAmount']),
											'price'    => floatval($v['premium_monthly']),
											'term'     => intval($v['termLength']),
											'health'   => $v['rate_class_name'],
										];
									}
								}
							}
						}
						break;
					case "NQ":
						if(!empty($data['response']['results'])){
							foreach($data['response']['results'] as $j => $v){
								if(!in_array($v['company_code'], $exclude_companies)){
									if(intval($v['term']) == intval($args['term_length'])){
										
										// Для объединения цен компаний sagicor_express_issue и sagicor в единую sagicor
										if($v['company_code'] == 'sagicor_express_issue'){
											$v['company_code'] = 'sagicor';
										}
										if($v['company_code'] == 'sbli_express'){
											$v['company_code'] = 'sbli';
										}
										
										$ret[$v['company_code']] = [
											'code'     => $v['company_code'],
											'name'     => $this->shortnarCompanyName($v['company_name']),
											'coverage' => intval($v['coverage']),
											'price'    => floatval($v['premium_monthly']),
											'term'     => intval($v['term']),
											'health'   => $v['rate_class_name'],
										];
									}
								}
								/*if($v['company_code'] == 'banner'){
									$v['company_code'] = 'legal_general';
									$v['company_name'] = 'Legal & General America';
									$v['product_code'] = str_replace('banner', 'legal_general', $v['product_code']);
								}*/
							}
						}
						break;
					case "ET":
						if(!empty($data['response']['quotes'])){
							foreach($data['response']['quotes'] as $j => $v){
								if(!in_array($v['company_code'], $exclude_companies)){
									if(intval($v['termLength']) == intval($args['term_length'])){
										$ret['ethos'] = [
											'code'     => $v['company_code'],
											'name'     => $this->shortnarCompanyName($v['company_name']),
											'coverage' => intval($v['coverage']),
											'price'    => floatval($v['monthly_premium']),
											'term'     => intval($v['termLength']),
											'health'   => $v['rate_class_name'],
										];
									}
								}
							}
						}
						break;
				}
			}
		}

		return $ret;
	}

	/**https://github.com/maxmind/GeoIP2-php
	 * @return string|null
	 * @throws \MaxMind\Db\Reader\InvalidDatabaseException
	 */
	private function getCountryIsoCode(){

		if(empty($this->country_code)){
			$geoDB = new Reader(Yii::getAlias('@app/web/maxmind/GeoLite2-Country.mmdb'));
			try{
				$ip = $_SERVER['REMOTE_ADDR'];
				if($ip == '127.0.0.1'){
					$ip = $_SERVER['HTTP_X_REAL_IP'];
				}
				$record = $geoDB->country($ip);
				if($this->country_code !== $record->country->isoCode){
					$this->country_code = $record->country->isoCode;
				}
			}catch(AddressNotFoundException $e){
				// TODO: notify that IP cannot be verified
			}
		}

		return $this->country_code;
	}

	public function getStateIsoCode(){

		if(empty($this->state_code)){
			$geoDB = new Reader(Yii::getAlias('@app/web/maxmind/GeoLite2-City.mmdb'));
			try{
				$ip = $_SERVER['REMOTE_ADDR'];
				if($ip == '127.0.0.1'){
					$ip = $_SERVER['HTTP_X_REAL_IP'];
				}
				#VarDumper::dump($ip, 10, 1); exit;
				if(!is_null($ip)){
					$record = $geoDB->city($ip);
					if(isset($record->mostSpecificSubdivision)){
						if($this->state_code !== $record->mostSpecificSubdivision->isoCode){
							$this->state_code = $record->mostSpecificSubdivision->isoCode;
						}
					}elseif(isset($record->subdivisions) && count($record->subdivisions) > 0){
						if($this->state_code !== $record->subdivisions[0]->isoCode){
							$this->state_code = $record->subdivisions[0]->isoCode;
						}
					}
					if($this->postal_code !== $record->postal->code){
						$this->postal_code = $record->postal->code;
					}
				}
			}catch(AddressNotFoundException $e){
				// TODO: notify that IP cannot be verified
			}
		}

		#VarDumper::dump($this->state_code, 10, 1);

		return $this->state_code;
	}

	public function getUsageCounterFromRateCalc(){
		return RatesDataCache::find()->count();
	}

	public function getGuessingStatistic($requestCustomerData, $RateCalcAPIsData){
		$ret = null;

		if($requestCustomerData['guess_price'] > 0){

			switch($requestCustomerData['guessing_statistic_type']){
				case 'short':
					$model = new CustomerData();

					$avg_price = round($RateCalcAPIsData['plans']['avg_price']);
					$guess_price_desc_data = [];

					if($requestCustomerData['guess_price'] > $avg_price){
						$guess_price_desc_data[0] = 'higher';
					}elseif($requestCustomerData['guess_price'] < $avg_price){
						$guess_price_desc_data[0] = 'lower';
					}else{
						$guess_price_desc_data[0] = 'correctly';
					}

					$users_guessed_price      = $model->get_users_guessed_price();
					$guess_price_desc_data[1] = count($users_guessed_price);
					$guess_price_desc_data[2] = 0;
					$c                        = 0;
					if(!empty($users_guessed_price)){
						foreach($users_guessed_price as $p){
							if($p > $requestCustomerData['guess_price']){
								$c++;
							}
						}
						if($c > 0){
							$guess_price_desc_data[2] = round(100 * $c / $guess_price_desc_data[1]);
						}
					}else{
						$guess_price_desc_data[2] = 0;
					}

					$ret = $guess_price_desc_data;
					break;
				case 'detail':
					$model = new CustomerData();

					$higt_low_guessed_prices_count = $model->get_high_low_guessed_prices_count($requestCustomerData['guess_price']);
					$ret['main']['total'] = intval($higt_low_guessed_prices_count['total']);
					$ret['main']['high'] = round(100 * $higt_low_guessed_prices_count['high'] / $higt_low_guessed_prices_count['total']);
					$ret['main']['low'] = round(100 * $higt_low_guessed_prices_count['low'] / $higt_low_guessed_prices_count['total']);

					$guessed_prices_by_generations = $model->get_guessed_prices_by_generations($requestCustomerData['guess_price']);
					#VarDumper::dump($guessed_prices_by_generations);
					foreach($guessed_prices_by_generations as $k => $v){
						if($k != 'Others' && $v['total'] > 0){
							$ret['generations'][$k]['total'] = $v['total'];
							$ret['generations'][$k]['high'] = round(100 * $v['high'] / $v['total']);
							$ret['generations'][$k]['low'] = round(100 * $v['low'] / $v['total']);
						}else{
							//$ret['generations'][$k] = $v;
						}
					}

					break;
				default:
					break;
			}
		}

		#VarDumper::dump($ret);
		return $ret;
	}

	public function getStatisticGuessedPrices(){
		$ret = [];

		$total = CustomerData::find()->where(['!=', 'guess_result', ''])->count();
		$high = CustomerData::find()->where(['guess_result' => 'high'])->count();
		$low = CustomerData::find()->where(['guess_result' => 'low'])->count();
		$correct = CustomerData::find()->where(['guess_result' => 'correct'])->count();

		$total = intval($total);
		$high = intval($high);
		$low = intval($low);
		$correct = intval($correct);

		$ret['main']['counts']['total'] = $total;
		$ret['main']['counts']['high'] = $high;
		$ret['main']['counts']['low'] = $low;
		$ret['main']['counts']['correct'] = $correct;

		$ret['main']['percents']['high'] = round(100 * $high / $total);
		$ret['main']['percents']['low'] = round(100 * $low / $total);
		$ret['main']['percents']['correct'] = round(100 * $correct / $total);

		$model = new CustomerData();
		$guessed_prices_by_generations = $model->get_guessed_prices_by_generations_all();
		//VarDumper::dump($guessed_prices_by_generations, 10, 1);
		foreach($guessed_prices_by_generations as $k => $v){
			if($k != 'Others' && $v['total'] > 0){
				$ret['generations'][$k]['total'] = $v['total'];
				$ret['generations'][$k]['high'] = round(100 * $v['high'] / $v['total']);
				$ret['generations'][$k]['low'] = round(100 * $v['low'] / $v['total']);
				$ret['generations'][$k]['correct'] = round(100 * $v['correct'] / $v['total']);
			}else{
				//$ret['generations'][$k] = $v;
			}
		}


		return $ret;

	}

	public function get_customers_count(){
		return CustomerData::find()->count();
	}

	public function getSummarizingStatistics($age_diapasons, $vers = 1){
		$ret = [];

		if(!empty($age_diapasons)){
			foreach($age_diapasons as $diapason){
				$a = explode('-', $diapason);
				$ret[$diapason]['min'] = intval($a[0]);
				$ret[$diapason]['max'] = intval($a[1]);

				if($vers == 1){
					$_sql = "SELECT age, FORMAT(AVG(ins_monthly_price), 2) AS avg_price, COUNT(*) count
							FROM rates_data_statistic
							WHERE age = ".$ret[$diapason]['min']." OR age = ".$ret[$diapason]['max']."
							GROUP BY age
							ORDER BY age ASC";
				}elseif($vers == 2){
					$_sql = "SELECT CONCAT((FLOOR(age/5))*5,'-',((FLOOR(age/5))*5)+5) age_range, FORMAT(AVG(ins_monthly_price), 2) AS avg_price, COUNT(*) count
							FROM rates_data_statistic
							WHERE age >= ".$ret[$diapason]['min']." AND age <= ".($ret[$diapason]['max'] - 5)."
							GROUP BY age_range
							ORDER BY age_range ASC";
				}
				$results = Yii::$app->db->createCommand($_sql)->queryAll();

				if($results){
					foreach($results as $result){
						$ret[$diapason][] = floatval($result['avg_price']);
					}
					$ret[$diapason]['percent'] = ($ret[$diapason][1] - $ret[$diapason][0]) / $ret[$diapason][0] * 100;
					if($ret[$diapason]['percent'] < 1){
						$ret[$diapason]['percent'] = round($ret[$diapason]['percent'], 2);
					}else{
						$ret[$diapason]['percent'] = round($ret[$diapason]['percent'], 0);
					}
				}
			}
		}

		return $ret;
	}

	public function getStatisticPrices($args){
		$return = [];

		if($args['by'] == 'age'){
			$session = Yii::$app->session;

			$age = 30;
			if(isset($args['age']) && !empty($args['age']) && $args['age'] != 'auto'){
				$age = intval($args['age']);
			}

			if($args['age'] == 'auto'){
				$customer_data = CustomerData::find()->where(['sid' => $session->id])->one();
				$customer_data = json_decode($customer_data->data, true);

				if(!empty($customer_data)){
					if(isset($customer_data['age'])){
						$age = intval($customer_data['age']);
					}elseif(isset($customer_data['birthday'])){
						$age = date('Y') - date('Y', strtotime($customer_data['birthday']));
					}
				}
			}
		}
		#VarDumper::dump($age, 10, 1);

		if(isset($args['by']) && isset($args['data_type'])){
			$exclude_companies_lowest = ["'ladder'", "'sbli'", "'sbli_express'", "'lincoln_financial'"];
			$exclude_companies_best = ["'ladder'", "'sbli'", "'sbli_express'", "'sagicor'", "'sagicor_express_issue'", "'lincoln_financial'"];

			$switch = $args['data_type'].'_'.$args['by'];
			switch($switch){
				case "counts_age_health":
					$_sql = "
							SELECT CONCAT((FLOOR(age/5))*5,'-',((FLOOR(age/5))*5)+4) age_range, health, COUNT(*) count
							FROM rates_data_statistic
							WHERE (age >= 20 AND age <= 70)
							GROUP BY age_range, health
							ORDER BY age_range";
					$return = Yii::$app->db->createCommand($_sql)->queryAll();
					break;
				case "overall_age_price":
					$_sql = "
							SELECT CONCAT((FLOOR(age/5))*5,'-',((FLOOR(age/5))*5)+4) age_range, FORMAT(AVG(ins_monthly_price), 2) AS price, COUNT(*) count
							FROM rates_data_statistic
							WHERE (age >= 20 AND age <= 70)
							GROUP BY age_range
							ORDER BY age_range";
					$return = Yii::$app->db->createCommand($_sql)->queryAll();
					break;
				case "overall_age_coverage":
					$_sql = "
							SELECT CONCAT((FLOOR(age/5))*5,'-',((FLOOR(age/5))*5)+4) age_range, FLOOR(AVG(coverage) / 10000) * 10000 AS coverage, COUNT(*) count
							FROM rates_data_statistic
							WHERE (age >= 20 AND age <= 70) AND coverage >= 100000
							GROUP BY age_range
							ORDER BY age_range";
					$return = Yii::$app->db->createCommand($_sql)->queryAll();
					break;
				case "overall_age_term":
					$_sql = "
							SELECT CONCAT((FLOOR(age/5))*5,'-',((FLOOR(age/5))*5)+4) age_range, FLOOR(AVG(term) / 5) * 5 AS term, COUNT(*) count
							FROM rates_data_statistic
							WHERE (age >= 20 AND age <= 70)
							GROUP BY age_range
							ORDER BY age_range";
					$return = Yii::$app->db->createCommand($_sql)->queryAll();
					break;
				case "overall_generation":
					if(isset($args['for']) && is_array($args['for'])){
						foreach($args['for'] as $type){
							$where = "generation = '".$type."'";
							switch($type){
								case "GenZ":
									$where = "(age >= 18 AND age <= 23)";
									break;
								case "Millennials":
									$where = "(age >= 24 AND age <= 40)";
									break;
								case "GenerationX":
									$where = "(age >= 41 AND age <= 54)";
									break;
								case "BabyBoomers":
									$where = "(age >= 55 AND age <= 74)";
									break;
								default:
									break;
							}
							$_sql = "
									SELECT FORMAT(AVG(ins_monthly_price), 2) AS price, age, generation, COUNT(*) count
									FROM rates_data_statistic
									WHERE ".$where."
									GROUP BY age
									ORDER BY age, price";
							$return[$type] = Yii::$app->db->createCommand($_sql)->queryAll();
						}
					}
					break;
				case "lowest_all":
					$_sql = "
							SELECT id, ins_company_name, ins_company_code, FORMAT(AVG(ins_monthly_price), 2) AS price
							FROM rates_data_statistic
							WHERE ins_company_code NOT IN(".implode(',', $exclude_companies_lowest).")
							GROUP BY ins_company_code
							ORDER BY AVG(ins_monthly_price) ASC
							LIMIT 0, 5";
					$return = Yii::$app->db->createCommand($_sql)->queryAll();
					break;
				case "lowest_age":
					$_sql = "
							SELECT id, age, ins_company_name, ins_company_code, FORMAT(AVG(ins_monthly_price), 2) AS price
							FROM rates_data_statistic
							WHERE age = ".$age." AND ins_company_code NOT IN(".implode(',', $exclude_companies_lowest).")
							GROUP BY ins_company_code
							ORDER BY AVG(ins_monthly_price) ASC
							LIMIT 0, 5";
					$return = Yii::$app->db->createCommand($_sql)->queryAll();
					break;
				case "lowest_gender":
					if(isset($args['for']) && is_array($args['for'])){
						foreach($args['for'] as $type){
							$type = substr($type, 0, 1);
							$_sql = "SELECT id, gender, ins_company_name, ins_company_code, FORMAT(AVG(ins_monthly_price), 2) AS price
									FROM rates_data_statistic
									WHERE gender = '".$type."' AND ins_company_code NOT IN(".implode(',', $exclude_companies_lowest).")
									GROUP BY gender, ins_company_code
									ORDER BY AVG(ins_monthly_price) ASC
									LIMIT 0, 5";
							$return[$type] = Yii::$app->db->createCommand($_sql)->queryAll();
						}
					}
					break;
				case "lowest_generation":
					if(isset($args['for']) && is_array($args['for'])){
						foreach($args['for'] as $type){
							$_sql = "SELECT id, generation, ins_company_name, ins_company_code, FORMAT(AVG(ins_monthly_price), 2) AS price
									FROM rates_data_statistic
									WHERE generation = '".$type."' AND ins_company_code NOT IN(".implode(',', $exclude_companies_lowest).")
									GROUP BY ins_company_code
									ORDER BY AVG(ins_monthly_price) ASC
									LIMIT 0, 5";
							$return[$type] = Yii::$app->db->createCommand($_sql)->queryAll();
						}
					}
					break;
				case "lowest_health":
					if(isset($args['for']) && is_array($args['for'])){
						foreach($args['for'] as $type){
							$_sql = "SELECT id, health, ins_company_name, ins_company_code, FORMAT(AVG(ins_monthly_price), 2) AS price
									FROM rates_data_statistic
									WHERE health = '".$type."' AND ins_company_code NOT IN(".implode(',', $exclude_companies_lowest).")
									GROUP BY ins_company_code
									ORDER BY AVG(ins_monthly_price) ASC
									LIMIT 0, 5";
							$return[$type] = Yii::$app->db->createCommand($_sql)->queryAll();
						}
					}
					break;
				case "best_score":
					$_sql = "SELECT id, age, gender, generation, coverage, term, ins_company_name, ins_company_code, ins_monthly_price, FORMAT(AVG(((coverage/100000)*term)/ins_monthly_price), 2) AS price
							FROM rates_data_statistic
							WHERE ins_company_code NOT IN(".implode(',', $exclude_companies_best).")
							GROUP BY ins_company_code
							ORDER BY price DESC
							LIMIT 0, 5";
					$return = Yii::$app->db->createCommand($_sql)->queryAll();
					break;
				case "best_gender":
					if(isset($args['for']) && is_array($args['for'])){
						foreach($args['for'] as $type){
							$type = substr($type, 0, 1);
							$_sql = "SELECT id, gender, ins_company_name, ins_company_code, FORMAT(MIN(ins_monthly_price), 2) AS price
									FROM rates_data_statistic
									WHERE gender = '".$type."' AND ins_company_code NOT IN(".implode(',', $exclude_companies_best).")
									GROUP BY gender, ins_company_code
									ORDER BY MIN(ins_monthly_price) DESC
									LIMIT 0, 5";
							$return[$type] = Yii::$app->db->createCommand($_sql)->queryAll();
						}
					}
					break;
				case "best_generation":
					if(isset($args['for']) && is_array($args['for'])){
						foreach($args['for'] as $type){
							$_sql = "SELECT id, generation, ins_company_name, ins_company_code, FORMAT(MIN(ins_monthly_price), 2) AS price
									FROM rates_data_statistic
									WHERE generation = '".$type."' AND ins_company_code NOT IN(".implode(',', $exclude_companies_best).")
									GROUP BY ins_company_code
									ORDER BY MIN(ins_monthly_price) DESC
									LIMIT 0, 5";
							$return[$type] = Yii::$app->db->createCommand($_sql)->queryAll();
						}
					}
					break;
				case "best_health":
					if(isset($args['for']) && is_array($args['for'])){
						foreach($args['for'] as $type){
							$_sql = "SELECT id, health, ins_company_name, ins_company_code, FORMAT(MIN(ins_monthly_price), 2) AS price
									FROM rates_data_statistic
									WHERE health = '".$type."' AND ins_company_code NOT IN(".implode(',', $exclude_companies_best).")
									GROUP BY ins_company_code
									ORDER BY MIN(ins_monthly_price) DESC
									LIMIT 0, 5";
							$return[$type] = Yii::$app->db->createCommand($_sql)->queryAll();
						}
					}
					break;
			}
		}

		return $return;
	}

	public function parse_chart_data($data_type, $by, $source_data, $wordwrap_limit = 20, $Axis_label_style = 'single', $price_gap = 10, $number_rounding = 10){
		$chart_data = [];
		$min = [];
		$max = [];

		$switch = $data_type.'_'.$by;

		switch($switch){
			case "counts_age_health":
				$sort_arr = ['excellent' => 'Excellent', 'very-good' => 'Very Good', 'good' => 'Good', 'fair' => 'Fair'];
				$min_max_a = [];
				$colors = $this->generate_charts_pie_colors([]);
				$i=0;
				foreach($source_data as $k => $data){
					$chart_data['labels'][] = $data['age_range'];
					if(!isset($chart_data['data'][$data['health']])){
						$chart_data['data'][$data['health']] = [
							'label'           => $sort_arr[$data['health']],
							'backgroundColor' => $colors['backgroundColor'][$i],
							'borderColor'     => $colors['borderColor'][$i],
							'borderWidth'     => 1,
						];
						$i++;
					}
					$chart_data['data'][$data['health']]['data'][] = $data['count'];
					$min_max_a[] = floatval($data['count']);
				}
				$chart_data['labels'] = array_unique($chart_data['labels']);
				sort($chart_data['labels']);
				reset($chart_data['labels']);

				$tmp_data = [];
				foreach($sort_arr as $k => $v){
					$tmp_data[$k] = $chart_data['data'][$k];
				}
				$chart_data['data'] = [];
				foreach($tmp_data as $k => $v){
					$chart_data['data'][] = $v;
				}
				if($number_rounding > 0){
					$min = floor(round(min($min_max_a) - $price_gap) / $number_rounding) * $number_rounding;
					$max = floor(round(max($min_max_a) + $price_gap) / $number_rounding) * $number_rounding;
				}else{
					$min = min($min_max_a) - $price_gap;
					$max = max($min_max_a) + $price_gap;
				}
				if($min < 0){
					$min = 0;
				}
				break;
			case "overall_age_price":
				$min_max_a = [];
				foreach($source_data as $k => $data){
					$age_range_arr = explode('-', $data['age_range']);
					$chart_data['labels'][] = $data['age_range'];
					$chart_data['data'][] = ['x' => intval($age_range_arr[0]), 'y' => floatval($data['price'])];
					$min_max_a[] = floatval($data['price']);
				}
				if($number_rounding > 0){
					$min = floor(round(min($min_max_a) - $price_gap) / $number_rounding) * $number_rounding;
					$max = floor(round(max($min_max_a) + $price_gap) / $number_rounding) * $number_rounding;
				}else{
					$min = min($min_max_a) - $price_gap;
					$max = max($min_max_a) + $price_gap;
				}
				if($min < 0){
					$min = 0;
				}
				break;
			case "overall_age_coverage":
				foreach($source_data as $k => $data){
					$age_range_arr = explode('-', $data['age_range']);
					$chart_data['labels'][] = $data['age_range'];
					$chart_data['data'][] = ['x' => intval($age_range_arr[0]), 'y' => intval($data['coverage'])];
				}
				$min = 0;
				$max = 1000000;
				break;
			case "overall_age_term":
				foreach($source_data as $k => $data){
					$age_range_arr = explode('-', $data['age_range']);
					$chart_data['labels'][] = $data['age_range'];
					$chart_data['data'][] = ['x' => intval($age_range_arr[0]), 'y' => intval($data['term'])];
				}
				$min = 5;
				$max = 30;
				break;
			case "overall_generation":
				foreach($source_data as $type => $type_data){
					$min_max_a = [];
					foreach($type_data as $k => $data){
						$chart_data[$type]['labels'][] = $data['age'];
						$chart_data[$type]['data'][] = ['x' => intval($data['age']), 'y' => floatval($data['price'])];
						$min_max_a[$type][] = floatval($data['price']);
					}
					if($number_rounding > 0){
						$min[$type] = floor(round(min($min_max_a[$type]) - $price_gap) / $number_rounding) * $number_rounding;
						$max[$type] = floor(round(max($min_max_a[$type]) + $price_gap) / $number_rounding) * $number_rounding;
					}else{
						$min[$type] = min($min_max_a[$type]) - $price_gap;
						$max[$type] = max($min_max_a[$type]) + $price_gap;
					}
					if($min[$type] < 0){
						$min[$type] = 0;
					}
				}
				break;
			case "all":
			case "lowest_age":
			case "lowest_score":
			case "best_age":
			case "best_score":
				$min_max_a = [];
				foreach($source_data as $k => $data){
					$data['ins_company_name'] = $this->get_ins_company_short_name($data['ins_company_name']);
					$data['ins_company_name'] = wordwrap($data['ins_company_name'], $wordwrap_limit);
					if($Axis_label_style == 'multi'){
						$data['ins_company_name'] = explode("\n", $data['ins_company_name']);
					}
					$chart_data['labels'][] = $data['ins_company_name'];
					$chart_data['data'][] = floatval($data['price']);
					$min_max_a[] = floatval($data['price']);
				}
				if($number_rounding > 0){
					$min = floor(round(min($min_max_a) - $price_gap) / $number_rounding) * $number_rounding;
					$max = floor(round(max($min_max_a) + $price_gap) / $number_rounding) * $number_rounding;
				}else{
					$min = min($min_max_a) - $price_gap;
					$max = max($min_max_a) + $price_gap;
				}
				if($min < 0){
					$min = 0;
				}
				break;
			case "lowest_gender":
			case "lowest_health":
			case "lowest_generation":
			case "best_gender":
			case "best_health":
			case "best_generation":
				foreach($source_data as $type => $type_data){
					$min_max_a = [];
					foreach($type_data as $k => $data){
						$data['ins_company_name'] = $this->get_ins_company_short_name($data['ins_company_name']);
						$data['ins_company_name'] = wordwrap($data['ins_company_name'], $wordwrap_limit);
						if($Axis_label_style == 'multi'){
							$data['ins_company_name'] = explode("\n", $data['ins_company_name']);
						}
						$chart_data[$type]['labels'][] = $data['ins_company_name'];
						$chart_data[$type]['data'][] = floatval($data['price']);
						$min_max_a[$type][] = floatval($data['price']);
					}
					if($number_rounding > 0){
						$min[$type] = floor(round(min($min_max_a[$type]) - $price_gap) / $number_rounding) * $number_rounding;
						$max[$type] = floor(round(max($min_max_a[$type]) + $price_gap) / $number_rounding) * $number_rounding;
					}else{
						$min[$type] = min($min_max_a[$type]) - $price_gap;
						$max[$type] = max($min_max_a[$type]) + $price_gap;
					}
					if($min[$type] < 0){
						$min[$type] = 0;
					}
				}
				break;
		}

		return ['chart_data' => $chart_data, 'min' => $min, 'max' => $max];
	}

	public function get_ins_company_short_name($company_name){
		$return = $company_name;

		switch($company_name){
			case "American Amicable":
				break;
			case "American General Life Insurance":
				$return = "American General";
				break;
			case "American National Insurance Company":
				$return = "American National";
				break;
			case "AMERICO":
				break;
			case "Ameritas":
				$return = "AMERITAS";
				break;
			case "Assurity Life Insurance Company":
				$return = "Assurity";
				break;
			case "AXA":
				break;
			case "Banner Life Insurance Company":
				$return = "Banner";
				break;
			case "Fidelity Life - Express Issue":
				$return = "Fidelity";
				break;
			case "Foresters Life":
				$return = "Foresters";
				break;
			case "Foresters Life - Express Issue":
				$return = "Foresters";
				break;
			case "HavenLife":
				break;
			case "John Hancock":
				break;
			case "Ladder":
				break;
			case "Lincoln Financial":
				$return = "Lincoln";
				break;
			case "Lincoln Financial Express":
				$return = "Lincoln";
				break;
			case "Mutual of Omaha - Express Issue":
				$return = "Mutual of Omaha";
				break;
			case "Mutual Of Omaha Insurance Company":
				$return = "Mutual of Omaha";
				break;
			case "North American Company":
				$return = "North American";
				break;
			case "Pacific Life":
				break;
			case "Principal Financial Group":
				$return = "Principal";
				break;
			case "Protective Life":
				$return = "Protective";
				break;
			case "Prudential Financial":
				$return = "Prudential";
				break;
			case "Sagicor Life Insurance":
				$return = "Sagicor";
				break;
			case "Sagicor Life Insurance - Express Issue":
				$return = "Sagicor";
				break;
			case "SBLI":
				break;
			case "SBLI Express":
				$return = "SBLI";
				break;
			case "Transamerica Life Insurance":
				$return = "Transamerica";
				break;
			case "Transamerica Life Insurance with Living Benefits":
				$return = "Transamerica";
				break;
			case "United Home Life - Express Issue":
				$return = "UHL";
				break;
			case "United States Life":
		}

		return $return;
	}

	public function generate_charts_pie_colors($chart_data, $transparent = '0.2'){
		$colors = [
			"rgba(154, 214, 154, {transparent})",
			"rgba(75, 192, 192, {transparent})",
			"rgba(54, 162, 235, {transparent})",
			"rgba(153, 102, 255, {transparent})",
			"rgba(255, 99, 132, {transparent})",
			"rgba(255, 159, 64, {transparent})",
			"rgba(255, 205, 86, {transparent})",
			"rgba(143, 90, 207, {transparent})",
			"rgba(207, 104, 183, {transparent})",
			"rgba(207, 105, 101, {transparent})",
			"rgba(207, 153, 83, {transparent})",
			"rgba(207, 207, 73, {transparent})",
			"rgba(159, 207, 68, {transparent})",
			"rgba(66, 207, 66, {transparent})",
			"rgba(65, 207, 114, {transparent})",
			"rgba(76, 207, 160, {transparent})",
			"rgba(78, 186, 207, {transparent})",
			"rgba(89, 134, 207, {transparent})",
			"rgba(201, 203, 207, {transparent})"
		];

		shuffle($colors);

		$backgroundColor = $borderColor = [];

		foreach($colors as $k => $color){
			$backgroundColor[$k] = str_replace('{transparent}', $transparent, $color);
		}
		$chart_data['backgroundColor'] = $backgroundColor;

		$transparent = 1;
		foreach($colors as $k => $color){
			$borderColor[$k] = str_replace('{transparent}', $transparent, $color);
		}
		$chart_data['borderColor'] = $borderColor;

		return $chart_data;
	}

	public function generate_for_labels($for){
		$for_arr = [];

		foreach($for as $k => $v){
			switch($v){
				case 'male':
					$for_arr['m'] = 'Male';
					break;
				case 'female':
					$for_arr['f'] = 'Female';
					break;
				case 'GenZ':
					$for_arr[$v] = 'GenZ';
					break;
				case 'Millennials':
					$for_arr[$v] = 'Millennials';
					break;
				case 'GenerationX':
					$for_arr[$v] = 'Generation X';
					break;
				case 'BabyBoomers':
					$for_arr[$v] = 'Baby Boomers';
					break;
				case 'fair':
					$for_arr[$v] = 'Fair';
					break;
				case 'good':
					$for_arr[$v] = 'Good';
					break;
				case 'very-good':
					$for_arr[$v] = 'Very good';
					break;
				case 'excellent':
					$for_arr[$v] = 'Excellent';
					break;
			}
		}

		return $for_arr;
	}

	public function min_max_stabilization($min, $max){

		$_min = min($min);
		foreach($min as $k => $v){
			$min[$k] = $_min;
		}
		$_max = max($max);
		foreach($max as $k => $v){
			$max[$k] = $_max;
		}

		return ['min' => $min, 'max' => $max];

	}

	public function removeEmptyRateCalcEntries(){
		$models = RatesDataCache::find()->where("response_results = '[]'")->orWhere("response_results = 'null'")->all();
		Yii::info('Cron - removeEmptyRateCalcEntries find count = '.count($models), 'cron');
		if($models){
			foreach($models as $model){
				$model->delete();
			}
		}
	}

	public function removeDuplicateStatisticData($offset = 0, $limit = 10){
		$report = [];

		$offset = file_get_contents($_SERVER['DOCUMENT_ROOT'].'tmp_offset.txt');
		$offset = intval($offset);

		$report['Before'] = RatesDataStatistic::find()->count();
		$report['After'] = 0;
		$report['Removed'] = 0;

		$model = RatesDataStatistic::find()->offset($offset)->limit($limit)->all();
		$i = 0;
		if($model){
			$ids = [];
			foreach($model as $data){
				$current_id = $data['id'];
				$find_data = [
					'age'               => $data['age'],
					'smoker'            => $data['smoker'],
					'health'            => $data['health'],
					'gender'            => $data['gender'],
					'coverage'          => $data['coverage'],
					'term'              => $data['term'],
					'ins_company_code'  => $data['ins_company_code'],
					'ins_monthly_price' => $data['ins_monthly_price'],
				];
				$duplicate_count = RatesDataStatistic::find()->where($find_data)->andWhere(['!=', 'id', $current_id])->count();
				if(intval($duplicate_count) > 0){
					$i++;
					//$report[$i]['id'] = $current_id;
					//$report[$i]['duplicate'] = $duplicate_count;
					$where = [];
					foreach($find_data as $k => $f){
						$where[] = $k."='".$f."'";
					}
					$_sql = "SELECT id FROM rates_data_statistic WHERE id != ".$current_id." AND (".implode(' AND ', $where).")";
					$result = Yii::$app->db->createCommand($_sql)->queryAll();
					//$report[$i]['sql'] = $_sql;
					//$report[$i]['result'] = $result;
					//$m = RatesDataStatistic::find()->where($find_data)->andWhere(['!=', 'id', $current_id])->all();
					if(!empty($result)){
						foreach($result as $d){
							$ids[] = $d['id'];
							//$d->delete();
						}
					}
				}
			}
			if(!empty($ids)){
				sort($ids);
				reset($ids);
				$report['ids'] = $ids;
				Yii::$app->db->createCommand("DELETE FROM rates_data_statistic WHERE id IN (".implode(',', $ids).")")->execute();
			}
			file_put_contents($_SERVER['DOCUMENT_ROOT'].'tmp_offset.txt', $offset+$limit);
		}

		$report['After'] = RatesDataStatistic::find()->count();
		$report['Removed'] = ($report['Before']-$report['After']);

		if($i == 0){
			//$this->removeDuplicateStatisticData($offset+$limit, $limit);
		}else{
			//Yii::info('Cron - removeDuplicateStatisticData removed - '.$report['duplicate'], 'cron');
			Yii::info('Cron - removeDuplicateStatisticData removed - '.$report['Removed'], 'cron');
		}

		#VarDumper::dump($report, 10, 1);

		return $report;
	}

	public function removeOlderRateCalcEntries(){
		$time = time() - 86400 * 30 * 2;
		$date = date('Y-m-d H:i:s', $time);
		
		Yii::info('Cron - removeOlderRateCalcEntries last date = '.$date, 'cron');
		
		$models = RatesDataCache::find()->where("updated < '".$date."'")->limit(100)->all();
		$count = count($models);
		
		if($models){
			foreach($models as $model){
				$model->delete();
			}
		}
		
		Yii::info('Cron - removeOlderRateCalcEntries count = '.$count, 'cron');
		
		return $count;
	}
	
	public function parseRatesData(){

		$this->removeOlderRateCalcEntries();
		$this->removeEmptyRateCalcEntries();
		//$this->removeDuplicateStatisticData();
		
		$rtc = new RatesDataCache();
		$results = $rtc::find()->where(['parsed' => 0])->limit(1)->all();
		#VarDumper::dump($results, 10, 1);
		Yii::info('Cron - parseRatesData find count = '.count($results), 'cron');
		
		$y = date('Y');
		$report = [];
		if($results){
			foreach($results as $result){
				$request_params = json_decode($result->request_params);
				$response_results = json_decode($result->response_results);

				$save_data = [
					'age'               => 0,
					'smoker'            => '-',
					'health'            => '-',
					'gender'            => '-',
					'generation'        => '-',
					'state'             => '-',
					'coverage'          => 0,
					'term'              => 0,
					'ins_company_name'  => '-',
					'ins_company_code'  => '-',
					'ins_monthly_price' => 0,
					'ins_annual_price'  => 0,
				];
				$report['counter']++;
				switch($result->data_source){
					case "Ethos":
						break;
					case "Ladder":
						$add = false;
						$born_year = intval(date('Y', strtotime($request_params->date_of_birth)));
						$save_data['age'] = $y - intval(date('Y', strtotime($request_params->date_of_birth)));
						$save_data['smoker'] = ($request_params->smoker ? 1 : 0);
						$save_data['health'] = $this->get_user_health_value($result->data_source, $request_params->health_rating);
						$save_data['gender'] = substr($request_params->sex, 0, 1);
						$save_data['generation'] = $this->get_user_generation_value($born_year);
						if(isset($request_params->state)){
							$save_data['state'] = $request_params->state;
						}
						$save_data['term'] = intval($request_params->term);
						$save_data['coverage'] = intval($request_params->coverage);

						foreach($response_results as $response){
							if(isset($response->company_name)){
								$save_data['ins_company_name'] = $response->company_name;
							}
							if(isset($response->company_code)){
								$save_data['ins_company_code'] = $response->company_code;
							}
							if(isset($response->monthly_premium)){
								$save_data['ins_monthly_price'] = $response->monthly_premium;
								$add = true;
							}
							if(isset($response->premium_annual)){
								$save_data['ins_annual_price'] = $response->premium_annual;
							}
							if(isset($response->coverage)){
								$save_data['coverage'] = intval($response->coverage);
							}
							if(isset($response->term)){
								$save_data['term'] = intval($response->term);
							}
							if($add){
								$find_data = [
									'age'               => $save_data['age'],
									'smoker'            => $save_data['smoker'],
									'health'            => $save_data['health'],
									'gender'            => $save_data['gender'],
									'coverage'          => $save_data['coverage'],
									'term'              => $save_data['term'],
									'ins_company_code'  => $save_data['ins_company_code'],
									'ins_monthly_price' => $save_data['ins_monthly_price'],
								];
								$duplicate_count = RatesDataStatistic::find()->where($find_data)->count();
								$report['results'][$result->id][] = 'duplicate entry count = '.$duplicate_count;
								if(intval($duplicate_count) == 0){
									$rds = new RatesDataStatistic($save_data);
									if($rds->save(true)){
										//$report['results'][$result->id][] = 'added';
										$result->parsed = 1;
										$result->update(false);
									}else{
										$report['results'][$result->id][] = 'cant added';
										$result->parsed                   = 2;
										$result->update(false);
									}
									unset($rds);
								}else{
									$report['results'][$result->id][] = 'duplicate entry';
									$result->parsed = 4;
									$result->update(false);
								}
							}else{
								$report['results'][$result->id][] = 'skiped';
								$result->parsed = 3;
								$result->update(false);
							}
							$report['counter']++;
						}
						break;
					case "HavenLife":
						$add = false;
						$born_year = intval(date('Y', strtotime($request_params->dateOfBirth)));
						if(isset($request_params->age)){
							$save_data['age'] = intval($request_params->age);
						}else{
							$save_data['age'] = $y - intval(date('Y', strtotime($request_params->dateOfBirth)));
						}
						$save_data['smoker'] = ($request_params->isSmoker == 'true' ? 1 : 0);
						$save_data['health'] = $this->get_user_health_value($result->data_source, $request_params->healthCategory);
						$save_data['gender'] = substr($request_params->gender, 0, 1);
						$save_data['generation'] = $this->get_user_generation_value($born_year);
						$save_data['state'] = $request_params->state;
						$save_data['term'] = intval($request_params->termLength);
						$save_data['coverage'] = intval($request_params->coverageAmount);

						foreach($response_results as $response){
							if(isset($response->company_name)){
								$save_data['ins_company_name'] = $response->company_name;
							}
							if(isset($response->company_code)){
								$save_data['ins_company_code'] = $response->company_code;
							}
							if(isset($response->monthlyRate)){
								$save_data['ins_monthly_price'] = $response->monthlyRate;
								$add                            = true;
							}
							if(isset($response->premium_annual)){
								$save_data['ins_annual_price'] = $response->premium_annual;
							}
							if($add){
								$find_data = [
									'age'               => $save_data['age'],
									'smoker'            => $save_data['smoker'],
									'health'            => $save_data['health'],
									'gender'            => $save_data['gender'],
									'coverage'          => $save_data['coverage'],
									'term'              => $save_data['term'],
									'ins_company_code'  => $save_data['ins_company_code'],
									'ins_monthly_price' => $save_data['ins_monthly_price'],
								];
								$duplicate_count = RatesDataStatistic::find()->where($find_data)->count();
								$report['results'][$result->id][] = 'duplicate entry count = '.$duplicate_count;
								if(intval($duplicate_count) == 0){
									$rds = new RatesDataStatistic($save_data);
									if($rds->save(true)){
										//$report['results'][$result->id][] = 'added';
										$result->parsed                   = 1;
										$result->update(false);
									}else{
										$report['results'][$result->id][] = 'cant added';
										$result->parsed                   = 2;
										$result->update(false);
									}
									unset($rds);
								}else{
									$report['results'][$result->id][] = 'duplicate entry';
									$result->parsed = 4;
									$result->update(false);
								}
							}else{
								$report['results'][$result->id][] = 'skiped';
								$result->parsed                   = 3;
								$result->update(false);
							}
							$report['counter']++;
						}
						break;
					case "NinjaQuoter":
						$add = false;
						$born_year = intval(date('Y', strtotime($request_params->birthdate)));
						$save_data['age'] = $y - intval(date('Y', strtotime($request_params->birthdate)));
						$save_data['smoker'] = ($request_params->smoker ? 1 : 0);
						$save_data['health'] = $this->get_user_health_value($result->data_source, $request_params->rate_class);
						$save_data['gender'] = substr($request_params->gender, 0, 1);
						$save_data['generation'] = $this->get_user_generation_value($born_year);
						$save_data['state'] = $request_params->state;
						$save_data['term'] = intval($request_params->term);
						$save_data['coverage'] = intval($request_params->coverage);
						foreach($response_results as $response){
							if(isset($response->company_name)){
								$save_data['ins_company_name'] = $response->company_name;
							}
							if(isset($response->company_code)){
								$save_data['ins_company_code'] = $response->company_code;
							}
							if(isset($response->premium_monthly)){
								$save_data['ins_monthly_price'] = $response->premium_monthly;
								$add = true;
							}
							if(isset($response->premium_annual)){
								$save_data['ins_annual_price'] = $response->premium_annual;
							}
							if(isset($response->coverage)){
								$save_data['coverage'] = intval($response->coverage);
							}
							if(isset($response->term)){
								$save_data['term'] = intval($response->term);
							}
							if($add){
								$find_data = [
									'age'               => $save_data['age'],
									'smoker'            => $save_data['smoker'],
									'health'            => $save_data['health'],
									'gender'            => $save_data['gender'],
									'coverage'          => $save_data['coverage'],
									'term'              => $save_data['term'],
									'ins_company_code'  => $save_data['ins_company_code'],
									'ins_monthly_price' => $save_data['ins_monthly_price'],
								];
								$duplicate_count = RatesDataStatistic::find()->where($find_data)->count();
								$report['results'][$result->id][] = 'duplicate entry count = '.$duplicate_count;
								if(intval($duplicate_count) == 0){
									$rds = new RatesDataStatistic($save_data);
									if($rds->save(true)){
										//$report['results'][$result->id][] = 'added';
										$result->parsed = 1;
										$result->update(false);
									}else{
										$report['results'][$result->id][] = 'cant added';
										$result->parsed = 2;
										$result->update(false);
									}
									unset($rds);
								}else{
									$report['results'][$result->id][] = 'duplicate entry';
									$result->parsed = 4;
									$result->update(false);
								}
							}else{
								$report['results'][$result->id][] = 'skiped';
								$result->parsed = 3;
								$result->update(false);
							}
							$report['counter']++;
						}
						break;
				}


				#VarDumper::dump($result->data_source, 10, 1);
				#VarDumper::dump($save_data, 10, 1);
				#VarDumper::dump($request_params, 10, 1);
				#VarDumper::dump($response_results, 10, 1);
			}

			$report['rates_data_cache_total'] = $rtc::find()->count();
			$report['rates_data_cache_parsed'] = $rtc::find()->where('parsed > 0')->count();
			$report['rates_data_cache_not_parsed'] = $rtc::find()->where(['parsed' => 0])->count();
			$report['rates_data_statistic_total'] = RatesDataStatistic::find()->count();

			#VarDumper::dump($report, 10, 1);
			Yii::info('Cron - parseRatesData report - '.json_encode($report), 'cron');
		}

		return 'done';
	}

	public function get_user_generation_value($born_year){
		$data = "Others";

		foreach($this->generation_rules as $generation => $rule){
			if($born_year >= $rule['min'] && $born_year <= $rule['max']){
				$data = str_replace(' ', '', $generation);
				break;
			}
		}

		return $data;
	}

	public function get_user_health_value($by = "HavenLife", $value = ""){
		$data = "";

		switch($by){
			case "Ethos":
				break;
			case "Ladder":
				$data = $this->healths_by_ladder[$value];
				break;
			case "HavenLife":
				$data = str_replace(' ', '-', $value);
				break;
			case "NinjaQuoter":
				$data = $this->healths_by_ninjaquoter[$value];
				break;
		}

		return $data;
	}

	public function getChartTypeClass($data_type, $by){
		$ret = "";
		switch($data_type){
			case "best":
			case "lowest":
			$ret = "bar-chart";
			break;
			case "counts":
				$ret = "bar-chart-multi";
				break;
			case "overall":
				$ret = "scatter-chart";
				break;
		}

		return $ret;
	}

	public function shortnarCompanyName($name){
		$find_arr = ['Company', '-', 'Express', 'Issue', 'Financial', 'Group', 'Insurance', 'Life', 'with', 'Living', 'Benefits'];

		$name = str_replace($find_arr, '', $name);

		return trim($name);
	}

	public function generatePriceColor($prices_range){
		if(empty($prices_range)){
			return $prices_range;
		}
		
		asort($prices_range);
		reset($prices_range);
		$prices_range = array_unique($prices_range);

		$min = min($prices_range);
		$max = max($prices_range);
		$mid = ($min + $max) / 2;
		$sum = array_sum($prices_range);
		$count = count($prices_range);
		$center = $sum / $count;

		$color_min = "#35d84e";
		$color_mid = "#ffdd00";
		$color_max = "#ff3a3d";

		$adj = $center - $min;

		$settings = [
			'sum' => $sum,
			'count' => $count,
			'min' => $min,
			'max' => $max,
			'mid' => $mid,
			'center' => $center,
			'color_min_hex' => $color_min,
			'color_min' => $this->RGB_2_HEX_2_RGB($color_min),
			'color_mid_hex' => $color_mid,
			'color_mid' => $this->RGB_2_HEX_2_RGB($color_mid),
			'color_max_hex' => $color_max,
			'color_max' => $this->RGB_2_HEX_2_RGB($color_max),
		];

		$i = 0;
		foreach($prices_range as $k => $price){
			$i++;
			$settings['i'] = $i;
			$settings['ratio'] = round(($center - $price) / $adj, 5);
			$colors = $this->_calcukatePriceColor($settings, $price);
			$settings['ratio'] = $colors['ratio'];
			$prices_range[$k] = [
				'price' => $price,
				'b_color' => $colors['b_color'],
				'f_color' => $colors['f_color'],
				'settings' => $settings,
			];
		}

		return $prices_range;
	}

	private function _calcukatePriceColor($settings, $value){
		$ratio = $settings['ratio'];
		$i = $settings['i'];

		$color1 = $settings['color_min'];
		$color2 = $settings['color_max'];
		$b_color = $settings['color_mid_hex'];
		$get_color = false;

		if($value <= $settings['min']){
			$b_color = $settings['color_min_hex'];
		}elseif($value >= $settings['max']){
			$b_color = $settings['color_max_hex'];
		}elseif($value <= $settings['center']){
			$get_color = true;
			$ratio = abs($ratio);
			if($ratio < -1) $ratio = -1;
			$color1 = $settings['color_min'];
			$color2 = $settings['color_mid'];
			$wieght = $settings['mid'] * $ratio;
			//$wieght = $settings['count'] / 2;
		}elseif($value > $settings['center']){
			$get_color = true;
			$ratio = abs($ratio);
			if($ratio > 1) $ratio = 1;
			$color2 = $settings['color_max'];
			$color1 = $settings['color_mid'];
			$wieght = $settings['max'] / $ratio;
			//$wieght = $settings['count'] / 2;
			//$i = $i - $wieght;
		}

		if($get_color){
			$b_color = $this->_getColor($color1, $color2, $wieght, $value);
		}
		$f_color = $this->getContrastYIQ($b_color);

		return ['b_color' => $b_color, 'f_color' => $f_color, 'ratio' => $ratio];
	}

	private function _getColor($color1_rgb, $color2_rgb, $max, $current){
		$tr = 1;
		$tg = 1;
		$tb = 1;

        /*$r = round($color1_rgb['r'] * $ratio + $color2_rgb['r'] * ($tr-$ratio));
        $g = round($color1_rgb['g'] * $ratio + $color2_rgb['g'] * ($tg-$ratio));
        $b = round($color1_rgb['b'] * $ratio + $color2_rgb['b'] * ($tb-$ratio));*/

        $r = $color1_rgb['r'] - intval(($color1_rgb['r'] - $color2_rgb['r']) / $max * $current);
		$g = $color1_rgb['g'] - intval(($color1_rgb['g'] - $color2_rgb['g']) / $max * $current);
		$b = $color1_rgb['b'] - intval(($color1_rgb['b'] - $color2_rgb['b']) / $max * $current);

		return $this->RGB_2_HEX_2_RGB(implode('.', [$r, $g, $b]));
    }

	/**
	 * RGB to Hex
	 * Hex to RGB
	 * @param $c
	 *
	 * @return bool
	 */
	private function RGB_2_HEX_2_RGB($c){
		if(!$c) return false;
		$c = trim($c);
		$out = false;
		if(preg_match("/^[0-9ABCDEFabcdef\#]+$/i", $c)){
			$c = str_replace('#','', $c);
			$l = strlen($c) == 3 ? 1 : (strlen($c) == 6 ? 2 : false);

			if($l){
				unset($out);
				$out['r'] = hexdec(substr($c, 0,1*$l));
				$out['g'] = hexdec(substr($c, 1*$l,1*$l));
				$out['b'] = hexdec(substr($c, 2*$l,1*$l));
			}else $out = false;

		}elseif (preg_match("/^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$/i", $c)){
			$spr = str_replace(array(',',' ','.'), ':', $c);
			$e = explode(":", $spr);
			if(count($e) != 3) return false;
			$out = '#';
			for($i = 0; $i<3; $i++)
				$e[$i] = dechex(($e[$i] <= 0)?0:(($e[$i] >= 255)?255:$e[$i]));

			for($i = 0; $i<3; $i++)
				$out .= ((strlen($e[$i]) < 2)?'0':'').$e[$i];

			$out = strtoupper($out);
		}else $out = false;

		return $out;
	}

	private function getContrastYIQ($hexcolor){

		$rgb = $this->RGB_2_HEX_2_RGB($hexcolor);

		$yiq = (($rgb['r'] * 299) + ($rgb['g'] * 587) + ($rgb['b'] * 114)) / 1000;
		return ($yiq >= 128) ? '#000' : '#fff';
	}

}
