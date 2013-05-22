<?php

global $CONFIG;

$performed_by = get_entity($vars['item']->subject_guid); // $statement->getSubject();

$object = get_entity($vars['item']->object_guid);
$badge_url = $object->badges_url;

// set security token
$ts = time ();
$token = generate_action_token ( $ts );
$tokenRequest = "&__elgg_token=$token&__elgg_ts=$ts";

if ($object->badges_url) {
    $badge_view = "<a href=\"{$object->badges_url}\"><img title=\"{$object->title}\" src=\"{$CONFIG->wwwroot}action/badges/view?{$tokenRequest}&file_guid={$object->guid}\"></a>";
} else {
    $badge_view = "<img title=\"{$object->title}\" src=\"{$CONFIG->wwwroot}action/badges/view?{$tokenRequest}&file_guid={$object->guid}\">";
}

$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
$string = sprintf(elgg_echo("badges:river:awarded"), $url, $badge_view) . ' ' . $object->badges_userpoints . ' ' . elgg_get_plugin_setting('lowerplural', 'elggx_userpoints') . '.';

echo elgg_view('river/elements/layout', array(
        'item' => $vars['item'],
        'message' => $string,
));
