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
App::uses('ClearSessionAppModel', 'ClearSession.Model');

class ClearSession extends ClearSessionAppModel {

	/**
	 * Model name
	 *
	 * @var string
	 * @access public
	 */
	public $name = 'ClearSession';
	
	/**
	 * Model table
	 *
	 * @var string
	 * @access public
	 */
	public $useTable = 'cake_sessions';
	
	/**
	 * Behaviors used by the Model
	 *
	 * @var array
	 * @access public
	 */
	public $actsAs = array(
		'Search.Searchable',
	);
	
	/**
	 * Filter search fields
	 *
	 * @var array
	 * @access public
	 */
	public $filterArgs = array(
		'data' => array(
			'type' => 'like',
			'field' => array(
				'ClearSession.data',
			),
		),
	);
}