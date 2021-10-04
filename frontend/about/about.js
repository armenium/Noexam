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