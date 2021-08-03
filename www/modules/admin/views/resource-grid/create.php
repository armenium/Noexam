<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ResourcesGrid */

$this->title  = 'Create Resources Grid';
$this->params['breadcrumbs'][] = ['label' => 'Resources Grids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resources-grid-create">

	<h1><?=Html::encode($this->title)?></h1>

	<?=$this->render('_form', [
		'model' => $model,
		'txcolor_list' => $txcolor_list,
		'label_list' => $label_list,
		'placement_list' => $placement_list,
	]);?>

</div>
