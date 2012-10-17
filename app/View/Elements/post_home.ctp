<?php #for ($j=1; $j <= 2 ; $j++) {  ?>
	
	<div class="<?php echo 'slide'.$slideNum; ?>">
		<?php for ($r = 0; $r < (($i*2)-1); $r++){ ?>
		<?php if (isset($analisisTTT[$r])): ?>
				
			<div class="caja_slide">
				<div class="izq_slide">
					<span class="tit_slide <?php if(!isset($facebook_user)){echo 'loginPopUp';} ?>">
						<?php if (isset($facebook_user)): ?>
							<?php echo $this->Html->link($analisisTTT[$r]['Post']['titulo'],'/posts/reporte/'.$analisisTTT[$r]['Post']['id']); ?>
						<?php else: ?>
							<span><?php echo $analisisTTT[$r]['Post']['titulo']; ?></span>
						<?php endif; ?>
					</span>
					<?php if (isset($facebook_user)): ?>
						<a href="<?php echo 'posts/reporte/'.$analisisTTT[$r]['Post']['id']; ?>"><img src="<?php echo $analisisTTT[$r]['Post']['serie_datos']; ?>" class="img_ppal_slide" width="200" height="120" onError="error_handler.imageError(this)"/></a>
					<?php else: ?>
						<img src="<?php echo $analisisTTT[$r]['Post']['serie_datos']; ?>" class="img_ppal_slide" width="200" height="120" onError="error_handler.imageError(this)"/>
					<?php endif; ?>
					
					<div class="thumb_slide">
						<?php if($analisisTTT[$r]['Post']['tipo_id'] == 2): ?>
							<div class="fecha"><?php echo $this->Time->format('d/m/Y h:m',$analisisTTT[$r]['Post']['created']); ?></div>
						<?php endif; ?>
						<?php if(isset($analisisTTT[$r]['Post']['serie_datos_pie']) && $analisisTTT[$r]['Post']['serie_datos_pie'] != ''): ?>
							<span><?php echo $analisisTTT[$r]['Post']['serie_datos_pie']; ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="der_slide">
					
					<?php $cuerpoHeight = ($slideNum != '') ? 'cuerpo_slide_fix': ''; ?>
					<span class="cuerpo_slide <?php echo $cuerpoHeight; ?>">
						<?php $postLength = ($slideNum != '') ? 260: 230; ?>
						<?php echo $this->Text->truncate($analisisTTT[$r]['Post']['descripcion'], $postLength, array('ending' => '...','exact' => false) ); ?>
						<?php if (isset($facebook_user)): ?>
							<?php echo $this->Html->link('Ver M&aacute;s','/posts/reporte/'.$analisisTTT[$r]['Post']['id'],array('escape'=>false)); ?>
						<?php endif; ?>
					</span>
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