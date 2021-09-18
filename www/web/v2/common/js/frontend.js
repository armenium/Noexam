if(typeof jQuery === "undefined"){
	throw new Error("Frontend requires jQuery");
}

$(function(){
	"use strict";

	$.fn.exists = function () {
		return this.length !== 0;
	};

	var FJS = {
		options: {
			device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
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
		},
		routes: {},
		els: {
			body: $("body"),
			js_loader: $(".js_data_loader"),
			js_header: $("#js_header"),
			js_selectpicker: $(".js_selectpicker"),
		},
		Init: function(){
			this.vars.ww = $(window).width();
			this.vars.wh = $(window).height();
			this.vars.csrf_param = $('meta[name="csrf-param"]').attr('content');
			this.vars.csrf_token = $('meta[name="csrf-token"]').attr('content');

			this.initEvents();
			this.Forms.stylingSelect();
		},
		initEvents: function(){
			$(window)
				.on('scroll', FJS.eventScrollWindow)
				.on('resize orientationchange deviceorientation', FJS.eventResizeWindow);

			$(document)
				.on('blur', '[data-trigger="js_action_blur"]', FJS.doAction)
				.on('change', '[data-trigger="js_action_change"]', FJS.doAction)
				.on('click', '[data-trigger="js_action_click"]', FJS.doAction)
				.on('submit', '[data-trigger="js_action_submit"]', FJS.doAction);
		},
		eventResizeWindow: function(){
			FJS.vars.ww = $(window).width();
			FJS.vars.wh = $(window).height();

			if(FJS.vars.ww > 767){

			}
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
				action = $(this).data('action');

			switch(action){
				case "print":
					window.print();
					break;
				case "toggle_mobile_nav":
					FJS.Common.toggleMobileNav($this);
					break;
				case "contact_details_form_submit":
					FJS.Forms.submitContactDetails($this);
					break;
				default:
					break;
			}

			e.preventDefault();
		},
		Loader: {
			start: function(){
				FJS.els.js_loader.addClass('show');
			},
			stop: function(){
				FJS.els.js_loader.removeClass('show');
			},
		},
		Common: {
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
		},
		Forms: {
			stylingSelect: function(){
				if(FJS.els.js_selectpicker.exists())
					FJS.els.js_selectpicker.selectpicker({'mobile': FJS.options.device});
			},
			submitContactDetails: function($btn){
				var $form = $btn.parents('form');
				var error = FJS.Forms.validateForm($form);

				if(!error){
					setTimeout(function(){
						$form.submit();
					}, 500);
				}else{
					alert("Please complete all fields marked in red.");
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
							console.log('email alert');
							$(this).parent().addClass('error').end().addClass('error contact-details__input--invalid');
							error = true;
						}
					}
					//console.log($(this).val());
					if($(this).val() == ''){
						$(this).parent().addClass('error').end().addClass('error contact-details__input--invalid');
						error = true;
					}
				});

				if(error == false){
					$(this).parent().removeClass('error').end().removeClass('error contact-details__input--invalid');
				}

				return error;
			},
		},
	};

	FJS.Init();
});
