<?php

use app\assets\AppAsset;
use app\components\Helpers;
use app\models\CompaniesFilter;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;
use yii\helpers\Html;

$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$this->registerCss(".page-header {background-image: url(".$this->context->current_cat->header_image.");}");
$this->registerCssFile('@web/css/companies-filter.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/js/companies-filter.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

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

$companies_filter = new CompaniesFilter();

#VarDumper::dump($companies_data, 10, 1);

?>

<!-- BEGIN PAGE-HEADER -->
<section class="page-header">
	<div class="container text-center">
		<h1><?=$this->context->current_cat->header_title;?></h1>
		<h2><?=$this->context->current_cat->header_subtitle;?></h2>
	</div>
	<div class="container custom">
		<ul id="myTabs" class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#bestcompanies" aria-controls="bestcompanies" role="tab" data-toggle="tab">Best Companies</a></li>
			<li role="presentation" class=""><a id="allcompanies_tab" href="#allcompanies" aria-controls="allcompanies" role="tab" data-toggle="tab">All Companies</a></li>
		</ul>
	</div>
</section>
<!-- END PAGE-HEADER -->
<!-- BEGIN PAGE-CONTENT -->
<div id="myTabContent" class="tab-content">
	<div role="tabpanel" class="tab-pane fade in active" id="bestcompanies">
		<section id="section_best_companies" class="container page-content best-companies">
			<?=$this->render('/main/resources/companies-how-to-choose.php', ['dataProviderBest' => $dataProviderBest]);?>
		</section>
		<?=$this->render('/main/partials/companies/compare-panel.php', ['id' => 'best_compare_panel', 'src' => 'best']);?>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="allcompanies">
		<section id="section_companies_filter" class="container custom companies_filter">
			<div class="loader trans_me"></div>

			<aside class="filter trans_me">
				<div class="sticky-block">
					<?=$this->render('/main/partials/companies/filter-form.php', ['companies_filter' => $companies_filter, 'dataProvider' => $dataProvider]);?>
				</div>
			</aside>

			<article class="content trans_all">
				<div class="row">
					<div class="col-sm-4 author-col">
						<?=$this->render('/main/widgets/authors-small-cf.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
						<h2 class="t2 hidden-xs">About NoExam.com</h2>
						<p class="hidden-xs">NoExam.com is a licensed life insurance brokerage founded in 2013. We have over <a href="https://www.shopperapproved.com/reviews/noexam.com" rel="noopener nofollow">1000 positive reviews</a> on 3rd party review sites from verified customers.</p>
					</div>
					<div class="col-sm-8">
						<h2 class="t1 hidden-xs">All Life Insurance Companies</h2>
						<p>Sometimes you want to do your own research. For this reason, we have a complete list of all the major life insurance companies. Use this tool to sort and compare companies based on price, financial strength, product offering, and more. </p>
						<p>Some of the life insurance companies on this page pay NoExam.com a commission if you decide to apply through us. We also include companies that we have no affiliation with whatsoever. Our goal is to provide shoppers with an unbiased list of the top-rated life insurance companies.</p>
						<h2 class="t1 hidden-sm hidden-md hidden-lg">All Life Insurance Companies</h2>
					</div>
				</div>

				<div class="row tool-box">
					<div class="col-xs-6 hidden-sm hidden-md hidden-lg">
						<a role="button" class="btn-toggle-filter">Filter Results (<span><?=$dataProvider->getCount();?></span>)</a>
					</div>
					<div class="col-sm-12 col-xs-6">
						<label class="sort-label">Sort by</label>
						<?=Html::dropDownList('sort_by', 3, $companies_filter::$sort_list, [
							'class' => 'selectpicker',
							'id' => 'sorting',
							'data-style' => 'btn-default',
							'data-title' => 'Sorting',
							'data-mobile' => (string)$isMobile
						]);?>
					</div>
				</div>

				<div id="filter_results" class="c-items">
					<?=$this->render('/main/partials/companies/items.php', ['dataProvider' => $dataProvider]);?>
				</div>

			</article>
		</section>
		<?=$this->render('/main/partials/companies/compare-panel.php', ['id' => 'compare_panel', 'src' => 'main']);?>
	</div>
</div>
<!-- END PAGE-CONTENT -->
<!-- BEGIN PAGE-FOOTER -->
<!-- END PAGE-FOOTER -->
<!-- BEGIN PAGE-MODAL -->
<div id="rate-from-modal" class="rate-from-modal">
	<?=$this->render('/main/widgets/rate-form-modal.php');?>
</div>
<!-- END PAGE-MODAL -->
