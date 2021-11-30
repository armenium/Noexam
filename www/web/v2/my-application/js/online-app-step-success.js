if(typeof jQuery === "undefined"){
	throw new Error("Frontend requires jQuery");
}

$(function(){
	var interval = setInterval(function(){
		if($('#shopper_approved').length){
			clearInterval(interval);
			$('#shopper_approved').before($('#sa_custom_css').clone());
			sa_popup_decorate();
		}
	}, 100);

	var sa_popup_decorate = function(){
		var $sa = $('#shopper_approved');
		$sa
			.find('#sa_header_img').attr('src', '/v2/common/images/header/Logo.svg')
			.end()
			.find('#sa_close').attr('src', '/v2/common/images/icon-close.svg')
			.end()
			.find('#sa_footer_img').attr('src', '/v2/common/images/online-app/approved-icon.png')
			.end()
			.find('#shopper_submit').val('Submit feedback');
	};
});
