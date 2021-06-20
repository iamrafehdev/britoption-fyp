
$(document).ready(function () {

    'use strict';

    /*-------------------------------------
    Navbar Toggle for Mobile
    -------------------------------------*/
  $("#navigation").slicknav({
            prependTo: ".responsive-menu"
        });
    $('.your-class').slick({
      });


   /*-------------------------------------
     Color Schemes
    -------------------------------------*/
  var colorHandle = $('.color-handle');
    colorHandle.on('click', function(e) {
        $('.color-schemes').toggleClass('show');
    });
    $("#hide").on("click",function() {
       $(".particles-js-canvas-el").hide();
        $("#show").removeClass("color-button");
        $("#hide").addClass("color-button"); 
    });
    $("#show").on("click",function() {
        $(".particles-js-canvas-el").show();
        $("#hide").removeClass("color-button");
        $("#show").addClass("color-button");
    });

    var colorPalate =$('.color-plate a.single-color');
    colorPalate.on('click', function(e){
    	e.preventDefault();
    	$('link#colors').attr('href',$(this).attr('href'));
    	return false;
    });

  /*-------------------------------------
      SLider Area Js paralax
    -------------------------------------*/

$('.slider-bg').parallax("50%", -0.1);

$('.main-slider-1 a.slide-control-mr').on('click', function(){
  $('.slider-con h1,.slider-con p').addClass('animated  slideInDown');
  $('a.btn-mr,a.btn-mr-tr').addClass('animated bounceInUp');
});


  /*-------------------------------------
      Counter
    -------------------------------------*/

    $('.counter').counterUp({
      delay: 10,
      time: 800
    });
 /*-------------------------------------
     Protfolio
    -------------------------------------*/

  
     //Protfolio popup
 
    $('.portfolio-gallery-set').magnificPopup({
     type: 'image',
        gallery:{
    enabled:true
    }

    });

    //protfolio filter set
    $('.portfolio-filter li').on('click', function(event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });
     
    //protfolio isotope
    var $varPortfolioMasonry = $('.portfolio-masonry');
    if (typeof imagesLoaded == 'function') {
        imagesLoaded($varPortfolioMasonry, function() {
            setTimeout(function() {
                $varPortfolioMasonry.isotope({
                    itemSelector: '.portfolio-item',
                    resizesContainer: false,
                    layoutMode: 'masonry',
                    filter: '*'
                });
            }, 500);

        });
    };
    
   //protfolio filtering
   $('.portfolio-filter').on('click', 'a', function() {
        $(this).addClass('current');
        var filterValue = $(this).attr('data-filter');
        $(this).parents('.portfolio-filter-wrap').next().isotope({
            filter: filterValue
        });
    });

 /*-------------------------------------
      Owl Carousel
    -------------------------------------*/
       $("#owl-clients-6").owlCarousel({
      navigation: false,
      pagination: true,
      slideSpeed: 800,
      paginationSpeed: 800,
      smartSpeed: 500,
      autoplay: true,
      singleItem: true,
      loop: true,
      responsive:{
        0:{
          items:1
        },
        680:{
          items:3
        },
        1000:{
          items:6
        }
      }
    });

      $("#testimonial").owlCarousel({
      navigation: false,
      pagination: true,
      slideSpeed: 800,
      paginationSpeed: 800,
      smartSpeed: 500,
      autoplay: true,
      singleItem: true,
      dots: true,
      loop: true,
      responsive:{
        0:{
          items:1
        },
        680:{
          items:1
        },
        1000:{
          items:1
        }
      }
    });

     $("#owl-pricing").owlCarousel({
      navigation: false,
      pagination: true,
      slideSpeed: 800,
      center:true,
      paginationSpeed: 800,
      smartSpeed: 500,
      autoplay: true,
      singleItem: true,
      dots: true,
      loop: true,
      responsive:{
        0:{
          items:1
        },
        680:{
          items:2
        },
        1000:{
          items:4
        }
      }
    });  

  /*-------------------------------------
      Progressbar
  -------------------------------------*/
    $('#html').LineProgressbar({
        percentage: 97,

    });
    $('#php').LineProgressbar({
        percentage: 83,

    });
    $('#bootstrap').LineProgressbar({
        percentage: 91,

    });
    $('#seo').LineProgressbar({
        percentage: 88,

    });
    $('#illustrator').LineProgressbar({
        percentage: 77,

    });

     /*-------------------------------------
      Preloader
  -------------------------------------*/
     $(document).ready(function(){
    setTimeout(function(){
      $('body').addClass('loaded');
    },500)
  });
   

});