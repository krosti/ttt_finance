!function ($) {

	$(function(){

		//env variables
		var thumbsBox = $('#thumbsBox');

		// make code pretty
		window.prettyPrint && prettyPrint();

		//COMMON ELEMENTS
		//marquesina para LIVE
		ui.marquesinaAnimada('#datosLive');
		//links de los distintos mercados
		ui.linkLinks();

		// Usage: 
		// This code loads jQuery and executes some code when jQuery is loaded
		ui.loadScript("http://yui.yahooapis.com/3.5.1/build/yui/yui-min.js", function(){
		  symbols._init();
		});

		// carousel
		//ui.carousel("#myCarousel");

		// draw simple graph
		ui.graphs("objtc","line");

		// get data with YUI
		//crawler.simpleQuerybySymbol("YHOO");

		// bind button for screenshot tool
		ui.takeScreenshot(thumbsBox);

	})

}(window.jQuery)