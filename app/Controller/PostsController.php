<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {
	public $helpers = array('Time'/*,'AjaxMultiUpload.Upload'*/);
	public $uses = array('Post','Comment','User','Tag');
	#public $components = array('AjaxMultiUpload.Upload');

	public function beforeFilter() {
	    parent::beforeFilter();
	    
	    if($this->Session->read('User')){
	    	
	    	$this->Auth->allow('reporte','search');
	    	
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
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'backend';
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Guardado - Muchas Gracias'));
				$this->redirect('/');
			} else {
				$this->Session->setFlash(__('No se pudo guardar - Intente mas tarde - Muchas Gracias'));
			}
		}
		$tipos = $this->Post->Tipo->find('list', array( 'fields' => array('Tipo.titulo') ));
		$this->set(compact('tipos'));
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
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Post->read(null, $id);
		}
		$tipos = $this->Post->Tipo->find('list', array( 'fields' => array('Tipo.titulo') ));
		$this->set(compact('tipos'));
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
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function situacionactual() {
		$this->set('posts', $this->Post->find('all', array('conditions' => array('Post.tipo_id' => '2'),'order'=>'Post.created DESC' ) ) );
	}

	public function analisisttt() {
		$this->set('posts', $this->Post->find('all', array('conditions' => array('Post.tipo_id' => '1'),'order'=>'Post.created DESC' ) ) );
	}

	public function opinion() {
		$this->set('posts', $this->Post->find('all', array('conditions' => array('Post.tipo_id' => '3'),'order'=>'Post.created DESC' ) ) );
	}

	public function reporte($id = null){
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Reporte no encontrado'));
		}
		//$this->Post->recursive = 4;
		$post = $this->Post->read(null, $id);
		#echo "<pre>";
		#print_r($this->Post);
		#echo "</pre>";
		//debug($post);
		$this->set('post', $post);
		if(isset($post['Comment']) && isset($post['Comment'][0])):
			$this->set('users', $this->User->findById($post['Comment'][0]['user_id']));
		endif;
		//$this->set('user', $this->Post->User->find('all'));
	}

	public function search($value = null){
		if (isset($value) && $value) {

			$result = $this->Post->find('all',array(
					'conditions'=>array(
						'OR'=>array(
							'Post.titulo LIKE'=>'%'.$value.'%',
							'Post.descripcion LIKE'=>'%'.$value.'%'
							)
						)
					) 
				);

			$this->set('results', $result);
		}else{
			$this->Session->setFlash(__('Escriba una palabra a buscar'));
			//$this->redirect('/');
		}
	}

	public function isUploadedFile() {
		$this->autoRender = false;
        $this->autoLayout = false; 
        $this->viewPath = 'Elements';
        
	    $val = $this->request->params;
	    #debug($val);
	    if ((isset($val['form']['images']['error']) && $val['form']['images']['error'] == 0) ||
	        (!empty( $val['form']['images']['tmp_name']) && $val['form']['images']['tmp_name'] != 'none')
	    ) {
	        if (move_uploaded_file(
	        	strval(
	        		$val['form']['images']['tmp_name'][0]),
	        		ROOT.DS.APP_DIR.'/webroot/files/'.$val['form']['images']['name'][0]
	        		)
	        ){
	        	return strval($val['form']['images']['name'][0]);
	        }
	    }
	    return false;
	}

}
