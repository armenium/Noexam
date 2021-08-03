// ADMIN AREA
$(document).ready(function(){

	var AJS = {
		els: {
			checkboxes: null,
			js_page_content: null,
		},
		Init: function(){
			this.els.checkboxes = $('#js_fields_toggle').parents('table').find('tbody').find('input[name^="fields"]:not(:disabled)');
			this.els.js_page_content = $('#js_page_content');

			this.initEvents();
			this.initChildToParentLinks();
			this.initTemplateField();
		},
		initEvents: function(){
			$(document)
				.on('change', '#resourcescats-template', AJS.actionChangeTemplateField)
				.on('blur', '#resourcescats-title', AJS.actionBlurTitleField)
				.on('click', '#resourcescats-child_to_parent_links', AJS.actionClickChildToParentLinks)
				.on('click', '#js_fields_toggle', AJS.actionClickJsFieldsToggle);

		},
		string_to_slug: function(str, separator){
			str = str.trim();
			str = str.toLowerCase();

			// remove accents, swap ñ for n, etc
			const from = "åàáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
			const to = "aaaaaaeeeeiiiioooouuuunc------";

			for (let i = 0, l = from.length; i < l; i++) {
				str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
			}

			return str
				.replace(/[^a-z0-9 -]/g, "") // remove invalid chars
				.replace(/\s+/g, "-") // collapse whitespace and replace by -
				.replace(/-+/g, "-") // collapse dashes
				.replace(/^-+/, "") // trim - from start of text
				.replace(/-+$/, "") // trim - from end of text
				.replace(/-/g, separator);
		},
		actionBlurTitleField: function(e){
			var val = $(this).val();
			var slug = AJS.string_to_slug(val, '-');
			if($('#resourcescats-url').val() == ''){
				$('#resourcescats-url').val("/life-insurance/" + slug + "/");
			}
			if($('#resourcescats-meta_title').val() == ''){
				$('#resourcescats-meta_title').val(val);
			}
		},
		initChildToParentLinks: function(){
			if($('#resourcescats-child_to_parent_links').is(':checked')){
				$('.field-resourcescats-custom_childs_links').show();
			}else{
				$('.field-resourcescats-custom_childs_links').hide();
			}
		},
		actionClickChildToParentLinks: function(e){
			if($(this).is(':checked')){
				$('.field-resourcescats-custom_childs_links').show();
			}else{
				$('.field-resourcescats-custom_childs_links').hide();
			}
		},
		actionClickJsFieldsToggle: function(e){
			var checked = $(this).is(':checked');
			AJS.els.checkboxes.prop('checked', checked);
		},
		initTemplateField: function(){
			if($('#resourcescats-template').val() == ''){
				AJS.els.js_page_content.show();
			}else{
				AJS.els.js_page_content.hide();
			}
		},
		actionChangeTemplateField: function(e){
			var val = $(this).val();

			if(val == ''){
				AJS.els.js_page_content.show();
			}else{
				AJS.els.js_page_content.hide();
			}
		},
	};

	AJS.Init();

});
