var buttons = $('.button');
$(function(){
  buttons.each(function(){
    var current = $(this);
    if (current.is('.three')) {
      current.append('<div class="slime"><span></span><span></span><span></span></div>');
    }
    if (current.is('.eleven, .twelve, .thirteen, .fourteen')) {
      current.wrapInner('<span class="string">').append('<span class="layer one"></span><span class="layer two"></span>');
    }
    if (current.is('.fifteen')) {
      current.wrapInner('<span>');
    }
  });
});
// Disable anchor navigate
$(document).on('click touchstart tap', 'a', function(e){
  e.preventDefault();
  return false;
});