<?php
/**
 * Elgg drop-down login form
 */

if (elgg_is_logged_in()) {
	return true;
}

$login_url = elgg_get_site_url();
if (elgg_get_config('https_login')) {
	$login_url = str_replace("http:", "https:", elgg_get_site_url());
}

$body = elgg_view_form('login', array('action' => "{$login_url}action/login"), array('returntoreferer' => TRUE));

?>
<div id="new-login-dropdown">
	<?php 
		echo elgg_view('output/url', array(
			'href' => 'login#new-login-dropdown-box',
			'rel' => 'popup',
			'class' => '',
			'text' => '<img src="'.elgg_get_site_url().'mod/ect_theme/graphics/login.png" alt="'.elgg_echo('login').'" /></br>'.elgg_echo('login')
		)); 
		echo elgg_view_module('dropdown', '', $body, array('id' => 'new-login-dropdown-box')); 
	?>
</div>
