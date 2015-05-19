<?php
/**
 * ClearSession
 * Copyright (c) Lukas Marks (http://lumax-web.de/)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Lukas Marks (http://lumax-web.de/)
 * @since         0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('ClearSessionsAppController', 'ClearSession.Controller');

class ClearSessionsController extends ClearSessionsAppController {
	
	/**
	 * Components
	 *
	 * @var array
	 * @access public
	 */
	public $components = array(
		'Search.Prg',
	);
	
	/**
	 * Preset Variables Search
	 *
	 * @var array
	 * @access public
	 */
	public $presetVars = true;
	
	/**
	 * Models used by the Controller
	 *
	 * @var array
	 * @access public
	 */ 
	public $uses = array('ClearSession.ClearSession');
	
	/**
	 * Plugin name
	 *
	 * @var string
	 */
	public $pluginName = 'ClearSession';
	
	/**
	 * Controller name for Views
	 *
	 * @var string
	 * @access public
	 */
	public $name = 'ClearSessions';
	
	/**
	 * Default pagination options
	 *
	 * @var array
	 * @access public
	 */
	public $paginate = array(
		'limit' => 50,
		'order' => array (
			'ClearSession.id' => 'ASC',
		),
	);
	
	/**
	 * Admin index
	 *
	 * @return void
	 * @access public
	 */
	public function admin_index() {
		$this->set('title_for_layout', __d('clear_session', 'Sessions'));
		$this->Prg->commonProcess();

		$ClearSession = $this->{$this->modelClass};
		$ClearSession->recursive = 0;
		
		$criteria = $ClearSession->parseCriteria($this->Prg->parsedParams());
		$sessions = $this->paginate($criteria);

		$this->set(compact('sessions'));
	}
	
	/**
	 * Admin process
	 *
	 * @return void
	 * @access public
	 */
	public function admin_process() {
		$action = $this->request->data[$this->modelClass]['action'];
		$ids = array();

		foreach ($this->request->data[$this->modelClass] as $key => $value) {
			if(is_array($value)) {
				if (Hash::contains($value, array('id' => 1))){
					$ids[] = $key;
				}
			}
		}

		if (count($ids) == 0 || $action == null) {
			$this->Session->setFlash(__d('clear_session', 'No Session selected.'), 'flash', array('class' => 'error'));
			return $this->redirect(array('action' => 'index'));
		}
		if ($action == 'delete' && $this->{$this->modelClass}->deleteAll(array($this->modelClass . '.' . 'id' => $ids), true, true)) {
			$this->Session->setFlash(__d('clear_session', 'Session deleted successfully.'), 'flash', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__d('clear_session', 'An error occurred. Please, try again.'), 'flash', array('class' => 'error'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	/**
	 * Admin delete all
	 *
	 * @return void
	 * @access public
	 */
	public function admin_delete_all() {
		if ($this->request->is('post')) {
			if ($this->{$this->modelClass}->query('TRUNCATE TABLE' . ' ' . $this->{$this->modelClass}->tablePrefix . $this->{$this->modelClass}->table)) {
				$this->Session->setFlash(__d('clear_session', 'Session deleted successfully.'), 'flash', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		$this->Session->setFlash(__d('clear_session', 'An error occurred. Please, try again.'), 'flash', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}