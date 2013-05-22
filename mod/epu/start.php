<?php

function get_all_users() {
        $users = elgg_get_entities(array('type' => 'user'));
        $usernames = array();
        foreach ($users as $user) {
                $userpoints = $user->getObjects("userpoint");
                if ($userpoints) {
                        $points = array_pop($userpoints)->meta_points;
                } else {
                        $points = 0;
                }
                $usernames[] = array("username" => $user->username,
                                     "guid" => $user->getGUID(),
                                     "points" => $points);
                }
        return $usernames;
}

function delete_activity() {
        $activity = elgg_get_entities(
                array('types' => array('object', 'group'),
                      'subtypes' => array('redmine', 'foswiki', 'userpoint'),
                      'limit' => 0
                      )
                );
        foreach ($activity as $item) {
                 $item->delete();
        }
        return "All activity deleted.";
}

# The json string for the activity item looks like this:
# '{"username": "paco", "description": null, "source_link": null,
#   "subtype": "redmine", "tags": ['a', 'b'], "timestamp": 345132,
#   "points": 30, "group": "Project 1"}'
function update_activity() {
        $json_activity = get_post_data();
        $activity = json_decode($json_activity);
        $msg = '';
        foreach ($activity as $activity_item) {

            if (isset($activity_item->timestamp)) {
                $timestamp = (float) $activity_item->timestamp; 
            } else {
                $msg .= "There is an activity item without timestamp: " . print(activity_item) . ", skipping. ";
                continue;
            }
            if ($timestamp == 0) {
                $msg = "Timestamp cannot be converted to number: $activity_item->timestamp" . ", skipping. ";
            }

            // Check activity items were not already added.
            $existing_activity_items = elgg_get_entities_from_metadata(
                array('metadata_name_value_pairs' => array(
                      'name' => 'timestamp', 'value' => $activity_item->timestamp)
                )
            );

            if (empty($existing_activity_items)) {
                $elgg_activity_item = new ElggObject();

                $elgg_activity_item->timestamp = $timestamp;

                if (isset($activity_item->subtype)) {
                    $elgg_activity_item->subtype = $activity_item->subtype;
                    $date = date('(H:i:s d/m/Y)', $timestamp);
                    $elgg_activity_item->title = $activity_item->subtype . " activity item: " . $date;
                } else {
                    $msg .= "Activity item $timestamp does not have subtype, skipping. ";
                    continue;
                }

                if (isset($activity_item->username)) {
                    $user = get_user_by_username($activity_item->username);
                    if (empty($user)) {
                        $msg .= "Username $activity_item->username for item $timestamp is not available in Elgg, skipping. ";
                        continue;
                    } else {
                        $user_guid = $user->getGUID();
                        $elgg_activity_item->owner_guid = $user_guid;
                    }
                } else {
                    $msg .= "Activity item $timestamp does not have a username, skipping. ";
                    continue;
                }

                if (isset($activity_item->source_link)) {
                    $elgg_activity_item->source_link = $activity_item->source_link;
                } else {
                    $msg .= "Activity item $timestamp does not have a link, skipping. ";
                    continue;
                }

                if (!isset($activity_item->points)) {
                    $msg .= "Activity item $timestamp does not have points, adding 0 points; ";
                    $points = 0;
                } else {
                    $points = $activity_item->points;
                }
                userpoints_add($user_guid, $points, "Points added through API");

                if (!isset($activity_item->tags)) {
                    $msg .= "Activity item $timestamp does not have tags, adding Uncategorized tag; ";
                    $tags = array("Uncategorized");
                } else {
                    $points = $activity_item->points;
                }
                $tags = $activity_item->tags;
                if (is_array($tags)) {
                    $elgg_activity_item->tags = $tags;
                } else {
                    $elgg_activity_item->tags = array($tags);
                }

                if (isset($activity_item->subtype)) {
                    $elgg_activity_item->description = $activity_item->description;
                } else {
                    $msg .= "Activity item $timestamp does not have description, adding without description; ";
                }

                # for now make all blog posts public
                $group_name = $activity_item->group;

                # TODO: Couldn't find a way to query directly by group name.
                # get_user_by_username should work for groups but it doesn't
                # groups share the same interface than users, functions for users should
                # work for users as it's documented.
                $groups = elgg_get_entities(array('type' => 'group', 'limit' => '0'));
                foreach ($groups as $group) {
                    if ($group->name == $group_name) {
                        break;
                    } else {
                        $group = false;
                    }
                }
                if (!$group) {
                    $group = new ElggGroup();
                    $group->name = $group_name;
                    $group->access_id = ACCESS_PUBLIC;
                    $group->save();
                }
                if (!$group->isMember($user)) {
                    $group->join($user);
                    can_write_to_container($user_guid, $group->getGUID());
                    $group->save();
                }

                $elgg_activity_item->access_id = $group->group_acl;
                $elgg_activity_item->container_guid = $group->getGUID();
                $elgg_activity_item->save();

                add_to_river('river/object/epu/create',
                             'create',
                             $user_guid,
                             $elgg_activity_item->getGUID(),
                             $group->group_acl
                );
                $msg .= "Activity item $timestamp added. ";
        } else {
                $msg .= "Activity item $timestamp already in Elgg, skipping. ";
            }
        }
        if ($msg) {
            return $msg;
        } else {
            return "No new activity was added to Elgg. ";
        }
}


function epu_init() {

        elgg_register_entity_type('object', 'foswiki');
        elgg_register_entity_type('object', 'redmine');
        # This is not necessary for EPU but it's helpful for testing.
        expose_function("get_all_users",
                        "get_all_users",
                        null,
                        'gives back all usernames',
                        'GET',
                        false,
                        false
        );
        expose_function("update_activity",
                        "update_activity",
                        null,
                        'updates activity',
                        'POST',
                        false,
                        true
        );


        expose_function("delete_activity",
                        "delete_activity",
                        null,
                        'deletes all activity',
                        'GET',
                        false,
                        false
        );
}
register_elgg_event_handler('init', 'system', 'epu_init');

?>
