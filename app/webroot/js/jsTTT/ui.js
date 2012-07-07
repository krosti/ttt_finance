ui = {
	_init: function(){

	},

	graphs: function(objt,graphicName){
		/* method que dibuja los graficos
		* 		objt = el objeto de elementos que debe dibujar
		* 		graphicName = el nombre del grafico
		*/
		//gchart.drawSimpleChart(); // with google chart
		//rgraph.drawLineChart();
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
			,	selectBtn = '<a class="selectBtn"></a>';
		
		images.each(function(){
			var e = $(this);

			//agrego un Wrapper
			if (!e.parents().hasClass('thumbWrapper')){
    		e.wrap('<div class="thumbWrapper"></div>');
 			}

 			//agrego el icon1 - selectBtn
 			var parent = e.closest('.thumbWrapper');
 			if(parent.find('.selectBtn').length == 0){
 				parent.append(selectBtn);
 			}

			//borde en el Click
			e.on('click',function(){
				images.css('border','none');
				e.css('border','2px solid #8A9B0F');
			});

			//append de boton selecionar
			

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
	}
}