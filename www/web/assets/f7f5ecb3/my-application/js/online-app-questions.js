$(document).ready(function(){

	var globals = {
		view_mode: 'pc',
		device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
		ww: $(window).width(),
		wh: $(window).height(),
		subQuestionsSliderOptions: {
			dots: false,
			arrows: false,
			infinite: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: false,
			swipe: false,
			accessibility: false,
		},
		routs: {
			'get_reflex': '/get-reflex/',
			'get_questions': '/get-questions/',
		},
	};

	var goBack = function(){
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
	};

	var checkAnswered = function(questions){
		var error = 0;
		if(questions == undefined){
			questions = $('.main-questions .sub-question');
		}
		questions.each(function(){
			var squestion = $(this);
			if(!squestion.hasClass('answered') || squestion.attr('data-answer') == ''){
				error = 1;
			}
			if(error == 1) return false;
		});
		console.log(error);
		return error;
	};

	var changeNextBtnState = function(){
		var $questions = $('.slick-active').find('.sub-question');
		var status = checkAnswered($questions);
		$('.next-button').attr('disabled', status ? true : false);
	};

	if($('.content.questions').length){
		$('.sub-questions').slick(globals.subQuestionsSliderOptions);

		$('.sub-questions').on('afterChange', function(){
			var questions = $('.slick-active').find('.sub-question');
			if(!checkAnswered(questions)){
				$('.next-button').attr('disabled', false);
			}

			if(globals.ww > 768){
				/*$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px'
				});*/
			}

		});

		// Click for reanswer.
		$('.main-questions').on('click', '.sub-question.answered .text, .sub-question.answered .q-num', function(){
			var $parent = $(this).parents('.sub-question');
			var subquestions = $parent.siblings('.sub-question');
			subquestions.removeClass('active');
			subquestions.filter(".reanswered").removeClass('reanswered').addClass('answered');

			$parent.removeClass('answered');
			$parent.addClass('active reanswered');

			changeNextBtnState();

			if(globals.ww > 768){
				/*$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px'
				});*/
			}
		});

		var getAjaxReflex = function(questionId, answer, parent){
			$.ajax({
				type: "post",
				data: {
					parentId: parent.data('parent-id'),
					questionId: questionId,
					questionAnswer: [answer],
				},
				global: true,
				url: globals.routs.get_reflex,
				complete: function(data){
					console.log('getAjaxReflex', data);
					$(document).trigger('getreflexx', [data.responseText, answer]);
				}
			});
		};

		// Click to YES/NO button for SUB-question
		$('.content.questions').on('click', '.yes-button.sub-button, .no-button.sub-button', function(){
			var answer;
			var button = $(this);
			var parent = $(this).parents('.sub-question');
			var questionId = parent.data('question-id');
			var reflexQuestions = parent.find('.reflex-questions');

			//console.log(parent);

			button.addClass('active');
			if(button.hasClass('yes-button')){
				answer = 'yes';
				parent.find('.buttons').eq(0).find('.no-button').removeClass('active');
			}

			if(button.hasClass('no-button')){
				answer = 'no';
				parent.find('.buttons').eq(0).find('.yes-button').removeClass('active');
			}

			/*if(reflexQuestions.html != ''){
				if(parent.data('type') =='sub'){
					relatedReflexQuestions = reflexQuestions.find('.sub-question[data-parent-id="'+questionId+'"]');
				}else if(parent.data('type') =='reflex'){
					relatedReflexQuestions = parent.siblings('.sub-question[data-parent-id="'+questionId+'"]');
				}
				reflexQuestions.empty();
			}*/

			if(parent.attr('data-answer') == answer){
				if(parent.hasClass('reanswered')){
					parent.removeClass('active reanswered').addClass('answered no');
					$('.slick-active').find('.sub-question.answered.field').removeClass('active');
					$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
				}

				changeNextBtnState();

				return true;
			}

			getAjaxReflex(questionId, answer, parent);

			$(document).on('getreflexx', function(event, responseText, answer){
				$(this).off('getreflexx');
				if(responseText){
					parent.attr('data-answer', answer);
					parent.removeClass('reanswered');
					reflexQuestions.html(responseText);
					$('.js_selectpicker').selectpicker('render');
				}else{
					parent.attr('data-answer', answer);
					parent.removeClass('active reanswered').addClass('answered no');

					$('.slick-active').find('.sub-question.answered.field').removeClass('active');
					// $('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
					reflexQuestions.empty();
					$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
				}

				if(globals.ww > 768){
					/*$('.main-questions .scroll-bar').jScrollPane({
						verticalDragMinHeight: 82,
						verticalDragMaxHeight: 82,
						contentWidth: '0px'
					});*/
				}
				button.trigger('answered');
			});

		});
		// Trigerred when click on YES\NO button for REFLEX-question

		var getAjaxReflexReflex = function(questionId, questionNumber, answer, parent, parentMain, button, reflexQuestions){
			$.ajax({
				type: "post",
				data: {
					parentId: parent.data('parent-id'),
					questionId: questionId,
					questionNumber: questionNumber,
					questionAnswer: [answer],
				},
				url: globals.routs.get_reflex,
				complete: function(data){
					//console.log('getAjaxReflexReflex', data);
					$(document).trigger('getreflexxx', [data.responseText, answer, parent, parentMain, button, reflexQuestions, questionId])
				}
			});
		};

		var removeReflexRecursive = function(obj, questionId){
			relatedReflexQuestions = obj.siblings('.sub-question[data-parent-id="' + questionId + '"]');
			if(relatedReflexQuestions.length){
				relatedReflexQuestions.each(function(){
					removeReflexRecursive($(this), $(this).data('question-id'));
					$(this).remove();
				})
			}
		};

		$(document).on('getreflexxx', function(event, responseText, answer, parent, parentMain, button, reflexQuestions, questionId){
			if(responseText){
				parent.attr('data-answer', answer);
				parent.removeClass('active').addClass('answered no');
				var response = $(responseText);

				response.each(function(){
					var duplicate = parentMain.find('[data-question-id="' + $(this).data('question-id') + '"]');
					if(duplicate.length){
						console.log('Duplicate');
						duplicate.remove();
					}
				});

				parent.after(response);
				$('.js_selectpicker').selectpicker('render');
				if(globals.ww > 768){
					/*$('.main-questions .scroll-bar').jScrollPane({
						verticalDragMinHeight: 82,
						verticalDragMaxHeight: 82,
						contentWidth: '0px'
					});*/
				}
			}else{
				removeReflexRecursive(parent, questionId);

				if(parent.next().length){
					parent.attr('data-answer', answer)
					parent.removeClass('active').addClass('answered no');
					parent.next().addClass('active');
				}else{
					parent.attr('data-answer', answer)
					parent.removeClass('active').addClass('answered no');

					if(parentMain.length){
						parentMain.removeClass('active').addClass('answered')
					}else{
						$(button).parents('.sub-question[data-type="question"]').removeClass('active').addClass('answered');
					}

					$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
					$('.slick-active').find('.reflex-question').hide();
				}
			}
			if(globals.ww > 768){
				/*$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px'
				});*/
			}
			$(button).trigger('answered');
		});

		var getReflex = function(obj){
			var table_answer = false;
			var answer = {};
			var button = $(obj);
			var parentMain = $(button).parents('.sub-question[data-type="sub"]');
			var parent = $(button).parents('.sub-question[data-type="reflex"]');
			var parentT = $(button).parents('.sub-question[data-type="table"]');
			if(parentT.length){
				parent = parentT;
				table_answer = true;
			}
			var questionId = parent.data('question-id');
			var questionNumber = parent.data('question-number');
			var reflexQuestions = parent.parents('.reflex-questions');




			button.addClass('active');

			if(button.hasClass('yes-button')){
				answer['yes'] = 'yes';
				parent.find('.buttons').eq(0).find('.no-button').removeClass('active');
			}

			if(button.hasClass('no-button')){
				answer['no'] = 'no';
				parent.find('.buttons').eq(0).find('.yes-button').removeClass('active');
			}

			if($(button).hasClass('btn-confirm')){
				var $items = $(button).parents('.buttons').find('input[type="text"]:not(:disabled), input[type="radio"]:checked:not(:disabled), select:not(:disabled), textarea:not(:disabled)');

				if($items.length > 0){
					$items.each(function(){
						answer[""+$(this).attr('name')+""] = $(this).val();
					});
				}
			}

			if(table_answer){
				answer = JSON.stringify(answer);
				//console.log(answer);
			}

			if(parent.attr('data-answer') == answer){
				if(parent.hasClass('reanswered')){
					if(parent.next().length){
						parent.attr('data-answer', answer);
						parent.removeClass('active').addClass('answered no');
						parent.next().addClass('active');
					}else{
						parent.attr('data-answer', answer);
						parent.removeClass('active').addClass('answered no');

						if(parentMain.length){
							parentMain.removeClass('active').addClass('answered');
						}else{
							$(button).parents('.sub-question[data-type="question"]').removeClass('active').addClass('answered');
						}

						$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
						$('.slick-active').find('.reflex-question').hide();
					}
				}
				return true;
			}
			if(table_answer){
				parentMain.attr('data-answer', 'ok')
			}

			console.log(questionId, questionNumber, answer, parent, parentMain, button, reflexQuestions);
			getAjaxReflexReflex(questionId, questionNumber, answer, parent, parentMain, button, reflexQuestions);
		};

		$('.content.questions').on('click', 'table.avia input[type="radio"]', function(){
			var c = false,
				v = $(this).val();
			switch(v){
				case "yes":
					c = true;
					break;
				case "no":
					c = false;
					break;
			}
			$(this).parents('tr').find('input[type="text"]').attr('disabled', c);
		});

		// Click to YES/NO button for REFLEX-question
		$('.content.questions').on('click', '.yes-button.reflex-button, .no-button.reflex-button', function(){
			getReflex(this);
		});

		$('.content.questions').on('answered', '.yes-button, .no-button, .btn-confirm', function(){
			changeNextBtnState();
		});

		$('.content.questions').on('click', '.btn-confirm', function(){
			var _this = this;

			/*if($(this).parents('.buttons').find('select').length){
				if($(this).parents('.buttons').find('select option:selected').val() != ""){
					getReflex(this);
				}
			}

			if($(this).parents('.buttons').find('input[type="text"]').length){
				if($(this).parents('.buttons').find('input[type="text"]:not(:disabled)').val() != ""){
					getReflex(this);
				}
			}*/

			var $buttons = $(this).parents('.buttons'),
				$items = $buttons.find('input[type="text"]:not(:disabled), select:not(:disabled), textarea:not(:disabled)');

			//console.log($items.length);

			if($items.length == 0){
				getReflex(_this);
			}else{
				var e = 0;
				$items.each(function(){
					var v = $(this).val();
					if(v == ''){
						e++;
					}
					//console.log(e);
				});
				if(e == 0){
					getReflex(_this);
				}
			}

		});

		$('.next-button').on('click', function(){
			var questions = $('.slick-active').find('.sub-question');
			if(!checkAnswered(questions)){
				$('.sub-questions').slick('slickNext');
				if(!checkAnswered()){
					var q_id, q_num, q_type, data;

					if($('[data-type="question"]').data('question-id')){
						q_id = $('[data-type="question"]').data('question-id');
						q_num = $('[data-type="question"]').data('num');
						q_type = 'question';
					}else if($('[data-type="question_nq"]').data('question-id')){
						q_id = $('[data-type="question_nq"]').data('question-id');
						q_num = $('[data-type="question_nq"]').data('num');
						q_type = 'question_nq';
					}else{
						q_id = $('.sub-questions').data('question-id');
						q_num = $('.sub-questions').data('num');
						q_type = 'question';
					}

					data = {
						main_question_id: q_id,
						number: q_num,
						question_type: q_type,
						answers: {},
					};

					$('.sub-question.answered').each(function(index){
						data.answers[index] = {};
						data.answers[index].id = $(this).data('question-id');
						data.answers[index].xml_num = $(this).find('input[type="hidden"]').attr('name');
						data.answers[index].answer = $(this).data('answer');
						data.answers[index].type = $(this).data('type');
					});

					console.log(data);
					$.ajax({
						type: "post",
						data: data,
						url: globals.routs.get_questions,
						complete: function(data){
							//console.log(data.responseText);
							if(data.responseText == 'ne'){
								window.location = '/online-application-step-not-eligible/';
								return;
							}

							if(data.responseText == 'rtu'){
								window.location = '/online-application-step-rtu/';
								return;
							}

							if(!$(data.responseText).find('.question').length){
								$('#js_questions_container').html(data.responseText);
								$('.next-button').attr('disabled', true);
								$('.sub-questions').slick(globals.subQuestionsSliderOptions);
								$('.js_selectpicker').selectpicker('render');
							}else{
								$('#js_questions_container').html(data.responseText);
								$('.next-button').attr('disabled', true);
								$('.sub-questions').slick(globals.subQuestionsSliderOptions);
								$('.js_selectpicker').selectpicker('render');
							}
						}
					});
				}
				$(this).removeClass('active');
			}else{
				alert("Please answer for all questions.");
			}
		});

		$('.back-button').on('click', function(){
			var cs_index = ~~$('.sub-questions').slick('slickCurrentSlide');
			//console.log(cs_index);
			if(cs_index == 0){
				goBack();
			}else{
				$('.sub-questions').slick('slickPrev');
			}
		});
	}

});
