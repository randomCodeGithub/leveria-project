$(document).ready(function () {
  var $w = $(window);
  var $d = $(document);
  var $b = $("body");
  var timer;
  $(".item-block.item-text-hidden").hover(
    function () {
      timer = setTimeout(() => {
        $(this).css("opacity", "0.9");
      }, 210);
    },
    function () {
      clearTimeout(timer);
      $(this).css("opacity", "");
    }
  );
});
