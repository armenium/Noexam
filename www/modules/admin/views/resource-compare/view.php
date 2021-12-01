<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ResourcesCompare */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Resources Compares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resources-compare-view">

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
    <?=DetailView::widget([
        'model' => $model,
        'attributes' => [
	        [
		        'attribute' => 'id',
		        'format' => 'html',
		        'value' => function($data){
			        return '<span class="badge bg-danger text-light">'.$data->id.'</span>';
		        },
	        ],
	        [
		        'attribute' => 'company1_id',
		        'format' => 'html',
		        'value' => function($data){
			        return $data->getCompanyName($data->company1_id).' <span class="badge bg-success text-light">'.$data->company1_id.'</span>';
		        },
	        ],
	        [
		        'attribute' => 'company2_id',
		        'format' => 'html',
		        'value' => function($data){
			        return $data->getCompanyName($data->company2_id).' <span class="badge bg-success text-light">'.$data->company2_id.'</span>';
		        },
	        ],
            'title',
            'content:ntext',
	        [
		        'attribute' => 'no_index',
		        'format' => 'html',
		        'value' => function($data){
			        $ret = '<span class="badge bg-danger text-light">No</span>';
			        if($data->no_index){
				        $ret = '<span class="badge bg-warning text-dark">Yes</span>';
			        }
			        return $ret;
		        }
	        ],
	        [
		        'attribute' => 'no_follow',
		        'format' => 'html',
		        'value' => function($data){
			        $ret = '<span class="badge bg-danger text-light">No</span>';
			        if($data->no_follow){
				        $ret = '<span class="badge bg-warning text-dark">Yes</span>';
			        }
			        return $ret;
		        }
	        ],
        ],
    ]) ?>

</div>
