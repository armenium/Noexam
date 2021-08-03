<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ResourcesCompanies */

$this->title = 'Create Resources Companies';
$this->params['breadcrumbs'][] = ['label' => 'Resources Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resources-companies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
