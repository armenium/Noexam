<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>
<div class="faqs-index">

	<div class="float-right" style="margin-bottom: 20px;">
		<?=Html::a('Add new', ['create'], ['class' => 'btn btn-info']);?>
	</div>
	<h1><?=Html::encode($this->title);?></h1>

	<div class="clearfix"></div>

	<div style="float: right; margin: -7px 0 10px;">
		<?=Html::label('Page size:', 'per-page', array( 'style' => 'margin: 0 10px 0 0;'));?>
		<?=Html::dropDownList('per-page', $pageSize, $pageSize_list, ['id' => 'per-page', 'class' => 'form-control', 'style' => 'display:inline-block; width:auto']);?>
	</div>

	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterSelector' => 'select[name="per-page"]',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'slug',
            'question:ntext',
            //'answer:ntext',
            'answer_tpl:ntext',
	        'item_order',
	        [
		        'header' => $searchModel->attributeLabels()['category'],
		        'contentOptions' => ['class' => 'col-50'],
		        'attribute' => 'category',
		        'filter'=> $categories,
		        'filterOptions' => ['class' => ''],
		        'content' => function($model, $key, $index, $column){
			        $ret = '<span class="label label-info">'.$model->category.'</span>';

			        return $ret;
		        }
	        ],
	        //'links_area',
	        //'meta_title',
	        //'meta_desc',

	        [
		        'class' => 'yii\grid\ActionColumn',
		        'header' => 'Actions',
		        'contentOptions' => ['class' => 'actions-col col-140 trans_all'],
		        'visible'=> Yii::$app->user->isGuest ? true : true,
		        'template' => '{view}{update}{delete}',
		        'buttons' => [
			        'view' => function ($url, $model){
				        $t = '/faqs/'.$model->id.'/view/';
				        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to($t), ['title' => 'View', 'aria-label' => 'View', 'data-pjax' => '0']);
			        },
			        'update' => function ($url, $model){
				        $t = '/faqs/'.$model->id.'/update/';
				        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to($t), ['title' => 'Update', 'aria-label' => 'Update', 'data-pjax' => '0']);
			        },
			        'delete' => function ($url, $model){
				        $t = '/faqs/'.$model->id.'/delete/';
				        return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to($t), ['title' => 'Delete', 'aria-label' => 'Delete', 'data-pjax' => '0', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]);
			        },
		        ],
	        ],
        ],
        'pager' => [
	        'firstPageLabel' => '&laquo;',
	        'prevPageLabel' => '&lsaquo;',
	        'nextPageLabel' => '&rsaquo;',
	        'lastPageLabel'  => '&raquo;',
	        'maxButtonCount' => 20,
        ],
    ]); ?>
</div>
<?php Pjax::end(); ?>
