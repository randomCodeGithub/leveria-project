$(document).ready(function () {
  var $w = $(window);
  var $d = $(document);
  var $b = $("body");

  /**
   * Cookie
   */

  var interval;
  function addClassesToCookie() {
    if ($(".cc-window").length) {
      $(".cc-allow").addClass("btn");
      clearInterval(interval);
    }
  }
  interval = setInterval(addClassesToCookie, 500);

  /**
   * Header
   */
  var $siteHeader = $(".site-header");
  var $hero = $("section.hero");
  function headerScrollChangeClass(headerEl) {
    if ($hero.length) {
      // scroll top position check
      if ($w.scrollTop() < 70) {
        headerEl.removeClass("smaller-header");
      } else {
        headerEl.addClass("smaller-header");
      }
    } else {
      headerEl.addClass("smaller-header");
    }
  }

  $w.bind("scroll", function () {
    headerScrollChangeClass($siteHeader);
  });

  headerScrollChangeClass($siteHeader);

  var toggle = false;
  var $menu = $(".js-menu");
  var $responsiveMenu = $(".responsive-menu");
  var $toggler = $(".toggler");

  //   RESPONSIVE MENU BTN CLICK TO OPEN MENU
  $menu.on("click", function () {
    toggle = !toggle;

    if (toggle) {
      $responsiveMenu.addClass("open");
      $toggler.addClass("open");
      $b.css("overflow", "hidden");
    } else {
      $responsiveMenu.removeClass("open");
      $toggler.removeClass("open");
      $b.css("overflow", "");
    }
  });

  /**
   * Popup
   */
  $("#apply-the-project").on("click", function (e) {
    // Close, when click outside of the box
    if (e.target !== this) return;
    else {
      $(this).fadeOut();
      $b.css("overflow", "");
    }
  });

  $(".banner button").on("click", function () {
    $("#apply-the-project").css("display", "flex").hide().fadeIn();
    $b.css("overflow", "hidden");
  });

  $(".js-close").on("click", function (e) {
    $("#apply-the-project").fadeOut("slow");
    $b.css("overflow", "");
  });

  /**
   * Form
   */

  $("input, textarea").focus(function () {
    $(this).parent().parent().addClass("focused");
  });

  $("input, textarea").blur(function () {
    if (!$(this).val()) {
      $(this).parent().parent().removeClass("focused");
    }
  });

  $("input, textarea").hover(
    function () {
      $(this).parent().parent().addClass("is-hovered");
    },
    function () {
      $(this).parent().parent().removeClass("is-hovered");
    }
  );
});
