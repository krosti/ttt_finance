<style type="text/css">
/*fix for facebook*/
.fb_edge_widget_with_comment>span,.fb_edge_widget_with_comment>span>iframe { width:52px !important; height:24px !important; }
</style>

<div class="fbwrapper">
	<?php echo $this->Facebook->like(array('url'=>'https://tttonline.com.ar/posts/reportes/'.$post['Post']['id'],'width'=>25)); ?>
</div>

<div class="twwrapper">
	<a href="https://twitter.com/share" class="twitter-share-button" data-via="tritangotraders" data-lang="es">Twittear</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<!-- AddThis Button BEGIN -->
<!--div class="addthis_toolbox addthis_default_style ">
	<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
	<a class="addthis_button_tweet"></a>
	<a class="addthis_button_pinterest_pinit"></a>
	<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5082e0c4294604da"></script-->
<!-- AddThis Button END -->

<span>
	<?php 
		$hayUsuarioFb = (isset($facebook_user)) ? true : false; 
		$hayUsuarioTtt = ($this->Session->read('User')) ? true : false;
		$mostrarDialog = ( (!$hayUsuarioFb && !$hayUsuarioTtt) ) ? 'loginPopUp' : ''; 
	?>
	<?php echo $this->Html->link('Agregar un Comentario ('.count($post['Comment']).')','#idnro',array('id'=>$post['Post']['id'],'class'=>'agregarComment '.$mostrarDialog) ); ?>
</span>

