ui = {
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
	takeScreenshot: function(){
		/*	require:
		*
		*/
		$('#take-screenshot').on('click',function(){
			var 	canvas = document.getElementById('myLine')
				,	pngFile = canvas.toDataURL('image/png')
				,	thumbsBox = document.getElementById('thumbsBox')
				,	img = document.createElement('img');

			img.src = pngFile;
			img.width = 200;
			img.height = 120;
			thumbsBox.appendChild(img);
			
		});
		
	}
}