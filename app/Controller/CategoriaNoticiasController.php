<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class CategoriaNoticiasController extends AppController {
    
    public $uses = array('CategoriaNoticia');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->CategoriaNoticia->apiValidation = true;
    }   
    
    public function index() {
        $CategoriaNoticias = $this->CategoriaNoticia->find('all');
        $this->set(array(
            'CategoriaNoticias' => $CategoriaNoticias,
            '_serialize' => array('CategoriaNoticias')
        ));
    }
 
    public function add() {
        
        $this->CategoriaNoticia->create();
        if ($this->CategoriaNoticia->save($this->request->data)) {
            
             $message = 'agregado';
        } else {
            $message = $this->CategoriaNoticia->validationErrors;
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
        
        
    }
     
    public function view($id) {
        $CategoriaNoticias = $this->CategoriaNoticia->findById($id);
        $this->set(array(
            'CategoriaNoticias' => $CategoriaNoticias,
            '_serialize' => array('CategoriaNoticias')
        ));
    }
 
     
    public function edit($id = null) {
        $this->CategoriaNoticia->id = $id;
        if ($this->CategoriaNoticia->save($this->request->data)) {
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
        if ($this->CategoriaNoticia->delete($id)) {
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