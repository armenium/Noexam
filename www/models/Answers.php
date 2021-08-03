<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property integer $id
 * @property integer $q_id
 * @property string $type
 * @property string $text
 * @property string $value
 * @property string $xml_num
 * @property string $field_label
 * @property string $template_src
 */
class Answers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['q_id'], 'integer'],
            [['type', 'text', 'value', 'xml_num', 'field_label', 'template_src'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'text' => 'Text',
            'value' => 'Value',
            'xml_num' => 'Xml Num',
            'field_label' => 'Field label',
            'template_src' => 'Template Source',
        ];
    }
}
