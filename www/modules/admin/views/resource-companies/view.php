<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ResourcesCompanies */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Resources Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resources-companies-view">


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
			        return '<span class="label label-danger">'.$data->id.'</span>';
		        },
	        ],
            'internal_code',
	        [
		        'attribute' => 'display_in_page',
		        'format' => 'html',
		        'value' => function($data){
			        $ret = '<span class="label label-danger">No</span>';
			        if($data->display_in_page){
				        $ret = '<span class="label label-warning">Yes</span>';
			        }
			        return $ret;
		        },
	        ],
	        [
		        'attribute' => 'best_company',
		        'format' => 'html',
		        'value' => function($data){
			        $ret = '<span class="label label-danger">No</span>';
			        if($data->best_company){
				        $ret = '<span class="label label-warning">Yes</span>';
			        }
			        return $ret;
		        },
	        ],
            'title',
            'slug',
	        [
		        'attribute' => 'logo',
		        'format' => 'html',
		        'value' => function($data){
			        return (!empty($data->logo)) ? Html::img($data->logo, ['width' => '100px']) : '';
		        },
	        ],
            'website',
            'phone',
            'year_founded',
            'current_ceo',
            'available',
            'address',
            'top_awards:ntext',
            'pros:ntext',
            'cons:ntext',
            'jd_power',
            'bbb',
            'am_best',
            'moodys',
            'fitch',
            'standard_poor',
            'comdex_score',
            'total_assets',
            'life_insurance_in_force',
            'types_of_insurance:ntext',
            'products_offered:ntext',
            'riders_available:ntext',
            'companys_field_1:ntext',
            'companys_field_2:ntext',
            'companys_field_3:ntext',
            'companys_field_4:ntext',
            'companys_field_5:ntext',
            'our_rating',
            'state_availability',
            'underwriting_time',
            'number_of_employees',
            'types_offered',
            'complaint_index',
            'financial_strength',
            'financial_strength_sorting',
            'most_popular',
	        [
		        'attribute' => 'ways_to_buy',
		        'format' => 'html',
		        'value' => function($data){
			        return '<span class="label label-warning">'.str_replace(',', '</span> <span class="label label-warning">', $data->ways_to_buy).'</span>';
		        },
	        ],
            'content:ntext',
        ],
    ]) ?>

</div>
