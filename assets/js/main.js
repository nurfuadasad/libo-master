;(function ($) {

    "use strict";
    /*---------------------------------------------------
      * Initialize all widget js in elementor init hook
      ---------------------------------------------------*/
    $(window).on('elementor/frontend/init', function () {
        // Brand Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-brand-carousel-one-widget.default', function ($scope) {
            activeBrandSlider($scope);
        });
        // Case Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-single-case-study-widget.default', function ($scope) {
            activeCaseSlider($scope);
        });
        // Case Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-single-case-two-study-widget.default', function ($scope) {
            activeCaseSlider($scope);
        });
        // Header Slider One
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-header-slider-one-widget.default', function ($scope) {
            activeHeaderSliderOne($scope);
            activeHeaderSliderTwo($scope);
        });
        // Header Slider Three
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-header-slider-three-widget.default', function ($scope) {
            activeHeaderSliderOne($scope);
        });
        // Service Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-service-slider-one-widget.default', function ($scope) {
            activeServiceGridSliderOne($scope);
        });
        // Service Slider Four
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-service-slider-four-widget.default', function ($scope) {
            activeServiceGridSliderOne($scope);
        });
        // Testimonial Slider one
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-testimonial-one-widget.default', function ($scope) {
            activeTestimonialSliderOne($scope);
        });
        // Team Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-team-member-one-widget.default', function ($scope) {
            activeTeamMemberSliderOne($scope);
        });
        // Blog Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-blog-one-widget.default', function ($scope) {
            activeBlogGridSliderOne($scope);
        });
        // Blog Slider Two
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-blog-two-widget.default', function ($scope) {
            activeBlogGridSliderOne($scope);
        });
        // Blog Slider Three
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-blog-three-widget.default', function ($scope) {
            activeBlogGridSliderOne($scope);
        });
        /* Counter Up */
        elementorFrontend.hooks.addAction('frontend/element_ready/libo-counterup-one-widget.default', function ($scope) {
            counterupInit($scope.find('.count-num'));
        });

    });


    $(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/global', function ($scope, $) {
            progressBarInit();
        });

    });

    /*------------------------------
    *    Progressbar init
    * ------------------------------*/
    function progressBarInit() {
        var neatProgressInit = $('.neaterller-progress-init');
        if (neatProgressInit.length > 0) {
            neatProgressInit.each(function (value) {
                var eel = $(this);
                eel.rProgressbar({
                    percentage: eel.data('percent'),
                    fillBackgroundColor: eel.data('fillbgcolor')
                });
            });
        }
    }

    /*-----------------------------
    *   Header Slider
    * ----------------------------*/

    // main-slider
    function activeHeaderSliderOne($scope) {
        var el = $scope.find('.main-slider');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }
        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            dots: false,
            infinete: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            arrows: false,
            asNavFor: '.main-slider-nav',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
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
        }

        wowSlickInit($selector, sliderSettings);
    }

    function activeHeaderSliderTwo($scope) {
        var el = $scope.find('.main-slider-nav');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }
        let $selector = '#' + el.attr('id');
        let sliderSettings = {
            dots: false,
            infinete: elSettings.loop === 'yes',
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            arrows: false,
            focusOnSelect: true,
            asNavFor: '.main-slider',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
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
        }
        wowSlickInit($selector, sliderSettings);
    }

    /*----------------------------------
       Case Slider Widget
   --------------------------------*/
    function activeCaseSlider($scope) {
        var el = $scope.find('.case-carousel')
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return;
        }
        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
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
        }
        wowSlickInit($selector, sliderSettings);
    }

    /*----------------------------------
        Brand Slider Widget
    --------------------------------*/
    function activeBrandSlider($scope) {
        var el = $scope.find('.brands-carousel')
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return;
        }
        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
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
        }
        wowSlickInit($selector, sliderSettings);
    }

    /*----------------------------
       * Testimonial Slider
       * --------------------------*/
    function activeTestimonialSliderOne($scope) {
        var el = $scope.find('.testimonial-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }

        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            centerPadding: '0',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
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
        }
        wowSlickInit($selector, sliderSettings);

    }


    /*----------------------------
    * Blog Post Grid Slider
    * --------------------------*/
    function activeBlogGridSliderOne($scope) {
        var el = $scope.find('.blog-grid-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }
        let $selector = '#' + el.attr('id');
        let sliderSettings = {
            infinete: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            appendArrows: $scope.find('.blog-slider-controls .slider-nav'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
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
        }
        wowSlickInit($selector, sliderSettings);
    }


    /*----------------------------
       * Service Grid Slider
       * --------------------------*/
    function activeServiceGridSliderOne($scope) {
        var el = $scope.find('.service-grid-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }

        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            appendArrows: $scope.find('.service-slider-controls .slider-nav'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            centerPadding: '0',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
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
        }
        wowSlickInit($selector, sliderSettings);
    }


    /*----------------------------
         Team Member Slider
    * --------------------------*/
    function activeTeamMemberSliderOne($scope) {
        var el = $scope.find('.team-member-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }

        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            centerPadding: '0',
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
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
        }
        wowSlickInit($selector, sliderSettings);
    }


    //owl init function
    function wowCarouselInit($selector, sliderSettings, responsive, animateIn = false, animateOut = false) {
        $($selector).owlCarousel({
            loop: sliderSettings.loop,
            autoplay: sliderSettings.autoplay, //true if you want enable autoplay
            autoPlayTimeout: sliderSettings.autoPlayTimeout,
            margin: sliderSettings.margin,
            dots: sliderSettings.dots,
            nav: sliderSettings.nav,
            navText: sliderSettings.navtext,
            animateIn: animateIn,
            animateOut: animateOut,
            responsive: responsive,
            smartSpeed: 2000,
            center: sliderSettings.center
        });
    }

    function wowCarouselInitWidthStagePadding($selector, sliderSettings, responsive, animateIn = false, animateOut = false) {
        $($selector).owlCarousel({
            loop: sliderSettings.loop,
            autoplay: sliderSettings.autoplay, //true if you want enable autoplay
            autoPlayTimeout: sliderSettings.autoPlayTimeout,
            margin: sliderSettings.margin,
            dots: sliderSettings.dots,
            nav: sliderSettings.nav,
            navText: sliderSettings.navtext,
            animateIn: animateIn,
            animateOut: animateOut,
            responsive: responsive,
            center: sliderSettings.center,
            stagePadding: 100,
            smartSpeed: 2000
        });
    }

    //slick init function
    function wowSlickInit($selector, settings, animateOut = false) {
        $($selector).slick(settings);
    }

    function wowSlickInitWidthStagePadding($selector, sliderSettings, animateIn = false, animateOut = false) {
        $($selector).slick({
            loop: sliderSettings.loop,
            autoplay: sliderSettings.autoplay, //true if you want enable autoplay
            autoPlayTimeout: sliderSettings.autoPlayTimeout,
            margin: sliderSettings.margin,
            dots: sliderSettings.dots,
            nav: sliderSettings.nav,
            navText: sliderSettings.navtext,
            animateIn: animateIn,
            animateOut: animateOut,
            center: sliderSettings.center,
            stagePadding: 100,
            smartSpeed: 2000
        });
    }

    /*------------------------------
            counter section activation
          -------------------------------*/
    function counterupInit($scope) {
        $scope.counterUp({
            delay: 20,
            time: 3000
        });
    }

    $(document).ready(function () {
        /*---------------------------------
        * Magnific Popup
        * --------------------------------*/
        $('.video-play-btn,.video-play-btn-02,.play-video-btn,.button-video').magnificPopup({
            type: 'video'
        });

    });

})(jQuery);