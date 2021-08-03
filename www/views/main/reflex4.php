<?php
use yii\helpers\Html;
?>

<form action="">
	<!-- <div class="scroll-bar"> -->
	<div class="sub-questions reflex">
				<?php $counter=1; foreach ($reflex as $key => $reflex_item):?>
					<div class="q-slide">
					<?php foreach ($reflex_item as $key => $reflex_item2):?>

						<div class="sub-question <?=($key==0)?'active':'';?>" data-type="<?=$reflex_item2->type?>" data-question="<?=$reflex_item2->id?>" data-answer="">
						  <div class="q-num"><?=$counter?></div>
						  <?php $counter++;?>
						  <div class="text"><?=$reflex_item2->text?></div>
							<div class="buttons">

			 					<?php if($answers = $reflex_item2->answer):?>

			 						<?php foreach ($answers as $key => $answer):?>


										<?php if($answer->type == 'text_field'):?>

								   			<div class="input select">  
												<?php echo Html::textInput($answer->xml_num,'',['autocomplete'=>'off']); ?>
		 									</div>
											<div class="btn btn-success btn-confirm">Confirm</div>
										<?php endif?>
		 								
		 								<?php if($answer->type == 'select'){
		 									$select[$answer->value] = $answer->text;
		 								}?>

		 							<?php endforeach?>

			 					<?php else:?>

								  <div class="yes-button reflex-button">Yes</div>
								  <div class="no-button reflex-button">No</div>
			 					<?php endif?>

			 					<?php if($select):?>
			 						<div class="input select">
			 							<?php echo Html::dropDownList('birth_country','',$select, ["prompt"=>"Please select","class"=>"selectpicker","data-size"=>"5"]); ?>
			 						</div>
									<div class="btn btn-success btn-confirm">Confirm</div>
			 						<?php unset($select);?>
			 					<?php endif?>
							</div>
				            
						</div>
					
					<?php endforeach?>
					</div>
				<?php ;endforeach?>
		
		</div>
	<!-- </div> -->
</form>