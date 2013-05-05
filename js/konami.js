// Thanks to Nicolas: http://www.yourinspirationweb.com/en/author/nicolas/

jQuery(document).ready(function($){
  var keys     = [];
	var konami  = '38,38,40,40,37,39,37,39,66,65';
	$(document)
		.keydown(
			function(e) {
			keys.push( e.keyCode );
				if ( keys.toString().indexOf( konami ) >= 0 ){
 
					alert("999 lives added");
 
					// empty the array containing the key sequence entered by the user
					keys = [];
				}	
			}
		);
});		
