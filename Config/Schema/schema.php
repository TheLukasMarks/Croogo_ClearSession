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

class ClearSessionSchema extends CakeSchema {

	/**
	 * Name property
	 *
	 * @var string
	 */
	public $name = 'ClearSession';

	/**
	 * Before event.
	 *
	 * @param array $event The event data.
	 * @return bool Success
	 */
	public function before($event = array()) {
		return true;
	}

	/**
	 * After event.
	 *
	 * @param array $event The event data.
	 * @return void
	 */
	public function after($event = array()) {
		return true;
	}

	/**
	 * cake_sessions table definition
	 *
	 * @var array
	 */
	public $cake_sessions = array(
		'id' => array('type' => 'string', 'null' => false, 'key' => 'primary'),
		'data' => array('type' => 'text', 'null' => true, 'default' => null),
		'expires' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}