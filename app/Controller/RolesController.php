<?php

class RolesController extends AppController {
    
    public $uses = array('Roles');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
 
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Roles->apiValidation = true;
        if($this->Auth->user()){
              $Rol = $this->User->Roles->findById($this->Auth->user('id_roles'));
           if($Rol['Roles']['nombre'] == 'admin'){  //ADMIN
              $this->Auth->allow();  
            }
           if($Rol['Roles']['nombre'] == 'editor'){  //EDITOR
              $this->Auth->allow();  
            }
        }
    }
    
    public function index() {
        $roles = $this->Roles->find('all');
        $this->set(array(
            'roles' => $roles,
            '_serialize' => array('roles')
        ));
    }
 
    public function add() {
        $this->Roles->create();
        if ($this->Roles->save($this->request->data)) {
             $message = '200';
        } else {
           $message = $this->Roles->validationErrors;
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function view($id) {
        $roles = $this->Roles->findById($id);
        $this->set(array(
            'roles' => $roles,
            '_serialize' => array('roles')
        ));
    }
 
     
    public function edit($id) {
        $this->Roles->id = $id;
        if ($this->Roles->save($this->request->data)) {
            $message = '200';
        } else {
            $message = $this->Roles->validationErrors;
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function delete($id) {
        if ($this->Roles->delete($id)) {
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
