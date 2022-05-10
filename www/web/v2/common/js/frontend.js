var RECAPTCHA = {
	test: function(token){
		//console.log(token);
	},
};

if(typeof jQuery === "undefined"){
	throw new Error("Frontend requires jQuery");
}

$(function(){
	"use strict";

	$.fn.exists = function(){
		return this.length !== 0;
	};

	var FJS = {
		options: {
			device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
			lg: [1920, 1200],
			md: [1199, 992],
			sm: [991, 768],
			xs: [767, 576],
			xxs: [575, 0],
		},
		vars: {
			ww: 0,
			wh: 0,
			scrollTop: 0,
			scrollTopPrev: 0,
			scroll_dir: 'bottom',
			min_scroll_limit: 200,
			nav_tabs: {
				fitting: false,
				items: {},
			},
			csrf_param: null,
			csrf_token: null,
			max_compare_items: 3,
			modal: null,
			tooltip: null,
			lazyLoadInstance: null,
			my_range_slider: null,
		},
		routes: {
			ajax_get_partials_content: '/ajax-get-partials-content/'
		},
		els: {
			head: $("head"),
			body: $("body"),
			js_loader: $(".js_data_loader"),
			js_header: $("#js_header"),
			js_selectpicker: $(".js_selectpicker"),
			js_quote_results: $("#js_quote_results"),
			js_rate_from_modal: $('#js_rate_from_modal'),
		},
		Init: function(){
			this.vars.ww = $(window).width();
			this.vars.wh = $(window).height();
			this.vars.csrf_param = $('meta[name="csrf-param"]').attr('content');
			this.vars.csrf_token = $('meta[name="csrf-token"]').attr('content');

			this.Core.initEvents();

			this.Forms.Init();
			this.Common.Init();
		},
		Core: {
			initEvents: function(){
				$(window)
					.on('scroll', FJS.Core.eventScrollWindow)
					.on('resize orientationchange deviceorientation', FJS.Core.eventResizeWindow);

				$(document)
					.on('mouseup', '[data-trigger="js_action_mouseup"]', FJS.Core.doAction)
					.on('blur', '[data-trigger="js_action_blur"]', FJS.Core.doAction)
					.on('change', '[data-trigger="js_action_change"]', FJS.Core.doAction)
					.on('click', '[data-trigger="js_action_click"]', FJS.Core.doAction)
					.on('submit', '[data-trigger="js_action_submit"]', FJS.Core.doAction)
					.on('focus change', 'input[required], select[required]', FJS.Forms.removeElementsErrors);
			},
			eventResizeWindow: function(){
				FJS.vars.ww = $(window).width();
				FJS.vars.wh = $(window).height();

				if(FJS.vars.ww > 767){

				}

				FJS.Common.doEqualHeight();
			},
			eventScrollWindow: function(){
				FJS.vars.scrollTop = $(window).scrollTop();
				if(FJS.vars.scrollTopPrev > 0){
					if(FJS.vars.scrollTop > FJS.vars.scrollTopPrev){
						FJS.vars.scroll_dir = 'bottom';
					}else{
						FJS.vars.scroll_dir = 'top';
					}
				}
				FJS.vars.scrollTopPrev = FJS.vars.scrollTop;
				FJS.Common.setScrolled();
			},
			doAction: function(e){
				var $this = $(this),
					action = $(this).data('action'),
					preventDefault = $(this).data('prevent-default');

				if(preventDefault == undefined){
					preventDefault = true;
				}

				switch(action){
					case "print":
						window.print();
						break;
					case "toggle_mobile_nav":
						FJS.Common.toggleMobileNav($this);
						break;
					case "scroll_to":
						FJS.Common.scrollTo($this, 800, 'easeOutExpo');
						break;
					case "contact_details_form_submit":
						FJS.Forms.submitContactDetails($this);
						break;
					case "term_length":
						FJS.Forms.changeTermLength($this);
						break;
					case "ajax_quote_results_request":
						FJS.ApplyNow.QuoteResult.ajaxRequest($this);
						break;
					case "quote-result-link":
						FJS.ApplyNow.QuoteResult.goToLink($this);
						break;
					case "sort_companies":
						FJS.Common.sortCompanies($this);
						break;
					default:
						break;
				}

				//console.log(preventDefault);

				if(preventDefault){
					e.preventDefault();
				}
			},
		},
		Loader: {
			start: function(){
				FJS.els.js_loader.addClass('show');
			},
			stop: function(){
				FJS.els.js_loader.removeClass('show');
			},
		},
		Storage: {
			set: function(key, value){
				sessionStorage.setItem(key, value);
			},
			get: function(key){
				return sessionStorage.getItem(key);
			}
		},
		Common: {
			Init: function(){
				FJS.Storage.set('referrer_url', document.referrer);
				FJS.Storage.set('current_url', window.location.href);
				FJS.Common.initDisclosure();
				FJS.Common.initLazyLoad();
				FJS.Common.initGetAjaxContent();
				FJS.Common.initTableSorter();
				FJS.Common.doEqualHeight();
			},
			toggleMobileNav: function($obj){
				var target = $obj.data("target");

				if(FJS.els.body.hasClass("nav-mob-opened")){
					FJS.els.body.removeClass("nav-mob-opened");
					$(target).removeClass("opened");
				}else{
					FJS.els.body.addClass("nav-mob-opened");
					$(target).addClass("opened");
				}
			},
			setScrolled: function(){
				if(FJS.els.body.hasClass("scrolled")){
					if(FJS.vars.scrollTop < FJS.vars.min_scroll_limit){
						FJS.els.body.removeClass("scrolled");
					}else{
						FJS.els.body.addClass("scrolled");
					}
				}else{
					if(FJS.vars.scrollTop >= FJS.vars.min_scroll_limit){
						FJS.els.body.addClass("scrolled");
					}else{
						FJS.els.body.removeClass("scrolled");
					}
				}
			},
			initDisclosure: function(){
				if($('[data-toggle="popover"]').length){
					$('[data-toggle="popover"]').popover({
						selector: 'a',
						//container: "main.wrapper-main",
						viewport: {"selector": "body", "padding": 30},
						toggle: "popover",
						placement: "bottom",
						trigger: "focus",
						//template: '<div class="popover" role="tooltip"><div class="close"></div><div class="popover-content"></div></div>'
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
			scrollTo: function($btn, speed, effect){
				if(speed == undefined){
					speed = 1000;
				}
				if(effect == undefined){
					effect = 'linear';
				}

				var elem = $btn.attr('href'),
					top = ~~$(elem).offset().top;

				if(top != undefined){
					if(FJS.vars.ww < 768){
						top -= 70;
					}
					$('html, body').animate({scrollTop: top}, speed, effect);
				}
			},
			sortCompanies: function($btn){
				var target = $btn.data('target'),
					is_checked = $btn.is(':checked');

				tinysort('#'+target+' > .item', {data: 'weight', order: is_checked ? 'desc' : 'asc'});
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
			initGetAjaxContent: function(){
				if($('.ajaxContent').length){
					setTimeout(function(){
						$('.ajaxContent').each(function(){
							var view_file = $(this).data('view-file');
							FJS.Common.ajaxGetPartialsContent($(this), view_file);
						});
					}, 5000);
				}
			},
			ajaxGetPartialsContent: function($container, view_file){
				$.ajax({
					type: "POST",
					url: FJS.routes.ajax_get_partials_content,
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
							FJS.Common.initLazyLoad();
						}
						if($ajax_content.find('.tablesorter').length){
							FJS.Common.initTableSorter();
						}
						if($ajax_content.find('#rate-calc-form').length){
							FJS.els.js_selectpicker = $(".js_selectpicker");
							FJS.Forms.stylingSelect();

							FJS.els.head.append('<link href="/v2/widgets/css/rate-calc-form-2.css?v=1636026061" rel="stylesheet">');
							FJS.els.body.append('<script src="/v2/widgets/js/rate-calc-form-2.js?v=1636026061"></script>');
							//RATE_CALC.init();
						}
						if($ajax_content.find('.responsive-tabs').length){
							//RESPONSIVEUI.responsiveTabs();
						}
						if($ajax_content.find('.disclosure').length){
							FJS.Common.initDisclosure();
						}
					}else if(responce.error == 1){

					}
				}).fail(function(){

				}).always(function(){

				});

			},
			doEqualHeight: function(){
				if($('[data-equal-height="1"]').length){
					var $parent = $('[data-equal-height]'),
						$elements = $($parent.data('equal-height-element')),
						breakpoint = ~~$parent.data('equal-height-breakpoint'),
						height = 0;
					console.log(breakpoint);
					$elements.removeAttr('style');

					if(FJS.vars.ww >= breakpoint){
						setTimeout(function(){
							$elements.each(function(i, p){
								if($(p).height() > height){
									height = $(p).height();
								}
							}).height(height);
						}, 2000);
					}
				}
			},
		},
		Forms: {
			Init: function(){
				FJS.Forms.initRangeSlider();
				FJS.Forms.updateRangeSlider();
				FJS.Forms.stylingSelect();
			},
			changeTermLength: function($obj){
				FJS.Forms.updateRangeSlider();
				FJS.ApplyNow.QuoteResult.ajaxRequest($obj);
			},
			initRangeSlider: function(){
				if($(".js_range_slider").exists()){
					$(".js_range_slider").ionRangeSlider({
						skin: "round",
						grid: true,
						prefix: "$",
						hide_min_max: true,
						step: 50000,
						onFinish: function(data){
							FJS.ApplyNow.QuoteResult.ajaxRequest(data.input);
						},
					});

					FJS.vars.my_range_slider = $(".js_range_slider").data("ionRangeSlider");
				}
			},
			updateRangeSlider: function(){
				if(FJS.vars.my_range_slider != null && $('#js_term_length').exists()){
					var val = $('#js_term_length').val(),
						values = (val == 'rt')
							? ['100k','150k','200k','250k','300k']
							: ['100k','150k','200k','250k','300k','400k','500k','600k','700k','800k','900k','1m'];
					//console.log(values);
					FJS.vars.my_range_slider.update({'values': values});
				}
			},
			stylingSelect: function(){
				if(FJS.els.js_selectpicker.exists()){
					FJS.els.js_selectpicker.selectpicker({'mobile': FJS.options.device});
				}
			},
			submitContactDetails: function($btn){
				var $form = $btn.parents('form');
				var error = FJS.Forms.validateForm($form);

				if(!error){
					setTimeout(function(){
						$form.submit();
					}, 500);
				}else{
					if($form.find('.err-mess').length){
						$form.find('.err-mess').remove();
					}
					$btn.before('<div class="err-mess">Please complete all fields marked in green.</div>');
					$btn.prev('.err-mess').delay(3000).fadeOut(400);
					//alert("Please complete all fields marked in green.");
					return false;
				}
			},
			validateForm: function($form){
				var error = 0;
				var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

				console.log($form.find('input:required, select:required').length);

				$form.find('input:required, select:required').each(function(){
					if(error) return false;

					if($(this).attr('type') == 'email'){
						if(!$.trim($(this).val()).match(pattern)){
							//console.log('email alert');
							$(this).parent().addClass('error').end().addClass('error input--invalid');
							error = true;
						}
					}

					if($(this).attr('type') == 'checkbox'){
						if(!$(this).is(':checked')){
							$(this).parent().addClass('error').end().addClass('error input--invalid');
							error = true;
						}
					}

					if($(this).val() == ''){
						$(this).parent().addClass('error').end().addClass('error input--invalid');
						error = true;
					}
				});

				if(error == false){
					$(this).parent().removeClass('error').end().removeClass('error input--invalid');
				}

				console.log(error ? 1 : -1);

				return error;
			},
			removeElementsErrors: function(){
				$(this).parent().removeClass('error').end().removeClass('error input--invalid');
			}
		},
		ApplyNow: {
			QuoteResult: {
				ajaxRequest: function($obj){
					var $yiiform = $($obj.data('parent'));

					FJS.Loader.start();
					$.ajax({
						type: $yiiform.attr('method'),
						url: $yiiform.attr('action'),
						data: $yiiform.serializeArray()
					}).done(function(responce){
						//console.log(responce);
						if(!responce.error && responce.html != ''){
							FJS.els.js_quote_results.html(responce.html);
						}else{

						}
						FJS.Loader.stop();
					}).fail(function(){
						FJS.Loader.stop();
					});
				},
				goToLink: function($btn){
					var url = $btn.data('url');

					if(url != ''){
						window.location.href = url;
					}
				},
			},
		},
	};


	FJS.Init();
});
