<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'name';	
	var $validate = array(
		'username'=>array(
			'usernameRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Por favor, introduce el nombre de usuario.',
				'last' => true
			),
			'minimo' => array(
				'rule'=>array('minLength', 3), 
				'message'=>'Se requiere un nombre de usuario de minimo 3 letras',
				'last'=>true
			),
			'check_username_exists'=>array(
				'rule'=>'check_username_exists',
				'message'=>'Nombre de usuario existente.',
				'on'=>'create'
			),		
		),
		'name' => array(
			'rule'=>array('minLength', 3), 
			'message'=>'Se requiere un nombre de minimo 3 letras'
		),
		'lastname' => array(
			'rule'=>array('minLength', 3), 
			'message'=>'Se requiere un apellido de minimo 3 letras'
		),
		'password' => array(	
					'rule' => array('between', 5, 15),
					'message' => 'Debe tener un largo entre 5 y 15 caracteres.'
		),
		'passwordrep' => array(
					'rule' => 'check_password_equals',
					'message' => 'Las contrasenas no coinciden.'
		),	
		'email' => array(
			'email2' => array(		
				'rule'=>'notEmpty', 
				'message'=>'Se requiere un email.',
				'last' => true
			),
			'email3' => array(			
				'rule' => array('email', true),
				'message' => 'Por favor indique una direccion de correo electronico valida.'
			), 	
		),
		'emailrep' => array(
			'emailrep2' => array(		
				'rule'=>'notEmpty', 
				'message'=>'Se requiere un email',
				'last' => true
			),
			'emailrep3' => array(			
				'rule' => array('email', true),
				'message' => 'Por favor indique una direccion de correo electronico valida.'
			),
			'emailrep4' => array(			
				'rule' => 'check_emails_equals',
				'message' => 'Los emails no coinciden!!!'
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	/**
	 * Private User
	 * @var array
	 */
	var $_user = array();	
	/**
	 * Check a User is valid
	 * @param array $check
	 * @return bool
	 */
	function check_user($check) {
		if(!empty($check['username']) && !empty($check['password'])) {
			// get User by username
			$user = $this->find('first',array('conditions'=>array('User.username'=>$check['username'])));			
			// controla si existe el usuario
			if(empty($user)) {return 2;}
			// compare passwords
			$salt = Configure::read('Security.salt');
			if($user['User']['password'] != ($check['password'])) {return 3;}
			// controla que el usuario este activo
			if($user['User']['estado_id'] != 2) {return 4;}			
			// save User
			$this->_user = $user;
		}
		else
		{
			return 1;
		}
	return 0;
	}	
	/**
	 * Check a username exists in the database
	 * @param array $check
	 * @return bool
	 */
	function check_username_exists($check) {
		// get User by username
		if(!empty($check)) {
			$user = $this->find('first',array('conditions'=>array('User.username'=>$check)));
			// invalid User
			if(!empty($user)) {	return FALSE;}
		}		
	return TRUE;
	}	
	/**
	 * BeforeSave Callback
	 */
	function beforeSave() {
		// hash Password
		if(!empty($this->data['User']['password'])) {
			$salt = Configure::read('Security.salt');
			$this->data['User']['password'] = ($this->data['User']['password']);
		} else {
			// remove Password to prevent overwriting empty value
			unset($this->data['User']['password']);
		}		
	return TRUE;
	}
	/**
	 * Chequea que el password y su repeticion sean iguales
	 */
	function check_password_equals() {		
		if(!empty($this->data['User']['password'])) {
			if(!empty($this->data['User']['passwordrep'])) {
				if ($_POST['data']['User']['password'] != $_POST['data']['User']['passwordrep']){ return FALSE;};
			}
		} 	
		return TRUE;
	}
	/**
	 * Chequea que el email y su repeticion sean iguales
	 */
	function check_emails_equals() {		
		if(!empty($this->data['User']['email'])) {
			if(!empty($this->data['User']['emailrep'])) {
				if ($_POST['data']['User']['email'] != $_POST['data']['User']['emailrep']){return FALSE;};
			}
		} 	
	return TRUE;
	}	
		
}