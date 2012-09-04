error_handler = {
	
	imageError: function(source){
		source.src = "http://placehold.it/405x205";
		// disable onerror to prevent endless loop
		source.onerror = "";
		return true;
	}
}