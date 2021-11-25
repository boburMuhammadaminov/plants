$(".top-slider").owlCarousel({
  loop: true,
  margin: 0,
  nav: true,
  items: 1,
  animateOut: "fadeOut",
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayHoverPause: true,
  mouseDrag: false,
});
$(".useful-links").owlCarousel({
  loop: true,
  margin: 30,
  autoplay: true,
  autoplayTimeout: 2000,
  autoplayHoverPause: true,
  mouseDrag: true,
  dots: false,
  responsive: {
    // breakpoint from 0 up
    0: {
      items: 1,
    },
    // breakpoint from 480 up
    480: {
      items: 4,
    },
    // breakpoint from 768 up
    768: {
      items: 5,
    },
  },
});
$(".owl-prev").html('<i class="fa fa-chevron-left"></i>');
$(".owl-next").html('<i class="fa fa-chevron-right"></i>');
