<?php
use yii\helpers\Html;
use yii\helpers\VarDumper;

//VarDumper::dump($customer_data, 10, 1);
VarDumper::dump($customer_data->attributes, 10, 1);
VarDumper::dump(json_decode($customer_data->attributes['data'], 1), 10, 1);
?>