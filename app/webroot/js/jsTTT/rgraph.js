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

  drawScatterChart: function(principalColor){
    var original_data =   [
       [0.5,[0,3,4,5,7, principalColor, principalColor], 'black'],
       [1.5,[2,3,5,6,9, principalColor, principalColor], 'black'],
       [2.5,[0,2,5.6,6.2,9, principalColor, principalColor], 'black'],
       [3.5,[2,4.8,6.1,6.5,9, principalColor, principalColor], 'black'],
       [4.5,[1.1,5.2,5.9,6.5,7.6, principalColor, principalColor], 'black'],
       [5.5,[0.8,3.9,7,7.5,7.99, principalColor, principalColor], 'black'],
       [6.5,[2,2.9,4,4.5,5.3, principalColor, principalColor], 'black'],
       [7.5,[2.5,3.0,4,4.9,5.5, principalColor, principalColor], 'black'],
       [8.5,[3,3.3,5,6.5,6.9, principalColor, principalColor], 'black'],
       [9.5,[1.1,3.3,6,6.5,6.9, principalColor, principalColor], 'black'],
       [10.5,[0.7,3.1,5,5.9,6.9, principalColor, principalColor], 'black'],
       [11.5,[0.3,2.5,3,4.5,4.9, principalColor, principalColor], 'black'],
       [12.5,[0.9,2.7,4.9,5.5,6.3, principalColor, principalColor], 'black'],
       [13.5,[0.7,3.0,3.8,4.2,4.9, principalColor, principalColor], 'black'],
       [14.5,[0.8,2.1,5.2,6.1,7.2, principalColor, principalColor], 'black'],
       [15.5,[0.9,2.2,3.8,5.5,6.2, principalColor, principalColor], 'black'],
       [16.5,[1.2,2.3,3.9,5.2,6, principalColor, principalColor], 'black'],
       [17.5,[0.8,2.2,4.1,5.2,5.9, principalColor, principalColor], 'black'],
       [18.5,[0.9,3.1,4.2,5.5,6.1, principalColor, principalColor], 'black'],
       [19.5,[0.9,2.9,4.9,5.5,6.2, principalColor, principalColor], 'black'],
       [20.5,[0.9,2.9,4.9,5.22,6.3, principalColor, principalColor], 'black'],
       [21.5,[1.7,2.9,5,5.4,6.3, principalColor, principalColor], 'black'],
       [22.5,[1.7,3.1,5.1,6.1,6.8, principalColor, principalColor], 'black'],
       [23.5,[1.9,2.5,4.3,5.5,6.6, principalColor, principalColor], 'black'],
       [24.5,[0.7,1.6,2.1,3.4,4.2, principalColor, principalColor], 'black'],
       [25.5,[0.8,1.5,2,3.6,4.2, principalColor, principalColor], 'black'],
       [26.5,[0.9,2,3,4.2,5.1, principalColor, principalColor], 'black'],
       [27.5,[0.6,2,2.7,3.6,5.5, principalColor, principalColor], 'black'],
       [28.5,[0.9,2,3,4.5,9, principalColor, principalColor], 'black'],
       [29.5,[1.1,3,4.5,5.1,10, principalColor, principalColor], 'black'],
       [30.5,[1.8,3,4.4,5.5,9, principalColor, principalColor], 'black']
      ];

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

        var scatter = new RGraph.Scatter('myLine', RGraph.array_clone(original_data));
        //scatter.Set('chart.title', 'High/low  daily stock prices');
        scatter.Set('chart.tooltips', ['<b>Winner!</b><br />John', 'Fred', 'Jane', 'Lou', 'Pete', 'Kev']);
        scatter.Set('chart.boxplot.width', 0.5);
        scatter.Set('chart.boxplot.capped', false);
        scatter.Set('chart.labels', ['Week 1', 'Week 2', 'Week 3', 'Week 4']);
        scatter.Set('chart.xmax', 31);
        scatter.Set('chart.ymax', 10);
        scatter.Set('chart.scale.decimals', 1);
        scatter.Set('chart.units.post', 'p');
        scatter.Set('chart.gutter.left', 40);
        scatter.Set('chart.events.mousemove', function (e, bar) {e.target.style.cursor = 'pointer';});
        scatter.Set('chart.events.click', myClick); // The myClick function is the one above
        scatter.Draw();

  },

  undoOptions: function(){
    
    var btnUndo = document.getElementById('btnUndo');
    var btnRedo = document.getElementById('btnRedo');
        
  }
}
rgraph.init();