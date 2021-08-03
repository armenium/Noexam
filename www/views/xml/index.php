<?php

// NA5J1900 for 30 year
// NA5J1800 for 20 year
// NA5J1700 for 15 year

$user_CRL = 'noexam';
$password_CRL = 'Noexamqa1!';
$form_first_name = 'TIMOTHY' ;
$form_middle_name ='D';
$form_last_name = 'NOLLEN';
$form_dob ='1969/06/23';
$form_weight ='250';
$form_gender ='m';
$form_state ='GA';
$form_coverage ='';
$form_face_amount ='';
$form_term ='NA5J1700';
$form_street_address ='13085 MORRIS RD UNIT 6208';
$form_city ='ALPHARETTA';
$form_zip ='30004';
$form_phone_number ='1234567890';
$form_email ='test@test.com';
$form_birth_state ='';
$form_birth_country ='';
$form_occupation ='';
$form_householld_income ='';
$form_ssn ='666250251';
$form_dln ='883766441';
$form_dls ='GA';



$dom = new domDocument("1.0"); // Создаём XML-документ версии 1.0 с кодировкой utf-8
  	//TXLife
  	$elemTXLife = $dom->createElement("TXLife"); // Создаём корневой элемент
	$elemTXLife->setAttribute("xmlns", 'http://ACORD.org/Standards/Life/2');
	$elemTXLife->setAttribute("xmlns:xsi", 'http://www.w3.org/2001/XMLSchema-instance');
	$elemTXLife->setAttribute("xmlns:java", 'http://xml.apache.org/xslt/java');
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
		
		$elemUserDate= $dom->createElement('UserDate','2017-05-25');
		$elemUserTime= $dom->createElement('UserTime','11:49:43');
		
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

 		$elemTransRefGUID = $dom->createElement('TransRefGUID','4ff664b8-5453-4c34-8089-17757000000');
 		$elemTransType = $dom->createElement('TransType','General Requirement Order Request');
 		$elemTransType->setAttribute('tc', '121');
 		$elemTransExeDate = $dom->createElement('TransExeDate','2017-05-25');
 		$elemTransExeTime = $dom->createElement('TransExeTime','11:49:43');
 		$elemTransMode = $dom->createElement('TransMode','Original');
 		$elemTransMode->setAttribute('tc', '121');

 		//OLifE
 		$elemOLifE = $dom->createElement('OLifE');
 		$elemOLifE->setAttribute('Version', '2.38.00');// ADD <CreationDate>2016-02-24</CreationDate> <CreationTime>07:52:06-07:00</CreationTime>
 			//SourceInfo
	 		$elemSourceInfo = $dom->createElement('SourceInfo');
	 			$elemSourceInfoName= $dom->createElement('SourceInfoName','eApp');
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
		 			$elemProductCode = $dom->createElement('ProductCode','AppropriateProductCode');
		 			$elemCarrierCode = $dom->createElement('CarrierCode','60');
		 			
		 			//Life
		 			$elemLife = $dom->createElement('Life');
		 				$elemFaceAmt = $dom->createElement('FaceAmt','500000.00');
		 			$elemLife->appendChild($elemFaceAmt);
		 			//END Life
		 			
		 			//ApplicationInfo
		 			$elemApplicationInfo = $dom->createElement('ApplicationInfo');
		 				$elemTrackingID = $dom->createElement('TrackingID','4ff664b8-5453-4c34-8089-17757000000');
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
	 			$elemGovtID = $dom->createElement('GovtID','0123456789');
	 			$elemResidenceState= $dom->createElement('ResidenceState','KY');
	 			$elemResidenceState->setAttribute('tc', '21');
	 			$elemResidenceCountry= $dom->createElement('ResidenceCountry','United States of America');
	 			$elemResidenceCountry->setAttribute('tc', '1');
	 			//Person
	 			$elemPerson= $dom->createElement('Person');
	 				$elemFirstName= $dom->createElement('FirstName','John');
	 				$elemMiddleName= $dom->createElement('MiddleName','Q');
	 				$elemLastName= $dom->createElement('LastName','Public');
	 				$elemOccupation= $dom->createElement('Occupation','Sales Manager');
	 				$elemGender= $dom->createElement('Gender','male');
	 				$elemGender->setAttribute('tc', '1');
	 				$elemBirthDate= $dom->createElement('BirthDate','1960-01-01');
	 				//Height2
	 				$elemHeight2= $dom->createElement('Height2');
		 				$elemMeasureUnits= $dom->createElement('MeasureUnits','US System Standard');
		 				$elemMeasureUnits->setAttribute('tc', '2');
		 				$elemMeasureValue= $dom->createElement('MeasureValue','205');
	 				$elemHeight2->appendChild($elemMeasureUnits);
	 				$elemHeight2->appendChild($elemMeasureValue);
	 				//END Height2
	 				
	 				//Weight2
	 				$elemWeight2= $dom->createElement('Weight2');
	 					$elemMeasureUnits2= $dom->createElement('MeasureUnits','US System Standard');
	 					$elemMeasureUnits2->setAttribute('tc', '2');
	 					$elemMeasureValue2= $dom->createElement('MeasureValue','205');
	 				$elemWeight2->appendChild($elemMeasureUnits2);
	 				$elemWeight2->appendChild($elemMeasureValue2);
	 				//END Weight2
	 				$elemDriversLicenseNum= $dom->createElement('DriversLicenseNum','123456789');
	 				$elemDriversLicenseState= $dom->createElement('DriversLicenseState','KY');
	 				$elemDriversLicenseState->setAttribute('tc', '21');
	 				$elemBirthCountry = $dom->createElement('BirthCountry','USA');
	 				$elemBirthCountry->setAttribute('tc', '1');
	 				$elemBirthJurisdictionTC= $dom->createElement('BirthJurisdictionTC','KY');
	 				$elemBirthJurisdictionTC->setAttribute('tc', '21');
	 			$elemPerson->appendChild($elemFirstName);
	 			$elemPerson->appendChild($elemMiddleName);
	 			$elemPerson->appendChild($elemLastName);
	 			$elemPerson->appendChild($elemOccupation);
	 			$elemPerson->appendChild($elemGender);
	 			$elemPerson->appendChild($elemBirthDate);
	 			$elemPerson->appendChild($elemHeight2);
	 			$elemPerson->appendChild($elemWeight2);
	 			$elemPerson->appendChild($elemDriversLicenseNum);
	 			$elemPerson->appendChild($elemDriversLicenseState);
	 			$elemPerson->appendChild($elemBirthCountry);
	 			$elemPerson->appendChild($elemBirthJurisdictionTC);
	 			//END Person
 				//Address
 				$elemAddress= $dom->createElement('Address');
 				$elemAddress->setAttribute('id', 'Address_PINS_1');
 					$elemAddressTypeCode= $dom->createElement('AddressTypeCode','Residence');
 					$elemAddressTypeCode->setAttribute('tc', '1');
 					$elemLine1= $dom->createElement('Line1','123 N. Main Street');
 					$elemCity= $dom->createElement('City','Louisville');
 					$elemAddressStateTC= $dom->createElement('AddressStateTC','KY');
 					$elemAddressStateTC->setAttribute('tc', '21');
 					$elemZip= $dom->createElement('Zip','12345');
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
 				$elemPhone= $dom->createElement('Address');
 				$elemPhone->setAttribute('id', 'Phone_1');
 					$elemPhoneTypeCode= $dom->createElement('PhoneTypeCode','Home');
 					$elemPhoneTypeCode->setAttribute('tc', '1');
 					$elemAreaCode= $dom->createElement('AreaCode',$form_areacode);
 					$elemDialNumber= $dom->createElement('DialNumber',$form_number);
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
  
$dom->save("GeneratedXML_updated.xml"); // Сохраняем полученный XML-документ в файл
// echo $dom->saveXML(); // Сохраняем полученный XML-документ в файл
?>