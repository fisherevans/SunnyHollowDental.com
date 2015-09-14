// Source: https://css-tricks.com/snippets/jquery/smooth-scrolling/
var nav = {
  wrapperSelector: '.wrapper',
  toggleClass: 'show-mobile-nav',
  toggle: function() { $(nav.wrapperSelector).toggleClass(nav.toggleClass); },
  hide:   function() { $(nav.wrapperSelector).removeClass(nav.toggleClass); },
  show:   function() { $(nav.wrapperSelector).addClass(nav.toggleClass); }
};

$(function() {
  $('.header .mobile-nav-toggle').on('click', nav.toggle);
  $('.navigation .element').on('click', function() { nav.hide(); return true; });
  $(window).on('resize', nav.hide);
});