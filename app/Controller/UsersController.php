<?php
App::uses('AppController', 'Controller');
/**
 * Tipos Controller
 *
 * @property Tipo $Tipo
 */
class UsersController extends AppController {
	public $name = 'Users';
	public $helpers = array('Html', 'Form','Session','Facebook.Facebook');
	public $uses = array('User','Application');
	public $components = array('Email',
		#'Auth' => array( 'authorizedActions' => array('account','add') ) 
		);

	public function beforeFilter(){
		$this->Auth->allow(array('add','logout'));

		if ($this->Connect->user()):
			#$this->Connect->intialize;
			$this->set('facebook_user', $this->Connect->user() );
		endif;

		$this->set('site_url',Configure::read('Site.url'));
	}
	
	public function a987156428774($id){
		$this->User->read(null, $id);
		$this->User->set('estado_id', '2');
		if ($this->User->save($this->data))
		{ 
			$this->Session->setFlash(__('Cuenta activada', true));
		}		
		else
		{
			$this->Session->setFlash(__('Error', true));
		}		
		$this->redirect(array('controller'=>'pages', 'action' => 'home'));		
	}

	public function loginfb(){
		/*$app_id   = "377583548967953";
		$app_secret = "aa995450f1f9fb14f0405ca9b71d1922";
		$site_url = "http://localhost/ttt_finance";
		 
		try{
		  include_once "fb/facebook.php";
		}catch(Exception $e){
		  error_log($e);
		}
		$facebook = new Facebook(array(
		  'appId'   => $app_id,
		  'secret'  => $app_secret,
		  ));
		 
		$user = $facebook->getUser();
		debug($user);
		if($user){
		  try{
		    $user_profile = $facebook->api('/me');
		  }catch(FacebookApiException $e){
		    error_log($e);
		    $user = NULL;
		  }
		}
		if($user){
		  //session_destroy();
		  $logoutUrl = $facebook->getLogoutUrl(/*array(
		  	'redirect_uri'  => 'http://ttt.borealdev.com.ar/',
		  ));
		  echo "<script>top.location.href = '$logoutUrl'; </script>";
		  $this->set('logoutUrl',$logoutUrl);
		}else{
		  $loginUrl = $facebook->getLoginUrl(array(
		    //'scope'   => 'read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
		    //'redirect_uri'  => $site_url
		    ));
		  echo "<script>top.location.href = '$loginUrl'; </script>";  
		  $this->set('loginUrl',$loginUrl);
		}
		*/



	}

	public function add() {
		//$this->layout = 'none';
		//if (!empty($this->data)) {

		if($user = $this->Connect->registrationData()){
			$userData['User'] = $user['registration'];
			$userData['User']['location'] = $userData['User']['location']['name'];
			//$userData['User']['username'] = $userData['User']['email'];
			//debug($userData);
			

			if ($this->User->save($userData)) {
				//$this->Session->setFlash(__('Muchas gracias por registrarte en TTT', true));
				unset($_POST);			
					/* envio del mail al dueño. Le avisa que un usuario se ha registrado*/
					$Info = $user;
					//echo $user['user_id']	;
					$user = $this->User->find('first',array('conditions'=>array('User.email'=>$user['registration']['email'])));
					$mensaje = "Para activar tu cuenta haz click en el link de abajo.";
					//$mensaje2 = "http://ttt.borealdev.com.ar/users/a987156428774/".$user['0']['user_id'];
					$sitioweb = "http://ttt.borealdev.com.ar";
					$InfoAux = array(
						"nombre" => $Info['registration']['first_name'],
						"apellido" => $Info['registration']['last_name'],
						"mensaje" => $mensaje,
						//"mensaje2" => $mensaje2,
						"sitioweb" => $sitioweb,
						"username" => $Info['registration']['email'],
						"password" => $Info['registration']['password'],
						"email" => $Info['registration']['email'],
					);

					//Envio de e-mail para la confirmaciòn
					$this->Email->to = $Info['registration']['email'];
					$this->Email->subject = 'Aviso desde el Sitio Web | TTTOnline.com';
					$this->Email->from = "contacto@ttt.com.ar";					
					$this->Email->template = 'aviso';				
					$this->Email->sendAs = 'html';
					$this->set('infos', $InfoAux);
					if($this->Email->send()){
						$this->Session->setFlash(__('La cuenta de usuario fue creada. Se le envi&oacute; un email para su activaci&oacute;n.', true));
						$this->redirect("/");
					}else{
						$this->Session->setFlash(__('Hubo un problema, vuelva a intentar en unos minutos. Muchas Gracias.', true));		
						$this->redirect("/users/add");									
					}
					/* fin envio del mail*/
					$this->Session->setFlash('Usuario creado correctamente!');
					$this->redirect('/');
			}
		}elseif (!empty($this->data)) {
			//registraciòn sin facebook
			
			if ($this->User->save($this->data)):
				$this->Session->setFlash(__('La cuenta de usuario '.$this->data['User']['username'].' fue creada. Se le envi&oacute; un email para su activaci&oacute;n.', true));
				$this->set('user',$this->data);
				#$this->set('usuario_creado',true);
				$this->redirect(array(
						'controller'=>'pages',
						'action'=>'display'
					));
			endif;
		}
	}
	public function login(){
		if(!empty($this->data))
		{
			if ($this->User->check_username_exists($this->data['User']['username']))
			{ 
			$this->Session->setFlash('El usuario no existe','default',array('class'=>'flash_bad'));	
			}
			else
			{
				$num = $this->User->check_user($this->data['User']);
				if ($num == 0)
				{ 					
					$this->User->id = $this->User->_user['User']['id'];
					$this->User->saveField('last_login',date("Y-m-d H:i:s"));
					// save User to Session and redirect
					$this->Session->write('User', $this->User->_user['User']);
					$this->Session->write('User.username', $this->data['User']['username']);					
				}
				else if ($num == 1)
				{
					$this->Session->setFlash('Error en el envio','default',array('class'=>'flash_bad'));
				}	
				else if ($num == 2)
				{
					$this->Session->setFlash('Usuario inexistente','default',array('class'=>'flash_bad'));
				}		
				else if ($num == 3)
				{
					$this->Session->setFlash('Password incorrecto','default',array('class'=>'flash_bad'));
				}		
				else if ($num == 4)
				{
					$this->Session->setFlash('Usuario Inactivo, por favor active su cuenta. <br> Si no cuenta con un link de activacion <br>por favor contacte a soporte@tttonline.com.ar','default',array('class'=>'flash_bad'));
				}	
			}			
		}
		$this->redirect("/");
		#if($this->Auth->login()
		#debug($this->Auth->login());
		#$this->redirect("/");
	}

	function logout() {
		$this->Auth->logout();

		$this->Session->destroy();
		$this->redirect('/');
	}

	public function myAccount(){
		
	}
}