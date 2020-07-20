<?php

namespace AdminPagenotes;

use Elgg\DefaultPluginBootstrap;

class Bootstrap extends DefaultPluginBootstrap {

    /**
     * Plugin init
     */
    public function init() {
        elgg_extend_view('elgg.css', 'admin_pagenotes/styles.css');
        elgg_extend_view('admin.css', 'admin_pagenotes/styles.css');

        elgg_register_ajax_view('admin_pagenotes/notes_list');

        elgg_register_menu_item('page', [
            'name' => 'admin_pagenotes',
            'text' => elgg_echo('admin:admin_pagenotes'),
            'href' => 'admin/admin_pagenotes',
            'section' => 'administer',
            'context' => 'admin',
        ]);

        elgg_register_plugin_hook_handler('view_vars', 'page/elements/html', __NAMESPACE__ . '\\Hooks::notesJSInjector');
    }
}