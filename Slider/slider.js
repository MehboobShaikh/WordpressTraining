
$(document).ready(function() {
  $('.slider-thumbs .slick-slide').removeClass('slick-current');
  $('.slider-nav').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: false,
    nextArrow: '<img class="next" src="https://image.flaticon.com/icons/svg/137/137513.svg">',
    prevArrow: '<img class="pre" src="https://image.flaticon.com/icons/svg/137/137514.svg">',

    cssEase: 'ease-in-out',
    autoplay: true,
    autoplaySpeed: 2200,
    speed: 800,
    asNavFor: '.slider-thumbs'
  });
  $('.slider-thumbs').slick({
    slidesToShow: 5,
    slidesToScroll: 2,
    autoplay: true,
    arrows: false,
    asNavFor: '.slider-nav',
    dots: false,
    centerMode: false,
    centerpadding: '60',
    variableWidth: true,
    focusOnSelect: true,
    slidesPerRow: 1
  });
});