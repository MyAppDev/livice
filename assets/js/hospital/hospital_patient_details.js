$(function() {
  $("#tab_area li.tab_head").click(function() {
    $("#tab_area li.tab_head").css("background-color", "#E6E6E6");
    $(this).css("background-color", "#ffffff");
    $("#tab_area div.cont").hide();
    $($("a", this).attr("href")).show();
  });
  $("#tab1").click();
});
