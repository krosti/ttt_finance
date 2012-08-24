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
            'authorize' => 'Controller',
            'authorizedActions' => array('index','view')
        ),
        'Facebook.Connect' => array('model' => 'User'),
        'DebugKit.Toolbar'
    );


	function beforeFilter() {
		/*$app_id   = "377583548967953";
		$app_secret = "aa995450f1f9fb14f0405ca9b71d1922";
		$site_url = "http://ttt.borealdev.com.ar/";
		 
		try{
		  include_once "fb/facebook.php";
		}catch(Exception $e){
		  error_log($e);
		}
		
		$facebook = new Facebook(array(
		  'appId'   => $app_id,
		  'secret'  => $app_secret,
		  ));
		 
		$uid = $facebook->getUser();
		debug($uid);*/
		
		#$uid = $this->Connect->user();
		/*if ($uid)
		{
			
			$user = $this->User->find('first',array('conditions'=>array('User.facebook_id'=>$uid['id'])));
			if ($user)
			{
				$this->Session->write('User', $user['User']);
				$this->Session->write('User.username', $user['User']['username']);	
				$this->Session->write('User.facebook_id', $user['User']['facebook_id']);
			}
			else {
				$uid['ttt_status'] = 'false';
				//esta logeado con facebook pero no registrado en TTT
			}

		}*/
		
		#$this->set('test',$this->Auth->user());
		#$this->set('facebook_user', $this->Connect->user() );

		//global url adress
		$this->set('site_url','http://localhost/ttt_finance');

		$this->Auth->allow( 'display' ); 

		if ($this->Connect->user()):
			#$this->Connect->intialize;
			$this->set('facebook_user', $this->Connect->user() );
		endif;
		
		#debug($this->Connect);
	}

	function isAuthorized(){
		#return ($this->Connect->user('id'));
		return true;
	}

	
}