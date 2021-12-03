if(typeof jQuery === "undefined"){
	throw new Error("Frontend requires jQuery");
}

$(function(){
	"use strict";

	$.fn.exists = function(){
		return this.length !== 0;
	};

	var OAPPJS = {
		options: {
			device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
			lg: [1920, 1200],
			md: [1199, 992],
			sm: [991, 768],
			xs: [767, 576],
			xxs: [575, 0],
		},
		vars: {},
		routes: {
			go_back: '/my-application/gobackstep/',
			add_beneficiary: '/my-application/add-beneficiary/',
		},
		els: {},
		Init: function(){
			this.Core.initEvents();
		},
		Core: {
			initEvents: function(){
				$(document)
					.on('mouseup', '[data-trigger="js_action_mouseup"]', OAPPJS.Core.doAction)
					.on('blur', '[data-trigger="js_action_blur"]', OAPPJS.Core.doAction)
					.on('change', '[data-trigger="js_action_change"]', OAPPJS.Core.doAction)
					.on('click', '[data-trigger="js_action_click"]', OAPPJS.Core.doAction)
					.on('submit', '[data-trigger="js_action_submit"]', OAPPJS.Core.doAction)
					.on('focus change', 'input[required], select[required]', OAPPJS.Forms.removeElementsErrors);
			},
			doAction: function(e){
				var $this = $(this),
					action = $(this).data('action');

				switch(action){
					case "online_app_next":
						OAPPJS.Forms.Submit($this);
						break;
					case "online_app_back":
						OAPPJS.Forms.GoBack($this);
						break;
					case "add_beneficiary":
						OAPPJS.Forms.AddBeneficiary($this);
						break;
					case "remove_beneficiary":
						OAPPJS.Forms.RemoveBeneficiary($this);
						break;
					default:
						break;
				}

				e.preventDefault();
			},
		},
		Forms: {
			/**
			 * @return {boolean}
			 */
			Validate: function($form){
				var error = false;
				var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

				console.log('Elements count:', $form.find('input:required, select:required').length);

				$form.find('input:required, select:required').each(function(){
					var $el = $(this),
						val = $el.val();

					if($el.attr('type') == 'email'){
						if(!$.trim(val).match(pattern)){
							$el.parent().addClass('error').end().addClass('error input--invalid');
							error = true;
						}
					}

					if($el.attr('type') == 'checkbox'){
						if(!$el.is(':checked')){
							$el.parent().addClass('error').end().addClass('error input--invalid');
							error = true;
						}
					}

					if(val == ''){
						$el.parent().addClass('error').end().addClass('error input--invalid');
						error = true;
					}
				});

				console.log('error:', error);

				return error;
			},
			/**
			 * @return {boolean}
			 */
			Submit: function($btn){
				var $form = $($btn.data('target'));
				var error = OAPPJS.Forms.Validate($form);

				if(error == false){
					setTimeout(function(){
						$form.submit();
					}, 500);
				}else{
					if($form.find('.err-mess').length){
						$form.find('.err-mess').remove();
					}
					$form.append('<div class="err-mess">Please complete all fields marked in green.</div>');
					$form.find('.err-mess').delay(3000).fadeOut(400);

					return false;
				}
			},
			GoBack: function($btn){
				$.ajax({
					type: "POST",
					dataType: "json",
					url: OAPPJS.routes.go_back,
					data: {current_url: window.location.href},
				}).done(function(responce){
					console.log(responce);
					if(!responce.error && responce.redirect != ''){
						window.location.href = responce.redirect;
					}else{

					}
				}).fail(function(){

				});
			},
			removeElementsErrors: function(){
				$(this).parent().removeClass('error').end().removeClass('error input--invalid');
			},
			AddBeneficiary: function($btn){
				var $form = $($btn.data('target-form'));
				var bf_id = ~~$('.beneficiary_item').length + 1;

				$.ajax({
					type: "GET",
					dataType: "json",
					url: OAPPJS.routes.add_beneficiary,
					data: {"bf_id": bf_id},
				}).done(function(responce){
					if(!responce.error){
						$('#benef_fields').append(responce.html);
						$('.js_selectpicker').selectpicker({'mobile': OAPPJS.options.device});
						$('#benef_fields').find('.remove-bf').removeClass('d-none');

						var error = OAPPJS.Forms.Validate($form);
						if(!error){
							$('.next-button').addClass('active');
						}else{
							$('.next-button').removeClass('active');
						}

					}else{

					}
				}).fail(function(){

				});
			},
			RemoveBeneficiary: function($btn){
				var $parent = $btn.parents('.beneficiary_item');
				$parent.slideUp(200, function(){
					$parent.remove();
					OAPPJS.Forms.recountsBfs();

					if($('.beneficiary_item').length == 1){
						$('.beneficiary_item').find('.remove-bf').addClass('d-none');
					}
				});
			},
			recountsBfs: function(){
				$("#benef_fields .beneficiary_item").each(function(i, e){
					$(this).find('.beneficiary-id').find('.number').text(i+1);
				});
			},
		},
	};


	OAPPJS.Init();
});
