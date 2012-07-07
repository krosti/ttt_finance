<?php echo $this->Html->css(array('prettify/prettify')); ?>

<h1>Site Elements</h1>
<div class="horizontalLine lightGrey"></div>

<article>
	<button id="btnClear" href="#">Limpiar</button>
	<div class="clear"></div>
	<pre>
		<button id="btnClear" href="#">Limpiar</button>
	</pre>
</article>

<article>
	<div class="label" style="float:none;">Color1</div>
	<div class="clear"></div>
	<pre>
	<div class="label">Color1</div>
	</pre>
</article>

<article>
	<div class="button-circle-color orange" style="float:none;"></div>
	<div class="clear"></div>
	<pre>
	<div class="button-circle-color orange"></div>
	</pre>
</article>  

<article>
	<button id="cambiar-color3"><div class="label">Color3</div><div class="button-circle-color green"></div></button>
	<div class="clear"></div>
	<pre>
	<button id="cambiar-color3">
		<div class="label">Color3</div>
		<div class="button-circle-color green"></div>
	</button>
	</pre>
</article>  

<article>
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
	<div class="clear"></div>
	<pre>
	<header>
		<span>TriTangoTraders</span>
		<span style="font-weight:500; letter-spacing:-2px;">ADMINISTRADOR</span>
		<span>
			<?php echo $this->Html->image('ttt.png');?>
		</span>
		<section>
			<span>please log-in with your account:</span>
		</section>
	</header>
	</pre>
</article>    

<?php 

	echo $this->Html->script(array(
		//resources
		'prettify',
		//ourAPPS
		'jsTTT/application',
		'jsTTT/crawler-with-yahooquery',
		'jsTTT/symbols',
		'jsTTT/ui'
	));
?>
<script type="text/javascript">
	/*EXTRA STUFF*/
	/*pretiffy CODE*/
	ui.prettifyPre();
</script>