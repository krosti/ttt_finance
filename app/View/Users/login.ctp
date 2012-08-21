<div class = "box_login">
	<?php if ($this->Session->read('User')):	?>					
		<div class = "SessionDetails">
			<span>Bienvenido <?php echo $this->Session->read('User.username');?></span>
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
	endif;	?>

	<?php if ($cookie) { 
//cookie is set, user is logged in
$user = json_decode(file_get_contents('https://graph.facebook.com/'.$cookie['uid'])); 
//Display the facebook user ID, name, gender and Facebook URL in the web browser 
echo '<br />'; 
echo 'Your Facebook ID: '.$user->{'id'}; 
echo '<br />'; 
echo 'Your name: '.$user->{'name'}; 
echo '<br />'; 
echo 'Your gender: '.$user->{'gender'}; 
echo '<br />'; 
echo 'Your Facebook URL: '.$user->{'link'}; 
echo '<br />'; 
echo '<fb:login-button autologoutlink="true"></fb:login-button>'; 
} 
else 
{ 
//user is not logged in, display the Facebook login button 
echo '<h2>Facebook Application Test page</h2>'; 
echo '<br />'; 
echo 'This is the most basic Facebook application PHP source code that will grab the user Facebook full name, gender and Facebook URL.'; 
echo '<br />Then displays those information in the web browser once the user has successfully logged in'; 
echo '<br /><br />'; 
echo '<fb:login-button autologoutlink="true"></fb:login-button>'; 
} 
?>
</div>