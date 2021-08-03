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

$this->registerCssFile('@web/css/companies-filter.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/js/companies-filter.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->registerMetaTag(['name' => 'robots', 'content' => 'noindex']);
$this->title = $page_title;
$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/'];
$this->params['breadcrumbs'][] = $this->title;


?>

<!-- BEGIN PAGE-HEADER -->
<section class="page-header">
	<div class="container text-center">
		<a role="button" class="btn-back hidden-sm hidden-md hidden-lg" href="<?=$back_link;?>" rel="noopener nofollow">&lsaquo; Filtered results (<span></span>)</a>
		<h1><?=$this->title;?></h1>
	</div>
	<div class="container custom">
		<ul id="myTabs" class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#comparisionresults" aria-controls="comparisionresults" role="tab" data-toggle="tab">Comparison Results</a></li>
			<li role="presentation" class=""><a id="howtochoose_tab" href="#howtochoose" aria-controls="howtochoose" role="tab" data-toggle="tab">How to Choose</a></li>
		</ul>
	</div>
</section>
<!-- END PAGE-HEADER -->
<!-- BEGIN PAGE-CONTENT -->
<div id="myTabContent" class="tab-content">
	<div role="tabpanel" class="tab-pane fade in active" id="comparisionresults">
		<section id="section_comparison_items" class="container-fluid comparison_items">
			<div class="loader trans_me"></div>

			<a role="button" class="btn-back hidden-xs" href="<?=$back_link;?>" rel="noopener nofollow">&lsaquo; Filtered results (<span></span>)</a>

			<article class="content trans_all">
				<?php #VarDumper::dump($items, 10, 1);?>

				<?php if(!empty($dataProvider)):?>
					<div class="headers hidden-xs">
						<div class="v-spacer"></div>
						<ul class="props">
							<?php if($has_customer):?>
							<li>
								<div class="title">Price</div>
								<a role="button" class="get-your-rate">Change coverage amount</a>
							</li>
							<?php endif;?>
							<?php foreach(CompaniesFilter::$filter_data as $k => $v):?>
								<?php
								if($k != 6): // 6 = State
									$link_url = CompaniesFilter::$filter_links[$k]['link_url'];
									$link_title = CompaniesFilter::$filter_links[$k]['link_title'];
								?>
								<li>
									<div class="title"><?=$v['caption'];?></div>
									<a href="<?=$link_url;?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$link_title;?></a>
								</li>
								<?php endif;?>
							<?php endforeach;?>
						</ul>
					</div>
					<div class="scroll-container">
					<?php foreach($dataProvider->getModels() as $model):?>
						<?php #VarDumper::dump($model, 10, 1);?>
						<?=$this->render('/main/partials/companies/item-compare.php', ['model' => $model]);?>
					<?php endforeach;?>
					</div>
				<?php endif;?>

			</article>

		</section>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="howtochoose">
		<section class="container page-content">
			<?=$this->render('/main/resources/companies-how-to-choose.php');?>
		</section>
	</div>
</div>

<!-- END PAGE-CONTENT -->
<!-- BEGIN PAGE-MODAL -->
<div id="rate-from-modal" class="rate-from-modal">
	<?=$this->render('/main/widgets/rate-form-modal.php');?>
</div>
<!-- END PAGE-MODAL -->
