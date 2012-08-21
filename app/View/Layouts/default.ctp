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
<!--html xmlns="http://www.w3.org/1999/xhtml"-->
<?php echo $this->Facebook->html(); ?>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('index','slider','stockTicker','jquery-ui-1.8.22.custom'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<?php echo $this->Html->script(array(
		'jsTTT/error-handler'
	)); ?>
	
</head>
<body><?php #debug($facebook_user); ?>
	<div class="cuerpo">
		<div class="header">
			<div id="direccion">
				TriTangoTraders |
			</div>
			<div id="sobre">
				<?php echo $this->Html->image('sobre.png'); ?>
				<span id="mail_color">info@tritangotraders.com</span>
			</div>
			<div id="conectar">
				<span>
					<?php #echo ($facebook_user) ? $this->Facebook->logout(array('redirect_to'=>'users/logout')) : $this->Facebook->login(); ?>
					<?php 
						if ($facebook_user) {
							echo "Estas conectado con ".$facebook_user['username'];
							echo $this->Facebook->logout(array('redirect' => array('controller' => 'users', 'action' => 'logout')));
							echo $this->Facebook->picture($facebook_user['id']);
						}
					?>
				</span>

				<?php echo $this->Html->image('logofb.png',array('url'=>'/')); ?>
				
				<span><?php if ($this->Session->read('User')) 
					{
						echo $this->Html->link("Cerrar Sesión","/users/logout");
					}
					else
					{
						echo $this->Html->link('Registrarse',array('controller'=>'users','action'=>'add'));
					}?>
				</span>

			</div>
			<div id="panel_header">
				<div id="logoppal">
					<?php echo $this->Html->image('logo.png',array('url'=>'/')); ?>
				</div>
				<div id="login">
					<?php echo $this->element('login'); ?>
				</div>
			</div>
			<div id="menu">
				<div id="items">
					<div class="item" id="item_cot">
						<?php echo $this->Html->link('COTIZACIONES','/'); ?>
					</div>
					<div class="item" id="item_ana">
						<?php echo $this->Html->link('ANALISIS TTT','/'); ?>
					</div>
					<div class="item" id="item_con">
						<?php echo $this->Html->link('CONSULTAS/OPINION','/'); ?>
					</div>
					<!--div class="item" id="item_opi">
						<?php echo $this->Html->link('OPINION','/'); ?>
					</div-->
					<div class="item" id="item_cur">
						<?php echo $this->Html->link('CURSOS','/cursos'); ?>
					</div>
					<div class="item" id="item_not">
						<?php echo $this->Html->link('NOTICIAS','/'); ?>
					</div>
					<div class="item" id="item_nos">
						<?php echo $this->Html->link('NOSOTROS','/nosotros'); ?>
					</div>
				</div>

				<input id="buscar_input" value="Buscar"></input>
				<div id="logos_redes">
					<?php echo $this->Html->image('fb.png'); ?>
					<?php echo $this->Html->image('tw.png'); ?>
					<?php echo $this->Html->image('ln.png'); ?>
				</div>
			</div>
		</div>
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		<?php #echo $this->element('sql_dump'); ?>
		<div id="graphBOX" style="display:none"><?php #echo $this->element('posts'); ?></div>
		<div id="footer">
			<?php echo $this->Html->image('logofooter.png',array('id'=>'logofooter') ); ?>
			<div id="links_footer">
				Ayuda  |  Sugerencias  |  Pol&iacute;tica de privacidad  |  T&eacute;rminos del Servicio  |  Propiedad Intelectual
			</div>
			<div id="unirse">
				<span>&Uacute;nase a nuestra comunidad</span>
				<?php echo $this->Html->image('logofb.png'); ?>
				<?php echo $this->Html->image('logotw.png'); ?>
				<?php echo $this->Html->image('logoln.png'); ?>
			</div>
			<div id="copy">
				Copyright © 2012 Tritango Traders. Todos los derechos reservados.  
			</div>
			<div class="disclaimer">
				Bienvenido a TriTangoTraders. Este blog sólo refleja nuestra expectativa respecto al mercado. Es por ello que nada de lo que aquí se produce debe ser tomado como recomendación o consejo de compra o venta. Nuestras visiones son meramente con fines recreativos y educativos.
				<br/>
				Usted debe realizar sus propios análisis y sus propias operaciones asumiendo el riesgo que conllevan en forma independiente de lo que aquí se exponga. Tritangotraders para obtener informacion detallada sobre los nuevos cursos bursatiles y contactarnos a los siguientes emails tritangotraders@gmail.com o info@tritangotraders.com
				<br/>
				Y recuerde, proteja su capital, utilice siempre stop loss.
			</div>
		</div>

	</div>

</body>
<?php echo $this->Facebook->init(); ?>
<?php echo $this->Html->script(array(
		'jquery',
		'jquery-ui',
		'application-site.js',
		'slider.js',
		'ui-home',
		'lightbox',
		'valores',
		'jquery.jstockticker-1.1',
		//ourAPPS
		//'jsTTT/application',
		'jsTTT/crawler-with-yahooquery',
		'jsTTT/symbols',
		'jsTTT/ui',
		'jsTTT/error-handler',
		//'jsTTT/gchart'
		//'jsTTT/rgraph',
		//'jsTTT/drawCanvas',
		//extern libreries
		'mopSlider/mopSlider-2.4',
		'pngFix/jquery.pngFix'
	)); ?>

</html>