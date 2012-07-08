!function ($) {

	$(function(){

		//env variables
		var thumbsBox = $('#thumbsBox');

		// make code pretty
		window.prettyPrint && prettyPrint();

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