<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public $components = array(
		'Session',
        'Auth',
		'Security'
	);
    
   public function beforeFilter() {
       
    if(in_array($this->params['controller'],array('rest_anuncios'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_categoria_anuncios'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_imagenes_anuncios'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_sector_anuncios'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_usuarios'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_roles'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_pais'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_noticias'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_imagenes_noticias'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_categoria_noticias'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_tags_noticias'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_publicidad'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_categoria_publicidad'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    if(in_array($this->params['controller'],array('rest_tamanio_publicidad'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
    }
    else{
        $this->Auth->allow();         
    }
    
  /*
    if(in_array($this->params['controller'],array('rest_usuarios'))){
        $this->Auth->allow();
        $this->Security->unlockedActions = array('edit','delete','add','view');
         
    }else{
        $this->Auth->allow();         
    }
    
        $this->Auth->sessionKey = false;
        $this->Auth->authorize = array('Controller');
        $this->Auth->authenticate = array(
            'all' => array(
                //'scope' => array('User.is_active' => 1)
            ),
            'Basic'
        );
*/
        $this->Auth->allow();
    
        
}

}

