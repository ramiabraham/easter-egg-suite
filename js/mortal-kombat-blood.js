// Mortal Kombat Blood code
// A  B  A  C  A  B  B
// 65 66 65 67 65 66 66
jQuery(document).ready(function($){
  var keys     = [];
	var bloodcode  = '65,66,65,67,65,66,66';
	$(document)
		.keydown(
			function(e) {
			keys.push( e.keyCode );
				if ( keys.toString().indexOf( bloodcode ) >= 0 ){
 
					alert("Get Over Here");
 
					// empty the array containing the key sequence entered by the user
					keys = [];
				}	
			}
		);
});
