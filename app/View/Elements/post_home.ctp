<?php $i = 0; ?>
<?php foreach ($analisisTTT as $analisis) {?>
	<?php if ($i % 2 == 0) :?>
		<div class="<?php echo 'slide'.$slideNum; ?>">
	<?php endif; ?>
		<div class="caja_slide">
			<div class="izq_slide">
				<span class="tit_slide">
					<?php if (isset($facebook_user)): ?>
						<?php echo $this->Html->link($analisis['Post']['titulo'],'/posts/view/'.$analisis['Post']['id']); ?>
					<?php else: ?>
						<?php echo $analisis['Post']['id']; ?>
					<?php endif; ?>
				</span>
				<?php if (isset($facebook_user)): ?>
					<a href="<?php echo 'posts/view/'.$analisis['Post']['id']; ?>"><img src="<?php echo $analisis['Post']['serie_datos']; ?>" class="img_ppal_slide" width="400" height="200" onError="error_handler.imageError(this)"/></a>
				<?php else: ?>
					<img src="<?php echo $analisis['Post']['serie_datos']; ?>" class="img_ppal_slide" width="400" height="200" onError="error_handler.imageError(this)"/>
				<?php endif; ?>
				
				<div class="thumb_slide">
					<!--img src="img/warning.png" /
							tag here
					-->
					<?php if(isset($analisis['Post']['serie_datos_pie']) && $analisis['Post']['serie_datos_pie'] != ''): ?>
						<span><?php echo $analisis['Post']['serie_datos_pie']; ?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="der_slide">
				
				<?php $cuerpoHeight = ($slideNum != '') ? 'cuerpo_slide_fix': ''; ?>
				<span class="cuerpo_slide <?php echo $cuerpoHeight; ?>">
					<?php $postLength = ($slideNum != '') ? 275: 450; ?>
					<?php echo $this->Text->truncate($analisis['Post']['descripcion'], $postLength, array('ending' => '...','exact' => false) ); ?>
					<?php if (isset($facebook_user)): ?>
						<?php echo $this->Html->link('Ver M&aacute;s','/posts/view/'.$analisis['Post']['id'],array('escape'=>false)); ?>
					<?php endif; ?>
				</span>
			</div>
			<div class="separacion_slide"></div>
			<div class="compartir_slide">
				<?php echo $this->element('opts_posts', array('post' => $analisis) ); ?>
			</div>
			<div class="separacion_slide separacion_inferior"></div>
		</div>
	<?php #$i++; ?>
	<?php if ( ($i % 2 == 0) ) :?>
		</div>
	<?php endif; ?>
	
<?php } ?>