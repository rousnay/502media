( function( $ ) {

  /******************************
   Sidebar Push Slide
   ******************************/
   function sideHeaderInit() {
   	var sideheader = jQuery('#sideheader');
   	if (sideheader.length) {
   		sideheader.perfectScrollbar();
      //sideheader.hide();
      jQuery('#mm-menu-toggle').on('click', function(event) {
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
	 Library: owl.carousel
	 ******************************/

	 $("#company-logo-slider").owlCarousel({
	 	items : 4,
	 	navigation : true,
	 	itemsTablet: [768,4],
	 	itemsTabletSmall: [600,3],
	 	itemsMobile : [400,2],
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
	 	var sizer 		= '.grid-sizer';

	 	$(container).imagesLoaded( function() {
		// filter items when filter link is selected from dropdown
		$select = $('#filters-dropdown select');
		$(container).isotope({
			itemSelector: selector,
			percentPosition: true,
			masonry: {
				columnWidth: sizer
			},
		});

		$select.change(function() {
			var filters = $(this).val();
			;
			$(container).isotope({
				filter: filters,
			});
		});

		// filter items when filter link is clicked
		$('#filters-link li').click(function(){
			$('#filters-link li.active').removeClass('active');
			var selector = $(this).attr('data-filter');
			$(container).isotope({ filter: selector, animationEngine : "css" });
			$(this).addClass('active');
			return false;
		});
	});
	 };

		// for affiliation logos
		if ($.isFunction($.fn.imagesLoaded) ) {

			var container1	= '#logo-listing-isotope';
			var selector1	= '.isotope-item';

			$(container1).imagesLoaded( function() {
				$(container1).isotope({
					  // options...
					  itemSelector: selector1,
					  getSortData: {
					  	sortBy: 'original-order'
					  },
					  masonry: {
					  	columnWidth: selector1
					  }
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
$('body.page-template-page-home #page').addClass('gradient-bg')

var colors = new Array(
	[62,35,255],
	[60,255,60],
	[255,35,98],
	[45,175,230],
	[255,0,255],
	[255,128,0]);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

function updateGradient()
{
	
	if ( $===undefined ) return;
	
	var c0_0 = colors[colorIndices[0]];
	var c0_1 = colors[colorIndices[1]];
	var c1_0 = colors[colorIndices[2]];
	var c1_1 = colors[colorIndices[3]];

	var istep = 1 - step;
	var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
	var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
	var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
	var color1 = "rgb("+r1+","+g1+","+b1+")";

	var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
	var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
	var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
	var color2 = "rgb("+r2+","+g2+","+b2+")";

	$('.gradient-bg').css({
		background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
			background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
		
		step += gradientSpeed;
		if ( step >= 1 )
		{
			step %= 1;
			colorIndices[0] = colorIndices[1];
			colorIndices[2] = colorIndices[3];
			
    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    
}
}

setInterval(updateGradient,10);


    /******************************
	 Other settings
	 ******************************/

	 $(".remove-link a").removeAttr("href");

	 if ($.isFunction($.fn.imagesLoaded) ) {

	 	$('#logo-listing-isotope .isotope-item').matchHeight();

	 	$('#post-listing-isotope .post-item').matchHeight();

	 	function equal_size() {
	 		var entryHeight	= $('.page-template-page-blog #post-listing-isotope .post-item .entry').height();
	 		var totalHeight = entryHeight + 50;
	 		$('body.page-template-page-blog #post-listing-isotope .post-item .thumbnail').css('height',totalHeight);
	 	}

	 	equal_size();

	 	$( window ).resize(function() {
	 		equal_size();
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

	headerHeight =  $('#masthead').height();
	bannerHeight =  $('.banner-text').height();
	containerHeight = $( window ).height();

	bannerHalfHeight = bannerHeight/2;
	bannerPosition = (containerHeight/2) - bannerHalfHeight;
	bannerTop = bannerPosition - headerHeight
	bannerTopMargin = parseInt(bannerTop, 10);

	$('.banner-text').css("marginTop",bannerTopMargin);

	console.log(bannerHeight);
	console.log(bannerPosition);

}

$( window ).load(function() {
	home_banner_adjustment();
	$('.banner-text h1').css("visibility","visible");
});

$( window ).resize(function() {
	home_banner_adjustment();
});


})(jQuery);