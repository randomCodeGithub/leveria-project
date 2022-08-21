$(document).ready(function () {
  var $b = $("body");
  var $w = $(window);

  function isScrolledLeftMaximum(element) {
    var maxScrollLeft =
      $(element).get(0).scrollWidth - $(element).get(0).clientWidth;
    return $(element).scrollLeft() >= maxScrollLeft;
  }

  function isScrolledLeftMinimum(element) {
    return $(element).scrollLeft() == 0;
  }

  function scrolledLeftArrowClassChange(element, position = "left") {
    switch (position) {
      case "left":
        $(".thumb-next-arrow").removeClass("thumb-arrow-disabled");
        if (isScrolledLeftMinimum(element)) {
          $(".thumb-prev-arrow").addClass("thumb-arrow-disabled");
        }
        break;
      case "right":
        $(".thumb-prev-arrow").removeClass("thumb-arrow-disabled");
        if (isScrolledLeftMaximum(element)) {
          $(".thumb-next-arrow").addClass("thumb-arrow-disabled");
        }
        break;
      default:
        console.log("Choose left or right position");
        break;
    }
  }

  var $window = $(window),
    flexslider = { vars: {} };
  function getItemSize() {
    return window.innerWidth >= 1100 ? 151 : 80;
  }

  function getItemMargin() {
    return window.innerWidth >= 1100 ? 24 : 10;
  }
  $("#project-carousel").flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: getItemSize(),
    itemMargin: getItemMargin(),
    prevText: "",
    nextText: "",
    asNavFor: "#project-slider",
    start: function (slider) {
      flexslider = slider;
      $(".flex-direction-nav a").after('<div class="side-effect"></div>');

      $window.resize(function () {
        var itemSize = getItemSize();
        var itemMargin = getItemMargin();

        flexslider.vars.itemWidth = itemSize;
        flexslider.vars.itemMargin = itemMargin;
      });
    },
  });

  $("#project-slider").flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    directionNav: false,
    sync: "#project-carousel",
  });

  $('[data-fancybox="gallery"]').fancybox({
    smallBtn: true,
    infobar: false,
    width: "824",
    height: "480",
    margin: [44, 0, 22, 0],
    thumbs: {
      autoStart: true,
      axis: "x",
    },
    btnTpl: {
      arrowLeft:
        '<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left d-flex justify-content-center align-items-center" title="{{PREV}}">' +
        '<i class="ic ic--gallery-arrow-left"></i>' +
        "</button>",

      arrowRight:
        '<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right d-flex justify-content-center align-items-center" title="{{NEXT}}">' +
        '<i class="ic ic--gallery-arrow-left"></i>' +
        "</button>",
      smallBtn:
        '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}} - TEST"><i class="ic ic--close"></i></button>',
    },
    afterLoad: function (instance, slide) {
      if ($w.width() < 1099.98) {
        if (!$(".fancybox-button--wrapper").length) {
          $(".fancybox-button--close").wrap("<div class='fancybox-button-wrapper'></div>")
        }
     }
      if (!$(".fancybox-thumbs-wrapper").length) {
        $(".fancybox-thumbs").wrap(
          "<div class='fancybox-thumbs-wrapper'></div>"
        );
      }
      if (!$(".thumb-prev-arrow").length) {
        $(".fancybox-thumbs-wrapper").prepend(
          '<div id="js-scroll-left" class="fancybox-thumb-arrow thumb-prev-arrow "></div>'
        );
      }
      if (!$(".thumb-next-arrow").length) {
        $(".fancybox-thumbs-wrapper").append(
          '<div id="js-scroll-right" class="fancybox-thumb-arrow thumb-next-arrow "></div>'
        );
      }
      if (!$(".thumb-prev-arrow + .fancybox-thumb-slide-effect").length) {
        $(".thumb-prev-arrow").after(
          '<div class="fancybox-thumb-slide-effect"></div>'
        );
      }
      if (!$(".thumb-next-arrow + .fancybox-thumb-slide-effect").length) {
        $(".thumb-next-arrow").after(
          '<div class="fancybox-thumb-slide-effect"></div>'
        );
      }
      scrolledLeftArrowClassChange($(".fancybox-thumbs"));
    },
    beforeClose: function () {
      $(".fancybox-thumb-arrow").addClass("d-none thumb-arrow-disabled");
    },
  });

  /**
   * Events
   */

  $b.on("click", "#js-scroll-right", function () {
    let leftPos = $(".fancybox-thumbs").scrollLeft();
    let scrollToLeft = $(".fancybox-thumbs a").width() * 3;

    $(".fancybox-thumbs").animate(
      {
        scrollLeft: leftPos + scrollToLeft,
      },
      200,
      scrolledLeftArrowClassChange($(this), "right")
    );
  });
  $b.on("click", "#js-scroll-left", function () {
    let leftPos = $(".fancybox-thumbs").scrollLeft();
    let scrollToLeft = $(".fancybox-thumbs a").width() * 3;
    $(".fancybox-thumbs").animate(
      {
        scrollLeft: leftPos - scrollToLeft,
      },
      200,
      scrolledLeftArrowClassChange($(this))
    );
  });
});
