sliderValores = {
  _init: function (){

  },
  iniciar_sliderValores: function (){/*Div gral, Contenedor de slides, slide, Medida ancho del slide*/
	    $("#slider").mopSlider({
			'w':800,
			'h':120,
			'sldW':500,
			'btnW':200,
			'itemMgn':0,
			'indi':"",
			'type':'tutorialzine',
			'shuffle':0
		});
    }
}