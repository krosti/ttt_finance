<div class="banners form">
<?php echo $this->Form->create('Banner'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Banner'); ?></legend>
	<?php
		echo $this->Form->input('titulo');
		echo $this->Form->input('image');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?></li>
	</ul>
</div>
