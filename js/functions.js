(function($) { 
//wrap all code in this anonymous function to enable use of the $ for jQuery

	console.log('hallo woild');
	//homemade lightbox for opening images
	$('a').click(function( event ) {
		event.preventDefault();
		var picLink = $(this).attr('href');
		console.log(picLink);
	} );
	
	
})( jQuery ); //end code