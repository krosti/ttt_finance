<div class="extra situacion_actual">
	<?php echo $this->Html->css(array('situacion_actual')); ?>
	<?php 
		$slideNum = '';
		foreach ($posts as $post) {
	?>
		<div class="caja_slide">
			<div class="izq_slide">
				<span class="tit_slide">
					<div class="icon1"></div>
					<?php echo $this->Html->link($post['Post']['titulo'],'/posts/reporte/'.$post['Post']['id']); ?>
					<div class="fecha"><?php echo $this->Time->format('d F Y h:m',$post['Post']['created']); ?></div>
				</span>
				<?php echo $this->Html->image('/files/'.$post['Post']['image'],array('class'=>'imb_ppal_slide','width'=>400,'height'=>200,'onError'=>'error_handler.imageError(this)') ); ?>
				<div class="thumb_slide">
					<!--img src="img/warning.png" /
							tag here
					-->
					<?php if(isset($post['Post']['serie_datos_pie']) && $post['Post']['serie_datos_pie'] != ''): ?>
						<span><?php echo $post['Post']['serie_datos_pie']; ?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="der_slide">
				
				<?php $cuerpoHeight = ($slideNum != '') ? 'cuerpo_slide_fix': ''; ?>
				<span class="cuerpo_slide <?php echo $cuerpoHeight; ?>">
					<?php $postLength = ($slideNum != '') ? 275: 450; ?>
					<?php echo $this->Text->truncate($post['Post']['descripcion'], $postLength, array('ending' => '...','exact' => false) ); ?>

				</span>
			</div>
			<?php echo $this->Html->link('Ver M&aacute;s','/posts/view/'.$post['Post']['id'],array('escape'=>false,'class'=>'vermas')); ?>
			<div class="separacion_slide"></div>
			<div class="compartir_slide">
				<?php echo $this->element('opts_posts', array('post' => $post) ); ?>
			</div>
			
		</div>
	<?php } ?>
</div>