<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('TriTangoTraders - ADMIN - '); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<meta http-equiv="Content-Style-Type" content="text/css" /> 
	<meta http-equiv="Content-Script-Type" content="text/javascript" /> 
	<meta name="description" content="" /> 
	<meta name="keywords" content="" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold' rel='stylesheet' type='text/css' /> 
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array(/*'resources/css/ext-all',*/'ttt-clients-samples','lightbox','stockTicker'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->Html->script(array('jquery','lightbox'));
	?>
</head>

<body id="backend">
	<div id="tool1">
		<header>
			<span>TriTangoTraders</span>
			<span style="font-weight:500; letter-spacing:-2px;">ADMINISTRADOR</span>
			<span>
				<?php echo $this->Html->image('ttt.png'); ?>
			</span>
			<section>
				<span>please log-in with your account:</span>
			</section>
		</header>
		
		<div id="container">
			<div id="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>

		<div id="cotizacionBox">
			<div class="labelsCotizacion">
				<a href="#argentina" class="miniBtn" id="linkARG">Argentina</a>
				<a href="#usa" class="miniBtn" id="linkUSA">USA</a>
				<a href="#indices" class="miniBtn" id="linkIND">Indices</a>
			</div>
			<div id="datosLive"></div>
		</div>
		<?php #echo $this->element('sql_dump'); ?>
	</div>
</body>

	<!-- include ExtJS -->
	<!--IFDEBUG -->
	<!--script type="text/javascript" src="js/ext-all-dev.js"></script>
	<!-- ENDIF -->
	<!-- IFPRODUCTION
	<script type="text/javascript" src="js/ext-all.js"></script>
	ENDIF -->

	<!-- include Bancha and the remote API -->
	<!--script type="text/javascript" src="Bancha/js/Bancha.js"></script>
	<script type="text/javascript" src="bancha-api.js"></script-->

	<!-- include code -->
	<!--script type="text/javascript" src="js/error-handling.js"></script>
	<!--script type="text/javascript" src="js/beta-error-handling.js"></script-->
	<!--script type="text/javascript" src="js/ttt-clients-app.js"></script> 
	<script type="text/javascript" src="extjs-login/app.js"></script> 
	<script type="text/javascript" src="js/banchaOnReady.js"></script> <!-- contiene las funciones para el manejo de Bancha -->

	<!-- YUI -->
	
<?php 
	echo $this->Html->script(array(
		//Common libs
		'jquery.jstockticker-1.1' //jStock Marquesine - require jQuery 1.4+
	));
?>

	<!-- Google Chart -->
  <!--script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">gchart.init();</script-->



</html>
