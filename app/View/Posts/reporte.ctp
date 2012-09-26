<?php echo $this->element('indices_box'); ?>

<?php echo $this->Html->css(array('reportes')); ?>
<div class="extra reportes">
	<pre><?php #print_r($post) ?></pre>
	
	<div class="top">
		<div class="nombre"><?php echo $post['Post']['created_by'] ?></div>
		<div class="fecha"><?php echo $this->Time->niceShort($post['Post']['created']); ?></div>
		<div class="social"><?php echo $this->element('opts_posts', array('Post' => $post) ); ?></div>
	</div>
	<div class="left">
		<div class="tituloPost"><?php echo $post['Post']['titulo'] ?></div>
		<div class="descripcion"><?php echo $post['Post']['descripcion'] ?></div>
	</div>
	<div class="right">
		<div class="infoTag">

		</div>
		<div class="graficoTag">
			<img src="<?php echo $post['Post']['serie_datos']; ?>" class="img_ppal_slide" width="430" onError="error_handler.imageError(this)"/>
		</div>
	</div>
	<div class="bottom">
		<div class="bottomHeader">
			<div class="tituloComentario">Comentarios</div>
			<span>
				<?php echo $this->Html->link('Agregar un Comentario','#idnro',array('id'=>$post['Post']['id'],'class'=>'agregarComment') ); ?>
			</span>
		</div>
		<?php if (count($post['Comment']) > 0) : ?>
			<?php foreach ($post['Comment'] as $comentario) { ?>
				<div class="comentarioBox">
					<div class="comentarioTitulo"><?php echo 'Re: '.$post['Post']['titulo'] ?> </div>
					<div class="comentarioFrom"><?php #echo $comentario['User']['id'] ?> </div>
					<div class="comentarioFecha"><?php echo $comentario['created'] ?> </div>
					<div class="comentarioMensaje"><?php echo $comentario['mensaje'] ?> </div>
					<div class="social"><?php echo $this->element('opts_posts', array('Post' => $comentario['id']) ); ?></div>
				</div>	
			<?php } ?>
		<?php else: ?>
			<div class="noHayComments">No hay comentarios</div>
		<?php endif; ?>
	</div>
	<div class="nombre"><?php echo $post['Post']['created_by'] ?></div>
</div>