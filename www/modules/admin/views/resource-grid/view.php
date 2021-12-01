<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ResourcesGrid */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Resources Grids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resources-grid-view">


    <div class="pull-right">
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
	<h1><?= Html::encode($this->title) ?></h1>
	<hr>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
	        [
		        'attribute' => 'id',
		        'format' => 'html',
		        'value' => function($data){
			        return '<span class="badge bg-danger text-light">'.$data->id.'</span>';
		        },
	        ],
            'category_id',
            'title',
            'content:ntext',
            'link',
            'label',
            'placement',
	        'txcolor',
	        [
		        'attribute' => 'lbcolor',
		        'format' => 'html',
		        'value' => function($data){
			        return (!empty($data->lbcolor)) ? Html::tag('div', $data->lbcolor, ['style' => 'padding:2px 5px; color:#000; background-color:'.$data->lbcolor.';']) : '';
		        },
	        ],
	        [
		        'attribute' => 'bgcolor',
		        'format' => 'html',
		        'value' => function($data){
			        return (!empty($data->bgcolor)) ? Html::tag('div', $data->bgcolor, ['style' => 'padding:2px 5px; color:#000; background-color:'.$data->bgcolor.';']) : '';
		        },
	        ],
	        [
		        'attribute' => 'bgimage',
		        'format' => 'html',
		        'value' => function($data){
			        return (!empty($data->bgimage)) ? Html::img($data->bgimage, ['width' => '100px']) : '';
		        },
	        ],
        ],
    ]) ?>

</div>
