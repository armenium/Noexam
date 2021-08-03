<?php

use app\modules\admin\controllers\AdminController;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$layout_class = AdminController::getLayoutClass();
?>

<?php if($is_admin):?>
	<header>
		<?php
		NavBar::begin([
			'brandLabel' => 'Admin Home',
			'brandUrl' => Url::to(['/admin/']),
			'options' => [
				'class' => 'navbar-inverse',
			],
		]);
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav'],
			'items' => [
				[
					'label' => 'Resource',
					'items' => [
						['label' => 'Pages', 'url' => ['/resource-cats']],
						['label' => 'Grids', 'url' => ['/resource-grid']],
						['label' => 'Companies', 'url' => ['/resource-companies']],
						['label' => 'Comparisons', 'url' => ['/resource-compare']],
						//['label' => 'Resources', 'url' => ['/resources']],
					],
				],
				['label' => 'FAQs', 'url' => ['/faqs']],
			],
		]);
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => [
				['label' => 'Logout', 'url' => ['/admin/auth/logout']],
			],
		]);
		NavBar::end();
		?>
	</header>
	<div class="<?=$layout_class;?>">
		<?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]);?>
	</div>
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
