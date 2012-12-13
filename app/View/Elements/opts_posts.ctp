<div class="fbwrapper">
	<?php 
		$urlToLink = 'https://tttonline.com.ar/posts/reportes/'.$post['Post']['id'];
		echo $this->Facebook->like(array(
			'href' => $urlToLink,
			'font' => 'verdana', 
			'layout' => 'button_count', 
			'action' => 'like', 
			'colorscheme' => 'light'
		)); ?>
</div>

<div class="twwrapper">
	<a href="https://twitter.com/share" class="twitter-share-button" data-via="tritangotraders" data-text="<?php echo $post['Post']['titulo'].' - http://tttonline.com.ar/posts/reporte/'.$post['Post']['id'] ?>" data-lang="es" data-hashtags="tttonline" data-lang="es">Twittear</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<span>
	<?php 
		$hayUsuarioFb = (isset($facebook_user)) ? true : false; 
		$hayUsuarioTtt = ($this->Session->read('User')) ? true : false;
		$mostrarDialog = ( (!$hayUsuarioFb && !$hayUsuarioTtt) ) ? 'loginPopUp' : 'agregarComment'; 
		$clases = (isset($reporte)) ? $mostrarDialog.' '.$reporte : $mostrarDialog;
	?>
	<?php 
		echo $this->Html->link('Agregar un Comentario ('.count($post['Comment']).')',
								'#comment',array(
											'id'=>$post['Post']['id'],
											'class'=>$clases
											) 
								); 
	?>
</span>

