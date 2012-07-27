!function ($) {

	$(function(){

		var menuBox = $('#menu');
		$(window).scroll(function(){
		    menuBox.css('position', ($(this).scrollTop() > 130) ? 'fixed' : 'relative' );
		});

		$('.item')
			.on('mouseover',function(){ $(this).animate({
				opacity: 0.9,
				marginTop: "-2px",
				color: "#FF4E00",
				borderBottomWidth: "2px"
			}, "fast" ) })
			.on('mouseout',function(){ $(this).animate({
				opacity: 1,
				marginTop: "0px",
				color: "white",
				borderBottomWidth: "0px"
			}, "fast" ) });


	})

}(window.jQuery)