<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conditions".
 *
 * @property integer $id
 * @property integer $q_id
 * @property integer $a_id
 * @property string $condition
 */
class Conditions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conditions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['q_id', 'a_id'], 'integer'],
            [['condition'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'q_id' => 'Q ID',
            'a_id' => 'A ID',
            'condition' => 'Condition',
        ];
    }
}
