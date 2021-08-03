<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResourcesCats */

$this->title = 'Resource page:';
$this->params['breadcrumbs'][] = ['label' => 'Resources Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';

?>
<div class="resources-grid-update">

    <h2><?=Html::encode($this->title);?> <span class="rt"><?=$model->title;?></span></h2>
	<hr>
    <?=$this->render('_form', ['model' => $model]);?>

</div>
