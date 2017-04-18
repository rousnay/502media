(function($) {

    /***
    Primary Nav manu Toggle hide/show
    ***/
    jQuery("#hamburger").click(function() {
        jQuery("#site-nav").fadeToggle("slow");
    });

    /***
    Menu Button Animation
    ***/
    var toggles = document.querySelectorAll(".c-hamburger");

    for (var i = toggles.length - 1; i >= 0; i--) {
        var toggle = toggles[i];
        toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
        toggle.addEventListener("click", function(e) {
            e.preventDefault();
            (this.classList.contains("is-active") === true) ? this.classList.remove("is-active"): this.classList.add("is-active");
        });
    };


    /******************************
     Sidebar Push Slide
     ******************************/
     function sideHeaderInit() {
        var sideheader = jQuery('#sideheader');
        if (sideheader.length) {
            sideheader.perfectScrollbar();
            //sideheader.hide();
            jQuery('#hamburger').on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();

                if ($(sideheader).is('.is-visible')) {
                    $(sideheader).removeClass('is-visible');
                    
                    // $('#hamburger').addClass("is-active");
                    sideheader.hide(900);
                } else {
                    $(sideheader).addClass('is-visible');
                    
                    sideheader.show();
                }


                jQuery('body').toggleClass('sideheader-visible');
            });

            jQuery(document).on('click', function(e) {

                var _element = sideheader;

                if (!_element.is(e.target) // if the target of the click isn't the container...
                    &&
                    _element.has(e.target).length === 0) // ... nor a descendant of the container
                {
                    sideheader.removeClass('is-visible');
                    $('#hamburger').removeClass("is-active");
                    sideheader.hide(900);
                    jQuery('body').removeClass('sideheader-visible');
                }
            });

            jQuery(window).on('scroll', function(e) {
                sideheader.removeClass('is-visible');
                $('#hamburger').removeClass("is-active");
                sideheader.hide(900);
                jQuery('body').removeClass('sideheader-visible');
            });
        };
    }
    /* Calls Sideheader Init script  */
    sideHeaderInit();


    /******************************
     Library: owl.carousel
     ******************************/

    //  $("#company-logo-slider").owlCarousel({
    //  	items : 4,
    //  	navigation : true,
    //  	itemsTablet: [768,4],
    //  	itemsTabletSmall: [600,3],
    //  	itemsMobile : [400,2],
    //  	singleItem : false,
    //  	itemsScaleUp : false,
    //  	navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    //  });

    // //
    // document.addEventListener("touchstart", function(){}, true);



    /******************************
     Library: Isotope
     ******************************/

     if ($.isFunction($.fn.imagesLoaded) ) {

     	var container	= '#post-listing-isotope';

     	$(container).imagesLoaded( function() {
           $(container).isotope({
            layoutMode: 'packery',
            packery: {

            },
        });

       });
     };

    /******************************
     Library: perfect-scrollbar
     ******************************/
    // $('#mm-menu').perfectScrollbar();


    /******************
    Backgroud Gradient
    ******************/
    $('body.page-template-page-home #page').addClass('gradient-bg');

    var colors = new Array(
        [62, 35, 255], [60, 255, 60], [255, 35, 98], [45, 175, 230], [255, 0, 255], [255, 128, 0]);

    var step = 0;
    //color table indices for: 
    // current color left
    // next color left
    // current color right
    // next color right
    var colorIndices = [0, 1, 2, 3];

    //transition speed
    var gradientSpeed = 0.002;

    function updateGradient() {

        if ($ === undefined) return;

        var c0_0 = colors[colorIndices[0]];
        var c0_1 = colors[colorIndices[1]];
        var c1_0 = colors[colorIndices[2]];
        var c1_1 = colors[colorIndices[3]];

        var istep = 1 - step;
        var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
        var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
        var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
        var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

        var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
        var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
        var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
        var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

        $('.gradient-bg').css({
            background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
        }).css({
            background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"
        });

        step += gradientSpeed;
        if (step >= 1) {
            step %= 1;
            colorIndices[0] = colorIndices[1];
            colorIndices[2] = colorIndices[3];

            //pick two new target color indices
            //do not pick the same as the current one
            colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
            colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;

        }
    }

    setInterval(updateGradient, 10);


    /******************************
	 Other settings
	 ******************************/

    $(".remove-link a").removeAttr("href");

    if ($.isFunction($.fn.imagesLoaded)) {

        // $('#post-listing-isotope .post-item .grid_size_11').matchHeight();
        // $('#post-listing-isotope .post-item .grid_size_12').matchHeight();
        // $('#post-listing-isotope .post-item .grid_size_22').matchHeight();

        function equal_size() {
            var entryHeight = $('.page-template-page-blog #post-listing-isotope .post-item .entry').height();
            var totalHeight = entryHeight + 50;
            $('body.page-template-page-blog #post-listing-isotope .post-item .thumbnail').css('height', totalHeight);
        }

        // equal_size();

        $(window).resize(function() {
            // equal_size();
        });
    };

    // home_banner_adjustment

    function home_banner_adjustment() {
        var headerHeight = 0;
        var bannerHeight = 0;
        var bannerHalfHeight = 0;
        var containerHeight = 0;
        var bannerPosition = 0;
        var bannerTop = 0;
        var bannerTopMargin = 0;

        headerHeight = $('#masthead').height();
        bannerHeight = $('.banner-text').height();
        containerHeight = $(window).height();

        bannerHalfHeight = bannerHeight / 2;
        bannerPosition = (containerHeight / 2) - bannerHalfHeight;
        bannerTop = bannerPosition; //bannerPosition - headerHeight;
        bannerTopMargin = parseInt(bannerTop, 10);

        $('.banner-text').css("marginTop", bannerTopMargin);

        console.log(bannerHeight);
        console.log(bannerPosition);

    }



    function grid_adjustment() {
    //     var winWidth    = $(window).width();
    //     if(winWidth > 767 ){

    //         rW2 = $('.grid_size_22').height();
    //         console.log(rW2);
    //         rW2 = rW2 / 2;
    //         rW2 = rW2 - 10; 
    //     // rW2 = parseInt(rW2, 10);
    //     $('.grid_size_11').height(rW2);
    //     console.log(rW2);

    // }else{

    //         rW3 = $('.grid_size_12').height();
    //         console.log(rW3);
    //         rW3 = rW3 / 2;
    //         rW3 = rW3 - 10; 
    //     // rW2 = parseInt(rW2, 10);
    //     $('.grid_size_11, .grid_size_22').height(rW3);


    //     // $('#post-listing-isotope .post-item').matchHeight();

    // }


    // rW2 = $('.grid_size_22').height();
    // console.log(rW2);
    // rW2 = rW2 / 2;
    // rW2 = rW2 - 10; 
    //     // rW2 = parseInt(rW2, 10);
    //     $('.grid_size_11').height(rW2);
    //     console.log(rW2);
        // rW = $('#post-listing-isotope').width();
        // rW = rW / 2;
        // rW = rW - 20; 
        // rW = parseInt(rW, 10);
        // $('.grid_size_12').width(rW);


        // rW1 = $('#post-listing-isotope').width();
        // rW1 = rW1 / 2;
        // rW1 = rW1 - 20; 
        // rW1 = parseInt(rW1, 10);
        // $('.grid_size_11').width(rW1);

        // rW2 = $('#post-listing-isotope').width();
        // rW2 = rW2 / 2;
        // rW2 = rW2 - 20; 
        // rW2 = parseInt(rW2, 10);
        // $('.grid_size_22').width(rW2);

    }

    $(window).load(function() {
        home_banner_adjustment();
        $('.banner-text h1').css("visibility", "visible");
        // grid_adjustment();
    });

    $(window).resize(function() {
        home_banner_adjustment();
        // grid_adjustment();
    });


})(jQuery);