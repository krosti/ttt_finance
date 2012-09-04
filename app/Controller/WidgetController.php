<?php
class WidgetController extends AppController {
    public $helpers = array('Js','Html');
    public $components = array('RequestHandler');

    public function beforeFilter(){
    	$this->Auth->allow(array('indices'));
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

}