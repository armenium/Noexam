<?php

$faq_items = Yii::$app->controller->getFaqs([$category]);
//VarDumper::dump($faq_items, 10, 1);
?>
<?php /*
<ul class="faq-list">
	<?php foreach($faq_items as $item):?>
	<li id="item_<?=$item->id;?>" class="item">
		<div class="question"><?=$item->question;?></div>
		<div class="answer">
			<?php if(!empty($item->answer_tpl)):?>
				<?=$this->render(str_replace('views/', '', $item->answer_tpl));?>
			<?php else:?>
				<?=$item->answer;?>
			<?php endif;?>
		</div>
	</li>
	<?php endforeach;?>
</ul>
*/?>

<div class="panel-group trans_all" id="faq_accordion" role="tablist" aria-multiselectable="true">
	<?php foreach($faq_items as $item):?>
	<div class="panel item">
		<div class="question" role="tab" id="heading_<?=$item->id;?>">
			<a role="button" data-toggle="collapse" data-parent="#faq_accordion" href="#collapse_<?=$item->id;?>" aria-expanded="false" aria-controls="collapse_<?=$item->id;?>">
				<?=$item->question;?>
			</a>
		</div>
		<div id="collapse_<?=$item->id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?=$item->id;?>">
			<div class="answer">
				<?php if(!empty($item->answer_tpl)):?>
					<?=$this->render(str_replace('views/', '', $item->answer_tpl));?>
				<?php else:?>
					<?=$item->answer;?>
				<?php endif;?>
			</div>
		</div>
	</div>
	<?php endforeach;?>
</div>

