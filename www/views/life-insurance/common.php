<?php
use app\assets\AppAsset;
use app\components\BreadcrumbsNew;
use app\widgets\Author;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\JqueryAsset;
use yii\widgets\Breadcrumbs;
use app\components\shortcodes\BreadcrumbsShortcode;

$isMobile = Yii::$app->params['devicedetect']['isMobile'];


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

$this->registerCssFile('@web/v2/life-insurance/css/life-insurance.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/main-first-screen.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
#$this->registerCssFile('@web/v2/pages/css/article.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/common.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/plugins/css/table-default.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerJsFile('@web/v2/plugins/js/tablesorter/jquery.tablesorter.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/life-insurance/js/life-insurance.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/', 'class' => 'breadcrumbs__link tags'];
//$this->params['breadcrumbs'][] = ['label' => $this->context->current_cat->title, 'url' => Url::toRoute('life-insurance/'), 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];

#$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/'];
$this->params['breadcrumbs'][$this->context->current_cat->url] = $this->context->current_cat->title;

#$breadcrumbs = Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);
#$authors_small = $this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);
#$authors_small_wd = '';//$this->render('/main/widgets/authors-small-wd.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);

#$db_time = strtotime($this->context->current_cat->updated);
#$file_time = filemtime(__FILE__);
#$updated_date = ($db_time > $file_time) ? $db_time : $file_time;

if(strstr($content, '<!-- pagebreak -->') !== false){
	$content = str_replace([
		'<p><!-- pagebreak --></p>',
		'<h2><!-- pagebreak --></h2>',
		'<h3><!-- pagebreak --></h3>'
	], '<!-- pagebreak -->', $content);
	$content = str_replace('<!-- pagebreak -->', '</div></div><div class="main-wrapp bg1"><div class="wrapp">', $content);
}
?>

<div class="main-wrapp bg1">
	<div class="wrapp first-section">
		<section class="life-insurance">
			<div class="life-insurance__nav breadcrumbs">
				<?=BreadcrumbsNew::widget(['links' => $this->params['breadcrumbs']]);?>
			</div>
			<div class="life-insurance__first-screen main-first-screen">
				<h1 class="main-first-screen__title heading-0"><?=$this->context->current_cat->title;?></h1>
				<div class="main-first-screen__advice">
					<?=Author::widget(['db_time' => $this->context->current_cat->updated, 'file_time' => filemtime(__FILE__)]);?>
				</div>
			</div>
		</section>
	</div>
</div>

<div class="main-wrapp bg1">
	<div class="wrapp">
		<?=Yii::$app->shortcodes->parse($content);?>
	</div>
</div>

<div class="main-wrapp bg1 pb-5"></div>
