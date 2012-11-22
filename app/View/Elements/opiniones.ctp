<?php 
	$hayUsuarioFb = (isset($facebook_user)) ? true : false; 
	$hayUsuarioTtt = ($this->Session->read('User')) ? true : false;
	$mostrarDialog = ( (!$hayUsuarioFb && !$hayUsuarioTtt) ) ? 'loginPopUp' : '';
?>
<div class="opiniones">
	<?php foreach ($opiniones as $opinion) { ?>
		<div class="comentarioBox">
			<div class="comentarioPicture">
				<?php if ($opinion['User']['image']):
					echo $this->Html->image('/files/'.$opinion['User']['image'],array() );
				elseif ($opinion['User']['facebook_id'] != 0):
					echo $this->Facebook->picture($opinion['User']['facebook_id']);
				else:
					$imagenAttach = ($opinion['Post']['image']) ? $opinion['Post']['image'] : false;
					if($imagenAttach):
						echo $this->Html->image('/files/'.$imagenAttach,array('width'=>30) );
					else:
						echo $this->Html->image('icons/value.png',array('width'=>60,'class'=>'transparent') );
					endif;
				endif; ?>
				<div class="comentarioFrom">
					<?php echo $opinion['User']['first_name'].'<br>'.$opinion['User']['last_name']; ?>
					<div class="clear"></div>
					<span><?php echo $this->Time->format('d m Y',$opinion['Post']['created']); ?> </span>
				</div>
			</div>
			<div class="comentarioBubble">
				<div class="comentarioTitulo <?php echo $mostrarDialog; ?>">
					<?php if ($hayUsuarioFb || $hayUsuarioTtt): ?>
						<?php echo $this->Html->link($opinion['Post']['titulo'],'/posts/reporte/'.$opinion['Post']['id'] ); ?>
					<?php else: ?>
						<?php echo $opinion['Post']['titulo']; ?>
					<?php endif ?>
				</div>
				
				<div class="comentarioMensaje">
					<span><?php echo html_entity_decode($this->Text->truncate($opinion['Post']['descripcion'],120, array('ending' => '...','exact' => true))); ?></span>
				</div>
				
				<div class="vermas_button">
					<?php if ($hayUsuarioFb || $hayUsuarioTtt): ?>
						<?php echo $this->Html->link('Ver M&aacute;s','/posts/reporte/'.$opinion['Post']['id'],array('escape'=>false)); ?>
					<?php else: ?>
						<?php echo $this->Html->link('Ver M&aacute;s','#'.$opinion['Post']['id'],array('escape'=>false,'class'=>$mostrarDialog)); ?>
					<?php endif; ?>
				</div>
				<?php if (!$opinion['User']['facebook_id'] || !$opinion['User']['image']): ?>
					<div class="comentarioAttach">
						<?php 
							$imagenAttach = ($opinion['Post']['image']) ? $opinion['Post']['image'] : false;
							if($imagenAttach):
								echo $this->Html->image('/files/'.$imagenAttach,array('width'=>30) );
							endif;
						?>
					</div>
				<?php endif ?>
			</div>
			<div class="social"><?php echo $this->element('opts_posts', array('post' => $opinion) ); ?></div>
		</div>	
	<?php } ?>
</div>