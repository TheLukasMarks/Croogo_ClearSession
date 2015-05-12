<?php
/**
 * ClearSession Model
 *
 * @category Model
 * @package  ClearSession
 * @version  2.x
 * @author   Lukas Marks <info@lumax-web.de>
 * @link     http://www.lumax-web.de/
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
	
	/**
	 * Display fields for this model
	 *
	 * @var array
	 */
	protected $_displayFields = array(
		'id',
		'data',
		'expires',
	);
}