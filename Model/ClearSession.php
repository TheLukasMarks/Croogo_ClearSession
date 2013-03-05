<?php
    /**
     * ClearSession
     *
     * PHP version 5
     *
     * @category ClearSession.Model
     * @package  Croogo.ClearSession
     * @version  1.4, 1.5
     * @author   Lukas Marks <info@lumax-web.de>
     * @link     https://www.lumax-web.de
     */
     App::uses('ClearSessionAppModel', 'ClearSession.Model');

    class ClearSession extends ClearSessionAppModel {

        public $name = 'ClearSession';
        public $useTable = false;

        public function delete($path = null, $recursive = true) {
            
            if (!$path) { $path = TMP . 'sessions' . DS; }

            $dirItems = scandir($path);
            $ignore = array('.', '..');

            foreach ($dirItems AS $dirItem) {
                if (in_array($dirItem, $ignore)) {
                    continue;
                }

                if (is_dir($path . $dirItem) && $recursive) {
                    $this->delete($path . $dirItem . DS);
                } elseif (substr($dirItem, 0, 5) == 'sess_') {
                    unlink($path . $dirItem);
                }
            }
        }
    }