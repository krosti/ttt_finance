<?php echo $this->Session->read('user').'this'; ?>
<div class = "box_login">
	<?php 
	if ($facebook_user): ?>
		<div class = "SessionDetails">
			<span> <?php echo $this->Facebook->login(); ?> </span>
		</div>
	<?php	
	else:
		echo $this->Form->create('User', array('controller'=>'user','action' => "login/",'class'=>'loginform'));?>
		<span style="float: left;font-weight: bold;margin-right: 5px;padding-top: 4px;">Inicio</span>
		<div id="login_user">
			<?php echo $this->Form->input('username',array('id'=>'UserUsername','class'=>'input_login', 'id'=>'input_user','value' => '','label'=>''));?>
		</div>
		<div id="login_pass">
			<?php echo $this->Form->input('password',array('class'=>'input_login', 'id'=>'input_pass','value' => '','label'=>''));?>
		</div>
		<?php echo $this->Form->button('Log-in',array('id'=>'button_login'));?>
		<?php echo $this->Form->end(); 
	endif;	
	?>
</div>