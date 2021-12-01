<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resource Companies';
$this->params['breadcrumbs'][] = $this->title;
yii::$app->params['no_yes'] = [0 => 'No', 1 => 'Yes'];
?>
<?php Pjax::begin(); ?>
<div class="resources-companies-index">

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
	        //'internal_code',
            'title',
            //'slug',
	        'most_popular',
	        'our_rating',
	        'underwriting_time',
	        'number_of_employees',
	        'types_offered',
	        'complaint_index',
	        'financial_strength',
	        'financial_strength_sorting',
            //'logo',
            //'website',
            // 'phone',
            'year_founded',
            // 'current_ceo',
            // 'available',
            // 'address',
            // 'top_awards:ntext',
            // 'pros:ntext',
            // 'cons:ntext',
            // 'jd_power',
            'bbb',
            // 'am_best',
            // 'moodys',
            // 'fitch',
            // 'standard_poor',
            // 'comdex_score',
            // 'total_assets',
            // 'life_insurance_in_force',
            // 'types_of_insurance:ntext',
            // 'products_offered:ntext',
            // 'riders_available:ntext',
            [
				'contentOptions' => ['class' => 'col-50'],
				'attribute' => 'best_company',
				'filter'=> yii::$app->params['no_yes'],
				'filterOptions' => ['class' => ''],
				'content' => function($model, $key, $index, $column){
					$ret = '<span class="badge bg-danger text-light">No</span>';
					if($model->best_company){
						$ret = '<span class="badge bg-warning text-dark">Yes</span>';
					}
					return $ret;
				}
            ],

	        [
		        'class' => 'yii\grid\ActionColumn',
		        'header' => 'Actions',
		        'contentOptions' => ['class' => 'actions-col col-140 trans_all'],
		        'visible'=> Yii::$app->user->isGuest ? true : true,
		        'template' => '{view}{update}{delete}',
		        'buttons' => [
			        'view' => function ($url, $model){
				        $t = '/resource-companies/'.$model->id.'/view/';
				        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to($t), ['title' => 'View', 'aria-label' => 'View', 'data-pjax' => '0']);
			        },
			        'update' => function ($url, $model){
				        $t = '/resource-companies/'.$model->id.'/update/';
				        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to($t), ['title' => 'Update', 'aria-label' => 'Update', 'data-pjax' => '0']);
			        },
			        'delete' => function ($url, $model){
				        $t = '/resource-companies/'.$model->id.'/delete/';
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
    ]);?>
</div>
<?php Pjax::end();

