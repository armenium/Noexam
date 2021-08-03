<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_data".
 *
 * @property integer $id
 * @property string $sid
 * @property string $data
 */
class Beneficiary extends \yii\db\ActiveRecord
{

    public $first_name;
    public $last_name;
    public $relationship;
    public $percentage;
    public $street_address;
    public $state;
    public $city;
    public $zip;
    public $isNewRecord = true;
    public static function tableName()
    {
        return 'beneficiary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zip', 'percentage'], 'integer'],
            [['first_name', 'last_name', 'last_name', 'street_address', 'city', 'relationship'], 'string'],
            [['last_name', 'first_name'], 'validateFirstName'],
            [['last_name', 'first_name'], 'string', 'max' => 19],
            [['address'], 'string', 'max' => 45],
            [['city'], 'validateCity'],
            [['city'], 'string', 'max' => 31],
            [['street_address'], 'validateStreetAddress'],
            [['street_address'], 'string', 'max' => 45],
            [['state'], 'string', 'max' => 2, 'min'=>2],
            [['state'], 'in', 'range' => [
                                            'AL',
                                            'AK',
                                            'AZ',
                                            'AR',
                                            'CA',
                                            'CO',
                                            'CT',
                                            'DE',
                                            'DC',
                                            'FL',
                                            'GA',
                                            'HI',
                                            'ID',
                                            'IL',
                                            'IN',
                                            'IA',
                                            'KS',
                                            'KY',
                                            'LA',
                                            'MA',
                                            'ME',
                                            'MD',
                                            'MI',
                                            'MN',
                                            'MS',
                                            'MO',
                                            'MT',
                                            'NE',
                                            'NH',
                                            'NV',
                                            'NJ',
                                            'NM',
                                            'NC',
                                            'ND',
                                            'OH',
                                            'OK',
                                            'OR',
                                            'PA',
                                            'RI',
                                            'SC',
                                            'SD',
                                            'TN',
                                            'TX',
                                            'UT',
                                            'VT',
                                            'VA',
                                            'WV',
                                            'WA',
                                            'WI',
                                            'WY',
                                            ]
            ],
            [['first_name', 'last_name', 'last_name', 'street_address', 'city', 'zip', 'relationship', 'percentage'], 'required'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sid' => 'Sid',
            'data' => 'Data',
            //'ssn' => 'SSN',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'street_address' => 'Street Address',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip Code',
            'phone_number' => 'Phone Number',
            'email' => 'Email Address',
            'birth_state' => 'Birth State',
            'birth_country' => 'Birth Country',
            'occupation' => 'Occupation',
            'household_income' => 'Household Income',
            'ssn' => 'Social Security Number',
            'dln' => 'Drivers License Number',
            'dls' => 'Drivers License State',
        ];
    }

    public function decodeData(){
        return json_decode($this->data, true);
    }
    public function validateCreditCard($attribute)
    {
        if (!preg_match('/^([0-9]{4}[\s-]?){4}/', $this->$attribute)) {
            $this->addError($attribute, 'Plese enter valida card number.');
        }
    }
    public function validateFirstName($attribute)
    {
        if (!preg_match('/^[a-zA-Z-\'\s]*$/', $this->$attribute)) {
            $this->addError($attribute, 'The only Special Characters allowed are Hyphen (-), Apostrophe (\') and blank space.');
        }
    }
    public function validateMiddleName($attribute)
    {
        if (!preg_match('/^[a-zA-Z]*$/', $this->$attribute)) {
            $this->addError($attribute, 'The only alphabets allowed.');
        }
    }
    public function validateCity($attribute)
    {
        if (!preg_match('/^[a-zA-Z#]*$/', $this->$attribute)) {
            $this->addError($attribute, 'The only alphabets and Pound/Hash (#) allowed.');
        }
    }
    public function validateStreetAddress($attribute)
    {
        if (!preg_match('/^[0-9a-zA-Z-\'\s#&]*$/', $this->$attribute)) {
            $this->addError($attribute, 'The only allowed special characters are Hyphen (-), Apostrophe (\'), Pound/Hash (#), ampersand (&), and blank space( ).');
        }
    }
    public function alphaNumeric($attribute)
    {
        if (!preg_match('/^[0-9a-zA-Z]*$/', $this->$attribute)) {
            $this->addError($attribute, 'The only Alphanumeric allowed.');
        }
    }
    public function validateEmail($attribute)
    {
/*        if(filter_var($this->$attribute, FILTER_VALIDATE_EMAIL)) {

            $this->addError($attribute, 'Email not in format.');
        }
        */
        if (!preg_match('/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', $this->$attribute)) {
            $this->addError($attribute, 'Email Address is not a valid email address.');
        }
       
    }
}
