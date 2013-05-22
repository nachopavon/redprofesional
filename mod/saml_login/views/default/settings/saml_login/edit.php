<?php
/**
 *
 */
$insert_view = elgg_view('samlsettings/extend');

$simplesamlphppath_string = elgg_echo('saml_login:simplesamlphppath');
$simplesamlphppath_view = elgg_view('input/text', array(
	'name' => 'params[simplesamlphppath]',
	'value' => $vars['entity']->simplesamlphppath,
	'class' => 'elgg-input-thin',
));

$saml_authsource_string = elgg_echo('saml_login:saml_authsource');
$saml_authsource_view = elgg_view('input/text', array(
	'name' => 'params[saml_authsource]',
	'value' => $vars['entity']->saml_authsource,
	'class' => 'elgg-input-thin',
));

$usernamefield_string = elgg_echo('saml_login:usernamefield');
$usernamefield_view = elgg_view('input/text', array(
	'name' => 'params[usernamefield]',
	'value' => $vars['entity']->usernamefield,
	'class' => 'elgg-input-thin',
));

$sign_on_with_saml_string = elgg_echo('saml_login:login');
$sign_on_with_saml_view = elgg_view('input/dropdown', array(
	'name' => 'params[sign_on]',
	'options_values' => array(
		'yes' => elgg_echo('option:yes'),
		'no' => elgg_echo('option:no'),
	),
	'value' => $vars['entity']->sign_on ? $vars['entity']->sign_on : 'yes',
));

$logout_saml_string = elgg_echo('saml_login:logout');
$logout_saml_view = elgg_view('input/dropdown', array(
	'name' => 'params[logout]',
	'options_values' => array(
		'yes' => elgg_echo('option:yes'),
		'no' => elgg_echo('option:no'),
	),
	'value' => $vars['entity']->logout ? $vars['entity']->logout : 'yes',
));

$new_users_with_saml_string = elgg_echo('saml_login:new_users');
$new_users_with_saml_view = elgg_view('input/dropdown', array(
	'name' => 'params[new_users]',
	'options_values' => array(
		'yes' => elgg_echo('option:yes'),
		'no' => elgg_echo('option:no'),
	),
	'value' => $vars['entity']->new_users ? $vars['entity']->new_users : 'no',
));

$update_userdata_with_saml_string = elgg_echo('saml_login:update_userdata');
$update_userdata_with_saml_view = elgg_view('input/dropdown', array(
	'name' => 'params[update_userdata]',
	'options_values' => array(
		'yes' => elgg_echo('option:yes'),
		'no' => elgg_echo('option:no'),
	),
	'value' => $vars['entity']->update_userdata ? $vars['entity']->update_userdata : 'no',
));

$support_groups_string = elgg_echo('saml_login:support_groups');
$support_groups_view = elgg_view('input/dropdown', array(
        'name' => 'params[support_groups]',
        'options_values' => array(
                'yes' => elgg_echo('option:yes'),
                'no' => elgg_echo('option:no'),
        ),
        'value' => $vars['entity']->support_groups ? $vars['entity']->support_groups : 'no',
));

$groupfield_string = elgg_echo('saml_login:groupfield');
$groupfield_view = elgg_view('input/text', array(
        'name' => 'params[groupfield]',
        'value' => $vars['entity']->groupfield,
        'class' => 'elgg-input-thin',
));

$sync_groups_string = elgg_echo('saml_login:sync_groups');
$sync_groups_view = elgg_view('input/dropdown', array(
        'name' => 'params[sync_groups]',
        'options_values' => array(
                'yes' => elgg_echo('option:yes'),
                'no' => elgg_echo('option:no'),
        ),
        'value' => $vars['entity']->sync_groups ? $vars['entity']->sync_groups : 'no',
));


$settings = <<<__HTML
<div>$insert_view</div>
<div>$simplesamlphppath_string $simplesamlphppath_view</div>
<div>$saml_authsource_string $saml_authsource_view</div>
<div>$usernamefield_string $usernamefield_view</div>
<div>$sign_on_with_saml_string $sign_on_with_saml_view</div>
<div>$logout_saml_string $logout_saml_view</div>
<div>$new_users_with_saml_string $new_users_with_saml_view</div>
<div>$update_userdata_with_saml_string $update_userdata_with_saml_view</div>
<div>$support_groups_string $support_groups_view</div>
<div>$groupfield_string $groupfield_view</div>
<div>$sync_groups_string $sync_groups_view</div>
__HTML;

echo $settings;
