<?php
    /**
     * ClearSession
     *
     * PHP version 5
     *
     * @category ClearSession.Controller
     * @package  Croogo.ClearSession
     * @version  1.4, 1.5
     * @author   Lukas Marks <info@lumax-web.de>
     * @link     https://www.lumax-web.de
     */
    App::uses('ClearSessionsAppController', 'ClearSession.Controller');
    
    class ClearSessionsController extends ClearSessionsAppController {
        
        // use the ClearSession.ClearSession Plugin.Model 
        public $uses = array('ClearSession.ClearSession');
        
        public function admin_clear() { 
                $this->ClearSession->delete();
                $this->Session->setFlash(__('Sessions have been cleared, please login.', true), 'default', array('class' => 'success'));
                $this->redirect(array('plugin'=>'extensions','controller'=>'extensions_plugins','action'=>'index'));
        }
    }