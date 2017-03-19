( function( $ ) {

	/******************************
	 Header and Menu
	 ******************************/
	 // jQuery('#mm-menu li').addClass("mm-menu__item");
	 // jQuery('#mm-menu a').addClass("mm-menu__link");
	 // jQuery('#mm-menu a span').addClass("mm-menu__link-text");
	 var menu = new Menu;


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
	 $('#mm-menu').perfectScrollbar();

	 
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


    /******************************
	 Accordion Menu
	 ******************************/
	 $('#mm-menu .header-menu-con-cl > ul > li:has(ul)').addClass("has-sub");
	 $('#mm-menu .header-menu-con-cl > ul > li > a').click(function() {
	 	var checkElement = $(this).next();
	 	
	 	$('#mm-menu .header-menu-con-cl > ul > li').removeClass('active');
	 	$(this).closest('li').addClass('active');	
	 	
	 	
	 	if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
	 		$(this).closest('li').removeClass('active');
	 		checkElement.slideUp('normal');
	 	}
	 	
	 	if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
	 		$('#mm-menu .header-menu-con-cl > ul > li > ul:visible').slideUp('normal');
	 		checkElement.slideDown('normal');
	 	}
	 	
	 	if (checkElement.is('ul')) {
	 		return false;
	 	} else {
	 		return true;	
	 	}		
	 });

	 $('#mm-menu .header-menu-con-cl > ul > li > ul > li:has(ul)').addClass("has-sub");
	 $('#mm-menu .header-menu-con-cl > ul > li > ul > li > a').click(function() {
	 	var checkElement = $(this).next();
	 	
	 	$('#mm-menu .header-menu-con-cl > ul > li > ul > li').removeClass('active');
	 	$(this).closest('li').addClass('active'); 
	 	
	 	
	 	if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
	 		$(this).closest('li').removeClass('active');
	 		checkElement.slideUp('normal');
	 	}
	 	
	 	if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
	 		$('#mm-menu .header-menu-con-cl > ul > li > ul > li > ul:visible').slideUp('normal');
	 		checkElement.slideDown('normal');
	 	}
	 	
	 	if (checkElement.is('ul')) {
	 		return false;
	 	} else {
	 		return true;  
	 	}   
	 });





/***
Google Map Settings
***/
if (typeof google != 'undefined') {

	var map;
	var myMap = new google.maps.LatLng(39.17921655074796, -96.56454560000003);
	var myMapIcon = new google.maps.LatLng(39.17921655074796, -96.56454560000003);

 //The CenterControl adds a control to the map that recenters the map on myMap.
 function CenterControl(controlDiv, map) {

  // Set CSS for the control border
  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = '#403f40';
  controlUI.style.border = '2px solid #bcab7a';
  // controlUI.style.borderRadius = '3px';
  // controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
  controlUI.style.cursor = 'pointer';
  controlUI.style.marginBottom = '30px';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Click to recenter the map';
  controlDiv.appendChild(controlUI);

  // Set CSS for the control interior
  var controlText = document.createElement('div');
  controlText.style.color = '#bcab7a';
  controlText.style.fontFamily = '"ProximaNova", Arial, Helvetica, sans-serif';
  controlText.style.fontSize = '14px';
  controlText.style.lineHeight = '36px';
  controlText.style.paddingLeft = '0px';
  controlText.style.paddingRight = '0px';
  controlText.style.textTransform = 'uppercase';
  controlText.innerHTML = 'Center Location';
  controlUI.appendChild(controlText);

  // Setup the click event listeners: simply set the map to myMap
  google.maps.event.addDomListener(controlUI, 'click', function() {
  	map.setCenter(myMap)
  });
}

function initialize() {
	var mapDiv = document.getElementById('map-canvas');
	var mapOptions = {
		zoom: 18,
		center: myMap,
		styles: [
		{
			"elementType": "labels.text",
			"stylers": [
			{
				"saturation": 10
			},
			{
				"lightness": 35
			},
			{
				"weight": 1
			}
			]
		},
		{
			"featureType": "poi.business",
			"stylers": [
			{
				"visibility": "off"
			}
			]
		},
		{
			"featureType": "poi.park",
			"elementType": "labels.text",
			"stylers": [
			{
				"visibility": "off"
			}
			]
		},
		{
			"featureType": "road.arterial",
			"elementType": "labels",
			"stylers": [
			{
				"visibility": "off"
			}
			]
		},
		{
			"featureType": "road.highway",
			"elementType": "labels",
			"stylers": [
			{
				"visibility": "off"
			}
			]
		},
		{
			"featureType": "road.local",
			"stylers": [
			{
				"visibility": "off"
			}
			]
		}
		]
	}
	map = new google.maps.Map(mapDiv, mapOptions);

  // Create the DIV to hold the control and call the CenterControl() constructor passing in this DIV.
  var centerControlDiv = document.createElement('div');
  centerControlDiv.setAttribute('style', 'left:0 !important');
  centerControlDiv.style.right = '0';
  centerControlDiv.style.left = '0';
  centerControlDiv.style.margin = 'auto';
  centerControlDiv.style.width = '180px';
  centerControlDiv.className = "btn-center";

  var centerControl = new CenterControl(centerControlDiv, map);

  centerControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);

  //Add Marker Icon
  var url = siteURL.templateUrl; //WordPress path url
  var image = url + '/images/marker.png';
  var beachMarker = new google.maps.Marker({
  	position: myMapIcon,
  	map: map,
  	icon: image
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
};

})(jQuery);