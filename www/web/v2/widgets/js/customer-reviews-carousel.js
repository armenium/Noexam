$(document).ready(function(){
	/*$('.reviews__body').slick({
		infinite: true,
		dots: true,
		arrows: false,
		slidesToShow: 2,
		slidesToScroll: 1,
		responsive: [{
			breakpoint: 1024,
			settings: {
				slidesToShow: 1,
			}
		},]
	});*/

	$('.reviews__body').slick({
		infinite: true,
		dots: true,
		arrows: false,
		slidesToShow: 2,
		slidesToScroll: 1,
		draggable: true,
		centerPadding: '0',
		centerMode: false,
		responsive: [
			{breakpoint: 1024, settings: {slidesToShow: 1,centerMode: true}},
			{breakpoint: 768, settings: {slidesToShow: 1, centerMode: true}}
		]
	});
});
