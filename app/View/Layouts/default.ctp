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
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
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

		echo $this->Html->css(array('/wysihtml5/css/stylesheet.css'));
		echo $this->Minify->css(array('index','slider','jquery-ui-1.8.16.custom','tooltips','stockTicker'));
		#echo $this->Minify->script(array('jquery', 'interface'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<?php echo $this->Html->script(array(
		'jsTTT/error-handler'
	)); ?>
	
</head>
<body>
	<?php 
		$hayUsuarioFb = (isset($facebook_user)) ? true : false; 
		$hayUsuarioTtt = ($this->Session->read('User')) ? true : false;
		$mostrarDialog = ( (!$hayUsuarioFb && !$hayUsuarioTtt) ) ? 'loginPopUp' : '';
	?>
	<a href="comment"></a>
	<div class="flash_message" style="color:red; background:yellow;"><?php echo $this->Session->flash('auth'); ?></div>

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
				<!--nocache-->
				<!--div id="jsFbStatus"></div-->
				<span style="float:right;">
					
					<?php 
						if (isset($facebook_user)) {
							echo (isset($fb_user_has_account) && $fb_user_has_account) 
								? "" 
								: "Estas conectado pero no registrado | ";
							echo $this->Facebook->logout(array('label'=>'Logout','redirect' => array('controller' => 'users', 'action' => 'logout') ));
						} else{
							echo '<div class="fb">'.
								$this->Facebook->login(array(
									'perms' => 'email,publish_stream',
									'custom' => true,
									'redirect' => '/',
									'label'=>'Login'
									))
								.'</div>';
						}

					?>
				</span>

				<?php echo $this->Html->image('logofb.png',array('url'=>'/')); ?>
				
				<span><?php 					
					if ($this->Session->read('User') && empty($fb_user_has_account) ) {
						echo $this->Html->link("Cerrar Sesión","/users/logout");
					} else{
						echo (isset($fb_user_has_account) && $fb_user_has_account) 
							? $fb_user_has_account['User']['username'] 
							: $this->Html->link('Registrarse','#',array('id'=>'registrarseTTT'));
					}?>
				</span>
				<!--/nocache-->
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
						<?php echo $this->Html->link('COTIZACION','/'); ?>
					</div>
					<div class="item" id="item_ana">
						<?php echo ($mostrarDialog != '') 
								? $this->Html->link('SITUACI&Oacute;N ACTUAL','#',array('escape'=>false,'class'=>$mostrarDialog))
								: $this->Html->link('SITUACI&Oacute;N ACTUAL','/situacion_actual',array('escape'=>false));
						?>
					</div>
					<div class="item" id="item_con">
						<?php echo ($mostrarDialog != '') 
								? $this->Html->link('ANALISIS TTT','#',array('escape'=>false,'class'=>$mostrarDialog))
								: $this->Html->link('ANALISIS TTT','/analisis_ttt',array('escape'=>false));
						?>
					</div>
					<div class="item" id="item_opi">
						<?php echo ($mostrarDialog != '') 
								? $this->Html->link('OPINION','#',array('escape'=>false,'class'=>$mostrarDialog))
								: $this->Html->link('OPINION','/opinion',array('escape'=>false));
						?>
					</div>
					<!--div class="item" id="item_opi">
						<?php echo $this->Html->link('DIV&Aacute;N','/divan',array('escape'=>false,)); ?>
					</div-->
					<div class="item" id="item_cur">
						<?php echo $this->Html->link('EVENTOS','/eventos',array()); ?>
					</div>
					<div class="item" id="item_not">
						<?php echo $this->Html->link('CASOS DE EXITO','/casos_de_exito'); ?>
					</div>
					<div class="item" id="item_nos">
						<?php echo $this->Html->link('NOSOTROS','/nosotros'); ?>
					</div>
				</div>

				<?php #echo $this->Form->create('Post', array('controller'=>'post','action' => "search",'class'=>'loginsearch'));?>
					<input class="buscar_input" placeholder="Buscar"></input>
					<?php echo $this->Html->image('icons/search.png',array('width'=>14, 'url'=>'/posts/search/','class'=>'buscar_button') ) ?>
					<?php #echo $this->Form->button($this->Html->image('icons/search.png',array('width'=>14) ),array('id'=>''));?>
				<?php #echo $this->Form->end(); ?>
				<div id="logos_redes">
					<?php echo $this->Html->image('fb.png',array('url'=>'http://www.facebook.com/tritangotraders?fref=ts') ); ?>
					<?php echo $this->Html->image('tw.png',array('url'=>'http://twitter.com/tritangotraders') ); ?>
					<?php echo $this->Html->image('ln.png',array('url'=>'http://linkedin.com/ttt') ); ?>
				</div>
			</div>
		</div>
		<div id="spinner"></div>
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
				<?php echo $this->Html->image('logofb.png',array('url'=>'http://www.facebook.com/tritangotraders?fref=ts')); ?>
				<?php echo $this->Html->image('logotw.png',array('url'=>'http://twitter.com/tritangotraders')); ?>
				<?php echo $this->Html->image('logoln.png',array('url'=>'http://linkedin.com/ttt')); ?>
			</div>
			<div id="copy">
				Copyright © 2012 Tritango Traders. Todos los derechos reservados.  
			</div>
			<div id="design" style="padding-top: 38px;margin-right: -240px;float: right;">
				<?php echo $this->Html->image('borealdesign.png',array('url'=>'http://borealdev.com')); ?>
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

<!--Agrega user-->
<div id="nuevo_usuario" style="display:none;"> <?php echo $this->element('usersadd'); ?> </div>

<!--please log in user-->
<div id="box_login_dialog" style="display:none;"> <?php echo $this->element('login_dialog'); ?> </div>

</body>
<?php echo $this->Facebook->init(); ?>

<?php #echo $this->Html->script(array(
	echo $this->Minify->script(array(
		'jquery',
		'jquery-ui-1.9.0.custom',
		'spin.min',
		'application-site',
		'slider',
		'ui-home',
		'lightbox',
		'valores',
		'jquery.jstockticker-1.1',
		//ourAPPS
		//'jsTTT/application',
		'jsTTT/crawler-with-yahooquery',
		'jsTTT/symbols',
		//'jsTTT/ui',
		'jsTTT/error-handler',
		//'jsTTT/gchart',
		//'jsTTT/rgraph',
		//'jsTTT/drawCanvas',
		//extern libreries
		'mopSlider/mopSlider-2.4',
		'pngFix/jquery.pngFix',
	)); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  if (location.host == 'tttonline.com.ar') {
  	_gaq.push(['_setAccount', 'UA-18639347-16']);
  	_gaq.push(['_setDomainName', 'tttonline.com.ar']);	
  } else{
  	_gaq.push(['_setAccount', 'UA-18639347-17']);
  	_gaq.push(['_setDomainName', 'tritangotraders.com.ar']);
  };
  
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>