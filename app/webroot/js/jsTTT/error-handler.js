error_handler = {
	
	imageError: function(source){
		source.src = "http://tttonline.com.ar/img/nopicture.png";
		// disable onerror to prevent endless loop
		source.onerror = "";
		return true;
	}
}