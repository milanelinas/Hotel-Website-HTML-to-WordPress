
$ = jQuery.noConflict();


function getHeight() {
var height = $('section.promo, section.promo-video').height();
$('#overlay').css({'height':height+'px'})
}





$(function() {
  getHeight();



});

$(window).resize(function() {
  getHeight();
})



jQuery(document).foundation();
