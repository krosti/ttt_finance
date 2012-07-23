rgraph = {
  
  init: function(){
    this.loader();
    this.undoOptions();
  },

  loader: function(){

  },

  drawLineChart: function(principalColor){
    // The data for the Line chart. Multiple lines are specified as seperate arrays.
    var data = [10,4,17,50,25,19,20,25,30,29,30,29];

    // Create the Line chart object. The arguments are the canvas ID and the data array.
    var line = new RGraph.Line("myLine", data);
    
    // The way to specify multiple lines is by giving multiple arrays, like this:
    // var line = new RGraph.Line("myLine", [4,6,8], [8,4,6], [4,5,3]);
    
    // Configure the chart to appear as you wish.
    line.Set('chart.background.barcolor1', 'white');
    line.Set('chart.background.barcolor2', 'white');
    line.Set('chart.background.grid.color', 'rgba(238,238,238,1)');
    line.Set('chart.colors', [principalColor]);
    line.Set('chart.linewidth', 2);
    line.Set('chart.filled', true);
    line.Set('chart.hmargin', 5);
    line.Set('chart.labels', ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dic']);
    line.Set('chart.gutter.left', 40);
    
    // Now call the .Draw() method to draw the chart.
    line.Draw();
  },

  drawScatterChart: function(data,ymax,ymin){


    if (document.getElementById("myLine").__object__) {
      RGraph.ObjectRegistry.Clear(document.getElementById("myLine").__object__);
    }

    function myClick (e, bar)
    {
        var obj = bar[0];
        var x   = bar[1];
        var y   = bar[2];
        var w   = bar[3];
        var h   = bar[4];
        var idx = bar[5];
        
        alert('The onclick listener just fired with index: ' + idx);
    }

      var scatter = new RGraph.Scatter('myLine', RGraph.array_clone(data));
      //scatter.Set('chart.title', 'High/low  daily stock prices');
      scatter.Set('chart.tooltips', ['<b>Winner!</b><br />John', 'Fred', 'Jane', 'Lou', 'Pete', 'Kev']);
      scatter.Set('chart.boxplot.width', 0.5);
      scatter.Set('chart.boxplot.capped', false);
      //scatter.Set('chart.labels', ['Week 1', 'Week 2', 'Week 3', 'Week 4']);
      scatter.Set('chart.xmin', 0);
      scatter.Set('chart.xmax', data.length+1); //cantidad de elementos del arreglo
      scatter.Set('chart.ymin', ymin-20);
      scatter.Set('chart.ymax', ymax+20);
      scatter.Set('chart.xscale', false);

      scatter.Set('chart.scale.decimals', 0);
      scatter.Set('chart.units.post', '');
      scatter.Set('chart.gutter.left', 60);
      
      scatter.Set('chart.events.mousemove', function (e, bar) {e.target.style.cursor = 'pointer';});
      scatter.Set('chart.events.click', myClick); // The myClick function is the one above
      RGraph.Clear(scatter.canvas);
      scatter.Draw();

  },

  undoOptions: function(){
    
    var btnUndo = document.getElementById('btnUndo');
    var btnRedo = document.getElementById('btnRedo');
        
  }
}
rgraph.init();