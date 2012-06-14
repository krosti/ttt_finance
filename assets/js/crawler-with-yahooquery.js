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
                console.log("Actualizacion nro: "+count);
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
    Y.later(50000, q, q.send, null, true);

    });
  }

}