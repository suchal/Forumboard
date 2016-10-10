$(function() {
  $('.gallery a').lightbox(); 
});
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#app").toggleClass("toggled");
});