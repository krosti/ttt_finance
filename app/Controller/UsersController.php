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
	
	function activar($id){
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

	function registro() {
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				//$this->Session->setFlash(__('Muchas gracias por registrarte en TTT', true));
				unset($_POST);			
					/* envio del mail al dueño. Le avisa que un usuario se ha registrado*/
					$Info = $this->data;
					$user = $this->User->find('first',array('conditions'=>array('User.username'=>$this->data['User']['username'])));
					$mensaje = "Para activar tu cuenta haz click en el link de abajo.";
					$mensaje2 = "http://ttt.borealdev.com.ar/cake/users/activar/".$user['User']['id'];
					$sitioweb = "http://ttt.borealdev.com.ar";
					$InfoAux = array(
						"nombre" => $Info['User']['name'],
						"apellido" => $Info['User']['lastname'],
						"mensaje" => $mensaje,
						"mensaje2" => $mensaje2,
						"sitioweb" => $sitioweb,
						"username" => $Info['User']['username'],
						"password" => $Info['User']['password'],
						"email" => "andreslh90@gmail.com",
					);
					$this->Email->to = $Info['User'];//ACA LE MANDAMOS EL MAIL CON EL LINK DE CONFIRMACION
					$this->Email->subject = 'Aviso desde el Sitio Web | TTT.';
					$this->Email->from = "TTT";					
					$this->Email->template = 'aviso';				
					$this->Email->sendAs = 'html';
					$this->set('infos', $InfoAux);
					if($this->Email->send()){
						$this->Session->setFlash(__('La cuenta de usuario fue creada. Se te envi&oacute; un email para su activaci&oacute;n.', true));
					}else{
						$this->Session->setFlash(__('Hubo un problema, disculpe los inconvenientes.', true));											
					}
					/* fin envio del mail*/	
			}
		}
	}
	/** Login */
	function login()
	{
		if(!empty($this->data))
		{
			if ($this->User->check_username_exists($this->data['User']['username2']))
			{ 
			$this->Session->setFlash('Usuario inexistente','default',array('class'=>'flash_bad'));	
			}
			else
			{
				if ($this->User->check_user($this->data['User']))
					{ 					
					$this->User->id = $this->User->_user['User']['id'];
					$this->User->saveField('last_login',date("Y-m-d H:i:s"));
					// save User to Session and redirect
					$this->Session->write('User', $this->User->_user['User']);
					$this->Session->write('User.username', $this->data['User']['username2']);					
					}
					else
					{
					$this->Session->setFlash('Contrase&ntilde;a incorrecta','default',array('class'=>'flash_bad'));
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

	function admin_index() {
		$this->layout = 'backend';
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function admin_view($id = null) {
		$this->layout = 'backend';
		if (!$id) {
			$this->Session->setFlash(__('Usuario Invalido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
	
	function admin_edit($id = null) {
		/*$this->set('user', $this->User->read(null, $id));
		$this->layout = 'backend';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Usuario Invalido', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) {
			$activousuario = false;
			if ($this->data['User']['estado_anterior']!='2'){
				if ($this->data['User']['estado_id']=='2'){	$activousuario = true;}				
			}
			if ($this->User->save($this->data)){			
				if ($activousuario){
					
					$Info = $this->data;
					$mensaje = "Te comunicamos que tu cuenta de usuario ha sido activada.";
					$mensaje2 = "";
					$mensaje3 = "";
					$sitioweb = "http://ttt.borealdev.com.ar";
					$InfoAux = array(
						"nombre" => $Info['User']['name'],
						"apellido" => $Info['User']['lastname'],
						"mensaje" => $mensaje,
						"mensaje2" => $mensaje2,
						"mensaje3" => $mensaje3,
						"sitioweb" => $sitioweb,
						"username" => $Info['User']['username'],
						"password" => $Info['User']['password'],
						"emailmodde" => "info@jubahis.com.ar",
					);
					$this->Email->to = $Info['User']['email'];
					$this->Email->subject = 'Aviso desde el Sitio Web | TTT.';
					$this->Email->from = "Jubahi";					
					$this->Email->template = 'activacion';				
					$this->Email->sendAs = 'html';
					$this->set('infos', $InfoAux);
					if($this->Email->send()){
						$this->Session->setFlash(__('Se ha activado la cuenta del usuario y se le envió un mail de aviso.', true));
					}else 
						$this->Session->setFlash(__('Error! el mail de aviso no ha sido enviado.', true));											
					}
					
				}
				else
				{ 
				$this->Session->setFlash(__('Los cambios han sido guardados', true));
				}				
				$this->redirect(array('action' => 'index'));
			} else {				
				$this->Session->setFlash(__('Los cambios No han sido guardados. Por favor, intentelo otra vez.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}*/
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('ID de usuario invalido.', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('El usuario ha sido eliminado.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El usuario NO ha sido eliminado.', true));
		$this->redirect(array('action' => 'index'));
	}
}