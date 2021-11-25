$("#mobile").click(function () {
  window.open($(this).attr("href"), "title", "width=450, height=700");
  return false;
});
$("#specialView").click(function () {
  $("#specialViewModal").css("display", "flex");
  $("body").addClass("overflow");
});
$("#modalCloser").click(function () {
  $("body").removeClass("overflow");
  $("#specialViewModal").css("display", "none");
});
$("#smallFont").click(function () {
  $("body").removeClass("large-font");
  $("body").addClass("small-font");
});
$("#largeFont").click(function () {
  $("body").removeClass("small-font");
  $("body").addClass("large-font");
});
$("#colorful").click(function () {
  $("body").removeClass("black");
  $("body").removeClass("white");
});
$("#black").click(function () {
  $("body").addClass("black");
  $("body").removeClass("white");
});
$("#white").click(function () {
  $("body").addClass("white");
  $("body").removeClass("black");
});
$("div.grouped_elements").fancybox();
