<?php

namespace app\controllers;
use Yii;
use app\components\BaseController;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Session;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\NaRates;
use app\models\NaPrices;
use app\models\Questions;
use app\models\Subquestions;
use app\models\Reflexquestions;
use app\models\CustomerData;

class XmlController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


public function getTcByState($state = false){
    if($state===false) return false;

    $tc_data =[
        'AL' => '1',
        'AK' => '2',
        'AS' => '3',
        'AZ' => '4',
        'AR' => '5',
        'CA' => '6',
        'CO' => '7',
        'CT' => '8',
        'DE' => '9',
        'DC' => '10',
        'FL' => '12',
        'GA' => '13',
        'GU' => '14',
        'HI' => '15',
        'ID' => '16',
        'IL' => '17',
        'IN' => '18',
        'IA' => '19',
        'KS' => '20',
        'KY' => '21',
        'LA' => '22',
        'ME' => '23',
        'MD' => '25',
        'MA' => '26',
        'MI' => '27',
        'MN' => '28',
        'MS' => '29',
        'MO' => '30',
        'MT' => '31',
        'NE' => '32',
        'NV' => '33',
        'NH' => '34',
        'NJ' => '35',
        'NM' => '36',
        'NY' => '37',
        'NC' => '38',
        'ND' => '39',
        'MP' => '40',
        'OH' => '41',
        'OK' => '42',
        'OR' => '43',
        'PA' => '45',
        'PR' => '46',
        'RI' => '47',
        'SC' => '48',
        'SD' => '49',
        'TN' => '50',
        'TX' => '51',
        'UT' => '52',
        'VT' => '53',
        'VI' => '54',
        'WA' => '56',
        'VA' => '55',
        'WV' => '57',
        'WI' => '58',
        'WY' => '59',
        'AA' => '60',
        'AE' => '61',
        'GB' => '80',
    ];

    if(array_key_exists($state, $tc_data)){
        return $tc_data[$state];
    }
}
    public function actionIndex()
    {

        // echo strtotime('23/06/1969');

        header("Content-Type: text/xml; charset=utf-8");
   
        $form_time = date('h:i:sP');
        $form_date = date('Y-m-d');

        $request = Yii::$app->request;
        $session = Yii::$app->session;
        $model = CustomerData::find()->where(['sid'=>$session->id])->one();
        $data = json_decode($model->data, true);

        $form_trackid = $this->createGuid();
        $form_guid = $this->createGuid();
        $user_CRL = 'noexam';
        $password_CRL = 'Noexamqa1!';
        $form_first_name = $data['first_name'] ;
        $form_middle_name =$data['middle_name'];
        $form_last_name = $data['last_name'];
        $form_dob = strtotime($data['birthday']);
        $form_dob = date('Y-m-d',$form_dob);
        $form_weight =$data['weight'].'.0';
        $form_gender =$data['sex'];
        $form_state =$data['state'];
        // $form_coverage ='';
        $form_face_amount =$data['avg_amount'] * 1000;

     switch ($data['term']) {
         case '15':
            $form_term ='NA5J1700';
             break;
         case '20':
            $form_term ='NA5J1800';
             break;
         case '30':
            $form_term ='NA5J1900';
             break;
         
         default:
              $form_term ='NA5J1700';
             break;
     }

     $form_street_address =$data['street_address'];
     $form_city = $data['city'];
     $form_zip = $data['zip'];
     $form_phone_areacode = substr($data['phone_number'],0,3);
     $form_phone_number = substr($data['phone_number'],3);
     $form_email = $data['email'];
     $form_birth_state = $data['birth_state'];
     $form_birth_country = $data['birth_country'];
     $form_occupation = $data['occupation'];
     $form_householld_income = $data['household_income'];
     $form_ssn =$data['ssn'];
     $form_dln =$data['dln'];
     $form_dls =$data['dls'];
     $form_height =($data['h_foot'] * 12 + $data['h_inch']) .'.0';

    $dom = new \domDocument("1.0"); // Создаём XML-документ версии 1.0 с кодировкой utf-8
    //TXLife
    $elemTXLife = $dom->createElement("TXLife"); // Создаём корневой элемент
    $elemTXLife->setAttribute("xmlns:xsi", 'http://www.w3.org/2001/XMLSchema-instance');
    $elemTXLife->setAttribute("xmlns:xsd", 'http://www.w3.org/2001/XMLSchema');
    $elemTXLife->setAttribute("xmlns", 'http://ACORD.org/Standards/Life/2');
    //UserAuthRequest
    $elemUserAuthRequest = $dom->createElement('UserAuthRequest');
        $elemUserLoginName = $dom->createElement('UserLoginName',$user_CRL);
        //UserPswd
        $elemUserPswd = $dom->createElement('UserPswd');
            $elemCryptType= $dom->createElement('CryptType','NONE');
            $elemPswd= $dom->createElement('Pswd',$password_CRL);
        $elemUserPswd->appendChild($elemCryptType);
        $elemUserPswd->appendChild($elemPswd);
        //END UserPswd
        
        $elemUserDate= $dom->createElement('UserDate',$form_date);
        $elemUserTime= $dom->createElement('UserTime',$form_time);
        
        //VendorApp
        $elemVendorApp= $dom->createElement('VendorApp');
            $elemVendorName= $dom->createElement('VendorName','Sammons');
            $elemVendorName->setAttribute('VendorCode','137');
            $elemAppName= $dom->createElement('AppName','eApp');
            $elemAppVer= $dom->createElement('AppVer','1.0');
        $elemVendorApp->appendChild($elemVendorName);
        $elemVendorApp->appendChild($elemAppName);
        $elemVendorApp->appendChild($elemAppVer);
        //END VendorApp

    $elemUserAuthRequest->appendChild($elemUserLoginName);
    $elemUserAuthRequest->appendChild($elemUserPswd);
    $elemUserAuthRequest->appendChild($elemUserDate);
    $elemUserAuthRequest->appendChild($elemUserTime);
    $elemUserAuthRequest->appendChild($elemVendorApp);
    //END UserAuthRequest
    
    //TXLifeRequest
    $elemTXLifeRequest = $dom->createElement('TXLifeRequest');

        $elemTransRefGUID = $dom->createElement('TransRefGUID', $form_guid);
        $elemTransType = $dom->createElement('TransType','General Requirement Order Request');
        $elemTransType->setAttribute('tc', '121');
        $elemTransExeDate = $dom->createElement('TransExeDate',$form_date);
        $elemTransExeTime = $dom->createElement('TransExeTime',$form_time);
        $elemTransMode = $dom->createElement('TransMode','Original');
        $elemTransMode->setAttribute('tc', '121');

        //OLifE
        $elemOLifE = $dom->createElement('OLifE');
        // $elemOLifE->setAttribute('Version', '2.38.00');// ADD <CreationDate>2016-02-24</CreationDate> <CreationTime>07:52:06-07:00</CreationTime>
            //SourceInfo
            $elemSourceInfo = $dom->createElement('SourceInfo');
                $elemCreationDate = $dom->createElement('CreationDate',$form_date);
                $elemCreationTime = $dom->createElement('CreationTime',$form_time);
                $elemSourceInfoName= $dom->createElement('SourceInfoName','eApp');

            $elemSourceInfo->appendChild($elemCreationDate);
            $elemSourceInfo->appendChild($elemCreationTime);
            $elemSourceInfo->appendChild($elemSourceInfoName);  
            //END SourceInfo
            
            //Holding
            $elemHolding = $dom->createElement('Holding');
            $elemHolding->setAttribute('id', 'Holding_1');
                $elemHoldingTypeCode = $dom->createElement('HoldingTypeCode','Policy');
                $elemHoldingTypeCode->setAttribute('tc', '2');
                $elemHoldingForm = $dom->createElement('HoldingForm','Individual');
                $elemHoldingForm->setAttribute('tc', '1');
                //Policy
                $elemPolicy = $dom->createElement('Policy');
                $elemPolicy->setAttribute('id', 'Policy_1'); // CarrierPartyID instead of ID
                    
                    $elemPolNumber = $dom->createElement('PolNumber', 'LB30012345');
                    $elemLineOfBusiness = $dom->createElement('LineOfBusiness','Life');
                    $elemLineOfBusiness->setAttribute('tc', '1');
                    $elemProductType = $dom->createElement('ProductType','Indeterminate Premium');
                    $elemProductType->setAttribute('tc', '41');
                    $elemProductCode = $dom->createElement('ProductCode',$form_term);
                    $elemCarrierCode = $dom->createElement('CarrierCode','60');
                    
                    //Life
                    $elemLife = $dom->createElement('Life');
                        $elemFaceAmt = $dom->createElement('FaceAmt', $form_face_amount);
                    $elemLife->appendChild($elemFaceAmt);
                    //END Life
                    
                    //ApplicationInfo
                    $elemApplicationInfo = $dom->createElement('ApplicationInfo');
                        $elemTrackingID = $dom->createElement('TrackingID',$form_trackid);
                        $elemApplicationJurisdiction = $dom->createElement('ApplicationJurisdiction','KY');
                        $elemApplicationJurisdiction->setAttribute('tc', '21');
                        //OLifEExtension
                        $elemOLifEExtension = $dom->createElement('OLifEExtension');
                        $elemOLifEExtension->setAttribute('VendorCode', '137');
                            //ApplicationInfoExtension
                            $elemApplicationInfoExtension = $dom->createElement('ApplicationInfoExtension');
                                $elemSolicitationCity = $dom->createElement('SolicitationCity','Louisville');
                            $elemApplicationInfoExtension->appendChild($elemSolicitationCity);
                            //END ApplicationInfoExtension
                        $elemOLifEExtension->appendChild($elemApplicationInfoExtension);
                        //END OLifEExtensio
                    $elemApplicationInfo->appendChild($elemTrackingID);
                    $elemApplicationInfo->appendChild($elemApplicationJurisdiction);
                    $elemApplicationInfo->appendChild($elemOLifEExtension);
                    //END ApplicationInfo
                    
                    //RequirementInfo
                    $elemRequirementInfo = $dom->createElement('RequirementInfo');
                    $elemRequirementInfo->setAttribute('id', 'RequirementInfo_1');
                    $elemRequirementInfo->setAttribute('AppliesToPartyID', 'Party_PINS');
                        $elemReqCode = $dom->createElement('ReqCode','Data Verification');
                        $elemReqCode->setAttribute('tc', '564');
                    $elemRequirementInfo->appendChild($elemReqCode);
                    //endRequirementInfo
                $elemPolicy->appendChild($elemPolNumber);
                $elemPolicy->appendChild($elemLineOfBusiness);
                $elemPolicy->appendChild($elemProductType);
                $elemPolicy->appendChild($elemProductCode);
                $elemPolicy->appendChild($elemCarrierCode);
                $elemPolicy->appendChild($elemLife);
                $elemPolicy->appendChild($elemApplicationInfo);
                $elemPolicy->appendChild($elemRequirementInfo);
                //ENDPolicy
            $elemHolding->appendChild($elemHoldingTypeCode);    
            $elemHolding->appendChild($elemHoldingForm);    
            $elemHolding->appendChild($elemPolicy); 
            //END Holding
            
            //Party
            $elemParty = $dom->createElement('Party');
            $elemParty->setAttribute('id', 'Carrier_Party_COMPANY');
                $elemPartyTypeCode = $dom->createElement('PartyTypeCode','Organization');
                $elemPartyTypeCode->setAttribute('tc', '2');
                $elemFullName = $dom->createElement('FullName','North American Company for Life and Health Insurance');
                //Carrier
                $elemCarrier = $dom->createElement('Carrier');
                    $elemCarrierCode = $dom->createElement('CarrierCode','60');
                $elemCarrier->appendChild($elemCarrierCode);
                //END Carrier
            $elemParty->appendChild($elemPartyTypeCode);
            $elemParty->appendChild($elemFullName);
            $elemParty->appendChild($elemCarrier);
            //END Party
            
            //Party2
            $elemParty2 = $dom->createElement('Party');
            $elemParty2->setAttribute('id', 'Party_PINS');
                $elemPartyTypeCode2 = $dom->createElement('PartyTypeCode','Person');
                $elemPartyTypeCode2->setAttribute('tc', '1');
                $elemGovtID = $dom->createElement('GovtID', $form_ssn);
                $elemResidenceState= $dom->createElement('ResidenceState',$form_state);
                $elemResidenceState->setAttribute('tc', $this->getTcByState($form_state));
                $elemResidenceCountry= $dom->createElement('ResidenceCountry','United States of America');
                $elemResidenceCountry->setAttribute('tc', '1');
                //Person
                $elemPerson= $dom->createElement('Person');
                    $elemFirstName= $dom->createElement('FirstName',$form_first_name);
                    $elemMiddleName= $dom->createElement('MiddleName',$form_middle_name);
                    $elemLastName= $dom->createElement('LastName',$form_last_name);
                    // $elemOccupation= $dom->createElement('Occupation',$form_occupation);
                    $elemGender= $dom->createElement('Gender', $form_gender);
                    $elemGender->setAttribute('tc', ($form_gender=='f')?'2':'1');
                    $elemBirthDate= $dom->createElement('BirthDate',$form_dob);
                    //Height2
              /*      $elemHeight2= $dom->createElement('Height2');
                        $elemMeasureUnits= $dom->createElement('MeasureUnits','US System Standard');
                        $elemMeasureUnits->setAttribute('tc', '2');
                        $elemMeasureValue= $dom->createElement('MeasureValue', $form_height);
                    $elemHeight2->appendChild($elemMeasureUnits);
                    $elemHeight2->appendChild($elemMeasureValue);*/
                    //END Height2
                    
                    //Weight2
                  /*  $elemWeight2= $dom->createElement('Weight2');
                        $elemMeasureUnits2= $dom->createElement('MeasureUnits','US System Standard');
                        $elemMeasureUnits2->setAttribute('tc', '2');
                        $elemMeasureValue2= $dom->createElement('MeasureValue',$form_weight);
                    $elemWeight2->appendChild($elemMeasureUnits2);
                    $elemWeight2->appendChild($elemMeasureValue2);*/
                    //END Weight2
                    $elemDriversLicenseNum= $dom->createElement('DriversLicenseNum',$form_dln);
                    $elemDriversLicenseState= $dom->createElement('DriversLicenseState',$form_dls);
                    $elemDriversLicenseState->setAttribute('tc', $this->getTcByState($form_dls));
                    /*$elemBirthCountry = $dom->createElement('BirthCountry',$form_birth_country);
                    $elemBirthCountry->setAttribute('tc', '1');*/
                  /*  $elemBirthJurisdictionTC= $dom->createElement('BirthJurisdictionTC', $form_birth_state); // $form_birth_state
                    $elemBirthJurisdictionTC->setAttribute('tc', '21');*/
                $elemPerson->appendChild($elemFirstName);
                $elemPerson->appendChild($elemMiddleName);
                $elemPerson->appendChild($elemLastName);
                // $elemPerson->appendChild($elemOccupation);
                $elemPerson->appendChild($elemGender);
                $elemPerson->appendChild($elemBirthDate);
                // $elemPerson->appendChild($elemHeight2);
                // $elemPerson->appendChild($elemWeight2);
                $elemPerson->appendChild($elemDriversLicenseNum);
                $elemPerson->appendChild($elemDriversLicenseState);
                /*$elemPerson->appendChild($elemBirthCountry);
                $elemPerson->appendChild($elemBirthJurisdictionTC);*/
                //END Person
                //Address
                $elemAddress= $dom->createElement('Address');
                $elemAddress->setAttribute('id', 'Address_PINS_1');
                    $elemAddressTypeCode= $dom->createElement('AddressTypeCode','Residence');
                    $elemAddressTypeCode->setAttribute('tc', '1');
                    $elemLine1= $dom->createElement('Line1',$form_street_address);
                    $elemCity= $dom->createElement('City', $form_city);
                    $elemAddressStateTC= $dom->createElement('AddressStateTC',$form_state);
                    $elemAddressStateTC->setAttribute('tc', $this->getTcByState($form_state));
                    $elemZip= $dom->createElement('Zip',$form_zip);
                    $elemAddressCountryTC= $dom->createElement('AddressCountryTC','United States of America'); // Remove ?
                    $elemAddressCountryTC->setAttribute('tc', '1');
                $elemAddress->appendChild($elemAddressTypeCode);
                $elemAddress->appendChild($elemLine1);
                $elemAddress->appendChild($elemCity);
                $elemAddress->appendChild($elemAddressStateTC);
                $elemAddress->appendChild($elemZip);
                $elemAddress->appendChild($elemAddressCountryTC);
                //END Address
                //Phone
                $elemPhone= $dom->createElement('Phone');
                $elemPhone->setAttribute('id', 'Phone_1');
                    $elemPhoneTypeCode= $dom->createElement('PhoneTypeCode','Home');
                    $elemPhoneTypeCode->setAttribute('tc', '1');
                    $elemAreaCode= $dom->createElement('AreaCode',$form_phone_areacode);
                    $elemDialNumber= $dom->createElement('DialNumber',$form_phone_number);
                $elemPhone->appendChild($elemPhoneTypeCode);
                $elemPhone->appendChild($elemAreaCode);
                $elemPhone->appendChild($elemDialNumber);
                //END Phone

            $elemParty2->appendChild($elemPartyTypeCode2);
            $elemParty2->appendChild($elemGovtID);
            $elemParty2->appendChild($elemResidenceState);
            $elemParty2->appendChild($elemResidenceCountry);
            $elemParty2->appendChild($elemPerson);
            $elemParty2->appendChild($elemAddress);
            $elemParty2->appendChild($elemPhone);
            //END Party2
            
            //Relation
            $elemRelation = $dom->createElement('Relation');
            $elemRelation->setAttribute('id', 'Relation_PINS');
            $elemRelation->setAttribute('OriginatingObjectID', 'Holding_1');
            $elemRelation->setAttribute('RelatedObjectID', 'Party_PINS');
                $elemOriginatingObjectType = $dom->createElement('OriginatingObjectType', 'Holding');
                $elemOriginatingObjectType->setAttribute('tc', '4');
                $elemRelatedObjectType = $dom->createElement('RelatedObjectType', 'Party');
                $elemRelatedObjectType->setAttribute('tc', '6');
                $elemRelationRoleCode = $dom->createElement('RelationRoleCode', 'Insured');
                $elemRelationRoleCode->setAttribute('tc', '32');
            $elemRelation->appendChild($elemOriginatingObjectType);
            $elemRelation->appendChild($elemRelatedObjectType);
            $elemRelation->appendChild($elemRelationRoleCode);
            //END Relation

        $elemOLifE->appendChild($elemSourceInfo);
        $elemOLifE->appendChild($elemHolding);
        $elemOLifE->appendChild($elemParty);
        $elemOLifE->appendChild($elemParty2);
        $elemOLifE->appendChild($elemTransRefGUID);
        $elemOLifE->appendChild($elemRelation);
        //END OLifE
    $elemTXLifeRequest->appendChild($elemTransRefGUID);
    $elemTXLifeRequest->appendChild($elemTransType);
    $elemTXLifeRequest->appendChild($elemTransExeDate);
    $elemTXLifeRequest->appendChild($elemTransExeTime);
    $elemTXLifeRequest->appendChild($elemTransMode);
    $elemTXLifeRequest->appendChild($elemOLifE);
    //END TXLifeRequest

   $elemTXLife->appendChild($elemUserAuthRequest);
   $elemTXLife->appendChild($elemTXLifeRequest);
   //END TXLife
 $dom->appendChild($elemTXLife);
   
 $dom->save('TX121_'.date('d-m-Y').'.xml'); // Сохраняем полученный XML-документ в файл
 // echo $dom->saveXML(); // Сохраняем полученный XML-документ в файл
        // return $this->renderPartial('1032');
        // 
        // 
    $TX121 = $dom->saveXML($elemTXLife);

    $params = ['arg3'=>$TX121];
    $client = new \SoapClient('https://sammons-test2-niagara.predictivelogic.com/niagara?wsdl',['trace'=>1]);
    $response = $client->process($params);


    $TX103_1 = new \domDocument('1.0');
    $TX103_1->loadXml($response->result);
    $TX103_1->save('TX103-1_'.date('d-m-Y').'.xml');
    $TX103_1_LifeParticipant = $TX103_1->getElementsByTagName('LifeParticipant')->item(0);
    $TX103_1_UnderwritingResult = $TX103_1->getElementsByTagName('UnderwritingResult')->item(0);
    $TX103_1_FormInstance = $TX103_1->getElementsByTagName('FormInstance')->item(0);
    $TX103_1_FormInstance_ID = $TX103_1_FormInstance->getAttribute('id');
    $TX103_1_OLifE = $TX103_1->getElementsByTagName('OLifE')->item(0);
    $TX103_1_Relations = $TX103_1->getElementsByTagName('Relation');
    


    foreach ($TX103_1_Relations as $Relation) {
        if($Relation->getAttribute('RelatedObjectID') == $TX103_1_FormInstance_ID) {
            $TX103_1_Relation = $Relation;
            break;
        }
    }

    $TX103_1_LifeParticipant->removeChild($TX103_1_UnderwritingResult);
    $TX103_1_OLifE->removeChild($TX103_1_FormInstance);
    $TX103_1_OLifE->removeChild($TX103_1_Relation);

    $TX103_2_FormInstance_XML = $this->getFormInstance();

    $TX103_2_FormInstance = $TX103_1->createDocumentFragment();
    $TX103_2_FormInstance->appendXML($TX103_2_FormInstance_XML);
    
    $TX103_1_OLifE->appendChild($TX103_2_FormInstance);
    $TX103_1->save('TX103-2_'.date('d-m-Y').'.xml');
    $TX103_2_XML = $TX103_1->saveXML();

    $params = ['arg3'=>$TX103_2_XML];
    $response = $client->process($params);

    $TX103_3 = new \domDocument('1.0');
    $TX103_3->loadXml($response->result);
    $TX103_3->save('TX103-3_'.date('d-m-Y').'.xml');

    $TX103_3_XML = $TX103_3->saveXML();
    echo $TX103_3_XML;

    }

    function libxml_display_error($error)
    {
        $return = "<br/>\n";
        switch ($error->level) {
            case LIBXML_ERR_WARNING:
                $return .= "<b>Warning $error->code</b>: ";
                break;
            case LIBXML_ERR_ERROR:
                $return .= "<b>Error $error->code</b>: ";
                break;
            case LIBXML_ERR_FATAL:
                $return .= "<b>Fatal Error $error->code</b>: ";
                break;
        }
        $return .= trim($error->message);
        if ($error->file) {
            $return .=    " in <b>$error->file</b>";
        }
        $return .= " on line <b>$error->line</b>\n";

        return $return;
    }

    function libxml_display_errors() {
        $errors = libxml_get_errors();
        foreach ($errors as $error) {
            print $this->libxml_display_error($error);
        }
        libxml_clear_errors();
    }


    public function actionValidate()
    {
        // Enable user error handling
        libxml_use_internal_errors(true);

        $xml = new DOMDocument(); 
        $xml->load('TX121_02-11-2017.xml'); 

        if (!$xml->schemaValidate('TXLife2.30.00.xsd')) {
            print '<b>DOMDocument::schemaValidate() Generated Errors!</b>';
            $this->libxml_display_errors();
        }
    }
     public function actionFi() {
        header("Content-Type: text/xml; charset=utf-8");
        echo $this->getFormInstance();
     }
}
