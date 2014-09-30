<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestUsuariosController extends AppController {
   
    public $uses = array('Usuario');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $usuarios = $this->Usuarios->find('all');
        $this->set(array(
            'usuarios' => $usuarios,
            '_serialize' => array('usuarios')
        ));
    }
 
    public function add() {
        $this->Usuario->create();
        if ($this->Usuario->save($this->request->data)) {
             $message = 'Created';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function view($id) {
        $usuarios = $this->Usuario->findById($id);
        $this->set(array(
            'usuarios' => $usuarios,
            '_serialize' => array('usuarios')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Usuario->id = $id;
        if ($this->Usuario->save($this->request->data)) {
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
        if ($this->Usuario->delete($id)) {
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
