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

class FirstMigrationClearSession extends CakeMigration {
	
	/**
	 * Migration description
	 *
	 * @var string
	 */
	public $description = '';
	
	/**
	 * Migration dependencies
	 *
	 * @var array
	 */
	public $dependencies = array();
	
	/**
	 * Connection used
	 *
	 * @var string
	 */
	public $connection = 'default';
	
	/**
	 * Actions to be performed
	 *
	 * @var array $migration
	 * @access public
	 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'cake_sessions' => array(
					'id' => array('type' => 'string', 'null' => false, 'key' => 'primary'),
					'data' => array('type' => 'text', 'null' => true, 'default' => null),
					'expires' => array('type' => 'integer', 'null' => true, 'default' => null),
					'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDb'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'cake_sessions',
			),
		),
	);
	
	/**
	 * Running direction
	 *
	 * @var string $direction
	 */
	public $direction = null;
	
	/**
	 * Before migration callback
	 *
	 * @param string $direction, up or down direction of migration process
	 * @return boolean Should process continue
	 */
	public function before($direction) {
		return true;
	}
	
	/**
	 * After migration callback
	 *
	 * @param string $direction, up or down direction of migration process
	 * @return boolean Should process continue
	 */
	public function after($direction) {
		return true;
	}
}