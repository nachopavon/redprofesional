<?php
/**
 * Menu group
 *
 * @uses $vars['items']
 * @uses $vars['class']
 * @uses $vars['name']
 * @uses $vars['section']
 * @uses $vars['show_section_headers']
 */

$headers = elgg_extract('show_section_headers', $vars, false);
$class = elgg_extract('class', $vars, '');

if ($headers) {
        $name = elgg_extract('name', $vars);
        $section = elgg_extract('section', $vars);
        echo '<h2>' . elgg_echo("menu:$name:header:$section") . '</h2>';
}

$styles = "";
if (strpos($class, 'elgg-drop-css-to-inline-styles')) {
    $styles = " style='margin: 0;padding: 0;text-decoration: none;list-style-type: none;float: left;'";
}

echo "<ul class='$class'$styles>";
foreach ($vars['items'] as $menu_item) {
    if (strpos($class, 'elgg-drop-css-to-inline-styles')) {
        echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item, 'class' => 'elgg-drop-css-to-inline-styles'));
    } else {
        echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
    }
}
echo '</ul>';
