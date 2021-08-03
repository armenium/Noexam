

<div class="scroll-bar"><div class="sub-questions reflex">
		<form action="">
			<div class="q-slide">
			<?php foreach ($choise as $key => $value):?>
				<div class="sub-question active" data-type="reflex" data-question="<?=$question_item->id?>" data-subquestion="1" data-reflex="0" data-question-id="<?=$question_item->id?>" data-answer="">
				  <div class="q-num">1</div>
				  <div class="text">When did you last use this <?=$value?>?</div>
				   <div class="input select cigarettes">  
		                <select name="<?=$key?>_select" id="<?=$key?>" class="selectpicker <?=$key?>" data-style="btn-info">
		                  <option value="0" selected>Within the last 12 months?</option>
		                  <option value="1">More than 13 months to 24 months ago?</option>
		                  <option value="2">More than 24 months to 36 months ago?"</option>
		                  <option value="3">More than 36 months to 5 years ago?"</option>
		                  <option value="4">More than 5 years ago?</option>
		                </select>  
		            </div>
				</div>
			<?php endforeach?>
	
			</div>
		</form>
	</div>
</div>