$(document).ready(function(){
	"use strict";

	var RATE_CALC = {
		autoscroll: false,
		rating_selected_value: '',
		rc_form: null,
		rc_form2: null,
		init: function(){
			this.autoscroll = true;
			this.rating_selected_value = '';
			//this.rc_form = $(document).find('#rate-calc-form');
			this.rc_form = $('#rate-calc-form').length ? $('#rate-calc-form') : null;
			//this.range_slider_init();
			if(this.rc_form.data('autoscroll') != undefined){
				this.autoscroll = this.rc_form.data('autoscroll');
			}
			if(this.rc_form.data('autoload')){
				switch(this.rc_form.data('view')){
					case "list":
						if(FJS.vars.ww > 768){
							this.rc_form
								.find('#rc_m').trigger('click').end()
								.find('#rc_15').trigger('click').end()
								.find('#star-4').trigger('click');
						}
						break;
					case "product":
						break;
					case "table":
						if(this.rc_form.data('autoload') == 'ajax'){
							setTimeout(function(){
								RATE_CALC.rc_form.trigger('submit');
							}, 100);
						}

						/*if($("table.plans-table").length){
							$("table.plans-table tbody td").not(":nth-child(1)").colorize({
								themes: {
									"default": {
										color_max: "#c81e00",
										color_mid: "#c8c800",
										color_min: "#50c800"
									},
								}
							});
						}*/
						break;
				}
			}
		},
		form_input_radio_click: function(){
			$(this).parents('.el').find('.el_lbl').removeClass('error');
		},
		form_rating_input_radio_events: function(e){
			var $selected_health_lbl = $(this).parents('.healths').find('.selected-health-lbl');
			var userRating = $(this).val();
			var userRatingLabel = $(this).attr('label');
			switch(e.type){
				case 'click':
					$(".rating span").removeClass('checked');
					$(this).parent().addClass('checked');
					break;
				case 'change':
					$selected_health_lbl.html(userRatingLabel);
					this.rating_selected_value = userRatingLabel;
					break;
				case 'mouseover':
					$selected_health_lbl.html(userRatingLabel);
					break;
				case 'mouseout':
					if(this.rating_selected_value == ''){
						$selected_health_lbl.html('&nbsp;');
					}else{
						$selected_health_lbl.html(this.rating_selected_value);
					}
					break;
			}
		},
		guess_price_input: function(){
			this.value = this.value.replace(/[^\d]/, '');
			//console.log(this.value);
			if(this.value > 1000){
				this.value = '';
				$('.guess-price-error').addClass('show');
				setTimeout(function(){
					$('.guess-price-error').removeClass('show');
				}, 5000);
			}
			if(this.value < 0){
				this.value = '';
			}
		},
		range_slider_init: function(){
			var $coverage_amount_lbl = $(".js-range-slider").parent('div').find('.coverage-amount-lbl');
			$coverage_amount_lbl.text('$250,000');
			$(".js-range-slider").ionRangeSlider({
				extra_classes: '',
				skin: "ground",
				prefix: "$",
				prettify_separator: ",",
				grid: false,
				grid_margin: true,
				grid_num: 2,
				grid_snap: true,
				decorate_both: true,
				hide_from_to: true,
				hide_min_max: false,
				force_edges: false,
				drag_interval: false,
				from: 2,
				onStart: function(data){
					// fired then range slider is ready
				},
				onChange: function(data){
					//$('#avarage_amount').val(data.from);
					var v = data.from_value.toString();
					v = v.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ",")
					$coverage_amount_lbl.text('$' + v);
				},
				onFinish: function(data){
					//$('#avarage_amount').val(data.from);
					var v = data.from_value.toString();
					v = v.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ",")
					$coverage_amount_lbl.text('$' + v);
				},
				onUpdate: function(data){
					var v = data.from_value.toString();
					v = v.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ",")
					$coverage_amount_lbl.text('$' + v);
				}
			});
		},
		form_submit_btn_question: function(){
			RATE_CALC.autoscroll = true;
			if(RATE_CALC.rc_form.data('autoscroll') != undefined){
				RATE_CALC.autoscroll = RATE_CALC.rc_form.data('autoscroll');
			}
			if(RATE_CALC.rc_form.find('input#answer').length){
				RATE_CALC.rc_form.find('input#answer').val($(this).val());
			}
		},
		form_submit: function(e){
			e.preventDefault();
			var $results_container = $(this).parents('.rate-calc').find('.results');
			var $yiiform = $(this);
			var $parent = $yiiform.parents('.applynow-form-section.rate-calc');
			var error = RATE_CALC.validateRateCalcWidgetFields($yiiform);
			if(!error){
				$parent.addClass('loading');
				$.ajax({
					type: $yiiform.attr('method'),
					url: $yiiform.attr('action'),
					data: $yiiform.serializeArray()
				}).done(function(responce){
					//console.log(responce);
					if(!responce.error){
						$yiiform.find('.btn-quote').addClass('clicked');
						$results_container.html(responce.html);
						if(RATE_CALC.autoscroll){
							FJS.Common.scrollTo("#rate_calc_results");
						}
						if(~~responce.request.guess_price > 0){
							$('#guess_price_row').hide();
						}
						/*if($("table.plans-table").length){
							$("table.plans-table tbody td").not(":nth-child(1)").colorize({
								themes: {
									"default": {
										color_max: "#c81e00",
										color_mid: "#c8c800",
										color_min: "#50c800"
									},
								}
							});
						}*/
					}else{

					}
					$parent.removeClass('loading');
				}).fail(function(){
					$parent.removeClass('loading');
				});
			}
			return false;
		},
		applynow_widget__submit_btn_click: function(){
			var error = RATE_CALC.validateApplyNowWidgetFields();
			//console.log(error);
			var $form = $(this).parent('form'),
				data = $form.data('yiiActiveForm');
			if(!error){
				//$form.submit();
			}else{
				//alert("Please complete all fields marked in red.");
				//return false;
			}
		},
		validateRateCalcWidgetFields: function(form){
			var error = 0;
			var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			//console.log($(slide).find('input:required, select:required').length);
			$(form).find('input:required, select:required, [required]').each(function(){
				if(error) return false;
				var $this = $(this);

				//console.log($this.attr('type'), $this.val());
				switch($this.attr('type')){
					case 'email':
						if(!$.trim($this.val()).match(pattern)){
							console.log('email alert');
							$this.parent().addClass('error').end().addClass('error');
							error = true;
						}
						break;
					case 'text':
						if($this.val() == ''){
							$this.parent().addClass('error').end().addClass('error');
							error = true;
						}
						break;
					case undefined:
						//console.log($this.attr('type'), $this.val());
						var j = $(this).find('input').length;
						var e = 0;
						$this.find('input').each(function(i, el){
							if(!$(el).is(':checked')){
								e++;
							}
						});
						//console.log(j, e);
						if(e == j){
							error = true;
							$this.parents('.el').find('.el_lbl').addClass('error');
							console.log('error');
						}
						break;
				}
			});

			if(error == false){
				$(form).removeClass('error');
			}

			return error;
		},
		validateApplyNowWidgetFields: function(){
			var error = false;
			var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

			$('input:required').each(function(){
				//if(error) return false;
				if($(this).attr('type') == 'email'){
					if(!$.trim($(this).val()).match(pattern)){
						error = true;
					}
				}
				if($(this).val() == ''){
					if(this.tagName.toLowerCase() == 'select'){
						$(this).parent().find('button').addClass('invalid');
					}else{
						$(this).addClass('invalid');
					}
					error = true;
				}else{
					$(this).removeClass('invalid');
				}
			});

			if(error == false){
				$(this).removeClass('invalid');
				//$(this).parent().find('button').removeClass('invalid');
			}

			return error;
		},
	};

	if($('#rate-calc-form').length || $('#rate-calc-form2').length){
		RATE_CALC.init();
	}

	$(document)
		.on('click', '.applynow-form-section.widget #submit_btn', RATE_CALC.applynow_widget__submit_btn_click)
		.on('click', '#rate-calc-form #submit_btn, #rate-calc-form .submit_question', RATE_CALC.form_submit_btn_question)
		.on('input', '#rate-calc-form #guess_price', RATE_CALC.guess_price_input)
		.on('click', '#rate-calc-form input:radio', RATE_CALC.form_input_radio_click)
		.on('click change mouseover mouseout', '#rate-calc-form .rating input', RATE_CALC.form_rating_input_radio_events)
		.on('submit', '#rate-calc-form', RATE_CALC.form_submit);

});
