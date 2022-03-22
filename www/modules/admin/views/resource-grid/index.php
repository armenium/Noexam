<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\grid\GridView;
use app\models\ResourcesGrid;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $catsModel app\models\ResourcesGrid */


$this->title = 'Resource Grids';
$this->params['breadcrumbs'][] = $this->title;

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
			[
				'attribute' => 'category_id',
				'content' => function($data){
					return $data->getCatName($data->category_id);
				},
			],
			'title',
			[
				'header' => $searchModel->attributeLabels()['txcolor'],
				'contentOptions' => ['class' => 'col-50'],
				'attribute' => 'txcolor',
				'filter'=> $txcolor_list,
				'filterOptions' => ['class' => ''],
				'content' => function($model, $key, $index, $column){
					$ret = '<span class="badge bg-info text-light">'.$model->txcolor.'</span>';

					return $ret;
				}
			],
			//'content:ntext',
			'link',
			[
				'header' => $searchModel->attributeLabels()['label'],
				'contentOptions' => ['class' => 'col-50'],
				'attribute' => 'label',
				'filter'=> $label_list,
				'filterOptions' => ['class' => ''],
				'content' => function($model, $key, $index, $column){
					$ret = '<span class="badge bg-info text-light">'.$model->label.'</span>';

					return $ret;
				}
			],
			[
				'attribute' => 'lbcolor',
				'format' => 'html',
				'value' => function($data){
					return (!empty($data->lbcolor)) ? Html::tag('div', $data->lbcolor, ['style' => 'padding:2px 5px; color:#000; background-color:'.$data->lbcolor.';']) : '';
				},
			],
			[
				'header' => $searchModel->attributeLabels()['placement'],
				'contentOptions' => ['class' => 'col-50'],
				'attribute' => 'placement',
				'filter'=> $placement_list,
				'filterOptions' => ['class' => ''],
				'content' => function($model, $key, $index, $column){
					$ret = '<span class="badge bg-info text-light">'.$model->placement.'</span>';

					return $ret;
				}
			],
			[
				'header' => 'BG Color',
				'attribute' => 'bgcolor',
				'format' => 'html',
				'value' => function($data){
					return (!empty($data->bgcolor)) ? Html::tag('div', $data->bgcolor, ['style' => 'padding:2px 5px; color:#000; background-color:'.$data->bgcolor.';']) : '';
				},
			],
			/*[
				'header' => 'BG Image',
				'attribute' => 'bgimage',
				'format' => 'html',
				'value' => function($data){
					return (!empty($data->bgimage)) ? Html::img($data->bgimage, ['width' => '70px']) : '';
				},
			],*/
			[
				'class' => 'yii\grid\ActionColumn',
				'header' => 'Actions',
				'contentOptions' => ['class' => 'actions-col col-140 trans_all'],
				'visible'=> Yii::$app->user->isGuest ? true : true,
				'template' => '{view}{update}{delete}',
				'buttons' => [
					'view' => function ($url, $model){
						$t = '/resource-grid/'.$model->id.'/view/';
						return Html::a('<span class="bi-eye"></span>', Url::to($t), ['title' => 'View', 'aria-label' => 'View', 'data-pjax' => '0']);
					},
					'update' => function ($url, $model){
						$t = '/resource-grid/'.$model->id.'/update/';
						return Html::a('<span class="bi-pencil"></span>', Url::to($t), ['title' => 'Update', 'aria-label' => 'Update', 'data-pjax' => '0']);
					},
					'delete' => function ($url, $model){
						$t = '/resource-grid/'.$model->id.'/delete/';
						return Html::a('<span class="bi-trash"></span>', Url::to($t), ['title' => 'Delete', 'aria-label' => 'Delete', 'data-pjax' => '0', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]);
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
