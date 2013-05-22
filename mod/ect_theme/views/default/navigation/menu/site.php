<?php
/**
 * Site navigation menu
 *
 * @uses $vars['menu']['default']
 * @uses $vars['menu']['more']
 */

echo '<ul class="elgg-menu elgg-menu-site elgg-menu-site-default clearfix">';

foreach ($vars['menu']['default'] as $menu_item) {

	if($menu_item->getName() == 'groups') {
		$user = elgg_get_logged_in_user_entity();
		$menu_item->setHref('groups/member/'.$user->username);
	}

	if (elgg_is_logged_in() || ($menu_item->getName() != 'activity' && $menu_item->getName() != 'members' &&
	  $menu_item->getName() != 'bookmarks' && $menu_item->getName() != 'thewire')) {
		echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
	}
}


if (isset($vars['menu']['more'])) {
	echo '<li class="elgg-more">';

	$more = elgg_echo('more');
	echo "<a title=\"$more\">$more</a>";
	
	echo elgg_view('navigation/menu/elements/section', array(
		'class' => 'elgg-menu elgg-menu-site elgg-menu-site-more', 
		'items' => $vars['menu']['more'],
	));
	
	echo '</li>';
}
echo '</ul>';
