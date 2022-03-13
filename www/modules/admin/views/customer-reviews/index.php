<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Reviews';
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

	<?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterSelector' => 'select[name="per-page"]',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
	        [
		        'attribute' => 'avatar',
		        'header' => 'Avatar',
		        'contentOptions' => ['class' => 'col-50 customer-avatar-col'],
		        'format' => 'image',
	        ],
            'customer_name',
            'review_title',
            #'review_content:ntext',
            'review_date:date',
	        'review_stars',

	        [
		        'class' => 'yii\grid\ActionColumn',
		        'header' => 'Actions',
		        'contentOptions' => ['class' => 'actions-col col-140 trans_all'],
		        'visible'=> Yii::$app->user->isGuest ? true : true,
		        'template' => '{view}{update}{delete}',
		        'buttons' => [
			        'view' => function ($url, $model){
				        $t = '/customer-reviews/'.$model->id.'/view/';
				        return Html::a('<span class="bi-eye"></span>', Url::to($t), ['title' => 'View', 'aria-label' => 'View', 'data-pjax' => '0']);
			        },
			        'update' => function ($url, $model){
				        $t = '/customer-reviews/'.$model->id.'/update/';
				        return Html::a('<span class="bi-pencil"></span>', Url::to($t), ['title' => 'Update', 'aria-label' => 'Update', 'data-pjax' => '0']);
			        },
			        'delete' => function ($url, $model){
				        $t = '/customer-reviews/'.$model->id.'/delete/';
				        return Html::a('<span class="bi-trash"></span>', Url::to($t), ['title' => 'Delete', 'aria-label' => 'Delete', 'data-pjax' => '0', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]);
			        },
		        ],
	        ],
        ],
        'pager' => [
	        /** For all options look here: /vendor/yiisoft/yii2/widgets/LinkPager.php */
	        'maxButtonCount' => 20,
	        'firstPageLabel' => '&laquo;',
	        'prevPageLabel' => '&lsaquo;',
	        'nextPageLabel' => '&rsaquo;',
	        'lastPageLabel'  => '&raquo;',
	        'options' => ['class' => 'pagination'],
	        'linkOptions' => ['class' => 'page-link'],
	        'linkContainerOptions' => ['class' => 'page-item'],
	        'disabledPageCssClass' => ['class' => 'page-item'],
	        'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
	        'activePageCssClass' => ['class' => 'page-item active'],
        ],
    ]); ?>
</div>
<?php Pjax::end(); ?>
