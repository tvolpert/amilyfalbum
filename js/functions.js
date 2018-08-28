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
	
		function togglePageContentLightDark() {
		  var body = document.getElementById('body')
		  var currentClass = body.className
		  var newClass = body.className == 'dark-mode' ? 'light-mode' : 'dark-mode';
		  body.className = newClass;

		  document.cookie = 'theme=' + (newClass == 'light-mode' ? 'light' : 'dark');
	
		
			function setThemeFromCookie() {
			  var body = document.getElementById('body')
			  $('body').addClass(isDarkThemeSelected() ? 'dark-mode' : 'light-mode');
			};	  
			console.log('Cookies are now: ' + document.cookie);
				$('#dark-mode').click(setThemeFromCookie());	
		
		};
	

	
	
	
	
	
})( jQuery ); //end code