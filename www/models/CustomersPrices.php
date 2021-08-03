<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "customers_prices".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $coverage
 * @property int $term
 * @property double $monthly_premium
 * @property double $monthly_price
 * @property double $premium_monthly
 * @property double $premium_annual
 * @property string $company_code
 * @property string $company_name
 * @property string $product_code
 * @property string $product_name
 * @property string $product_type
 * @property string $rate_class_name
 * @property string $policy_fee
 * @property string $rating
 *
 * @property Customers $customer
 */
class CustomersPrices extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers_prices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id', 'coverage', 'term'], 'integer'],
            [['premium_monthly', 'premium_annual'], 'number'],
            [['company_code', 'company_name', 'product_code', 'product_name', 'product_type', 'rate_class_name'], 'string', 'max' => 50],
            [['policy_fee'], 'string', 'max' => 10],
            [['rating'], 'string', 'max' => 5],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'coverage' => 'Coverage',
            'term' => 'Term',
            'premium_monthly' => 'Premium Monthly',
            'premium_annual' => 'Premium Annual',
            'company_code' => 'Company Code',
            'company_name' => 'Company Name',
            'product_code' => 'Product Code',
            'product_name' => 'Product Name',
            'product_type' => 'Product Type',
            'rate_class_name' => 'Rate Class Name',
            'policy_fee' => 'Policy Fee',
            'rating' => 'Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer(){
        return $this->hasOne(Customers::className(), ['id' => 'customer_id']);
    }
}
