!function ($) {

  $(function(){


    // make code pretty
    window.prettyPrint && prettyPrint();

    // carousel
    //ui.carousel("#myCarousel");

    // draw simple graph
    ui.graphs("objtc","First Graphic");

     // get data with YUI
    crawler.simpleQuerybySymbol("YHOO");

    //document.getElementById("results").innerHTML = test.results.stock.SixMonths;
    $("#test-layout").on("click",function(){
      $("div[row]").toggleClass("row-fluid");
    });
  })

}(window.jQuery)