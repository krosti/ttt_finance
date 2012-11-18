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
<style type="text/css">

	#main {
		width: 300px;
		margin:auto;
		background: #ececec;
		padding: 20px;
		border: 1px solid #ccc;
	}

	#image-list {
		list-style:none;
		margin:0;
		padding:0;
	}
	#image-list li {
		background: #fff;
		border: 1px solid #ccc;
		text-align:center;
		padding:20px;
		margin-bottom:19px;
	}
	#image-list li img {
		width: 258px;
		vertical-align: middle;
		border:1px solid #474747;
	}

</style>
<div id="graficador-wrapper">
	<?php echo $this->Form->create('Comments',array('action'=>'add' )); ?>
	<form action="/ttt_finance/comments/add" method="POST" accept-charset="utf-8">
		
		<input id="formTipo" name="data[Comment][user_id]" value="<?php echo $this->Session->read('User.id')?>" type="hidden">
		<input id="CommentImage" name="data[Comment][image]" value="" type="hidden">
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

	<div id="main">
		<form method="post" enctype="multipart/form-data"  action="upload.php">
    		<input type="file" name="file" id="images" multiple />
    		<button type="submit" id="btn">Upload Files!</button>
    		<?php 
    			echo $this->Html->link('url',
						    			array('controller'=>'posts','action'=>'isUploadedFile'), 
						    			array('style'=>'display:none;','id'=>'URLSITE') 
	    		); 
    		?>
    	</form>

  		<div id="response"></div>
		<ul id="image-list">

		</ul>
		
		<div style="display:none;">
			<?php echo $this->Html->image('loading.gif', array('id'=>'uploading_gif') ); ?>
		</div>

	</div>

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

<!--UPOAD FILE-->
<script type="text/javascript">
	(function () {
		var input = document.getElementById("images"), 
			formdata = false;

		function showUploadedItem (source) {
	  		var list = document.getElementById("image-list"),
		  		li   = document.createElement("li"),
		  		img  = document.createElement("img");
	  		img.src = source;
	  		li.appendChild(img);
			list.appendChild(li);
		}   

		if (window.FormData) {
	  		formdata = new FormData();
	  		document.getElementById("btn").style.display = "none";
		}
		
	 	input.addEventListener("change", function (evt) {
	 		document.getElementById("response").innerHTML = document.getElementById('uploading_gif').innerHTML;
	 		var i = 0, len = this.files.length, img, reader, file;
		
			for ( ; i < len; i++ ) {
				file = this.files[i];
		
				if (!!file.type.match(/image.*/)) {
					if ( window.FileReader ) {
						reader = new FileReader();
						reader.onloadend = function (e) { 
							showUploadedItem(e.target.result, file.fileName);
						};
						reader.readAsDataURL(file);
					}
					if (formdata) {
						formdata.append("images[]", file);
					}
				}	
			}
		
			if (formdata) {
				$.ajax($('#URLSITE').attr('href'),{
					type: "POST",
					data: formdata,
					processData: false,
					contentType: false,
					success: function (res) {
						if (res) {
							$('#images').slideToggle();
							$('#CommentImage').val(res);
							document.getElementById("response").innerHTML = 'La imagen fue subida correctamente';
						}
						
					}
				});
			}
		}, false);
	}());
</script>