<div class="wrapp">
	<section class="rates-chart-by-age">
		<h2 class="rates-chart-by-age__title heading-2">UL Universal Life Insurance Quotes<br> Rate Chart By Age</h2>
		<p class="rates-chart-by-age__subtitle fontBodyL ">
			Universal life, or sometimes called lifetime coverage, is a policy that offers a level premium for life.
			A universal life policy will offer coverage to up to age 121.
			The death benefit is fixed.
		</p>
	
		<ul class="nav nav-tabs custom-tabs justify-content-center trans_all" id="js_<?=$id;?>_tab" role="tablist">
			<li class="nav-item text-center" role="presentation">
				<a class="nav-link active" id="<?=$id;?>-male-tab" data-toggle="tab" href="#<?=$id;?>-male" role="tab" aria-controls="<?=$id;?>-male" aria-selected="true">Male</a>
			</li>
			<li class="nav-item text-center" role="presentation">
				<a class="nav-link" id="<?=$id;?>-female-tab" data-toggle="tab" href="#<?=$id;?>-female" role="tab" aria-controls="<?=$id;?>-female" aria-selected="false">Female</a>
			</li>
		</ul>
		
		<?=$this->render('/widgets/'.$main_dir.'/partials/mobile-selects.php', ['id' => $id, 'selected' => $view_dir]);?>

		<div class="tab-content custom-tab-content" id="js_<?=$id;?>_tab_content">
			<div class="gender-tab tab-pane fade show active" id="<?=$id;?>-male" role="tabpanel" aria-labelledby="<?=$id;?>-male-tab">
				<?=$this->render('/widgets/'.$main_dir.'/'.$view_dir.'/male.php', ['id' => $id, 'main_dir' => $main_dir, 'view_dir' => $view_dir]);?>
			</div>
			<div class="gender-tab tab-pane fade" id="<?=$id;?>-female" role="tabpanel" aria-labelledby="<?=$id;?>-female-tab">
				<?=$this->render('/widgets/'.$main_dir.'/'.$view_dir.'/female.php', ['id' => $id, 'main_dir' => $main_dir, 'view_dir' => $view_dir]);?>
			</div>
		</div>
	
		<p class="rate-chart-by-age-desc fontBodyS">* Quotes are presented in a monthly premium format. The above quotes are for a non-smoker in excellent health and are subject to changes.</p>

	</section>
</div>
