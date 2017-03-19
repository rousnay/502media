( function($) {
	$( 'input[name="s"]' )
		.typeahead( {
			name: 'search',
			remote: wp_typeahead.ajaxurl + '?action=ajax_search&fn=get_ajax_search&terms=%QUERY',
			template: [
				'<div class=""><a href="{{url}}"><h5>{{value}}</h5><p>{{postContent}}</p></div></a>',
			].join(''),
			engine: Hogan
		} )
		.keypress( function(e) {
			if ( 13 == e.which ) {
				$(this).parents( 'form' ).submit();
				return false;
			}
		}
	);
} )(jQuery);
