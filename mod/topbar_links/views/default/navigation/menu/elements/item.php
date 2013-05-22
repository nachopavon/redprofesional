<?php
/**
 * A single element of a menu.
 *
 * @package Elgg.Core
 * @subpackage Navigation
 */

$item = $vars['item'];
$class = elgg_extract('class', $vars, '');

$link_class = 'elgg-menu-closed';
if ($item->getSelected()) {
   $item->setItemClass('elgg-state-selected');
   $link_class = 'elgg-menu-opened';
}

$children = $item->getChildren();
if ($children) {
   $item->addLinkClass($link_class);
   $item->addLinkClass('elgg-menu-parent');
}

$item_class = $item->getItemClass();

$styles = "";
if ($class == 'elgg-drop-css-to-inline-styles') {
   $styles = " style='margin: 0;padding: 0;border: 0 none; font-family: inherit;font-size: 100%;font-style: inherit;font-weight: inherit;outline: 0 none; vertical-align: baseline;position: relative;float: left;'";
}

echo "<li class='$item_class'$styles>";

if ($class == 'elgg-drop-css-to-inline-styles') {
   $style = 'margin: 0;padding: 2px 15px 0;text-decoration: none;display: block;color: #eee;margin-top: 1px;font-weight: bolder;outline: medium none; line-height: 1.4em;font-size: 10pt;';
   echo "<a href='" . $item->getHref() . "' style='$style'>" . $item->getText(). "</a>";
} else {
   echo $item->getContent();
}
if ($children) {
	echo elgg_view('navigation/menu/elements/section', array(
		'items' => $children,
		'class' => 'elgg-menu elgg-child-menu',
	));
}
echo '</li>';
