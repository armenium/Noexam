<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ResourcesCompare */

$this->title = 'Create Resource Compare';
$this->params['breadcrumbs'][] = ['label' => 'Resources Comparison', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resources-compare-create">

    <h1><?= Html::encode($this->title) ?></h1>
	<hr>
    <?=$this->render('_form', ['model' => $model]);?>

</div>
