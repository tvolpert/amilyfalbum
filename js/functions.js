(function($) { 
//wrap all code in this anonymous function to enable use of the $ for jQuery

	console.log('hallo woild');
	//homemade lightbox for opening images
	$('[rel="lightbox"]').click(function( event ) {
		event.preventDefault();
		var picLink = $(this).attr('href');
		console.log(picLink);
		$('body').append('<div class="lightbox"><img src="'+picLink+'"></div>');
		$('.lightbox').click(function() {
		$(this).detach();
		} );
	} ); 


	//toggle dark/light mode
	$('#dark-mode').click( 	function() {
	
		if ( document.cookie.match(/theme=dark/i) ) {
			document.cookie = 'theme=light'
		} else {
			document.cookie = 'theme=dark'
		}
				$(':root').toggleClass('dark-mode');
				console.log('roger that');
	});
	
	function setThemeFromCookie() {
		if ( document.cookie.match(/theme=dark/i) ) {
			$(':root').addClass('dark-mode');
		} else {
	
			$(':root').removeClass('dark-mode')
		}
	};
	setThemeFromCookie();

	
	
	
	
})( jQuery ); //end code