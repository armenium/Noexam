<?php
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->registerMetaTag(['name' => 'robots', 'content' => 'noindex']);
$this->title = 'FAQ';

?>
<div class="page-content page-wrapper">
	<section class="container first trans_all w882">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h1 class="title">Frequently Asked Questions<span class="badge"><?=$count;?></span></h1>
			</div>
		</div>
		<div class="row">
			<div class= "col-sm-12">

				<?php foreach($dataProvider as $item):?>
					<div class="question" role="question" id="question_<?=$item->id;?>">
						<a href="/faq/<?=$item->slug;?>/"><?=$item->question;?></a>
					</div>
				<?php endforeach;?>

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
