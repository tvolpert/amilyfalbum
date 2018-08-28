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
<<<<<<< HEAD

	//toggle dark/light mode
	$('#dark-mode').click( 	function() {
	
		if ( document.cookie.match(/theme=dark/i) ) {
			document.cookie = 'theme=light'
		} else {
			document.cookie = 'theme=dark'
		}
				$('#page').toggleClass('dark-mode');
				console.log('roger that');
	});
	
	function setThemeFromCookie() {
		if ( document.cookie.match(/theme=dark/i) ) {
			$('#page').addClass('dark-mode');
		} else {
	
			$('#page').removeClass('dark-mode')
		}
	};
	setThemeFromCookie();
=======
>>>>>>> parent of 59c16c1... added Dark mode
	
	
	
	
})( jQuery ); //end code