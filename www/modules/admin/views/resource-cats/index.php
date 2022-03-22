<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;
use app\models\ResourcesCats;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\assets\AppAsset;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Resource Pages';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'class' => 'breadcrumb-item active'];

yii::$app->params['child_to_parent_links'] = ['0' => 'No', '1' => 'Yes'];

?>
<?php Pjax::begin(); ?>
<div class="resources-grid-index">

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

			[
				'attribute' => 'id',
				'contentOptions' => ['class' => 'col-50'],
				'content' => function($data){
					return '<span class="badge bg-success text-light">'.$data->id.'</span>';
				},
			],
			'title',
			[
				'attribute' => 'parent_id',
				'content' => function($data){
					if($data->parent_id){
						return '<span class="badge bg-success text-light">'.$data->parent_id.'</span> '.$data->getCatName($data->parent_id);
					}else{
						return '<span class="badge bg-secondary text-light">Top level</span>';
					}
				},
			],
			'url' => [
				'attribute' => 'url',
				'content' => function($model, $key, $index, $column){
					return '<a href="'.$model->url.'" target="_new">'.$model->url.'</a>';
				}
			],
			//'meta_title',
			//'meta_desc',
			//'meta_keys',
			//'template',
			//'layout',
			[
				'attribute' => 'item_order',
				'header' => 'Order',
				'contentOptions' => ['class' => 'col-50'],
				'content' => function($data){
					return '<span class="badge bg-info text-light">'.$data->item_order.'</span>';
				},
			],
			[
				'header' => 'R-links',
				'contentOptions' => ['class' => 'col-50'],
				'attribute' => 'child_to_parent_links',
				'filter'=> yii::$app->params['child_to_parent_links'],
				'filterOptions' => ['class' => ''],
				'content' => function($model, $key, $index, $column){
					$ret = '<span class="badge bg-danger text-light">No</span>';
					if($model->child_to_parent_links){
						$ret = '<span class="badge bg-warning text-dark">Yes</span>';
					}
					return $ret;
				}
			],
			[
				'attribute' => 'company_id',
				'format' => 'html',
				'value' => function($data){
					return '<span class="badge bg-success text-light">'.$data->company_id.'</span> '.$data->getCompanyName($data->company_id);
				},
			],
			[
				'class' => 'yii\grid\ActionColumn',
				'header' => 'Actions',
				//'filterOptions' => ['template' => '<button>Button</button>'],
				//'filterOptions' => ['prompt' => 'All educations', 'class' => 'form-control', 'id' => null],
				'contentOptions' => ['class' => 'actions-col col-140 trans_all'],
				'visible'=> Yii::$app->user->isGuest ? true : true,
				'template' => '{view}{update}{remove}{import}{compare}{export}',
				'buttons' => [
					'view' => function ($url, $model){
						$t = '/resource-cats/'.$model->id.'/view/';
					    return Html::a('<span class="bi-eye"></span>', Url::to($t), ['title' => 'View', 'aria-label' => 'View', 'data-pjax' => '0']);
				    },
					'update' => function ($url, $model){
					    $t = '/resource-cats/'.$model->id.'/update/';
					    return Html::a('<span class="bi-pencil"></span>', Url::to($t), ['title' => 'Update', 'aria-label' => 'Update', 'data-pjax' => '0']);
				    },
					'remove' => function ($url, $model){
					    $t = '/resource-cats/'.$model->id.'/delete/';
					    return Html::a('<span class="bi-trash"></span>', Url::to($t), ['title' => 'Delete', 'aria-label' => 'Delete', 'data-pjax' => '0', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]);
				    },
					/*'import' => function ($url, $model){
					    $t = '/resource-cats/'.$model->id.'/import/';
					    return Html::a('<span class="bi-import"></span>', Url::to($t), ['title' => 'Import', 'aria-label' => 'Import', 'data-pjax' => '0', 'data' => ['confirm' => 'Are you sure you want to import this item?', 'method' => 'post']]);
				    },
					'compare' => function ($url, $model){
					    $t = '/resource-cats/'.$model->id.'/compare/';
					    return Html::a('<span class="bi-transfer"></span>', Url::to($t), ['title' => 'Compare', 'aria-label' => 'Compare', 'data-pjax' => '0']);
				    },
					'export' => function ($url, $model){
					    $t = '/resource-cats/'.$model->id.'/export/';
					    return Html::a('<span class="bi-export"></span>', Url::to($t), ['title' => 'Export', 'aria-label' => 'Export', 'data-pjax' => '0', 'data' => ['confirm' => 'Are you sure you want to export this item?', 'method' => 'post']]);
				    },*/
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
	]);
	?>

</div>
<?php Pjax::end(); ?>

