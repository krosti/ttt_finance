!function ($) {

	$(function(){

		//env variables
		__DATA = null; //global VARIABLE para DATA de grafico
		var thumbsBox = $('#thumbsBox');

		// make code pretty
		window.prettyPrint && prettyPrint();

		//COMMON ELEMENTS
		//marquesina para LIVE
		ui.marquesinaAnimada('#datosLive');
		//links de los distintos mercados
		ui.linkLinks();
		//bandeja expande contrae del graphic tool
		ui.graphicWrapperExpandCollapse();
		//esconde/muestra los canvas y las opciones de dibujo
		ui.drawToolsBox();
		//selectboxes de los indices y mercados
		ui.selectBoxes();

		// Usage: 
		// This code loads YUI and executes some code when YUI is loaded
		ui.loadScript("http://yui.yahooapis.com/3.5.1/build/yui/yui-min.js", function(){
		  symbols._init('#datosLive');
		});

		// carousel
		//ui.carousel("#myCarousel");

		// get data with YUI
		//crawler.simpleQuerybySymbol("YHOO");

		// bind button for screenshot tool
		ui.takeScreenshot(thumbsBox);

	})

}(window.jQuery)