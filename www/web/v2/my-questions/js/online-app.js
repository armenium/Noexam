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
		routes: {},
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
					.on('submit', '[data-trigger="js_action_submit"]', OAPPJS.Core.doAction);
			},
			doAction: function(e){
				var $this = $(this),
					action = $(this).data('action');

				switch(action){
					case "online_app_next":
						OAPPJS.Form.Submit($this);
						break;
					case "online_app_back":
						OAPPJS.Form.GoBack($this);
						break;
					default:
						break;
				}

				e.preventDefault();
			},
		},
		Form: {
			validateRequiredFields: function(){
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
			},
			Submit: function($btn){
				if(!OAPPJS.Form.validateRequiredFields()){
					var form = $('form');
					form.submit();
				}else{
					alert("Please complete all fields marked in red.");
				}
			},
			GoBack: function($btn){
				$.ajax({
					type: "POST",
					dataType: "json",
					url: "my-questions/ajax",
					data: {current_url: window.location.href},
					complete: function(data){
						console.log(data.responseText);
						if(data.responseText != ''){
							//window.location.href = data.responseText;
						}
					}
				});
			},
		},
	};


	OAPPJS.Init();
});
