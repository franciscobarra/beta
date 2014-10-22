<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class NoticiasController extends AppController {
    
    public $uses = array('Noticia');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Noticia->apiValidation = true;
    }   
    
    public function index() {
        $Noticias = $this->Noticia->find('all');
        $this->set(array(
            'Noticias' => $Noticias,
            '_serialize' => array('Noticias')
        ));
    }
 
    public function add() {
        
        $this->Noticia->create();
        if ($this->Noticia->save($this->request->data)) {
            
             $message = 'agregado';
        } else {
            $message = $this->Noticia->validationErrors;
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
        
        
    }
     
    public function view($id) {
        $Noticias = $this->Noticia->findById($id);
        $this->set(array(
            'Noticias' => $Noticias,
            '_serialize' => array('Noticias')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Noticia->id = $id;
        if ($this->Noticia->save($this->request->data)) {
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
        if ($this->Noticia->delete($id)) {
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