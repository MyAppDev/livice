$(function() {
  $("#tab_area li").click(function() {
    $("#tab_area li").css("background-color", "#A9F5A9");
    $(this).css("background-color", "#FE9A2E");
    $("#tab_area div").hide();
    $($("a", this).attr("href")).show();
  });
  $("#tab1").click();
});
