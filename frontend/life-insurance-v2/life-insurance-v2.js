$(document).ready(function() {
    $('.reviews__body').slick({
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
        }, ]
    });
});

let questionsItems = [...document.querySelectorAll('.questions__item')].forEach(item => {
    item.addEventListener('click', (e) => {
        item.classList.toggle("questions__item--active")
    });
});

$(function() {
    $('.js_selectpicker').selectpicker();
});

$(document).ready(function() {
    $('.life-insurance__cards').slick({
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