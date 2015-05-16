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

class ClearSessionActivation {
	
	/**
	 * onActivate will be called if this returns true
	 *
	 * @param  object $controller Controller
	 * @return boolean
	 */
	public function beforeActivation(&$controller) {
		return true;
	}
	
	/**
	 * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
	 *
	 * @param object $controller Controller
	 * @return void
	 */
	public function onActivation(&$controller) {
		$CroogoPlugin = new CroogoPlugin();
		$result = $CroogoPlugin->migrate('ClearSession');
		if ($result) {
			
			$sessionConfig = 'database';
			
			$croogoConfigFile = APP . 'Config' . DS . 'croogo' . '.' . 'php';
			$File =& new File($croogoConfigFile);
			$fileContent = $File->read();
			$content = preg_replace('/(?<=\'defaults\' => \')([^\' ]+)/', $sessionConfig, $fileContent);
			if (!$File->write($content)) {
				return false;
			}
			return true;
		}
	}
	
	/**
	 * onDeactivate will be called if this returns true
	 *
	 * @param  object $controller Controller
	 * @return boolean
	 */
	public function beforeDeactivation(&$controller) {
		return true;
	}
	
	/**
	 * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
	 *
	 * @param object $controller Controller
	 * @return void
	 */
	public function onDeactivation(&$controller) {
		$CroogoPlugin = new CroogoPlugin();
		$result = $CroogoPlugin->unmigrate('ClearSession');
		if ($result) {
			
			$sessionConfig = 'php';
			
			$croogoConfigFile = APP . 'Config' . DS . 'croogo' . '.' . 'php';
			$File =& new File($croogoConfigFile);
			$fileContent = $File->read();
			$content = preg_replace('/(?<=\'defaults\' => \')([^\' ]+)/', $sessionConfig, $fileContent);
			if (!$File->write($content)) {
				return false;
			}
			return true;
		}
	}
}
