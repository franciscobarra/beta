<<?php

App::uses('AppModel', 'Model');

/**
 * Noticia Model
 *
 */
class Noticia extends AppModel {

    var $name = 'Noticia';
    var $belongsTo = array(
        'CategoriaNoticia' => array(
            'className'    => 'CategoriaNoticia',
            'foreignKey'   => 'id_categoria_noticias'
        ),
        'ImagenesNoticia' => array(
            'className'    => 'ImagenesNoticia',
            'foreignKey'   => 'id_imagenes_noticias'
        ),
        'TagsNoticia' => array(
            'className'    => 'TagsNoticia',
            'foreignKey'   => 'id_tags_noticias'
        )
    );

    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        $this->_prepareValidationRules();
    }

    protected function _prepareValidationRules() {
        if (!empty($this->apiValidation)) { 
            $this->validate = array(
       //titulo
                'titulo' => array(
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
        // Cuerpo
                'cuerpo' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Cuerpo',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 200), 
                        'required' => true, 
                        'message' => 'El Cuerpo debe tener minimo de 5 a 200 caracteres'
                    ),
                    'pattern'=>array(
                        'rule'      => array('custom', '/^[a-z ]*$/i'),
                        'message'   => 'Solo se pueden ingresar letras',
                    )),
        // contacto
                'contacto' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un contacto',
                        'allowEmpty' => false
                    ),
                    'numero'=>array(
                        'rule'      => 'numeric',
                        'message' => 'Solo se deben ingresar numeros',
                    )),
        // Estado
                'estado' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Estado',
                        'allowEmpty' => false
                    ),
                    'numero'=>array(
                        'rule'      => 'numeric',
                        'message' => 'Solo se deben ingresar numeros',
                    )),
        // fecha_publicacion
                'fecha_publicacion' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Fecha de publicacion',
                        'allowEmpty' => false
                    ),
                    'birthday'=>array(
                        'rule' => array('datetime', 'dmy'),
                        'message' => 'Debe ingresar una fecha valida (Dia / Mes / Anio)'
                    ))          
        
     
                );

        }
    }
    
  

}