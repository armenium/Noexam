<?php
if(!isset($align)) $align = 'none';
if(!isset($image)) $image = 'icon';
if(!isset($width)) $width = 'auto';

?>
<section class="bio2 trans_all align-<?=$align;?>" style="width: <?=$width;?>;">
	<div class="image">
	<?php if($image == 'avatar'):?>
		<div class="avatar p1"></div>
		<div class="avatar p2"></div>
	<?php elseif($image == 'icon'):?>
		<div class="icon-sticker"></div>
	<?php endif;?>
	</div>
	<div class="about">
        Jonathan Holloway and Jonathan Fritz are both licensed life insurance agents. We created <a href="https://www.noexam.com/about/">NoExam.com</a> in 2013 and have since helped over 6,000 families get life insurance. We are both parents, and we understand how overwhelming it can feel to try to make sense of all the life insurance options available, so we try to minimize the legwork for our client base.
	</div>
</section>
