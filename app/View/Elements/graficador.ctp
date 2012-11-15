<?php echo $this->Html->css(array('ttt-clients-samples','lightbox','stockTicker','backend')); ?>

<style type="text/css">
	#graphic-wrapper { position: relative; margin: auto; display: none; margin-top:15px; }
	#imageView { position: absolute; left: 0px; }
	#imageTemp { position: absolute; left: 0px; }
	#thumbsBox { float:left; display:none; }
	#thumbsBox img, .thumbWrapper { float:left; }
	#tool1 div{
		font-family: 'Open Sans', sans-serif;
		font-size: 13px;
	}
	#tool1 button{
		font-family: 'Open Sans', sans-serif;
		font-size: 13px;
		border: 1px solid #ccc;
		border-radius: 2px;
	}
	#tool1 p{
		float: left;
	}
</style>
<div id="graficador-wrapper">
	<?php echo $this->Form->create('Comments',array('action'=>'add' )); ?>
	<form action="/ttt_finance/comments/add" method="POST" accept-charset="utf-8">
		<!--div class="formLabel">Titulo</div>
		<div class="formOptions">
			<span class="style1 Ntooltip">
				<span>Estilo 1</span>
			</span>
			<span class="style2 Ntooltip">
				<span>Estilo 2</span>
			</span>
		</div>
		<input id="formTitulo" name="data[Post][titulo]" maxlength="200"-->

		<input id="formTipo" name="data[Comment][user_id]" value="<?php echo $this->Session->read('User.id')?>" type="hidden">
		<!--input id="formTipo" name="data[Comment][comment_id]" value="1" type="hidden"-->
		<input id="formTipo" name="data[Comment][post_id]" value="<?php echo $this->viewVars['id']; ?>" type="hidden">

		<input id="formSerieDatos" name="data[Comment][serie_datos]"  value="test" style="display:none;">
		
		<div class="formLabel">Cuerpo</div>
		<div class="formOptions">
			<span class="style1 Ntooltip">
				<span>Estilo 1</span>
			</span>
			<span class="style2 Ntooltip">
				<span>Estilo 2</span>
			</span>
			<span class="style3 Ntooltip">
				<span>Estilo 3</span>
			</span>
		</div>
		<textarea name="data[Comment][mensaje]" cols="30" rows="6" id="formCuerpo"></textarea>

		<input type="submit" value="guardar/enviar">
	</form>

	<div class="graphicFalseBox" id="graphicFalseBox">
		<span>Gr&aacute;fico/Chart</span>
		<div class="iconExpanded"></div>
	</div>

	<!--START-graphic box-->
	<!--div id="graphic-wrapper-2">
		<div id="chart_div"></div>
		<select id="selectboxIndices">
			<option default>Elegir Uno</option>
			<option value="argentina">argentina</option>
			<option value="usa">usa</option>
			<option value="indices">indices</option>
		</select>
		<select id="selectboxAcciones"></select>
		<input id="startDate" placeholder="yyyy-mm-dd [desde]"/>
		<input id="endDate" placeholder="yyyy-mm-dd [hasta]"/>
		<button id="updateGraphic">Actualizar</button>

		<button id="drawToolBoxButton">Drawing/Dibujo</button>
		<div id="drawToolsBox">
			<p style="float:left;">
				<label>Drawing tool: <select id="dtool">
			        <option value="line">Linea</option>
			        <option value="linePointToPoint">Linea Punto a Punto</option>
			        <option value="rect">Rectangulo</option>
			        <option value="pencil">Lapiz</option>
			    </select></label>
			    <div class="commands">
			        
			        <button id="btnClear" href="#">Limpiar</button>
			        <button id="take-screenshot">Tomar Foto</button>
			        <div id="cambiar-color0" style="width:15px;height:15px;float:left;"><div class="button-circle-color lightBlue"></div></div>
			        <div id="cambiar-color1" style="width:15px;height:15px;float:left;"><div class="button-circle-color blue"></div></div>
			        <div id="cambiar-color2" style="width:15px;height:15px;float:left;"><div class="button-circle-color orange"></div></div>
			        <div id="cambiar-color3" style="width:15px;height:15px;float:left;"><div class="button-circle-color green"></div></div>
			        <button id="showLoabels"></button>
			    </div>
			</p>
		</div-->

		<div class="canvasWrapper" style="display:none">
			<canvas id="screenView" width="950" height="500" style="display:none;"></canvas>

			<canvas id="myLine" width="950" height="500"></canvas>

			<canvas id="imageView" width="950" height="500">
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
	<!--/div-->

	<div class="graphicFalseBox" id="imageFalseBox">
		<span>Im&aacute;gen/Image</span>
		<div class="iconExpanded"></div>
	</div>

	<div id="uploadPhotoBox">
		<input type="file" />
	</div>


	<div id="thumbsBox"></div>

	<!--div class="buttonsBox">
		<button id="saveForm">guardar/enviar</button>

		<button id="cleanForm">limpiar/cancelar</button>
	</div-->
</div>

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
		//'lightbox',
		//ourAPPS
		//'jsTTT/application',
		//'jsTTT/crawler-with-yahooquery',
		'jsTTT/symbols',
		'jsTTT/ui',
		//'jsTTT/gchart' //for Google SVG Chart
		'jsTTT/rgraph',
		'jsTTT/drawCanvas'
	));

?>
