<?php

use app\assets\AppAsset;
use app\components\BreadcrumbsNew;
use app\widgets\Author;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$this->registerCssFile('@web/v2/common/css/get-started.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/pages/css/article.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->title = 'Buy Life Insurance Online - Help';
$this->params['breadcrumbs'][] = ['label' => 'Help', 'url' => Url::toRoute('help/'), 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];

?>
<article class="main-wrapp">
	<div class="wrapp mb-4">
		<?=BreadcrumbsNew::widget(['links' => $this->params['breadcrumbs']]);?>
	</div>
	
	<section>
		<h1 class="heading-0">Help Center</h1>
		<?=Author::widget(['db_time' => '2021-12-03', 'file_time' => filemtime(__FILE__)]);?>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	</section>
</article>

<?=$this->render('sections/home/get-started.php');?>
