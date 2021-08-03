<?php

use app\components\Helpers;
use app\models\CompaniesFilter;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<a role="button" class="btn-close-filter trans_me hidden-sm hidden-md hidden-lg"></a>
<div id="result_count_label" class="result-label">Filter Results (<span><?=$dataProvider->getCount();?></span>)</div>
<?=Html::submitButton('Apply Filters', ['class' => 'btn btn-submit mob hidden-sm-hidden-md- hidden-lg', 'id' => 'submit_filter_mob']);?>
<?php $form = ActiveForm::begin([
	'id' => 'filter_form',
	'action' => '/companies-filter/get-companies/',
	'enableAjaxValidation' => false,
	'options' => ['class' => 'filter-form trans_all', 'data-autoload' => 0],
	'fieldConfig' => ['options' => ['tag' => false]]
]);?>
	<div id="filter_selected_items" class="filter-selected-items"></div>

	<div class="item">
		<div class="field">
		<label><?=$companies_filter::$filter_data[1]['caption'];?></label>
		<div class="our_ratings">
			<?=$form->field($companies_filter, 'filter_our_rating')->radioList(
				$companies_filter::$our_ratings_list,
				[
					'item' => function($index, $label, $name, $checked, $value) {
						$c = 5;
						$id = 'star-'.($c-$index);
						$checked = ($checked || $value == -1) ? 'checked="checked"' : '';
						$s_class = ($checked || $value == -1) ? 'class="checked"' : '';
						$return = '<span '.$s_class.'>';
						$return .= '<input type="radio" id="'.$id.'" name="'.$name.'" value="'.$value.'" '.$checked.' label="'.$label.'">';
						$return .= '<label for="'.$id.'" title="'.$label.'">';
						$return .= Helpers::get_svg_inline('stars_sprite_1_level.svg');
						$return .= '</label>';
						$return .= '</span>';
						return $return;
					},
					'class' => 'rating',
					'id' => 'or_item',
					'unselect' => null,
				])->label(false);?>
		</div>
		</div>
		<a href="<?=$companies_filter::$filter_links[1]['link_url'];?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$companies_filter::$filter_links[1]['link_title'];?></a>
	</div>
	<div class="item">
		<div class="field">
		<label><?=$companies_filter::$filter_data[2]['caption'];?></label>
		<?=$form->field($companies_filter, 'filter_types_offered')->checkboxList(
			$companies_filter::$types_offered_list,
			[
				'item' => function($index, $label, $name, $checked, $value){
					$id = str_replace(['[]', '[', ']'], ['', '_', '_'], strtolower($name)).$index;
					$checked = ($checked) ? 'checked="checked"' : '';
					$return = '<div class="filter-checkbox">';
					$return .= '<input type="checkbox" id="'.$id.'" name="'.str_replace('[]', '['.$value.']', $name).'" value="'.$value.'" '.$checked.' label="'.$label.'">';
					$return .= '<label for="'.$id.'">'.$label.'</label>';
					$return .= '</div>';

					return $return;
				},
				'unselect' => null,
			]
		)->label(false);?>
		</div>
		<a href="<?=$companies_filter::$filter_links[2]['link_url'];?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$companies_filter::$filter_links[2]['link_title'];?></a>
	</div>
	<div class="item">
		<div class="field">
		<label><?=$companies_filter::$filter_data[3]['caption'];?></label>
		<?=$form->field($companies_filter, 'filter_financial_strength')->checkboxList(
			$companies_filter::$financial_strength_list,
			[
				'item' => function($index, $label, $name, $checked, $value){
					$id = str_replace(['[]', '[', ']'], ['', '_', '_'], strtolower($name)).$index;
					$checked = ($checked) ? 'checked="checked"' : '';
					$return = '<div class="filter-checkbox">';
					$return .= '<input type="checkbox" id="'.$id.'" name="'.str_replace('[]', '['.$value.']', $name).'" value="'.$value.'" '.$checked.' label="'.$label.'">';
					$return .= '<label for="'.$id.'">'.$label.'</label>';
					$return .= '</div>';

					return $return;
				},
				'unselect' => null,
			]
		)->label(false);?>
		</div>
		<a href="<?=$companies_filter::$filter_links[3]['link_url'];?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$companies_filter::$filter_links[3]['link_title'];?></a>
	</div>
	<div class="item">
		<div class="field">
		<label><?=$companies_filter::$filter_data[4]['caption'];?></label>
		<?=$form->field($companies_filter, 'filter_underwriting_time')->checkboxList(
			$companies_filter::$underwriting_time_list,
			[
				'item' => function($index, $label, $name, $checked, $value){
					$id = str_replace(['[]', '[', ']'], ['', '_', '_'], strtolower($name)).$index;
					$checked = ($checked) ? 'checked="checked"' : '';
					$return = '<div class="filter-checkbox">';
					$return .= '<input type="checkbox" id="'.$id.'" name="'.str_replace('[]', '['.$value.']', $name).'" value="'.$value.'" '.$checked.' label="'.$label.'">';
					$return .= '<label for="'.$id.'">'.$label.'</label>';
					$return .= '</div>';

					return $return;
				},
				'unselect' => null,
			]
		)->label(false);?>
		</div>
		<a href="<?=$companies_filter::$filter_links[4]['link_url'];?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$companies_filter::$filter_links[4]['link_title'];?></a>
	</div>
	<div class="item">
		<div class="field">
		<label><?=$companies_filter::$filter_data[5]['caption'];?></label>
		<?=$form->field($companies_filter, 'filter_number_of_employees')->checkboxList(
			$companies_filter::$number_of_employees_list,
			[
				'item' => function($index, $label, $name, $checked, $value){
					$id = str_replace(['[]', '[', ']'], ['', '_', '_'], strtolower($name)).$index;
					$checked = ($checked) ? 'checked="checked"' : '';
					$return = '<div class="filter-checkbox">';
					$return .= '<input type="checkbox" id="'.$id.'" name="'.str_replace('[]', '['.$value.']', $name).'" value="'.$value.'" '.$checked.' label="'.$label.'">';
					$return .= '<label for="'.$id.'">'.$label.'</label>';
					$return .= '</div>';

					return $return;
				},
				'unselect' => null,
			]
		)->label(false);?>
		</div>
		<a href="<?=$companies_filter::$filter_links[5]['link_url'];?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$companies_filter::$filter_links[5]['link_title'];?></a>
	</div>
	<div class="item">
		<div class="field">
		<label><?=$companies_filter::$filter_data[6]['caption'];?></label>
		<?=$form->field($companies_filter, 'filter_state_availability')->dropDownList(
			$companies_filter::$states_short,
			[
				'class' => 'selectpicker form-control',
				'id' => 'filter_state',
				'data-size' => 6,
				'data-dropup-auto' => 'false',
				'data-style' => 'btn-default',
				'data-title' => 'Select State',
				'data-mobile' => (string)$isMobile,
			]
		)->label(false);?>
		</div>
		<a href="<?=$companies_filter::$filter_links[6]['link_url'];?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$companies_filter::$filter_links[6]['link_title'];?></a>
	</div>
	<div class="item">
		<div class="field">
		<label><?=$companies_filter::$filter_data[8]['caption'];?></label>
		<?=$form->field($companies_filter, 'filter_bbb_rating')->checkboxList(
			$companies_filter::$bbb_rating_list,
			[
				'item' => function($index, $label, $name, $checked, $value){
					$id = str_replace(['[]', '[', ']'], ['', '_', '_'], strtolower($name)).$index;
					$checked = ($checked) ? 'checked="checked"' : '';
					$return = '<div class="filter-checkbox">';
					$return .= '<input type="checkbox" id="'.$id.'" name="'.str_replace('[]', '['.$value.']', $name).'" value="'.$value.'" '.$checked.' label="'.$label.'">';
					$return .= '<label for="'.$id.'">'.$label.'</label>';
					$return .= '</div>';

					return $return;
				},
				'unselect' => null,
			]
		)->label(false);?>
		</div>
		<a href="<?=$companies_filter::$filter_links[8]['link_url'];?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$companies_filter::$filter_links[8]['link_title'];?></a>
	</div>
	<div class="item">
		<div class="field">
			<label><?=$companies_filter::$filter_data[9]['caption'];?></label>
			<?=$form->field($companies_filter, 'filter_company_age')->checkboxList(
				$companies_filter::$company_age_list,
				[
					'item' => function($index, $label, $name, $checked, $value){
						$id = str_replace(['[]', '[', ']'], ['', '_', '_'], strtolower($name)).$index;
						$checked = ($checked) ? 'checked="checked"' : '';
						$return = '<div class="filter-checkbox">';
						$return .= '<input type="checkbox" id="'.$id.'" name="'.str_replace('[]', '['.$value.']', $name).'" value="'.$value.'" '.$checked.' label="'.$label.'">';
						$return .= '<label for="'.$id.'">'.$label.'</label>';
						$return .= '</div>';

						return $return;
					},
					'unselect' => null,
				]
			)->label(false);?>
		</div>
		<a href="<?=$companies_filter::$filter_links[9]['link_url'];?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$companies_filter::$filter_links[9]['link_title'];?></a>
	</div>
	<div class="item">
		<div class="field">
			<label><?=$companies_filter::$filter_data[10]['caption'];?></label>
			<?=$form->field($companies_filter, 'filter_ways_to_buy')->checkboxList(
				$companies_filter::$ways_to_buy_list,
				[
					'item' => function($index, $label, $name, $checked, $value){
						$id = str_replace(['[]', '[', ']'], ['', '_', '_'], strtolower($name)).$index;
						$checked = ($checked) ? 'checked="checked"' : '';
						$return = '<div class="filter-checkbox">';
						$return .= '<input type="checkbox" id="'.$id.'" name="'.str_replace('[]', '['.$value.']', $name).'" value="'.$value.'" '.$checked.' label="'.$label.'">';
						$return .= '<label for="'.$id.'">'.$label.'</label>';
						$return .= '</div>';

						return $return;
					},
					'unselect' => null,
				]
			)->label(false);?>
		</div>
		<a href="<?=$companies_filter::$filter_links[10]['link_url'];?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$companies_filter::$filter_links[10]['link_title'];?></a>
	</div>
	<div class="item">
		<div class="field">
			<label><?=$companies_filter::$filter_data[11]['caption'];?></label>
			<?=$form->field($companies_filter, 'filter_prices_svailable')->checkboxList(
				$companies_filter::$prices_svailable_list,
				[
					'item' => function($index, $label, $name, $checked, $value){
						$id = str_replace(['[]', '[', ']'], ['', '_', '_'], strtolower($name)).$index;
						$checked = ($checked) ? 'checked="checked"' : '';
						$return = '<div class="filter-checkbox">';
						$return .= '<input type="checkbox" id="'.$id.'" name="'.str_replace('[]', '['.$value.']', $name).'" value="'.$value.'" '.$checked.' label="'.$label.'">';
						$return .= '<label for="'.$id.'">'.$label.'</label>';
						$return .= '</div>';

						return $return;
					},
					'unselect' => null,
				]
			)->label(false);?>
		</div>
		<a href="<?=$companies_filter::$filter_links[11]['link_url'];?>" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$companies_filter::$filter_links[11]['link_title'];?></a>
	</div>
	<div class="item hidden-xs">
		<?=Html::submitButton('Apply Filters', ['class' => 'btn btn-submit', 'id' => 'submit_filter']);?>
	</div>
	<div class="item hidden-sm-hidden-md- hidden-lg">
		<div class="divider h60"></div>
	</div>

<?php ActiveForm::end();?>
