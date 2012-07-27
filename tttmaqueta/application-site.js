!function ($) {

	$(function(){

		var menuBox = $('#menu');
		$(window).scroll(function(){
		    menuBox.css('position', ($(this).scrollTop() > 130) ? 'fixed' : 'relative' );
		});
		slider.iniciar_slider($('#slideshow'), $('#slidesContainer'),$('.slide'),450,"");
		slider.iniciar_slider($('#slideshow2'), $('#slidesContainer2'),$('.slide2'),450,"2");

	})

}(window.jQuery)