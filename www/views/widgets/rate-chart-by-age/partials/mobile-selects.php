<div class="d-block d-md-none mb-3 mt-3">
	<div class="row">
		<div class="col-6">
			<label class="tags d-block">Ages</label>
			<select class="js_selectpicker" data-trigger="js_action_change" data-action="change_ages_tab" data-target="#js_<?=$id;?>_tab_content">
				<option value="ages-18-28">18-28</option>
				<option value="ages-29-39">29-39</option>
				<option value="ages-40-49">40-49</option>
				<option value="ages-50-59">50-59</option>
				<option value="ages-60-69">60-69</option>
				<option value="ages-70-74">70-74</option>
			</select>
		</div>
		<div class="col-6">
			<label class="tags d-block">Term</label>
			<select class="js_selectpicker" data-trigger="js_action_change" data-action="change_terms_tab" data-target="#js_invisible_tabs">
				<option value="10-year" <?php if($selected == '10-year'):?>selected="selected"<?php endif;?>>10 Years</option>
				<option value="15-year" <?php if($selected == '15-year'):?>selected="selected"<?php endif;?>>15 Years</option>
				<option value="20-year" <?php if($selected == '20-year'):?>selected="selected"<?php endif;?>>20 Years</option>
				<option value="30-year" <?php if($selected == '30-year'):?>selected="selected"<?php endif;?>>30 Years</option>
				<option value="universal" <?php if($selected == 'universal'):?>selected="selected"<?php endif;?>>Universal</option>
			</select>
		</div>
	</div>
</div>
