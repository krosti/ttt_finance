!function ($) {

	$(function(){
		//GLOBAL SCOPE
		__updateInterval = 20000; //miliseconds

		slider.iniciar_slider($('#slideshow'), $('#slidesContainer'),$('.slide'),450,"");
		slider.iniciar_slider($('#slideshow2'), $('#slidesContainer2'),$('.slide2'),450,"2");
		slider.iniciar_slider($('#slideshow3'), $('#slidesContainer3'),$('.slide3'),465,"3");
		sliderValores.iniciar_sliderValores();
		ui_home.loadSpinnerJs();
		ui_home.manejo_scroll();
		ui_home.menu_animacion_hover();
		ui_home.agregarComentario();
		ui_home.animacionFlashMessage();
		ui_home.validarFormLoginHome();
		ui_home.popUpRegistration();
		ui_home.BTNindicesBox();
		
		var stringAcciones = (window.location.hash) ? symbols.listaDeAcciones(window.location.hash.replace('#','')) : symbols.listaDeAcciones('argentina');
		// Usage: 
		// This code loads YUI and executes several code when YUI is loaded
		ui_home.loadScript("http://yui.yahooapis.com/3.5.1/build/yui/yui-min.js", function(){
		  symbols._init('#datosLive');
		  crawler.queryYQL(stringAcciones,null,__updateInterval);
		  crawler.getFeeds();
		});
		//ui.marquesinaAnimada('#datosLive');

	});

	

}(window.jQuery)