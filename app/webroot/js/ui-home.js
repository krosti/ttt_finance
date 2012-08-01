ui_home = {
	
	_init: function(){

	},

	manejo_scroll: function(){
	/*
	*	desc: maneja el header para que se pase a fixed
	*/
		var menuBox = $('#menu');
		$(window).scroll(function(){
		    menuBox.css('position', ($(this).scrollTop() > 150) ? 'fixed' : 'relative' );
		});
	},

	menu_animacion_hover: function(){
	/*
	*	desc: agrega animacion al menu cuando se pone el mouse arriba
	*/
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
	},

	links_animacion_hover: function(){
	/*
	*	desc: agrega animacion a los links cuando se pone el mouse arriba
	*/
		$('a')
			.on('mouseover', function(){ $(this).animate({
					//opacity: 0.5
				}, 1500 ) })
			.on('mouseout', function(){ $(this).animate({
					//opacity: 1
				}, 1500 )
			});
		

	}
}