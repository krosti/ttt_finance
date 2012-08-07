error_handler = {
	
	imageError: function(source){
		source.src = "http://placehold.it/210x130";
		// disable onerror to prevent endless loop
		source.onerror = "";
		return true;
	}
}