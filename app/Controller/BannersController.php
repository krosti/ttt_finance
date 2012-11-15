<?php
App::uses('AppController', 'Controller');
/**
 * Banners Controller
 *
 * @property Banner $Banner
 */
class BannersController extends AppController {
	public function beforeFilter() {
	    parent::beforeFilter();
	    
	    if($this->Session->read('User')){
	    	
	    	//$this->Auth->allow('reporte','search');
	    	
	    	if($this->Session->read('User.perfil_id') == 100){
		    	//admin options
		    	$this->Auth->allow('index','add','isUploadedFile','edit');
	    	}
	    }
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'backend';
		$this->Banner->recursive = 0;
		$this->set('banners', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'backend';
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$this->set('banner', $this->Banner->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'backend';
		if ($this->request->is('post')) {
			$this->Banner->create();
			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash(__('The banner has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
			}
		}
		$bannerTipos = $this->Banner->BannerTipo->find('list');
		$this->set(compact('bannerTipos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'backend';
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash(__('The banner has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				//debug($this->request->data);
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Banner->read(null, $id);
		}
		$bannerTipos = $this->Banner->BannerTipo->find('list');
		$this->set(compact('bannerTipos'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->layout = 'backend';
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		if ($this->Banner->delete()) {
			$this->Session->setFlash(__('Banner deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Banner was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Banner->recursive = 0;
		$this->set('banners', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$this->set('banner', $this->Banner->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Banner->create();
			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash(__('The banner has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
			}
		}
		$bannerTipos = $this->Banner->BannerTipo->find('list');
		$this->set(compact('bannerTipos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash(__('The banner has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Banner->read(null, $id);
		}
		$bannerTipos = $this->Banner->BannerTipo->find('list');
		$this->set(compact('bannerTipos'));
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		if ($this->Banner->delete()) {
			$this->Session->setFlash(__('Banner deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Banner was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
