ui_home = {
	
	_init: function(){

	},

	loadScript: function(url, callback){
	    /*
	    * desc: method para levantar asyncronicamente librerias y saber su estado
	    */
	      var head = document.getElementsByTagName("head")[0];
	      var script = document.createElement("script");
	      script.src = url;

	      // Attach handlers for all browsers
	      var done = false;
	      script.onload = script.onreadystatechange = function()
	      {
	        if( !done && ( !this.readyState 
	                        || this.readyState == "loaded" 
	                        || this.readyState == "complete") )
	        {
	          done = true;

	          // Continue your code
	          callback();

	          // Handle memory leak in IE
	          script.onload = script.onreadystatechange = null;
	          head.removeChild( script );
	        }
	      };

	      head.appendChild(script);
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
			$.ajax('widget/graficador/'+$(this).attr('id'),{
				success: function(data){
					
					$('#graphBOX').empty().append(data).dialog({
						title:'Nuevo Comentario',
						modal:true,
						width: 960,
						draggable: false,
						show:'fold',
						hide:'fold',
						resizable: false
					});
				}
			});	
		});
	},

	animacionFlashMessage: function(){
		/*
		* maneja la animación de los mensajes
		*/
		$('#flashMessage').delay(5000).slideToggle(700);
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

	validarFormLoginDialog: function(){
		/*
		* valida el form de login, usr y pw solamente del Home
		*/
		var
			usr = $('#input_login_dialog'),
			pw = $('#input_pass_dialog');

		$('#button_login_dialog').on('click',function(){
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
							draggable: false,
							show:'fold',
							hide:'fold',
							resizable: false
						});
					//});
					
				//}
			//});	
		});
	},

	BTNindicesBox: function(){
		/*
		*  bindeo de los botones de cambio de indice
		*/
		var indices = $('#indice_list')
		,	valores = $('#slider');

		indices.find('div').on('click', function(){
			document.getElementById('spinner').style.display = 'block';

			var e = $(this);

			indices.find('div').each(function(){
				$(this).removeClass('selected');
			});

			$.ajax('widget/indices/'+e.attr('id'),{
				success: function(data){
					valores.empty().append(data);
				},
				error: function(){
					valores.empty().text('<div class="warning text">Ocurrio un error, intentelo nuevamente. Si el problema persiste intente en unos minutos.</div>');
				}
			});

			e.addClass('selected');
			
			crawler.queryYQL(
				 symbols.listaDeAcciones(e.attr('id'))
				,null
				,__updateInterval);
		});
	},

	loadSpinnerJs: function(){
		var opts = {
		  lines: 7, // The number of lines to draw
		  length: 1, // The length of each line
		  width: 4, // The line thickness
		  radius: 10, // The radius of the inner circle
		  corners: 1, // Corner roundness (0..1)
		  rotate: 12, // The rotation offset
		  color: '#2D4D9F', // #rgb or #rrggbb
		  speed: 1, // Rounds per second
		  trail: 60, // Afterglow percentage
		  shadow: false, // Whether to render a shadow
		  hwaccel: false, // Whether to use hardware acceleration
		  className: 'spinner', // The CSS class to assign to the spinner
		  zIndex: 2e9, // The z-index (defaults to 2000000000)
		  top: 'auto', // Top position relative to parent in px
		  left: 'auto' // Left position relative to parent in px
		};
		var target = document.getElementById('spinner');
		var spinner = new Spinner(opts).spin(target);
	},

	setLoginPopup: function(){
		/*
		* bindea todos los dialogos de login si esta deslogeado
		*/
		
		$('.loginPopUp').on('click',function(){
			$('#box_login_dialog').dialog({
				title:'LogIn',
				modal:true,
				width: 400,
				draggable: false,
				show:'fold',
				hide:'fold',
				resizable: false
			});
		});
	},

	bindRegistrarseAnimacion: function(){
		$('#registrarse_button_animado').on('click',function(){
			$('#box_login_dialog').dialog('close');
			$('#nuevo_usuario').dialog({
				title:'Registrar usuario',
				modal:true,
				width: 640,
				draggable: false,
				show:'fold',
				hide:'fold',
				resizable: false
			});
		});
	},

	bindBuscarInputRequest: function(){
		$('.buscar_button').on('click',function(){

			var value = $('.buscar_input').val()
				,	url = 'http://localhost/ttt_finance/'+"buscar/"+encodeURIComponent(value)
				,	e = $(this);

			e.attr('href',url);
			e.trigger('click');
		});
	}
}