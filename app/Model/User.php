<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

    var $name = 'User';
    var $belongsTo = array(
        'Roles' => array(
            'className'    => 'Roles',
            'foreignKey'   => 'id_roles'
        ),
        'Pais' => array(
            'className'    => 'Pais',
            'foreignKey'   => 'id_pais'
        )
    );
    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        $this->_prepareValidationRules();
    }

    protected function _prepareValidationRules() {
        if (!empty($this->apiValidation)) { 
            $this->validate = array(
                
        // Nombre De Usuario         
                'username' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Nombre de Usuario',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Nombre De Usuario debe tener minimo de 5 a 150 caracteres'
                    ),
                     'unique' => array(
                        'rule'    => 'isUnique',
                        'message' => 'El Nombre de Usuario ingresado, ya esta registrado'
                    ),
                     'alphaNumeric' => array(
                        'rule'     => 'alphaNumeric',
                        'required' => true,
                        'message'  => 'Se deben ingresar solo letras  y numeros'
                   )),
        
        // Contraseña 
                    'password' => array(
                        'required' => array(
                            'rule' => array('notEmpty'),
                            'message' => 'Se Requiere Una Contraseña'
                        ),
                        'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'La Contrasenia debe tener al minimo de 5 a 150 caracteres'
                    )),
        // Nombre
                'nombre' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Nombre',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Nombre debe tener minimo de 5 a 150 caracteres'
                    ),
                    'pattern'=>array(
                        'rule'      => array('custom', '/^[a-z ]*$/i'),
                        'message'   => 'Solo se pueden ingresar letras',
                    )),
        // Apellido Paterno
                'apellido_pat' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Apellido Paterno',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Nombre debe tener minimo de 5 a 150 caracteres'
                    ),
                    'pattern'=>array(
                        'rule'      => array('custom', '/^[a-z]*$/i'),
                        'message'   => 'Solo se pueden ingresar letras sin espacios',
                    )),
        // Apellido Materno
                'apellido_mat' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Apellido Materno',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Nombre debe tener minimo de 5 a 150 caracteres'
                    ),
                    'pattern'=>array(
                        'rule'      => array('custom', '/^[a-z]*$/i'),
                        'message'   => 'Solo se pueden ingresar letras sin espacios',
                    )),
        // Fecha De Nacimiento
                'fecha_nacimiento' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar una Fecha De Nacimiento',
                        'allowEmpty' => false
                    ),
                    'age' => array(
                          'rule' => 'checkMayor_Edad',
                          'message' => 'Usted debe ser mayor de 18 anios'
                    )),
        //Rut
                'rut' => array(
                        'nonEmpty' => array(
                            'rule' => array('notEmpty'),
                            'message' => 'Se Requiere ingresar el Rut de Usuario',
                            'allowEmpty' => false
                        ),
                        'between' => array( 
                            'rule' => array('between', 9, 12), 
                            'required' => true, 
                            'message' => 'El Rut Ingresado no es valido'
                        ),
                         'unique' => array(
                            'rule'    => 'isUnique',
                            'message' => 'El rut ingresado, ya esta registrado'
                        ),
                        'validar_rut' => array(
                            'rule'    => 'valida_rut',
                            'message' => 'El rut es invalido'
                        ))
                );
        }
    }
    
    public function checkMayor_Edad($check) {
        $bday = strtotime($check['fecha_nacimiento']);
        if (time() < strtotime('+18 years', $bday)) return false;
        return true;
    }
    public function valida_rut() {
        $r = $this->data['User']['rut'];    
        $r=strtoupper(ereg_replace('\.|,|-','',$r));
        $sub_rut=substr($r,0,strlen($r)-1);
        $sub_dv=substr($r,-1);
        $x=2;
        $s=0;
        for ( $i=strlen($sub_rut)-1;$i>=0;$i-- ){
                     if ( $x >7 ){
                          $x=2;
                      }

                $s += $sub_rut[$i]*$x;
                $x++;
        }

                $dv=11-($s%11);
                if ( $dv==10 ){
                $dv='K';
        }
                if ( $dv==11 ){
                $dv='0';
        }
                if ( $dv==$sub_dv ){ 
                        return true;
                 }
            else{
                $this->invalidate('rut');   
                return false;
        }
    }

}
