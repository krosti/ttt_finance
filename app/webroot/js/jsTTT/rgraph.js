rgraph = {
	
	init: function(){
		this.loader();
		this.drawLineChart();
		this.undoOptions();
	},

	loader: function(){

	},

	drawLineChart: function(){
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
        line.Set('chart.colors', ['blue']);
        line.Set('chart.linewidth', 2);
        line.Set('chart.filled', true);
        line.Set('chart.hmargin', 5);
        line.Set('chart.labels', ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        line.Set('chart.gutter.left', 40);
        
        // Now call the .Draw() method to draw the chart.
        line.Draw();
	},

	drawScatterChart: function(){

	},

	undoOptions: function(){
		
        var btnUndo = document.getElementById('btnUndo');
        var btnRedo = document.getElementById('btnRedo');
        
	}
}
rgraph.init();