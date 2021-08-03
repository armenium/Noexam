<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reflexquestions".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $text
 * @property string $type
 * @property integer $lvl
 * @property string $options
 * @property integer $xml_num
 */
class Reflexquestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reflexquestions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'lvl', 'xml_num'], 'integer'],
            [['text', 'type'], 'string', 'max' => 255],
            [['options'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'text' => 'Text',
            'type' => 'Type',
            'lvl' => 'Lvl',
            'options' => 'Options',
            'xml_num' => 'Xml Num',
        ];
    }
     public function getReflexquestions()
    {
        return $this->hasMany(Reflexquestions::className(), ['parent_id' => 'id']);
    }
     public function getAnswers()
    {
        return $this->hasMany(Reflexquestions::className(), ['parent_id' => 'id'])->where(['lvl'=>'0', 'type'=>'answer']);
    }
}
