var $ = jQuery.noConflict();

(function($) {
    "use strict";

    var width = $(window).width();

    /*-------------------------------------------------*/
    /* =  Mobile Hover
    /*-------------------------------------------------*/
    var mobileHover = function() {
        $('*').on('touchstart', function() {
            $(this).trigger('hover');
        }).on('touchend', function() {
            $(this).trigger('hover');
        });
    };

    mobileHover();
    /*-------------------------------------------------*/
    /* =  loader
    /*-------------------------------------------------*/
    Pace.on("done", function() {
        $("#myloader").fadeOut(800);
    });
	
	const logo1 = document.getElementById('logo1');
	const logo2 = document.getElementById('logo2');

	setInterval(() => {
		if (logo1.classList.contains('hidden')) {
			logo1.classList.remove('hidden');
			logo2.classList.add('hidden');
		} else {
			logo1.classList.add('hidden');
			logo2.classList.remove('hidden');
		}
	},400);
    /*-------------------------------------------------*/
    /* =  Menu
    /*-------------------------------------------------*/
    try {
        $('.menu-button').on("click", function() {

            //menu classic, menu sidemenu, menu basic
            var menu = $('#menu');
            var menuClassic = $('#menu-classic');
            var sidemenu = $('#sidemenu');
            var menuResponsiveSidemenu = $('#menu-responsive-sidemenu');
            var menuResponsiveClassic = $('#menu-responsive-classic');

            menu.toggleClass('open');
            menuClassic.toggleClass('open');
            sidemenu.addClass('sidemenu open');
            menuResponsiveSidemenu.toggleClass('open');
            menuResponsiveClassic.toggleClass('open');
            menu.addClass('animated slideInDown');
            $('.submenu', menuClassic).each(function() {
                $('.submenu', menuClassic).removeClass("open");
            });
            if (sidemenu.hasClass("slideInRight")) {
                sidemenu.removeClass('animated slideInRight');
                sidemenu.addClass('animated slideOutRight');
                setTimeout(function() {
                    sidemenu.toggleClass('sidemenu open');
                    sidemenu.removeClass('animated slideOutRight');
                }, 1000);
            } else {
                sidemenu.addClass('animated slideInRight');
            }
            if (width < 991) {
                $('body').toggleClass('no-scroll');
            }
        });
        $('.menu-holder ul > li:not(.submenu) > a').on("click", function() {
            $('#menu').removeClass('open');
            $('body').removeClass('no-scroll');
        });
        //basic menu mobile
        $('.close-menu').on("click", function() {

            var menu = $('#menu');

            menu.removeClass('animated slideInDown');
            menu.addClass('animated fadeOutUp');
            setTimeout(function() {
                menu.toggleClass('open');
                menu.removeClass('animated fadeOutUp');
            }, 1000);
            if (width < 991) {
                $('body').toggleClass('no-scroll');
            }
        });
        //megamenu mobile
        if (width < 991) {

            var menuClassicSubmenu = $('.submenu', '#menu-classic');

            menuClassicSubmenu.on("click", function() {
                var open = false;
                if ($(this).hasClass('open')) {
                    open = true;
                }
                menuClassicSubmenu.each(function() {
                    menuClassicSubmenu.removeClass("open");
                });
                if (open) {
                    $(this).addClass('open');
                }
                $(this).toggleClass('open');
            });
        }
    } catch (err) {

    };
    /*-------------------------------------------------*/
    /* =  Sticky menu
    /*-------------------------------------------------*/
    $(window).on('scroll', function() {

        var scroll = $(window).scrollTop();
        var height = $(window).height();
        var stickyHeader = $('header.fixed.transparent');

        if (scroll >= 90) {
            stickyHeader.addClass("fixed-top animated fadeInDown").delay(2000).fadeIn();
        } else if (scroll <= height) {
            stickyHeader.removeClass("fixed-top fadeInDown");
        } else {
            stickyHeader.removeClass("fixed-top animated fadeInDown");
        }
    });
    /*-------------------------------------------------*/
    /* =  Search Box Menu
    /*-------------------------------------------------*/
    try {
        $('.menu-holder .search').on("click", function() {
            $('#search-box').toggleClass('active');
            $('body').toggleClass('no-scroll');
        });
        $('.close-search-box').on("click", function() {
            $('#search-box').toggleClass('active');
            $('body').toggleClass('no-scroll');
        });
    } catch (err) {

    };
    /*-------------------------------------------------*/
    /* =  Slider
    /*-------------------------------------------------*/
    try {
        $('#flexslider').flexslider({
            animation: "fade",
            controlNav: false,
            directionNav: false,
            useCSS: false
        });
        $('#flexslider-nav').flexslider({
            animation: "slide",
            reverse: true,
            easing: "swing",
            controlNav: false,
            animationSpeed: 1000,
            controlsContainer: $(".slider-controls-container"),
            customDirectionNav: $(".slider-navigation a"),
            before: function(slider) {
                $(slider).find(".flex-animation").each(function() {
                    $(this).removeClass("animated fadeInUp");
                    $(this).addClass("no-opacity");
                });
            },
            after: function(slider) {
                $(slider).find(".flex-animation").addClass("animated fadeInUp");
            },
        });
    } catch (err) {

    }
    /*-------------------------------------------------*/
    /* =  Isotope
    /*-------------------------------------------------*/
    try {

        var $masonryContainerSimple = $('section[data-isotope="load-simple"] .masonry-items');
        $masonryContainerSimple.imagesLoaded(function() {

            var $container = $('.masonry-items').isotope({ itemSelector: '.one-item', layoutMode: 'masonry' });
            var $masonryFilters = $('#masonry-filters');

            $masonryFilters.on('click', 'li', function() {
                var filterValue = $(this).attr('data-filter');
                $container.isotope({
                    filter: filterValue
                });
            });
            $masonryFilters.each(function(i, buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'li', function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $(this).addClass('is-checked');
                });
            });

        });

    } catch (err) {

    }

    //blog masonry
    try {
        var $blogContainer = $('.news-items');
        $blogContainer.imagesLoaded(function() {
            $blogContainer.isotope({ itemSelector: '.one-item', layoutMode: 'fitRows' });
            $blogContainer.isotope('layout');
        });
    } catch (err) {

    }
    /*-------------------------------------------------*/
    /* =  Responsive
    /*-------------------------------------------------*/

    var parentHeightKey = [];

    $('div[data-responsive="parent-height"]').each(function() {
        parentHeightKey.push({ id: $(this).attr('data-responsive-id'), height: $(this).outerHeight(true) });
    });
    $('div[data-responsive="child-height"]').each(function() {
        var childHeight;
        var childId = $(this).attr('data-responsive-id');

        for (var i = 0; i < parentHeightKey.length; i++) {
            if (parentHeightKey[i].id == childId) {
                childHeight = parentHeightKey[i].height;
            }
        }
        $(this).css({ 'height': childHeight + 'px' })
    });
    $(window).resize(function() {

        var currentWidth = $(window).width();

        if (currentWidth > 767) {
            $('div[data-responsive="parent-height"]').each(function() {
                parentHeightKey.push({ id: $(this).attr('data-responsive-id'), height: $(this).outerHeight(true) });
            });
            $('div[data-responsive="child-height"]').each(function() {
                var childHeight;
                var childId = $(this).attr('data-responsive-id');

                for (var i = 0; i < parentHeightKey.length; i++) {
                    if (parentHeightKey[i].id == childId) {
                        childHeight = parentHeightKey[i].height;
                    }
                }
                $(this).css({ 'height': childHeight + 'px' })
            });
        }
    });
    /*-------------------------------------------------*/
    /* =  Magnific popup
    /*-------------------------------------------------*/
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        closeBtnInside: false,
        fixedContentPos: true
    });
    $('#gallery').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: '.lightbox',
            type: 'image',
            fixedContentPos: true,
            gallery: {
                enabled: true
            },
            closeBtnInside: false
        });
    });
    $('.lightbox-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },
        closeBtnInside: false
    });
    /*-------------------------------------------------*/
    /* =  Share
    /*-------------------------------------------------*/
    try {
        $('#post-wrap').on("click", '#share', function() {
            $('#post-wrap #share .share-icons').show();
            $('#post-wrap #share .share-icons').toggleClass('open');
        });

    } catch (err) {

    }
    /*-------------------------------------------------*/
    /* =  Count increment
    /*-------------------------------------------------*/
    try {
        $('#counters').appear(function() {
            $('#counters .statistic span').countTo({
                speed: 4000,
                refreshInterval: 60,
                formatter: function(value, options) {
                    return value.toFixed(options.decimals);
                }
            });
        });
    } catch (err) {

    }
    /*-------------------------------------------------*/
    /* =  Appear
    /*-------------------------------------------------*/
    try {
        $('#flexslider-nav #text').appear(function() {
            $('#counters .statistic span').countTo({
                speed: 4000,
                refreshInterval: 60,
                formatter: function(value, options) {
                    return value.toFixed(options.decimals);
                }
            });
        });
    } catch (err) {

    }
    /*-------------------------------------------------*/
    /* =  Contact Form
    /*-------------------------------------------------*/
    var submitContact = $('#submit-contact'),
        message = $('#msg');

    submitContact.on('click', function(e) {
        e.preventDefault();

        var $this = $(this);

        $.ajax({
            type: "POST",
            url: 'contact.php',
            dataType: 'json',
            cache: false,
            data: $('#contact-form').serialize(),
            success: function(data) {

                console.log(data);
                if (data.info !== 'error') {
                    $this.parents('form').find('input[type=text],textarea,select').filter(':visible').val('');
                    message.hide().removeClass('success').removeClass('error').addClass('success').html(data.msg).fadeIn('slow').delay(5000).fadeOut('slow');
                } else {
                    message.hide().removeClass('success').removeClass('error').addClass('error').html(data.msg).fadeIn('slow').delay(5000).fadeOut('slow');
                }
            }
        });
    });
})(jQuery);

$(document).ready(function($) {
    "use strict";

    var is_mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    /*-------------------------------------------------*/
    /* =  fullpage
    /*-------------------------------------------------*/
    $('#fullpage').fullpage({
        navigation: true,
        paddingTop: '130px',
        onLeave: function(index, nextIndex, direction) {
            var leavingSection = $(this);
            console.log("leave slider" + index);
            $(".fp-tableCell").find(".text").removeClass("animated fadeInUp");
        },
        afterLoad: function(anchorLink, index) {
            var loadedSection = $(this);

            loadedSection.find(".text").addClass("animated fadeInUp");
            console.log("after-load" + index);
        }
    });
    /*-------------------------------------------------*/
    /* =  Carousel
    /*-------------------------------------------------*/
    try {
        $(".gallery-carousel").owlCarousel({
            loop: true,
            nav: true,
            margin: 25,
            navText: ['<span><i class="icon ion-ios-arrow-left"></i></span>', '<span><i class="icon ion-ios-arrow-right"></i></span>'],
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                480: {
                    items: 4
                },
                767: {
                    items: 5
                },
                991: {
                    items: 6
                },
                1199: {
                    items: 8
                }
            }

        });
        $(".news-carousel").owlCarousel({
            loop: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            items: 1,
            autoplay: true,
            autoplayHoverPause: false,
            mouseDrag: false,
            dots: false
        });
        $(".testimonials-carousel").owlCarousel({
            loop: true,
            animateOut: 'fadeOut',
            animateIn: 'slideInUp',
            items: 1,
            autoplay: true,
            mouseDrag: true,
            dots: true
        });
        $(".testimonials-carousel-simple").owlCarousel({
            loop: true,
            items: 2,
            autoplay: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                650: {
                    items: 1
                },
                991: {
                    items: 1
                }
            }
        });
        $(".showcase-carousel").owlCarousel({
            loop: true,
            items: 3,
            margin: 50,
            autoplay: true,
            dots: true,
            navSpeed: 1000,
            dotsSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                650: {
                    items: 1
                },
                991: {
                    items: 2
                }
            }
        });
        $(".post-gallery").owlCarousel({
            center: true,
            items: 1,
            loop: true,
            margin: 25,
            responsive: {
                991: {
                    items: 1,
                    stagePadding: 250,
                },
                1250: {
                    items: 1,
                    stagePadding: 300,
                },
                1450: {
                    items: 1,
                    stagePadding: 460,
                }
            }
        });
        $(".image-carousel").owlCarousel({
            loop: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            items: 1,
            autoplay: false,
            autoplayHoverPause: false,
            dots: true,
            nav: true,
            navText: ['<span><i class="icon ion-ios-arrow-left"></i></span>', '<span><i class="icon ion-ios-arrow-right"></i></span>']
        });
        $(".sponsor-carousel").owlCarousel({
            loop: true,
            autoplay: true,
            dots: false,
            autoplayTimeout: 3000,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2
                },
                480: {
                    items: 3
                },
                1199: {
                    items: 4,
                    loop: true
                }
            }
        });
        $(".home-carousel").owlCarousel({
            center: true,
            items: 1,
            dots: false,
            loop: true,
            margin: 12,
            nav: true,
            navText: ['<span><i class="icon ion-ios-arrow-left"></i></span>', '<span><i class="icon ion-ios-arrow-right"></i></span>'],
            navSpeed: 1200,
            responsive: {
                0: {
                    margin: 0
                },
                480: {
                    margin: 12
                },
                767: {
                    items: 2
                },
                1199: {
                    items: 3
                }
            }
        });
    } catch (err) {

    }
    /*-------------------------------------------------*/
    /* =  Scroll between sections
    /*-------------------------------------------------*/
    $('a.btn-alt[href*=#], a.btn-pro[href*=#], a.anchor[href*=#]').on("click", function(event) {
        var $this = $(this);
        var offset = -70;
        $.scrollTo($this.attr('href'), 850, { easing: 'swing', offset: offset, 'axis': 'y' });
        event.preventDefault();
    });
    /*-------------------------------------------------*/
    /* =  Skills
    /*-------------------------------------------------*/
    try {
        $('#skills').appear(function() {
            jQuery('.skill-list li span').each(function() {
                jQuery(this).animate({
                    width: jQuery(this).attr('data-percent')
                }, 2000);
            });
            $('.skill-list li .count').each(function() {
                var number = $(this).attr('data-to');
                $(this).prop('Counter', 0).animate({
                    Counter: number
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });
    } catch (err) {

    }
});