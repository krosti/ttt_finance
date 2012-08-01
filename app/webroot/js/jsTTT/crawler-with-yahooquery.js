/*
* @author Fernando Cea
* require: YUI Api 3.5.1+
* lib: <script src="http://yui.yahooapis.com/3.5.1/build/yui/yui-min.js" type="text/javascript"></script>
*/

crawler = {

  query: function(ticker){
    /*
    * query para yahoo finance table
    * @author: fernando cea
    * [ ] mejorar el guardado
    */
    var a = "%5EMERV"
      , a = ""
      , name = ""
      , values = "";
    YUI().use("gallery-yql", "node", function(f) {
      (new f.yql('select * from html where url="http://finance.yahoo.com/q/cp?s=' + ticker + '" and xpath=\'//table[@class="yfnc_tableout1"]/tr/td/table/tr/td[@class="yfnc_tabledata1"]\'')).on("query", function(d) {
        
        if(d.results) {
          for(var i = d.results.td.length, b = 0;b < i;b++) {
            //console.log(d.results.td[b]);
            if(b % 5 == 0) {
              name += d.results.td[b].strong.a.content;
              //console.log(d.results.td[b]);
              name += "<br>";
            }else if(
                b % 2 == 0 
            &&  b != 0 
            //&&  typeof d.results.td[b].strong != "Object"
            &&  typeof d.results.td[b].strong != "null"
            &&  typeof d.results.td[b].strong != "undefined"
            ) {
              console.log(d.results.td[b].strong.span.content);
              values += d.results.td[b].strong.span.content;
              values += "<br>";
            }
            
            
          }
          console.log(name);
          document.getElementById("results").innerHTML = name;
          document.getElementById("results2").innerHTML = values;
        }
      })
    });
  },

  oldQuery: function(){
    /*
    * @author: https://gist.github.com/265014
    */
    function getRate(from, to) {
      var script = document.createElement('script');
      script.setAttribute('src', "http://query.yahooapis.com/v1/public/yql?q=select%20rate%2Cname%20from%20csv%20where%20url%3D'http%3A%2F%2Fdownload.finance.yahoo.com%2Fd%2Fquotes%3Fs%3D"+from+to+"%253DX%26f%3Dl1n'%20and%20columns%3D'rate%2Cname'&format=json&callback=parseExchangeRate");
      document.body.appendChild(script);
    }

    function parseExchangeRate(data) {
      var name = data.query.results.row.name;
      var rate = parseFloat(data.query.results.row.rate, 10);
      alert("Exchange rate " + name + " is " + rate);
    }
    
    getRate("SEK", "USD");
    getRate("USD", "SEK");
  },

  simpleQuerybySymbol: function(symbol){
    var dataP = null;
    YUI().use('node', 'yql', function(Y) {
      /*f.yql('select * from yahoo.finance.quant where symbol in ("'+ symbol +'")', function(queryResult){
        if (queryResult) {
          return Object(queryResult)
        }
      });*/
      var res = Y.one('#results')
        , count = 0;
      var q = Y.YQL('select * from yahoo.finance.quant where symbol in ("'+ symbol +'")', {
        //Tell JSONP to not cache this request so we get new images on each request
        allowCache: false,
        on: {
          success: function(r) {
            if (r.query && r.query.results) {
                count++;
                console.log("#1- Actualizacion nro: "+count);
                //res.setHTML('<h2>Recent Flickr Photos <em>(query #' + count + ')</em></h2>');
                res.setHTML(r.query.results.stock.SixMonths.replace(/p/g,"span"));
                //Y.each(r.query.results.stock, function(v) {
                  //  alert(v);
                    //res.setHTML('<h2>Recent Flickr Photos <em>(query #' + count + ')</em></h2>');
                  //  res.append(Y.Lang.sub('<a href="#">{SixMonths}</a>', v));
                //});
            }
          }
        }
    });
    Y.later(5000, q, q.send, null, true);

    });
  },

  queryYQL: function(simbolos, boxForUpdate){
    /*
    * query Quant Yahoo Finance Site
    */
    console.log('#1- OK - queryYQL');

    YUI().use('node', 'yql', function(Y) {
      var res = Y.one('#datosLive')
        , count = 0;
      var q = Y.YQL('select * from yahoo.finance.quotes where symbol in ('+ simbolos +')', {
        //Tell JSONP to not cache this request so we get new images on each request
        allowCache: false,
        on: {
          success: function(r) {
            if (r.query && r.query.results) {
                count++;
                console.log("#2- Actualizacion nro: "+count);
                symbols.updateBox(r.query.results.quote,boxForUpdate);
                //res.setHTML(r.query.results.quote);
            }
          }
        }
      });
      
      //Y.later(7000, q, q.send, null, true);
    });
    
  },

  getDataCandlestick: function(symbol,startDate,endDate,color){
    /*
    *  query de Historical Data
    */
    YUI().use('node', 'yql', function(Y) {
      var count = 0
        , queryString = '';

      var q = Y.YQL('select * from yahoo.finance.historicaldata where symbol = "'+symbol+'" and startDate = "'+startDate+'" and endDate = "'+endDate+'"  | reverse()', {
        //Tell JSONP to not cache this request so we get new images on each request
        allowCache: false,
        on: {
          success: function(r) {
            if (r.query && r.query.results) {
                count++;
                console.log("#3- HistoricalData "+symbol+' -#'+count+' -desde'+startDate+' -hasta'+endDate);
                __DATA = r.query.results.quote;
                //console.log('Data: __DATA');
                //console.log(__DATA);
                //console.log('End Data: __DATA');
                (r.query.diagnostic && r.query.diagnostic.warning) ? symbols.drawError(r.query.diagnostic.warning,queryString) : symbols.doArray('candlestick', __DATA, color);
            }
          }
        }
      });
      
      //Y.later(7000, q, q.send, null, true);
    }); 
  },

  getFeeds: function(){
    /*
    *  query de Historical Data
    */
    YUI().use('node', 'yql', function(Y) {
      var count = 0
        , queryString = '';

      var q = Y.YQL('select * from html where url="http://www.invertironline.com/cuerpo.asp" and xpath=\'//div[@class="overview"]/table/tr\' | reverse() ', {
        //Tell JSONP to not cache this request so we get new images on each request
        allowCache: false,
        on: {
          success: function(r) {
            if (r.query && r.query.results) {
                count++;
                console.log("#5- FEEDS" );
                //__DATA = r.query.results.quote;
                //console.log('Data: __DATA');
                //console.log(__DATA);
                //console.log('End Data: __DATA');
                //(r.query.diagnostic && r.query.diagnostic.warning) ? symbols.drawError(r.query.diagnostic.warning,queryString) : symbols.doArray('candlestick', __DATA, color);
                ui_home.updateFeeds(r.query.results.tr);
            }
          }
        }
      });
      
      //Y.later(7000, q, q.send, null, true);
    }); 
  }


}