slider = {
  _init: function (){

  },
  iniciar_slider: function (slideshow,slidescontainer,slide,ancho,nro){/*Div gral, Contenedor de slides, slide, Medida ancho del slide*/
    var currentPosition = 0, 
    slideWidth = ancho, 
    slides = slide, 
    numberOfSlides = slides.length;
    slidescontainer.css('overflow', 'hidden');
    slides
    .wrapAll('<div id="slideInner'+nro+'"></div>')
    .css({
      'float' : 'left',
      'width' : slideWidth
    });
    $('#slideInner'+nro).css('width', slideWidth * numberOfSlides);
    slideshow
      .prepend('<span class="control'+nro+'" id="leftControl'+nro+'">Move left</span>')
      .append('<span class="control'+nro+'" id="rightControl'+nro+'">Move right</span>');
    manageControls(currentPosition);
    $('.control'+nro)
      .bind('click', function(){
        currentPosition = ($(this).attr('id')=='rightControl'+nro)
      ? currentPosition+1 : currentPosition-1;
        manageControls(currentPosition);
        $('#slideInner'+nro).animate({
          'marginLeft' : slideWidth*(-currentPosition)
        });
      });
    function manageControls(position){
      if(position==0){ $('#leftControl'+nro).hide() }
      else{ $('#leftControl'+nro).show() }
      if(position==numberOfSlides-1){ $('#rightControl'+nro).hide() }
      else{ $('#rightControl'+nro).show() }
      }
    }
}