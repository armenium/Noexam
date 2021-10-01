<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\widgets\Breadcrumbs;
?>

<div class="main-wrapp" style="background-color: #FCF9F3;">
	<div class="wrapp">
		<section class="about-first-screen">
			<div class="about-first-screen__nav breadcrumbs">
				<?=Breadcrumbs::widget([
					'options' => ['class' => 'breadcrumbs__list'],
					'itemTemplate' => '<li class="breadcrumbs__item">{link}</li>', // шаблон для всех ссылок
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []
				]);?>
				<ul class="breadcrumbs__list">
					<li class="breadcrumbs__item"><a href="#" class="breadcrumbs__link tags">Home</a></li>
					<li class="breadcrumbs__item"><a href="#" class="breadcrumbs__link tags breadcrumbs__link--active">About</a></li>
				</ul>
			</div>
			<div class="about-first-screen__body">
				<div class="about-first-screen__subtitle sub-title-2">About us</div>
				<h1 class="about-first-screen__title heading-0">Buying Life Insurance Just Got Easier</h1>
				<p class="about-first-screen__text fontBodyM">Welcome to the new era of buying life insurance. Our state-of-the-art technology allows for individuals and families to shop for and buy life insurance online within a matter of minutes.</p>
				<img src="/v2/pages/img/about-first-screen-bg.png" alt="background image" class="about-first-screen__bgImg">
			</div>
		</section>
	</div>
</div>
