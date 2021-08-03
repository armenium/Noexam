<?php

use app\components\Helpers;

?>
<section id="<?=$id;?>" class="compare-panel trans_all" data-src="<?=$src;?>">
	<div class="inner">
		<div class="title-bar">Compare up to 4 companies <?=Helpers::get_svg_inline('icons/arrow-down.svg');?></div>
		<div class="compare_items item-container"></div>
		<button role="button" type="button" class="btn btn-compare" disabled="disabled">Compare now!</button>
		<button role="button" type="button" class="btn btn-clear hidden-xs">Remove all</button>
		<button role="button" type="button" class="btn btn-back-to-top hidden-xs">Back to top</button>
	</div>
</section>
