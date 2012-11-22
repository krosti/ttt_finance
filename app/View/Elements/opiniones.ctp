<?php 
	$hayUsuarioFb = (isset($facebook_user)) ? true : false; 
	$hayUsuarioTtt = ($this->Session->read('User')) ? true : false;
	$mostrarDialog = ( (!$hayUsuarioFb && !$hayUsuarioTtt) ) ? 'loginPopUp' : '';
?>
<div class="opiniones">
	<?php foreach ($opiniones as $opinion) { ?>
		<div class="comentarioBox">
			<div class="comentarioPicture">
				<?php if ($opinion['User']['image']): ?>
					<?php echo $opinion['User']['image']; ?>
				<?php else: ?>	
					<?php echo $this->Html->image('icons/value.png',array('width'=>60) ); ?>
				<?php endif ?>
			</div>
			<div class="comentarioTitulo <?php echo $mostrarDialog; ?>">
				<?php if ($hayUsuarioFb || $hayUsuarioTtt): ?>
					<?php echo $this->Html->link($opinion['Post']['titulo'],'/posts/reporte/'.$opinion['Post']['id'] ); ?>
				<?php else: ?>
					<?php echo $opinion['Post']['titulo']; ?>
				<?php endif ?>
			</div>
			<div class="comentarioFrom">
				<?php echo 'Nota por '.$opinion['User']['username'].' '.$this->Time->format('d/m/Y h:m',$opinion['Post']['created']); ?>
			</div>
			
			<div class="comentarioMensaje">
				<?php echo $this->Text->truncate($opinion['Post']['descripcion'],80, array('ending' => '...','exact' => true)); ?>
			</div>
			<div class="comentarioAttach">
				<?php 
					$imagenAttach = ($opinion['Post']['image']) ? $opinion['Post']['image'] : false;
					if($imagenAttach):
						echo $this->Html->image('/files/'.$imagenAttach,array('width'=>30) );
					else:
						echo '...';
					endif;
				?>
			</div>
			<div class="social"><?php echo $this->element('opts_posts', array('post' => $opinion) ); ?></div>
		</div>	
	<?php } ?>
</div>