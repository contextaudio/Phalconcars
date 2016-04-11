$(document).foundation();




// SET HOMEPAGE CAROUSEL TO BE FULL HEIGHT
function setcolumnheight() {
  var window_size = $(window).height();

  $('.menu').css('min-height', window_size - 80);
  $('.left_b').css('min-height', window_size - 80);
  $('.right_b').css('min-height', window_size - 80);
  $('.content').css('min-height', window_size - 80);

};

setcolumnheight();

$(window).resize(function() {
  setcolumnheight();
});

