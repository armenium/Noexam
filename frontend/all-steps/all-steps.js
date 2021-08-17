const marks = ['100k', '150k', '200k', '250k', '300k', '400k', '500k', '600k', '700k', '800k', '900k', '1m'];

$(".all-steps__range-slider").ionRangeSlider({
    skin: "round",
    values: marks,
    grid: true,
    from: 5,
    prefix: "$",
    hide_min_max: true,
    step: 50000
});

$(function() {
    $('.all-steps__select').selectpicker();
});