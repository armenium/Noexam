//const marks = ['100k', '150k', '200k', '250k', '300k', '400k', '500k', '600k', '700k', '800k', '900k', '1m'];


/*$(".js-range-slider").ionRangeSlider({
    skin: "round",
    //values: marks,
    grid: true,
    //from: 4,
    prefix: "$",
    hide_min_max: true,
    step: 50000,

    onFinish: function(data){
        //FJS.ApplyNow.QuoteResult.goToLink($(this));
    },
});*/

let questionsItems = [...document.querySelectorAll('.questions__item')].forEach(item => {
    item.addEventListener('click', (e) => {
        item.classList.toggle("questions__item--active")
    });
});

$(document).ready(function() {
    $('.quotes-result__cards').slick({
        infinite: true,
        dots: false,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        draggable: false,
        centerPadding: '0',
        focusOnSelect: true,
        centerMode: true,
        responsive: [
            {breakpoint: 1024, settings: {slidesToShow: 2, draggable: false, dots: true, centerMode: false}},
            {breakpoint: 768, settings: {slidesToShow: 1, draggable: true, dots: true, centerMode: true}}
        ]
    });
});

$(function() {
    //$('.js_selectpicker').selectpicker();
});