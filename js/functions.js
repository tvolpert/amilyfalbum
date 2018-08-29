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

	//use uploader on frontEnd
	
	var file_frame; // variable for the wp.media file_frame
	
	// attach a click event (or whatever you want) to some element on your page
	$( '#frontend-button' ).on( 'click', function( event ) {
		event.preventDefault();

        // if the file_frame has already been created, just reuse it
		if ( file_frame ) {
			file_frame.open();
			return;
		} 

		file_frame = wp.media.frames.file_frame = wp.media({
			title: $( this ).data( 'uploader_title' ),
			button: {
				text: $( this ).data( 'uploader_button_text' ),
			},
			multiple: true // set this to true for multiple file selection
		});

		file_frame.on( 'select', function() {
			attachment = file_frame.state().get('selection').first().toJSON();

			// do something with the file here
			$( '#frontend-button' ).hide();
			$( '#frontend-image' ).attr('src', attachment.url);
		});

		file_frame.open();
	});

	
})( jQuery ); //end code