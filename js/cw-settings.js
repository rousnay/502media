( function( $ ) {


	/******************************
	 Home page background image
	 ******************************/
	 // if ($('.page-template-page-home').length > 0) {
	 // 	$('#page').addClass('home-page-bg');
	 // 	$('html, body').css({
		//     'overflow': 'hidden',
		//     'height': '100%'
		// });
	 // }

	/******************************
	 Header and Menu
	 ******************************/
	 jQuery('#mm-menu li').addClass("mm-menu__item");
	 jQuery('#mm-menu a').addClass("mm-menu__link");
	 jQuery('#mm-menu a span').addClass("mm-menu__link-text");
	 var menu = new Menu;



	


	/******************************
	 Sidebar Push Slide
	 ******************************/
	 function sideHeaderInit() {
	 	var sideheader = jQuery('#sideheader');
	 	if (sideheader.length) {
	 		sideheader.perfectScrollbar();
	 		//sideheader.hide();
	 		jQuery('.sideheader-trigger a').on('click', function(event) {
	 			event.preventDefault();
	 			event.stopPropagation();

				if ($(sideheader).is('.is-visible')) {
				    $(sideheader).removeClass('is-visible');
				    sideheader.hide(900);
				}
				else{
				    $(sideheader).addClass('is-visible');
				    sideheader.show();
				}


	 			jQuery('body').toggleClass('sideheader-visible');
	 		});

	 		jQuery(document).on('click', function(e) {

	 			var _element = sideheader;

				if (!_element.is(e.target) // if the target of the click isn't the container...
					&& _element.has(e.target).length === 0 ) // ... nor a descendant of the container
				{
					sideheader.removeClass('is-visible');
					sideheader.hide(900);
					jQuery('body').removeClass('sideheader-visible');
				}
			});

	 		jQuery(window).on('scroll', function(e) {
	 			sideheader.removeClass('is-visible');
	 			sideheader.hide(900);
	 			jQuery('body').removeClass('sideheader-visible');
	 		});
	 	};
	 }
	 /* Calls Sideheader Init script  */
	 sideHeaderInit();


	/******************************
	 Animated Hamburger Icons
	 ******************************/

	// var toggles = document.querySelectorAll(".c-hamburger");

	// for (var i = toggles.length - 1; i >= 0; i--) {
	// 	var toggle = toggles[i];
	// 	toggleHandler(toggle);
	// };

	// function toggleHandler(toggle) {
	// 	toggle.addEventListener( "click", function(e) {
	// 		e.preventDefault();
	// 		(this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
	// 	});
	// }


	/******************************
	 bPopup Options
	 ******************************/

	 $('.fa-search').bind('click', function(e) {

        // Prevents the default action to be triggered. 
        e.preventDefault();

        // Triggering bPopup when click event is fired
        $('#search-popup').bPopup({
        	modalClose: false,
        	positionStyle: 'fixed',
        	Speed: 1500,
        	modalColor: '#F59E26',
        	opacity: 0.75,
        	closeClass: 'popup-close',

        }, function(){ $("#search-input").focus(); });
    });

    //   $(".popup-close").on('click',function(){
	// 	bpopup.close();
	// });



	/*********************************
	 Load more option to Search result
	 *********************************/
	 size_art = $(".search-results article").size();
	 x=5;

	 if(size_art <= 5){
	 	$('#loadMore').hide();
	 	$('#showLess').hide();
	 }

	 $('.search-results article:lt('+x+')').show();

	 $('#loadMore').click(function () {
	 	x= (x+6 <= size_art) ? x+6 : size_art;
	 	$('.search-results article:lt('+x+')').slideDown();

	 	$('#showLess').show();
	 	if(x <= 5  || x == size_art){
	 		$('#loadMore').hide();
	 	}

	 	var visibleArt = $('.search-results').find('article:visible:last');

	 	$('html, body').animate({
	 		scrollTop: $(visibleArt).offset().top
	 	}, 1000);
	 });

	 $('#showLess').click(function () {
	 	x=(x-6<0) ? 5 : x-6;


	 	$('#loadMore').show();
	 	$('#showLess').show();
	 	if(x <= 5){
	 		$('#showLess').hide();
	 	}


	 	$('.search-results article').not(':lt('+x+')').hide(1000);

	 	var visibleArt = $('.search-results').find('article:visible:last').prevAll().eq(7);
	 	$('html, body').animate({
	 		scrollTop: $(visibleArt).offset().top
	 	}, 1000);


	 });


	/******************************
	 Font Adjustment
	 ******************************/
	 // var a=$("body");
	 // $("#textplus").click(function(){
	 // 	var c=a.css("fontSize");
	 // 	var b=parseInt(c.replace("px",""))+1;$(a).css("fontSize",b+"px")
	 // });
	 // $("#textminus").click(function(){
	 // 	var c=a.css("fontSize");
	 // 	var b=parseInt(c.replace("px",""))-1;$(a).css("fontSize",b+"px")
	 // })


	/******************************
	 Library: owl.carousel
	 ******************************/
	 $("#advice-steps").owlCarousel({
	 	// Most important owl features
	 	items : 2,
	 	itemsDesktop : [1199,2],
	 	itemsDesktopSmall : [980,2],
	 	itemsTablet: [768,2],
	 	itemsTabletSmall: [600,2],
	 	itemsMobile : [400,1],
	 	singleItem : false,
	 	itemsScaleUp : false,

	 	//Basic Speeds
	    slideSpeed : 200,
	    paginationSpeed : 800,
	    rewindSpeed : 1000,
	 
	    //Autoplay
	    autoPlay : true,
	    stopOnHover : false,
	 
	    // Navigation
	    navigation : true,
	    navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	    //rewindNav : true,
	    //scrollPerPage : false,
	 
	    //Pagination
	    pagination : false,
	    // paginationNumbers: false,
	 
	    // Responsive 
	    // responsive: true,
	    // responsiveRefreshRate : 200,
	    // responsiveBaseWidth: window,
	 
	    // CSS Styles
	    // baseClass : "owl-carousel",
	    // theme : "owl-theme",
	 
	    //Lazy load
	    // lazyLoad : false,
	    // lazyFollow : true,
	    // lazyEffect : "fade",
	 
	    //Auto height
	    // autoHeight : false,
	 
	    //JSON 
	    // jsonPath : false, 
	    // jsonSuccess : false,
	 
	    //Mouse Events
	    // dragBeforeAnimFinish : true,
	    // mouseDrag : true,
	    // touchDrag : true,
	 
	    //Transitions
	    //transitionStyle : false,
	 
	    // Other
	    //addClassActive : false,
	 
	    //Callbacks
	    // beforeUpdate : false,
	    // afterUpdate : false,
	    // beforeInit: false, 
	    // afterInit: false, 
	    // beforeMove: false, 
	    // afterMove: false,
	    // afterAction: false,
	    // startDragging : false
	    // afterLazyLoad : false

		 });

	 	 $("#logo-slider").owlCarousel({
		 	items : 15,
		 	navigation : true,
		 	itemsDesktop : [1199,12],
		 	itemsDesktopSmall : [980,10],
		 	itemsTablet: [768,8],
		 	itemsTabletSmall: [600,6],
		 	itemsMobile : [400,4],
		 	singleItem : false,
		 	itemsScaleUp : false,
		 	navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		 });

	//
	document.addEventListener("touchstart", function(){}, true);



	/******************************
	 Library: Isotope
	 ******************************/

	 if ($.isFunction($.fn.imagesLoaded) ) {


	 	var container	= '#post-listing-isotope';
	 	var selector	= '.post-item';

		$(container).imagesLoaded( function() {
		 	$(container).isotope({
			  // options...
			  itemSelector: selector,
			  masonry: {
			  	columnWidth: selector
			  }
			});
		});

		// filter items when filter link is clicked
		$('#filters li').click(function(){
			$('#filters li.active').removeClass('active');
			var selector = $(this).attr('data-filter');
			$(container).isotope({ filter: selector, animationEngine : "css" });
			$(this).addClass('active');
			return false;

		});


		// filter items when filter link is selected from dropdown
		$select = $('#filters select');
		$(container).isotope({
			itemSelector: selector
		});

		$select.change(function() {
			var filters = $(this).val();
			;
			$(container).isotope({
				filter: filters
			});
		});

};

	/******************************
	 Library: perfect-scrollbar
	 ******************************/
	$('#mm-menu').perfectScrollbar();



	/******************************
	 Library: jquery.matchHeight.js
	 ******************************/
	 $('.hard-coded .ranges .ranges-item').matchHeight();


	/******************************
	 Library: GSAP
	 ******************************/
	$(".svg-button").each(function() {

		var clp = jQuery(this).find('.svg-crl');

	    $(this).hover(
		  function() {
		      TweenMax.to(clp, 0.5, {scale:1, rotation:90, transformOrigin:"50% 50%"});
		  }, function() {
		      TweenMax.to(clp, 0.5, {scale:1, rotation:0, transformOrigin:"50% 50%"});
		  }
		);
	});


	/******************************
	 Library: noBounce (Disable bounce effect on Apple)
	 ******************************/

		// noBounce.init({
	 //      animate: true, //default setting
  // 		  element: document // default setting
	 //      //element: document.getElementById("page") 
	      
	 //    });

// 	 if ($('.page-template-page-home').length > 0) {
// 	 // 	document.ontouchmove = function(event){
// 		// 	event.preventDefault();
// 		// }

// // 			$(document).bind(
// //    'touchmove',
// //    function(e) {
// //      e.preventDefault();
// //      //console.log("yes");
// //    }
// // );
// 			   console.log("yes");
// 	}

	

    /******************************
	 Other settings
	 ******************************/

	 $(".remove-link a").removeAttr("href");

	 $("#ninja_forms_form_1_cont input[type='submit']").attr("onclick", "ga('send', 'event', 'Form Submission', 'Contact Request - Woodingdean', 'Services Pages')");

	 $("#ninja_forms_form_91_cont input[type='submit']").attr("onclick", "ga('send', 'event', 'Form Submission', 'Contact Request - Stockport', 'Services Pages')");

	})(jQuery);




/******************************
Ivan Live Option
******************************/
function ivan_live_search_init() {
	//"use strict";
	var searchTopStyle = jQuery('.live-search'),
	searchfullScreen = jQuery('.live-search.search-full-screen-style'),
	searchfullScreenAlt = jQuery('.live-search.search-full-screen-alt-style'),
	formCloseBtn = jQuery('.live-search').find('.form-close-btn');

	jQuery('.live-search .trigger').click( function(e) {

		e.preventDefault();

		var _element = jQuery(this).siblings('.inner-wrapper');

		if ( jQuery(this).parents('.live-search').hasClass('search-top-style') == true ) {
			// jQuery('#all-site-wrapper').css('top', jQuery(this).siblings('.inner-wrapper').outerHeight());
			jQuery('body').addClass('top-search-active');
			if ( jQuery('.iv-layout.header.stuck').length ) {
				jQuery('.iv-layout.header.stuck').addClass('top-search-active');
			};
		};

		_element.toggleClass('visible');

		if (!jQuery(this).parents('.iv-layout').hasClass('top-header') == true) {
			jQuery('.top-header').addClass('beneath');
		} else if (jQuery(this).parents('.iv-layout').hasClass('top-header') == true) {
			jQuery('.top-header').removeClass('beneath');
		}

		setTimeout(function(){
			_element.find('#s').focus().end()
		}, 300);
		
	});

	if ( searchTopStyle.length && jQuery(window).width() >= 992 ) {
		jQuery(window).on('scroll', function() {
			if ( searchTopStyle.find('.inner-wrapper').hasClass('visible') ) {
				searchTopStyle.find('.inner-wrapper').removeClass('visible');
				jQuery('body').removeClass('top-search-active');
			};
		});
	};

	jQuery(document).mouseup( function(e) {

		var _element = jQuery('.inner-wrapper.visible');

		if (!_element.is(e.target) // if the target of the click isn't the container...
			&& _element.has(e.target).length === 0 ) // ... nor a descendant of the container
		{

			if(jQuery(this).parents('.header.simple-left-right').length == 0) {
				if( _element.hasClass('visible') ) {
					_element.removeClass('visible');
				}
			} else {
				if( _element.hasClass('visible') ) {
					_element.removeClass('visible');
				}
			}
			if ( searchTopStyle.length ) {
				// jQuery('#all-site-wrapper').css('top', 0);
				jQuery('body').removeClass('top-search-active');
				if ( jQuery('.iv-layout.header.stuck').length ) {
					jQuery('.iv-layout.header.stuck').removeClass('top-search-active');
				};
			};
		}

	});

	formCloseBtn.on('click', function() {
		var _element = jQuery('.inner-wrapper.visible');
		_element.removeClass('visible');
		if ( jQuery('.iv-layout.header.stuck').length ) {
			jQuery('.iv-layout.header.stuck').removeClass('top-search-active');
		};
		setTimeout(function(){
			jQuery('.top-header').removeClass('beneath')	
		}, 500);
	});

	if ( searchTopStyle.length ) {
		searchTopStyle.find('.form-close-btn').css('right', searchTopStyle.find('form').offset().left);
		formCloseBtn.on('click', function() {
			var _element = jQuery('.inner-wrapper.visible');
			_element.removeClass('visible');
			// jQuery('#all-site-wrapper').css('top', 0);
			jQuery('body').removeClass('top-search-active');
		});
	};


	jQuery('.live-search .submit-form').click( function(e) {

		e.preventDefault();

		jQuery(this).parents('form').submit();

	});
}
//Live Search
ivan_live_search_init();