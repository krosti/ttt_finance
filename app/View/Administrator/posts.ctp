<style type="text/css">
	#graphic-wrapper { position: relative; margin: auto; }
	#imageView { position: absolute; left: 0px; }
	#imageTemp { position: absolute; left: 0px; }
	div{
		font-family: 'Open Sans', sans-serif;
		font-size: 13px;
	}
</style>

<div id="results"></div>

<div id="graphic-wrapper">
	<div id="chart_div"></div>

	<p>
		<label>Drawing tool: <select id="dtool">
	        <option value="line">Line</option>
	        <option value="rect">Rectangle</option>
	        <option value="pencil">Pencil</option>
	    </select></label>
	    <div class="commands">
	        <button id="btnUndo" href="#">Undo</button>
	        <button id="btnRedo" href="#">Redo</button>
	        <button id="btnClear" href="#">Clear Canvas</button>
	    </div>
	</p>


	<canvas id="myLine" width="700" height="500"></canvas>

	<canvas id="imageView" width="700" height="500">
        <p>Unfortunately, your browser is currently unsupported by our web 
        application.  We are sorry for the inconvenience. Please use one of the 
        supported browsers listed below, or draw the image you want using an 
        offline tool.</p>
        <p>Supported browsers: <a href="http://www.opera.com">Opera</a>, <a 
          href="http://www.mozilla.com">Firefox</a>, <a 
          href="http://www.apple.com/safari">Safari</a>, and <a 
          href="http://www.konqueror.org">Konqueror</a>.</p>
    </canvas>
</div>

<button id="take-screenshot">Take Screenshot</button>



<?php 

	echo $this->Html->script(array(
		//libs
		'RGraph/libraries/RGraph.common.core',
		'RGraph/libraries/RGraph.common.dynamic',
		'RGraph/libraries/RGraph.common.tooltips',
		'RGraph/libraries/RGraph.common.effects',
		'RGraph/libraries/RGraph.common.key',
		'RGraph/libraries/RGraph.line',
		'jCanvaScript.1.5.15',
		//ourAPPS
		'jsTTT/application',
		'jsTTT/crawler-with-yahooquery',
		'jsTTT/symbols',
		'jsTTT/ui',
		//'jsTTT/gchart' //for Google SVG Chart
		'jsTTT/rgraph',
		'jsTTT/drawCanvas'
	));

	count($articles);
?>