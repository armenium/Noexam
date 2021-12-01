<?php

use app\modules\admin\controllers\AdminController;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use app\modules\admin\components\AdminNavBar;
use app\modules\admin\components\AdminBreadcrumbs;

$layout_class = AdminController::getLayoutClass();
?>

<?php if($is_admin):?>
	<header>
		<?php
		AdminNavBar::begin([
			'brandLabel' => 'Admin Home',
			'brandOptions' => ['class' => 'navbar-brand'],
			'brandUrl' => Url::to(['/admin/']),
			'options' => [
				'class' => 'navbar navbar-expand-lg navbar-dark bg-dark',
			],
		]);
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav mr-auto'],
			'items' => [
				[
					'label' => 'Resource',
					'items' => [
						['label' => 'Pages', 'url' => ['/resource-cats'], 'options' => ['class' => 'nav-item'], 'linkOptions' => ['class' => 'nav-link']],
						['label' => 'Grids', 'url' => ['/resource-grid'], 'options' => ['class' => 'nav-item'], 'linkOptions' => ['class' => 'nav-link']],
						['label' => 'Companies', 'url' => ['/resource-companies'], 'options' => ['class' => 'nav-item'], 'linkOptions' => ['class' => 'nav-link']],
						['label' => 'Comparisons', 'url' => ['/resource-compare'], 'options' => ['class' => 'nav-item'], 'linkOptions' => ['class' => 'nav-link']],
						//['label' => 'Resources', 'url' => ['/resources']],
					],
					'options' => ['class' => 'nav-item'],
					'dropDownOptions' => ['class' => 'nav-item dropdown'],
					'linkOptions' => ['class' => 'nav-link dropdown-toggle']
				],
				['label' => 'FAQs', 'url' => ['/faqs'], 'options' => ['class' => 'nav-item'], 'linkOptions' => ['class' => 'nav-link']],
			],
		]);
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => [
				['label' => 'Logout', 'url' => ['/admin/auth/logout'], 'options' => ['class' => 'nav-item'], 'linkOptions' => ['class' => 'nav-link']],
			],
		]);
		AdminNavBar::end();
		?>
	</header>
	<section class="<?=$layout_class;?>">
		<?=AdminBreadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]);?>
	</section>
<?php else:?>
	<header>
		<div class="container">
			<nav>
				<div class="logo"></div>
				<div class="title"><span class="gt">Admin</span> <span class="bt">Area</span></div>
			</nav>
		</div>
	</header>
<?php endif;?>
