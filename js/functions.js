(function($) { 
//wrap all code in this anonymous function to enable use of the $ for jQuery


	//homemade lightbox for opening images
	$('[rel="lightbox"]').click(function( event ) {
		event.preventDefault();
		var picLink = $(this).attr('href');
		console.log(picLink);
		$('body').append('<div class="lightbox"><a href="#" class="escape">X</a><img src="'+picLink+'"></div>');
		$('.lightbox').click(function() {
		$(this).detach();
		} );
	} );
	//toggle dark.light mode
	$('#darkMode').click(function() {
			$('body').toggleClass('darkMode');
	});
	
	
	
	
	
})( jQuery ); //end code