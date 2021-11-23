let questionsItems = [...document.querySelectorAll('.questions__item')].forEach(item => {
    item.addEventListener('click', (e) => {
        item.classList.toggle("questions__item--active")
    });
});

$(document).ready(function() {
    $('.slider-customers__container').slick({
        prevArrow: ".slider-customers__arrow-prev",
        nextArrow: ".slider-customers__arrow-next"
    });
    $('.advantages-slider__container').slick({
        infinite: true,
        prevArrow: ".advantages-slider__arrow-prev",
        nextArrow: ".advantages-slider__arrow-next",
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
            }
        }, ]
    });
});