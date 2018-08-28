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

	//toggle dark.light mode
	$('#dark-mode').click(function() {
			$('body').toggleClass('dark-mode');
	});
	

	
	
	
	
})( jQuery ); //end code