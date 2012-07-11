<style type="text/css">
	#graphic-wrapper { position: relative; margin: auto; }
	#imageView { position: absolute; left: 0px; }
	#imageTemp { position: absolute; left: 0px; }
	#thumbsBox { float:left; display:none; }
	#thumbsBox img, .thumbWrapper { float:left; }
	div{
		font-family: 'Open Sans', sans-serif;
		font-size: 13px;
	}
	button{
		font-family: 'Open Sans', sans-serif;
		font-size: 13px;
		border: 1px solid #ccc;
		border-radius: 2px;
	}
	p{
		float: left;
	}
</style>

<form>
	<div class="formLabel">Titulo</div>
	<div class="formOptions">
		<span class="style1"></span>
		<span class="style2"></span>
	</div>
	<input id="formTitulo"/>
	<div class="formLabel">Cuerpo</div>
	<div class="formOptions">
		<span class="style1"></span>
		<span class="style2"></span>
		<span class="style3"></span>
	</div>
		<textarea id="formCuerpo"></textarea>
</form>

<!--START-graphic box-->
<div id="graphic-wrapper">
	<div id="chart_div"></div>

	<p style="float:left;">
		<label>Drawing tool: <select id="dtool">
	        <option value="line">Linea</option>
	        <option value="linePointToPoint">Linea Punto a Punto</option>
	        <option value="rect">Rectangulo</option>
	        <option value="pencil">Lapiz</option>
	    </select></label>
	    <div class="commands">
	        <!--button id="btnUndo" href="#">Undo</button>
	        <button id="btnRedo" href="#">Redo</button-->
	        <button id="btnClear" href="#">Limpiar</button>
	        <button id="take-screenshot">Tomar Foto</button>
	        <div id="cambiar-color1" style="width:15px;height:15px;float:left;"><div class="button-circle-color blue"></div></div>
	        <div id="cambiar-color2" style="width:15px;height:15px;float:left;"><div class="button-circle-color orange"></div></div>
	        <div id="cambiar-color3" style="width:15px;height:15px;float:left;"><div class="button-circle-color green"></div></div>
	        <button id="showLoabels"></button>
	    </div>
	</p>

	<div class="canvasWrapper">
		<canvas id="screenView" width="980" height="500" style="display:none;"></canvas>

		<canvas id="myLine" width="980" height="500"></canvas>

		<canvas id="imageView" width="980" height="500">
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
</div>
<div id="thumbsBox"></div>





<?php 

	echo $this->Html->script(array(
		//libs
		'RGraph/libraries/RGraph.common.core',
		'RGraph/libraries/RGraph.common.dynamic',
		'RGraph/libraries/RGraph.common.tooltips',
		'RGraph/libraries/RGraph.common.effects',
		'RGraph/libraries/RGraph.common.key',
		'RGraph/libraries/RGraph.line',
		'RGraph/libraries/RGraph.scatter',
		'jCanvaScript.1.5.15',
		'lightbox',
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