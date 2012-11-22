<?php 
	$hayUsuarioFb = (isset($facebook_user)) ? true : false; 
	$hayUsuarioTtt = ($this->Session->read('User')) ? true : false;
	$mostrarDialog = ( (!$hayUsuarioFb && !$hayUsuarioTtt) ) ? 'loginPopUp' : '';
?>
	<?php #echo (!$hayUsuarioFb) ? 'fb' : ''; ?>
	<?php #echo (!$hayUsuarioTtt) ? 'ttt' : ''; ?>
	<div class="<?php echo 'slide'.$slideNum; ?>">
		<?php for ($r = 0; $r < (($i*2)-1); $r++){ ?>
		<?php if (isset($analisisTTT[$r])): ?>
				
			<div class="caja_slide">
				<div class="izq_slide">
					<span class="tit_slide <?php echo $mostrarDialog; ?>">
						<?php if ($hayUsuarioFb || $hayUsuarioTtt): ?>
							<?php echo $this->Html->link($analisisTTT[$r]['Post']['titulo'],'/posts/reporte/'.$analisisTTT[$r]['Post']['id']); ?>
						<?php else: ?>
							<span><?php echo $analisisTTT[$r]['Post']['titulo']; ?></span>
						<?php endif; ?>
					</span>
					<?php if ($hayUsuarioFb || $hayUsuarioTtt): ?>
						<a href="<?php echo 'posts/reporte/'.$analisisTTT[$r]['Post']['id']; ?>">
							<?php echo $this->Html->image('/files/'.$analisisTTT[$r]['Post']['image'],array('class'=>'imb_ppal_slide','width'=>200,'height'=>120,'style'=>'float:left;','onError'=>'error_handler.imageError(this)') ); ?>
						</a>
					<?php else: ?>
						<a href="#" class="<?php echo $mostrarDialog; ?>">
							<?php echo $this->Html->image('/files/'.$analisisTTT[$r]['Post']['image'],array('class'=>'imb_ppal_slide','width'=>200,'height'=>120,'style'=>'float:left;','onError'=>'error_handler.imageError(this)') ); ?>
						</a>
					<?php endif; ?>
					
					<div class="thumb_slide">
						<?php if($analisisTTT[$r]['Post']['tipo_id'] == 2): ?>
							<div class="fecha"><?php echo $this->Time->format('d F Y h:m',$analisisTTT[$r]['Post']['created']); ?></div>
						<?php endif; ?>
						<?php if(isset($analisisTTT[$r]['Post']['serie_datos_pie']) && $analisisTTT[$r]['Post']['serie_datos_pie'] != ''): ?>
							<span><?php echo $analisisTTT[$r]['Post']['serie_datos_pie']; ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="der_slide">
					<?php $cuerpoHeight = ($slideNum != '') ? 'cuerpo_slide_fix': ''; ?>
					<span class="cuerpo_slide <?php echo $cuerpoHeight; ?>">
						<?php $postLength = ($slideNum != '') ? 260: 200; ?>
						<?php echo $this->Text->truncate($analisisTTT[$r]['Post']['descripcion'], $postLength, array('ending' => '...','exact' => true) ); ?>
					</span>
				</div>
				<div class="vermas_button">
					<?php if ($hayUsuarioFb || $hayUsuarioTtt): ?>
						<?php echo $this->Html->link('Ver M&aacute;s','/posts/reporte/'.$analisisTTT[$r]['Post']['id'],array('escape'=>false)); ?>
					<?php else: ?>
						<?php echo $this->Html->link('Ver M&aacute;s','#'.$analisisTTT[$r]['Post']['id'],array('escape'=>false,'class'=>$mostrarDialog)); ?>
					<?php endif; ?>
				</div>
				<div class="separacion_slide"></div>
				<div class="compartir_slide">
					<?php echo $this->element('opts_posts', array('post' => $analisisTTT[$r]) ); ?>
				</div>
				<div class="separacion_slide separacion_inferior"></div>
				
			</div>
		<?php endif; ?>
				<?php if ($r == ($i-1)) { ?>
					</div>
					<div class="<?php echo 'slide'.$slideNum; ?>">
				<?php } ?>
		<?php } ?>
	</div>

<?php #} ?>