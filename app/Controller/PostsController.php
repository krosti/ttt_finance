<?php
App::uses('AppController', 'Controller');
App::uses('FB', 'Facebook.Lib');

/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {
	public $helpers = array('Time');
	public $uses = array('Post','User','Comment','Tag');
	public $components = array('Email');

	public function beforeFilter() {
	    parent::beforeFilter();
	    
	    if($this->Session->read('User')){
	    	//auth user logged in
	    	#general user logged in actions
	    	$this->Auth->allow(array('reporte','search','situacionactual','analisisttt','opinion','isUploadedFile'));
	    	#debug($this->Session->read('User'));
	    	if($this->Session->read('User') && $this->Session->read('User.perfil_id') == 100){
		    	#admin options
		    	$this->Auth->allow(array('index','add','edit'));
	    	}
	    }else{
	    	//facebook user
    		if ($this->Connect->user()){
    			$this->Auth->allow('reporte','search','situacionactual','analisisttt','opinion','isUploadedFile');
    			$usrfb = $this->Connect->user();
    			$result = $this->User->find('all',array('conditions'=>array('User.facebook_id'=>$usrfb['id'])));
				$hasPermissions = false;
				if (count($result) == 1) {
					#un resultado
					if ($result[0]['User']['perfil_id'] == 100) { $hasPermissions = true; }
				}else{
					#muchos resultados
					foreach ($result as $user) {
						if ($user['User']['perfil_id'] == 100) { $hasPermissions = true; }
					}	
				}
				if ($hasPermissions):
					$this->Auth->allow(array('index','add','edit'));
					#'es FB y tiene permisos admin';
				else:
					$this->Auth->deny(array('index','add','edit'));
					#general user logged in actions
	    			#$this->Auth->allow('reporte','search');
					$thisActionAllowed = in_array($this->Auth->request->params['action'], $this->Auth->allowedActions);
					if (!$thisActionAllowed) {
						$this->Session->setFlash(__('Solo para admins.'));
						$this->redirect('/');	
					}
					
					#'es FB y NO tiene permisos';
				endif;
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
				/*
				 * leyendas:
				 *
				 */
				$mensaje_nuevo_post = 'Nuevo Post';
				$dominio_ttt = 'tttonline.com.ar';
				unset($_POST);

				// function that post automatically on
				// facebook $id_facebook the next:
				$id_facebook = '100000913914141';  //=> http://www.facebook.com/tritangotraders
				//$id_facebook = '1276932361'; //=> fernando.cea

				$post_url = '/'.$id_facebook.'/feed';

				$msg_body = array(
		        	'message' 		=> $mensaje_nuevo_post.' | '.$this->request->data['Post']['titulo'],
		        	'name' 			=> 'TriTangoTraders Online',
					'link' 			=> 'http://'.$dominio_ttt.'/posts/reporte/' . $this->Post->id,
					'description' 	=> 'Review: ' . $this->request->data['Post']['descripcion_fb'],
		        );
				$Facebook = new FB();
    			$Facebook->api($post_url, 'post', $msg_body);

    			// function that sent massive mails for the accepted list
    			/*$inboxes = $this->User->find('all',array(
													'conditions'	=>
														array('User.estado_id != 0'),
												 	'fields' 		=>
												 		array('User.email')
												) );
    			$in = array();
    			foreach ($inboxes as $inbox) {
    				array_push($in, $inbox['User']['email']);
    			}

				$email_config = array(
					'host' 			=> 'smtp.mandrillapp.com',
					'port'			=>'587', 
					'username'		=>'ceafernando@gmail.com',
					'password'		=>'093af434-036d-4dd7-aa10-1b011ef65d00'
				);

				$mensaje = $this->request->data['Post']['titulo'];
				$mensaje2 = $this->request->data['Post']['descripcion_fb'];
				$sitioweb = 'http://'.$dominio_ttt;

				$InfoAux = array(
					'link' 		=> 'http://'.$dominio_ttt.'/posts/reporte/' . $this->Post->id,
					'mensaje' 	=> $mensaje,	
					'mensaje2' 	=> $mensaje2,
					'sitioweb' 	=> $sitioweb,
					'imagen' 	=> $this->request->data['Post']['titulo']
				);

				$emails = implode(",",$in);
				$this->Email->to 		= $emails;
				$this->Email->subject 	= $mensaje_nuevo_post.' | TTTOnline.com.ar';
				$this->Email->from 		= 'noreplytttonline'.'@'.$dominio_ttt;					
				$this->Email->template 	= 'nuevopost';				
				$this->Email->sendAs 	= 'html';

				$this->set('infos', $InfoAux);
				#$this->Email->smtpOptions = $email_config;
				if($this->Email->send()){
					$this->Session->setFlash(__('La cuenta de usuario fue creada. Se le envi&oacute; un email para su activaci&oacute;n.', true));
					$this->redirect("/");
				}else{
					$this->Session->setFlash(__('Hubo un problema, vuelva a intentar en unos minutos. Muchas Gracias.', true));		
					$this->redirect("/users/add");									
				}*/

				$this->Session->setFlash(__('El post fue guardado - Muchas Gracias'));
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
				$this->Session->setFlash(__('Los cambios se guardaron correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guardar. Intente en unos minutos.'));
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

		$post = $this->Post->read(null, $id);
		
		$i = 0;
		foreach ($post['Comment'] as $comment) {
			array_push($post['Comment'][$i++], $this->User->findById($comment['user_id']) );
		}
		$this->set('post', $post);
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
	        		ROOT.DS.APP_DIR.'/webroot/files/'.strval(date('dmY-hms').'_'.$val['form']['images']['name'][0])
	        		)
	        ){
	        	return strval(date('dmY-hms').'_'.$val['form']['images']['name'][0]);
	        }
	    }
	    return false;
	}

}
