!function ($) {

	$(function(){

		slider.iniciar_slider($('#slideshow'), $('#slidesContainer'),$('.slide'),450,"");
		slider.iniciar_slider($('#slideshow2'), $('#slidesContainer2'),$('.slide2'),450,"2");

		ui_home.manejo_scroll();
		ui_home.menu_animacion_hover();
		
		// Usage: 
		// This code loads YUI and executes some code when YUI is loaded
		ui.loadScript("http://yui.yahooapis.com/3.5.1/build/yui/yui-min.js", function(){
		  symbols._init('#datosLive');
		});
		ui.marquesinaAnimada('#datosLive');

	})

}(window.jQuery)