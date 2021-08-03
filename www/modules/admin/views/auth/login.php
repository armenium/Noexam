<?php
/*
 * View-шаблон, файл modules/admin/views/auth/login.php
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Authentication';
?>

<div class="container">
	<?php $form = ActiveForm::begin(['options' => ['class' => 'auth-form']]);?>
	<?=$form->field($model, 'email')->input('email', ['placeholder' => 'Email'])->label(false);?>
	<?=$form->field($model, 'password')->input('password', ['placeholder' => 'Password'])->label(false);?>
	<div class="form-group text-center">
		<?=Html::submitButton('Login', ['class' => 'btn btn-primary']);?>
	</div>
	<?php ActiveForm::end();?>

	<div class="guest-text badge-noexam">
		<p>If you do not belong to our company staff, please leave this page and go to the <a href="/">main page</a> of the site.</p>
		<p>Our site contains plenty of insightful information you can use for ensuring your life and lives of those you care for.</p>
		<p>Thank you</p>
	</div>
</div>