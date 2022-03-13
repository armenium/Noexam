<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CustomerReviews */

$this->title = 'Create Review';
$this->params['breadcrumbs'][] = ['label' => 'Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faqs-create">

	<h1><?=Html::encode($this->title)?></h1>
	
	<?=$this->render('_form', ['model' => $model]);?>

</div>
