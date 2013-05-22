<?php
elgg_register_event_handler('init', 'system', 'ect_theme_init');

function ect_theme_init() {
    elgg_unregister_plugin_hook_handler('prepare', 'menu:site', 'elgg_site_menu_setup');
    if((isset($_SERVER['PHP_SELF']) && strpos($_SERVER['PHP_SELF'], 'index.php') !== false) || (get_input('handler') == 'activity')) {
        elgg_extend_view('page/elements/body', 'page/elements/wire_form', 450);
    }
	if(!elgg_is_logged_in()) {
		elgg_unregister_page_handler('activity');
		elgg_unregister_page_handler('bookmarks');
		elgg_unregister_page_handler('thewire');
		elgg_unregister_page_handler('members');
	}

}




?>
