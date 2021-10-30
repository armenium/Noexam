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
				<option value="10-year">10 Years</option>
				<option value="15-year">15 Years</option>
				<option value="20-year">20 Years</option>
				<option value="30-year">30 Years</option>
				<option value="universal">Universal</option>
			</select>
		</div>
	</div>
</div>
