$(document).ready(function(){
	var globals = {
		view_mode: 'pc',
		device: (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)),
		ww: $(window).width(),
		wh: $(window).height(),
		plansSliderOptions: {
			slidesToShow: 3,
			enterMode: true,
			// enterPadding: '1170px',
			infinite: true,
			arrows: false,
			responsive: [
				{breakpoint: 640, settings: {centerMode: true, dots: true, centerPadding: '100px', slidesToShow: 1}},
				{breakpoint: 540, settings: {centerMode: true, dots: true, centerPadding: '80px', slidesToShow: 1}},
				{breakpoint: 440, settings: {centerMode: true, dots: true, centerPadding: '60px', slidesToShow: 1}},
				{breakpoint: 380, settings: {centerMode: true, dots: true, centerPadding: '40px', slidesToShow: 1}},
			]
		},
		blocksSliderOptions: {
			slidesToShow: 4,
			centerMode: false,
			// enterPadding: '1170px',
			infinite: false,
			arrows: false,
			dots: true,
			//adaptiveHeight: true,
			responsive: [
				{breakpoint: 1110, settings: {slidesToShow: 3}},
				{breakpoint: 993, settings: {slidesToShow: 2}},
				{breakpoint: 681, settings: {slidesToShow: 1}},
			]
		},
		leftSliderOptions: {
			slidesToShow: 1,
			centerMode: false,
			infinite: true,
			arrows: false,
			dots: true,
			autoplay: true,
			fade: true
		},
		gridSliderOptions: {
			slidesToShow: 1,
			centerMode: false,
			infinite: true,
			arrows: false,
			dots: true,
			autoplay: true,
		},
		formSliderOptions: {
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			infinite: false,
			swipe: false,
			adaptiveHeight: false,
		},
	};

	if(globals.ww < 768){
		globals.view_mode = 'mob';
	}

	//console.log(globals);

	function setProgress(val){
		var val;
		if($('.bar-progress').length){
			if(val == null){
				val = $('.bar-progress .bar-line').data('progress');
			}
			$('.bar-progress .bar-line').width(val+'%').data('progress', val);

			//console.log($('.bar-progress .bar-line').data('progress'));
		}
	}

	setProgress();

	$('.selectpicker').selectpicker({'mobile': globals.device});

	var sendPlanAjax = function(){
		var data = {
			birthdate: $('#birthdate').val(),
			h_foot: $('#h_foot').val(),
			h_inch: $('#h_inch').val(),
			weight: $('#weight').val(),
			tobaco: $('#tobaco').val(),
			sex: $('#sex').val(),
			state: $('#state').val(),
			avarage_amount: $('#avarage_amount').val(),

		}

		$.ajax({
			type: "POST",
			dataType: "json",
			url: "/ajax-get-sagicor-plans/",
			data: data,
			// contentType: "application/json",
			complete: function(data){
				//console.log(data);
				$('.plans').animate({opacity: 0}, 200, function(){
					$('.plans').trigger('animate_complete');
				});
				$('.plans').on('animate_complete', function(){
					$('.plans').slick('unslick');
					$('.plans').empty();
					$('.plans').append(data.responseText);
					//console.log($('.plans .wrap').length);
					if(!$('.plans .alert').length){
						$('.plans').slick($.extend(globals.plansSliderOptions, {slidesToShow: $('.plans .alert').length}));
					}
				})
				$('.plans').animate({opacity: 1}, 700);
			}
		});
	};
	// $('.birthday>input').datepicker({format : 'm/d/yyyy'});

	var subQuestionsSliderOptions = {
		dots: false,
		arrows: false,
		infinite: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		adaptiveHeight: false,
		swipe: false,
		accessibility: false,
	};
	$('.sub-questions').slick(subQuestionsSliderOptions);
	$('.slider').slick({
		dots: true,
		arrows: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
	});
	$('.tiles-block').slick({
		dots: true,
		arrows: false,
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				},

			},
			{
				breakpoint: 640,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},

			},
		]
	});

	if($('body').hasClass('careers')){
		$('h1.title').find('.badge').text($('.jobs-list .item').length);
	}

	$('[data-toggle="tooltip"]').tooltip();

	// $('.tiles-block').slick('unslick')

	$('.plans').slick(globals.plansSliderOptions);

	$('.plans').on('beforeChange', function(event, slick, currentSlide, nextSlide){
		$('.slick-active .plan').removeClass('active');
	});

	$('.plans').on('afterChange', function(event, slick, currentSlide, nextSlide){
		// console.log( $(slick.$slides.get(currentSlide)))
		$('.slick-active .plan').addClass('active');
	});

	function run(svgElm){
		var s = Snap(svgElm + ' svg'),
			path = "",
			arc = s.path(path);

		// strokeColor = 'rgb(164, 210, 221)',

		var canvasSize = 335;
		var strokeWidth = 46;
		if(globals.ww <= 414){

			canvasSize = 100;
			strokeWidth = 14;
		}

		var centre = canvasSize / 2;
		var radius = Math.floor((canvasSize - strokeWidth) / 2);

		var startY = centre - radius;
		var percDiv = $(svgElm).find('.percent-line');


		setTimeout(function(){
			$(svgElm + ' svg').attr('class', 'show-circle');
		}, 100);

		setTimeout(function(){
			runSvgAnimation(svgElm, arc, centre, radius, startY, s, strokeWidth, canvasSize, percDiv);
		}, 500);
	}

	function runSvgAnimation(svgElm, arc, centre, radius, startY, s, strokeWidth, canvasSize, percDiv){
		var percent_anim = $(svgElm + ' svg').data('value');
		var strokeColor = $(svgElm + ' svg').data('strokecolor');
		var percent = percent_anim / 100;
		var endpoint = percent * 360;

		Snap.animate(0, endpoint, function(val){
			arc.remove();

			var d = val,
				dr = d - 90;
			radians = Math.PI * (dr) / 180,
				endx = centre + radius * Math.cos(radians),
				endy = centre + radius * Math.sin(radians),
				largeArc = d > 180 ? 1 : 0;
			path = "M" + centre + "," + startY + " A" + radius + "," + radius + " 0 " + largeArc + ",1 " + endx + "," + endy;

			arc = s.path(path);
			arc.attr({
				stroke: strokeColor,
				fill: 'none',
				strokeWidth: strokeWidth
			});
			percDiv.text(Math.round(val / 360 * 100) + '%');
		}, 2000, mina.easeinout);
	}

	/*
		var animateCirlces = function(entries, observer) {

			entries.forEach(function(item){
				if(item.isIntersecting){
				run('.blue-circle');
				run('.green-circle');
				observer.unobserve(target);

				}
			})

		};
		var timLeneAnimate = function(entries, observer){
			entries.forEach(function(item){
				if(item.isIntersecting){
					var TLRow = item.target.querySelector('.timeline-row');
					var TLCircle =TLRow.querySelector('.timeline-circle');
					var TLVerticalLine = $('.vertical-line');
					TLRow.classList.add('active');
					switch(TLRow.querySelector('.timeline-circle-wrap').classList[1]) {
						case 'instant' : TLVerticalLine.css('border-top', '240px solid #9ad59a');
						break
						case 'email' :  TLVerticalLine.css('border-top', '480px solid #9ad59a');
										$('.timeline-bdg-bot').css({'background-color':'#9ad59a', 'color': '#fff'});
						break
						case 'secure' : TLVerticalLine.css('border-top', '95px solid #9ad59a');
						break
					}
					TLRow.style.margin = '0';
					TLCircle.style.marginLeft = '-17.5px';

					observer.unobserve(item.target);

				}
			})
		};

		var observer = new IntersectionObserver(animateCirlces, { threshold: 0.25 });

		var target = document.querySelector('.graph');
		observer.observe(target);

		var observerTimeLine = new IntersectionObserver(timLeneAnimate, { threshold: 1 });
		var rows = document.querySelectorAll('.horizontal-line');

		rows.forEach(function(item){
			observerTimeLine.observe(item)

		})*/

	if(globals.ww > 992){
		$('.plans').on('mouseenter', '.plan', function(){
			$(this).css({transform: 'scale(1.1)',}).addClass('active');
		})
		$('.plans').on('mouseleave', '.plan', function(){
			$(this).css({transform: 'scale(1)'}).removeClass('active');
		})
	}

	if(globals.ww > 768){

		/*$('.main-questions .scroll-bar').jScrollPane({
			verticalDragMinHeight: 82,
			verticalDragMaxHeight: 82,
			contentWidth: '0px',
		});*/
	}

	$(window).resize(function(){
		if(globals.ww > 992){
			$('.plans').on('mouseenter', '.plan', function(){
				$(this).css({transform: 'scale(1.1)',}).addClass('active');
			})
			$('.plans').on('mouseleave', '.plan', function(){
				$(this).css({transform: 'scale(1)'}).removeClass('active');
			})
		}else{
			$('.plan').off('mouseenter');
			$('.plan').off('mouseleave');
		}

		if(globals.ww > 768){
			$('.main-questions .scroll-bar').jScrollPane({
				verticalDragMinHeight: 82,
				verticalDragMaxHeight: 82,
				contentWidth: '0px',
			});
		}

	});

	$('.graph').on('inview', function(event, isInView){
		if(isInView){
			if($(this).parent().hasClass('blue-circle')){
				run('.blue-circle');
			}
			if($(this).parent().hasClass('green-circle')){
				run('.green-circle');
			}
			$(this).off('inview');
		}
	});

	var animate = function(element){
		var TLRow = element.find('.timeline-row');
		var TLCircle = TLRow.find('.timeline-circle');
		var TLVerticalLine = $('.desktop-line .vertical-line');
		var TLCircleWrapper = TLRow.find('.timeline-circle-wrap');
		TLRow.addClass('active');
		if(TLCircleWrapper.hasClass('instant')){
			TLVerticalLine.css('border-top', '240px solid #9ad59a');
		}
		if(TLCircleWrapper.hasClass('email')){
			TLVerticalLine.css('border-top', '480px solid #9ad59a');
			$('.timeline-bdg-bot').css({'background-color': '#9ad59a', 'color': '#fff'});
		}
		if(TLCircleWrapper.hasClass('secure')){
			TLVerticalLine.css('border-top', '95px solid #9ad59a');
		}
		TLRow.css('margin', '0');
		TLCircle.css('margin-left', '-17.5px');

		element.off('inview')
	};

	$('.horizontal-line').on('inview', function(event, isInView){
		if(isInView){
			var element = $(this);
			var time = 300 * $(this).index();
			//
			setTimeout(function(){
				animate(element)
			}, time);
		}
	});

	$('.navbar-mobile .head .button, .mob-menu .head .button').on('click', function(){
		$('.wrapper-main').toggleClass('opened');
		/*if($('.mobile-inner').hasClass('col-xs-12')){
			$('.mobile-inner').removeClass('col-xs-12').addClass('col-xs-10');
			$('.navbar-mobile').addClass('opened');
			$('.links').removeClass('hidden');
		}else{
			$('.mobile-inner').removeClass('col-xs-10').addClass('col-xs-12')
			$('.navbar-mobile').removeClass('opened');
			$('.links').addClass('hidden');
		}*/
	});


	$('.time-line-mobile .timeline-circle-wrap').on('click', function(){

		$time_line = $('.time-line-mobile');
		$line = $('.time-line-mobile .vertical-line');

		if($(this).hasClass('secure')){
			$parent = $('.horizontal-line .secure').parent().parent().eq(0);
			$line.css('border-left', $time_line.width() * 0.10 + 'px solid #9ad59a')
			$('.timeline-bdg-bot').css({'background-color': '#f3f3f3', 'color': '#999'});
			$.when($('.horizontal-line').fadeOut(500)).then(function(){
				$parent.fadeIn(500)
			});
		}
		if($(this).hasClass('instant')){
			$parent = $('.horizontal-line .instant').parent().parent().eq(0);
			$line.css('border-left', $time_line.width() * 0.50 + 'px solid #9ad59a')
			$('.timeline-bdg-bot').css({'background-color': '#f3f3f3', 'color': '#999'});
			$.when($('.horizontal-line').fadeOut(500)).then(function(){
				$parent.fadeIn(500)
			});
		}
		if($(this).hasClass('email')){
			$parent = $('.horizontal-line .email').parent().parent().eq(0);
			$line.css('border-left', $time_line.width() + 'px solid #9ad59a')
			$('.timeline-bdg-bot').css({'background-color': '#9ad59a', 'color': '#fff'});
			$.when($('.horizontal-line').fadeOut(500)).then(function(){
				$parent.fadeIn(500)
			});
		}
	});

	if(globals.ww <= 992){
		$('.horizontal-line').off('inview');
		$('.timeline-row').addClass('active');
		$('.horizontal-line').removeClass('hidden visible-md visible-lg');
		$('.horizontal-line').hide();
		$('.horizontal-line').eq(0).show()
	}

	if(globals.ww <= 414){
		$('circle').attr({
			'cx': '50',
			'cy': '50',
			'r': '43',
			'stroke-width': '7'
		});
	}

	$(window).resize(function(){
		var winWidth = globals.ww;
		if(winWidth > 414 && winWidth <= 992){
			if($('circle').attr('cx') == 50){
				$('path').remove();
				$('circle').attr({
					'cx': '167',
					'cy': '167',
					'r': '144',
					'stroke-width': '23'
				});
				if($('blue-circle')){
					run('.blue-circle');
				}
				if($('green-circle')){
					run('.green-circle');
				}
			}
		}

		if(winWidth <= 414){
			if($('circle').attr('cx') == 167){
				$('path').remove();
				$('circle').attr({
					'cx': '50',
					'cy': '50',
					'r': '43',
					'stroke-width': '7'
				});
				if($('blue-circle')){
					run('.blue-circle');
				}
				if($('green-circle')){
					run('.green-circle');
				}
			}
		}

	});

	var validateFields = function(){
		var error = 0;
		var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

		$('input[type="text"], input[type="email"]').each(function(){
			if(error) return false;
			if($(this).attr('type') == 'email'){
				if(!$.trim($(this).val()).match(pattern)){
					error = true;
				}
			}
			if($(this).val() == ''){
				$(this).parent().addClass('error').end().addClass('error');
				error = true;
			}
		});

		if(error == false){
			$(this).parent().removeClass('error').end().removeClass('error');
		}

		return error;
	};

	var validateSlideFields = function(slide){
		var error = 0;
		var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		//console.log(slide);
		$(slide).find('input[type="text"], input[type="email"], select').each(function(){
			if(error) return false;
			if($(this).attr('type') == 'email'){
				if(!$.trim($(this).val()).match(pattern)){
					error = true;
				}
			}

			if($(this).val() == ''){
				$(this).parent().addClass('error').end().addClass('error');
				error = true;
			}
		});

		if(error == false){
			$(this).parent().removeClass('error').end().removeClass('error');
		}

		return error;
	};

	// Questions page
	checkAnswered = function(questions){
		var questions;
		var error = 0;
		if(!questions){
			var questions = $('.main-questions .sub-question');
		}
		questions.each(function(){
			var squestion = $(this);
			if(!squestion.hasClass('answered') || squestion.attr('data-answer') == ''){
				error = 1;
			}
			if(error == 1) return false;
		});
		return error;
	};

	if($('.content.questions').length){
		$('.sub-questions').on('afterChange', function(){
			var questions = $('.slick-active').find('.sub-question');
			if(!checkAnswered(questions)){
				$('.next-button').addClass('active');
			}

			if(globals.ww > 768){
				$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px'
				});
			}

		});

		// Click for reanswer.
		$('.main-questions').on('click', '.sub-question.answered div.text, .sub-question.answered .q-num', function(){
			var parent = $(this).parents('.sub-question');
			var subquestions = parent.siblings('.sub-question');
			subquestions.removeClass('active');
			subquestions.filter(".reanswered").removeClass('reanswered').addClass('answered');

			$(this).parent().removeClass('answered');
			$(this).parent().addClass('active reanswered');

			$('.next-button').removeClass('active');

			if(globals.ww > 768){
				$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px'
				});
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
				url: "/get-reflex/",
				complete: function(data){
					// if(data){
					$(document).trigger('getreflexx', [data.responseText, answer]);
					// }
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
				return true;
			}

			getAjaxReflex(questionId, answer, parent);

			$(document).on('getreflexx', function(event, responseText, answer){
				$(this).off('getreflexx');
				if(responseText){
					parent.attr('data-answer', answer);
					parent.removeClass('reanswered');
					reflexQuestions.html(responseText);
					$('.selectpicker').selectpicker('render');
				}else{
					parent.attr('data-answer', answer);
					parent.removeClass('active reanswered').addClass('answered no');

					$('.slick-active').find('.sub-question.answered.field').removeClass('active');
					// $('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
					reflexQuestions.empty();
					$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
				}

				if(globals.ww > 768){
					$('.main-questions .scroll-bar').jScrollPane({
						verticalDragMinHeight: 82,
						verticalDragMaxHeight: 82,
						contentWidth: '0px'
					});
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
				url: "/get-reflex/",
				complete: function(data){
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
				$('.selectpicker').selectpicker('render');
				if(globals.ww > 768){
					$('.main-questions .scroll-bar').jScrollPane({
						verticalDragMinHeight: 82,
						verticalDragMaxHeight: 82,
						contentWidth: '0px'
					});
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
				$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px'
				});
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

				/*if($(button).parents('.buttons').find('select').length){
					answer = $(button).parents('.buttons').find('select option:selected').val();
				}
				if($(button).parents('.buttons').find('input[type="text"]:not(:disabled)').length){
					var $i_obj = $(button).parents('.buttons').find('input[type="text"]:not(:disabled)');
					var k = $($i_obj).attr('name');
					var v = $i_obj.val();
					answer[k] = v;
					//answer = $(button).parents('.buttons').find('input[type="text"]:not(:disabled)').val();
				}
				if($(button).parents('.buttons').find('textarea:not(:disabled)').length){
					var $i_obj = $(button).parents('.buttons').find('textarea:not(:disabled)');
					var k = $($i_obj).attr('name');
					var v = $i_obj.val();
					answer[k] = v;
				}*/
			}

			if(table_answer){
				answer = JSON.stringify(answer);
				//console.log(answer);
			}

			//if(parent.length){
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
			/*}else{
				if(parentMain.length){
					parentMain.attr('data-answer', 'ok')
					parentMain.removeClass('active').addClass('answered');
				}else{
					$(button).parents('.sub-question[data-type="question"]').removeClass('active').addClass('answered');
				}

				$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
				$('.slick-active').find('.reflex-question').hide();
			}*/

			//console.log(questionId, questionNumber, answer, parent, parentMain, button, reflexQuestions);
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

		/*$('.content.questions').on('click','.no-button', function(){
		 	var parent = $(this).parents('.sub-question');
		 	parent.attr('data-answer','no');
		 	parent.removeClass('active reanswered').addClass('answered no');
		 	$('.slick-active').find('.sub-question.answered.field').removeClass('active')
		 	$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
		 	$(this).trigger('answered')
		 });*/

		$('.content.questions').on('answered', '.yes-button, .no-button, .btn-confirm', function(){
			var questions = $('.slick-active').find('.sub-question');
			if(!checkAnswered(questions)){
				$('.next-button').addClass('active');
			}
		});

		/*
		$('.main-questions').on('keyup','input', function(){
			var parent = $(this).parents('.sub-question');
			parent.attr('data-answer',$(this).val());
			if($(this).val().length <= 1){

				parent.removeClass('reanswered').addClass('answered field');
				
				$('.slick-active').find('.sub-question').not('.answered, .active').eq(0).addClass('active');
			}
			
			$('.yes-button, .no-button').trigger('answered')	
			// $('.next-button').addClass('active');
		
		})*/

		/*
		$('.content.questions').on('change','select', function(){
			var parent = $(this).parents('.sub-question');
			parent.attr('data-answer',$(this).val());

			parent.removeClass('active reanswered').addClass('answered field no');

			var nextQuestion = $('.slick-active').find('.sub-question').not('.answered, .active').eq(0);

			nextQuestion.addClass('active');
			$('.yes-button, .no-button').trigger('answered')	
			console.log($(this).parents('.buttons').find('.btn-confirm'))
		
		})*/
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
					var q_id;
					var q_num;
					if($('div[data-type="question"]').data('question-id')){
						q_id = $('div[data-type="question"]').data('question-id')
						q_num = $('div[data-type="question"]').data('num')
					}else{
						q_id = $('.sub-questions').data('question-id')
						q_num = $('.sub-questions').data('num')
					}
					var data = {
						main_question_id: q_id,
						number: q_num,
						answers: {},
					};

					$('.sub-question.answered').each(function(index){
						data.answers[index] = {};
						data.answers[index].id = $(this).data('question-id');
						data.answers[index].xml_num = $(this).find('input[type="hidden"]').attr('name');
						data.answers[index].answer = $(this).data('answer');
						data.answers[index].type = $(this).data('type');
					});

					// console.log(data);
					$.ajax({
						type: "post",
						data: data,
						url: "/get-questions/",
						complete: function(data){
							if(data.responseText == 'ne'){
								window.location = '/not-eligible/';
								return
							}

							if(data.responseText == 'rtu'){
								window.location = '/rtu/';
								return
							}
							if(!$(data.responseText).find('.question').length){
								$('.sub-questions').remove();
								$('.question').after(data.responseText);
								$('.next-button').removeClass('active');
								$('.sub-questions').slick(subQuestionsSliderOptions);
								$('.selectpicker').selectpicker('render');
							}else{
								$('.content').empty();
								$('.content').append(data.responseText);
								$('.next-button').removeClass('active');
								$('.sub-questions').slick(subQuestionsSliderOptions);
								$('.selectpicker').selectpicker('render');
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
			$('.sub-questions').slick('slickPrev');

			if(cs_index == 0){
				var q_id;
				var q_num;
				if($('div[data-type="question"]').data('question-id')){
					q_id = $('div[data-type="question"]').data('question-id')
					q_num = $('div[data-type="question"]').data('num')
				}else{
					q_id = $('.sub-questions').data('question-id')
					q_num = $('.sub-questions').data('num')
				}
				var data = {
					main_question_id: q_id,
					number: q_num-1,
					answers: {},
				};
				// console.log(data);
				$.ajax({
					type: "post",
					data: data,
					url: "/get-questions/",
					complete: function(data){
						if(data.responseText == 'ne'){
							window.location = '/not-eligible/';
							return
						}

						if(data.responseText == 'rtu'){
							window.location = '/rtu/';
							return
						}
						if(!$(data.responseText).find('.question').length){
							$('.sub-questions').remove();
							$('.question').after(data.responseText);
							$('.next-button').removeClass('active');
							$('.sub-questions').slick(subQuestionsSliderOptions);
							$('.selectpicker').selectpicker('render');
						}else{
							$('.content').empty();
							$('.content').append(data.responseText);
							$('.next-button').removeClass('active');
							$('.sub-questions').slick(subQuestionsSliderOptions);
							$('.selectpicker').selectpicker('render');
						}
					}
				});

			}
		})
	}
	//END Questions page

	//Personal Info page
	if($(".content.personal-info").length){
		$(".personal-info input").on('focusin', function(){
			$('.timeline-list > div').removeClass('active');
			$(this).parents('div[class^="icon-"]').addClass('active').find('label').addClass('active');
		});

		$(".personalinfo2 .personal-info .timeline-list .icon-name").find('select:first-child').focus().end().find('label').addClass('active');

		$(".personal-info input, .personal-info select").on('keyup blur change', function(){
			if(globals.view_mode == 'mob'){
				var cs_index = ~~$('.timeline-list').slick('slickCurrentSlide');
				var slide = $('div[data-slick-index="'+cs_index+'"]');
				if(!validateSlideFields(slide)){
					$('.next-button').addClass('active');
				}else{
					$('.next-button').removeClass('active');
				}
			}else{
				var error = validateFields();
				if(!error){
					$('.next-button').addClass('active');
				}else{
					$('.next-button').removeClass('active');
				}
			}
		});

		if(globals.view_mode == 'mob'){
			$('.timeline-list').slick(globals.formSliderOptions).on('setPosition', function(event, slick){
				//console.log('setPosition');
				var cs_index = ~~$('.timeline-list').slick('slickCurrentSlide');
				var slide = $('div[data-slick-index="'+cs_index+'"]');
				if(!validateSlideFields(slide)){
					$('.next-button').addClass('active');
				}else{
					$('.next-button').removeClass('active');
				}
			}).on('afterChange', function(event, slick, currentSlide, nextSlide){
				var slide = $('div[data-slick-index="'+currentSlide+'"]');
				var css_classes = $(slide).attr('class').split(' ');
				$('#current_step_icon').removeClass().addClass(css_classes[0] + ' active');
				//console.log(css_classes);
				if(!validateSlideFields(slide)){
					$('.next-button').addClass('active');
				}else{
					$('.next-button').removeClass('active');
				}
			});

			if(globals.wh < 500){
				/*$('.main-questions .scroll-bar').jScrollPane({
					verticalDragMinHeight: 82,
					verticalDragMaxHeight: 82,
					contentWidth: '0px',
				});*/
			}
		}else{
			//$('.timeline-list').slick('unslick');
		}

		$('.next-button').on('click', function(){
			if(globals.view_mode == 'mob'){
				var slides_count = ~~$('.timeline-list .slick-slide').length;
				var cs_index = ~~$('.timeline-list').slick('slickCurrentSlide');
				var slide = $('div[data-slick-index="'+cs_index+'"]');
				//console.log(slides_count);
				if(!validateSlideFields(slide)){
					//console.log(0);
					//console.log(cs_index);
					if((cs_index+1) < slides_count){
						$('.timeline-list').slick('slickNext');
					}else{
						var form = $('form');
						//console.log(form);
						form.submit();
					}
				}else{
					//console.log(1);
					alert("Please fill in all the fields.");
				}
			}else{
				if(!validateFields()){
					// alert(1)
					var form = $('form');
					//console.log(form);
					form.submit();
				}else{
					alert("Please fill in all the fields.");
				}
			}
		});

		$('.back-button').on('click', function(){
			if(globals.view_mode == 'mob'){
				$('.timeline-list').slick('slickPrev');
			}else{

			}
		});


	}
	//END Personal Info page

	//Beneficiary Info page
	if($('.content.beneficiary').length){

		var recountsBfs = function(){
			$("#benef_fields .beneficiary_item").each(function(i, e){
				$(this).find('.beneficiary-id').find('.number').text(i+1);
			});
		};

		$("#benef_fields").on('focusin', 'input, .bootstrap-select', function(){
			//$('.timeline-list > div').removeClass('active');
			$(this).parents('.row-input').addClass('active').find('.form-group').addClass('active').find('label').addClass('active');
		}).on('click', '.remove-bf:visible', function(){
			$(this).parents('.beneficiary_item').slideUp(200, function(){
				$(this).remove();
				recountsBfs();
				if(globals.ww > 768){
					$('.main-questions .scroll-bar').jScrollPane({
						verticalDragMinHeight: 82,
						verticalDragMaxHeight: 82,
						contentWidth: '0px'
					});
				}
			});
		});

		$("#benef_fields").on('keyup blur change', 'input, .bootstrap-select', function(){
			var error = validateFields();
			if(!error){
				$('.next-button').addClass('active');
			}else{
				$('.next-button').removeClass('active');
			}
		});

		$('.next-button').on('click', function(){
			if(!validateFields()){
				// alert(1)
				var form = $('form');
				//console.log(form);
				form.submit();
			}else{
				alert("Please fill in all the fields.");
			}
		});

		$('.back-button').on('click', function(){

		});

		if($('.beneficiary-id').length){
			$('.add-beneficiary').on('click', function(){
				var bf_id = $('.beneficiary-id').length + 1;
				$.ajax({
					type: "GET",
					dataType: "json",
					data: 'bf_id=' + bf_id,
					url: "/beneficiary-ajax/",
					complete: function(data){
						$('#benef_fields').append(data.responseText);
						$('#benef_fields').find('.beneficiary_item:not(:first-child)').find('.remove-bf').removeClass('hide');
						if(globals.ww > 768){
							$('.main-questions .scroll-bar').jScrollPane({
								verticalDragMinHeight: 82,
								verticalDragMaxHeight: 82,
								contentWidth: '0px'
							});
						}
						$('.selectpicker').selectpicker({'mobile': globals.device});

						var error = validateFields();
						if(!error){
							$('.next-button').addClass('active');
						}else{
							$('.next-button').removeClass('active');
						}

					}
				});
			});
		}

	}
	//END Beneficiary Info page

	//Payment Info Info page
	if($(".content.payment-info").length){
		$(".payment-info input").on('focusin', function(){
			//$('.row-input').removeClass('active');
			//$(this).parents('.row-input').addClass('active');
			$(this).parents('.row-input').addClass('active').find('.form-group').addClass('active').find('label').addClass('active');
		});

		$(".payment-info .payment-fields").find('.row-input:first-child').find('input[type="text"]').focus().end().find('label').addClass('active');

		$(".payment-info input").on('keyup', function(){
			var error = validateFields();
			if(!error){
				$('.next-button').addClass('active')
			}else{
				$('.next-button').removeClass('active')
			}
		});

		$('.next-button').on('click', function(){
			if(!validateFields()){
				//alert("All fields are filled correctly.");
				var form = $('form');
				//console.log(form);
				form.submit();
			}else{
				alert("Please fill in all the fields.");
			}
		});

		$('.back-button').on('click', function(){
			if(globals.view_mode == 'mob'){

			}else{

			}
		});
	}

	/*var inRange() = function range(start, end){
	    var array = new Array();
	    for(var i = start; i < end; i++)
	    {
	        array.push(i);
	    }
	    return array;
	}*/
	//END Payment Info page

	$('.birthday>input').inputmask('mm/dd/yyyy', {
		oncomplete: function(){
			var age = getAge($(this).val());
			if(age > 65 || age < 18){
				showErrorMessage($(this).siblings('.error-input'))
				return false;
			}
			sendPlanAjax();
		}
	});

	$('.birthday>input').on('focusin keydown', function(){
		hideErrorMessage($(this).siblings('.error-input'));
	});

	/*$(".weight>input").inputmask({
		mask:'999',
	});*/

	function showErrorMessage(inputField){
		if(inputField.length){
			inputField.css('top', (inputField.outerHeight() + 2) * -1);
			inputField.fadeIn();
		}
	}

	function hideErrorMessage(inputField){
		inputField.fadeOut();
	}

	function getAge(date){
		var today = new Date();
		var birthDate = new Date(date);
		var age = today.getFullYear() - birthDate.getFullYear();
		var m = today.getMonth() - birthDate.getMonth();
		if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())){
			age--;
		}
		return age;
	}

	$('.weight>input').on("focusin", function(){
		hideErrorMessage($(this).siblings('.error-input'));
	});

	$('.weight>input').on("keyup", function(){
		hideErrorMessage($(this).siblings('.error-input'))

		if(this.value.match(/[^0-9]/g)){
			this.value = this.value.replace(/[^0-9]/g, '');
		}
		if(this.value.length > 3){
			this.value = this.value.slice(0, 3);
			return false;
		}

		if(this.value.length > 1){
			if(this.value < 84 || this.value > 402){
				showErrorMessage($(this).siblings('.error-input'));
				return false;
			}
			sendPlanAjax();
		}
	});
	

	// $('.weight>input').inputmask('999', { "placeholder": "", 'min': 10 });
	// $('.weight>input').mask("99?9",{completed:function(){sendPlanAjax();}});

	$('#avarage_amount, #sex, #state, #tobaco, #h_foot, #h_inch').on('change', function(){
		sendPlanAjax();
	});

	$('.main-index').on('click', '.btn-apply', function(){
		var data = {};
		var form = $('form');
		var term = parseInt($(this).parents('.plan').find('.term').text(), 10);
		//console.log(term);
		form.append('<input type="hidden" name="CustomerData[term]" value="' + term + '" />');
		form.submit();
	})

	/*if($('.plan-info-index').length){
		$('#agree').on('change', function(){
			if($(this).is(":checked")) {
				$('button').prop('disabled', false);
		    }else{
		    	$('button').prop('disabled', true);
		    }
		})
		$('button').on('click',function(){
		})
	}*/

	function refreshSlickHeight(parent_obj){
		var $items = $(parent_obj).find('.item.slick-slide'),
			final_h = 0;
		console.log('refreshSlickHeight');
		$items.each(function(){
			var h = $(this).height();
			if(h > final_h){
				final_h = h;
			}
		});
		$(parent_obj).find('.item.slick-slide').height(final_h);
	}

	if(($('body.about').length || $('body.careers').length) && globals.ww > 767){
		$('.slick-blocks').on('init', function(slick){
			console.log('about.slick.init');
			setTimeout(function(){
				refreshSlickHeight($('.slick-blocks'));
			}, 200);
		}).slick(globals.blocksSliderOptions);

		var tm = null;
		$(window).resize(function(){
			if(tm != null){
				clearTimeout(tm);
			}
			tm = setTimeout(function(){
				console.log('about.slick.resize');
				refreshSlickHeight($('.slick-blocks'));
			}, 200);
		});
	}

	if($('body.applynow').length && globals.ww > 767){
		$('.slick-left').slick(globals.leftSliderOptions);
	}

	if($('.grid-slider').length){
		$('.grid-slider').slick(globals.gridSliderOptions);
	}

	$('.resources #category_id').on('change', function(){
		var url = $(this).val();
		if(url != ''){
			window.location.href = url;
		}
	});

	//Apply-now2 page
	if($("body.applynow2").length){
		var slides_count = $("body.applynow2 .slide-form .item").length;
		//console.log(slides_count);
		/*$(".applynow2 input").on('focusin', function(){
			$('.timeline-list li').removeClass('active');
			$(this).parents('li').addClass('active');
		});*/

		$('.applynow2 input[type="text"]').on('keyup', function(){
			var error = validateFields();
			if(!error){
				//$('.next-button').addClass('active')
			}else{
				//$('.next-button').removeClass('active')
			}
		});

		if(globals.device == 'mob' || globals.ww < 768){
			globals.formSliderOptions.adaptiveHeight = true;
		}

		$('.slide-form').slick(globals.formSliderOptions).on('afterChange', function(event, slick, currentSlide, nextSlide){
			var slide = $('div[data-slick-index="'+currentSlide+'"]');
			if(currentSlide == 0){
				$('.prev-button').hide();
			}else{
				$('.prev-button').show();
			}
			if(currentSlide == slides_count-1){
				$('.continue-button').hide();
				$('.submit_btn').show();
			}else{
				$('.submit_btn').hide();
				$('.continue-button').show();
			}
			//console.log(currentSlide);
		});

		$('.continue-button').on('click', function(){
			var cs_index = ~~$('.slide-form').slick('slickCurrentSlide');
			var slide = $('div[data-slick-index="'+cs_index+'"]');
			//console.log(slide);
			if(!validateSlideFields(slide)){
				$('.slide-form').slick('slickNext');
			}else{
				alert("Please fill in all the fields.");
			}
		});

		$('.prev-button').on('click', function(){
			$('.slide-form').slick('slickPrev');
		});

		$('#submit_btn').on('click', function(){
			var error = validateFields();
			//console.log(error);
			var $form = $(this).parent('form'),
				data = $form.data('yiiActiveForm');
			//console.log(data);
			if(!error){
				$form.submit();
			}else{
				alert("Please fill in all the fields.");
			}
		});
	}
	//END Apply-now2 page

	$('input[type="text"], input[type="email"], select').on('focus change', function(){
		$(this).parent().removeClass('error').end().removeClass('error');
	});

	if($('body').hasClass('index')){
		sendPlanAjax();
	}
});

jQuery(document).ready(function($){
	var $timeline_block = $('.cd-timeline-block');

	//hide timeline blocks which are outside the viewport
	$timeline_block.each(function(){
		if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
			$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		}
	});

	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		$timeline_block.each(function(){
			if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
				$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	});
});
