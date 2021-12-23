$(document).ready(function(){
    $(window).scroll(function(){
        let scroll = $(window).scrollTop(); 
        if(scroll >= 50){
            // $('.mobile-top-nav').addClass('fixed-top');
            // $('.fudiku-search-area').addClass('fixed-top');
            // $('.mobile-bottom-nav').addClass('fixed-bottom');
        }    
        else{
            // $('.mobile-top-nav').removeClass('fixed-top');
            // $('.fudiku-search-area').removeClass('fixed-top');
            // $('.mobile-bottom-nav').removeClass('fixed-bottom');
        }
    });
});

$(".home-content").owlCarousel({
    loop: false,
    nav: false,
    items: 1,
    dots: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: false,
    responsive:{
        0:{
            items:1,
            margin:10,
            stagePadding: 15,
            nav:false
        },
        768:{
            items:2,
            margin:10,
            nav:false
        },
        992:{
            items:1,
            margin:10,
        },
    }
});

$(".feature-content").owlCarousel({
    loop: false,
    nav: true,
    navText:['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
    items: 3,
    dots: false,
    responsiveClass: true,
    responsive:{
        0:{
            items:2,
            margin:10,
            stagePadding: 15,
            nav:false
        },
        768:{
            items:2,
            margin:10,
            nav:false
        },
        992:{
            items:4,
            margin:10
        }
    }
 
    
});
$(".packet-content").owlCarousel({
    loop: false,
    margin: 5,
    nav: true,
    navText:['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
    items: 3,
    dots: false,
    responsiveClass: true,
    responsive:{
        0:{
            items:1,
            stagePadding: 15,
            nav:false
        },
        768:{
            items:2,
            nav:false
        },
        992:{
            items:3,
            nav:false
        }
    }
 
    
});
$(".supported-content").owlCarousel({
    loop: true,
    margin: 5,
    nav: true,
    navText:['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
    items: 3,
    dots: false,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsiveClass: true,
    responsive:{
        0:{
            items:1,
            stagePadding: 15,
            nav:false
        },
        768:{
            items:2,
            nav:false
        },
        992:{
            items:3,
            nav:false
        }
    }
 
    
});

$(".menu").owlCarousel({
    loop: false,
    nav: true,
    navText:['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
    items: 4,
    dots: false,
    responsiveClass: true,
    responsive:{
        0:{
            items:2,
            stagePadding: 15,
            margin: 10,
            nav:false
        },
        768:{
            items:3,
            nav:false
        },
        992:{
            margin: 10,
            items:5,
            nav:false
        }
    }
 
    
});

$(".order-menu-item").owlCarousel({
    loop: false,
    nav: false,
    navText:['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
    items: 5,
    dots: false,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            margin: 10,
            stagePadding: 15,
            nav: false,
            dots: false
        },
        768:{
            items:3,
            nav:false
        },
        992:{
            margin: 10,
            items:5,
            nav:false,
            loop:false
        }
    }

    
});
$(".schedule-menu-item").owlCarousel({
    loop: false,
    nav: false,
    navText:['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
    dots: false,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            margin: 10,
            stagePadding: 15,
            nav: false,
            dots: false
        },
        768:{
            items:3,
            nav:false
        },
        992:{
            items:5,
            margin: 10,
            nav:false,
            loop:false
        }
    }

    
});

$(".cart-menu").owlCarousel({
    loop: false,
    margin: 5,
    nav: false,
    navText:['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
    items: 5,
    dots: false,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            stagePadding: 15,
            nav: false,
            dots: false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav: false,
            loop:false
        }
    }
 
    
});
// var placesAutocomplete = places({
//     appId: '<YOUR_PLACES_APP_ID>',
//     apiKey: '<YOUR_PLACES_API_KEY>',
//     container: document.querySelector('#location'),
//     templates: {
//       value: function(suggestion) {
//         return suggestion.name;
//       }
//     }
//   }).configure({
//     type: 'address'
//   });


$(document).ready(function(){
    $('select').niceSelect();
});

$('.dropzone').dropzone({ url: "/file/post" });