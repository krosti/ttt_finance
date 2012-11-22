<?php echo $this->Html->css(array('ttt-clients-samples','lightbox','stockTicker','backend')); ?>
<?php 
	$hayUsuarioFb = (isset($facebook_user)) ? true : false; 
	$hayUsuarioTtt = ($this->Session->read('User')) ? true : false;
	$mostrarDialog = ( (!$hayUsuarioFb && !$hayUsuarioTtt) ) ? 'loginPopUp' : '';
?>

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
		<?php $userID = ($hayUsuarioTtt) ? 'User.id' : 'Auth.User.id'; ?>
		<?php #echo debug($this->Session->read('Auth.User.id')); ?>
		<input id="formTipo" name="data[Comment][user_id]" value="<?php echo $this->Session->read($userID); ?>" type="hidden">
		<input id="CommentImage" name="data[Comment][image]" value="" type="hidden">
		<input id="formTipo" name="data[Comment][post_id]" value="<?php echo $this->viewVars['id']; ?>" type="hidden">
		<input id="formTipo" name="data[Comment][created_by]" value="<?php echo ($hayUsuarioTtt) ? 'ttt' : 'fb'; ?>" type="hidden">
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

	<!--div class="graphicFalseBox" id="graphicFalseBox">
		<span>Gr&aacute;fico/Chart</span>
		<div class="iconExpanded"></div>
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

	<?php echo $this->element('uploadById',array('id'=>'CommentImage')); ?>

	<div id="uploadPhotoBox">
		<input type="file" />
	</div>


	<div id="thumbsBox"></div>

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