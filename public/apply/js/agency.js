/*!
 * SGDA Officer App, based on:
 * Start Bootstrap - Agnecy Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
  var $viewport = $('html, body');
  var interruptTriggers = "scroll mousedown mousewheel keyup touchmove";

  $('a.page-scroll').bind('click', function(event) {
    var $anchor = $(this);

    $viewport.stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top
    }, 600, 'easeOutQuad');
    event.preventDefault();
  });

  // Allow interruption of auto scrolling
  $viewport.bind(interruptTriggers, function(e) {
    $viewport.stop();
  });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
  target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
  $('.navbar-toggle:visible').click();
});

$('div.modal').on('show.bs.modal', function() {
  var modal = this;
  var hash = modal.id;
  window.location.hash = hash;
  window.onhashchange = function() {
    if (!location.hash){
      $(modal).modal('hide');
    }
  }
});