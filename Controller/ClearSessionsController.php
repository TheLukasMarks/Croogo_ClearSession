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

		$limitCounter = count($sessions);

		$this->set(compact(
			'sessions',
			'limitCounter'
		));
	}
	
	/**
	 * Admin process
	 *
	 * @return void
	 * @access public
	 */
	public function admin_process() {
		$action = $this->request->data['ClearSession']['action'];
		$ids = array();

		foreach ($this->request->data['ClearSession'] as $key => $value) {
			if(is_array($value)) {
				if (Hash::contains($value, array('id' => 1))){
					$ids[] = $key;
				}
			}
		}

		if (count($ids) == 0 || $action == null) {
			$this->Session->setFlash(__d('clear_session', 'No Sessions selected.'), 'default', array('class' => 'error'));
			return $this->redirect(array('action' => 'index'));
		}
		if ($action == 'delete' && $this->ClearSession->deleteAll(array('ClearSession.id' => $ids), true, true)) {
			$this->Session->setFlash(__d('clear_session', 'Sessions deleted successfully.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__d('clear_session', 'An error occurred. Please, try again.'), 'default', array('class' => 'error'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}