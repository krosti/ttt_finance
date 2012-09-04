<?php $i = 0; ?>
<?php foreach ($analisisTTT as $analisis) {?>
	<?php if ($i % 2 == 0) :?>
		<div class="<?php echo 'slide'.$slideNum; ?>">
	<?php endif; ?>
		<div class="caja_slide">
			<div class="izq_slide">
				<span class="tit_slide">
					<?php echo $this->Html->link($analisis['Post']['titulo'],'/posts/view/'.$analisis['Post']['id']); ?>
				</span>
				<img src="<?php echo $analisis['Post']['serie_datos']; ?>" class="img_ppal_slide" width="400" height="200" onError="error_handler.imageError(this)"/>
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
				</span>
			</div>
			<div class="separacion_slide">
			</div>
			<div class="compartir_slide">
				<!--img src="img/compartir_slide.png" /-->
				<?php echo $this->Facebook->share(null, array('fbxml' => true)); ?>
				
				<span>
					<?php echo $this->Html->link('Agregar un Comentario','#idnro',array('id'=>$analisis['Post']['id'],'class'=>'agregarComment') ); ?>
				</span>
			</div>
			<div class="separacion_slide separacion_inferior"></div>
		</div>
	<?php #$i++; ?>
	<?php if ( ($i % 2 == 0) ) :?>
		</div>
	<?php endif; ?>
	
<?php } ?>