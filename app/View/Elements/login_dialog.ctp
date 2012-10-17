<?php echo $this->Html->css(array('login_dialog')); ?>

<div class="login_dialog">
	
	<?php echo $this->Html->image('warning_64.png'); ?>
	<h2>Para poder acceder a nuestros articulos por favor tiene que estar logeado/registrado. Disculpe las molestias</h2>
	
	<div class="divisor"></div>
	<h3>TTT <?php echo $this->Html->image('user.png',array('style'=>'')); ?>Login</h3>
	<?php echo $this->Form->create('User', array('controller'=>'user','action' => "login/",'class'=>'loginform'));?>
	<span style="float: left;font-weight: bold;margin-right: 5px;padding-top: 4px;">Inicio</span>
	<div id="">
		<?php echo $this->Form->input('username',array(
			'class'=>'input_login', 
			'id'=>'input_login_dialog',
			'placeholder'=>'Usuario',
			'value' => '',
			'label'=>''
			));?>
	</div>
	<div id="">
		<?php echo $this->Form->input('password',array(
			'class'=>'input_login', 
			'id'=>'input_pass_dialog',
			'placeholder'=>'Contraseña',
			'value' => '',
			'label'=>''
			));?>
	</div>
	<?php echo $this->Form->button('Log-in',array('id'=>'button_login_dialog'));?>
	<?php echo $this->Form->end(); ?>

	<div class="divisor"></div>
	<h3>Facebook <?php echo $this->Html->image('logofb.png'); ?> Login</h3>
	<?php echo '<div class="fb">'.
			$this->Facebook->login(array(
				'perms' => 'email,publish_stream',
				'custom' => true,
				'redirect' => '/',
				'label'=>'LogIn'
				))
			.'</div>'; ?>
</div>