if(typeof jQuery === "undefined"){
	throw new Error("Frontend requires jQuery");
}

$(function(){
	"use strict";

	$.fn.exists = function(){
		return this.length !== 0;
	};

	var ANFJS = {
		options: {
			device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
			lg: [1920, 1200],
			md: [1199, 992],
			sm: [991, 768],
			xs: [767, 576],
			xxs: [575, 0],
		},
		vars: {},
		routes: {},
		els: {
			body: $("body"),
			js_selectpicker: $(".js_selectpicker"),
		},
		Init: function(){
			this.vars.csrf_param = $('meta[name="csrf-param"]').attr('content');
			this.vars.csrf_token = $('meta[name="csrf-token"]').attr('content');

			this.Core.initEvents();
			this.Forms.stylingSelect();
		},
		Core: {
			initEvents: function(){
				$(document)
					.on('mouseup', '[data-trigger="js_action_mouseup"]', ANFJS.Core.doAction)
					.on('blur', '[data-trigger="js_action_blur"]', ANFJS.Core.doAction)
					.on('change', '[data-trigger="js_action_change"]', ANFJS.Core.doAction)
					.on('click', '[data-trigger="js_action_click"]', ANFJS.Core.doAction)
					.on('submit', '[data-trigger="js_action_submit"]', ANFJS.Core.doAction)
					.on('focus change', 'input[required], select[required]', ANFJS.Forms.removeElementsErrors);
			},
			doAction: function(e){
				var $this = $(this),
					action = $(this).data('action');

				switch(action){
					case "apply_now_form_submit":
						ANFJS.Forms.submitForm($this);
						break;
					default:
						break;
				}

				e.preventDefault();
			},
		},
		Forms: {
			stylingSelect: function(){
				if(ANFJS.els.js_selectpicker.exists())
					ANFJS.els.js_selectpicker.selectpicker({'mobile': ANFJS.options.device});
			},
			submitForm: function($btn){
				var $form = $btn.parents('form');
				var error = ANFJS.Forms.validateForm($form);

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

					return false;
				}
			},
			validateForm: function($form){
				var error = 0;
				var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

				//console.log($form.find('input:required, select:required').length);

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

				//console.log(error ? 1 : -1);

				return error;
			},
			removeElementsErrors: function(){
				$(this).parent().removeClass('error').end().removeClass('error input--invalid');
			}
		},
	};


	ANFJS.Init();
});
