<?php
/**
 * Common library of functions used by SAML Authentication
 *
 * @package saml_login
 */

/**
 * Check if the system admin has enabled Sign-On for SAML plugin
 *
 * @param void
 * @return bool
 */
function saml_login_allow_sign_on()
{
	return elgg_get_plugin_setting('sign_on', 'saml_login') == 'yes';
}


/**
 * Checks if this site is accepting new users.
 * Admins can disable manual registration, but some might want to allow
 * new users from the IdP.
 *
 * @param void
 * @return bool
 */
function saml_login_allow_new_users()
{
	$site_reg = elgg_get_config('allow_registration');
	$saml_reg = elgg_get_plugin_setting('new_users', 'saml_login');
	if ($site_reg || (!$site_reg && $saml_reg == 'yes'))
	{
		return true;
	}
	return false;
}

/**
 * Check if the system admin has enabled the update userdata option.
 *
 * @param void
 * @return bool
 */
function saml_login_allow_update_userdata()
{
	return elgg_get_plugin_setting('update_userdata', 'saml_login') == 'yes';
}


/**
 * Log in a user from SAML IdP.
 */
function saml_login_login($username, $email, $firstname, $lastname, $saml_groups=NULL)
{
	// sanity check. Checks if log in is allowed
	if (!saml_login_allow_sign_on()) {
		register_error(elgg_echo('saml_login:login:disabled'));
		forward();
	}
	
	// attempt to find user and log them in.
	// else, create a new user and log in after.


	$users = array();

	// get_user_by_username returns an user object
	$users[0] = get_user_by_username($username);

	if (empty($users[0])) {
		// get_user_by_email returns an array of user objects
		$users = get_user_by_email($email);
	}

	if (isset($users[0]) && !empty($users[0])) {
		$user = $users[0];
		// Update userdata

		if (saml_login_allow_update_userdata()) {
			$user->name = $firstname . " " .  $lastname;
			$user->save();
		}
		if (login($user)) {
			system_message(elgg_echo('saml_login:login:success'));
			saml_enrol_groups($user, $saml_groups);
		}
		
		else {
			system_message(elgg_echo('saml_login:login:error'));
		}
		forward();
	}
	else {
		// create new user

		// sanity check. Checks if new registration is allowed
		if (!saml_login_allow_new_users()) {
			register_error(elgg_echo('saml_login:new_user:disabled'));
			forward();
		}

		$password = generate_random_cleartext_password();
		
		$user = new ElggUser();
		$user->username = $username;
		$user->name = $firstname . " " .  $lastname;
		$user->email = $email;
		$user->access_id = ACCESS_PUBLIC;
		$user->salt = generate_random_cleartext_password();
		$user->password = generate_user_password($user, $password);
		$user->owner_guid = 0;
		$user->container_guid = 0;
		$userSave=1;

		$site = elgg_get_site_entity();			
	
		if (!$user->save()) {
			register_error(elgg_echo('saml_login:new_user:bad'));
			forward();
		}
		else {
			system_message(elgg_echo('saml_login:new_user:success'));
			$forward = "profile/{$user->username}";
		}

		// login new user
		if (login($user)) {
			system_message(elgg_echo('saml_login:login:success'));
			saml_enrol_groups($user, $saml_groups);
		}
		else {
			system_message(elgg_echo('saml_login:login:error'));
		}
		
		forward($forward, 'saml_login');
	}
	// register login error
	register_error(elgg_echo('saml_login:login:error'));
	forward();
}

function saml_enrol_groups($user, $user_groups_from_saml=NULL)
{
	if (is_array($user_groups_from_saml)) {
		$user_groups_data_from_elgg = get_users_membership($user->guid);
 		$user_groups_from_elgg = array();
		foreach($user_groups_data_from_elgg as $group_data) {
			$user_groups_from_elgg[] = $group_data->guid;
		}
		$user_groups_from_elgg = array_unique($user_groups_from_elgg);
		$groups_for_subscribe = array_diff($user_groups_from_saml, $user_groups_from_elgg);
		foreach($groups_for_subscribe as $gfs_guid) {
			if($gfs=get_entity($gfs_guid)) {
				groups_join_group($gfs, $user);
				system_message(elgg_echo("groups:joined").', '.$gfs->name);
			}
		}
		$sync_groups = elgg_get_plugin_setting('sync_groups', 'saml_login');
		if($sync_groups == 'yes') {
			$groups_for_unsubscribe = array_diff($user_groups_from_elgg, $user_groups_from_saml);
			foreach($groups_for_unsubscribe as $gfu_guid) {
				if ($gfu=get_entity($gfu_guid)) {
					$gfu->leave($user);
                        	        system_message(elgg_echo("groups:left").' '.$gfu->name);
				}
			}
		}
	}
}
