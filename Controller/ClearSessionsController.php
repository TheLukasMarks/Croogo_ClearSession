<?php
/**
 * ClearSession
 *
 * @category ClearSession.Controller
 * @package  Croogo.ClearSession
 * @version  2.x
 * @author   Lukas Marks <info@lumax-web.de>
 * @link     http://www.lumax-web.de/
 */
App::uses('ClearSessionsAppController', 'ClearSession.Controller');

class ClearSessionsController extends ClearSessionsAppController {
	public $uses = array('ClearSession.ClearSession');
	public function admin_clear() { 
		$this->ClearSession->delete();
		$this->Session->setFlash(__d('clear_session', 'Sessions have been cleared, please login.'), 'flash', array('class' => 'success'));
		$this->redirect(array('plugin' => 'users', 'controller' => 'users', 'action' => 'login', 'admin' => true));
	}
}