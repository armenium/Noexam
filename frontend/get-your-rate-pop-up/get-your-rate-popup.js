let closeBtn = document.querySelector(".get-your-rate-popup__close-icon")
let popup = document.querySelector(".get-your-rate-popup")

closeBtn.addEventListener("click", () => {
    popup.classList.remove("get-your-rate-popup--active")
    html.style.overflow = "visible"
})

const marks = ['100k', '150k', '200k', '250k', '300k', '400k', '500k', '600k', '700k', '800k', '900k', '1m'];

$(".get-your-rate-popup__range-slider").ionRangeSlider({
    skin: "round",
    values: marks,
    grid: true,
    from: 5,
    prefix: "$",
    hide_min_max: true,
    step: 50000
});

$(function() {
    $('.js_selectpicker').selectpicker();
});