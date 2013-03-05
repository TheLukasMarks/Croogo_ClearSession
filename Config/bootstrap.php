<?php

    /**
     * Admin menu (navigation)
     */
    CroogoNav::add('settings.children.clear_session',
        array(
            'title' => __('ClearSession'),
            'url' => array(
                'plugin' => 'clear_session',
                'controller' => 'clear_sessions',
                'action' => 'clear'
            )
        )
    );