<?php
$dom = new domDocument("1.0"); 
  	//TXLife
  	$elemTXLife = $dom->createElement("TXLife"); 
	$elemTXLife->setAttribute("xmlns", 'http://ACORD.org/Standards/Life/2');
	$elemTXLife->setAttribute("Version", '2.30.00');

		$UserAuthRequest = $dom->createElement("UserAuthRequest");
			$UserLoginName = $dom->createElement("UserLoginName", "PLUS");
			$VendorApp = $dom->createElement("VendorApp");

				$VendorName = $dom->createElement("VendorName", "CRL");
				$VendorName->setAttribute('VendorCode','CRL');

				$AppName = $dom->createElement("AppName", "PLUS");
				$AppVer = $dom->createElement("AppVer", "1.0");

			$VendorApp->appendChild($VendorName);
			$VendorApp->appendChild($AppName);
			$VendorApp->appendChild($AppVer);
			
		$UserAuthRequest->appendChild($UserLoginName);
		$UserAuthRequest->appendChild($VendorApp);
			

	  	$TXLifeRequest = $dom->createElement("TXLifeRequest"); 
		$TXLifeRequest->setAttribute("id", 'Request_1');
		$TXLifeRequest->setAttribute("PrimaryObjectID", 'Holding_1');
			$TransRefGUID = $dom->createElement("TransRefGUID", "5D4E78B3-2BC1-49D1-B31C-6E01FE17E805");

			$TransType = $dom->createElement("TransType", "OLI_TRANS_NBSUB");
			$TransType->setAttribute('tc','103');

			$TransExeDate = $dom->createElement("TransExeDate", "2017-05-30");
			$TransExeTime = $dom->createElement("TransExeTime", "16:47:53");

			$TransMode = $dom->createElement("TransMode", "OLI_TRANS_MODE_ORIGINAL");
			$TransMode->setAttribute('tc','2');

			$NoResponseOK  = $dom->createElement("NoResponseOK", "True");
			$NoResponseOK ->setAttribute('tc','1');

			$TestIndicator  = $dom->createElement("TestIndicator", "False");
			$TestIndicator ->setAttribute('tc','0');

			$OLifE  = $dom->createElement("OLifE");

				$SourceInfo = $dom->createElement("SourceInfo");

					$CreationDate = $dom->createElement("CreationDate", "2017-05-30");
					$CreationTime = $dom->createElement("CreationTime", "16:47:53");
					$SourceInfoName = $dom->createElement("SourceInfoName", "PLUS");
					$SourceInfoDescription = $dom->createElement("SourceInfoDescription", "PLUS");
					$SourceInfoComment = $dom->createElement("SourceInfoComment", "PLUS");

				$SourceInfo->appendChild($CreationDate);
				$SourceInfo->appendChild($CreationTime);
				$SourceInfo->appendChild($SourceInfoName);
				$SourceInfo->appendChild($SourceInfoDescription);
				$SourceInfo->appendChild($SourceInfoComment);

				$Holding  = $dom->createElement("Holding");
				$Holding ->setAttribute('id','Holding_1');

					$HoldingTypeCode  = $dom->createElement("HoldingTypeCode","OLI_HOLDTYPE_POLICY");
					$HoldingTypeCode ->setAttribute('tc','2');

					$HoldingStatus  = $dom->createElement("HoldingStatus","OLI_HOLDSTAT_PROPOSED");
					$HoldingStatus ->setAttribute('tc','3');

					$Policy  = $dom->createElement("Policy");
					$Policy ->setAttribute('id','Policy_1');

						$PolNumber  = $dom->createElement("PolNumber","LB31311463");

						$LineOfBusiness  = $dom->createElement("LineOfBusiness", "OLI_LINEBUS_LIFE");
						$LineOfBusiness ->setAttribute('tc','1');

						$ProductType  = $dom->createElement("ProductType", "OLI_PRODTYPE_TERM");
						$ProductType ->setAttribute('tc','2');

						$ProductCode  = $dom->createElement("ProductCode", "NA5J1900");
						$CarrierCode  = $dom->createElement("CarrierCode", "60");

						$PolicyStatus  = $dom->createElement("PolicyStatus", "OLI_POLSTAT_PENDING");
						$PolicyStatus ->setAttribute('tc','8');

						$IssueNation  = $dom->createElement("IssueNation", "OLI_NATION_USA");
						$IssueNation ->setAttribute('tc','1');

						$Jurisdiction  = $dom->createElement("Jurisdiction", "OLI_UNKNOWN");
						$Jurisdiction ->setAttribute('tc','0');

						$ReplacementType  = $dom->createElement("ReplacementType", "OLI_UNKNOWN");
						$ReplacementType ->setAttribute('tc','0');

						$Life  = $dom->createElement("Life");
						$Life ->setAttribute('id','Life_1');

							$Coverage = $dom->createElement("Coverage");
							$Coverage ->setAttribute('id','Coverage_1');
								
								$ProductCode_2 = $dom->createElement("ProductCode", "NA5J1900");

								$IndicatorCode = $dom->createElement("IndicatorCode", "OLI_COVIND_BASE");
								$IndicatorCode ->setAttribute('tc','1');

								$LifeParticipant = $dom->createElement("LifeParticipant");
								$LifeParticipant ->setAttribute('id','Life_Participant_1');
								$LifeParticipant ->setAttribute('PartyID','Party_1');

									$LifeParticipantRoleCode = $dom->createElement("LifeParticipantRoleCode", "OLI_PARTICROLE_PRIMARY");
									$LifeParticipantRoleCode ->setAttribute('tc','1');

									$IssueGender = $dom->createElement("IssueGender", "OLI_GENDER_MALE");
									$IssueGender ->setAttribute('tc','1');

									$UnderwritingResult_1000 = $dom->createElement("UnderwritingResult");
									$UnderwritingResult_1000 ->setAttribute('id','Underwriting_Result_1000');

										$UnderwritingResultReason_1 = $dom->createElement("UnderwritingResultReason", "OLI_UNKNOWN");
										$UnderwritingResultReason_1 ->setAttribute('tc','0');

										$UnderwritingReasonSource_1 = $dom->createElement("UnderwritingReasonSource", "OLI_REASONSRCE_IDCHECK");
										$UnderwritingReasonSource_1 ->setAttribute('tc','2');

										$CompanyAssignedCode_1 = $dom->createElement("CompanyAssignedCode", "Pass");
										$Description_1 = $dom->createElement("Description", "ID_CHECK");

										$UnderwritingCategory_1 = $dom->createElement("UnderwritingCategory", "OLI_UNKNOWN");
										$UnderwritingCategory_1 ->setAttribute('tc','0');

									$UnderwritingResult_1000->appendChild($UnderwritingResultReason_1);
									$UnderwritingResult_1000->appendChild($UnderwritingReasonSource_1);
									$UnderwritingResult_1000->appendChild($CompanyAssignedCode_1);
									$UnderwritingResult_1000->appendChild($Description_1);
									$UnderwritingResult_1000->appendChild($UnderwritingCategory_1);

									$UnderwritingResult_3000 = $dom->createElement("UnderwritingResult");
									$UnderwritingResult_3000 ->setAttribute('id','Underwriting_Result_3000');

										$UnderwritingResultReason_2 = $dom->createElement("UnderwritingResultReason", "OLI_OTHER");
										$UnderwritingResultReason_2 ->setAttribute('tc','2147483647');

										$UnderwritingReasonSource_2 = $dom->createElement("UnderwritingReasonSource", "OLI_REASONSRCE_APP");
										$UnderwritingReasonSource_2 ->setAttribute('tc','1');

										$CompanyAssignedCode_2 = $dom->createElement("CompanyAssignedCode", "Preferred NT");
										$Description_2 = $dom->createElement("Description", "Application Part 1");

										$UnderwritingCategory_2 = $dom->createElement("UnderwritingCategory", "OLI_UWCATEGORY_FORM");
										$UnderwritingCategory_2 ->setAttribute('tc','4');

									$UnderwritingResult_3000->appendChild($UnderwritingResultReason_2);
									$UnderwritingResult_3000->appendChild($UnderwritingReasonSource_2);
									$UnderwritingResult_3000->appendChild($CompanyAssignedCode_2);
									$UnderwritingResult_3000->appendChild($Description_2);
									$UnderwritingResult_3000->appendChild($UnderwritingCategory_2);

									$UnderwritingResult_3001 = $dom->createElement("UnderwritingResult");
									$UnderwritingResult_3001 ->setAttribute('id','Underwriting_Result_3001');

										$UnderwritingResultReason_3 = $dom->createElement("UnderwritingResultReason", "OLI_OTHER");
										$UnderwritingResultReason_3 ->setAttribute('tc','2147483647');

										$UnderwritingReasonSource_3 = $dom->createElement("UnderwritingReasonSource", "OLI_REASONSRCE_APP");
										$UnderwritingReasonSource_3 ->setAttribute('tc','1');

										$CompanyAssignedCode_3 = $dom->createElement("CompanyAssignedCode", "Preferred NT");
										$Description_3 = $dom->createElement("Description", "Application Part 2");

										$UnderwritingCategory_3 = $dom->createElement("UnderwritingCategory", "OLI_UWCATEGORY_FORM");
										$UnderwritingCategory_3 ->setAttribute('tc','4');

									$UnderwritingResult_3001->appendChild($UnderwritingResultReason_3);
									$UnderwritingResult_3001->appendChild($UnderwritingReasonSource_3);
									$UnderwritingResult_3001->appendChild($CompanyAssignedCode_3);
									$UnderwritingResult_3001->appendChild($Description_3);
									$UnderwritingResult_3001->appendChild($UnderwritingCategory_3);

									$UnderwritingResult_3002 = $dom->createElement("UnderwritingResult");
									$UnderwritingResult_3002 ->setAttribute('id','Underwriting_Result_3002');

										$UnderwritingResultReason_4 = $dom->createElement("UnderwritingResultReason", "OLI_UWREASON_PRESCR");
										$UnderwritingResultReason_4 ->setAttribute('tc','14');

										$UnderwritingReasonSource_4 = $dom->createElement("UnderwritingReasonSource", "OLI_REASONSRCE_RXDATA");
										$UnderwritingReasonSource_4 ->setAttribute('tc','7');

										$CompanyAssignedCode_4 = $dom->createElement("CompanyAssignedCode", "Preferred NT");
										$Description_4 = $dom->createElement("Description", "RX");

										$UnderwritingCategory_4 = $dom->createElement("UnderwritingCategory", "OLI_UWCATEGORY_MEDICAL");
										$UnderwritingCategory_4 ->setAttribute('tc','5');

									$UnderwritingResult_3002->appendChild($UnderwritingResultReason_4);
									$UnderwritingResult_3002->appendChild($UnderwritingReasonSource_4);
									$UnderwritingResult_3002->appendChild($CompanyAssignedCode_4);
									$UnderwritingResult_3002->appendChild($Description_4);
									$UnderwritingResult_3002->appendChild($UnderwritingCategory_4);

									$UnderwritingResult_3003 = $dom->createElement("UnderwritingResult");
									$UnderwritingResult_3003 ->setAttribute('id','Underwriting_Result_3003');

										$UnderwritingResultReason_5 = $dom->createElement("UnderwritingResultReason", "OLI_OTHER");
										$UnderwritingResultReason_5 ->setAttribute('tc','2147483647');

										$UnderwritingReasonSource_5 = $dom->createElement("UnderwritingReasonSource", "OLI_REASONSRCE_APP");
										$UnderwritingReasonSource_5 ->setAttribute('tc','1');

										$CompanyAssignedCode_5 = $dom->createElement("CompanyAssignedCode", "Preferred NT");
										$Description_5 = $dom->createElement("Description", "Application Part 2 Non-Med");

										$UnderwritingCategory_5 = $dom->createElement("UnderwritingCategory", "OLI_UWCATEGORY_FORM");
										$UnderwritingCategory_5 ->setAttribute('tc','4');

									$UnderwritingResult_3003->appendChild($UnderwritingResultReason_5);
									$UnderwritingResult_3003->appendChild($UnderwritingReasonSource_5);
									$UnderwritingResult_3003->appendChild($CompanyAssignedCode_5);
									$UnderwritingResult_3003->appendChild($Description_5);
									$UnderwritingResult_3003->appendChild($UnderwritingCategory_5);

									$UnderwritingResult_3004 = $dom->createElement("UnderwritingResult");
									$UnderwritingResult_3004 ->setAttribute('id','Underwriting_Result_3004');

										$UnderwritingResultReason_6 = $dom->createElement("UnderwritingResultReason", "OLI_OTHER");
										$UnderwritingResultReason_6 ->setAttribute('tc','2147483647');

										$UnderwritingReasonSource_6 = $dom->createElement("UnderwritingReasonSource", "OLI_REASONSRCE_APP");
										$UnderwritingReasonSource_6 ->setAttribute('tc','1');

										$CompanyAssignedCode_6 = $dom->createElement("CompanyAssignedCode", "Preferred NT");
										$Description_6 = $dom->createElement("Description", "Family History");

										$UnderwritingCategory_6 = $dom->createElement("UnderwritingCategory", "OLI_UWCATEGORY_FORM");
										$UnderwritingCategory_6 ->setAttribute('tc','4');

									$UnderwritingResult_3004->appendChild($UnderwritingResultReason_6);
									$UnderwritingResult_3004->appendChild($UnderwritingReasonSource_6);
									$UnderwritingResult_3004->appendChild($CompanyAssignedCode_6);
									$UnderwritingResult_3004->appendChild($Description_6);
									$UnderwritingResult_3004->appendChild($UnderwritingCategory_6);

									$UnderwritingResult_3005 = $dom->createElement("UnderwritingResult");
									$UnderwritingResult_3005 ->setAttribute('id','Underwriting_Result_3005');

										$UnderwritingResultReason_7 = $dom->createElement("UnderwritingResultReason", "OLI_OTHER");
										$UnderwritingResultReason_7 ->setAttribute('tc','2147483647');

										$UnderwritingReasonSource_7 = $dom->createElement("UnderwritingReasonSource", "OLI_UNKNOWN");
										$UnderwritingReasonSource_7 ->setAttribute('tc','0');

										$CompanyAssignedCode_7 = $dom->createElement("CompanyAssignedCode", "Preferred NT");
										$Description_7 = $dom->createElement("Description", "Risk Classifier");

										$UnderwritingCategory_7 = $dom->createElement("UnderwritingCategory", "OLI_UWCATEGORY_NONMEDICAL");
										$UnderwritingCategory_7 ->setAttribute('tc','6');

									$UnderwritingResult_3005->appendChild($UnderwritingResultReason_7);
									$UnderwritingResult_3005->appendChild($UnderwritingReasonSource_7);
									$UnderwritingResult_3005->appendChild($CompanyAssignedCode_7);
									$UnderwritingResult_3005->appendChild($Description_7);
									$UnderwritingResult_3005->appendChild($UnderwritingCategory_7);

									$UnderwritingResult_3006 = $dom->createElement("UnderwritingResult");
									$UnderwritingResult_3006 ->setAttribute('id','Underwriting_Result_3006');

										$UnderwritingResultReason_8 = $dom->createElement("UnderwritingResultReason", "OLI_OTHER");
										$UnderwritingResultReason_8 ->setAttribute('tc','2147483647');

										$UnderwritingReasonSource_8 = $dom->createElement("UnderwritingReasonSource", "OLI_REASONSRCE_APP");
										$UnderwritingReasonSource_8 ->setAttribute('tc','1');

										$CompanyAssignedCode_8 = $dom->createElement("CompanyAssignedCode", "Preferred NT");
										$Description_8 = $dom->createElement("Description", "Build");

										$UnderwritingCategory_8 = $dom->createElement("UnderwritingCategory", "OLI_UWCATEGORY_BUILD");
										$UnderwritingCategory_8 ->setAttribute('tc','2');

									$UnderwritingResult_3006->appendChild($UnderwritingResultReason_8);
									$UnderwritingResult_3006->appendChild($UnderwritingReasonSource_8);
									$UnderwritingResult_3006->appendChild($CompanyAssignedCode_8);
									$UnderwritingResult_3006->appendChild($Description_8);
									$UnderwritingResult_3006->appendChild($UnderwritingCategory_8);

									$UnderwritingResult_3007 = $dom->createElement("UnderwritingResult");
									$UnderwritingResult_3007 ->setAttribute('id','Underwriting_Result_3007');

										$UnderwritingResultReason_9 = $dom->createElement("UnderwritingResultReason", "OLI_OTHER");
										$UnderwritingResultReason_9 ->setAttribute('tc','2147483647');

										$UnderwritingReasonSource_9 = $dom->createElement("UnderwritingReasonSource", "OLI_REASONSRCE_APP");
										$UnderwritingReasonSource_9 ->setAttribute('tc','1');

										$CompanyAssignedCode_9 = $dom->createElement("CompanyAssignedCode", "Preferred NT");
										$Description_9 = $dom->createElement("Description", "Application");

										$UnderwritingCategory_9 = $dom->createElement("UnderwritingCategory", "OLI_UWCATEGORY_MEDICAL");
										$UnderwritingCategory_9 ->setAttribute('tc','5');

									$UnderwritingResult_3007->appendChild($UnderwritingResultReason_9);
									$UnderwritingResult_3007->appendChild($UnderwritingReasonSource_9);
									$UnderwritingResult_3007->appendChild($CompanyAssignedCode_9);
									$UnderwritingResult_3007->appendChild($Description_9);
									$UnderwritingResult_3007->appendChild($UnderwritingCategory_9);

								$LifeParticipant->appendChild($LifeParticipantRoleCode);
								$LifeParticipant->appendChild($IssueGender);
								$LifeParticipant->appendChild($UnderwritingResult_1000);
								$LifeParticipant->appendChild($UnderwritingResult_3000);
								$LifeParticipant->appendChild($UnderwritingResult_3001);
								$LifeParticipant->appendChild($UnderwritingResult_3002);
								$LifeParticipant->appendChild($UnderwritingResult_3003);
								$LifeParticipant->appendChild($UnderwritingResult_3004);
								$LifeParticipant->appendChild($UnderwritingResult_3005);
								$LifeParticipant->appendChild($UnderwritingResult_3006);
								$LifeParticipant->appendChild($UnderwritingResult_3007);


							$Coverage->appendChild($ProductCode_2);
							$Coverage->appendChild($IndicatorCode);
							$Coverage->appendChild($LifeParticipant);

						$Life->appendChild($Coverage);

						$ApplicationInfo  = $dom->createElement("ApplicationInfo");

							$HOAssignedAppNumber  = $dom->createElement("HOAssignedAppNumber", "5D4E78B3-2BC1-49D1-B31C-6E01FE17E805");
							$TrackingID  = $dom->createElement("TrackingID", "e445165d-0e86-4e4c-bf97-2afccc67426c");
							$TrackingIDVendorCode  = $dom->createElement("TrackingIDVendorCode", "PLUS");

							$ApplicationType  = $dom->createElement("ApplicationType", "OLI_APPTYPE_NEW");
							$ApplicationType ->setAttribute('tc','1');

							$ApplicationJurisdiction  = $dom->createElement("ApplicationJurisdiction", "OLI_USA_AK");
							$ApplicationJurisdiction ->setAttribute('tc','2');

							$ApplicationCountry  = $dom->createElement("ApplicationCountry", "OLI_NATION_USA");
							$ApplicationCountry ->setAttribute('tc','1');

							$AdditionalInd  = $dom->createElement("AdditionalInd", "False");
							$AdditionalInd ->setAttribute('tc','0');

							$AlternateInd  = $dom->createElement("AlternateInd", "False");
							$AlternateInd ->setAttribute('tc','0');

							$ReplacementInd  = $dom->createElement("ReplacementInd", "False");
							$ReplacementInd ->setAttribute('tc','0');

							$IdentityVerification  = $dom->createElement("IdentityVerification");

								$Identification  = $dom->createElement("Identification");

									$IdentificationNum  = $dom->createElement("IdentificationNum", "1234567890");

									$IdentityVerificationType  = $dom->createElement("IdentityVerificationType", "OLI_IDVERIF_DL");
									$IdentityVerificationType ->setAttribute('tc','1');

									$Jurisdiction_2  = $dom->createElement("Jurisdiction", "OLI_USA_AK");
									$Jurisdiction_2 ->setAttribute('tc','2');

									$IssuingAgency  = $dom->createElement("IssuingAgency", "Alaska");

								$Identification->appendChild($IdentificationNum);
								$Identification->appendChild($IdentityVerificationType);
								$Identification->appendChild($Jurisdiction_2);
								$Identification->appendChild($IssuingAgency);

							$IdentityVerification->appendChild($Identification);

						$ApplicationInfo->appendChild($HOAssignedAppNumber);
						$ApplicationInfo->appendChild($TrackingID);
						$ApplicationInfo->appendChild($TrackingIDVendorCode);
						$ApplicationInfo->appendChild($ApplicationType);
						$ApplicationInfo->appendChild($ApplicationJurisdiction);
						$ApplicationInfo->appendChild($ApplicationCountry);
						$ApplicationInfo->appendChild($AdditionalInd);
						$ApplicationInfo->appendChild($AlternateInd);
						$ApplicationInfo->appendChild($ReplacementInd);
						$ApplicationInfo->appendChild($IdentityVerification);

					$Policy->appendChild($PolNumber);
					$Policy->appendChild($LineOfBusiness);
					$Policy->appendChild($ProductType);
					$Policy->appendChild($ProductCode);
					$Policy->appendChild($CarrierCode);
					$Policy->appendChild($PolicyStatus);
					$Policy->appendChild($IssueNation);
					$Policy->appendChild($Jurisdiction);
					$Policy->appendChild($ReplacementType);
					$Policy->appendChild($Life);
					$Policy->appendChild($ApplicationInfo);

				$Holding->appendChild($HoldingTypeCode);
				$Holding->appendChild($HoldingStatus);
				$Holding->appendChild($Policy);

				$Party  = $dom->createElement("Party");
				$Party ->setAttribute('id','Party_1');
				$Party ->setAttribute('DataRep','Full');

					$PartyTypeCode  = $dom->createElement("PartyTypeCode", "OLI_PT_PERSON");
					$PartyTypeCode ->setAttribute('tc','1');

					$GovtID  = $dom->createElement("GovtID", "222111234");

					$GovtIDTC  = $dom->createElement("GovtIDTC", "OLI_GOVTID_SSN");
					$GovtIDTC ->setAttribute('tc','1');

					$Person  = $dom->createElement("Person");

						$FirstName  = $dom->createElement("FirstName", "Mel");

						$LastName  = $dom->createElement("LastName", "CRL");

						$Occupation  = $dom->createElement("Occupation");

						$Gender  = $dom->createElement("Gender", "OLI_GENDER_MALE");
						$Gender ->setAttribute('tc','1');

						$BirthDate  = $dom->createElement("BirthDate", "1980-01-01");

						$Age  = $dom->createElement("Age", "37.0");

						$EstSalary  = $dom->createElement("EstSalary", "0");

						$SmokerStat  = $dom->createElement("SmokerStat", "OLI_UNKNOWN");
						$SmokerStat ->setAttribute('tc','0');

						$Height2  = $dom->createElement("Height2");

							$MeasureUnits  = $dom->createElement("MeasureUnits", "OLI_MEASURE_USSTANDARD");
							$MeasureUnits ->setAttribute('tc','2');

							$MeasureValue  = $dom->createElement("MeasureValue", "70.0");
							
						$Height2->appendChild($MeasureUnits);
						$Height2->appendChild($MeasureValue);

						$Weight2  = $dom->createElement("Weight2");

							$MeasureUnits  = $dom->createElement("MeasureUnits", "OLI_MEASURE_USSTANDARD");
							$MeasureUnits ->setAttribute('tc','2');

							$MeasureValue  = $dom->createElement("MeasureValue", "175.0");
							
						$Weight2->appendChild($MeasureUnits);
						$Weight2->appendChild($MeasureValue);


						$DriversLicenseNum  = $dom->createElement("DriversLicenseNum", "1234567890");

						$DriversLicenseState  = $dom->createElement("DriversLicenseState", "OLI_USA_AK");
						$DriversLicenseState ->setAttribute('tc','2');

						$BirthCountry  = $dom->createElement("BirthCountry", "OLI_NATION_USA");
						$BirthCountry ->setAttribute('tc','1');

						$BirthJurisdictionTC  = $dom->createElement("BirthJurisdictionTC", "OLI_USA_MA");
						$BirthJurisdictionTC ->setAttribute('tc','26');

					$Person->appendChild($FirstName);
					$Person->appendChild($LastName);
					$Person->appendChild($Occupation);
					$Person->appendChild($Gender);
					$Person->appendChild($BirthDate);
					$Person->appendChild($Age);
					$Person->appendChild($EstSalary);
					$Person->appendChild($SmokerStat);
					$Person->appendChild($Height2);
					$Person->appendChild($Weight2);
					$Person->appendChild($DriversLicenseNum);
					$Person->appendChild($DriversLicenseState);
					$Person->appendChild($BirthCountry);
					$Person->appendChild($BirthJurisdictionTC);

					$Address  = $dom->createElement("Address");
					$Address ->setAttribute('id','Address_1');

						$AddressTypeCode  = $dom->createElement("AddressTypeCode", "OLI_ADTYPE_HOME");
						$AddressTypeCode ->setAttribute('tc','1');	
						
						$Line1  = $dom->createElement("Line1", "123 Main");

						$City  = $dom->createElement("City", "Testing");

						$AddressStateTC  = $dom->createElement("AddressStateTC", "OLI_USA_AK");
						$AddressStateTC ->setAttribute('tc','2');

						$Zip  = $dom->createElement("Zip", "12345");	

					$Address->appendChild($AddressTypeCode);	
					$Address->appendChild($Line1);	
					$Address->appendChild($City);	
					$Address->appendChild($AddressStateTC);	
					$Address->appendChild($Zip);	

					$Risk   = $dom->createElement("Risk");
					$Risk  ->setAttribute('id','Risk_1');

						$TobaccoInd   = $dom->createElement("TobaccoInd", "False");
						$TobaccoInd  ->setAttribute('tc','0');

					$Risk->appendChild($TobaccoInd);	

				$Party->appendChild($PartyTypeCode);	
				$Party->appendChild($GovtID);	
				$Party->appendChild($GovtIDTC);	
				$Party->appendChild($Person);	
				$Party->appendChild($Address);	
				$Party->appendChild($Risk);	

				$Relation_1  = $dom->createElement("Relation");
				$Relation_1 ->setAttribute('id','Relation_1');
				$Relation_1 ->setAttribute('OriginatingObjectID','Holding_1');
				$Relation_1 ->setAttribute('RelatedObjectID','Party_1');

					$OriginatingObjectType  = $dom->createElement("OriginatingObjectType", "OLI_HOLDING");
					$OriginatingObjectType ->setAttribute('tc','4');

					$RelatedObjectType  = $dom->createElement("RelatedObjectType", "OLI_PARTY");
					$RelatedObjectType ->setAttribute('tc','6');

					$RelationRoleCode  = $dom->createElement("RelationRoleCode", "OLI_REL_INSURED");
					$RelationRoleCode ->setAttribute('tc','32');

				$Relation_1->appendChild($OriginatingObjectType);
				$Relation_1->appendChild($RelatedObjectType);
				$Relation_1->appendChild($RelationRoleCode);

				$Relation_2  = $dom->createElement("Relation");
				$Relation_2 ->setAttribute('id','Relation_2');
				$Relation_2 ->setAttribute('OriginatingObjectID','Party_1');
				$Relation_2 ->setAttribute('RelatedObjectID','Coverage_1');

					$OriginatingObjectType  = $dom->createElement("OriginatingObjectType", "OLI_PARTY");
					$OriginatingObjectType ->setAttribute('tc','6');

					$RelatedObjectType  = $dom->createElement("RelatedObjectType", "OLI_COVERAGE");
					$RelatedObjectType ->setAttribute('tc','360');

					$RelationRoleCode  = $dom->createElement("RelationRoleCode", "OLI_REL_COVINSURED");
					$RelationRoleCode ->setAttribute('tc','33');

				$Relation_2->appendChild($OriginatingObjectType);
				$Relation_2->appendChild($RelatedObjectType);
				$Relation_2->appendChild($RelationRoleCode);

				$FormInstance_1  = $dom->createElement("FormInstance");
				$FormInstance_1 ->setAttribute('id','Form_1');

					$FormName  = $dom->createElement("FormName", "ID Check Response");

					$ProviderFormNumber  = $dom->createElement("ProviderFormNumber", "ICC123");

				$FormInstance_1->appendChild($FormName);
				$FormInstance_1->appendChild($ProviderFormNumber);

				$Relation_100  = $dom->createElement("Relation");
				$Relation_100 ->setAttribute('id','Relation_100');
				$Relation_100 ->setAttribute('OriginatingObjectID','Party_1');
				$Relation_100 ->setAttribute('RelatedObjectID','Form_1');

					$OriginatingObjectType  = $dom->createElement("OriginatingObjectType", "OLI_PARTY");
					$OriginatingObjectType ->setAttribute('tc','6');

					$RelatedObjectType  = $dom->createElement("RelatedObjectType", "OLI_FORMINSTANCE");
					$RelatedObjectType ->setAttribute('tc','101');

					$RelationRoleCode  = $dom->createElement("RelationRoleCode", "OLI_REL_FORMFOR");
					$RelationRoleCode ->setAttribute('tc','107');

					$Sequence  = $dom->createElement("Sequence", "1");

				$Relation_100->appendChild($OriginatingObjectType);
				$Relation_100->appendChild($RelatedObjectType);
				$Relation_100->appendChild($RelationRoleCode);
				$Relation_100->appendChild($Sequence);

				$FormInstance_2  = $dom->createElement("FormInstance");
				$FormInstance_2 ->setAttribute('id','Form_2');

					$FormName  = $dom->createElement("FormName", "LifeVue Term Application");
					
					$ProviderFormNumber  = $dom->createElement("ProviderFormNumber", "ICC16L3218");

					$SubmitDate  = $dom->createElement("SubmitDate", "2017-05-30");

					$Form_Response_29  = $dom->createElement("FormResponse");
					$Form_Response_29 ->setAttribute('id','Form_Response_29');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medWeightLoss15LbOrMore");
						
						$QuestionText  = $dom->createElement("QuestionText", "In the past 12 months, have you lost 15 lb. or more other than for pregnancy and delivery?");

						$ResponseCode  = $dom->createElement("ResponseCode", "0");

						$ResponseData  = $dom->createElement("ResponseData", "Y");

						$SectionIdentifier  = $dom->createElement("SectionIdentifier", "29");

						$AssociatedResponseData_1  = $dom->createElement("AssociatedResponseData");
						$AssociatedResponseData_1 ->setAttribute('id','Assoc_Response_Data_1');
						$AssociatedResponseData_1 ->setAttribute('ActualObjectID','Form_Response_30');

						$AssociatedResponseData_2  = $dom->createElement("AssociatedResponseData");
						$AssociatedResponseData_2 ->setAttribute('id','Assoc_Response_Data_2');
						$AssociatedResponseData_2 ->setAttribute('ActualObjectID','Form_Response_31');

						$AssociatedResponseData_3  = $dom->createElement("AssociatedResponseData");
						$AssociatedResponseData_3 ->setAttribute('id','Assoc_Response_Data_3');
						$AssociatedResponseData_3 ->setAttribute('ActualObjectID','Form_Response_34');

					$Form_Response_29->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_29->appendChild($QuestionText);	
					$Form_Response_29->appendChild($ResponseCode);	
					$Form_Response_29->appendChild($ResponseData);	
					$Form_Response_29->appendChild($SectionIdentifier);	
					$Form_Response_29->appendChild($AssociatedResponseData_1);	
					$Form_Response_29->appendChild($AssociatedResponseData_2);	
					$Form_Response_29->appendChild($AssociatedResponseData_3);	

					$Form_Response_30  = $dom->createElement("FormResponse");
					$Form_Response_30 ->setAttribute('id','Form_Response_30');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medWeightLossFreeText");
						
						$QuestionText  = $dom->createElement("QuestionText", "Please provide details regarding the reason for weight loss.");

						$ResponseCode  = $dom->createElement("ResponseCode", "1");

						$ResponseData  = $dom->createElement("ResponseData", "just lucky I guess");

					$Form_Response_30->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_30->appendChild($QuestionText);	
					$Form_Response_30->appendChild($ResponseCode);	
					$Form_Response_30->appendChild($ResponseData);	

					$Form_Response_31  = $dom->createElement("FormResponse");
					$Form_Response_31 ->setAttribute('id','Form_Response_31');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medWeightLossReason");
						
						$QuestionText  = $dom->createElement("QuestionText", "Reason");

						$ResponseCode  = $dom->createElement("ResponseCode", "1");

						$ResponseData  = $dom->createElement("ResponseData", "OTHER");

					$Form_Response_31->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_31->appendChild($QuestionText);	
					$Form_Response_31->appendChild($ResponseCode);	
					$Form_Response_31->appendChild($ResponseData);	


					$Form_Response_34  = $dom->createElement("FormResponse");
					$Form_Response_34 ->setAttribute('id','Form_Response_34');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medWeightLossQuantity");
						
						$QuestionText  = $dom->createElement("QuestionText", "How much weight have you lost?");

						$ResponseCode  = $dom->createElement("ResponseCode", "1");

						$ResponseData  = $dom->createElement("ResponseData", "25");

					$Form_Response_34->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_34->appendChild($QuestionText);	
					$Form_Response_34->appendChild($ResponseCode);	
					$Form_Response_34->appendChild($ResponseData);	
	

					$Form_Response_33  = $dom->createElement("FormResponse");
					$Form_Response_33 ->setAttribute('id','Form_Response_33');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medSurgeryBiopsyTreatmentTestingNotCompleted");
						
						$QuestionText  = $dom->createElement("QuestionText", "In the past 12 months have you been advised by a licensed medical professional to have a surgical operation or biopsy, treatment, or diagnostic testing that has not been completed, other than for routine health screening or HIV testing?");

						$ResponseCode  = $dom->createElement("ResponseCode", "0");

						$ResponseData  = $dom->createElement("ResponseData", "Y");

						$SectionIdentifier  = $dom->createElement("SectionIdentifier", "32");

						$Assoc_Response_Data_4  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_4 ->setAttribute('id','Assoc_Response_Data_4');
						$Assoc_Response_Data_4 ->setAttribute('ActualObjectID','Form_Response_32');

					$Form_Response_33->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_33->appendChild($QuestionText);	
					$Form_Response_33->appendChild($ResponseCode);	
					$Form_Response_33->appendChild($ResponseData);	
					$Form_Response_33->appendChild($SectionIdentifier);	
					$Form_Response_33->appendChild($Assoc_Response_Data_4);	

					$Form_Response_32  = $dom->createElement("FormResponse");
					$Form_Response_32 ->setAttribute('id','Form_Response_32');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medSurgeryBiopsyTreatmentTestingNotCompletedFreeText");
						
						$QuestionText  = $dom->createElement("QuestionText", "Please provide details regarding any outstanding testing, procedure(s), or treatment.");

						$ResponseCode  = $dom->createElement("ResponseCode", "1");

						$ResponseData  = $dom->createElement("ResponseData", "Advised to have surgery");

					$Form_Response_32->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_32->appendChild($QuestionText);	
					$Form_Response_32->appendChild($ResponseCode);	
					$Form_Response_32->appendChild($ResponseData);	
		

					$Form_Response_39  = $dom->createElement("FormResponse");
					$Form_Response_39 ->setAttribute('id','Form_Response_39');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medWeightLoss15LbOrMore");
						
						$QuestionText  = $dom->createElement("QuestionText", "In the past 12 months, have you lost 15 lb. or more other than for pregnancy and delivery?");

						$ResponseCode  = $dom->createElement("ResponseCode", "0");

						$ResponseData  = $dom->createElement("ResponseData", "Y");

						$SectionIdentifier  = $dom->createElement("SectionIdentifier", "29");

						$Assoc_Response_Data_5  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_5 ->setAttribute('id','Assoc_Response_Data_5');
						$Assoc_Response_Data_5 ->setAttribute('ActualObjectID','Form_Response_64');

						$Assoc_Response_Data_6  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_6 ->setAttribute('id','Assoc_Response_Data_6');
						$Assoc_Response_Data_6 ->setAttribute('ActualObjectID','Form_Response_66');

						$Assoc_Response_Data_7  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_7 ->setAttribute('id','Assoc_Response_Data_7');
						$Assoc_Response_Data_7 ->setAttribute('ActualObjectID','Form_Response_71');

						$Assoc_Response_Data_8  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_8 ->setAttribute('id','Assoc_Response_Data_8');
						$Assoc_Response_Data_8 ->setAttribute('ActualObjectID','Form_Response_34');

						$Assoc_Response_Data_9  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_9 ->setAttribute('id','Assoc_Response_Data_9');
						$Assoc_Response_Data_9 ->setAttribute('ActualObjectID','Form_Response_97');

						$Assoc_Response_Data_10  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_10 ->setAttribute('id','Assoc_Response_Data_10');
						$Assoc_Response_Data_10 ->setAttribute('ActualObjectID','Form_Response_100');

						$Assoc_Response_Data_11  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_11 ->setAttribute('id','Assoc_Response_Data_11');
						$Assoc_Response_Data_11 ->setAttribute('ActualObjectID','Form_Response_119');

						$Assoc_Response_Data_12  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_12 ->setAttribute('id','Assoc_Response_Data_12');
						$Assoc_Response_Data_12 ->setAttribute('ActualObjectID','Form_Response_120');

						$Assoc_Response_Data_13  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_13 ->setAttribute('id','Assoc_Response_Data_13');
						$Assoc_Response_Data_13 ->setAttribute('ActualObjectID','Form_Response_124');

						$Assoc_Response_Data_14  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_14 ->setAttribute('id','Assoc_Response_Data_14');
						$Assoc_Response_Data_14 ->setAttribute('ActualObjectID','Form_Response_139');

					$Form_Response_39->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_39->appendChild($QuestionText);	
					$Form_Response_39->appendChild($ResponseCode);	
					$Form_Response_39->appendChild($ResponseData);	
					$Form_Response_39->appendChild($SectionIdentifier);	
					$Form_Response_39->appendChild($Assoc_Response_Data_5);	
					$Form_Response_39->appendChild($Assoc_Response_Data_6);	
					$Form_Response_39->appendChild($Assoc_Response_Data_7);	
					$Form_Response_39->appendChild($Assoc_Response_Data_8);	
					$Form_Response_39->appendChild($Assoc_Response_Data_9);	
					$Form_Response_39->appendChild($Assoc_Response_Data_10);	
					$Form_Response_39->appendChild($Assoc_Response_Data_11);	
					$Form_Response_39->appendChild($Assoc_Response_Data_12);	
					$Form_Response_39->appendChild($Assoc_Response_Data_13);	
					$Form_Response_39->appendChild($Assoc_Response_Data_14);	

					$Form_Response_64  = $dom->createElement("FormResponse");
					$Form_Response_64 ->setAttribute('id','Form_Response_64');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratory");
						
						$QuestionText  = $dom->createElement("QuestionText", "Any disease of the lungs or respiratory system including COPD (chronic obstructive pulmonary disease), emphysema, chronic bronchitis, pulmonary fibrosis, asthma, sarcoidosis, sleep apnea, cystic fibrosis, recurrent pneumonias and tuberculosis?");

						$ResponseCode  = $dom->createElement("ResponseCode", "1");

						$ResponseData  = $dom->createElement("ResponseData", "Y");

						$SectionIdentifier  = $dom->createElement("SectionIdentifier", "b");

						$Assoc_Response_Data_15  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_15 ->setAttribute('id','Assoc_Response_Data_15');
						$Assoc_Response_Data_15 ->setAttribute('ActualObjectID','Form_Response_89');

						$Assoc_Response_Data_16  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_16 ->setAttribute('id','Assoc_Response_Data_16');
						$Assoc_Response_Data_16 ->setAttribute('ActualObjectID','Form_Response_98');

						$Assoc_Response_Data_17  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_17 ->setAttribute('id','Assoc_Response_Data_17');
						$Assoc_Response_Data_17 ->setAttribute('ActualObjectID','Form_Response_107');

						$Assoc_Response_Data_18  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_18 ->setAttribute('id','Assoc_Response_Data_18');
						$Assoc_Response_Data_18 ->setAttribute('ActualObjectID','Form_Response_112');

						$Assoc_Response_Data_19  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_19 ->setAttribute('id','Assoc_Response_Data_19');
						$Assoc_Response_Data_19 ->setAttribute('ActualObjectID','Form_Response_116');

						$Assoc_Response_Data_20  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_20 ->setAttribute('id','Assoc_Response_Data_20');
						$Assoc_Response_Data_20 ->setAttribute('ActualObjectID','Form_Response_117');

						$Assoc_Response_Data_21  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_21 ->setAttribute('id','Assoc_Response_Data_21');
						$Assoc_Response_Data_21 ->setAttribute('ActualObjectID','Form_Response_134');

						$Assoc_Response_Data_22  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_22 ->setAttribute('id','Assoc_Response_Data_22');
						$Assoc_Response_Data_22 ->setAttribute('ActualObjectID','Form_Response_150');

						$Assoc_Response_Data_23  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_23 ->setAttribute('id','Assoc_Response_Data_23');
						$Assoc_Response_Data_23 ->setAttribute('ActualObjectID','Form_Response_152');

					$Form_Response_64->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_64->appendChild($QuestionText);	
					$Form_Response_64->appendChild($ResponseCode);	
					$Form_Response_64->appendChild($ResponseData);	
					$Form_Response_64->appendChild($SectionIdentifier);	
					$Form_Response_64->appendChild($Assoc_Response_Data_15);	
					$Form_Response_64->appendChild($Assoc_Response_Data_16);	
					$Form_Response_64->appendChild($Assoc_Response_Data_17);	
					$Form_Response_64->appendChild($Assoc_Response_Data_18);	
					$Form_Response_64->appendChild($Assoc_Response_Data_19);	
					$Form_Response_64->appendChild($Assoc_Response_Data_20);	
					$Form_Response_64->appendChild($Assoc_Response_Data_21);	
					$Form_Response_64->appendChild($Assoc_Response_Data_22);	
					$Form_Response_64->appendChild($AssociatedResponseData_3);	

					$Form_Response_89  = $dom->createElement("FormResponse");
					$Form_Response_89 ->setAttribute('id','Form_Response_89');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryOther");
						
						$QuestionText  = $dom->createElement("QuestionText", "Other?");

						$ResponseCode  = $dom->createElement("ResponseCode", "2");

						$ResponseData  = $dom->createElement("ResponseData", "Y");

						$Assoc_Response_Data_24  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_24 ->setAttribute('id','Assoc_Response_Data_24');
						$Assoc_Response_Data_24 ->setAttribute('ActualObjectID','Form_Response_91');

					$Form_Response_89->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_89->appendChild($QuestionText);	
					$Form_Response_89->appendChild($ResponseCode);	
					$Form_Response_89->appendChild($ResponseData);	
					$Form_Response_89->appendChild($Assoc_Response_Data_24);	

					$Form_Response_91  = $dom->createElement("FormResponse");
					$Form_Response_91 ->setAttribute('id','Form_Response_91');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryOtherFreeText");
						
						$QuestionText  = $dom->createElement("QuestionText", "Please provide details regarding this condition including the diagnosis, treatment(s), and current status of the condition.");

						$ResponseCode  = $dom->createElement("ResponseCode", "3");

						$ResponseData  = $dom->createElement("ResponseData", "Other lung disease");

					$Form_Response_91->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_91->appendChild($QuestionText);	
					$Form_Response_91->appendChild($ResponseCode);	
					$Form_Response_91->appendChild($ResponseData);	

					$Form_Response_98  = $dom->createElement("FormResponse");
					$Form_Response_98 ->setAttribute('id','Form_Response_98');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryCysticFibrosis");
						
						$QuestionText  = $dom->createElement("QuestionText", "Cystic fibrosis?");

						$ResponseCode  = $dom->createElement("ResponseCode", "2");

						$ResponseData  = $dom->createElement("ResponseData", "n");

					$Form_Response_98->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_98->appendChild($QuestionText);	
					$Form_Response_98->appendChild($ResponseCode);	
					$Form_Response_98->appendChild($ResponseData);	

					$Form_Response_107  = $dom->createElement("FormResponse");
					$Form_Response_107 ->setAttribute('id','Form_Response_107');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryCOPDEmphysemaChronicBronchitis");
						
						$QuestionText  = $dom->createElement("QuestionText", "COPD, emphysema and chronic bronchitis?");

						$ResponseCode  = $dom->createElement("ResponseCode", "2");

						$ResponseData  = $dom->createElement("ResponseData", "N");

					$Form_Response_107->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_107->appendChild($QuestionText);	
					$Form_Response_107->appendChild($ResponseCode);	
					$Form_Response_107->appendChild($ResponseData);

					$Form_Response_112  = $dom->createElement("FormResponse");
					$Form_Response_112 ->setAttribute('id','Form_Response_112');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryTuberculosis");
						
						$QuestionText  = $dom->createElement("QuestionText", "Tuberculosis?");

						$ResponseCode  = $dom->createElement("ResponseCode", "2");

						$ResponseData  = $dom->createElement("ResponseData", "Y");

						$Assoc_Response_Data_25  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_25 ->setAttribute('id','Assoc_Response_Data_25');
						$Assoc_Response_Data_25 ->setAttribute('ActualObjectID','Form_Response_149');

					$Form_Response_112->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_112->appendChild($QuestionText);	
					$Form_Response_112->appendChild($ResponseCode);	
					$Form_Response_112->appendChild($ResponseData);
					$Form_Response_112->appendChild($Assoc_Response_Data_25);

					$Form_Response_149  = $dom->createElement("FormResponse");
					$Form_Response_149 ->setAttribute('id','Form_Response_149');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryTuberculosisTreatment");
						
						$QuestionText  = $dom->createElement("QuestionText", "Have you had any treatment in the past 2 years?");

						$ResponseCode  = $dom->createElement("ResponseCode", "3");

						$ResponseData  = $dom->createElement("ResponseData", "N");

					$Form_Response_149->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_149->appendChild($QuestionText);	
					$Form_Response_149->appendChild($ResponseCode);	
					$Form_Response_149->appendChild($ResponseData);

					$Form_Response_116  = $dom->createElement("FormResponse");
					$Form_Response_116 ->setAttribute('id','Form_Response_116');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratorySarcoidosis");
						
						$QuestionText  = $dom->createElement("QuestionText", "Sarcoidosis?");

						$ResponseCode  = $dom->createElement("ResponseCode", "2");

						$ResponseData  = $dom->createElement("ResponseData", "N");

					$Form_Response_116->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_116->appendChild($QuestionText);	
					$Form_Response_116->appendChild($ResponseCode);	
					$Form_Response_116->appendChild($ResponseData);

					$Form_Response_117  = $dom->createElement("FormResponse");
					$Form_Response_117 ->setAttribute('id','Form_Response_117');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryPulmonaryFibrosis");
						
						$QuestionText  = $dom->createElement("QuestionText", "Pulmonary fibrosis?");

						$ResponseCode  = $dom->createElement("ResponseCode", "2");

						$ResponseData  = $dom->createElement("ResponseData", "N");

					$Form_Response_117->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_117->appendChild($QuestionText);	
					$Form_Response_117->appendChild($ResponseCode);	
					$Form_Response_117->appendChild($ResponseData);

					$Form_Response_134  = $dom->createElement("FormResponse");
					$Form_Response_134 ->setAttribute('id','Form_Response_134');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryRecurrentPneumonia");
						
						$QuestionText  = $dom->createElement("QuestionText", "Recurrent pneumonia?");

						$ResponseCode  = $dom->createElement("ResponseCode", "2");

						$ResponseData  = $dom->createElement("ResponseData", "Y");

						$Assoc_Response_Data_26  = $dom->createElement("AssociatedResponseData");
						$Assoc_Response_Data_26 ->setAttribute('id','Assoc_Response_Data_26');
						$Assoc_Response_Data_26 ->setAttribute('ActualObjectID','Form_Response_65');

					$Form_Response_134->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_134->appendChild($QuestionText);	
					$Form_Response_134->appendChild($ResponseCode);	
					$Form_Response_134->appendChild($ResponseData);
					$Form_Response_134->appendChild($Assoc_Response_Data_26);

					$Form_Response_65  = $dom->createElement("FormResponse");
					$Form_Response_65 ->setAttribute('id','Form_Response_65');
						
						$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryRecurrentPneumoniaEpisodes");
						
						$QuestionText  = $dom->createElement("QuestionText", "Have you had more than one episode of pneumonia in the past year?");

						$ResponseCode  = $dom->createElement("ResponseCode", "3");

						$ResponseData  = $dom->createElement("ResponseData", "Y");

					$Form_Response_65->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_65->appendChild($QuestionText);	
					$Form_Response_65->appendChild($ResponseCode);	
					$Form_Response_65->appendChild($ResponseData);

					$Form_Response_150  = $dom->createElement("FormResponse");
					$Form_Response_150 ->setAttribute('id','Form_Response_150');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryAsthma");
					$QuestionText  = $dom->createElement("QuestionText", "Asthma?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_27  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_27 ->setAttribute('id','Assoc_Response_Data_27');
					$Assoc_Response_Data_27 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_28  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_28 ->setAttribute('id','Assoc_Response_Data_28');
					$Assoc_Response_Data_28 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_29  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_29 ->setAttribute('id','Assoc_Response_Data_29');
					$Assoc_Response_Data_29 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_150->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_150->appendChild($QuestionText);	
					$Form_Response_150->appendChild($ResponseCode);	
					$Form_Response_150->appendChild($ResponseData);	
					$Form_Response_150->appendChild($Assoc_Response_Data_27);	
					$Form_Response_150->appendChild($Assoc_Response_Data_27);	
					$Form_Response_150->appendChild($Assoc_Response_Data_27);

					$Form_Response_54  = $dom->createElement("FormResponse");
					$Form_Response_54 ->setAttribute('id','Form_Response_54');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryAsthmaTreatmentSteroids");
					$QuestionText  = $dom->createElement("QuestionText", "Have you taken oral corticosteroid medication (e.g., prednisone tablets but not inhalers) in the past 2 years?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Form_Response_54->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_54->appendChild($QuestionText);	
					$Form_Response_54->appendChild($ResponseCode);	
					$Form_Response_54->appendChild($ResponseData);	

					$Form_Response_114  = $dom->createElement("FormResponse");
					$Form_Response_114 ->setAttribute('id','Form_Response_114');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryAsthmaTreatmentHospitalized");
					$QuestionText  = $dom->createElement("QuestionText", "Have you been seen in the emergency department or hospitalized in the past 2 years for respiratory difficulty?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Form_Response_114->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_114->appendChild($QuestionText);	
					$Form_Response_114->appendChild($ResponseCode);	
					$Form_Response_114->appendChild($ResponseData);	

					$Form_Response_161  = $dom->createElement("FormResponse");
					$Form_Response_161 ->setAttribute('id','Form_Response_161');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratoryAsthmaTreatmentMedication");
					$QuestionText  = $dom->createElement("QuestionText", "Have you taken medication for this or received any treatment in the past 6 months?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Form_Response_161->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_161->appendChild($QuestionText);	
					$Form_Response_161->appendChild($ResponseCode);	
					$Form_Response_161->appendChild($ResponseData);	


					$Form_Response_152  = $dom->createElement("FormResponse");
					$Form_Response_152 ->setAttribute('id','Form_Response_152');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratorySleepApnea");
					$QuestionText  = $dom->createElement("QuestionText", "Sleep apnea?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_30  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_30 ->setAttribute('id','Assoc_Response_Data_30');
					$Assoc_Response_Data_30 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_31  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_31 ->setAttribute('id','Assoc_Response_Data_31');
					$Assoc_Response_Data_31 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_32  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_32 ->setAttribute('id','Assoc_Response_Data_32');
					$Assoc_Response_Data_32 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_33  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_33 ->setAttribute('id','Assoc_Response_Data_33');
					$Assoc_Response_Data_33 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_34  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_34 ->setAttribute('id','Assoc_Response_Data_34');
					$Assoc_Response_Data_34 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_152->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_152->appendChild($QuestionText);	
					$Form_Response_152->appendChild($ResponseCode);	
					$Form_Response_152->appendChild($ResponseData);	
					$Form_Response_152->appendChild($Assoc_Response_Data_30);	
					$Form_Response_152->appendChild($Assoc_Response_Data_31);	
					$Form_Response_152->appendChild($Assoc_Response_Data_32);
					$Form_Response_152->appendChild($Assoc_Response_Data_33);
					$Form_Response_152->appendChild($Assoc_Response_Data_34);

					$Form_Response_50  = $dom->createElement("FormResponse");
					$Form_Response_50 ->setAttribute('id','Form_Response_50');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratorySleepApneaTreatmentDentalDevice");
					$QuestionText  = $dom->createElement("QuestionText", "Do you use dental device?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Form_Response_50->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_50->appendChild($QuestionText);	
					$Form_Response_50->appendChild($ResponseCode);	
					$Form_Response_50->appendChild($ResponseData);	


					$Form_Response_101  = $dom->createElement("FormResponse");
					$Form_Response_101 ->setAttribute('id','Form_Response_101');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratorySleepApneaTreatmentCPAP");
					$QuestionText  = $dom->createElement("QuestionText", "Have you been prescribed CPAP or BiPAP even if not in current use?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_35  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_35 ->setAttribute('id','Assoc_Response_Data_35');
					$Assoc_Response_Data_35 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_101->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_101->appendChild($QuestionText);	
					$Form_Response_101->appendChild($ResponseCode);	
					$Form_Response_101->appendChild($ResponseData);	
					$Form_Response_101->appendChild($Assoc_Response_Data_35);	

					$Form_Response_104  = $dom->createElement("FormResponse");
					$Form_Response_104 ->setAttribute('id','Form_Response_104');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratorySleepApneaCPAPBiPapUse");
					$QuestionText  = $dom->createElement("QuestionText", "How long have you used CPAP or BiPAP?");
					$ResponseCode  = $dom->createElement("ResponseCode", "4");
					$ResponseData  = $dom->createElement("ResponseData", "2");
					$Form_Response_104->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_104->appendChild($QuestionText);	
					$Form_Response_104->appendChild($ResponseCode);	
					$Form_Response_104->appendChild($ResponseData);	


					$Form_Response_102  = $dom->createElement("FormResponse");
					$Form_Response_102 ->setAttribute('id','Form_Response_102');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratorySleepApneaTreatmentOxygen");
					$QuestionText  = $dom->createElement("QuestionText", "Do you use oxygen?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "N");
					$Form_Response_102->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_102->appendChild($QuestionText);	
					$Form_Response_102->appendChild($ResponseCode);	
					$Form_Response_102->appendChild($ResponseData);	


					$Form_Response_142  = $dom->createElement("FormResponse");
					$Form_Response_142 ->setAttribute('id','Form_Response_142');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratorySleepApneaSleepStudy");
					$QuestionText  = $dom->createElement("QuestionText", "Have you had a sleep study confirming this diagnosis?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Form_Response_142->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_142->appendChild($QuestionText);	
					$Form_Response_142->appendChild($ResponseCode);	
					$Form_Response_142->appendChild($ResponseData);	

					$Form_Response_158  = $dom->createElement("FormResponse");
					$Form_Response_158 ->setAttribute('id','Form_Response_158');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratorySleepApneaTreatmentSurgery");
					$QuestionText  = $dom->createElement("QuestionText", "Have you had surgery for sleep apnea?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_36  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_36 ->setAttribute('id','Assoc_Response_Data_36');
					$Assoc_Response_Data_36 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_158->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_158->appendChild($QuestionText);	
					$Form_Response_158->appendChild($ResponseCode);	
					$Form_Response_158->appendChild($ResponseData);	
					$Form_Response_158->appendChild($Assoc_Response_Data_36);	

					$Form_Response_115  = $dom->createElement("FormResponse");
					$Form_Response_115 ->setAttribute('id','Form_Response_115');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medRespiratorySleepApneaTreatmentSurgeryFreeText");
					$QuestionText  = $dom->createElement("QuestionText", "Please provide details regarding this surgery including the type of surgery, timeline, and current status of the condition.");
					$ResponseCode  = $dom->createElement("ResponseCode", "4");
					$ResponseData  = $dom->createElement("ResponseData", "apnea surgery");
					$Form_Response_115->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_115->appendChild($QuestionText);	
					$Form_Response_115->appendChild($ResponseCode);	
					$Form_Response_115->appendChild($ResponseData);	


					$Form_Response_66  = $dom->createElement("FormResponse");
					$Form_Response_66 ->setAttribute('id','Form_Response_66');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medDiabetes");
					$QuestionText  = $dom->createElement("QuestionText", "Diabetes or pre-diabetes or elevated blood sugars?");
					$ResponseCode  = $dom->createElement("ResponseCode", "1");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$SectionIdentifier  = $dom->createElement("SectionIdentifier", "e");
					$Assoc_Response_Data_37  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_37 ->setAttribute('id','Assoc_Response_Data_37');
					$Assoc_Response_Data_37 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_38  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_38 ->setAttribute('id','Assoc_Response_Data_38');
					$Assoc_Response_Data_38 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_39  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_39 ->setAttribute('id','Assoc_Response_Data_39');
					$Assoc_Response_Data_39 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_40  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_40 ->setAttribute('id','Assoc_Response_Data_40');
					$Assoc_Response_Data_40 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_66->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_66->appendChild($QuestionText);	
					$Form_Response_66->appendChild($ResponseCode);	
					$Form_Response_66->appendChild($ResponseData);	
					$Form_Response_66->appendChild($SectionIdentifier);	
					$Form_Response_66->appendChild($Assoc_Response_Data_37);	
					$Form_Response_66->appendChild($Assoc_Response_Data_38);	
					$Form_Response_66->appendChild($Assoc_Response_Data_39);
					$Form_Response_66->appendChild($Assoc_Response_Data_40);

					$Form_Response_76  = $dom->createElement("FormResponse");
					$Form_Response_76 ->setAttribute('id','Form_Response_76');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medDiabetesInsulin");
					$QuestionText  = $dom->createElement("QuestionText", "Do you use insulin?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "N");
					$Form_Response_76->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_76->appendChild($QuestionText);	
					$Form_Response_76->appendChild($ResponseCode);	
					$Form_Response_76->appendChild($ResponseData);	


					$Form_Response_90  = $dom->createElement("FormResponse");
					$Form_Response_90 ->setAttribute('id','Form_Response_90');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medDiabetesPregnancy");
					$QuestionText  = $dom->createElement("QuestionText", "Was this condition related to a pregnancy and have your blood sugars returned to normal after delivery?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Form_Response_90->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_90->appendChild($QuestionText);	
					$Form_Response_90->appendChild($ResponseCode);	
					$Form_Response_90->appendChild($ResponseData);	

					$Form_Response_123  = $dom->createElement("FormResponse");
					$Form_Response_123 ->setAttribute('id','Form_Response_123');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medDiabetesDiet");
					$QuestionText  = $dom->createElement("QuestionText", "Are you on a diet to control your blood sugars?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "N");
					$Form_Response_123->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_123->appendChild($QuestionText);	
					$Form_Response_123->appendChild($ResponseCode);	
					$Form_Response_123->appendChild($ResponseData);	

					$Form_Response_138  = $dom->createElement("FormResponse");
					$Form_Response_138 ->setAttribute('id','Form_Response_138');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medDiabetesOtherMed");
					$QuestionText  = $dom->createElement("QuestionText", "Do you take any medication other than insulin to control your sugars?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "N");
					$Form_Response_138->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_138->appendChild($QuestionText);	
					$Form_Response_138->appendChild($ResponseCode);	
					$Form_Response_138->appendChild($ResponseData);	

					$Form_Response_71  = $dom->createElement("FormResponse");
					$Form_Response_71 ->setAttribute('id','Form_Response_71');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinal");
					$QuestionText  = $dom->createElement("QuestionText", "Ulcerative colitis or proctitis, any other colitis, Crohn's disease, esophageal varices, stomach or other gastrointestinal ulcers, intestinal or rectal bleeding, diverticulitis, colon polyps, cirrhosis, hepatitis or other liver condition or any disorder of the pancreas?");
					$ResponseCode  = $dom->createElement("ResponseCode", "1");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$SectionIdentifier  = $dom->createElement("SectionIdentifier", "i");
					$Assoc_Response_Data_41  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_41 ->setAttribute('id','Assoc_Response_Data_41');
					$Assoc_Response_Data_41 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_42  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_42 ->setAttribute('id','Assoc_Response_Data_42');
					$Assoc_Response_Data_42 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_43  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_43 ->setAttribute('id','Assoc_Response_Data_43');
					$Assoc_Response_Data_43 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_44  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_44 ->setAttribute('id','Assoc_Response_Data_44');
					$Assoc_Response_Data_44 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_45  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_45 ->setAttribute('id','Assoc_Response_Data_45');
					$Assoc_Response_Data_45 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_46  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_46 ->setAttribute('id','Assoc_Response_Data_46');
					$Assoc_Response_Data_46 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_47  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_47 ->setAttribute('id','Assoc_Response_Data_47');
					$Assoc_Response_Data_47 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_48  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_48 ->setAttribute('id','Assoc_Response_Data_48');
					$Assoc_Response_Data_48 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_49  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_49 ->setAttribute('id','Assoc_Response_Data_49');
					$Assoc_Response_Data_49 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_50  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_50 ->setAttribute('id','Assoc_Response_Data_50');
					$Assoc_Response_Data_50 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_51  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_51 ->setAttribute('id','Assoc_Response_Data_51');
					$Assoc_Response_Data_51 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_71->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_71->appendChild($QuestionText);	
					$Form_Response_71->appendChild($ResponseCode);	
					$Form_Response_71->appendChild($ResponseData);	
					$Form_Response_71->appendChild($SectionIdentifier);	
					$Form_Response_71->appendChild($Assoc_Response_Data_41);	
					$Form_Response_71->appendChild($Assoc_Response_Data_42);	
					$Form_Response_71->appendChild($Assoc_Response_Data_43);
					$Form_Response_71->appendChild($Assoc_Response_Data_44);
					$Form_Response_71->appendChild($Assoc_Response_Data_45);
					$Form_Response_71->appendChild($Assoc_Response_Data_46);
					$Form_Response_71->appendChild($Assoc_Response_Data_47);
					$Form_Response_71->appendChild($Assoc_Response_Data_48);
					$Form_Response_71->appendChild($Assoc_Response_Data_49);
					$Form_Response_71->appendChild($Assoc_Response_Data_50);
					$Form_Response_71->appendChild($Assoc_Response_Data_51);

					$Form_Response_44  = $dom->createElement("FormResponse");
					$Form_Response_44 ->setAttribute('id','Form_Response_44');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalIntestinalOrRectalBleeding");
					$QuestionText  = $dom->createElement("QuestionText", "Intestinal or rectal bleeding?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_52  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_52 ->setAttribute('id','Assoc_Response_Data_52');
					$Assoc_Response_Data_52 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_44->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_44->appendChild($QuestionText);	
					$Form_Response_44->appendChild($ResponseCode);	
					$Form_Response_44->appendChild($ResponseData);	
					$Form_Response_44->appendChild($Assoc_Response_Data_52);	


					$Form_Response_72  = $dom->createElement("FormResponse");
					$Form_Response_72 ->setAttribute('id','Form_Response_72');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalIntestinalOrRectalBleedingCause");
					$QuestionText  = $dom->createElement("QuestionText", "Is the cause:");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "UNKNOWN");
					$Assoc_Response_Data_53  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_53 ->setAttribute('id','Assoc_Response_Data_53');
					$Assoc_Response_Data_53 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_72->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_72->appendChild($QuestionText);	
					$Form_Response_72->appendChild($ResponseCode);	
					$Form_Response_72->appendChild($ResponseData);	
					$Form_Response_72->appendChild($Assoc_Response_Data_53);	

					$Form_Response_55  = $dom->createElement("FormResponse");
					$Form_Response_55 ->setAttribute('id','Form_Response_55');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalIntestinalOrRectalBleedingCauseFreeText");
					$QuestionText  = $dom->createElement("QuestionText", "Please provide details regarding this condition including the diagnosis, treatment(s), and current status of the condition.");
					$ResponseCode  = $dom->createElement("ResponseCode", "4");
					$ResponseData  = $dom->createElement("ResponseData", "unknown rectal bleeding");
					$Form_Response_55->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_55->appendChild($QuestionText);	
					$Form_Response_55->appendChild($ResponseCode);	
					$Form_Response_55->appendChild($ResponseData);	

					$Form_Response_46  = $dom->createElement("FormResponse");
					$Form_Response_46 ->setAttribute('id','Form_Response_46');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalDisorderofPancreas");
					$QuestionText  = $dom->createElement("QuestionText", "Disorder of the pancreas?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_54  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_54 ->setAttribute('id','Assoc_Response_Data_54');
					$Assoc_Response_Data_54 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_46->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_46->appendChild($QuestionText);	
					$Form_Response_46->appendChild($ResponseCode);	
					$Form_Response_46->appendChild($ResponseData);	
					$Form_Response_46->appendChild($Assoc_Response_Data_54);	

					$Form_Response_87  = $dom->createElement("FormResponse");
					$Form_Response_87 ->setAttribute('id','Form_Response_87');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalDisorderofPancreasFreeText");
					$QuestionText  = $dom->createElement("QuestionText", "Please provide details regarding this condition including the diagnosis, treatment(s), and current status of the condition.");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "pancreas condition");
					$Form_Response_87->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_87->appendChild($QuestionText);	
					$Form_Response_87->appendChild($ResponseCode);	
					$Form_Response_87->appendChild($ResponseData);	

					$Form_Response_49  = $dom->createElement("FormResponse");
					$Form_Response_49 ->setAttribute('id','Form_Response_49');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalHepatitis");
					$QuestionText  = $dom->createElement("QuestionText", "Hepatitis?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_55  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_55 ->setAttribute('id','Assoc_Response_Data_55');
					$Assoc_Response_Data_55 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_49->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_49->appendChild($QuestionText);	
					$Form_Response_49->appendChild($ResponseCode);	
					$Form_Response_49->appendChild($ResponseData);	
					$Form_Response_49->appendChild($Assoc_Response_Data_55);	

					$Form_Response_85  = $dom->createElement("FormResponse");
					$Form_Response_85 ->setAttribute('id','Form_Response_85');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalHepatitisType");
					$QuestionText  = $dom->createElement("QuestionText", "Hepatitis Type:");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "OTHER_PRESENT");
					$Form_Response_85->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_85->appendChild($QuestionText);	
					$Form_Response_85->appendChild($ResponseCode);	
					$Form_Response_85->appendChild($ResponseData);	

					$Form_Response_57  = $dom->createElement("FormResponse");
					$Form_Response_57 ->setAttribute('id','Form_Response_57');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalEsophagealVarices");
					$QuestionText  = $dom->createElement("QuestionText", "Esophageal varices?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "N");
					$Form_Response_57->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_57->appendChild($QuestionText);	
					$Form_Response_57->appendChild($ResponseCode);	
					$Form_Response_57->appendChild($ResponseData);	

					$Form_Response_95  = $dom->createElement("FormResponse");
					$Form_Response_95 ->setAttribute('id','Form_Response_95');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalCrohnsDisease");
					$QuestionText  = $dom->createElement("QuestionText", "Crohn's disease?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "N");
					$Form_Response_95->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_95->appendChild($QuestionText);	
					$Form_Response_95->appendChild($ResponseCode);	
					$Form_Response_95->appendChild($ResponseData);	

					$Form_Response_108  = $dom->createElement("FormResponse");
					$Form_Response_108 ->setAttribute('id','Form_Response_108');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalOtherLiverCondition");
					$QuestionText  = $dom->createElement("QuestionText", "Other liver condition?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_56  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_56 ->setAttribute('id','Assoc_Response_Data_56');
					$Assoc_Response_Data_56 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_108->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_108->appendChild($QuestionText);	
					$Form_Response_108->appendChild($ResponseCode);	
					$Form_Response_108->appendChild($ResponseData);	
					$Form_Response_108->appendChild($Assoc_Response_Data_56);	

					$Form_Response_41  = $dom->createElement("FormResponse");
					$Form_Response_41 ->setAttribute('id','Form_Response_41');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalOtherLiverConditionFreeText");
					$QuestionText  = $dom->createElement("QuestionText", "Please provide details regarding this condition including the diagnosis, treatment(s), and current status of the condition.");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "liver condition");
					$Form_Response_41->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_41->appendChild($QuestionText);	
					$Form_Response_41->appendChild($ResponseCode);	
					$Form_Response_41->appendChild($ResponseData);	

					$Form_Response_110  = $dom->createElement("FormResponse");
					$Form_Response_110 ->setAttribute('id','Form_Response_110');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalColonPolyps");
					$QuestionText  = $dom->createElement("QuestionText", "Colon polyps?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_57  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_57 ->setAttribute('id','Assoc_Response_Data_57');
					$Assoc_Response_Data_57 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_110->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_110->appendChild($QuestionText);	
					$Form_Response_110->appendChild($ResponseCode);	
					$Form_Response_110->appendChild($ResponseData);	
					$Form_Response_110->appendChild($Assoc_Response_Data_57);	

					$Form_Response_126  = $dom->createElement("FormResponse");
					$Form_Response_126 ->setAttribute('id','Form_Response_126');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalColonPolypsFreeText");
					$QuestionText  = $dom->createElement("QuestionText", "Please provide details regarding this condition including the diagnosis, treatment(s), and current status of the condition.");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "colon polyps");
					$Form_Response_126->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_126->appendChild($QuestionText);	
					$Form_Response_126->appendChild($ResponseCode);	
					$Form_Response_126->appendChild($ResponseData);	


					$Form_Response_113  = $dom->createElement("FormResponse");
					$Form_Response_113 ->setAttribute('id','Form_Response_113');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalColitis");
					$QuestionText  = $dom->createElement("QuestionText", "Colitis, other than ulcerative colitis or proctitis?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_58  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_58 ->setAttribute('id','Assoc_Response_Data_58');
					$Assoc_Response_Data_58 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_59  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_59 ->setAttribute('id','Assoc_Response_Data_59');
					$Assoc_Response_Data_59 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_60  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_60 ->setAttribute('id','Assoc_Response_Data_60');
					$Assoc_Response_Data_60 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_113->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_113->appendChild($QuestionText);	
					$Form_Response_113->appendChild($ResponseCode);	
					$Form_Response_113->appendChild($ResponseData);	
					$Form_Response_113->appendChild($Assoc_Response_Data_58);	
					$Form_Response_113->appendChild($Assoc_Response_Data_59);	
					$Form_Response_113->appendChild($Assoc_Response_Data_60);

					$Form_Response_36  = $dom->createElement("FormResponse");
					$Form_Response_36 ->setAttribute('id','Form_Response_36');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalColitisAnotherType");
					$QuestionText  = $dom->createElement("QuestionText", "Another type of colitis?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_61  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_61 ->setAttribute('id','Assoc_Response_Data_61');
					$Assoc_Response_Data_61 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_36->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_36->appendChild($QuestionText);	
					$Form_Response_36->appendChild($ResponseCode);	
					$Form_Response_36->appendChild($ResponseData);	
					$Form_Response_36->appendChild($Assoc_Response_Data_61);	

					$Form_Response_80  = $dom->createElement("FormResponse");
					$Form_Response_80 ->setAttribute('id','Form_Response_80');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalColitisAnotherTypeFreeText");
					$QuestionText  = $dom->createElement("QuestionText", "Please provide details regarding this condition including the diagnosis, treatment(s), and current status of the condition.");
					$ResponseCode  = $dom->createElement("ResponseCode", "4");
					$ResponseData  = $dom->createElement("ResponseData", "other colitis");
					$Form_Response_80->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_80->appendChild($QuestionText);	
					$Form_Response_80->appendChild($ResponseCode);	
					$Form_Response_80->appendChild($ResponseData);	

					$Form_Response_88  = $dom->createElement("FormResponse");
					$Form_Response_88 ->setAttribute('id','Form_Response_88');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalColitisIrritableConstipateOnly");
					$QuestionText  = $dom->createElement("QuestionText", "Irritable bowel syndrome being treated with diet or only with medication for diarrhea or constipation?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Form_Response_88->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_88->appendChild($QuestionText);	
					$Form_Response_88->appendChild($ResponseCode);	
					$Form_Response_88->appendChild($ResponseData);	

					$Form_Response_103  = $dom->createElement("FormResponse");
					$Form_Response_103 ->setAttribute('id','Form_Response_103');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalIrritableBowelOtherMeds");
					$QuestionText  = $dom->createElement("QuestionText", "Irritable bowel requiring any other medication?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Form_Response_103->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_103->appendChild($QuestionText);	
					$Form_Response_103->appendChild($ResponseCode);	
					$Form_Response_103->appendChild($ResponseData);	

					$Form_Response_121  = $dom->createElement("FormResponse");
					$Form_Response_121 ->setAttribute('id','Form_Response_121');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalUlcerativeColitisOrProctitis");
					$QuestionText  = $dom->createElement("QuestionText", "Ulcerative colitis or proctitis?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_62  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_62 ->setAttribute('id','Assoc_Response_Data_62');
					$Assoc_Response_Data_62 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_63  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_63 ->setAttribute('id','Assoc_Response_Data_63');
					$Assoc_Response_Data_63 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_121->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_121->appendChild($QuestionText);	
					$Form_Response_121->appendChild($ResponseCode);	
					$Form_Response_121->appendChild($ResponseData);	
					$Form_Response_121->appendChild($Assoc_Response_Data_62);	
					$Form_Response_121->appendChild($Assoc_Response_Data_63);	

					$Form_Response_40  = $dom->createElement("FormResponse");
					$Form_Response_40 ->setAttribute('id','Form_Response_40');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalUlcerativeColitisLimited");
					$QuestionText  = $dom->createElement("QuestionText", "Ulcerative proctitis limited to the rectum and distal colon with therapy limited to enemas and creams?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Form_Response_40->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_40->appendChild($QuestionText);	
					$Form_Response_40->appendChild($ResponseCode);	
					$Form_Response_40->appendChild($ResponseData);	

					$Form_Response_92  = $dom->createElement("FormResponse");
					$Form_Response_92 ->setAttribute('id','Form_Response_92');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalUlcerativeColitisMoreInvolved");
					$QuestionText  = $dom->createElement("QuestionText", "Ulcerative colitis or proctitis involving more of the colon or requiring additional medication, including any oral medication?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "N");
					$Form_Response_92->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_92->appendChild($QuestionText);	
					$Form_Response_92->appendChild($ResponseCode);	
					$Form_Response_92->appendChild($ResponseData);	


					$Form_Response_122  = $dom->createElement("FormResponse");
					$Form_Response_122 ->setAttribute('id','Form_Response_122');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medGastrointestinalUlcers");
					$QuestionText  = $dom->createElement("QuestionText", "Ulcers?");
					$ResponseCode  = $dom->createElement("ResponseCode", "2");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_64  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_64 ->setAttribute('id','Assoc_Response_Data_64');
					$Assoc_Response_Data_64 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_65  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_65 ->setAttribute('id','Assoc_Response_Data_65');
					$Assoc_Response_Data_65 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_66  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_66 ->setAttribute('id','Assoc_Response_Data_66');
					$Assoc_Response_Data_66 ->setAttribute('ActualObjectID','Form_Response_30');
					$Assoc_Response_Data_67  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_67 ->setAttribute('id','Assoc_Response_Data_67');
					$Assoc_Response_Data_67 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_122->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_122->appendChild($QuestionText);	
					$Form_Response_122->appendChild($ResponseCode);	
					$Form_Response_122->appendChild($ResponseData);	
					$Form_Response_122->appendChild($Assoc_Response_Data_64);	
					$Form_Response_122->appendChild($Assoc_Response_Data_65);	
					$Form_Response_122->appendChild($Assoc_Response_Data_66);
					$Form_Response_122->appendChild($Assoc_Response_Data_67);

					$Form_Response_99  = $dom->createElement("FormResponse");
					$Form_Response_99 ->setAttribute('id','Form_Response_99');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medUlcerOther");
					$QuestionText  = $dom->createElement("QuestionText", "Other ulcer?");
					$ResponseCode  = $dom->createElement("ResponseCode", "3");
					$ResponseData  = $dom->createElement("ResponseData", "Y");
					$Assoc_Response_Data_68  = $dom->createElement("AssociatedResponseData");
					$Assoc_Response_Data_68 ->setAttribute('id','Assoc_Response_Data_68');
					$Assoc_Response_Data_68 ->setAttribute('ActualObjectID','Form_Response_30');
					$Form_Response_99->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_99->appendChild($QuestionText);	
					$Form_Response_99->appendChild($ResponseCode);	
					$Form_Response_99->appendChild($ResponseData);	
					$Form_Response_99->appendChild($Assoc_Response_Data_68);	

					$Form_Response_59  = $dom->createElement("FormResponse");
					$Form_Response_59 ->setAttribute('id','Form_Response_59');
					$QuestionNumberQuestionNumber  = $dom->createElement("QuestionNumber", "medUlcerOtherFreeText");
					$QuestionText  = $dom->createElement("QuestionText", "Please provide details regarding this condition including the diagnosis, treatment(s), and current status of the condition.");
					$ResponseCode  = $dom->createElement("ResponseCode", "4");
					$ResponseData  = $dom->createElement("ResponseData", "other ulcer");
					$Form_Response_59->appendChild($QuestionNumberQuestionNumber);	
					$Form_Response_59->appendChild($QuestionText);	
					$Form_Response_59->appendChild($ResponseCode);	
					$Form_Response_59->appendChild($ResponseData);	



				$FormInstance_2->appendChild($FormName);
				$FormInstance_2->appendChild($ProviderFormNumber);
				$FormInstance_2->appendChild($SubmitDate);
				$FormInstance_2->appendChild($Form_Response_29);
				$FormInstance_2->appendChild($Form_Response_30);
				$FormInstance_2->appendChild($Form_Response_31);
				$FormInstance_2->appendChild($Form_Response_34);
				$FormInstance_2->appendChild($Form_Response_33);
				$FormInstance_2->appendChild($Form_Response_32);
				$FormInstance_2->appendChild($Form_Response_39);
				$FormInstance_2->appendChild($Form_Response_89);
				$FormInstance_2->appendChild($Form_Response_91);
				$FormInstance_2->appendChild($Form_Response_98);
				$FormInstance_2->appendChild($Form_Response_107);
				$FormInstance_2->appendChild($Form_Response_112);
				$FormInstance_2->appendChild($Form_Response_149);
				$FormInstance_2->appendChild($Form_Response_116);
				$FormInstance_2->appendChild($Form_Response_117);
				$FormInstance_2->appendChild($Form_Response_134);
				$FormInstance_2->appendChild($Form_Response_65);
				$FormInstance_2->appendChild($Form_Response_150);
				$FormInstance_2->appendChild($Form_Response_54);
				$FormInstance_2->appendChild($Form_Response_114);
				$FormInstance_2->appendChild($Form_Response_161);
				$FormInstance_2->appendChild($Form_Response_152);
				$FormInstance_2->appendChild($Form_Response_50);
				$FormInstance_2->appendChild($Form_Response_101);
				$FormInstance_2->appendChild($Form_Response_104);
				$FormInstance_2->appendChild($Form_Response_102);
				$FormInstance_2->appendChild($Form_Response_142);
				$FormInstance_2->appendChild($Form_Response_158);
				$FormInstance_2->appendChild($Form_Response_115);
				$FormInstance_2->appendChild($Form_Response_66);
				$FormInstance_2->appendChild($Form_Response_76);
				$FormInstance_2->appendChild($Form_Response_90);
				$FormInstance_2->appendChild($Form_Response_123);
				$FormInstance_2->appendChild($Form_Response_138);
				$FormInstance_2->appendChild($Form_Response_71);
				$FormInstance_2->appendChild($Form_Response_44);
				$FormInstance_2->appendChild($Form_Response_72);
				$FormInstance_2->appendChild($Form_Response_55);
				$FormInstance_2->appendChild($Form_Response_46);
				$FormInstance_2->appendChild($Form_Response_87);
				$FormInstance_2->appendChild($Form_Response_49);
				$FormInstance_2->appendChild($Form_Response_85);
				$FormInstance_2->appendChild($Form_Response_57);
				$FormInstance_2->appendChild($Form_Response_95);
				$FormInstance_2->appendChild($Form_Response_108);
				$FormInstance_2->appendChild($Form_Response_41);
				$FormInstance_2->appendChild($Form_Response_110);
				$FormInstance_2->appendChild($Form_Response_126);
				$FormInstance_2->appendChild($Form_Response_113);
				$FormInstance_2->appendChild($Form_Response_36);
				$FormInstance_2->appendChild($Form_Response_80);
				$FormInstance_2->appendChild($Form_Response_88);
				$FormInstance_2->appendChild($Form_Response_103);
				$FormInstance_2->appendChild($Form_Response_121);
				$FormInstance_2->appendChild($Form_Response_40);
				$FormInstance_2->appendChild($Form_Response_92);
				$FormInstance_2->appendChild($Form_Response_122);
				$FormInstance_2->appendChild($Form_Response_99);
				$FormInstance_2->appendChild($Form_Response_59);

				$Relation_2000  = $dom->createElement("Relation");
				$Relation_2000 ->setAttribute('id','Relation_2000');
				$Relation_2000 ->setAttribute('OriginatingObjectID','Party_1');
				$Relation_2000 ->setAttribute('RelatedObjectID','Form_2');

					$OriginatingObjectType  = $dom->createElement("OriginatingObjectType", "OLI_PARTY");
					$OriginatingObjectType ->setAttribute('tc','6');

					$RelatedObjectType  = $dom->createElement("RelatedObjectType", "OLI_FORMINSTANCE");
					$RelatedObjectType ->setAttribute('tc','101');

					$RelationRoleCode  = $dom->createElement("RelationRoleCode", "OLI_REL_FORMFOR");
					$RelationRoleCode ->setAttribute('tc','107');

				$Relation_2000->appendChild($OriginatingObjectType);
				$Relation_2000->appendChild($RelatedObjectType);
				$Relation_2000->appendChild($RelationRoleCode);

			$OLifE->appendChild($SourceInfo);
			$OLifE->appendChild($Holding);
			$OLifE->appendChild($Party);
			$OLifE->appendChild($Relation_1);
			$OLifE->appendChild($Relation_2);
			$OLifE->appendChild($FormInstance_1);
			$OLifE->appendChild($Relation_100);
			$OLifE->appendChild($FormInstance_2);
			$OLifE->appendChild($Relation_2000);




		$TXLifeRequest->appendChild($TransRefGUID);
		$TXLifeRequest->appendChild($TransType);
		$TXLifeRequest->appendChild($TransExeDate);
		$TXLifeRequest->appendChild($TransExeTime);
		$TXLifeRequest->appendChild($TransMode);
		$TXLifeRequest->appendChild($NoResponseOK);
		$TXLifeRequest->appendChild($TestIndicator);
		$TXLifeRequest->appendChild($OLifE);





	$elemTXLife->appendChild($UserAuthRequest);
	$elemTXLife->appendChild($TXLifeRequest);

	$dom->appendChild($elemTXLife);
	$dom->save("103-2.xml");

