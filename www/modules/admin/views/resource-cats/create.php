<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ResourcesGrid */

$this->title = 'Create Resources Page';
$this->params['breadcrumbs'][] = ['label' => 'Resource Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="resources-grid-create">

    <h2 class="title"><?= Html::encode($this->title);?></h2>

	<?=$this->render('_form', ['model' => $model, 'resources_companies' => $resources_companies]);?>

</div>
