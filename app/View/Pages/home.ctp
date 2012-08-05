<?php echo $this->element('indices_box'); ?>

<div class="column" id="col_izquierda">
	<div id="slider_ads">
	</div>
	<div class="seccion" id="analisis">
		<div class="header_seccion">
			An&aacute;lisis TTT
		</div>
		<div class="cuerpo_seccion">
			<div id="slideshow">
				<div id="slidesContainer">

						<?php if (sizeof($analisisttt) % 2 == 0) :?>
						<div class="slide">
						<?php endif; ?>
						<?php foreach ($analisisttt as $analisis) {?>
							
								<div class="caja_slide">
									<div class="izq_slide">
										<img src="<?php echo $analisis['Post']['serie_datos']; ?>" class="img_ppal_slide" width="200"/>
										<div class="thumb_slide">
											<!--img src="img/warning.png" /-->
											<span>
												<?php echo 'Lorem ipsum ..' ?>
											</span>
										</div>
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											<?php echo $analisis['Post']['titulo']; ?>
										</span>
										<span class="cuerpo_slide">
											<?php echo $this->Text->truncate($analisis['Post']['descripcion'], 272, array('ending' => '...','exact' => false) ); ?>
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<!--img src="img/compartir_slide.png" /-->
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
							
						<?php } ?>
						<?php if (sizeof($analisisttt) % 2 == 0) : ?>
						</div>
						<?php endif; ?>

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

					<?php if (sizeof($situacionesactuales) % 2 == 0) :?>
					<div class="slide2">
					<?php endif; ?>
					<?php foreach ($situacionesactuales as $situacion) {?>
							
								<div class="caja_slide">
									<span class="hora_slide">
										<?php echo date("d-m-Y (H:i A)", strtotime($situacion['Post']['created'])); ?>
									</span>
									<div class="izq_slide">
										<img src="<?php echo $situacion['Post']['serie_datos']; ?>" class="img_ppal_slide" width="200"/>
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											<?php echo $situacion['Post']['titulo']; ?>
										</span>
										<span class="cuerpo_slide">
											<?php echo $this->Text->truncate($situacion['Post']['descripcion'], 222, array('ending' => '...','exact' => false) ); ?>
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<!--img src="img/compartir_slide.png" /-->
										<span>
											<?php echo $this->Html->link('Agregar un Comentario','#idnro',array('class'=>'agregarComment') ); ?>
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
							
						<?php } ?>
						<?php if (sizeof($situacionesactuales) % 2 == 0) : ?>
						</div>
						<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
	<div class="seccion" id="opiniones">
		<div class="header_seccion">
			Consulta / Opini&oacute;n
		</div>
		<div class="cuerpo_seccion">
			<div class="opinion">
				<div class="borde_opinion">
					<span class="titulo_opinion">Re: Consultas o comentarios sobre el Foro</span>
					<span class="cuerpo_opinion">
						<u>Notapor JIR el Mar Abr 19, 2011 3:16 pm</u>
						<br />
						El intercambio de mails es para situaciones particulares, excepcionales, no para pedir u ofrecer masivamente. Saludos.
					</span>
					<div class="compartir_slide">
						<img src="img/compartir_slide.png" />
						<span>
							Agregar un comentario
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>