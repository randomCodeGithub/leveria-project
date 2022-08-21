$(document).ready(function () {
  var $w = $(window);
  var $d = $(document);
  var $b = $("body");

  $(".partners-slider").slick({
    dots: true,
    arrows: true,
    infinite: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 4,
    appendDots: $(".custom-slide-dots"),
    prevArrow: $(".slide-prev"),
    nextArrow: $(".slide-next"),
    customPaging: function (slider, i) {
      return '<div class="slider-dot"></div>';
    },
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 5,
          variableWidth: true,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          variableWidth: true,
        },
      },
    ],
  });
});
