<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;


$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->title = 'Buy Life Insurance Online - Compare and Save';
?>
<div class="main-index">
	<?php //=$this->render('/main/widgets/home-page-form.php', []);?>
	<?php /*
	<section class="form-section2">
		<div class="form2 container">
			<?=$this->render('/main/widgets/apply-now-form.php', ['position' => 'center', 'width' => '100%', 'display_title' => false]);?>
		</div>
	</section>
	*/?>

	<?=$this->render('/main/partials/homepage/section-form3.php');?>

	<?=$this->render('/main/partials/homepage/section-logos.php');?>

	<?=$this->render('/main/partials/homepage/section-content-box.php');?>

	<?=$this->render('/main/partials/homepage/section-timeline.php');?>

	<?=$this->render('/main/partials/homepage/section-slider.php');?>

	<?=$this->render('/main/partials/homepage/section-percent.php');?>

	<?=$this->render('/main/partials/homepage/section-get-started.php');?>

	<?=$this->render('/main/partials/homepage/section-faq.php');?>
</div>
