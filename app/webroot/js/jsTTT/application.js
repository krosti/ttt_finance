!function ($) {

	$(function(){


		// make code pretty
		window.prettyPrint && prettyPrint();

		// carousel
		//ui.carousel("#myCarousel");

		// draw simple graph
		ui.graphs("objtc","First Graphic");

		 // get data with YUI
		//crawler.simpleQuerybySymbol("YHOO");

		//  bind button for screenshot tool
		ui.takeScreenshot();

	})

}(window.jQuery)