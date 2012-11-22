<?php echo $this->element('indices_box'); ?>

<?php echo $this->Html->css(array('reportes')); ?>
<div class="extra reportes">
	<pre><?php #print_r($post) ?></pre>
	
	<div class="top">
		<div class="nombre"><?php echo $post['Post']['created_by'] ?></div>
		<div class="fecha"><?php echo $this->Time->format('d F Y h:m',$post['Post']['created']); ?></div>
		<div class="social"><?php echo $this->element('opts_posts', array('Post' => $post, 'reporte'=>'reporte') ); ?></div>
	</div>
	<?php if ($post['Post']['tipo_id'] != 3): ?>
		<div class="left">
			<div class="infoTag"></div>
			<div class="graficoTag">
				<?php echo $this->Html->image('/files/'.$post['Post']['image'],array('class'=>'imb_ppal_slide','width'=>770,'onError'=>'error_handler.imageError(this)') ); ?>
			</div>
		</div>
	<?php endif ?>
	<div class="right">
		<div class="tituloPost"><?php echo $post['Post']['titulo'] ?></div>
		<div class="descripcion"><?php echo $post['Post']['descripcion'] ?></div>
		<?php echo $this->Html->image('tags/tag_'.$post['Post']['tipo_id'].'.png'); ?>
	</div>
	
	<div class="bottom">
		<div class="bottomHeader">
			<div class="tituloComentario">Comentarios</div>
			<span>
				<?php echo $this->Html->link('Agregar un Comentario  ('.count($post['Comment']).')','#idnro',array('id'=>$post['Post']['id'],'class'=>'agregarComment reporte') ); ?>
			</span>
		</div>
		<?php #echo debug($users); ?>

		<?php if (count($post['Comment']) > 0) : ?>
			<?php foreach ($post['Comment'] as $comentario) { ?>
				<div class="comentarioBox">
					<div class="comentarioTitulo"><?php echo 'Re: '.$post['Post']['titulo']; ?> </div>
					<div class="comentarioFrom"><?php echo 'De: '.$comentario[0]['User']['username']; ?> </div>
					<div class="comentarioFecha"><?php echo $this->Time->format('d/m/Y h:m',$comentario['created']); ?> </div>
					<div class="comentarioMensaje"><?php echo $comentario['mensaje']; ?> </div>
					<div class="comentarioAttach">
						<?php 
							$imagenAttach = ($comentario['image']) ? $comentario['image'] : false;
							if($imagenAttach):
								echo $this->Html->image('/files/'.$imagenAttach,array('width'=>30) );
							else:
								echo '...';
							endif;

						?>
					</div>
					<div class="social"><?php echo $this->element('opts_posts', array('post' => $post) ); ?></div>
				</div>	
			<?php } ?>
		<?php else: ?>
			<div class="noHayComments">No hay comentarios</div>
		<?php endif; ?>
		<?php #echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>
		<?php #echo $this->Facebook->comments(array('href'=>'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"],'width'=>960)); ?>
	</div>
	<div class="nombre"><?php echo $post['Post']['created_by'] ?></div>
</div>