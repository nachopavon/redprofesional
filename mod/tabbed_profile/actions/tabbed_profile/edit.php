<?php
elgg_load_library('tabbed_profile');

$profile_guid = get_input('guid', false);
$container_guid = get_input('container_guid', false);

$title = get_input('title', false);
$profile_type = get_input('profile_type', 'widgets');
$widget_layout = get_input('widget_layout', false);
$widget_profile_display = get_input('widget_profile_display', 'yes');
$iframe_url = get_input('iframe_url', false);
$iframe_height = get_input('iframe_height', false);
$group_sidebar = get_input('group_sidebar', 'yes');
$delete = get_input('delete', false);
$access = get_input('access', ACCESS_PUBLIC);

$profile = get_entity($profile_guid);
$container = get_entity($container_guid);

if (!$container || !$container->canEdit() || ($profile && !$profile->canEdit())) {
  register_error(elgg_echo('tabbed_profile:invalid:permissions'));
}

// if we're deleting, we can take care of that and not worry about anything else
if ($profile && $delete) {
  if (elgg_instanceof($container, 'group')) {
	$context = 'groups';
  }
  else {
	$context = 'profile';
  }
  
  $dbprefix = elgg_get_config('dbprefix');
  
  //delete any widgets on this profile
  $widgets = elgg_get_entities_from_private_settings(array(
      'types' => array('object'),
      'subtypes' => array('widget'),
      'owner_guids' => array($container->getGUID()),
      'private_setting_name' => 'context',
      'private_setting_value' => $context,
	  'wheres' => array(
		"EXISTS (
		  SELECT 1 FROM {$dbprefix}entity_relationships r
		  WHERE r.guid_one = e.guid
		  AND r.relationship = '" . TABBED_PROFILE_WIDGET_RELATIONSHIP . "'
		  AND r.guid_two = {$profile->guid})"
	)
  ));
  
  foreach($widgets as $widget) {
    $widget->delete();
  }
  
  // delete the profile
  $profile->delete();
  system_message(elgg_echo('tabbed_profile:tab:deleted'));
  forward($container->getURL());
}

// we're updating or creating a new one
// some sanity checking
if (!$title) {
  register_error(elgg_echo('tabbed_profile:error:notitle'));
  forward(REFERER);
}

if (!$widget_layout) {
  $widget_layout = elgg_instanceof($container, 'group') ? 2 : 3;
}

// prevent xss
if ($profile_type == 'iframe') {
  // see https://bugs.php.net/bug.php?id=51192
  $php_5_2_13_and_below = version_compare(PHP_VERSION, '5.2.14', '<');
  $php_5_3_0_to_5_3_2 = version_compare(PHP_VERSION, '5.3.0', '>=') && version_compare(PHP_VERSION, '5.3.3', '<');

  $validated = false;
  if ($php_5_2_13_and_below || $php_5_3_0_to_5_3_2) {
	$tmp_address = str_replace("-", "", $iframe_url);
	$validated = filter_var($tmp_address, FILTER_VALIDATE_URL);
  } else {
	$validated = filter_var($iframe_url, FILTER_VALIDATE_URL);
  }
  
  if (!$validated) {
	register_error(elgg_echo('tabbed_profile:error:address'));
	forward(REFERER);
  }
}

// create/update our tab
$action_type = 'update';
if (!$profile) {
  $action_type = 'create';
  
  $profile = new ElggObject();
  $profile->subtype = 'tabbed_profile';
  $profile->owner_guid = elgg_get_logged_in_user_guid();
  $profile->container_guid = $container->getGUID();
  
  // set this tab as the last one
  $last_order = tabbed_profile_get_last_order($container);
  $profile->order = $last_order + 1;
}

$profile->title = $title;
$profile->access_id = $access;
$profile->save();

$profile->profile_type = $profile_type;
$profile->widget_layout = $widget_layout;
$profile->widget_profile_display = $widget_profile_display;
$profile->iframe_url = $iframe_url;
$profile->iframe_height = is_numeric($iframe_height) ? $iframe_height : 500;
$profile->group_sidebar = $group_sidebar;


system_message(elgg_echo('tabbed_profile:success:'.$action_type));
forward($profile->getURL());