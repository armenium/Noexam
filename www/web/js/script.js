var RECAPTCHA = {
	test: function(token){
		console.log(token);
	},
};

$(document).ready(function(){

	var globals = {
		view_mode: 'pc',
		device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
		ww: $(window).width(),
		wh: $(window).height(),
		plansSliderOptions: {
			slidesToShow: 3,
			enterMode: true,
			// enterPadding: '1170px',
			infinite: true,
			arrows: false,
			responsive: [
				{breakpoint: 640, settings: {centerMode: true, dots: true, centerPadding: '100px', slidesToShow: 1}},
				{breakpoint: 540, settings: {centerMode: true, dots: true, centerPadding: '80px', slidesToShow: 1}},
				{breakpoint: 440, settings: {centerMode: true, dots: true, centerPadding: '60px', slidesToShow: 1}},
				{breakpoint: 380, settings: {centerMode: true, dots: true, centerPadding: '40px', slidesToShow: 1}},
			]
		},
		blocksSliderOptions: {
			slidesToShow: 4,
			centerMode: false,
			// enterPadding: '1170px',
			infinite: false,
			arrows: false,
			dots: true,
			//adaptiveHeight: true,
			responsive: [
				{breakpoint: 1110, settings: {slidesToShow: 3}},
				{breakpoint: 993, settings: {slidesToShow: 2}},
				{breakpoint: 681, settings: {slidesToShow: 1}},
			]
		},
		leftSliderOptions: {
			slidesToShow: 1,
			centerMode: false,
			infinite: true,
			arrows: false,
			dots: true,
			autoplay: true,
			fade: true
		},
		gridSliderOptions: {
			slidesToShow: 1,
			centerMode: false,
			infinite: true,
			arrows: false,
			dots: true,
			autoplay: true,
		},
		formSliderOptions: {
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			infinite: false,
			swipe: false,
			adaptiveHeight: false
		},
		formHomeOptions: {
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			infinite: false,
			swipe: false,
			adaptiveHeight: false,
			fade: false
		},
		subQuestionsSliderOptions: {
			dots: false,
			arrows: false,
			infinite: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: false,
			swipe: false,
			accessibility: false,
		},
	};

	var FJS = {
		options: {},
		Init: function(){
			this.options = $.extend(this.options, globals);
			//console.log(this.options);

			this.Global.initEvents();
		},
		Global: {
			initEvents: function(){
				$(document)
					.on('blur', '[data-trigger="js_action_blur"]', FJS.Global.doAction)
					.on('select', '[data-trigger="js_action_select"]', FJS.Global.doAction)
					.on('change', '[data-trigger="js_action_change"]', FJS.Global.doAction)
					.on('click', '[data-trigger="js_action_click"]', FJS.Global.doAction)
					.on('submit', '[data-trigger="js_action_submit"]', FJS.Global.doAction);
			},
			doAction: function(e){
				var $this = $(this),
					action = $(this).data('action');

				switch(action){
					case "quote-result-link":
						FJS.ApplyNow.QuoteResult.goToLink($this);
						break;
					default:
						break;
				}

				e.preventDefault();
			},
		},
		ApplyNow: {
			QuoteResult: {
				goToLink: function($btn){
					var url = $btn.data('url');

					if(url != ''){
						window.location.href = url;
					}
				},
			}
		},
	};

	var MAIN = {
		init: function(){
			if(globals.ww < 768){
				globals.view_mode = 'mob';
			}
			$('input[type="tel"]').mask("(999) 999-9999");
			$('.selectpicker').selectpicker({'mobile': globals.device});
			$('[data-toggle="tooltip"]').tooltip();
			if($('.scroll-top').length){
				$('.scroll-top').on('click', function(e){
					e.preventDefault();
					$('html, body').stop().animate({
						scrollTop: 0
					}, 800, 'easeOutExpo');
				});

				$(window).on('scroll', function(){
					if($(window).scrollTop() > 300){
						$('.scroll-top').addClass('show');
					}else{
						$('.scroll-top').removeClass('show');
					}
				});
			}
			if($('aside').find('.sticky-block').length){
				if($('article.content').find('.sticky-block').length == 0){
					$('article.content').find('.bio3').after($('aside').find('.sticky-block').clone(true));
				}
			}
			if($('.responsive-tabs').length){
				RESPONSIVEUI.responsiveTabs();
			}
			this.setProgress();
			this.initLazyLoad();
			this.initTableSorter();
			this.initDisclosure();
			this.initGetAjaxContent();
			this.initIconContainer();
		},
		sticky_a_click: function(){
			//e.preventDefault();
			//$('html, body').stop().animate({scrollTop: $($(this).attr('href')).offset().top}, 800, 'easeOutExpo');
			MAIN.scroll_to_elem($(this).attr('href'), 800, 'easeOutExpo')
		},
		scroll_to_elem: function(elem, speed, effect){
			if(speed == undefined){
				speed = 1000;
			}
			if(effect == undefined){
				effect = 'linear';
			}
			var top = ~~$(elem).offset().top;
			if(top != undefined){
				if(globals.ww < 768){
					top -= 70;
				}
				$('html, body').animate({scrollTop: top}, speed, effect);
			}
		},
		setProgress: function(val){
			var val;
			if($('.bar-progress').length){
				if(val == null){
					val = $('.bar-progress .bar-line').data('progress');
				}
				$('.bar-progress .bar-line').width(val+'%').data('progress', val);

				//console.log($('.bar-progress .bar-line').data('progress'));
			}
		},
		initTableSorter: function(){
			// https://mottie.github.io/tablesorter/docs/
			if($('.tablesorter').length){
				$.tablesorter.addParser({
					id: 'ratesort',
					is: function(s){
						return false;
					},
					format: function(s, table, cell){
						var $cell = $(cell);
						return ~~$cell.data('value') || s;
					},
					type: 'number'
				});
				$('.tablesorter').each(function(){
					$(this).tablesorter({
						headers: {
							1: {
								sorter: 'ratesort'
							}
						}
					});
				});
			}
		},
		initLazyLoad: function(){
			if($('img.lazy').length){
				var lazyLoadInstance = new LazyLoad({
					elements_selector: ".lazy",
					//load_delay: 300,
					threshold: 0
				});
			}
		},
		initDisclosure: function(){
			if($('.disclosure').length){
				$('.disclosure').popover({
					selector: 'a',
					container: "main.wrapper-main",
					viewport: {"selector": "section.container.section", "padding": 30},
					toggle: "popover",
					placement: "bottom",
					trigger: "focus",
					template: '<div class="popover" role="tooltip"><div class="close"></div><div class="popover-content"></div></div>'
				});

				/*$('main.wrapper-main').on('click', '.popover .close', function(){
					//$('.disclosure a').trigger('click');
					$(this).parents('.popover').removeClass('in');
				});*/
			}
		},
		ajaxGetPartialsContent: function($container, view_file){
			$.ajax({
				type: "POST",
				url: "/ajax-get-partials-content/",
				data: {'view': view_file},
				dataType: "json",
				cache: false,
				beforeSend: function(xhr){}
			}).done(function(responce){
				if(responce.error == 0){
					$container.html(responce.html);
					var $ajax_content = $(responce.html);
					if($ajax_content.find('.selectpicker').length){
						$('.selectpicker').selectpicker('render');
					}
					if($ajax_content.find('img.lazy').length){
						MAIN.initLazyLoad();
					}
					if($ajax_content.find('.tablesorter').length){
						MAIN.initTableSorter();
					}
					if($ajax_content.find('#rate-calc-form').length){
						RATE_CALC.init();
					}
					if($ajax_content.find('.responsive-tabs').length){
						RESPONSIVEUI.responsiveTabs();
					}
					if($ajax_content.find('.disclosure').length){
						MAIN.initDisclosure();
					}
				}else if(responce.error == 1){

				}
			}).fail(function(){

			}).always(function(){

			});

		},
		initGetAjaxContent: function(){
			if($('.ajaxContent').length){
				setTimeout(function(){
					$('.ajaxContent').each(function(){
						var view_file = $(this).data('view-file');
						MAIN.ajaxGetPartialsContent($(this), view_file);
					});
				}, 5000);
			}
		},
		initIconContainer: function(){
			if($('.icon-container').length){
				$('.icon-container a').on('click', function(e){
					MAIN.scroll_to_elem($(this).attr('href'));
				});
			}
		},
	};

	var COMPARISON = {
		cf_form: null,
		init: function(){
			this.cf_form = $(document).find('#compare-form');

			if($('.comparison-result').length){
				setTimeout(function(){
					COMPARISON.resizeComparisonCells();
				}, 500);

				var rtm = null;
				$(window).resize(function(){
					clearTimeout(rtm);
					rtm = setTimeout(function(){
						COMPARISON.resizeComparisonCells();
					}, 500);
				});

				$('.short-links a').on('click', function(event){
					event.preventDefault();
					var id = $(this).attr('href');
					var top = ~~$(id).offset().top - 80;
					$('html').animate({scrollTop: top}, 500);
				});

				$(".comparison-result.single").on('change', 'select.selectpicker', function(){
					var $parent = $(".comparison-result.single"),
						compare_company_slug = $(this).val(),
						compare_company_num = $(this).data('col'),
						post_data = [];

					$parent.find('input.comparison-company.slug-'+compare_company_num).val(compare_company_slug);
					$parent.find('input.comparison-company').each(function(){
						post_data[$(this).data('num')] = $(this).val();
					});

					COMPARISON.getComparisonCompanyData(post_data, compare_company_num);
				});

			}
		},
		form_submit: function(e){
			e.preventDefault();
			COMPARISON.cf_form = $(this);
			var request_type = $(this).data('request-type');

			var $results_container = $('#comparison_results');
			var $parent = COMPARISON.cf_form.parents('.comparison-form');

			var src_url = '/life-insurance/companies/';
			var data = COMPARISON.cf_form.serializeArray();
			var c1 = data[0].value;
			var c2 = data[1].value;
			if(c1 == c2 || c1 == '' || c2 == ''){
				return false;
			}
			src_url += c1 + '-vs-' + c2 + '/';
			$(this).attr('action', src_url);
			//$('select[name="'+data[0].name+'"]').removeAttr('name');
			//$('select[name="'+data[1].name+'"]').removeAttr('name');
			if(request_type == 'ajax'){
				//console.log(data);
				$parent.addClass('loading');
				$.ajax({
					type: COMPARISON.cf_form.attr('method'),
					url: COMPARISON.cf_form.attr('action'),
					data: COMPARISON.cf_form.serializeArray()
				}).done(function(response){
					if(!response.error){
						//console.log(response);
						$results_container.html(response.html);
						MAIN.scroll_to_elem('#comparison_results');
						setTimeout(function(){
							COMPARISON.resizeComparisonCells();
						}, 500);
					}else{

					}
					$parent.removeClass('loading');
				}).fail(function(){
					$parent.removeClass('loading');
				});
			}else{
				window.location.href = src_url;
			}
			return false;
		},
		resizeComparisonCells: function(){
			var $ul_left = $('.comparison-result .col-left').find('ul.inner');
			var $ul_right = $('.comparison-result .col-right').find('ul.inner');
			var l_count = $ul_left.find('li.top').length,
				r_count = $ul_right.find('li.top').length;
			console.log(l_count, r_count);
			var $ul_1 = null, $ul_2 = null;
			if(l_count >= r_count){
				$ul_1 = $ul_left;
				$ul_2 = $ul_right;
			}else{
				$ul_1 = $ul_right;
				$ul_2 = $ul_left;
			}
			$ul_1.each(function(i, ul){
				$(ul).find('li.top').each(function(i, li){
					var h1 = ~~$(li).height();
					var $li2 = $ul_2.find('li.top:eq('+i+')');
					var h2 = ~~$li2.height();
					//console.log(i, h1, h2);
					if(h1 < h2){
						$(li).height(h2);
					}else if(h1 > h2){
						$li2.height(h1);
					}

				});
			});
		},
		getComparisonCompanyData: function(post_data, update_col){
			var $company = $('#company_'+update_col),
				$parent = $(".comparison-result.single");

			$company.find('.logo img.main').attr('src', '/img/loader2.gif');
			$company.find('.tmp-title').hide();

			$.ajax({
				type: "POST",
				url: "/ajax-get-comparison-company-data/",
				data: {'post_data': post_data},
				dataType: "json",
				cache: false,
				beforeSend: function(xhr){}
			}).done(function(responce){
				//console.log(responce.companies.length);
				if(responce.count > 0){
					$.each(responce.companies[update_col], function(i, n){
						//console.log(i, n);
						$company.find('.'+i+' .company-rating').text(n);
					});
					$company.find('.logo img.main').attr('src', responce.companies[update_col]['logo']);
					$parent.find('.full-comp').html(responce.compare_link.link);

					setTimeout(function(){
						COMPARISON.resizeComparisonCells();
					}, 500);
				}
			}).fail(function(){

			}).always(function(){

			});
		},
	};

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
			this.range_slider_init();
			if(this.rc_form.data('autoscroll') != undefined){
				this.autoscroll = this.rc_form.data('autoscroll');
			}
			if(this.rc_form.data('autoload')){
				switch(this.rc_form.data('view')){
					case "list":
						if(globals.ww > 768){
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
			this.value = this.value.replace(/[^\d]/,'');
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
				onStart: function (data) {
					// fired then range slider is ready
				},
				onChange: function (data) {
					//$('#avarage_amount').val(data.from);
					var v = data.from_value.toString();
					v = v.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ",")
					$coverage_amount_lbl.text('$'+v);
				},
				onFinish: function (data) {
					//$('#avarage_amount').val(data.from);
					var v = data.from_value.toString();
					v = v.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ",")
					$coverage_amount_lbl.text('$'+v);
				},
				onUpdate: function (data) {
					var v = data.from_value.toString();
					v = v.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ",")
					$coverage_amount_lbl.text('$'+v);
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
			var error = validateRateCalcWidgetFields($yiiform);
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
							MAIN.scroll_to_elem("#rate_calc_results");
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
			var error = validateApplyNowWidgetFields();
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
	};

	MAIN.init();
	FJS.Init();

	if($('#compare-form').length || $('.comparison-result').length){
		COMPARISON.init();
	}

	if($('#rate-calc-form').length || $('#rate-calc-form2').length){
		RATE_CALC.init();
	}


	var sendPlanAjax = function(){
		var data = {
			birthdate: $('#birthdate').val(),
			h_foot: $('#h_foot').val(),
			h_inch: $('#h_inch').val(),
			weight: $('#weight').val(),
			tobaco: $('#tobaco').val(),
			sex: $('#sex').val(),
			state: $('#state').val(),
			avarage_amount: $('#avarage_amount').val(),

		}

		$.ajax({
			type: "POST",
			dataType: "json",
			url: "/ajax-get-sagicor-plans/",
			data: data,
			// contentType: "application/json",
			complete: function(data){
				//console.log(data);
				$('.plans').animate({opacity: 0}, 200, function(){
					$('.plans').trigger('animate_complete');
				});
				$('.plans').on('animate_complete', function(){
					$('.plans').slick('unslick').empty().html(data.responseText);
					if($('.plans .alert').length > 0){
						$('.plans').slick($.extend(globals.plansSliderOptions, {slidesToShow: $('.plans .alert').length}));
					}else{
						$('.plans').slick(globals.plansSliderOptions).slick('slickNext');
					}
				});
				$('.plans').animate({opacity: 1}, 700);
			}
		});
	};
	// $('.birthday>input').datepicker({format : 'm/d/yyyy'});


	if($('body').hasClass('index')){
		$('.plans').slick(globals.plansSliderOptions)
			.on('beforeChange', function(event, slick, currentSlide, nextSlide){
				$('.slick-active .plan').removeClass('active');
			}).on('afterChange', function(event, slick, currentSlide, nextSlide){
			$('.slick-active .plan').addClass('active');
		});

		sendPlanAjax();

		$('.slider').slick({
			dots: true,
			arrows: false,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
		});

		$('.tiles-block').slick({
			dots: true,
			arrows: false,
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3,
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					},

				},
				{
					breakpoint: 640,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					},

				},
			]
		});

	}

	if($('body').hasClass('careers')){
		$('h1.title').find('.badge').text($('.jobs-list .item').length);
	}

	// $('.tiles-block').slick('unslick')

	function run(svgElm){
		var s = Snap(svgElm + ' svg'),
			path = "",
			arc = s.path(path);

		// strokeColor = 'rgb(164, 210, 221)',

		var canvasSize = 335;
		var strokeWidth = 46;
		if(globals.ww <= 414){

			canvasSize = 100;
			strokeWidth = 14;
		}

		var centre = canvasSize / 2;
		var radius = Math.floor((canvasSize - strokeWidth) / 2);

		var startY = centre - radius;
		var percDiv = $(svgElm).find('.percent-line');


		setTimeout(function(){
			$(svgElm + ' svg').attr('class', 'show-circle');
		}, 100);

		setTimeout(function(){
			runSvgAnimation(svgElm, arc, centre, radius, startY, s, strokeWidth, canvasSize, percDiv);
		}, 500);
	}

	function runSvgAnimation(svgElm, arc, centre, radius, startY, s, strokeWidth, canvasSize, percDiv){
		var percent_anim = $(svgElm + ' svg').data('value');
		var strokeColor = $(svgElm + ' svg').data('strokecolor');
		var percent = percent_anim / 100;
		var endpoint = percent * 360;

		Snap.animate(0, endpoint, function(val){
			arc.remove();

			var d = val,
				dr = d - 90;
			radians = Math.PI * (dr) / 180,
				endx = centre + radius * Math.cos(radians),
				endy = centre + radius * Math.sin(radians),
				largeArc = d > 180 ? 1 : 0;
			path = "M" + centre + "," + startY + " A" + radius + "," + radius + " 0 " + largeArc + ",1 " + endx + "," + endy;

			arc = s.path(path);
			arc.attr({
				stroke: strokeColor,
				fill: 'none',
				strokeWidth: strokeWidth
			});
			percDiv.text(Math.round(val / 360 * 100) + '%');
		}, 2000, mina.easeinout);
	}

	if(globals.ww > 992){
		$('.plans').on('mouseenter', '.plan', function(){
			$(this).css({transform: 'scale(1.1)',}).addClass('active');
		})
		$('.plans').on('mouseleave', '.plan', function(){
			$(this).css({transform: 'scale(1)'}).removeClass('active');
		})
	}

	$(window).resize(function(){
		if(globals.ww > 992){
			$('.plans').on('mouseenter', '.plan', function(){
				$(this).css({transform: 'scale(1.1)',}).addClass('active');
			})
			$('.plans').on('mouseleave', '.plan', function(){
				$(this).css({transform: 'scale(1)'}).removeClass('active');
			})
		}else{
			$('.plan').off('mouseenter');
			$('.plan').off('mouseleave');
		}

		if(globals.ww > 768){
			$('.main-questions .scroll-bar').jScrollPane({
				verticalDragMinHeight: 82,
				verticalDragMaxHeight: 82,
				contentWidth: '0px',
			});
		}

	});

	$('.graph').on('inview', function(event, isInView){
		if(isInView){
			if($(this).parent().hasClass('blue-circle')){
				run('.blue-circle');
			}
			if($(this).parent().hasClass('green-circle')){
				run('.green-circle');
			}
			$(this).off('inview');
		}
	});

	var animate = function(element){
		var TLRow = element.find('.timeline-row');
		var TLCircle = TLRow.find('.timeline-circle');
		var TLVerticalLine = $('.desktop-line .vertical-line');
		var TLCircleWrapper = TLRow.find('.timeline-circle-wrap');
		TLRow.addClass('active');
		if(TLCircleWrapper.hasClass('instant')){
			TLVerticalLine.css('border-top', '240px solid #9ad59a');
		}
		if(TLCircleWrapper.hasClass('email')){
			TLVerticalLine.css('border-top', '480px solid #9ad59a');
			$('.timeline-bdg-bot').css({'background-color': '#9ad59a', 'color': '#fff'});
		}
		if(TLCircleWrapper.hasClass('secure')){
			TLVerticalLine.css('border-top', '95px solid #9ad59a');
		}
		TLRow.css('margin', '0');
		TLCircle.css('margin-left', '-17.5px');

		element.off('inview')
	};

	$('.horizontal-line').on('inview', function(event, isInView){
		if(isInView){
			var element = $(this);
			var time = 300 * $(this).index();
			//
			setTimeout(function(){
				animate(element)
			}, time);
		}
	});

	$('.navbar-mobile .head .button, .mob-menu .head .button').on('click', function(){
		$('header.wrapper-main').toggleClass('opened');
		$('body').toggleClass('nav-mob-opened');
		/*if($('.mobile-inner').hasClass('col-xs-12')){
			$('.mobile-inner').removeClass('col-xs-12').addClass('col-xs-10');
			$('.navbar-mobile').addClass('opened');
			$('.links').removeClass('hidden');
		}else{
			$('.mobile-inner').removeClass('col-xs-10').addClass('col-xs-12')
			$('.navbar-mobile').removeClass('opened');
			$('.links').addClass('hidden');
		}*/
	});

	$('.time-line-mobile .timeline-circle-wrap').on('click', function(){

		$time_line = $('.time-line-mobile');
		$line = $('.time-line-mobile .vertical-line');

		if($(this).hasClass('secure')){
			$parent = $('.horizontal-line .secure').parent().parent().eq(0);
			$line.css('border-left', $time_line.width() * 0.10 + 'px solid #9ad59a')
			$('.timeline-bdg-bot').css({'background-color': '#f3f3f3', 'color': '#999'});
			$.when($('.horizontal-line').fadeOut(500)).then(function(){
				$parent.fadeIn(500)
			});
		}
		if($(this).hasClass('instant')){
			$parent = $('.horizontal-line .instant').parent().parent().eq(0);
			$line.css('border-left', $time_line.width() * 0.50 + 'px solid #9ad59a')
			$('.timeline-bdg-bot').css({'background-color': '#f3f3f3', 'color': '#999'});
			$.when($('.horizontal-line').fadeOut(500)).then(function(){
				$parent.fadeIn(500)
			});
		}
		if($(this).hasClass('email')){
			$parent = $('.horizontal-line .email').parent().parent().eq(0);
			$line.css('border-left', $time_line.width() + 'px solid #9ad59a')
			$('.timeline-bdg-bot').css({'background-color': '#9ad59a', 'color': '#fff'});
			$.when($('.horizontal-line').fadeOut(500)).then(function(){
				$parent.fadeIn(500)
			});
		}
	});

	if(globals.ww <= 992){
		$('.horizontal-line').off('inview');
		$('.timeline-row').addClass('active');
		$('.horizontal-line').removeClass('hidden visible-md visible-lg');
		$('.horizontal-line').hide();
		$('.horizontal-line').eq(0).show()
	}

	if(globals.ww <= 414){
		$('circle').attr({
			'cx': '50',
			'cy': '50',
			'r': '43',
			'stroke-width': '7'
		});
	}

	$(window).resize(function(){
		var winWidth = globals.ww;
		if(winWidth > 414 && winWidth <= 992){
			if($('circle').attr('cx') == 50){
				$('path').remove();
				$('circle').attr({
					'cx': '167',
					'cy': '167',
					'r': '144',
					'stroke-width': '23'
				});
				if($('blue-circle')){
					run('.blue-circle');
				}
				if($('green-circle')){
					run('.green-circle');
				}
			}
		}

		if(winWidth <= 414){
			if($('circle').attr('cx') == 167){
				$('path').remove();
				$('circle').attr({
					'cx': '50',
					'cy': '50',
					'r': '43',
					'stroke-width': '7'
				});
				if($('blue-circle')){
					run('.blue-circle');
				}
				if($('green-circle')){
					run('.green-circle');
				}
			}
		}

	});

	var goBack = function(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "/ajax-go-back/",
			data: {current_url: window.location.href},
			complete: function(data){
				//console.log(data.responseText);
				if(data.responseText != ''){
					window.location.href = data.responseText;
				}
			}
		});
	};

	var validateFields = function(){
		var error = false;
		var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

		$('input[type="text"], input[type="email"], select').each(function(){
			if(error) return false;
			if($(this).attr('type') == 'email'){
				if(!$.trim($(this).val()).match(pattern)){
					error = true;
				}
			}
			if($(this).val() == ''){
				//console.log($(this).attr('name'), 'val is empty');
				$(this).parent().addClass('error').end().addClass('error');
				error = true;
			}else{
				$(this).parent().removeClass('error').end().removeClass('error');
				error = false;
			}
		});

		if(error == false){
			//console.log($(this).attr('name'));
			$(this).parent().removeClass('error').end().removeClass('error');
		}
		//console.log(error);
		return error;
	};

	var validateRequiredFields = function(){
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
				$(this).parent().addClass('error').end().addClass('error invalid');
				error = true;
			}
		});

		if(error == false){
			$(this).parent().removeClass('error').end().removeClass('error invalid');
		}

		return error;
	};

	var validateSlideFields = function(slide){
		var error = 0;
		var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		//console.log(slide);
		$(slide).find('input[type="text"], input[type="email"], select').each(function(){
			if(error) return false;
			if($(this).attr('type') == 'email'){
				if(!$.trim($(this).val()).match(pattern)){
					error = true;
				}
			}

			if($(this).val() == ''){
				$(this).parent().addClass('error').end().addClass('error');
				error = true;
			}
		});

		if(error == false){
			$(this).parent().removeClass('error').end().removeClass('error');
		}

		return error;
	};

	var validateSlideRequiredFields = function(slide){
		var error = false;
		var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		//console.log(slide);
		$(slide).find('input:required, select:required').each(function(){
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
					$(this).parent().addClass('error').end().addClass('error invalid');
				}
				error = true;
			}else{
				$(this).removeClass('invalid');
			}
		});

		if(error == false){
			$(this).parent().removeClass('error').end().removeClass('error invalid');
		}

		return error;
	};

	var validateApplyNowFields = function(){
		var error = 0;
		var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

		$('input:required, select:required').each(function(){
			if(error) return false;
			if($(this).attr('type') == 'email'){
				if(!$.trim($(this).val()).match(pattern)){
					error = true;
				}
			}
			if($(this).val() == ''){
				$(this).parent().addClass('error').end().addClass('error');
				error = true;
			}
		});

		if(error == false){
			$(this).parent().removeClass('error').end().removeClass('error');
		}

		return error;
	};

	var validateApplyNowSlideFields = function(slide){
		var error = 0;
		var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		//console.log($(slide).find('input:required, select:required').length);
		$(slide).find('input:required, select:required').each(function(){
			if(error) return false;
			if($(this).attr('type') == 'email'){
				if(!$.trim($(this).val()).match(pattern)){
					console.log('email alert');
					$(this).parent().addClass('error').end().addClass('error');
					error = true;
				}
			}
			//console.log($(this).val());
			if($(this).val() == ''){
				$(this).parent().addClass('error').end().addClass('error');
				error = true;
			}
		});

		if(error == false){
			$(this).parent().removeClass('error').end().removeClass('error');
		}

		return error;
	};

	var validateApplyNowWidgetFields = function(){
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
	};

	var validateRateCalcWidgetFields = function(form){
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
	};

	// Questions page
	var checkAnswered = function(questions){
		var questions;
		var error = 0;
		if(!questions){
			var questions = $('.main-questions .sub-question');
		}
		questions.each(function(){
			var squestion = $(this);
			if(!squestion.hasClass('answered') || squestion.attr('data-answer') == ''){
				error = 1;
			}
			if(error == 1) return false;
		});
		return error;
	};

	if($('.content.questions').length){
		$('.sub-questions').slick(globals.subQuestionsSliderOptions);

		$('.sub-questions').on('afterChange', function(){
			var questions = $('.slick-active').find('.sub-question');
			if(!checkAnswered(questions)){
				$('.next-button').addClass('active');
			}

			if(globals.ww > 768){
				$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px'
				});
			}

		});

		// Click for reanswer.
		$('.main-questions').on('click', '.sub-question.answered div.text, .sub-question.answered .q-num', function(){
			var parent = $(this).parents('.sub-question');
			var subquestions = parent.siblings('.sub-question');
			subquestions.removeClass('active');
			subquestions.filter(".reanswered").removeClass('reanswered').addClass('answered');

			$(this).parent().removeClass('answered');
			$(this).parent().addClass('active reanswered');

			$('.next-button').removeClass('active');

			if(globals.ww > 768){
				$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px'
				});
			}
		});

		var getAjaxReflex = function(questionId, answer, parent){
			$.ajax({
				type: "post",
				data: {
					parentId: parent.data('parent-id'),
					questionId: questionId,
					questionAnswer: [answer],
				},
				global: true,
				url: "/get-reflex/",
				complete: function(data){
					// if(data){
					$(document).trigger('getreflexx', [data.responseText, answer]);
					// }
				}
			});
		};

		// Click to YES/NO button for SUB-question
		$('.content.questions').on('click', '.yes-button.sub-button, .no-button.sub-button', function(){
			var answer;
			var button = $(this);
			var parent = $(this).parents('.sub-question');
			var questionId = parent.data('question-id');
			var reflexQuestions = parent.find('.reflex-questions');

			//console.log(parent);

			button.addClass('active');
			if(button.hasClass('yes-button')){
				answer = 'yes';
				parent.find('.buttons').eq(0).find('.no-button').removeClass('active');
			}

			if(button.hasClass('no-button')){
				answer = 'no';
				parent.find('.buttons').eq(0).find('.yes-button').removeClass('active');
			}

			/*if(reflexQuestions.html != ''){
				if(parent.data('type') =='sub'){
					relatedReflexQuestions = reflexQuestions.find('.sub-question[data-parent-id="'+questionId+'"]');
				}else if(parent.data('type') =='reflex'){
					relatedReflexQuestions = parent.siblings('.sub-question[data-parent-id="'+questionId+'"]');
				}
				reflexQuestions.empty();
			}*/

			if(parent.attr('data-answer') == answer){
				if(parent.hasClass('reanswered')){
					parent.removeClass('active reanswered').addClass('answered no');
					$('.slick-active').find('.sub-question.answered.field').removeClass('active');
					$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
				}
				return true;
			}

			getAjaxReflex(questionId, answer, parent);

			$(document).on('getreflexx', function(event, responseText, answer){
				$(this).off('getreflexx');
				if(responseText){
					parent.attr('data-answer', answer);
					parent.removeClass('reanswered');
					reflexQuestions.html(responseText);
					$('.selectpicker').selectpicker('render');
				}else{
					parent.attr('data-answer', answer);
					parent.removeClass('active reanswered').addClass('answered no');

					$('.slick-active').find('.sub-question.answered.field').removeClass('active');
					// $('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
					reflexQuestions.empty();
					$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
				}

				if(globals.ww > 768){
					$('.main-questions .scroll-bar').jScrollPane({
						verticalDragMinHeight: 82,
						verticalDragMaxHeight: 82,
						contentWidth: '0px'
					});
				}
				button.trigger('answered');
			});

		});
		// Trigerred when click on YES\NO button for REFLEX-question

		var getAjaxReflexReflex = function(questionId, questionNumber, answer, parent, parentMain, button, reflexQuestions){
			$.ajax({
				type: "post",
				data: {
					parentId: parent.data('parent-id'),
					questionId: questionId,
					questionNumber: questionNumber,
					questionAnswer: [answer],
				},
				url: "/get-reflex/",
				complete: function(data){
					$(document).trigger('getreflexxx', [data.responseText, answer, parent, parentMain, button, reflexQuestions, questionId])
				}
			});
		};

		var removeReflexRecursive = function(obj, questionId){
			relatedReflexQuestions = obj.siblings('.sub-question[data-parent-id="' + questionId + '"]');
			if(relatedReflexQuestions.length){
				relatedReflexQuestions.each(function(){
					removeReflexRecursive($(this), $(this).data('question-id'));
					$(this).remove();
				})
			}
		};

		$(document).on('getreflexxx', function(event, responseText, answer, parent, parentMain, button, reflexQuestions, questionId){
			if(responseText){
				parent.attr('data-answer', answer);
				parent.removeClass('active').addClass('answered no');
				var response = $(responseText);

				response.each(function(){
					var duplicate = parentMain.find('[data-question-id="' + $(this).data('question-id') + '"]');
					if(duplicate.length){
						console.log('Duplicate');
						duplicate.remove();
					}
				});

				parent.after(response);
				$('.selectpicker').selectpicker('render');
				if(globals.ww > 768){
					$('.main-questions .scroll-bar').jScrollPane({
						verticalDragMinHeight: 82,
						verticalDragMaxHeight: 82,
						contentWidth: '0px'
					});
				}
			}else{
				removeReflexRecursive(parent, questionId);

				if(parent.next().length){
					parent.attr('data-answer', answer)
					parent.removeClass('active').addClass('answered no');
					parent.next().addClass('active');
				}else{
					parent.attr('data-answer', answer)
					parent.removeClass('active').addClass('answered no');

					if(parentMain.length){
						parentMain.removeClass('active').addClass('answered')
					}else{
						$(button).parents('.sub-question[data-type="question"]').removeClass('active').addClass('answered');
					}

					$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
					$('.slick-active').find('.reflex-question').hide();
				}
			}
			if(globals.ww > 768){
				$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px'
				});
			}
			$(button).trigger('answered');
		});

		var getReflex = function(obj){
			var table_answer = false;
			var answer = {};
			var button = $(obj);
			var parentMain = $(button).parents('.sub-question[data-type="sub"]');
			var parent = $(button).parents('.sub-question[data-type="reflex"]');
			var parentT = $(button).parents('.sub-question[data-type="table"]');
			if(parentT.length){
				parent = parentT;
				table_answer = true;
			}
			var questionId = parent.data('question-id');
			var questionNumber = parent.data('question-number');
			var reflexQuestions = parent.parents('.reflex-questions');




			button.addClass('active');

			if(button.hasClass('yes-button')){
				answer['yes'] = 'yes';
				parent.find('.buttons').eq(0).find('.no-button').removeClass('active');
			}

			if(button.hasClass('no-button')){
				answer['no'] = 'no';
				parent.find('.buttons').eq(0).find('.yes-button').removeClass('active');
			}

			if($(button).hasClass('btn-confirm')){
				var $items = $(button).parents('.buttons').find('input[type="text"]:not(:disabled), input[type="radio"]:checked:not(:disabled), select:not(:disabled), textarea:not(:disabled)');

				if($items.length > 0){
					$items.each(function(){
						answer[""+$(this).attr('name')+""] = $(this).val();
					});
				}

				/*if($(button).parents('.buttons').find('select').length){
					answer = $(button).parents('.buttons').find('select option:selected').val();
				}
				if($(button).parents('.buttons').find('input[type="text"]:not(:disabled)').length){
					var $i_obj = $(button).parents('.buttons').find('input[type="text"]:not(:disabled)');
					var k = $($i_obj).attr('name');
					var v = $i_obj.val();
					answer[k] = v;
					//answer = $(button).parents('.buttons').find('input[type="text"]:not(:disabled)').val();
				}
				if($(button).parents('.buttons').find('textarea:not(:disabled)').length){
					var $i_obj = $(button).parents('.buttons').find('textarea:not(:disabled)');
					var k = $($i_obj).attr('name');
					var v = $i_obj.val();
					answer[k] = v;
				}*/
			}

			if(table_answer){
				answer = JSON.stringify(answer);
				//console.log(answer);
			}

			//if(parent.length){
			if(parent.attr('data-answer') == answer){
				if(parent.hasClass('reanswered')){
					if(parent.next().length){
						parent.attr('data-answer', answer);
						parent.removeClass('active').addClass('answered no');
						parent.next().addClass('active');
					}else{
						parent.attr('data-answer', answer);
						parent.removeClass('active').addClass('answered no');

						if(parentMain.length){
							parentMain.removeClass('active').addClass('answered');
						}else{
							$(button).parents('.sub-question[data-type="question"]').removeClass('active').addClass('answered');
						}

						$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
						$('.slick-active').find('.reflex-question').hide();
					}
				}
				return true;
			}
			if(table_answer){
				parentMain.attr('data-answer', 'ok')
			}

			//console.log(questionId, questionNumber, answer, parent, parentMain, button, reflexQuestions);
			getAjaxReflexReflex(questionId, questionNumber, answer, parent, parentMain, button, reflexQuestions);
		};

		$('.content.questions').on('click', 'table.avia input[type="radio"]', function(){
			var c = false,
				v = $(this).val();
			switch(v){
				case "yes":
					c = true;
					break;
				case "no":
					c = false;
					break;
			}
			$(this).parents('tr').find('input[type="text"]').attr('disabled', c);
		});

		// Click to YES/NO button for REFLEX-question
		$('.content.questions').on('click', '.yes-button.reflex-button, .no-button.reflex-button', function(){
			getReflex(this);
		});

		$('.content.questions').on('answered', '.yes-button, .no-button, .btn-confirm', function(){
			var questions = $('.slick-active').find('.sub-question');
			if(!checkAnswered(questions)){
				$('.next-button').addClass('active');
			}
		});

		$('.content.questions').on('click', '.btn-confirm', function(){
			var _this = this;

			/*if($(this).parents('.buttons').find('select').length){
				if($(this).parents('.buttons').find('select option:selected').val() != ""){
					getReflex(this);
				}
			}

			if($(this).parents('.buttons').find('input[type="text"]').length){
				if($(this).parents('.buttons').find('input[type="text"]:not(:disabled)').val() != ""){
					getReflex(this);
				}
			}*/

			var $buttons = $(this).parents('.buttons'),
				$items = $buttons.find('input[type="text"]:not(:disabled), select:not(:disabled), textarea:not(:disabled)');

			//console.log($items.length);

			if($items.length == 0){
				getReflex(_this);
			}else{
				var e = 0;
				$items.each(function(){
					var v = $(this).val();
					if(v == ''){
						e++;
					}
					//console.log(e);
				});
				if(e == 0){
					getReflex(_this);
				}
			}

		});

		$('.next-button').on('click', function(){
			var questions = $('.slick-active').find('.sub-question');
			if(!checkAnswered(questions)){
				$('.sub-questions').slick('slickNext');
				if(!checkAnswered()){
					var q_id;
					var q_num;
					var q_type;
					if($('div[data-type="question"]').data('question-id')){
						q_id = $('div[data-type="question"]').data('question-id');
						q_num = $('div[data-type="question"]').data('num');
						q_type = 'question';
					}else if($('div[data-type="question_nq"]').data('question-id')){
						q_id = $('div[data-type="question_nq"]').data('question-id');
						q_num = $('div[data-type="question_nq"]').data('num');
						q_type = 'question_nq';
					}else{
						q_id = $('.sub-questions').data('question-id');
						q_num = $('.sub-questions').data('num');
						q_type = 'question';
					}
					var data = {
						main_question_id: q_id,
						number: q_num,
						question_type: q_type,
						answers: {},
					};

					$('.sub-question.answered').each(function(index){
						data.answers[index] = {};
						data.answers[index].id = $(this).data('question-id');
						data.answers[index].xml_num = $(this).find('input[type="hidden"]').attr('name');
						data.answers[index].answer = $(this).data('answer');
						data.answers[index].type = $(this).data('type');
					});

					// console.log(data);
					$.ajax({
						type: "post",
						data: data,
						url: "/get-questions/",
						complete: function(data){
							//console.log(data.responseText);
							if(data.responseText == 'ne'){
								window.location = '/not-eligible/';
								return;
							}

							if(data.responseText == 'rtu'){
								window.location = '/rtu/';
								return;
							}

							if(!$(data.responseText).find('.question').length){
								$('.sub-questions').remove();
								$('.question').after(data.responseText);
								$('.next-button').removeClass('active');
								$('.sub-questions').slick(globals.subQuestionsSliderOptions);
								$('.selectpicker').selectpicker('render');
							}else{
								$('.content').empty();
								$('.content').append(data.responseText);
								$('.next-button').removeClass('active');
								$('.sub-questions').slick(globals.subQuestionsSliderOptions);
								$('.selectpicker').selectpicker('render');
							}
						}
					});
				}
				$(this).removeClass('active');
			}else{
				alert("Please answer for all questions.");
			}
		});

		$('.back-button').on('click', function(){
			var cs_index = ~~$('.sub-questions').slick('slickCurrentSlide');
			//console.log(cs_index);
			if(cs_index == 0){
				goBack();
			}else{
				$('.sub-questions').slick('slickPrev');
			}
		});
	}
	//END Questions page

	//Personal Info page
	if($(".content.personal-info").length){
		$(".personal-info input").on('focusin', function(){
			$('.timeline-list > div').removeClass('active');
			$(this).parents('div[class^="icon-"]').addClass('active').find('label').addClass('active');
		});

		$(".personalinfo2 .personal-info .timeline-list .icon-address label").addClass('active');
		$(".personalinfo2 .personal-info .timeline-list .icon-name .occupation").find('input').focus().select();
		setTimeout(function(){
		}, 1000);

		$(".personal-info input, .personal-info select").on('keyup blur change', function(){
			if(globals.view_mode == 'mob'){
				var cs_index = ~~$('.timeline-list').slick('slickCurrentSlide');
				var slide = $('div[data-slick-index="'+cs_index+'"]');
				if(!validateSlideRequiredFields(slide)){
					$('.next-button').addClass('active');
				}else{
					$('.next-button').removeClass('active');
				}
			}else{
				var error = validateRequiredFields();
				if(!error){
					$('.next-button').addClass('active');
				}else{
					$('.next-button').removeClass('active');
				}
			}
		});

		if(globals.view_mode == 'mob'){
			$('.timeline-list').slick(globals.formSliderOptions).on('setPosition', function(event, slick){
				//console.log('setPosition');
				var cs_index = ~~$('.timeline-list').slick('slickCurrentSlide');
				var slide = $('div[data-slick-index="'+cs_index+'"]');
				if(!validateSlideRequiredFields(slide)){
					$('.next-button').addClass('active');
				}else{
					$('.next-button').removeClass('active');
				}
			}).on('afterChange', function(event, slick, currentSlide, nextSlide){
				var slide = $('div[data-slick-index="'+currentSlide+'"]');
				var css_classes = $(slide).attr('class').split(' ');
				$('#current_step_icon').removeClass().addClass(css_classes[0] + ' active');
				//console.log(css_classes);
				if(!validateSlideRequiredFields(slide)){
					$('.next-button').addClass('active');
				}else{
					$('.next-button').removeClass('active');
				}
			});

			if(globals.wh < 500){
				/*$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px',
				});*/
			}
		}else{
			//$('.timeline-list').slick('unslick');
		}

		$('.next-button').on('click', function(){
			if(globals.view_mode == 'mob'){
				var slides_count = ~~$('.timeline-list .slick-slide').length;
				var cs_index = ~~$('.timeline-list').slick('slickCurrentSlide');
				var slide = $('div[data-slick-index="'+cs_index+'"]');
				//console.log(slides_count);
				if(!validateSlideRequiredFields(slide)){
					//console.log(0);
					//console.log(cs_index);
					if((cs_index+1) < slides_count){
						$('.timeline-list').slick('slickNext');
					}else{
						var form = $('form');
						//console.log(form);
						form.submit();
					}
				}else{
					//console.log(1);
					alert("Please complete all fields marked in red.");
				}
			}else{
				if(!validateRequiredFields()){
					// alert(1)
					var form = $('form');
					//console.log(form);
					form.submit();
				}else{
					alert("Please complete all fields marked in red.");
				}
			}
		});

		$('.back-button').on('click', function(){
			if(globals.view_mode == 'mob'){
				var cs_index = ~~$('.timeline-list').slick('slickCurrentSlide');
				//alert(cs_index);
				if(cs_index == 0){
					goBack();
				}else{
					$('.timeline-list').slick('slickPrev');
				}
			}else{
				goBack();
			}
		});

		$('.personal-info').find('input:required').on('focusout keyup', function(){
			if($(this).val() != ''){
				$(this).removeClass('invalid');
			}
		});

	}
	//END Personal Info page

	//Beneficiary Info page
	if($('.content.beneficiary').length){

		var recountsBfs = function(){
			$("#benef_fields .beneficiary_item").each(function(i, e){
				$(this).find('.beneficiary-id').find('.number').text(i+1);
			});
		};

		$("#benef_fields").on('focusin', 'input, .bootstrap-select', function(){
			//$('.timeline-list > div').removeClass('active');
			$(this).parents('.row-input').addClass('active').find('.form-group').addClass('active').find('label').addClass('active');
		}).on('click', '.remove-bf:visible', function(){
			$(this).parents('.beneficiary_item').slideUp(200, function(){
				$(this).remove();
				recountsBfs();
				if(globals.ww > 768){
					$('.main-questions .scroll-bar').jScrollPane({
						verticalDragMinHeight: 82,
						verticalDragMaxHeight: 82,
						contentWidth: '0px'
					});
				}
			});
		});

		$("#benef_fields").on('keyup blur change', 'input, .bootstrap-select', function(){
			var error = validateFields();
			if(!error){
				$('.next-button').addClass('active');
			}else{
				$('.next-button').removeClass('active');
			}
		});

		$('.next-button').on('click', function(){
			if(!validateFields()){
				$(this).attr('disabled', true);
				// alert(1)
				var form = $('form');
				//console.log(form);
				form.submit();
			}else{
				alert("Please complete all fields marked in red.");
			}
		});

		$('.back-button').on('click', function(){
			goBack();
		});

		if($('.beneficiary-id').length){
			$('.add-beneficiary').on('click', function(){
				var bf_id = $('.beneficiary-id').length + 1;
				$.ajax({
					type: "GET",
					dataType: "json",
					data: 'bf_id=' + bf_id,
					url: "/beneficiary-ajax/",
					complete: function(data){
						$('#benef_fields').append(data.responseText);
						$('#benef_fields').find('.beneficiary_item:not(:first-child)').find('.remove-bf').removeClass('hide');
						if(globals.ww > 768){
							$('.main-questions .scroll-bar').jScrollPane({
								verticalDragMinHeight: 82,
								verticalDragMaxHeight: 82,
								contentWidth: '0px'
							});
						}
						$('.selectpicker').selectpicker({'mobile': globals.device});

						var error = validateFields();
						if(!error){
							$('.next-button').addClass('active');
						}else{
							$('.next-button').removeClass('active');
						}

					}
				});
			});
		}

	}
	//END Beneficiary Info page

	//Payment Info Info page
	if($(".content.payment-info").length){
		$(".payment-info input").on('focusin', function(){
			//$('.row-input').removeClass('active');
			//$(this).parents('.row-input').addClass('active');
			$(this).parents('.row-input').addClass('active').find('.form-group').addClass('active').find('label').addClass('active');
		});

		$(".payment-info .payment-fields").find('.row-input:first-child').find('input[type="text"]').focus().end().find('label').addClass('active');

		$(".payment-info input").on('keyup', function(){
			var error = validateFields();
			if(!error){
				$('.next-button').addClass('active')
			}else{
				$('.next-button').removeClass('active')
			}
		});

		$('.next-button').on('click', function(){
			if(!validateFields()){
				//alert("All fields are filled correctly.");
				var form = $('form');
				//console.log(form);
				form.submit();
				console.log('Payment submit');
				return false;
			}else{
				alert("Please complete all fields marked in red.");
			}
		});

		$('.back-button').on('click', function(){
			goBack();
		});
	}
	//END Payment Info page

	$('.birthday>input').inputmask('mm/dd/yyyy', {
		oncomplete: function(){
			var age = getAge($(this).val());
			if(age > 65 || age < 18){
				showErrorMessage($(this).siblings('.error-input'))
				return false;
			}
			sendPlanAjax();
		}
	});

	$('.birthday>input').on('focusin keydown', function(){
		hideErrorMessage($(this).siblings('.error-input'));
	});

	$('.index .birthdate select').on('focusin', function(){
		hideErrorMessage($(this).parents('.birthdate').find('.error-input'));
	});

	$('.index .birthdate select').on('change', function(){
		var $m = $('#birth_month');
		var $d = $('#birth_day');
		var $y = $('#birth_year');
		correctDateSelectsOptions($d, $m, $y, 0);
		var m = $m.val();
		var d = $d.val();
		var y = $y.val();
		var bd = m+'/'+d+'/'+y;
		$('#birthdate').val(bd);
		var age = getAge(bd);
		if(age > 65 || age < 18){
			console.log(age);
			showErrorMessage($(this).parents('.birthdate').find('.error-input'));
			return false;
		}
		sendPlanAjax();
	});

	// Applynow widget form
	$('.applynow-form-section.widget .birthdate select').on('change', function(){
		var $m = $('#birth_month');
		var $d = $('#birth_day');
		var $y = $('#birth_year');
		correctDateSelectsOptions($d, $m, $y, 1);
	});

	if($('.applynow-form-section.widget').length){
		$('.applynow-form-section.widget').find('input:required').on('focusout keyup', function(){
			if($(this).val() != ''){
				$(this).removeClass('invalid');
			}
		});
	}
	// END Applynow widget form

	// Intermediary questions
	if($('#intermediary').length){
		var validateIntermediaryQuestions = function(){
			var error = false;
			var $hiddens = $('#intermediary .button-block').find('input[type="hidden"]');
			//console.log($hiddens);
			$hiddens.each(function(){
				if($(this).val() == ''){
					error = true;
				}
			});

			return error;
		};

		$('#intermediary .question').on('click', '.yes-button.sub-button, .no-button.sub-button', function(){
			var $button = $('#intermediary .button').find('button[type="submit"]');
			var $parent = $(this).parents('.question');
			$parent.find('.sub-button').removeClass('active');
			$(this).addClass('active');
			$parent.find('input[type="hidden"]').val($(this).text());
			if(validateIntermediaryQuestions()){
				//alert("Please answer for all questions.");
				$button.attr('disabled', true).removeClass('btn-success').addClass('btn-info');
			}else{
				$button.attr('disabled', false).removeClass('btn-info').addClass('btn-success');
			}
		});
	}
	// END Intermediary questions

	// start_index = day dropdown list first <li> data-original-index attr value
	function correctDateSelectsOptions($d, $m, $y, start_index){
		var m = ~~$m.val();
		var d = ~~$d.val();
		var y = ~~$y.val();
		var vy = y%4;
		var months_days = {1:31, 2:28, 3:31, 4:30, 5:31, 6:30, 7:31, 8:31, 9:30, 10:31, 11:30, 12:31};
		if(vy == 0){
			months_days[2] = 29;
		}
		var $day_list = $d.parent().find('.dropdown-menu.inner');
		var $day_btn = $d.parent().find('button.dropdown-toggle');
		var index = start_index+(-1);
		$day_list.find('li').show();
		for(var i = 31; i > months_days[m]; i--){
			$day_list.find('li[data-original-index="'+(i+index)+'"]').hide();
		}
		console.log(y, m, d, months_days[m], months_days[m]+index);
		if(d > months_days[m]){
			$d.find('option').removeAttr('selected');
			$d.find('option[value="'+months_days[m]+'"]').attr('selected', true);
			$day_list.find('li.selected').find('a').attr('aria-selected', false).end().removeClass('selected');
			$day_list.find('li[data-original-index="'+(months_days[m]+index)+'"]').find('a').attr('aria-selected', true).end().addClass('selected');
			$day_btn.attr('title', months_days[m]).find('.filter-option').text(months_days[m]);
		}
	}

	function showErrorMessage(inputField){
		if(inputField.length){
			inputField.css('top', (inputField.outerHeight() + 2) * -1);
			inputField.fadeIn();
		}
	}

	function hideErrorMessage(inputField){
		inputField.fadeOut();
	}

	function getAge(date){
		var today = new Date();
		var birthDate = new Date(date);
		var age = today.getFullYear() - birthDate.getFullYear();
		var m = today.getMonth() - birthDate.getMonth();
		if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())){
			age--;
		}
		return age;
	}

	$('.weight>input').on("focusin", function(){
		hideErrorMessage($(this).siblings('.error-input'));
	});

	$('.weight>input').on("keyup", function(){
		hideErrorMessage($(this).siblings('.error-input'))

		if(this.value.match(/[^0-9]/g)){
			this.value = this.value.replace(/[^0-9]/g, '');
		}
		if(this.value.length > 3){
			this.value = this.value.slice(0, 3);
			return false;
		}

		if(this.value.length > 1){
			if(this.value < 84 || this.value > 402){
				showErrorMessage($(this).siblings('.error-input'));
				return false;
			}
			sendPlanAjax();
		}
	});

	$('#avarage_amount, #sex, #state, #tobaco, #h_foot, #h_inch').on('change', function(){
		sendPlanAjax();
	});

	$('.main-index').on('click', '.btn-apply', function(){
		var data = {};
		var form = $('form');
		var term = parseInt($(this).parents('.plan').find('.term').text(), 10);
		var rateClass = $(this).parents('.plan').find('.rate-class').text();
		var montlyPremium = $(this).parents('.plan').find('.price-monthly').text() ;
		var premiumAmount = $(this).parents('.plan').find('.price-annual').text() ;
		console.log(premiumAmount);
		console.log(montlyPremium);
		//console.log(term);
		form.append('<input type="hidden" name="CustomerData[term]" value="' + term + '" />');
		form.append('<input type="hidden" name="CustomerData[rate_class]" value="' + rateClass + '" />');
		form.append('<input type="hidden" name="CustomerData[monthly_premium]" value="' + montlyPremium + '" />');
		form.append('<input type="hidden" name="CustomerData[premium_amount]" value="' + premiumAmount + '" />');
		form.submit();
	});

	function refreshSlickHeight(parent_obj){
		var $items = $(parent_obj).find('.item.slick-slide'),
			final_h = 0;
		console.log('refreshSlickHeight');
		$items.each(function(){
			var h = $(this).height();
			if(h > final_h){
				final_h = h;
			}
		});
		$(parent_obj).find('.item.slick-slide').height(final_h);
	}

	if(($('body.about').length || $('body.careers').length) && globals.ww > 767){
		$('.slick-blocks').on('init', function(slick){
			console.log('about.slick.init');
			setTimeout(function(){
				refreshSlickHeight($('.slick-blocks'));
			}, 200);
		}).slick(globals.blocksSliderOptions);

		var tm = null;
		$(window).resize(function(){
			if(tm != null){
				clearTimeout(tm);
			}
			tm = setTimeout(function(){
				console.log('about.slick.resize');
				refreshSlickHeight($('.slick-blocks'));
			}, 200);
		});
	}

	if($('body.applynow').length){
		//if(globals.device == 'mob' || globals.ww > 767){
		$('.slick-left').slick(globals.leftSliderOptions);
		//}

		$('.applynow .birthdate select').on('change', function(){
			var $m = $('#birth_month');
			var $d = $('#birth_day');
			var $y = $('#birth_year');
			correctDateSelectsOptions($d, $m, $y, 1);
		});

		$('#submit_btn').on('click', function(){
			var error = validateApplyNowFields();
			//console.log(error);
			var $form = $(this).parent('form'),
				data = $form.data('yiiActiveForm');
			//console.log(data);
			if(!error){
				$form.submit();
			}else{
				alert("Please complete all fields marked in red.");
				return false;
			}
		});
	}

	if($('.grid-slider').length){
		$('.grid-slider').slick(globals.gridSliderOptions);
	}

	$('.resources #category_id').on('change', function(){
		var url = $(this).val();
		if(url != ''){
			window.location.href = url;
		}
	});

	//Apply-now2 page
	if($("body.applynow2").length){
		var slides_count = $("body.applynow2 .slide-form .item").length;
		//console.log(slides_count);
		/*$(".applynow2 input").on('focusin', function(){
			$('.timeline-list li').removeClass('active');
			$(this).parents('li').addClass('active');
		});*/

		$('.applynow2 input[type="text"]').on('keyup', function(){
			var error = validateFields();
			if(!error){
				//$('.next-button').addClass('active')
			}else{
				//$('.next-button').removeClass('active')
			}
		});

		if(globals.device == 'mob' || globals.ww < 768){
			globals.formSliderOptions.adaptiveHeight = true;
		}

		$('.slide-form').slick(globals.formSliderOptions).on('afterChange', function(event, slick, currentSlide, nextSlide){
			var slide = $('div[data-slick-index="'+currentSlide+'"]');
			if(currentSlide == 0){
				$('.prev-button').hide();
			}else{
				$('.prev-button').show();
			}
			if(currentSlide == slides_count-1){
				$('.continue-button').hide();
				$('.submit_btn').show();
			}else{
				$('.submit_btn').hide();
				$('.continue-button').show();
			}
			//console.log(currentSlide);
		});

		$('.continue-button').on('click', function(){
			var cs_index = ~~$('.slide-form').slick('slickCurrentSlide');
			var slide = $('div[data-slick-index="'+cs_index+'"]');
			//console.log(slide);
			if(!validateApplyNowSlideFields(slide)){
				$('.slide-form').slick('slickNext');
			}else{
				alert("Please complete all fields marked in red.");
			}
		});

		$('.prev-button').on('click', function(){
			$('.slide-form').slick('slickPrev');
		});
	}
	//END Apply-now2 page

	$('input[type="text"], input[type="tel"], input[type="email"], select').on('focus change', function(){
		$(this).parent().removeClass('error').end().removeClass('error');
	});

	//Home page
	if($("#hp-applynow-form").length){
		var wrap, current_fs, next_fs, previous_fs, index; //fieldsets
		var left, opacity, scale; //fieldset properties which we will animate
		var animating; //flag to prevent quick multi-click glitches

		wrap = $('.applynow-form-section');

		$('#hp-applynow-form .birthdate select').on('change', function(){
			var $m = $('#birth_month');
			var $d = $('#birth_day');
			var $y = $('#birth_year');
			correctDateSelectsOptions($d, $m, $y, 1);
		});

		$('.submit-button').on('click', function(){
			current_fs = $(this).parents('fieldset');
			index = $("fieldset").index(current_fs);
			//console.log(index);

			var error = validateApplyNowSlideFields(current_fs);
			var $form = $(this).parent('form'),
				data = $form.data('yiiActiveForm');
			//console.log(data);
			if(!error){
				$("#progressbar li").eq(index-1).addClass("checked");
				setTimeout(function(){
					$form.submit();
				}, 500);
			}else{
				alert("Please complete all fields marked in red.");
				return false;
			}
		});

		$(".next").click(function(){

			current_fs = $(this).parents('fieldset');
			next_fs = $(this).parents('fieldset').next();
			index = $("fieldset").index(next_fs);
			//console.log(current_fs);

			if(!validateApplyNowSlideFields(current_fs)){
				if(animating) return false;
				animating = true;

				//activate next step on progressbar using the index of next_fs
				if(index > 0){
					$("#progressbar li").eq(index-1).addClass("active");
				}
				if(index > 1){
					$("#progressbar li").eq(index-2).addClass("checked");
				}

				//show the next fieldset
				next_fs.show();
				var h = next_fs.height()+72+10;
				wrap.height(h);

				//hide the current fieldset with style
				current_fs.animate({opacity: 0}, {
					step: function(now, mx) {
						//as the opacity of current_fs reduces to 0 - stored in "now"
						//1. scale current_fs down to 80%
						scale = 1 - (1 - now) * 0.2;
						//2. bring next_fs from the right(50%)
						left = (now * 50)+"%";
						//3. increase opacity of next_fs to 1 as it moves in
						opacity = 1 - now;
						current_fs.css({
							'transform': 'scale('+scale+')',
							'position': 'absolute'
						});
						next_fs.css({'left': left, 'opacity': opacity});
					},
					duration: 800,
					complete: function(){
						current_fs.hide();
						animating = false;
						//console.log(index);
						if(index == 1){
							$("#progressbar").removeClass('h0');
						}
					},
					easing: 'easeInOutBack'
				});
			}else{
				alert("Please complete all fields marked in red.");
			}
		});

		/*
		var slides_count = $(".hp-slide-form .item").length;

		$('.hp-slide-form .birthdate select').on('change', function(){
			var $m = $('#birth_month');
			var $d = $('#birth_day');
			var $y = $('#birth_year');
			correctDateSelectsOptions($d, $m, $y, 1);
		});

		$('.hp-slide-form input[type="text"]').on('keyup', function(){
			var error = validateFields();
			if(!error){
				//$('.next-button').addClass('active')
			}else{
				//$('.next-button').removeClass('active')
			}
		});

		if(globals.device == 'mob' || globals.ww < 768){
			globals.formHomeOptions.adaptiveHeight = true;
		}

		$('.hp-slide-form').slick(globals.formHomeOptions).on('afterChange', function(event, slick, currentSlide, nextSlide){
			var slide = $('div[data-slick-index="'+currentSlide+'"]');
			if(currentSlide == 0){
				$('.continue-button').removeClass('hidden');
				$('.submit-button, .next-button, #progressbar').addClass('hidden');
			}else{
				$('.submit-button, .continue-button').addClass('hidden');
				$('.next-button, #progressbar').removeClass('hidden');
			}
			if(currentSlide == slides_count-1){
				$('.continue-button, .next-button').addClass('hidden');
				$('.submit-button').removeClass('hidden');
			}else{
			}
			//console.log(currentSlide);
		});

		$('.continue-button, .next-button').on('click', function(){
			var cs_index = ~~$('.hp-slide-form').slick('slickCurrentSlide');
			var slide = $('div[data-slick-index="'+cs_index+'"]');
			//console.log(slide);
			if(!validateApplyNowSlideFields(slide)){
				$('.hp-slide-form').slick('slickNext');
				$("#progressbar li").eq(cs_index).addClass("active");
			}else{
				alert("Please complete all fields marked in red.");
			}
		});

		$('.submit-button').on('click', function(){
			var cs_index = ~~$('.hp-slide-form').slick('slickCurrentSlide');
			var slide = $('div[data-slick-index="'+cs_index+'"]');
			//console.log(slide);
			var error = validateApplyNowSlideFields(slide);
			var $form = $(this).parent('form'),
				data = $form.data('yiiActiveForm');
			//console.log(data);
			if(!error){
				$form.submit();
			}else{
				alert("Please complete all fields marked in red.");
				return false;
			}
		});
		*/
	}
	//END home page



	// LANDING PAGES
	if($('.landing-page').length){

		/*setTimeout(function(){
			$('.toster').removeClass('hideme');
		}, 2000);*/

		var closeQForm = function(){
			$('.f-question').addClass('hide').remove();
			$('.f-label').removeClass('col-lg-7 col-lg-pull-5 col-md-6 col-md-pull-6 col-sm-5 col-sm-pull-7');
		};

		var animateSort = function(parent, child, sortAttribute) {
			var promises = [];
			var positions = [];
			var originals = $(parent).find(child);
			var w = $(parent).width();
			var sorted = originals.toArray().sort(function(a, b) {
				return $(a).attr(sortAttribute) > $(b).attr(sortAttribute);
			});

			$(parent).css({'min-height': '100vh'});

			originals.each(function() {
				//store original positions
				positions.push($(this).position());
			}).each(function(originalIndex) {
				//change items to absolute position
				var $this = $(this);
				var newIndex = sorted.indexOf(this);
				sorted[newIndex] = $this.clone(); //copy the original item before messing with its positioning
				$this.css({"position": "absolute", "top": positions[originalIndex].top + "px", "left": positions[originalIndex].left + "px", "width": w+"px"});

				//animate to the new position
				var promise = $this.animate({
					top: positions[newIndex].top + "px",
					left: positions[newIndex].left + "px"
				}, 1000);
				promises.push(promise);
			});

			//instead of leaving the items out-of-order and positioned, replace them in sorted order
			$.when.apply($, promises).done(function() {
				originals.each(function(index) {
					//console.log(sorted[index]);
					$(sorted[index]).find('.number').text('#'+(index+1));
					$(this).replaceWith(sorted[index]);
				});
			});
		};

		var animateSort2 = function(parent, child){
			var ul = document.getElementById(parent),
				lis = ul.querySelectorAll(child),
				liHeight = [];//lis[0].offsetHeight;
			ul.style.height = ul.offsetHeight+'px';
			var h = 0;

			/*for(var i = 0, l = lis.length; i < l; i++) {
				var li = lis[i];
				liHeight[i] = li.offsetHeight;
				//h += liHeight[i] + 10;
				li.style.position = 'absolute';
				li.style.top = liHeight[i] + 10 + 'px';
				console.log(i, li.style.top);
			}*/
			console.log(liHeight);
			tinysort('#'+parent+'>'+child,{data:'weight'}).forEach(function(elm, i){
				setTimeout((function(elm, i){
					elm.style.top = i * liHeight[i] + (i * 10) + 'px';
					//elm.style.position = 'relative';
					$(elm).find('.number').text('#'+(i+1));
				}).bind(null,elm,i),40);
			});
		};

		$('#submit_answer_yes').on('click', function(){
			//animateSort("#sorting_list", ".item", "data-weight");
			animateSort2("sorting_list", ".item");
			closeQForm();
		});

		$('#submit_answer_no').on('click', function(){
			closeQForm();
		});

		$('.toster .close').on('click', function(){
			$(this).parent().addClass('hideme');
		});

		$('.lpModal .btn-modal').on('click', function(){
			$('#lpModal').modal('hide');
		});

		$('#lpModal').on('show.bs.modal', function(e){
			var $button = $(e.relatedTarget);
			var $button_parent = $button.parents('.item');
			var $logo = $button_parent.find('.company-logo').clone();
			var $content = $button_parent.find('.modal-cont').clone();
			var $link = $button_parent.find('.view-rates').clone();
			var peoples_count = $button_parent.data('peoples-count');
			var company_name = $button_parent.data('company-name');
			$(this)
				.find('.modal-title').html($logo)
				.end()
				.find('.modal-body').html($content)
				.end()
				.find('.btn-quote').attr('href', $link.attr('href'));

			var $toster = $('.toster');
			var template = $toster.data('template');
			var text = template.replace('{peoples-count}', peoples_count).replace('{company-name}', company_name);
			$toster.find('.text').html(text);
			$toster.removeClass('hideme');
		});
	}



	$(document)
		.on('click', '.short-links-list a[href^="#"]', MAIN.sticky_a_click)
		.on('click', '.start-over, .sticky-block a:not([aria-relevant="tabcontent"])[href^="#"]', MAIN.sticky_a_click)
		.on('submit', '#compare-form', COMPARISON.form_submit)
		.on('click', '.applynow-form-section.widget #submit_btn', RATE_CALC.applynow_widget__submit_btn_click)
		.on('click', '#rate-calc-form #submit_btn, #rate-calc-form .submit_question', RATE_CALC.form_submit_btn_question)
		.on('input', '#rate-calc-form #guess_price', RATE_CALC.guess_price_input)
		.on('click', '#rate-calc-form input:radio', RATE_CALC.form_input_radio_click)
		.on('click change mouseover mouseout', '#rate-calc-form .rating input', RATE_CALC.form_rating_input_radio_events)
		.on('submit', '#rate-calc-form', RATE_CALC.form_submit);

});



jQuery(document).ready(function($){
	var $timeline_block = $('.cd-timeline-block');

	//hide timeline blocks which are outside the viewport
	$timeline_block.each(function(){
		if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
			$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		}
	});

	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		$timeline_block.each(function(){
			if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
				$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	});
});
