<?php echo $this->Html->css(array('users')); ?>
<div class="users form">
	<?php 
		if(!isset($facebook_user)):
			echo $this->Form->create('User',array('action'=>'add' ));?>
			<fieldset>
				<legend><?php echo $this->Html->image('logofooter.png'); ?></legend>
				<?php
					echo $this->Form->input('username',array('label'=>'Usuario') );
					echo $this->Form->input('password',array('label'=>'Contrase&ntilde;a') );
					echo $this->Form->input('passwordrep',array('label'=>'Repetir Contrase&ntilde;a','type'=>'password') );
					#$this->Form->input('name',array('label'=>'Nombre') );
					echo $this->Form->input('first_name',array('label'=>'Nombre') );
					echo $this->Form->input('last_name',array('label'=>'Apellido') );
					echo $this->Form->input('email',array('label'=>'E-Mail') );
					$this->Form->input('estado_id',array('type'=>'text', 'value'=>'1'));
					$this->Form->input('perfil_id',array('type'=>'text', 'value'=>'1'));
				?>
			</fieldset>
			<?php echo $this->Form->end(__('Enviar'));?>
	<?php else: ?>
	<?php echo $this->Facebook->registration(array(
	    'fields' => '[
	    	{"name":"name"},
	    	{"name":"username","description":"Nombre de Usuario","type":"text"},
	    	{"name":"first_name"},
	    	{"name":"last_name"},
	    	{"name":"email"},
	    	{"name":"gender"},
	    	{"name":"location"},
	    	{"name":"birthday"},
	    	{"name":"password"}
	    	
	    	]',
	    //{"name":"perfil_id","description":"Tipo de usuario","type":"select","options":{"0":"Full Access"},"default":"0"} >> custom_fields
	    
	    'width' => 620,
	    'redirect-uri' => $site_url.'/users/add/'
	)); ?>
	<?php endif; ?>
</div>

<div class="disclaimer">
	Estos datos ser&aacute;n guardados en nuestra base de datos. Usted puede elminar la cuenta cuando lo desee. TTT
	Consultas: issues@tttonline.com.ar
</div>