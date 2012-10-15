<style type="text/css">

.fb_edge_widget_with_comment>span,.fb_edge_widget_with_comment>span>iframe { width:52px !important; height:24px !important; }

</style>

<div class="fbwrapper">
	<?php echo $this->Facebook->like(array('url'=>'https://tttonline.com.ar/posts/reportes/'.$post['Post']['id'],'width'=>25)); ?>
</div>

<div class="twwrapper">
	<a href="https://twitter.com/share" class="twitter-share-button" data-via="tritangotraders" data-lang="es">Twittear</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<span>
	<?php echo $this->Html->link('Agregar un Comentario','#idnro',array('id'=>$post['Post']['id'],'class'=>'agregarComment') ); ?>
</span>

