<?php echo $this->element('indices_box'); ?>

<?php echo $this->Html->css(array('reportes')); ?>
<div class="extra reportes">
	<pre><?php #print_r($post) ?></pre>
	
	<div class="top">
		<div class="nombre"><?php echo $post['Post']['created_by'] ?></div>
		<div class="fecha"><?php echo $this->Time->format('d F Y h:m',$post['Post']['created']); ?></div>
		<div class="social"><?php echo $this->element('opts_posts', array('Post' => $post) ); ?></div>
	</div>
	<div class="left">
		<div class="infoTag">

		</div>
		<div class="graficoTag">
			<?php echo $this->Html->image('/files/'.$post['Post']['image'],array('class'=>'imb_ppal_slide','width'=>770,'onError'=>'error_handler.imageError(this)') ); ?>
		</div>
	</div>
	<div class="right">
		<div class="tituloPost"><?php echo $post['Post']['titulo'] ?></div>
		<div class="descripcion"><?php echo $post['Post']['descripcion'] ?></div>
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
		<?php echo $this->Facebook->comments(array('href'=>$this->here,'width'=>960)); ?>
	</div>
	<div class="nombre"><?php echo $post['Post']['created_by'] ?></div>
</div>