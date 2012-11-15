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

<div class="banners form">
<?php echo $this->Form->create('Banner'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Banner'); ?></legend>
	<?php
		echo $this->Form->input('titulo',array('type'=>'text') );
		echo $this->Form->input('url' );
		echo $this->Form->input('image',array('type'=>'hidden','value'=>' '));
		echo $this->Form->input('created',array('type'=>'hidden'));
		echo $this->Form->input('banner_tipo_id' );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?></li>
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
							var uploadedDate = new Date();
							showUploadedItem(e.target.result, file.fileName+'asdas');
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
							$('#BannerImage').val(res);
							document.getElementById("response").innerHTML = 'La imagen fue subida correctamente';
						}
						
					}
				});
			}
		}, false);
	}());
</script>