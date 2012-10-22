<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class RemindersController extends AppController {
	public $helpers = array('Time');
	public $layout = 'none';
	#public $uses = array('Post','Comment','User','Tag');

	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('hayAlgoPendiente');
	}

	public function hayAlgoPendiente($userId){
		$this->layout = 'none';
		$resultado = $this->Reminder->find('all', array('conditions' => array('Reminder.user_id'=>$userId) ) );
		$this->set('resultado',$resultado);
	}

}