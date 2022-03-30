/*let questionsItems = [...document.querySelectorAll('.questions__item')].forEach(item => {
    item.addEventListener('click', (e) => {
        item.classList.toggle("questions__item--active")
    });
});*/

$(document).ready(function() {
    $('.questions__item').on('click', function(){
        $(this).toggleClass('questions__item--active');
    });

    $('.life-insurance__cards').slick({
        accessibility: false,
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