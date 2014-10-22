<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class ImagenesNoticiasController extends AppController {
    
    public $uses = array('ImagenesNoticia');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->ImagenesNoticia->apiValidation = true;
    }   
    
    public function index() {
        $ImagenesNoticias = $this->ImagenesNoticia->find('all');
        $this->set(array(
            'ImagenesNoticias' => $ImagenesNoticias,
            '_serialize' => array('ImagenesNoticias')
        ));
    }
 
    public function add() {
        
        $this->ImagenesNoticia->create();
        if ($this->ImagenesNoticia->save($this->request->data)) {
            
             $message = 'agregado';
        } else {
            $message = $this->ImagenesNoticia->validationErrors;
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
        
        
    }
     
    public function view($id) {
        $ImagenesNoticias = $this->ImagenesNoticia->findById($id);
        $this->set(array(
            'ImagenesNoticias' => $ImagenesNoticias,
            '_serialize' => array('ImagenesNoticias')
        ));
    }
 
     
    public function edit($id = null) {
        $this->ImagenesNoticia->id = $id;
        if ($this->ImagenesNoticia->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function delete($id) {
        if ($this->ImagenesNoticia->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

}