<?php

elgg_register_event_handler('init', 'system', 'saml_login_init');

function saml_login_init() {
    global $CONFIG;

    // We must set the login views as public to avoid problems related to the walled_garden
    elgg_register_plugin_hook_handler('public_pages', 'walled_garden', 'saml_login_public_pages');

    $base = elgg_get_plugins_path() . 'saml_login';

    $simplesamlphppath = elgg_get_plugin_setting('simplesamlphppath', 'saml_login');

    elgg_register_library('simplesamlphp', "$simplesamlphppath/lib/_autoload.php");
    elgg_register_library('saml_login', "$base/lib/saml_login.php");

    elgg_load_library('saml_login');

    elgg_extend_view('css/elgg', 'saml_login/css');

    // sign on with saml
    if (saml_login_allow_sign_on()) {
        elgg_extend_view('login/extend', 'saml_login/login');
    }

    // register page handler
    elgg_register_page_handler('saml_login', 'saml_login_pagehandler');

	// register SLO handler

	$logout_enabled = elgg_get_plugin_setting('logout', 'saml_login');

	if($logout_enabled == 'yes') {
		elgg_register_event_handler('logout', 'user', 'saml_logout_pagehandler');
	}

}


function saml_login_public_pages($hook, $type, $return_value, $params) {
        $return_value[] = 'saml_login';
        return $return_value;
}

function saml_login_pagehandler($page) {
    global $CONFIG;

    elgg_load_library('simplesamlphp');
	
	$saml_authsource = elgg_get_plugin_setting('saml_authsource', 'saml_login');
	$usernamefield = elgg_get_plugin_setting('usernamefield', 'saml_login');

	if(empty($saml_authsource) || empty($usernamefield)) {
		system_message(elgg_echo('saml_login:config:error'));
		forward();
	}

	try {
		$auth = new SimpleSAML_Auth_Simple($saml_authsource);
	}
	catch (Exception $e) {
		system_message(elgg_echo('saml_login:config:error'). ' '.$e->getMessage());
		forward();
	}

	if ($auth) {
		if (get_input('saml_login')) {
			if (!$auth->isAuthenticated()) {
			    $auth->login();
			}
			else {
				$saml_attributes = $auth->getAttributes();
				if(isset($saml_attributes[$usernamefield]) && !empty($saml_attributes[$usernamefield][0])) {
					$username = $saml_attributes[$usernamefield][0];
				}
				else {
					system_message(elgg_echo('saml_login:login:no_username'));
					forward();
				}
				if (isset($saml_attributes['mail']) && !empty($saml_attributes['mail'][0])) {
					$email = $saml_attributes['mail'][0];
				}
				else if (isset($saml_attributes['irisMainMailAddress']) && !empty($saml_attributes['irisMainMailAddress'][0])) {
					$email = $saml_attributes['irisMainMailAddress'][0];
				}
				else {
					system_message(elgg_echo('saml_login:login:no_mail'));
					forward();
				}

			        $first_name = '';
				if (isset($saml_attributes['cn'])) {
					$first_name = $saml_attributes['cn'][0];
				}
				$last_name = '';
				if (isset($saml_attributes['sn'])) {
					$last_name = $saml_attributes['sn'][0];
				}    	    


				$saml_groups = null;
				$support_groups = elgg_get_plugin_setting('support_groups', 'saml_login');
			        $groupfield = elgg_get_plugin_setting('groupfield', 'saml_login');
				if($support_groups = "yes" && !empty($groupfield) && isset($saml_attributes[$groupfield])) {
					require_once('group_mapping.php');
					if(!isset($group_mapping)) {
						system_message(elgg_echo('saml_login:config:group_mapping_error'));
					}
					else {
						$saml_groups = array();
				                foreach($saml_attributes[$groupfield] as $saml_group) {
							if(isset($group_mapping[$saml_group])) {
								foreach($group_mapping[$saml_group] as $elgg_group) {
									$saml_groups[] = $elgg_group;
								}
							}
						}
					}
				}
				saml_login_login($username, $email, $first_name, $last_name, $saml_groups);
			}
		}
	}
	else {
		system_message(elgg_echo('saml_login:config:error'));
		forward();
	}

}

function saml_logout_pagehandler($page) {
    global $CONFIG;

    elgg_load_library('simplesamlphp');

	$saml_authsource = elgg_get_plugin_setting('saml_authsource', 'saml_login');

	$auth = new SimpleSAML_Auth_Simple($saml_authsource);

	if ($auth->isAuthenticated()) {
	    $auth->logout();
	}
}

