<?php

namespace app\models;

/**
 * This is the model class for table "questions".
 * @property integer $id
 * @property integer $reflex
 * @property string $xml_num
 * @property string $text
 * @property integer $sub_q
 * @property string $num
 * @property string $type
 * @property integer $group_num
 * @property string $group_name
 * @property string $options
 * @property string $template_src
 * @property string $pdf_text
 */
class Questions extends \yii\db\ActiveRecord{
	public $q_answer;
	public $spec_q;
	public $sub_questions;

	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'questions';
	}

	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['reflex', 'sub_q', 'app_q_num'], 'integer'],
			[['xml_num', 'text', 'type', 'group_name', 'options', 'group_num', 'template_src', 'pdf_text'], 'string', 'max' => 255],
			[['num'], 'string', 'max' => 2],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id'         => 'ID',
			'reflex'     => 'Reflex',
			'xml_num'    => 'Xml Num',
			'text'       => 'Text',
			'sub_q'      => 'Sub Q',
			'num'        => 'Num',
			'type'       => 'Type',
			'group_num'  => 'Group Num',
			'group_name' => 'Group Name',
			'options'    => 'Options',
			'template_src'    => 'Template source file',
			'pdf_text'    => 'PDF title',
		];
	}

	public function getSubquestions(){
		return $this->hasMany(Subqestions::className(), ['parent_id' => 'id']);
	}

	public function getReflexquestions(){
		return $this->hasMany(Reflexquestions::className(), ['parent_id' => 'id'])->where(['lvl' => '1']);
	}

	public function getAnswers(){
		return $this->hasMany(Reflexquestions::className(), ['parent_id' => 'id'])->where(['type' => 'answer']);
	}

	public function getSubquestion(){
		return $this->hasMany(Questions::className(), ['parent_id' => 'id'])->where(['type' => 'sub']);
	}

	public function getSubquestionById($q_id){
		return $this->hasMany(Questions::className(), ['parent_id' => 'id'])->where(['type' => 'sub', 'id' => $q_id]);
	}

	public function getReflexquestion(){
		return $this->hasMany(Questions::className(), ['parent_id' => 'id'])->where(['type' => 'reflex']);
	}

	public function getReflexQuestionById($q_id){
		return $this->hasMany(Questions::className(), ['parent_id' => 'id'])->where(['type' => 'reflex', 'id' => $q_id]);
	}

	public function getAnswer(){
		return $this->hasMany(Answers::className(), ['q_id' => 'id']);
	}

	public function getCondition($answer){
		return $this->hasMany(Conditions::className(), ['q_id' => 'id'])->where(['answer' => $answer]);
	}

	public function getConditions(){
		return $this->hasMany(Conditions::className(), ['q_id' => 'id']);
	}
}
