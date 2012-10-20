<?php #debug( $this->Session->read('user')).'this'; ?>
<div class = "box_login">
	<?php 
	if (isset($facebook_user)): ?>
		<div class="SessionDetails">
			<span> 
			<?php 
				$tooltip = "<span class='tooltip'>".
								"<span></span>".
								$this->Html->image('logofooter.png')."<br><br>".
								"Usuario registrado en TTT".
							"</span>";

				$userLoggedId = (isset($fb_user_has_account) && $fb_user_has_account) ? "<a href='#' class='usrCheck'>".$tooltip."</a>" : "";
				echo '<span class="name">'.
						$facebook_user['name'] .
						$userLoggedId .
						' ('.$facebook_user['username'].')' .
					 '</span>'; 
				echo '<span class="email">'.$facebook_user['email'].'</span>'; 
				echo '<span class="picture">'.$this->Facebook->picture($facebook_user['id']).'</span>';
			?> 
			</span>
		</div>
	<?php elseif ($this->Session->read('User')): ?>
		<div class="SessionDetails">
			<span>
			<?php
			$userLoggedIn = $this->Session->read('User');
			$tooltip = "<span class='tooltip'>".
							"<span></span>".
							$this->Html->image('logofooter.png')."<br><br>".
							"Usuario registrado en TTT <br> Cuenta de Facebook no Asociada".
						"</span>";

			echo '<span class="name">'.
					$userLoggedIn['first_name'] .' '. $userLoggedIn['last_name'] .
					' ('."<a href='#' class=''>".$userLoggedIn['username'].$tooltip."</a>".')' .
				 '</span>'; 
			echo '<span class="email">'.$userLoggedIn['email'].'</span>'; 
			echo '<span class="picture">'.$this->Html->image('icons/user_logged_in.png').'</span>';
			?>
			</span>
		</div>
	<?php	
	else:
		echo $this->Form->create('User', array('controller'=>'user','action' => "login/",'class'=>'loginform'));?>
		<span style="float: left;font-weight: bold;margin-right: 5px;padding-top: 4px;">Inicio</span>
		<div id="">
			<?php echo $this->Form->input('username',array('id'=>'UserUsername','class'=>'input_login', 'id'=>'input_user','value' => '','label'=>''));?>
		</div>
		<div id="">
			<?php echo $this->Form->input('password',array('class'=>'input_login', 'id'=>'input_pass','value' => '','label'=>''));?>
		</div>
		<?php echo $this->Form->button('Log-in',array('id'=>'button_login'));?>
		<?php echo $this->Form->end(); 
	endif;	
	?>
</div>