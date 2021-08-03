<?php
use yii\helpers\VarDumper;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->registerMetaTag(['name' => 'description', 'content' => $item->meta_desc]);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->registerMetaTag(['name' => 'robots', 'content' => 'noindex']);
$this->title = $item->meta_title;

$this->params['breadcrumbs'][] = ['label' => 'FAQ', 'url' => '/faq/'];
$this->params['breadcrumbs'][] = $item->question;

$created = date('Y-m-d\TH:i\Z', strtotime($item->created));
$url = Url::base(true).'/faq/'.$item->slug.'/';

?>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "QAPage",
    "mainEntity": {
	    "@type": "Question",
	    "name": "<?=$item->question;?>",
	    "text": "<?=$item->question;?>",
	    "dateCreated": "<?=$created;?>",
	    "author": {
	        "@type": "Organization",
	        "name": "NoExam.com"
	    },
	    "answerCount": "1",
	    "upvoteCount": "1",
	    "acceptedAnswer": {
	        "@type": "Answer",
	        "text": "<?=strip_tags($item->answer);?>",
	        "dateCreated": "<?=$created;?>",
	        "upvoteCount": "1",
	        "url": "<?=$url;?>",
	        "author": {
	            "@type": "Person",
	            "name": "John Holloway"
	        }
	    }
    }
}
</script>
<div class="page-content page-wrapper">
	<section id="question_<?=$item->id;?>" class="container first trans_all w882">
		<div class="row">
			<div class="col-sm-12">
				<div class="question" role="question">
					<h1><?=$item->question;?></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="answer" role="answer">
					<?php if(!empty($item->answer_tpl)):?>
						<?=$this->render(str_replace('views/', '', $item->answer_tpl));?>
					<?php else:?>
						<?=$item->answer;?>
					<?php endif;?>
				</div>
				<?php if(!empty($item->links_area)):?>
				<div class="links">
					<?=$item->links_area;?>
				</div>
				<?php endif;?>
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
