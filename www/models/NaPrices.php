<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "na_prices".
 *
 * @property integer $id
 * @property string $sex
 * @property integer $term
 * @property string $type
 * @property integer $age
 * @property double $band1
 * @property double $band2
 * @property double $band3
 */
class NaPrices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'na_prices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex', 'term', 'type', 'age', 'band1', 'band2', 'band3'], 'required'],
            [['term', 'age'], 'integer'],
            [['band1', 'band2', 'band3'], 'number'],
            [['sex', 'type'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sex' => 'Sex',
            'term' => 'Term',
            'type' => 'Type',
            'age' => 'Age',
            'band1' => 'Band1',
            'band2' => 'Band2',
            'band3' => 'Band3',
        ];
    }
}
