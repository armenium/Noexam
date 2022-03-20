<?php

use yii\helpers\VarDumper;

#VarDumper::dump(Yii::$app->controller->id.'/'.Yii::$app->controller->action->id, 10, 1);
return [
	['label' => 'Home', 'url' => ['/'], 'options' => ['class' => 'header__item'], 'linkOptions' => ['class' => 'header__link'], 'active' => (Yii::$app->controller->id.'/'.Yii::$app->controller->action->id == '/')],
	['label' => 'Life Insurance 101', 'url' => ['/life-insurance/'], 'options' => ['class' => 'header__item'], 'linkOptions' => ['class' => 'header__link']],
	['label' => 'Best Life Insurance Companies', 'url' => ['/life-insurance/companies/'], 'options' => ['class' => 'header__item'], 'linkOptions' => ['class' => 'header__link']],
	['label' => 'Life Insurance Rates', 'url' => ['/life-insurance/term/rates/'], 'options' => ['class' => 'header__item'], 'linkOptions' => ['class' => 'header__link']],
	
	###['label' => 'Get Quotes', 'url' => ['/apply-now/'], 'options' => ['class' => 'header__item'], 'linkOptions' => ['class' => 'header__link']],
];
