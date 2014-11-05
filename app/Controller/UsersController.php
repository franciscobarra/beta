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
        if($this->Auth->user()){
            $Rol = $this->User->Roles->findById($this->Auth->user('id_roles'));
            if($Rol['Roles']['nombre'] == 'admin'){  //ADMIN
              $this->Auth->allow();  
            }
           if($Rol['Roles']['nombre'] == 'editor'){  //EDITOR
              $this->Auth->allow();  
            }
           if($Rol['Roles']['nombre'] == 'periodista'){  //PERIODISTA
              $this->Auth->allow('view','edit');  
            }
           if($Rol['Roles']['nombre'] == 'usuario_registrado'){  //USUARIO REGISTRADO
              $this->Auth->allow('view','edit');  
            }
        }
           $this->Auth->allow('login','logout','add'); // TODOS
    }
    

    public function login() { // 200 = Success , 401 ,  500 = Error 
        if ($this->Auth->user()) {
            $this->set(array(
                'message' => '401',
                '_serialize' => array('message')
            ));
        }
        
        if (!$this->Auth->user()) {
            if ($this->Auth->login()) {
                $this->set(array(
                    'message' => '200',
                    '_serialize' => array('message')
                ));
            }else{
                 $this->set(array(
                    'message' => '500',
                    '_serialize' => array('message')
                ));
            }
        }
        
        $this->Session->setFlash(__('no se puede ingresar usuario'));
    }
    
    public function logout() {
        if ($this->Auth->logout()) {
            $this->set(array(
                'message' => '200',
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
            
             $message = '200';
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
            $message = '200';
        } else {
            $message = $this->User->validationErrors;
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function delete($id) {
        if ($this->User->delete($id)) {
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
