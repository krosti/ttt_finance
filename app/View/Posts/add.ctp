<script type="text/javascript" src="http://cdn.aloha-editor.org/latest/lib/require.js"></script>
 
<!-- load the Aloha Editor core and some plugins -->
<script src="http://cdn.aloha-editor.org/latest/lib/aloha.js"
                   data-aloha-plugins="common/ui,
                                        common/format,
                                        common/list,
                                        common/link,
                                        common/paste,
                                        common/undo">
</script>

<!-- load the Aloha Editor CSS styles -->
<link href="http://cdn.aloha-editor.org/latest/css/aloha.css" rel="stylesheet" type="text/css" />

<!-- make all elements with class="editable" editable with Aloha Editor -->
<script type="text/javascript">
     Aloha.ready( function() {
            var $ = Aloha.jQuery;
            $('.editable').aloha();
     });
</script>

<!--END EDITOR-->

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
<div class="posts form">
	<?php echo $this->Form->create('Post',array('type'=>'file')); ?>
		<fieldset>
			<legend><?php echo __('Agregar Nuevo Posteo'); ?></legend>
		<?php
			echo $this->Form->input('titulo');
			echo $this->Form->input('descripcion',array('rows'=>25,'class'=>'editable') );
			#echo $this->Form->input('serie_datos');
			echo $this->Form->input('serie_datos_pie',array('label'=>'Pie de foto') );
			echo $this->Form->input('tipo_id');
			#echo $this->Form->input('visitas');
			$this->Form->input('created_by',array('value'=>$this->Session->read('User')) );
			#echo $this->Upload->add('Post');
			#echo $this->Form->input('image', array('type' => 'file'));
			echo $this->Form->input('image',array('type'=>'hidden'));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Guardar')); ?>
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
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('controller' => 'tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo'), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
	</ul>
</div>
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
							$('#PostImage').val(res);
							document.getElementById("response").innerHTML = 'La imagen fue subida correctamente';
						}
						
					}
				});
			}
		}, false);
	}());
</script>