<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array('Html','Session','Form','Facebook.Facebook');
	public $uses = array('User');
	#public $components = array('Facebook.Connect');
	/*public $components = array('Session',
            'Auth' => array(
                'authorizedActions' => array(
                    'index', 'view'
                ),
                'authorize' => 'Controller'
            ),
            'Facebook.Connect'
        );*/
	//Example AppController.php components settup with FacebookConnect
	public $components = array('Session',
        'Auth' => array(
            /*'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            ),*/
            'authorize' => array('Controller'),
            'allowedActions' => array('index','view','display','loginFb'),
            'authError' => "No posee autorizacion para acceder a esta seccion. Por favor inicie sesion o registrese gratis."
        ),
        'Facebook.Connect' => array('model' => 'User'),
        #"TwitterBootstrap.TwitterBootstrap"
        'DebugKit.Toolbar'
    );


	function beforeFilter() {

		//global url adress
		$this->set('site_url',Configure::read('Site.url'));

		//$this->Auth->allow('display'); 

		$userLoggedIn = $this->Connect->user();
		#debug($this->FB);

		if ($userLoggedIn):
			$this->set('facebook_user', $userLoggedIn );
			$this->Auth->allow('reporte');		
			$this->Auth->allow('situacionactual');
			$this->Auth->allow('nosotros');
			$this->Auth->allow('casosexito');
			$this->Auth->allow('eventos');
			$this->Auth->allow('divan');
			$this->Auth->allow('analisisttt');
			$this->Auth->allow('opinion');
			$this->Auth->allow('usuario_creado');

			$result = $this->User->find('first',array('conditions'=>array('User.facebook_id'=>$userLoggedIn['id'])));
			
			$this->set('fb_user_has_account', $result );
			#$this->Session->setFlash('Usuario Facebook Conectado !');
		elseif ($this->Session->read('User')):
			$this->Auth->allow('reporte');		
			$this->Auth->allow('situacionactual');
			$this->Auth->allow('nosotros');
			$this->Auth->allow('casosexito');
			$this->Auth->allow('eventos');
			$this->Auth->allow('divan');
			$this->Auth->allow('analisisttt');
			$this->Auth->allow('opinion');
			$this->Auth->allow('usuario_creado');
			
				
		endif;
	}

	function isAuthorized(){
		#return ($this->Connect->user('id'));
		return true;
	}

	
}