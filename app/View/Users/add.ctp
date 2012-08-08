<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('name');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
		echo $this->Form->input('estado_id',array('type'=>'text', 'value'=>'1'));
		echo $this->Form->input('perfil_id',array('type'=>'text', 'value'=>'2'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
