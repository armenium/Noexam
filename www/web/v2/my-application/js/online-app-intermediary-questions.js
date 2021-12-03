$(document).ready(function(){

	if($('#intermediary').length){
		var validateIntermediaryQuestions = function(){
			var error = false;
			var $hiddens = $('#intermediary .question').find('input[type="hidden"]');
			//console.log($hiddens);
			$hiddens.each(function(){
				if($(this).val() == ''){
					error = true;
				}
			});

			return error;
		};

		$('#intermediary .question').on('click', '.yes-button.sub-button, .no-button.sub-button', function(){
			var $button_next = $('.next-button');
			var $button_back = $('.back-button');
			var $parent = $(this).parents('.question');
			$parent.find('.sub-button').removeClass('active');
			$(this).addClass('active');
			$parent.find('input[type="hidden"]').val($(this).text());
			var error = validateIntermediaryQuestions();
			console.log(error);
			$button_next.attr('disabled', error);
		});

		$('.back-button').on('click', function(){
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "/my-application/gobackstep/",
				data: {current_url: window.location.href},
			}).done(function(responce){
				console.log(responce);
				if(!responce.error && responce.redirect != ''){
					window.location.href = responce.redirect;
				}else{

				}
			}).fail(function(){

			});
		});

	}

});
