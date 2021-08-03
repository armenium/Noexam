<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ResourcesCats */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Resources Cats', 'url' => ['index']];
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

    <?=DetailView::widget([
        'model' => $model,
        'attributes' => [
	        [
		        'attribute' => 'id',
		        'format' => 'html',
		        'value' => function($data){
			        return '<span class="label label-danger">'.$data->id.'</span>';
		        },
	        ],
	        'title',
	        [
		        'attribute' => 'parent_id',
		        'format' => 'html',
		        'value' => function($data){
			        return '<span class="label label-success">'.$data->parent_id.'</span> '.$data->getCatName($data->parent_id);
		        },
	        ],
            'url',
            'header_title',
            'header_subtitle',
	        [
		        'attribute' => 'header_image',
		        'format' => 'html',
		        'value' => function($data){
			        return (!empty($data->header_image)) ? Html::img($data->header_image, ['width' => '200px']) : '';
		        },
	        ],
            'meta_title',
            'meta_desc',
	        'meta_keys',
	        'template',
	        'layout',
	        'item_order',
	        'child_to_parent_links',
	        [
		        'attribute' => 'custom_childs_links',
		        'format' => 'html',
		        'value' => function($data){
			        return '<span class="label label-warning">'.str_replace(',', '</span> <span class="label label-warning">', $data->custom_childs_links).'</span>';
		        },
	        ],
	        [
		        'attribute' => 'company_id',
		        'format' => 'html',
		        'value' => function($data){
			        return '<span class="label label-success">'.$data->company_id.'</span> '.$data->getCompanyName($data->company_id);
		        },
	        ],
	        [
		        'attribute' => 'is_companies_main_page',
		        'format' => 'html',
		        'value' => function($data){
			        $ret = '<span class="label label-danger">No</span>';
			        if($data->is_companies_main_page){
				        $ret = '<span class="label label-warning">Yes</span>';
			        }
			        return $ret;
		        },
	        ],
	        [
		        'attribute' => 'display_subpages_in_footer',
		        'format' => 'html',
		        'value' => function($data){
			        $ret = '<span class="label label-danger">No</span>';
			        if($data->display_subpages_in_footer){
				        $ret = '<span class="label label-warning">Yes</span>';
			        }
			        return $ret;
		        },
	        ],
        ],
    ]) ?>

</div>
