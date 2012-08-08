<?php
App::uses('AppController', 'Controller');
/**
 * Tipos Controller
 *
 * @property Tipo $Tipo
 */
class UsersController extends AppController {
	var $name = 'Users';
	var $helpers = array('Html', 'Form','Session');
	var $uses = array('User');
	var $components = array('Email');
	
	function a987156428774($id){
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

	function sesion_desdefb($uid = null)
	{
		$user = $this->User->find('first',array('conditions'=>array('User.fbid'=>$uid)));
		$this->Session->write('User', $user['User']);
		$this->Session->write('User.username', $user['User']['username']);	
		$this->Session->write('User.fbid', $user['User']['fbid']);	
		$this->redirect("/");	
	}

	function addfb(){}

	function add() {
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				//$this->Session->setFlash(__('Muchas gracias por registrarte en TTT', true));
				unset($_POST);			
					/* envio del mail al due�o. Le avisa que un usuario se ha registrado*/
					$Info = $this->data;
					$user = $this->User->find('first',array('conditions'=>array('User.username'=>$this->data['User']['username'])));
					$mensaje = "Para activar tu cuenta haz click en el link de abajo.";
					$mensaje2 = "http://ttt.borealdev.com.ar/users/a987156428774/".$user['User']['id'];
					$sitioweb = "http://ttt.borealdev.com.ar";
					$InfoAux = array(
						"nombre" => $Info['User']['name'],
						"apellido" => $Info['User']['lastname'],
						"mensaje" => $mensaje,
						"mensaje2" => $mensaje2,
						"sitioweb" => $sitioweb,
						"username" => $Info['User']['username'],
						"password" => $Info['User']['password'],
						"email" => $Info['User']['email'],
					);
					$this->Email->to = $Info['User']['email'];//ACA LE MANDAMOS EL MAIL CON EL LINK DE CONFIRMACION
					$this->Email->subject = 'Aviso desde el Sitio Web | TTT.';
					$this->Email->from = "contacto@ttt.com.ar";					
					$this->Email->template = 'aviso';				
					$this->Email->sendAs = 'html';
					$this->set('infos', $InfoAux);
					if($this->Email->send()){
						$this->Session->setFlash(__('La cuenta de usuario fue creada. Se te envi&oacute; un email para su activaci&oacute;n.', true));
						$this->redirect("/");
					}else{
						$this->Session->setFlash(__('Hubo un problema, disculpe los inconvenientes.', true));		
						$this->redirect("/users/add");									
					}
					/* fin envio del mail*/	
			}
		}
	}
	function login()
	{
		if(!empty($this->data))
		{
			if ($this->User->check_username_exists($this->data['User']['username']))
			{ 
			$this->Session->setFlash('Usuario inexistente','default',array('class'=>'flash_bad'));	
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
					$this->Session->setFlash('Usuario Inactivo','default',array('class'=>'flash_bad'));
				}	
			}			
		}
		$this->redirect("/");			
	}
	/** Logout */
	function logout() {
		$this->Session->delete('User');
		$this->redirect("/"); break;
	}	
}