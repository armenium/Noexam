<?php
use yii\bootstrap\Nav;

$nav_items = [
    ['label' => 'Home', 'url' => ['/']],
    //['label' => 'Blog', 'url' => ['/main/test']],
    //['label' => 'No Exam Life Insurance', 'url' => ['https://noexam.staging.wpengine.com/companies/']],
    ['label' => 'Companies', 'items' => [
        ['label' => 'Best Life Insurance Companies', 'url' => ['/life-insurance/companies/']],
        ['label' => 'No Exam Life Insurance', 'url' => ['/life-insurance/companies/no-exam/']],
        ['label' => 'For Smokers', 'url' => ['/life-insurance/companies/smokers/']],
        ['label' => 'Mutual Life Insurance Companies', 'url' => ['/life-insurance/companies/mutual/']],
        ['label' => 'Ladder Life', 'url' => ['/life-insurance/companies/ladder/']],
        ['label' => 'Ethos', 'url' => ['/life-insurance/companies/ethos/']],
        ['label' => 'Health IQ', 'url' => ['/life-insurance/companies/health-iq/']],
        ['label' => 'AIG', 'url' => ['/life-insurance/companies/aig/']],
        ['label' => 'Mutual of Omaha', 'url' => ['/life-insurance/companies/mutual-of-omaha/']],
    ]],
    ['label' => 'Life Insurance', 'items' => [
        ['label' => 'Types of Life Insurance', 'url' => ['/life-insurance/types/']],
        ['label' => 'Term Life Insurance', 'url' => ['/life-insurance/term/']],
        ['label' => 'Whole Life Insurance', 'url' => ['/life-insurance/whole/']],
        ['label' => 'Term vs Whole Life', 'url' => ['/life-insurance/term-vs-whole/']],
        ['label' => 'Guaranteed Issue', 'url' => ['/life-insurance/guaranteed-issue/']],
        ['label' => 'Burial Insurance', 'url' => ['/life-insurance/burial-insurance/']],
        ['label' => 'Mortgage Life Insurance', 'url' => ['/life-insurance/mortgage/']],
        ['label' => 'Statistics', 'url' => ['/life-insurance/statistics/']],
    ]],
    ['label' => 'Life Insurance Quotes', 'items' => [
        ['label' => 'Get a Quote', 'url' => ['/apply-now/'], 'options' => ['class' => 'nav-btn-item separated hidden-xs'], 'linkOptions' => ['class' => 'nav-btn']],
        ['label' => 'Life Insurance Rates', 'url' => ['/life-insurance/term/rates/']],
        ['label' => 'Life Insurance Calculator', 'url' => ['/life-insurance/how-much-coverage/']],
        ['label' => 'Cheap Life Insurance', 'url' => ['/life-insurance/cheap/']],
	    ['label' => 'Get a Quote', 'url' => ['/apply-now/'], 'options' => ['class' => 'hidden-lg hidden-md hidden-sm'], 'linkOptions' => ['class' => 'nav-btn']],
    ]],
];
?>
<nav class="header-nav">
	<div class="container navbar hidden-xs">
		<div class="row">
			<div class="col-md-2 col-sm-3 full-height">
				<div class="logo"></div>
			</div>
			<div class="col-md-8 col-sm-6 full-height text-center trans_all">
				<?=Nav::widget(['options' => ['class' => 'navbar-nav'], 'items' => $nav_items]);?>
			</div>
			<div class="col-md-2 col-xs-3 full-height">
				<div class="phone pull-right">888.407.0714</div>
			</div>
		</div>
	</div>

	<div class="noexam-logo center-block hidden-xs"></div>

	<div class="navbar-mobile hidden visible-xs">
		<div class="head">
			<a href="javascript:void(0)" id="menu-btn" class="menu-btn menu-icon button">
				<span></span>
				<span></span>
				<span></span>
			</a>
			<div class="logo"></div>

		</div>
	</div>
</nav>
<div class="mob-menu trans_all">
	<?=Nav::widget(['options' => ['class' => 'navbar-nav'], 'items' => $nav_items]);?>
	<div class="phone">888.407.0714</div>
</div>
<div class="mob-overlay trans_me"></div>
