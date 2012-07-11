symbols = {

  _init:function(){
    var stringAcciones = '';

    stringAcciones = (window.location.hash) ? symbols.listaDeAcciones(window.location.hash.replace('#','')) : symbols.listaDeAcciones('argentina');

    console.log(stringAcciones);
    symbols.getData(crawler.queryYQL(stringAcciones),function(r){
      //mejora de performance para conexiones rápidas o rtas rapidas, si encuentra el resultado en R, simplemente actualiza, 
      //sino espera success en la query de YQL y llama a updateBox otra vez con ese resultado = R = data
      if (r){
        symbols.updateBox(r); //this
      }
    });
  },
  
  getSymbols:function(){
    /*
    * XHR call
    */
  },
  getData: function(data,callback){
    /*
    * desc: callback function para "peticiones syncronicas"
    */
    if(data){
      console.log(data);
      callback();
    }
    else{
      callback(); //HORRIBLE
    }
  },

  listaDeAcciones: function(tipo){
    /*
    * desc: retorna string con todas las acciones
    */
    var 
        baseString = ''
      , acciones = null
      , accionesArg = [
            {'id' : "ALUA.BA"}
          , {'id' : "APBR.BA"}
          , {'id' : "BMA.BA"}
          , {'id' : "CEPU2.BA"}
          , {'id' : "COME.BA"}
          , {'id' : "EDN.BA"}
          , {'id' : "ERAR.BA"}
          , {'id' : "FRAN.BA"}
          , {'id' : "GGAL.BA"}
          , {'id' : "LEDE.BA"}
          , {'id' : "MOLI.BA"}
          , {'id' : "PAMP.BA"}
          , {'id' : "PESA.BA"}
          , {'id' : "TECO2.BA"}
          , {'id' : "TS.BA"}
          , {'id' : "YPFD.BA"}
        ]
      , accionesUSA = [
            {'id' : "^STI"}
        ]
      , accionesIndices = [
            {'id' : "^MERV"}
          , {'id' : "^GSPC"} //S&P
          , {'id' : "^DJI"} //dow jones
          , {'id' : "^IXIC"} //nasdaq
          , {'id' : "^BVSP"} //bovespa
        ]
      ;
    switch(tipo){
      case 'indices': acciones = accionesIndices; break;
      case 'argentina': acciones = accionesArg; break;
      case 'usa': acciones = accionesUSA; break;
      default: acciones = accionesArg; //para cualquier HASH
    };

    //algoritmo para pasar el arrayAsosiativo a string apto para YQL
    for (var i = acciones.length - 1; i >= 0; i--) {
      var comma = ((i) == 0) ? '' : ',';
      if (acciones[i] && acciones[i].id){
        baseString += '"' + acciones[i].id + '"' + comma;
      }
    };
    
    return baseString;
  },

  updateBox:function(data){
    /*
    * desc: actualiza una caja con los ultimos datos de un accion por Symbol.
    */
    var box = $('#datosLive');
    
    box.find('div').each(function(){
      $(this).remove();
    });

    for (var i = data.length - 1; i >= 0; i--) {
      var n = document.createElement('div');
      symbol = data[i].Symbol;
      actualPrice = (data[i].Ask) ? data[i].Ask : '--';
      percentage = 
      changeRealTime = data[i].Change_PercentChange;
      changeRealTime = ( changeRealTime.search(/\+[0-9]/g) >= 0 ) ? '<span class="positive">'+changeRealTime+'</span>' : 
                            ( changeRealTime.search(/0.00\%/g) >= 0 ) ? '<span class="neutral">'+changeRealTime+'</span>' : '<span class="negative">'+changeRealTime+'</span>';

      n.innerHTML = 
            '<span class="bold no-margin">'+symbol+'</span>' 
          + changeRealTime
          + ' '
          + actualPrice;
      //antes de insertarlo, ver si tiene null y ponerles --

      n.setAttribute('id', data[i].Symbol);
      box.append(n);
      //console.log(data[i]);
    };
  }

  
}