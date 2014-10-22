<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');


class UsersController extends AppController {
    
     public $uses = array('User');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->User->apiValidation = true;
    }
    
    public function login() {
        if ($this->Auth->user()) {
            $this->set(array(
                'message' => 'Ya estas logeado',
                '_serialize' => array('message')
            ));
        }
        
        if ($this->request->is('post') && !$this->Auth->user()) {
            if ($this->Auth->login()) {
                $this->set(array(
                    'user' => $this->Auth->user(),
                    '_serialize' => array('user')
                ));
            }else{
                 $this->set(array(
                    'message' => 'error',
                    '_serialize' => array('message')
                ));
            }
        }
        
        $this->Session->setFlash(__('no se puede ingresar usuario'));
    }
    
    public function logout() {
        if ($this->Auth->logout()) {
            $this->set(array(
                'message' => array(
                    'text' => __('Logout successfully'),
                    'type' => 'info'
                ),
                '_serialize' => array('message')
            ));
        }
    }
    
    public function index() {
        $users = $this->User->find('all');
        $this->set(array(
            'users' => $users,
            '_serialize' => array('users')
        ));
    }
 
    public function add() {
        $this->User->create();
        if ($this->User->save($this->request->data)) {
            
             $message = 'listoco';
        } else {
            $message = $this->User->validationErrors;
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
        
        
    }
     
    public function view($id) {
        $users = $this->User->findById($id);
        $this->set(array(
            'users' => $users,
            '_serialize' => array('users')
        ));
    }
 
     
    public function edit($id = null) {
        $this->User->id = $id;
        if ($this->User->save($this->request->data)) {
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
        if ($this->User->delete($id)) {
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
