<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'TriTangoTraders - Argentina');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('index','slider'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="cuerpo">
		<div class="header">
			<div id="direccion">
				TriTangoTraders  |  795 Folsom Ave, Suite 600  |  Capital Federal, Bs As, BA 1000  |  P: (11) 456-7890
			</div>
			<div id="sobre">
				<img src="img/sobre.png" /> <span id="mail_color">info@tritangotraders.com</span>
			</div>
			<div id="conectar">
				<span>Conectarse</span>
				<img src="img/logofb.png" />
				<span>Registrarse</span>
			</div>
			<div id="panel_header">
				<div id="logoppal">
					<img src="img/logo.png" />
				</div>
				<div id="login">
					<div id="login_user">
					<span>Inicio</span>
					<input class="input_login" id="input_user">
					</input>
					</div>
					<div id="login_pass">
					<input class="input_login" id="input_pass">
					</input>
					</div>
					<button id="button_login">Log - in</button>
				</div>
			</div>
			<div id="menu">
				<div id="items">
					<div class="item" id="item_cot">
						COTIZACIONES
					</div>
					<div class="item" id="item_ana">
						ANALISIS TTT
					</div>
					<div class="item" id="item_con">
						CONSULTAS
					</div>
					<div class="item" id="item_opi">
						OPINION
					</div>
					<div class="item" id="item_cur">
						CURSOS
					</div>
					<div class="item" id="item_not">
						NOTICIAS
					</div>
					<div class="item" id="item_nos">
						NOSOTROS
					</div>
				</div>

				<input id="buscar_input" value="Buscar"></input>
				<div id="logos_redes">
					<img src="img/fb.png" />
					<img src="img/tw.png" />
					<img src="img/ln.png" />
				</div>
			</div>
		</div>
		<div id="rankings">
		</div>
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
							<div class="slide">
								<div class="caja_slide">
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
										<div class="thumb_slide">
											<img src="img/warning.png" />
											<span>
												Thumbnail caption right here... 
											</span>
										</div>
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim 
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
								<div class="caja_slide">
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
										<div class="thumb_slide">
											<img src="img/warning.png" />
											<span>
												Thumbnail caption right here... 
											</span>
										</div>
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim 
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
							</div>
							<div class="slide">
								<div class="caja_slide">
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
										<div class="thumb_slide">
											<img src="img/warning.png" />
											<span>
												Thumbnail caption right here... 
											</span>
										</div>
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim 
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
								<div class="caja_slide">
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
										<div class="thumb_slide">
											<img src="img/warning.png" />
											<span>
												Thumbnail caption right here... 
											</span>
										</div>
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim 
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
							</div>
							<div class="slide">
								<div class="caja_slide">
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
										<div class="thumb_slide">
											<img src="img/warning.png" />
											<span>
												Thumbnail caption right here... 
											</span>
										</div>
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim 
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
								<div class="caja_slide">
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
										<div class="thumb_slide">
											<img src="img/warning.png" />
											<span>
												Thumbnail caption right here... 
											</span>
										</div>
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim 
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
							</div>
							<div class="slide">
								<div class="caja_slide">
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
										<div class="thumb_slide">
											<img src="img/warning.png" />
											<span>
												Thumbnail caption right here... 
											</span>
										</div>
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim 
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
								<div class="caja_slide">
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
										<div class="thumb_slide">
											<img src="img/warning.png" />
											<span>
												Thumbnail caption right here... 
											</span>
										</div>
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n23
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim 
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
							</div>
						</div>
					</div>
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
							<div class="slide2">
								<div class="caja_slide">
									<span class="hora_slide">
										DD-MM-YY HH:MM
									</span>
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
								<div class="caja_slide">
									<span class="hora_slide">
										DD-MM-YY HH:MM
									</span>
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
							</div>
							<div class="slide2">
								<div class="caja_slide">
									<span class="hora_slide">
										DD-MM-YY HH:MM
									</span>
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
								<div class="caja_slide">
									<span class="hora_slide">
										DD-MM-YY HH:MM
									</span>
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
							</div>
							<div class="slide2">
								<div class="caja_slide">
									<span class="hora_slide">
										DD-MM-YY HH:MM
									</span>
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
								<div class="caja_slide">
									<span class="hora_slide">
										DD-MM-YY HH:MM
									</span>
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
							</div>
							<div class="slide2">
								<div class="caja_slide">
									<span class="hora_slide">
										DD-MM-YY HH:MM
									</span>
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
								<div class="caja_slide">
									<span class="hora_slide">
										DD-MM-YY HH:MM
									</span>
									<div class="izq_slide">
										<img src="img/imgslide.png" class="img_ppal_slide" />
									</div>
									<div class="der_slide">
										<span class="tit_slide">
											Descripci&oacute;n
										</span>
										<span class="cuerpo_slide">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.
										</span>
									</div>
									<div class="separacion_slide">
									</div>
									<div class="compartir_slide">
										<img src="img/compartir_slide.png" />
										<span>
											Agregar un comentario
										</span>
									</div>
									<div class="separacion_slide separacion_inferior">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="seccion" id="sit_actual">
			</div>
		</div>
	</div>

</body>
<?php echo $this->Html->script(array(
		'jquery',
		'application-site.js',
		'slider.js',
		'ui-home',
		'lightbox',
		//ourAPPS
		'jsTTT/application',
		'jsTTT/crawler-with-yahooquery',
		'jsTTT/symbols',
		//'jsTTT/ui',
		//'jsTTT/gchart' //for Google SVG Chart
		'jsTTT/rgraph',
		'jsTTT/drawCanvas'
	)); ?>
</html>
