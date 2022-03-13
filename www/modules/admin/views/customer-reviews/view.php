<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerReviews */

$this->title                   = '';
$this->params['breadcrumbs'][] = ['label' => 'Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faqs-view">

	<h1><?=Html::encode($this->title)?></h1>

	<p>
		<?=Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
		<?=Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data'  => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method'  => 'post',
			],
		])?>
	</p>
	
	<?=DetailView::widget([
		'model'      => $model,
		'attributes' => [
			'id',
			[
				'attribute' => 'avatar',
				'header' => 'Avatar',
				'contentOptions' => ['class' => 'customer-avatar-row'],
				'format' => 'image',
			],
			'customer_name',
			'review_title',
			'review_content:ntext',
			'review_date:date',
			'review_stars',
		],
	])?>

</div>
