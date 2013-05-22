<?php
/**
 * Group summary
 *
 * @uses $vars['entity']    ElggEntity
 * @uses $vars['title']     Title link (optional) false = no title, '' = default
 * @uses $vars['metadata']  HTML for entity metadata and actions (optional)
 * @uses $vars['subtitle']  HTML for the subtitle (optional)
 * @uses $vars['tags']      HTML for the tags (optional)
 * @uses $vars['content']   HTML for the entity content (optional)
 */

echo elgg_view('object/elements/summary', $vars);

if(isset($_SERVER['PHP_SELF']) && strpos($_SERVER['PHP_SELF'], 'index.php') !== false) {

    $group = $vars['entity'];

    echo '<div class="groupdetails">';
    if ($group->isPublicMembership()) {
	    echo elgg_echo("groups:open");
    } else {
	    echo elgg_echo("groups:closed");
    }
    echo ' / ';
    echo '<b>'.$group->getMembers(0, 0, TRUE). '</b> '.elgg_echo('groups:member');
    echo '</div>';
}
