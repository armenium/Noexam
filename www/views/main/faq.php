<?php
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->title = 'FAQ';

?>
<div class="page-content page-wrapper">
	<section class="container first w882">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="title">Frequently Asked Questions</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?=$this->render('templates/faq-list', ['category' => 'faqpage']);?>
			</div>
		</div>
	</section>

	<section class="get-started-section">
		<div class="container get-started">
			<div class="question-block">
				<div class="question">Ready to get started?</div>
				<div class="answer">Automated underwriting allows you to receive an immediate decision on your life insurance application.1</div>
			</div>
		</div>
		<div class="button active">
			<a href="/apply-now/" class="btn btn-success btn-lg">Apply Now</a>
		</div>
	</section>
</div>
