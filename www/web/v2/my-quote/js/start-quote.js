$(document).ready(function(){
	"use strict";

	var SQJS = {
		options: {
			device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
			ww: $(window).width(),
			wh: $(window).height(),
		},
		vars: {
			my_range_slider: null,
		},
		el: {},
		routs: {},
		Init: function(){
			this.initEvents();
			this.initRangeSlider();
			this.updateRangeSlider();
		},
		initEvents: function(){
			$(document)
				.on('click', '#start-quote input[data-type="term"]', SQJS.updateRangeSlider)
				.on('mouseup', '[data-trigger="js_action_mouseup"]', SQJS.doAction)
				.on('blur', '[data-trigger="js_action_blur"]', SQJS.doAction)
				.on('change', '[data-trigger="js_action_change"]', SQJS.doAction)
				.on('click', '[data-trigger="js_action_click"]', SQJS.doAction)
				.on('submit', '[data-trigger="js_action_submit"]', SQJS.doAction);

		},
		doAction: function(e){
			var $this = $(this),
				action = $(this).data('action');

			switch(action){
				default:
					break;
			}

			e.preventDefault();
		},
		initRangeSlider: function(){
			$(".js_range_slider2").ionRangeSlider({
				skin: "round",
				//values: marks,
				grid: true,
				//from: 4,
				prefix: "$",
				hide_min_max: true,
				step: 50000
			});

			SQJS.vars.my_range_slider = $(".js_range_slider2").data("ionRangeSlider");
		},
		updateRangeSlider: function(){
			var val = null,
				values = [];

			if($(this).data('type')){
				val = $(this).val();
			}else{
				val = $('#start-quote input[data-type="term"]:checked').val();
			}

			if(SQJS.vars.my_range_slider != null){
					values = (val == 'rt')
					? ['100k','150k','200k','250k','300k']
					: ['100k','150k','200k','250k','300k','400k','500k','600k','700k','800k','900k','1m'];

				console.log(val);
				SQJS.vars.my_range_slider.update({'values': values});
			}
		},
	};

	SQJS.Init();


});
