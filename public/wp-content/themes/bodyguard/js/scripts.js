jQuery(document).ready(function($) {
  "use strict";


  var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};


if(!isMobile.any()) {


  /*_________________________________ Waypoints ___________________*/
  var waypoints = $('.main').waypoint({
    handler: function (direction) {
      $('.wd-section-blog-services.style-3').addClass('anim-on');
      $('.wd-section-blog-services.style-3 .wd-blog-post').addClass('nohover');
    },
    offset: '45%'
  });

  $('.animated').css('opacity', 0);


  //___________ Add animation delay
  var thisParent     = $(this).closest( '.animation-parent'),
    animationDelay = thisParent.data('animation-delay');

  // find ".animation-parent"
  $('.animation-parent').each(function( index, element ) {
    // find each ".animated" in the current ".animation-parent"
    $('.animated', $(this)).each(function ( index, element ) {
      thisParent     = $(this).closest( '.animation-parent' );
      animationDelay = thisParent.data('animation-delay');
      animationDelay = animationDelay * index;
      $(this).css('animation-delay', animationDelay + 'ms');
    });
  });




  //___________ animate Element when it visible
  $('.animated').waypoint(function() {
      $(this).css('opacity', 1);
      $(this).addClass($(this).data('animated'));
    },
    { offset: 'bottom-in-view' });


} else {
  $("div").removeClass('wpb_animate_when_almost_visible');
  $('.animated').css('opacity', 1);
}




// $('a.open-first').on('click', function() {
//   alert("ok");
//   $('#tc_modal').foundation('reveal','open');
// });
  $('video.blog-video, audio').mediaelementplayer();
       $(document).foundation();
  
  /*************************** Configuration Panel ****************************************/    
  var movementsize = -160;
  $( ".styleswitcher-contener .selector" ).on( "click", function() {
    $('.styleswitcher').animate({
      left: '+=' + movementsize
      }, 500, function() {
        movementsize = movementsize * -1;
      }
    );
  });
  
  $('.styleswitcher').animate({ left: '+=' + movementsize }, 1500, function() { movementsize = movementsize * -1; }
  );
  $( "input[type=radio][name=switch-color]" ).on( "change", function() {
      if (this.value == 'white') {
          $('body').removeClass('black');
      }
      else if (this.value == 'black') {
          $('body').addClass('black');
      } 
    }
  );    
  $( "input[type=radio][name=switch-layout]" ).on( "change", function() {
      if (this.value == 'full') {
          $('body').removeClass('l-boxed');
      }
      else if (this.value == 'boxed') {
          $('body').addClass('l-boxed');
      } 
    }
  ); 
      
    /*
     * ---------blog bare height-------------
     */
    var wd_heig = $(".body.field").innerHeight() + 372;
    $(".blog-info").css('height', wd_heig);
    
    /*************************** Animation ****************************************/    
    $('.animated-content').appear(function() {
      $(this).addClass('animated');
    },{accX: 50, accY: 100});
    
    
    /*************************** Lists ****************************************/
    var classList;
    var sectionclass;
    $(".list-icon li").each(function(index) {
      classList = $(this).parent().attr('class').split(/\s+/);
      var iconclass = classList[1].replace('list-', '');

      $(this).prepend('<i class="fa ' + iconclass + '"></i>');
    });
    



  $(".show-cart-btn").hoverIntent({
    over : cartover,
    out : cartout,
    timeout : 500
  });

  function cartover(){
    $('.hidden-cart')
      .stop(true,true)
      .fadeIn({duration:500,queue:false})
      .css('display','none')
      .slideDown(500);
  }
  function cartout(){
    $('.hidden-cart')
      .stop(true,true)
      .fadeOut({duration:100,queue:false})
      .slideUp(100);
  }


  $("hidden-cart").mouseover(function(){
    $(this).css("display","block");
  });

  $("hidden-cart").mouseout(function(){
    $(this).css("display","none");
  });


 $("#menu-main-menu li").hoverIntent({
     over : navover,
     out : navout,
     timeout : 250
   });
 function navover(){
   jQuery(this).children('ul')
     .stop(true,true)
     .fadeIn({duration:250,queue:false})
     .css('display','none')
     .slideDown(250)
 }
 function navout(){
   /*jQuery(this).children('ul')
     .stop(true,true)
     .fadeOut({duration:50,queue:false})
     .slideUp(50);*/
 }
 $("#menu-main-menu .wd_mega- menu li").css("display","block");

  /*$(".menu-item-has-children > a").click(function(event) {
    event.preventDefault();
  });*/




    
    $(window).resize(function() {
      
      /////////////////// centered tabs ///////////////////////////////////////
      var section_containers = $('.section-container.auto.center');
      $.each(section_containers, function(key, section_container) {
        section_container = $(section_container);
        // convert section_container to jquery object
        var section_containerWidth = section_container.width(), titles = section_container.find('p.title'), titleWidth = titles.first().width(), titleLen = titles.length, titleWidth = titles.first().width();

        $.each(titles, function(key2, value2) {
          $(value2).animate({
            'left' : ((section_containerWidth / 2) - ((titleWidth * titleLen ) / 2) + key2 * titleWidth),
          }, 100, 'swing');
        });
      });

    });








// --------------------------------------------------

$('.twitter-share').sharrre({
  share: {
    twitter: true
  },
  enableHover: false,
  enableTracking: true,
  //buttons: { twitter: {via: '_JulienH'}},
  click: function(api, options){
    api.simulateClick();
    api.openPopup('twitter');
  }
});
$('.facebook-share').sharrre({
  share: {
    facebook: true
  },
  enableHover: false,
  enableTracking: false,
  click: function(api, options){
    api.simulateClick();
    api.openPopup('facebook');
  }
});


// --------------------------------------------------

// Style swicher

    $( ".wd-panel-cog a" ).on( "click", function(event) {
      event.preventDefault();
      $(".wd-front-panel").toggleClass("close");
    }); 

    $( "#wd_menu_front" ).on( "change", function() {
        if($(this).is(":checked")) {
          wd_sticky_menu();
          eraseCookie('wd_is_sticky');
          createCookie('wd_is_sticky', 'true', 1);
        } else {
          wd_unsticky_menu();
          eraseCookie('wd_is_sticky');
          createCookie('wd_is_sticky', 'false', 1);
        }
    });

    $( "#wd_boxed_front" ).on( "change", function() {
        if($(this).is(":checked")) {
          wd_boxed();
          eraseCookie('wd_is_boxed');
          createCookie('wd_is_boxed', 'true', 1);
        } else {
          wd_fullwidth();
          eraseCookie('wd_is_boxed');
          createCookie('wd_is_boxed', 'false', 1);
        }
    });

    $( "#wd_rtl_front" ).on( "change", function() {
        if($(this).is(":checked")) {
          wd_ltr_to_rtl();
          eraseCookie('wd_is_rtl');
          createCookie('wd_is_rtl', 'true', 1);
        } else {
          wd_rtl_to_lrt();
          eraseCookie('wd_is_rtl');
          createCookie('wd_is_rtl', 'false', 1);
        }
    });





// --------------------- Cookies ------------------------------




/*var wd_is_rtl = readCookie('wd_is_rtl');
var wd_is_sticky = readCookie('wd_is_sticky');
var wd_is_boxed = readCookie('wd_is_boxed');
var wd_is_bg_image_swicher = readCookie('wd_is_bg_image_swicher');




if (wd_is_rtl !== null) {
  if (wd_is_rtl == "true") {
    wd_ltr_to_rtl();
    $("#wd_rtl_front").attr("checked", true);
  }
  else {
    $("#wd_rtl_front").attr("checked", false);
  }
}

if (wd_is_sticky !== null) {
  if (wd_is_sticky == "true") {
    wd_sticky_menu();
    $("#wd_menu_front").attr("checked", true);
  }
  else {
    $("#wd_menu_front").attr("checked", false);
  }
}

if (wd_is_boxed !== null) {
  if (wd_is_boxed == "true") {
    $(window).trigger("resize");
    wd_boxed();
    $("#wd_boxed_front").attr("checked", true);

  }
  else {
    wd_fullwidth();
    $("#wd_boxed_front").attr("checked", false);
    $("body").css("background-image","none");
  }
}

if (wd_is_boxed == "true") {
      var input_value = wd_is_bg_image_swicher;
      $('.wd-bg-image label').removeClass( "label_selected" );
      $("." + input_value).addClass( "label_selected" );
      if (input_value =="checkbox_image1") {
        $("body").css("background-image", "url('http://themes.webdevia.com/bodyguard/demo-1/wp-content/themes/bodyguard/images/pattern/pattern1.jpg')");
      };
      if (input_value =="checkbox_image2") {
        $("body").css("background-image", "url('http://themes.webdevia.com/bodyguard/demo-1/wp-content/themes/bodyguard/images/pattern/pattern2.jpg')");
      };
      if (input_value =="checkbox_image3") {
        $("body").css("background-image", "url('http://themes.webdevia.com/bodyguard/demo-1/wp-content/themes/bodyguard/images/pattern/pattern3.jpg')");
      };
      if (input_value =="checkbox_image4") {
        $("body").css("background-image", "url('http://themes.webdevia.com/bodyguard/demo-1/wp-content/themes/bodyguard/images/pattern/pattern4.jpg')");
      };
      $("body").css("background-size", "cover");
      $("body").css("background-attachment", "fixed");
}*/




function wd_sticky_menu() {
  $( window ).scroll(function() {
    $(".top-bar-container.contain-to-grid").addClass('sticky');
    /*$(".top-bar-container.contain-to-grid").addClass('fixed');*/
  });
}
function wd_unsticky_menu() {
  $( window ).scroll(function() {
    $("body").removeClass('f-topbar-fixed');
    $(".top-bar-container.contain-to-grid").removeClass('fixed');
  });
}



function wd_applayboxed() {
  $(".vc_row.wpb_row.vc_row-fluid").css("width","1170px");
    $(".vc_row.wpb_row.vc_row-fluid").css("padding","0");
    $(".vc_row.wpb_row.vc_row-fluid").css("left","auto");
}

function wd_boxed () {
  $("body").addClass('bg_body_color');
  $("#spaces-main").addClass('wd_wrapper');
  $(window).trigger("resize");

  wd_applayboxed();
  $( window ).resize(function() {
    wd_applayboxed();
  });
}
function wd_fullwidth() {
  $("body").removeClass('bg_body_color');
  $("#spaces-main").removeClass('wd_wrapper');
  $(window).trigger("resize");
  $("body").css("background-image","none");
  $('.wd-bg-image label').removeClass( "label_selected" );
}





function wd_ltr_to_rtl() {
    $('head').append('<link media="all" type="text/css" href="http://themes.webdevia.com/bodyguard/wp-content/themes/bodyguard/rtl.css" id="custom-style-rtl-css" rel="stylesheet">');
    $('head').append('<link media="all" type="text/css" href="http://themes.webdevia.com/bodyguard/wp-content/themes/bodyguard/css/rtl.css" id="rtl-style-2-css" rel="stylesheet">');

    var show = $(".services-box").data("show");
    var carousel_client = $('.carousel_client');


    carousel_client.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
    carousel_client.find('.owl-stage-outer').children().unwrap();

    $('.carousel_client').owlCarousel({
        items: show,
        nav:true,
        rtl : true,
        margin:10,
        navText: ["<i class='fa fa-arrow-circle-o-left'></i>", "<i class='fa fa-arrow-circle-o-right'></i>"],
        autoplay:true,
        autoplayTimeout:5000,
        responsiveClass:true,
        responsive:{
        0:{
            items:1,
            rtl : true,
            nav:true,
        },
        600:{
            items:2,
            rtl : true,
            nav:false
        },
        1000:{
            items:4,
            rtl : true,
            nav:true,
            loop:false,
        }
       }
    });

    var owl_blog = $('.wd-gallery-images-holder');
    owl_blog.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
    owl_blog.find('.owl-stage-outer').children().unwrap();


    $('.wd-gallery-images-holder').owlCarousel({
      items: 1,
      nav:true,
      rtl : true,
        margin:0,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
      autoplay:true,
        autoplayTimeout:5000,
    });
}

function wd_rtl_to_lrt() {
    $('#custom-style-rtl-css').remove();
    $('#rtl-style-2-css').remove();

    var show = $(".services-box").data("show");
    var carousel_client = $('.carousel_client');


    carousel_client.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
    carousel_client.find('.owl-stage-outer').children().unwrap();

    $('.carousel_client').owlCarousel({
        items: show,
        nav:true,
        rtl : false,
        margin:10,
        navText: ["<i class='fa fa-arrow-circle-o-left'></i>", "<i class='fa fa-arrow-circle-o-right'></i>"],
        autoplay:true,
        autoplayTimeout:5000,
        responsiveClass:true,
        responsive:{
        0:{
            items:1,
            rtl : false,
            nav:true,
        },
        600:{
            items:2,
            rtl : false,
            nav:false
        },
        1000:{
            items:4,
            rtl : false,
            nav:true,
            loop:false,
        }
       }
    });

    var owl_blog = $('.wd-gallery-images-holder');
    owl_blog.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
    owl_blog.find('.owl-stage-outer').children().unwrap();


    $('.wd-gallery-images-holder').owlCarousel({
      items: 1,
      nav:true,
      rtl : false,
      margin:0,
      navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
      autoplay:true,
      autoplayTimeout:5000,
    });
}



/*if (wd_is_boxed == "true") {
  $('.wd-bg-image').on('change', 'input[name=checkbox_image]:radio', function (e) {
    var input_value = $(this).attr('id');
    eraseCookie('wd_is_bg_image_swicher');
    createCookie('wd_is_bg_image_swicher', input_value , 1);
    $('.wd-bg-image label').removeClass( "label_selected" );
    $("." + input_value).addClass( "label_selected" );
    if (input_value =="checkbox_image1") {
      $("body").css("background-image", "url('http://themes.webdevia.com/bodyguard/demo-1/wp-content/themes/bodyguard/images/pattern/pattern1.jpg')");
    };
    if (input_value =="checkbox_image2") {
      $("body").css("background-image", "url('http://themes.webdevia.com/bodyguard/demo-1/wp-content/themes/bodyguard/images/pattern/pattern2.jpg')");
    };
    if (input_value =="checkbox_image3") {
      $("body").css("background-image", "url('http://themes.webdevia.com/bodyguard/demo-1/wp-content/themes/bodyguard/images/pattern/pattern3.jpg')");
    };
    if (input_value =="checkbox_image4") {
      $("body").css("background-image", "url('http://themes.webdevia.com/bodyguard/demo-1/wp-content/themes/bodyguard/images/pattern/pattern4.jpg')");
    };
    $("body").css("background-size", "cover");
    $("body").css("background-attachment", "fixed");
  });
}*/


function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

// --------------------- End Cookies ------------------------------








var $container = $('.post-type-archive-product ul.products');
  // init
  $container.packery({
    itemSelector: '.product',
    gutter: 0
  });

 $(window).load(function(){
  var $container = $('.post-type-archive-product ul.products');
  $container.packery();
 });


$('.header_style').on('change', function() {
  if (this.value =="normal") {
    $(".l-header.creative-layout").removeClass('style-2');
  };

  if (this.value =="creative") {
    $(".l-header.creative-layout").addClass('style-2');
  };
});


  $('.show-search').on('click', function() {
    $('.overlay-search').toggleClass('hide');
  });

  $(document).foundation();
});




