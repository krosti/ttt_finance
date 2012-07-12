ui = {
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

	graphs: function(objt,graphicName){
		/* method que dibuja los graficos
		* 		objt = el objeto de elementos que debe dibujar
		* 		graphicName = el nombre del grafico
		*/
		//gchart.drawSimpleChart(); // with google chart
		//rgraph.drawLineChart();
		var status = false;
		switch(graphicName){
			case 'line': rgraph.drawLineChart('#FAA82B'); ui.botonesCambioDeColor(graphicName); status = true; break;
			case 'candlestick': rgraph.drawScatterChart('#40B7D9');  ui.botonesCambioDeColor(graphicName); status = true; break;
		}
		return status
	},

	carousel: function(wrapper){
		/* require: "assets/js/bootstrap-carousel.js"
		*/
		$(wrapper).carousel();
	},

	takeScreenshot: function(thumbsBox){
		/*	require: nada
		*
		*/
		$('#take-screenshot').on('click',function(){
			var 	canvas1 = document.getElementById('myLine')
				,	canvas2 = document.getElementById('imageView')
				,	canvas3 = document.getElementById('screenView')
				,	pngFile = ''
				, i = thumbsBox.find('img').length + 1
				,	img = document.createElement('img');

			canvas1 = canvas1.getContext('2d');
			canvas2 = canvas2.getContext('2d');
			canvas3 = canvas3.getContext('2d');
			canvas3.drawImage(canvas1.canvas,0,0);
			canvas3.drawImage(canvas2.canvas,0,0);
			pngFile = canvas3.canvas.toDataURL('image/png');
			img.src = pngFile;
			img.width = 200;
			img.height = 120;
			img.id = 'thumb_'+ i;
			//img.setAttribute('rel','lightbox'); //agrego lightbox para que puedan expandirlo mas adelante
			
			thumbsBox.append(img).show('slow');

			// apply option to Thumbs
			ui.optionsForThumbnails(thumbsBox);
			
		});
		
	},

	optionsForThumbnails: function(thumbsBox){
		/*
		*	requiere: nada
		* desc: cuando se hace click en un thumbnail para agregarlo al post, se pinta de verde
		* [X] guardar el ID
		* [ ] salvarlo en el disco del servidor automáticamente
		* [X] ponerle un caption cuando se selecciona, un tilde o algo
		*/
		var images = $('img',thumbsBox)
			,	principalWrapper = '<div class="thumbWrapper"></div>' // wrapper
			,	selectBtn = document.createElement('a') //boton para seleccionar imagen para un post
			, expandBtn = document.createElement('a'); //boton para expandir la imagen en el lightbox
		
		selectBtn.setAttribute('class','selectBtn');
		expandBtn.setAttribute('class','expandBtn');
		expandBtn.setAttribute('rel','lightbox');

		images.each(function(){
			var e = $(this);

			//agrego un Wrapper
			if (!e.parents().hasClass('thumbWrapper')){
    		e.wrap(principalWrapper);
 			}

 			//agrego el boton selectBtn - this.selectBtn()
 			var parent = e.closest('.thumbWrapper');
 			if(parent.find('.selectBtn').length == 0){
 				parent.append(selectBtn);
 			}

 			//agrego el expandBtn
 			if (parent.find('.expandBtn').length == 0) {
 				expandBtn.setAttribute('href', e.attr('src'));
 				parent.append(expandBtn);
 			};

			//borde en el Click
			e.on('click',function(){
				images.css('border','none');
				e.css('border','2px solid #8A9B0F');
			});

		});
		
		ui.selectBtn();
	},

	selectBtn: function(){
		/*
		* desc: boton seleccionar esta imagen para un post
		*/
		$('.selectBtn').on('click',function(){
			var id = $(this).closest('.thumbWrapper').find('img').attr('id');
			console.log('fue seleccionado este grafico '+id);
		});
	},

	botonesCambioDeColor: function(graphicName){
		/*
		* desc: bindeo de los botones de cambio de color
		* vars: graphicName es el tipo de grafico a dibujar
		*/

		var color = 'red' //defaultColor
			,	clearBtn = $('#btnClear');

		$('#cambiar-color0, #cambiar-color1, #cambiar-color2, #cambiar-color3').on('click',function(){
			var e = $(this).find('div');
			if (e.hasClass('blue')) { color = '#1C4B8F'};
			if (e.hasClass('lightBlue')) { color = '#40B7D9'};
			if (e.hasClass('orange')) { color = '#FC990C'};
			if (e.hasClass('green')) { color = '#8A9B0F'};

			switch(graphicName){
				case 'line': drawCanvas.clearCanvas('myLine'); clearBtn.trigger('click'); rgraph.drawLineChart(color); break;
				case 'candlestick': drawCanvas.clearCanvas('myLine'); clearBtn.trigger('click'); rgraph.drawScatterChart(color); break;
			};
		});

		
	},

	prettifyPre: function(){
		/*
		*	requiere: Google Prettify CSS - "prettify/prettify.css" && "prettify.js"
		* desc: agrega clase prettyprint a todos los bloques <pre> (tambien podemos agregar <code>)
		*/
    $("pre").each(function() {
    		var codeBlock = $(this);
        codeBlock.html( codeBlock.html().replace(/\&(?!(\w+;))/g, '&amp;').replace(/</g, '&lt;') );
        codeBlock.addClass('prettyprint linenums');
    });
    prettyPrint();
	},

	marquesinaAnimada: function(contenedor){
		/*
		* require: jquery.jstockticker-1.1.js
		* desc: anima la marquesina
		*/
		$('#datosLive').jStockTicker({interval: 45});
	},

	linkLinks: function(){
    /*
    * desc: linkea los links a sus clicks para actualizar la barra de cotizaciones online
    */
    $('#linkARG').on('click', function(){ window.location.hash = 'argentina'; symbols._init(); });
    $('#linkUSA').on('click', function(){ window.location.hash = 'usa'; symbols._init(); });
    $('#linkIND').on('click', function(){ window.location.hash = 'indices'; symbols._init(); });
    $('#showLoabels').on('click', function(){ $('.labelsCotizacion').slideToggle(); });
  },

  graphicWrapperExpandCollapse: function(){
  	/*
  	* desc: bindea los links y cosas para expandir y mostrar la secciones de graficos
  	*/

  	$('#graphicFalseBox').on('click', function(){
  		//muestra/oculta el grafico
  		var box = $(this);

  		box.find('.iconExpanded').toggleClass('iconCollapsed');

  		$('#graphic-wrapper').slideToggle(1000);
  	});

  	$('#imageFalseBox').on('click', function(){
  		//muestre/oculta el image uploader
  		var box = $(this);

  		box.find('.iconExpanded').toggleClass('iconCollapsed');

  		$('#uploadPhotoBox').slideToggle(1000);
  	});
  }

}