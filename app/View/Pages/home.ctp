<?php echo $this->element('indices_box'); ?>

<div class="column" id="col_izquierda">
	<div id="slider_ads">
		<div id="slideshow3">
			<div id="slidesContainer3">
				<?php foreach ($homebanners as $banner) { ?>
					<div class="slide3">
						<div class="caja_slide">
							<?php echo $this->Html->image(
								'/files/'.$banner['Banner']['image'],
								array(
									'class'=>'',
									'width'=>465,
									'height'=>200,
									'style'=>'float:left;',
									'onError'=>'error_handler.imageError(this)',
									'url'=>$banner['Banner']['url']
							)); ?> 
						</div>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
	<div class="seccion" id="analisis">
		<div class="header_seccion">
			<span class="titulo_seccion">An&aacute;lisis TTT</span>
		</div>
		<div class="cuerpo_seccion cuerpo_seccionSmall">
			<div id="slideshow">
				<div id="slidesContainer">
						<?php echo $this->element('post_home', array('analisisTTT' => $analisisttt, 'slideNum' => '','i'=>3) ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="seccion" id="noticias">
		<div class="header_seccion">
			<span class="titulo_seccion">Noticias</span>
		</div>
		<div class="cuerpo_seccion">
			<?php echo $this->Html->image('loading.gif',array('class'=>'loading') ); ?>
		</div>
	</div>
</div>
<div class="column" id="col_derecha">
	<div class="seccion" id="sit_actual">
		<div class="header_seccion">
			<span class="titulo_seccion">Situaci&oacute;n Actual</span>
		</div>
		<div class="cuerpo_seccion">
			<div id="slideshow2">
				<div id="slidesContainer2">
					<?php echo $this->element('post_home', array('analisisTTT' => $situacionesactuales, 'slideNum' => 2,'i'=>2) ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="seccion" id="opiniones">
		<div class="header_seccion">
			<span class="titulo_seccion">Opini&oacute;n</span>
		</div>
		<div class="cuerpo_seccion">
			<div id="slideshow">
				<div id="slidesContainer">
			<?php echo $this->element('post_home', array('analisisTTT' => $opiniones, 'slideNum' => 4,'i'=>3) ); ?>
				</div>
			</div>
		</div>
	</div>
</div>