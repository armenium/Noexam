<?php
use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\VarDumper;
use yii\widgets\Breadcrumbs;
use app\components\shortcodes\BreadcrumbsShortcode;

$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$this->registerCssFile('@web/css/table-default.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

if(!empty($this->context->current_cat->meta_desc)){
	$this->registerMetaTag(['name' => 'description', 'content' => $this->context->current_cat->meta_desc]);
}
if(!empty($this->context->current_cat->meta_keys)){
	$this->registerMetaTag(['name' => 'keywords', 'content' => $this->context->current_cat->meta_keys]);
}
if(!empty($this->context->current_cat->meta_title)){
	$this->title = $this->context->current_cat->meta_title;
}else{
	$this->title = $this->context->current_cat->title;
}
$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/'];
$this->params['breadcrumbs'][] = $this->context->current_cat->title;

#$breadcrumbs = Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);
#$authors_small = $this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);
#$authors_small_wd = '';//$this->render('/main/widgets/authors-small-wd.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);

#$db_time = strtotime($this->context->current_cat->updated);
#$file_time = filemtime(__FILE__);
#$updated_date = ($db_time > $file_time) ? $db_time : $file_time;
?>
<div class="page-content page-wrapper trans_all">


	<!-- START PAGE-CONTENT -->
	<section class="page">
		<article class="content">
			<?=Yii::$app->shortcodes->parse($content);?>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->
	<?php /*
	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
    */?>
</div>

