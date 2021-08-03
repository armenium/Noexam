<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "na_rates".
 *
 * @property integer $id
 * @property integer $foot
 * @property integer $inch
 * @property string $sex
 * @property integer $sp_lo
 * @property integer $sp_hi
 * @property integer $p_lo
 * @property integer $p_hi
 * @property integer $snt_lo
 * @property integer $snt_hi
 * @property integer $ssnt_lo
 * @property integer $ssnt_hi
 */
class NaRates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'na_rates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foot', 'inch', 'sex', 'sp_lo', 'sp_hi', 'p_lo', 'p_hi', 'snt_lo', 'snt_hi', 'ssnt_lo', 'ssnt_hi'], 'required'],
            [['foot', 'inch', 'sp_lo', 'sp_hi', 'p_lo', 'p_hi', 'snt_lo', 'snt_hi', 'ssnt_lo', 'ssnt_hi'], 'integer'],
            [['sex'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'foot' => 'Foot',
            'inch' => 'Inch',
            'sex' => 'Sex',
            'sp_lo' => 'Sp Lo',
            'sp_hi' => 'Sp Hi',
            'p_lo' => 'P Lo',
            'p_hi' => 'P Hi',
            'snt_lo' => 'Snt Lo',
            'snt_hi' => 'Snt Hi',
            'ssnt_lo' => 'Ssnt Lo',
            'ssnt_hi' => 'Ssnt Hi',
        ];
    }
}
