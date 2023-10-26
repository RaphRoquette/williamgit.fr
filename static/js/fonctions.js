(function($) {

$(document).ready(function() {
	init();
});

$(window).on( "load",  site_onLoad);

// INIT au démarrage
function init() {
    // gsap.registerPlugin(ScrollTrigger);

    $('body').addClass('ready');

    // Classe .scrollTo pour un effet smooth sur les ancres
    $('.scrollTo').on('click', function() {
            var page = $(this).attr('href');
            var vitesse = 750;
            $('html, body').animate( { scrollTop: $(page).offset().top - 180 }, vitesse ); // Go
            return false;
        });

    // Detecte si un element existe dans le DOM
    /*
    if ($('')[0]) {
        $(document.body).addClass('');
    }
    */

    // MODULE FAQ

    // MENU MOBILE
    if ($(window).width() < 1024) {

        var isOpen = false;

    // gsap.set("#header #menu", { x: "90vw" });
    // var overlayAnim = 
    // gsap.to("#header #menu", {
    //     duration: 1,
    //     ease: "power4.out",
    //     x: 0,
    //     visibility: 'visible',
    //     paused: true
    // });

    $("#btMenu").on("click", function() {
        isOpen = !isOpen;

        

        if (isOpen) {
            $(this).addClass('open');
            $('body').addClass('menu-mobile-open');
            // overlayAnim.play();



            // gsap.fromTo("#menu-principal > li > a", {
            //     yPercent: 50,
            //     autoAlpha: 0,
            //     rotation:"5",
            // }, {
            //     duration: 1,
            //     rotation:"0",
            //     autoAlpha: 1,
            //     // delay: 0.3,
            //     yPercent: 0,
            //     stagger: 0.2,
            //     ease: "expo",
            // });

        } else {
            $(this).removeClass('open');
            $('body').removeClass('menu-mobile-open');
            // overlayAnim.reverse();
        }
    });

    jQuery('body').on(
                'touchstart click', 
                '.menu-item-has-children > a', 
                function(e) {
                    e.preventDefault();

                    // fix for iOS false triggering submenu clicks
                    jQuery('.sub-menu').css('pointer-events', 'none');
                    setTimeout( function() {
                        jQuery('.sub-menu').css('pointer-events', 'initial');
                    }, 500);

                    // workaround to stop click event from triggering after touchstart
                    if (window.MenuIconTouched === true) {
                        window.MenuIconTouched = false;
                        return;
                    }
                    if (e.type==='touchstart') {
                        window.MenuIconTouched = true;
                    }
                    menu_toggle_dropdown(this);
                }
            );

    function menu_toggle_dropdown(trigger) {

                // var duration = jQuery(trigger).parents('#menu').data('oxy-pro-menu-dropdown-animation-duration');

                jQuery(trigger).closest('.menu-item-has-children').children('.sub-menu').slideToggle({
                    start: function () {
                        jQuery(this).css({
                            display: "flex"
                        })
                    },
                    // duration: 400*1000
                });
            }


             jQuery('body').on(
                'touchstart click', 
                '#menu-principal .has-children > a', 
                function(e) {
                    e.preventDefault();

                    // fix for iOS false triggering submenu clicks
                    jQuery('.sub-menu').css('pointer-events', 'none');
                    setTimeout( function() {
                        jQuery('.sub-menu').css('pointer-events', 'initial');
                    }, 500);

                    dropdown_mobile(this);
                }
            );

    function dropdown_mobile(trigger) {

                var duration = jQuery(trigger).parents('#menu-principal');

                jQuery(trigger).closest('.has-children').children('.sub-menu').slideToggle({
                    start: function () {
                        jQuery(this).css({
                            display: "flex",
                            opacity : "1"
                        });
                        $(this).toggleClass('toggle-submenu');
                    },
                    duration: duration*1000
                });
            }

            // Animation menu smart
            // if (document.querySelector('.menu-smart')) {
            //     gsap.fromTo('.menu-smart', {
            //     yPercent: 50,
            //     autoAlpha: 0,
            // },{
            //     duration: 1.5,
            //     delay: 0.3,
            //     autoAlpha: 1,
            //     yPercent: 0,
            //     ease: "expo",
            // });
            // }

    }


    if (document.querySelector('module-faq')) {
        let event = new Event('initToggle');
        document.dispatchEvent(event);
    }

    if (document.querySelector('[class*="reveal"]')) {
  
  var sections = gsap.utils.toArray('[class*="reveal"]');

sections.forEach((section) => {

  gsap.from(section, { 
    scrollTrigger: {
        trigger: section,
        start: 'top bottom',
        onEnter() {
        section.classList.add('showNow');
      },
        // scrub: true,
        // yoyo:true,
        // end: 'bottom top',
        // markers: true
    }

});

  });
}
    

    if (document.querySelector('.diaporama, .diaporama--article, .diaporama--accueil')) {

    	// Sliders d'images
	$('.diaporama, .diaporama--article, .diaporama--accueil').slick({
		dots: false,
		lazyLoad: 'ondemand',
		infinite: false,
		arrows: false,
		speed: 700,
		fade: true,
		cssEase: 'linear',
		autoplay: true,
		autoplaySpeed: 5000
	});
        
    }

    if (document.querySelector('.slider--miniatures')) {

    	// Sliders d'images
	$('.slider--miniatures').slick({
		infinite: false,
		arrows: true,
		slidesToShow: 6,

		responsive: [
				{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
			]
	});
        
    }

    if (document.querySelector('.slider')) {

    	// Sliders de contenu
	$(".slider").slick({
			lazyLoad: 'anticipated', // ondemand progressive anticipated
			infinite: false,
			arrows: true,
			autoplay:true,
			autoplaySpeed: 6000,
			pauseOnHover:true,

			responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]


		});
        
    }
    
    if (document.querySelector('.miniatures'))  {
        
        // Miniatures
    $('[data-fancybox="gallery"]').fancybox({
		buttons: [
	    "zoom",
	    //"share",
	    // "slideShow",
	    //"fullScreen",
	    //"download",
	    "thumbs",
	    "close"
	  ]
	});
        
    }

    if (document.querySelector('.formulaire')) {

    	//  $(document).bind('gform_post_render', function(event, formId, currentPage){if(formId == 1) {} } );$(document).bind('gform_post_conditional_logic', function(event, formId, fields, isInit){} );

    	// $(document).trigger('gform_post_render', [1, 1]);

    }    

    
    
}

// Au chargement du DOM
function site_onLoad(){
    $('body').addClass('dom-loaded');

    const nav = document.querySelector('#header');
	const navTop = nav.offsetTop;

function stickyNavigation() {
  // console.log('navTop = ' + navTop);
  // console.log('scrollY = ' + window.scrollY);

  if (window.scrollY >= nav.offsetHeight) {
    // nav offsetHeight = height of nav
    if ($(window).width() > 1024) {
        document.body.style.paddingTop = nav.offsetHeight + 'px';
    }
    nav.classList.add('sticky-header');
    document.body.classList.add('scrolled');
  } else {
    if ($(window).width() > 1024) {
        document.body.style.paddingTop = 0;
    }
    nav.classList.remove('sticky-header');
     document.body.classList.remove('scrolled');
  }
}

window.addEventListener('scroll', stickyNavigation);


document.addEventListener("initToggle",function(){
                initToggleState();
            },false);

            initToggleState = function() {

                jQuery('.faq-toggle').each(function() {
                
                    var initial_state = jQuery(this).attr('data-faq-toggle-initial-state'),
                       toggle_target = jQuery(this).attr('data-faq-toggle-target'),
                       active_class = jQuery(this).attr('data-faq-toggle-active-class');
                
                    if (initial_state == 'closed') {
                        if (!toggle_target) {
                            jQuery(this).next().hide();
                        } else {
                            jQuery(toggle_target).hide();
                        }
                        jQuery(this).children('.oxy-expand-collapse-icon').addClass('oxy-eci-collapsed');
                        jQuery(this).removeClass(active_class)
                    }
                    else {
                        jQuery(this).addClass(active_class)
                    }
                });
            }

            jQuery("body").on('click', '.faq-toggle', function() {

                var toggle_target  = jQuery(this).attr('data-faq-toggle-target'),
                    active_class   = jQuery(this).attr('data-faq-toggle-active-class');

                jQuery(this).toggleClass(active_class)
                jQuery(this).children('.oxy-expand-collapse-icon').toggleClass('oxy-eci-collapsed');

                if (!toggle_target) {
                    jQuery(this).next().toggle();
                } else {
                    jQuery(toggle_target).toggle();
                }

                // force 3rd party plugins to rerender things inside the toggle
                jQuery(window).trigger('resize');
            });


}
	
})( jQuery );