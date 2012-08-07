ui_home = {
	
	_init: function(){

	},

	manejo_scroll: function(){
	/*
	*	desc: maneja el header para que se pase a fixed
	*/
		var menuBox = $('#menu');
		$(window).scroll(function(){
		    menuBox.css('position', ($(this).scrollTop() > 180) ? 'fixed' : 'relative' );
		});
	},

	menu_animacion_hover: function(){
	/*
	*	desc: agrega animacion al menu cuando se pone el mouse arriba
	*/
		var item = $('.item');

		item.find('a')
			.on('mouseover',function(){ $(this).closest('.item').animate({
				opacity: 0.9,
				marginTop: "-2px",
				color: "#FF4E00",
				borderBottomWidth: "2px"
			}, "fast" ) })
			.on('mouseout',function(){ $(this).closest('.item').animate({
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
		
	},

	updateFeeds: function(data){

		/*
		*	desc: actualiza la caja de feeds
		*/
		var 	
				box = $('#noticias > .cuerpo_seccion')
			,	separadorNoticias = '<div class="separacion_slide"></div>';

		box.find('div').each(function(){
	      $(this).remove();
	    });

		for (var i = 10; i >= 0; i--) {
			var e = document.createElement('div');

			e.innerHTML = 
				'<span class="tit_noticia">' + data[i].td[0].span.content + '</span>'+
				'<div class="img_noticia" style="' + data[i].td[1].style.replace(/\//,'./img/').replace(/archivos\//,'') + '"></div>' +
				'<span class="cuerpo_noticia">'+ data[i].td[1].span.a.content + '</span>';

			e.setAttribute('id', i);
			e.setAttribute('class', 'noticia');
			box.append(e).append(separadorNoticias);

			//fix para la caja - MOMENTANEO
			//if (i == 11) { break; };
		};
	},

	agregarComentario: function(){
		$('.agregarComment').on('click',function(){
			$.ajax('administrator/posts',{
				success: function(data){

					$('#graphBOX').empty().append(data).dialog({
						title:'Nuevo Comentario',
						modal:true,
						width: 960,
						draggable: false
					});
				}
			});	
		});
		
	}
}