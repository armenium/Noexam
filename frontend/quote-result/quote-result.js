const marks = ['100k', '150k', '200k', '250k', '300k', '400k', '500k', '600k', '700k', '800k', '900k', '1m'];

$(".quotes-result__range-slider").ionRangeSlider({
    skin: "round",
    values: marks,
    grid: true,
    from: 5,
    prefix: "$",
    hide_min_max: true,
    step: 50000
});

let questionsItems = [...document.querySelectorAll('.questions__item')].forEach(item => {
    item.addEventListener('click', (e) => {
        item.classList.toggle("questions__item--active")
    });
});

$(document).ready(function() {
    $('.quotes-result__cards').slick({
        infinite: false,
        dots: false,
        arrows: false,
        slidesToScroll: 1,
        draggable: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    draggable: true,
                    dots: true,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    draggable: true,
                    dots: true,
                }
            }

        ]
    });
});

$(function() {
    $('.js_selectpicker').selectpicker();
});