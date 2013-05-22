<?php
function pluginname_init() {
    // Extend system CSS with our own styles
    elgg_extend_view('page/elements/elgg','page/elements/sidebar');
    elgg_extend_view('page/elements/elgg','page/elements/header_logo');	 elgg_extend_view('css/elements/elgg','css/elements/layout');
//No mostrar algunas cosas si el usaurio no esta logado
	if(!elgg_is_logged_in()) {
                elgg_unregister_page_handler('activity');
                elgg_unregister_page_handler('bookmarks');
                elgg_unregister_page_handler('thewire');
                elgg_unregister_page_handler('members');
        }

    // Replace the default index page
    register_plugin_hook('index','system','new_index');
}
function new_index() {
    if (!include_once(dirname(dirname(__FILE__)) . "/nebulosa/index.php"))
        return false;
 
    return true;
}
// register for the init, system event when our plugin start.php is loaded
register_elgg_event_handler('init','system','pluginname_init');
?>
