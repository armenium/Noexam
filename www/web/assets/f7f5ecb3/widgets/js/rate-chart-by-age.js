if(typeof jQuery === "undefined"){
	throw new Error("Frontend requires jQuery");
}

$(function(){
	"use strict";

	$.fn.exists = function(){
		return this.length !== 0;
	};

	var RCBAJS = {
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
			js_rate_chart_by_age_prev_btn: $('#js_rate_chart_by_age_prev_btn'),
			js_rate_chart_by_age_next_btn: $('#js_rate_chart_by_age_next_btn'),
		},
		Init: function(){
			this.Core.initEvents();
			this.Tabs.Init();
		},
		Core: {
			initEvents: function(){
				$(document)
					.on('mouseup', '[data-trigger="js_action_mouseup"]', RCBAJS.Core.doAction)
					.on('blur', '[data-trigger="js_action_blur"]', RCBAJS.Core.doAction)
					.on('change', '[data-trigger="js_action_change"]', RCBAJS.Core.doAction)
					.on('click', '[data-trigger="js_action_click"]', RCBAJS.Core.doAction)
					.on('submit', '[data-trigger="js_action_submit"]', RCBAJS.Core.doAction);
			},
			doAction: function(e){
				var $this = $(this),
					action = $(this).data('action');

				switch(action){
					case "change_tab":
						RCBAJS.Tabs.changePrevNextTab($this);
						break;
					case "change_ages_tab":
						RCBAJS.Tabs.changeAgesTab($this);
						break;
					case "change_terms_tab":
						RCBAJS.Tabs.changeTermsTab($this);
						break;
					default:
						break;
				}

				e.preventDefault();
			},
		},
		Tabs: {
			Init: function(){
				this.fillAgesSelect();
			},
			changePrevNextTab: function($btn){
				var dir = $btn.data('direction'),
					$target = $($btn.data('target')),
					prev_text = '',
					next_text = '';

				//console.log(dir, $target);

				switch(dir){
					case "prev":
						var $prev_a = $target.find('a.active').parent('li').prev('li').find('a');
						//console.log($prev_a.exists());
						if(!$prev_a.exists()){
							$prev_a = $target.find('li:last').find('a');
						}
						$prev_a.tab('show');
						break;
					case "next":
						var $next_a = $target.find('a.active').parent('li').next('li').find('a');
						//console.log($next_a.exists());
						if(!$next_a.exists()){
							$next_a = $target.find('li:first').find('a');
						}
						$next_a.tab('show');
						break;
				}

				prev_text = $target.find('a.active').parent('li').prev('li').find('a').text();
				if(prev_text == ''){
					prev_text = $target.find('li:last').find('a').text();
				}
				next_text = $target.find('a.active').parent('li').next('li').find('a').text();
				if(next_text == ''){
					next_text = $target.find('li:first').find('a').text();
				}
				//console.log(prev_text, next_text);

				RCBAJS.els.js_rate_chart_by_age_prev_btn.find('span').text(prev_text);
				RCBAJS.els.js_rate_chart_by_age_next_btn.find('span').text(next_text);

			},
			changeAgesTab: function($this){
				var $target = $($this.data('target'));

				$target.find('.gender-tab.active').find('.custom-age-tabs').find('[aria-controls="'+$this.val()+'"]').tab('show');
			},
			changeTermsTab: function($this){
				var $target = $($this.data('target'));

				$target.find('[aria-controls="'+$this.val()+'"]').tab('show');

				RCBAJS.Tabs.fillAgesSelect();
			},
			fillAgesSelect: function(){
				
			},
		},
	};


	RCBAJS.Init();
});
