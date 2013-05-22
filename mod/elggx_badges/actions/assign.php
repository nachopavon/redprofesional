<?php

global $CONFIG;

admin_gatekeeper();
action_gatekeeper();

$user = get_user_by_username(get_input('username'));

if ($user) {
    $user->badges_badge = (int)get_input('badge');
    $user->badges_locked = (int)get_input('locked');
    system_message(elgg_echo("badges:assign:success"));
} else {
    system_message(elgg_echo("badges:assign:nouser"));
}

// Anounce it on the river
if ($guid = $user->badges_badge) {
        $badge = get_entity($guid);
add_to_river('river/object/badge/assign', 'assign', $user->guid, $badge->guid);
}

forward($_SERVER['HTTP_REFERER']);
