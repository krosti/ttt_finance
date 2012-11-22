<div class="banners form">
<?php echo $this->Form->create('Banner'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Banner'); ?></legend>
	<?php
		echo $this->Form->input('titulo',array('type'=>'text') );
		echo $this->Form->input('url' );
		echo $this->Form->input('image',array('type'=>'hidden','value'=>' '));
		echo $this->Form->input('created',array('type'=>'hidden'));
		echo $this->Form->input('banner_tipo_id' );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<?php echo $this->element('uploadById',array('id'=>'BannerImage')); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?></li>
	</ul>
</div>