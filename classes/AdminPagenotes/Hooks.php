<?php

namespace AdminPagenotes;

class Hooks {

    /**
     * $hook: view_vars
     * $type: page/elements/html
     * $return: array
     * $params: array
     */
    public static function notesJSInjector($hook, $type, $return, $params) {
        if (!elgg_is_admin_logged_in()) {
            return $return;
        }

        $return['body'] .= elgg_view('admin_pagenotes/ui');

        return $return;
    }
}