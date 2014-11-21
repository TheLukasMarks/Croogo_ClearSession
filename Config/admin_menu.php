<?php
/**
 * Admin menu (navigation)
 */
CroogoNav::add('settings.children.clear_session', array(
	'icon' => 'trash',
	'title' => __d('clear_session', 'Clear Session'),
	'url' => array(
		'admin' => true,
		'plugin' => 'clear_session',
		'controller' => 'clear_sessions',
		'action' => 'clear'
	),
	'weight' => 300,
	'children' => array(
	),
));