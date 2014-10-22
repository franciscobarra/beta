<<?php

App::uses('AppModel', 'Model');

/**
 * Noticia Model
 *
 */
class CategoriaNoticia extends AppModel {

    var $name = 'CategoriaNoticia';
    var $hasMany = array(
            'Noticia' => array(
                'className'    => 'Noticia',
                'foreignKey'   => 'id'
            ),

        );
    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        $this->_prepareValidationRules();
    }

    protected function _prepareValidationRules() {
        if (!empty($this->apiValidation)) { 
            $this->validate = array(
       //Nombre
                'nombre' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Titulo',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 200), 
                        'required' => true, 
                        'message' => 'El Titulo debe tener minimo de 5 a 200 caracteres'
                    ),
                    'pattern'=>array(
                        'rule'      => array('custom', '/^[a-z ]*$/i'),
                        'message'   => 'Solo se pueden ingresar letras',
                    )),
        //Codigo
                'codigo' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un contacto',
                        'allowEmpty' => false
                    ),
                    'numero'=>array(
                        'rule'      => 'numeric',
                        'message' => 'Solo se deben ingresar numeros',
                    ))
                );

        }
    }
    
  

}