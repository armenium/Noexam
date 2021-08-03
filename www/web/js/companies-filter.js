$(document).ready(function(){

	var CF = {
		options: {
			view_mode: 'pc',
			device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
			ww: $(window).width(),
			wh: $(window).height(),
			rating_selected_value: '',
			health_selected_value: '...',
			rc_form: null,
			filterSidebarTop: 0,
			fixed_sidebar: false,
			max_compare_items: 4,
			get_companies_url: '/companies-filter/get-companies/',
			get_best_companies_url: '/companies-filter/get-best-companies/',
			get_comparison_url: '/companies-filter/comparison/',
			companies_url_key: 'companies_url',
			filtered_items_count_key: 'filtered_items_count',
		},
		el: {
			//wrapper_main: null,
			section_companies_filter: null,
			section_best_companies: null,
			sticky_block: null,
			filter_results: null,
			best_results: null,
			compare_panel: null,
			best_compare_panel: null,
			result_count_label: null,
			filter_form: null,
			filter_selected_items: null,
			//compare_items: null,
			//btn_compare: null,
			btn_clear: null,
			rate_from_modal: null,
			sorting: null,
			btn_back: null,
			btn_toggle_filter: null,
			js_desktop_nav: null,
			js_mobile_nav: null
		},
		Init: function(){
			this.el.body = $('body');
			//this.el.wrapper_main = $('main.wrapper-main');
			this.el.section_companies_filter = $('#section_companies_filter');
			this.el.section_best_companies = $('#section_best_companies');
			this.el.filter_results = $('#filter_results');
			this.el.best_results = $('#best_results');
			this.el.compare_panel = $('#compare_panel');
			this.el.best_compare_panel = $('#best_compare_panel');
			this.el.result_count_label = $('#result_count_label');
			this.el.filter_form = $('#filter_form');
			this.el.filter_selected_items = $('#filter_selected_items');
			//this.el.compare_items = $('.compare_items');
			//this.el.btn_compare = $('.btn-compare');
			this.el.btn_clear = $('.btn-clear');
			this.el.rate_from_modal = $('#rate-from-modal');
			this.el.sorting = $('#sorting');
			this.el.btn_back = $('.btn-back');
			this.el.btn_toggle_filter = $('.btn-toggle-filter');
			this.el.filter_bar = $('aside.filter');
			this.el.sticky_block = $('aside.filter .sticky-block');
			this.el.js_desktop_nav = $('aside#js_desktop_nav');
			this.el.js_mobile_nav = $('aside#js_mobile_nav');

			this.options.filterSidebarTop = this.el.filter_bar.length ? this.el.filter_bar.offset().top : 0;
			this.options.rating_selected_value = '';
			this.options.rc_form = $(document).find('#filter-form');
			this.options.fixed_sidebar = (CF.options.ww >= 768);

			this.initEvents();
			this.actionCloneSidebar();
			this.actionFixedSidebar();
			this.initRangeSlider();
			this.restoreFromSessionStorage();
			this.setButtonBackUrl();
			this.saveMainUrlToStorage();
			this.initBackButtonLabel();

			$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
				e.preventDefault();
				CF.eventTabChange(e);
			});
		},
		initEvents: function(){
			$(document)
				.on('click', 'a[aria-relevant="tabcontent"]', CF.actionSelectTab)
				.on('click', '.btn-close-filter', CF.actionToggleFilterBar)
				.on('click', '.btn-toggle-filter', CF.actionToggleFilterBar)
				.on('click', '.title-bar svg', CF.actionToggleCompareBar)
				.on('click', '.btn-remove-citem', CF.actionRemoveCompareResultItem)
				.on('click', '.btn-clear-filter', CF.actionClearFilter)
				.on('click', '.btn-close-rate-form', CF.actionCloseRateForm)
				.on('click', '.get-your-rate', CF.actionOpenRateForm)
				.on('click', '.btn-back-to-top', CF.actionScrollTop)
				.on('click', '.btn-clear', CF.actionRemoveCompareItems)
				.on('click', '.btn-compare', CF.actionCompareItems)
				.on('click', '.remove-compare-item', CF.actionRemoveCompareItem)
				.on('click', 'input[name="best_add_to_compare"]', CF.actionToggleCompareItemsBest)
				.on('click', 'input[name="add_to_compare"]', CF.actionToggleCompareItemsMain)
				.on('click', '.read-more', CF.actionToggleDesc)
				.on('click change keyup', '#rate_form_flat input', CF.validateRateForm)
				.on('click change mouseover mouseout', '#filter_form .rating input', CF.actionFilterFormStars)
				.on('click change mouseover mouseout', '#rate_form_flat .health input', CF.actionRateFormStars)
				.on('click', '#submit_filter_mob', CF.getCompanies)
				.on('change', '#sorting', CF.getCompanies)
				.on('change', '#filter_form input', CF.getCompanies)
				.on('change', '#filter_form select', CF.getCompanies)
				.on('submit', '#filter_form', CF.getCompanies)
				.on('submit', '#rate_form_flat', CF.submitRateForm);

			$(window)
				.on('scroll', CF.actionWindowScroll)
				.on('resize', CF.actionWindowResize);
		},
		initBackButtonLabel: function(){
			if(CF.el.btn_back.length){
				var count = ~~CF.getFromSessionStorage(CF.options.filtered_items_count_key);
				CF.el.btn_back.find('span').text(count);
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
		setHistory: function(url, title, data){
			if(typeof(data) == "undefined") data = {};
			if(typeof(title) == "undefined") title = document.title;
			if(typeof(url) != "undefined" && url != ""){
				history.pushState(data, title, url);
			}
		},
		getFromSessionStorage: function(key){
			return sessionStorage.getItem(key);
		},
		setSessionStorage: function(key, value){
			sessionStorage.setItem(key, value);
		},
		updateSessionStorage: function(){
			CF.el.filter_form.find('input[type="checkbox"]').each(function(i, el){
				var value = ($(el).is(':checked')) ? $(el).val() : '';
				CF.setSessionStorage($(el).attr('name'), value);
			});

			CF.el.filter_form.find('select').each(function(i, el){
				CF.setSessionStorage($(el).attr('name'), $(el).val());
			});

			var stars_el = CF.el.filter_form.find('input[type="radio"]');
			var value = '';
			stars_el.each(function(i, el){
				if($(el).is(':checked')){
					value = $(el).val();
				}
			});
			CF.setSessionStorage(stars_el.attr('name'), value);

			CF.setSessionStorage(CF.el.sorting.attr('name'), CF.el.sorting.val());
		},
		restoreFromSessionStorage: function(){
			if(sessionStorage.length){
				var update_data = 0;

				CF.el.filter_form.find('input[type="checkbox"]').each(function(i, el){
					var value = CF.getFromSessionStorage($(el).attr('name'));
					if(value){
						$(el).prop('checked', true);
						update_data++;
					}
				});

				CF.el.filter_form.find('select').each(function(i, el){
					var value = CF.getFromSessionStorage($(el).attr('name'));
					if(value){
						$(el).selectpicker('val', value);
						update_data++;
					}
				});

				var stars_el = CF.el.filter_form.find('input[type="radio"]');
				var value = CF.getFromSessionStorage(stars_el.attr('name'));
				if(value){
					$('#star-'+value).prop('checked', true).parent('span').addClass('checked');
					update_data++;
				}

				var value = CF.getFromSessionStorage(CF.el.sorting.attr('name'));
				if(value && value != 3){
					CF.el.sorting.selectpicker('val', value);
					update_data++;
				}

				if(update_data){
					CF.getCompanies();
				}
			}
		},
		setButtonBackUrl: function(){
			if(CF.el.btn_back.length){
				var url = CF.getFromSessionStorage(CF.options.companies_url_key);
				if(url){
					CF.el.btn_back.attr('href', url);
				}
			}
		},
		saveMainUrlToStorage: function(){
			var url = window.location.href;
			var pos = url.indexOf('life-insurance/companies');
			if(pos > -1){
				this.setSessionStorage(this.options.companies_url_key, url);
			}
		},
		actionToggleFilterBar: function(){
			CF.el.filter_bar.toggleClass('open');
			CF.el.body.toggleClass('filter-opened');
			var scrollTop = $(this).scrollTop(),
				t = CF.el.filter_results.offset().top;
			if(scrollTop < t && !CF.el.filter_bar.hasClass('open')){
				$('html, body').stop().animate({scrollTop: t-60}, 800, 'easeOutExpo');
			}
		},
		actionWindowScroll: function(){
			//var scrollTop = $(this).scrollTop();
			if(CF.options.ww >= 768){
				CF.actionFixedSidebar();
			}
		},
		actionWindowResize: function(){
			CF.options.ww = $(window).width();

			CF.actionFixedSidebar();
			CF.actionCloneSidebar();
		},
		actionFixedSidebar: function(){
			var scrollTop = $(window).scrollTop(),
				h = CF.options.filterSidebarTop - scrollTop + 15;
			if(CF.options.fixed_sidebar && h > 0){
				CF.el.sticky_block.height(CF.options.wh - h);
			}
		},
		actionCloneSidebar: function(){
			var mob_view = (CF.options.ww >= 768);
			console.log(mob_view);
			if(mob_view){
				if(CF.el.js_desktop_nav.data('content') == 0){
					CF.el.js_desktop_nav.html(CF.el.js_mobile_nav.find('.sticky-block').clone(true));
					CF.el.js_mobile_nav.empty().data('content', 0);
					CF.el.js_desktop_nav.data('content', 1);
				}
			}else{
				if(CF.el.js_mobile_nav.data('content') == 0){
					CF.el.js_mobile_nav.html(CF.el.js_desktop_nav.find('.sticky-block').clone(true));
					CF.el.js_desktop_nav.empty().data('content', 0);
					CF.el.js_mobile_nav.data('content', 1);
				}
			}
		},
		actionToggleDesc: function(e){
			$(this).siblings('.company-desc').toggleClass('show').end().hide();
		},
		actionToggleCompareBar: function(){
			var $parent = $(this).parents('.tab-pane');

			$parent.toggleClass('compare-panel-hide');

			var h = CF.el.compare_panel.height();
			if($parent.hasClass('compare-panel-hide')){
				CF.el.compare_panel.css({'bottom': 54 - h});
			}else{
				CF.el.compare_panel.css({'bottom': 0});
			}
		},
		actionToggleCompareItemsBest: function(){
			var $parent = CF.el.best_results.parents('.tab-pane');
			var $compare_items = CF.el.best_compare_panel.find('.compare_items');
			var $btn_compare = CF.el.best_compare_panel.find('.btn-compare');

			$compare_items.html('');
			if(CF.options.ww < 768){
				$compare_items.html('<button role="button" type="button" class="btn btn-clear">Remove all</button>');
			}
			CF.el.best_results.find('input[name="best_add_to_compare"]:checked').each(function(i, el){
				var _this = $(this);
				if(i < CF.options.max_compare_items){
					var $div = $('<div>'),
						$image = _this.parents('.box').find('.logo').clone(),
						$close = $('<a>');
					$div.data('parent', _this.attr('id')).data('item', _this.data('id')).data('name', _this.data('company')).addClass('item');
					$close.addClass('remove-compare-item close-btn');
					$image.removeClass('hidden-xs');
					$div.html($image);
					$div.prepend($close);
					$compare_items.prepend($div);
				}
			});

			CF.initLazyLoad();

			var cl = CF.el.best_results.find('input[name="best_add_to_compare"]:checked').length;

			if(cl == 4){
				CF.el.best_results.find('input[name="best_add_to_compare"]:not(:checked)').prop('disabled', true);
			}else{
				CF.el.best_results.find('input[name="best_add_to_compare"]:not(:checked)').prop('disabled', false);
			}

			$parent.removeClass('compare-panel-hide');
			CF.el.best_compare_panel.removeAttr('style');

			if(cl > 1){
				$btn_compare.prop('disabled', false);
			}else if(cl == 1){
				$parent.addClass('compare-panel-show');
				$btn_compare.prop('disabled', true);
			}else if(cl <=0){
				console.log($parent);
				$parent.removeClass('compare-panel-show');
			}

		},
		actionToggleCompareItemsMain: function(){
			var $parent = CF.el.filter_results.parents('.tab-pane');
			var $compare_items = CF.el.compare_panel.find('.compare_items');
			var $btn_compare = CF.el.compare_panel.find('.btn-compare');

			$compare_items.html('');
			if(CF.options.ww < 768){
				$compare_items.html('<button role="button" type="button" class="btn btn-clear">Remove all</button>');
			}
			CF.el.filter_results.find('input[name="add_to_compare"]:checked').each(function(i, el){
				var _this = $(this);
				if(i < CF.options.max_compare_items){
					var $div = $('<div>'),
						$image = _this.parents('.box').find('.logo').clone(),
						$close = $('<a>');
					$div.data('parent', _this.attr('id')).data('item', _this.data('id')).data('name', _this.data('company')).addClass('item');
					$close.addClass('remove-compare-item close-btn');
					$image.removeClass('hidden-xs');
					$div.html($image);
					$div.prepend($close);
					$compare_items.prepend($div);
				}
			});

			CF.initLazyLoad();

			var cl = CF.el.filter_results.find('input[name="add_to_compare"]:checked').length;

			if(cl == 4){
				CF.el.filter_results.find('input[name="add_to_compare"]:not(:checked)').prop('disabled', true);
			}else{
				CF.el.filter_results.find('input[name="add_to_compare"]:not(:checked)').prop('disabled', false);
			}

			$parent.removeClass('compare-panel-hide');
			CF.el.compare_panel.removeAttr('style');

			if(cl > 1){
				$btn_compare.prop('disabled', false);
			}else if(cl == 1){
				$parent.addClass('compare-panel-show');
				$btn_compare.prop('disabled', true);
			}else if(cl <=0){
				$parent.removeClass('compare-panel-show');
			}

		},
		actionRemoveCompareItem: function(){
			var $parent = $(this).parents('.compare-panel');
			var id = $(this).parent('div').data('parent');

			//console.log($parent.data('src'), id);

			$('#'+id).prop('checked', false);

			switch($parent.data('src')){
				case "main":
					CF.actionToggleCompareItemsMain();
					break;
				case "best":
					CF.actionToggleCompareItemsBest();
					break;
			}
		},
		actionRemoveCompareItems: function(){
			var $parent = $(this).parents('.compare-panel');

			switch($parent.data('src')){
				case "main":
					CF.el.filter_results.find('input[name="add_to_compare"]:checked').prop('checked', false);
					CF.actionToggleCompareItemsMain();
					break;
				case "best":
					CF.el.best_results.find('input[name="best_add_to_compare"]:checked').prop('checked', false);
					CF.actionToggleCompareItemsBest();
					break;
			}
		},
		actionRemoveCompareResultItem: function(e){
			$(this).parent('.cbox').remove();
		},
		actionCompareItems: function(){
			var ids = [];
			var ids2 = [];
			var names = [];
			var url = CF.options.get_comparison_url + '';
			var origin = window.location.origin;
			var $compare_items = $(this).parents('.compare-panel').find('.compare_items');

			$compare_items.find('.item').each(function(i, el){
				ids2.push($(el).data('item'));
				names.push($(el).data('name'));
			});

			//console.log(names);

			//url = url + ids2.join(':');
			url = url + names.join('-vs-');

			url = origin + url;

			CF.el.filter_results.find('.box').each(function(){
				ids.push($(this).data('id'));
			});

			CF.setSessionStorage(CF.options.filtered_items_count_key, ids.length);

			window.location.href = url;

			console.log(url);
		},
		actionScrollTop: function(e){
			e.preventDefault();
			$('html, body').stop().animate({scrollTop: 0}, 800, 'easeOutExpo');
		},
		actionOpenRateForm: function(e){
			e.preventDefault();
			CF.el.rate_from_modal.fadeIn(400);
		},
		actionCloseRateForm: function(e){
			e.preventDefault();
			CF.el.rate_from_modal.fadeOut(400);
		},
		validateRateForm: function(){
			var form = $(this).parents('form');
			var error = 0;
			var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

			$(form).find('input:required, select:required, [required]').each(function(){
				if(error) return false;
				var $this = $(this);

				//console.log($this.attr('type'), $this.val());
				switch($this.attr('type')){
					case 'email':
						if(!$.trim($this.val()).match(pattern)){
							//console.log('email alert');
							$this.parents('.el').find('.el_lbl').addClass('error');
							error = true;
						}else{
							$this.parents('.el').find('.el_lbl').removeClass('error');
						}
						break;
					case 'text':
						if($this.val() == ''){
							$this.parents('.el').find('.el_lbl').addClass('error');
							error = true;
						}else{
							$this.parents('.el').find('.el_lbl').removeClass('error');
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
						}else{
							$this.parents('.el').find('.el_lbl').removeClass('error');
						}
						break;
				}
			});

			if(error == false){
				$(form).find('#submit_btn').prop('disabled', false);
				$(form).find('.el_lbl').removeClass('error');
			}else{
				$(form).find('#submit_btn').prop('disabled', true);
			}
		},
		actionFilterFormStars: function(e){
			var userRating = $(this).val();
			var userRatingLabel = $(this).attr('label');
			switch(e.type){
				case 'click':
					$("#or_item span").removeClass('checked');
					$(this).parent().addClass('checked');
					break;
				case 'change':
					CF.options.rating_selected_value = userRatingLabel;
					break;
				case 'mouseover':
					break;
				case 'mouseout':
					break;
			}
		},
		actionRateFormStars: function(e){
			var $selected_health_lbl = $(this).parents('.el').find('.selected-health-lbl');
			var userHealth = $(this).val();
			var userHealthLabel = $(this).attr('label');
			switch(e.type){
				case 'click':
					$("#rc_health span").removeClass('checked');
					$(this).parent().addClass('checked');
					break;
				case 'change':
					$selected_health_lbl.html(userHealthLabel);
					CF.options.health_selected_value = userHealthLabel;
					break;
				case 'mouseover':
					$selected_health_lbl.html(userHealthLabel).addClass('ct');
					break;
				case 'mouseout':
					$selected_health_lbl.html(CF.options.health_selected_value).removeClass('ct');
					break;
			}
		},
		initRangeSlider: function(){
			var $coverage_amount_lbl = $(".js-range-slider").parent('div').find('.coverage-amount-lbl');
			$coverage_amount_lbl.text('$100,000');
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
				from: 0,
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
		submitRateForm: function(e){
			e.preventDefault();
			var $yiiform = $(this);
			var $parent = $yiiform.parents('.rate-form');
			var error = CF.validateRateForm();
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
						CF.actionCloseRateForm(e);
						CF.getCompanies(e);
						CF.getBestCompanies(e);
					}else{

					}
					$parent.removeClass('loading');
				}).fail(function(){
					$parent.removeClass('loading');
				});
			}
			return false;
		},
		getCompanies: function(e){
			if(e){
				e.preventDefault();
			}
			var ids = [],
				sorting = CF.el.sorting.val(),
				data = CF.el.filter_form.serializeArray();

			CF.el.filter_results.find('.box').each(function(){
				ids.push($(this).data('id'));
			});

			data.push({'name': 'CompaniesFilter[sorting]', 'value': sorting});
			data.push({'name': 'CompaniesFilter[ids]', 'value': ids});

			CF.updateSessionStorage();

			CF.el.section_companies_filter.addClass('loading');


			if(e){
				//console.log($(e.target));
				if($(e.target).attr('id') == 'submit_filter_mob'){
					if(CF.options.ww < 768){
						CF.actionToggleFilterBar();
					}
				}
			}

			$.ajax({
				type: 'post',
				url: CF.options.get_companies_url,
				data: data,
				format: 'json'
			}).done(function(responce){
				//console.log(responce);
				if(!responce.error){
					CF.el.result_count_label.find('span').html(responce.count);
					CF.el.btn_toggle_filter.find('span').html(responce.count);
					CF.el.filter_selected_items.html(responce.selected_html);
					CF.el.filter_results.html(responce.html);
					CF.initLazyLoad();
				}else{

				}
				CF.el.section_companies_filter.removeClass('loading');
			}).fail(function(){
				CF.el.section_companies_filter.removeClass('loading');
			});

			return false;
		},
		getBestCompanies: function(e){
			if(e){
				e.preventDefault();
			}
			var ids = [],
				sorting = CF.el.sorting.val(),
				data = [];

			CF.el.section_best_companies.addClass('loading');

			$.ajax({
				type: 'post',
				url: CF.options.get_best_companies_url,
				data: data,
				format: 'json'
			}).done(function(responce){
				//console.log(responce);
				if(!responce.error){
					CF.el.best_results.html(responce.html);
					CF.initLazyLoad();
				}else{

				}
				CF.el.section_best_companies.removeClass('loading');
			}).fail(function(){
				CF.el.section_best_companies.removeClass('loading');
			});

			return false;
		},
		actionClearFilter: function(e){
			e.preventDefault();
			var item = $(this).data('item'),
				parent = $(this).data('parent');

			//console.log(parent, item);

			if(item == 'all'){
				CF.el.filter_form.find('input, select').each(function(i, el){
					CF.actionUncheckUnselectElem($(el));
				});
				CF.el.filter_selected_items.empty();
			}else{
				var $el = null;
				if(item == 'none'){
					$el = $('[name="CompaniesFilter['+parent+']"]');
				}else{
					$el = $('[name="CompaniesFilter['+parent+']['+item+']"]');
				}
				CF.actionUncheckUnselectElem($el);
			}
			CF.getCompanies(e);
		},
		actionUncheckUnselectElem: function($el){
			var type = $el.attr('type');
			//console.log(type);
			switch(type){
				case "checkbox":
					$el.prop('checked', false);
				case "radio":
					$el.prop('checked', false);
					$el.parent('span').removeClass('checked');
					break;
				case undefined:
					$el.val('').siblings('.dropdown-toggle').find('.filter-option').text('Select State');
					break;
			}
		},
		actionScrollToElem: function(elem, speed, effect){
			if(speed == undefined){
				speed = 1000;
			}
			if(effect == undefined){
				effect = 'linear';
			}
			var top = ~~$(elem).offset().top-20;
			if(top != undefined){
				if(CF.options.ww < 768){
					top -= 70;
				}
				$('html, body').animate({scrollTop: top}, speed, effect);
			}
		},
		actionSelectTab: function(e){
			var tab = $(this).attr('aria-controls');
			$('#myTabs a[href="#'+tab+'"]').tab('show');
		},
		eventTabChange: function(e){
			var target = $(e.target).attr("href");
			var hash = window.location.hash;
			var href = window.location.href.split('#')[0];
			var scroll = false;

			if(hash != target){
				scroll = true;
			}

			//console.log(target, hash);

			switch(target){
				case "#howtochoose":
					if(hash == ''){
						scroll = false;
						//window.location.hash = target;
						CF.setHistory(href+target);
					}
					break;
				case "#allcompanies":
				case "#comparisionresults":
					scroll = false;
					//window.location.hash = '';
					CF.setHistory(href);
					break;
				default:
					break;
			}
			if(hash != '' && scroll){
				if(CF.options.ww < 768){
					//console.log(scroll, hash);
					CF.el.body.removeClass('filter-opened');
					CF.el.filter_bar.removeClass('open');
				}
				CF.actionScrollToElem(hash, 800, 'easeOutExpo');
			}
		},
	};

	CF.Init();


});
