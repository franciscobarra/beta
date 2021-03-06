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
        if($this->Auth->user()){
           $Rol = $this->User->Roles->findById($this->Auth->user('id_roles'));
           if($Rol['Roles']['nombre'] == 'admin'){  //ADMIN
              $this->Auth->allow();  
            }
           if($Rol['Roles']['nombre'] == 'editor'){  //EDITOR
              $this->Auth->allow();  
            }
           if($Rol['Roles']['nombre'] == 'periodista'){  //PERIODISTA
              $this->Auth->allow();  
            }
        }
           $this->Auth->allow('index','view'); // TODOS
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
             
             $message = '200';
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
            $message = '200';
        } else {
            $message = $this->Noticia->validationErrors;
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function delete($id) {
        if ($this->Noticia->delete($id)) {
            $message = '200';
        } else {
            $message = '500';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

}