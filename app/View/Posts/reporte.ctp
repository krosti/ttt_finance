<div class="extra">
	<pre><?php print_r($post) ?></pre>
	
	<div class="top">
		<div class="nombre"><?php echo $post['Post']['created_by'] ?></div>
		<div class="fecha"><?php echo $post['Post']['created'] ?></div>
		<div class="social"><?php echo $this->element('opts_posts', array('Post' => $post) ); ?></div>
	</div>
	<div class="left">
		<div class="nombre"><?php echo $post['Post']['titulo'] ?></div>
		<div class="nombre"><?php echo $post['Post']['descripcion'] ?></div>
	</div>
	<div class="right">
		<?php foreach ($post['Comment'] as $comentario) { ?>
			<div class="comentarioBox">
				<div class="comentarioTitulo"><?php echo 'Re: '.$post['Post']['titulo'] ?> </div>
				<div class="comentarioFrom"><?php echo $comentario['User']['id'] ?> </div>
				<div class="comentarioFecha"><?php echo $comentario['created'] ?> </div>
				<div class="comentarioTitulo"><?php echo $comentario['detalle'] ?> </div>
				<div class="social"><?php echo $this->element('opts_posts', array('Post' => $comentario['id']) ); ?></div>
			</div>	
		<?php } ?><
	</div>
	<div class="nombre"><?php echo $post['Post']['created_by'] ?></div>
</div>