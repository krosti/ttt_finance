<div class="extra eventos">
	<?php echo $this->Html->css(array('eventos')); ?>

	<?php foreach ($eventosbanners as $banner) { ?>
		<div class="evento">
			<div class="titulo"><?php echo $banner['Banner']['titulo']; ?> </div>
			<?php 
			$imagen = '/files/'.$banner['Banner']['image'];
			echo $this->Html->image(
				$imagen,
				array(
					'class'=>'',
					'width'=>960,
					'height'=>200,
					//'style'=>'float:left;',
					'onError'=>'error_handler.imageError(this)',
					'url'=>$banner['Banner']['url']
			)); ?> 
		</div>
	<?php } ?>

</div>