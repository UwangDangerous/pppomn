(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.slider').slider({
      duration : 300,
      interval : 1000,
      indicators : false 
    });
    $('.parallax').parallax();
    $('.carousel').carousel({
      dist : -200,
      shift : 100
    });
    $('.scrollspy').scrollSpy({
      scrollOffset : 30
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
