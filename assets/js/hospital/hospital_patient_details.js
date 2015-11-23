$(function() {
  $("#tab_area li.tab_head").click(function() {
    $("#tab_area li.tab_head").css("background-color", "#e7e7e7");
    $(this).css("background-color", "#8C9EFF");
    $("#tab_area div.cont").hide();
    $($("a", this).attr("href")).show();
  });
  $("#tab1").click();
});
