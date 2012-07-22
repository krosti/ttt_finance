<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class AdministratorController extends AppController {

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html','Js');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Article');

	public $layout = "backend";

/**
 * Displays a view
 *
 * @param mixed What page to display
 */
	public function display() {
		
	}

	public function posts() {
		/*$orders = $this->Article->find('all');
    	$this->set('articles', $orders);*/
	}

	public function elements() {

	}

}
