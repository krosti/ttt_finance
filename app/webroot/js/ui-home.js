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
	},

	animacionFlashMessage: function(){
		/*
		* maneja la animación de los mensajes
		*/
		$('#flashMessage').delay(2000).slideToggle(700);
	},

	validarFormLoginHome: function(){
		/*
		* valida el form de login, usr y pw solamente del Home
		*/
		var
			usr = $('#input_user'),
			pw = $('#input_pass');

		$('#button_login').on('click',function(){
			//console.log('dafa');
			var
				ck1 = (usr.val() != '') ? true : false,
				ck2 = (pw.val() != '') ? true : false,
				result = false;

			(!ck1 && usr.css('border','1px solid red'));
			(!ck2 && pw.css('border','1px solid red'));

			return (ck1 && ck2) ? $(this).submit() : false;
		});

		usr.on('keydown',function(e){
			var t = $(this); return (t.val != '') ? t.css('border','1px solid #ccc') : t.css('border','1px solid red');
		});
		pw.on('keydown',function(e){
			var t = $(this); return (t.val != '') ? t.css('border','1px solid #ccc') : t.css('border','1px solid red');
		});
	},

	popUpRegistration: function(){
		/*
		* popup para el form de registracion
		*/
		$('#registrarseTTT').on('click',function(){
			//$.ajax('users/add/',{
				//success: function(data){
					//$('#none_body').on('ready',function(){
						$('#nuevo_usuario')/*.empty().append(data)*/.dialog({
							title:'Nuevo Usuario',
							modal: true,
							width: 640,
							draggable: false
						});
					//});
					
				//}
			//});	
		});
	}
}