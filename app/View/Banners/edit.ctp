<div class="banners form">
<?php echo $this->Form->create('Banner'); ?>
	<fieldset>
		<legend><?php echo __('Editar Banner'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titulo');
		echo $this->Form->input('url' );
		#echo $this->Form->input('image',array('type'=>'hidden') );
		echo $this->Form->input('created');
		echo '<br>'.$this->Form->input('banner_tipo_id' );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Banner.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Banner.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?></li>
	</ul>
</div>
