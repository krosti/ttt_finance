<?php
App::uses('AppController', 'Controller');
/**
 * TagsPosts Controller
 *
 * @property TagsPost $TagsPost
 */
class TagsPostsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TagsPost->recursive = 0;
		$this->set('tagsPosts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TagsPost->id = $id;
		if (!$this->TagsPost->exists()) {
			throw new NotFoundException(__('Invalid tags post'));
		}
		$this->set('tagsPost', $this->TagsPost->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TagsPost->create();
			if ($this->TagsPost->save($this->request->data)) {
				$this->Session->setFlash(__('The tags post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tags post could not be saved. Please, try again.'));
			}
		}
		$tags = $this->TagsPost->Tag->find('list');
		$posts = $this->TagsPost->Post->find('list');
		$this->set(compact('tags', 'posts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TagsPost->id = $id;
		if (!$this->TagsPost->exists()) {
			throw new NotFoundException(__('Invalid tags post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TagsPost->save($this->request->data)) {
				$this->Session->setFlash(__('The tags post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tags post could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TagsPost->read(null, $id);
		}
		$tags = $this->TagsPost->Tag->find('list');
		$posts = $this->TagsPost->Post->find('list');
		$this->set(compact('tags', 'posts'));
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
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->TagsPost->id = $id;
		if (!$this->TagsPost->exists()) {
			throw new NotFoundException(__('Invalid tags post'));
		}
		if ($this->TagsPost->delete()) {
			$this->Session->setFlash(__('Tags post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tags post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
