<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class TagsNoticiasController extends AppController {
    
    public $uses = array('TagsNoticia');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->TagsNoticia->apiValidation = true;
        if($this->Auth->user()){
            $Rol = $this->User->Roles->findById($this->Auth->id_roles);
           if($Rol['Roles']['nombre'] == 'admin'){  //ADMIN
              $this->Auth->allow();  
            }
           if($Rol['Roles']['nombre'] == 'editor'){  //EDITOR
              $this->Auth->allow();  
            }
           if($Rol['Roles']['nombre'] == 'periodista'){  //PERIODISTA
              $this->Auth->allow('add','index');  
            }
        }
    }   
    
    public function index() {
        $TagsNoticias = $this->TagsNoticia->find('all');
        $this->set(array(
            'TagsNoticias' => $TagsNoticias,
            '_serialize' => array('TagsNoticias')
        ));
    }
 
    public function add() {
        
        $this->TagsNoticia->create();
        if ($this->TagsNoticia->save($this->request->data)) {
            
             $message = 'agregado';
        } else {
            $message = $this->TagsNoticia->validationErrors;
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
        
        
    }
     
    public function view($id) {
        $TagsNoticias = $this->TagsNoticia->findById($id);
        $this->set(array(
            'TagsNoticias' => $TagsNoticias,
            '_serialize' => array('TagsNoticias')
        ));
    }
 
     
    public function edit($id = null) {
        $this->TagsNoticia->id = $id;
        if ($this->TagsNoticia->save($this->request->data)) {
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
        if ($this->TagsNoticia->delete($id)) {
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