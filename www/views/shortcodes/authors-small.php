<?php
use app\widgets\Author;
?>
<div class="main-wrapp bg1">
	<div class="wrapp">
		<div class="main-first-screen__advice">
			<?=Author::widget(['db_time' => $updated_date, 'file_time' => $file_time]);?>
		</div>
	</div>
</div>
