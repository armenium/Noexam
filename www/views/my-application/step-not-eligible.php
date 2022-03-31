<?php

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\web\JqueryAsset;

/* @var $this yii\web\View */
$page_id = 'online-app-step-decline';

$this->title = 'Declined';
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$this->registerCssFile('@web/v2/my-application/css/online-app.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-application/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
#$this->registerJsFile('@web/v2/my-application/js/online-app.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
#$this->registerJsFile('@web/v2/my-application/js/'.$page_id.'.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
?>
<div class="main-wrapp bg0">
	<div class="wrapp">
		<section class="online-app-finish">
			<img src="/v2/my-application/img/dog-bg.png" alt="background" class="online-app-finish__img">
			<h1 class="online-app-finish__title heading-0">Unfortunately you do not qualify for this plan.</h1>
			<p class="online-app-finish__subtitle fontBodyL">Your Application has been declined.</p>
			<div class="online-app-finish__cards">
				<div class="online-app-finish__card">
					<img src="/v2/my-application/img/message-icon.png" alt="icon" class="online-app-finish__icon">
					<p class="online-app-finish__card-content fontBodyS">Thank you for interest in individual term life insurance.</p>
				</div>
				<div class="online-app-finish__card">
					<img src="/v2/my-application/img/phone-icon.png" alt="icon" class="online-app-finish__icon">
					<p class="online-app-finish__card-content fontBodyS">If you have any questions, our friendly agents are always happy to help. They can be reached at <a href="tel:8884070714">888-407-0714</a></p>
				</div>
			</div>

			<div class="online-app-finish__note quote-s">Thank you for your business, we look forward to serving you!</div>
		</section>
	</div>
</div>
