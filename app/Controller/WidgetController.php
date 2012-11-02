<?php
class WidgetController extends AppController {
    public $helpers = array('Js','Html','AjaxMultiUpload.Upload');
    public $components = array('RequestHandler','AjaxMultiUpload.Upload');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('upload','delete','indices','graficador');
    }

    // Rest of controller
    public function indices($setVal = null) {
        $this->autoRender = false;

        $this->set('setVal',$setVal);
        // render an element
        $this->viewPath = 'Elements';
        $this->render('indices_box');
    }

    public function graficador($id = null) {
        $this->autoRender = false;

        $this->set('id',$id);
        // render an element
        $this->viewPath = 'Elements';
        $this->render('graficador');
    }

    public function fileUploader($id = null) {
        $this->autoRender = false;

        $this->set('id',$id);
        // render an element
        $this->viewPath = 'Elements';
        $this->render('fileUploader');
    }

    public function upload(){
        foreach ($_FILES["images"]["error"] as $key => $error) {  
            if ($error == UPLOAD_ERR_OK) {  
                $name = $_FILES["images"]["name"][$key];  
                echo (move_uploaded_file( 
                        $_FILES["images"]["tmp_name"][$key], 
                        ROOT . DS . APP_DIR .Router::url("/")."files/" . $_FILES['images']['name'][$key]
                        ) 
                    ) 
                    ? "<h2>Successfully Uploaded Images</h2>" 
                    : '';
            }  
        }  
        $this->autoRender = false;
        $this->autoLayout = false; 
        // render an element
        $this->viewPath = 'Elements';
        $this->render('fileUploader');
    }

}