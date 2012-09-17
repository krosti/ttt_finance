<?php echo $this->element('indices_box'); ?>

<div class="column" id="col_izquierda">
	<div id="slider_ads">
		<div id="slideshow3">
			<div id="slidesContainer3">
				<div class="slide3">
					<div class="caja_slide"><?php echo $this->Html->image('http://placehold.it/465x200'); ?> </div>
					<div class="caja_slide"><?php echo $this->Html->image('http://placehold.it/465x200/red'); ?> </div>
					<div class="caja_slide"><?php echo $this->Html->image('http://placehold.it/465x200'); ?> </div>
				</div>
			</div>
		</div>
	</div>
	<div class="seccion" id="analisis">
		<div class="header_seccion">
			An&aacute;lisis TTT
		</div>
		<div class="cuerpo_seccion">
			<div id="slideshow">
				<div id="slidesContainer">
						<?php echo $this->element('post_home', array('analisisTTT' => $analisisttt, 'slideNum' => '') ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="seccion" id="noticias">
		<div class="header_seccion">
			Noticias
		</div>
		<div class="cuerpo_seccion">

		</div>
	</div>
</div>
<div class="column" id="col_derecha">
	<div class="seccion" id="sit_actual">
		<div class="header_seccion">
			Situaci&oacute;n Actual
		</div>
		<div class="cuerpo_seccion">
			<div id="slideshow2">
				<div id="slidesContainer2">
					<?php echo $this->element('post_home', array('analisisTTT' => $situacionesactuales, 'slideNum' => 2) ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="seccion" id="opiniones">
		<div class="header_seccion">
			Opini&oacute;n
		</div>
		<div class="cuerpo_seccion">
			<?php echo $this->element('post_home', array('analisisTTT' => $opiniones, 'slideNum' => 3) ); ?>
		</div>
	</div>
</div>