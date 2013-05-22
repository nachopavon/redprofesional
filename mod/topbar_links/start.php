<?php

elgg_register_event_handler('pagesetup', 'system', 'topbar_links_menu');
elgg_register_event_handler('init', 'system', 'topbar_links_init');

function remove_default_links() {
	// Delete default links that we dont need at the topbar
	elgg_unregister_menu_item('topbar', 'elgg_logo');
	elgg_unregister_menu_item('topbar', 'profile');
	elgg_unregister_menu_item('topbar', 'friends');
	elgg_unregister_menu_item('topbar', 'messages');
	
//	elgg_unregister_menu_item('topbar', 'administration');
//	elgg_unregister_menu_item('topbar', 'dashboard');
//	elgg_unregister_menu_item('topbar', 'usersettings');
//	elgg_unregister_menu_item('topbar', 'logout');

//	elgg_unregister_menu_item('topbar', 'all');
}

function topbar_links_menu() {

	$priority = 900;

	$topbar_links = Array();

	require_once('settings.php');

	if($delete_default_links) {
		remove_default_links();
	}

	foreach($topbar_links as $topbar_link) {
		$topbar_link->setWeight($priority);
		elgg_register_menu_item('topbar', $topbar_link);
		$priority++;
	}
}

function topbar_links_init() {
	elgg_register_page_handler('topbar_links', 'topbar_links_page_handler');
}

function topbar_links_page_handler($page) {
	remove_default_links();
        echo elgg_view('topbar_links/topbar_links');

	return true;
}
?>
