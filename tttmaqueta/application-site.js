!function ($) {

	$(function(){

		var menuBox = $('#menu');
		$(window).scroll(function(){
		    menuBox.css('position', ($(this).scrollTop() > 130) ? 'fixed' : 'relative' );
		});

	})

}(window.jQuery)