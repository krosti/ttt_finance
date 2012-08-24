<div class="users form">
<?php 
	if(!isset($facebook_user)):
	echo $this->Form->create('User');?>
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
<?php else: ?>
<?php echo $this->Facebook->registration(array(
    'fields' => '[
    	{"name":"name"},
    	{"name":"first_name"},
    	{"name":"last_name"},
    	{"name":"email"},
    	{"name":"gender"},
    	{"name":"location"},
    	{"name":"birthday"},
    	{"name":"password"},
    	{"name":"captcha"}
    	]',
    //{"name":"perfil_id","description":"Tipo de usuario","type":"select","options":{"0":"Full Access"},"default":"0"} >> custom_fields
    'width' => 960,
    'redirect-uri' => $site_url.'/users/add/'
)); ?>
<?php endif; ?>
</div>