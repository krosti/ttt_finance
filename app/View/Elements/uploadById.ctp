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
	<ul id="image-list"></ul>
	<?php echo $this->Html->image('/icons/loading.gif', array('id'=>'uploading_gif','style'=>'display:none;') ); ?>
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
	 		//document.getElementById("response").innerHTML = document.getElementById('uploading_gif').innerHTML;
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
					beforeSend: function(){
						$('#uploading_gif').show();
					},
					success: function (res) {
						if (res) {
							$('#images').slideToggle();
							$(<?php echo $id?>).val(res);
							document.getElementById("response").innerHTML += 'La imagen fue subida correctamente';
							$('#uploading_gif').hide();
						}else{
							document.getElementById("response").innerHTML += 'Error. Intente nuevamente.';
						}
						
					}
				});
			}
		}, false);
	}());
</script>