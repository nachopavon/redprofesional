<?php
/**
 * Elgg User acctions link
 */

if (!elgg_is_logged_in()) {
	return true;
}

$elgg_site = elgg_get_site_url();

if (elgg_is_admin_logged_in()) {

echo '<div id="admin" class="header-links">';

echo elgg_view('output/url', array(
        'href' => '/admin',
        'text' => '<img src="'.$elgg_site.'mod/ect_theme/graphics/administration.png" alt="'.elgg_echo('admin').'" /></br>'.elgg_echo('admin'),
        'class' => '',
));

echo '</div>';

}
?>

<div id="dashboard" class="header-links">
<?php
echo elgg_view('output/url', array(
        'href' => '/dashboard',
        'text' => '<img src="'.$elgg_site.'mod/ect_theme/graphics/dashboard.png" alt="'.elgg_echo('dashboard').'" /></br>'.elgg_echo('dashboard'),
        'class' => '',
));
?>
</div>
<div id="mail" class="header-links">
<?php
echo elgg_view('output/url', array(
        'href' => '/messages/inbox/'.elgg_get_logged_in_user_entity()->username,
        'text' => '<img src="'.$elgg_site.'mod/ect_theme/graphics/mail.png" alt="'.elgg_echo('messages:inbox').'" /></br>'.elgg_echo('messages:inbox'),
        'class' => '',
));
?>
</div>
<div id="profile" class="header-links">
<?php
echo elgg_view('output/url', array(
        'href' => '/profile/'.elgg_get_logged_in_user_entity()->username,
        'text' => '<img src="'.$elgg_site.'mod/ect_theme/graphics/profile.png" alt="'.elgg_echo('profile').'" /></br>'.elgg_echo('profile'),
        'class' => '',
));
?>
</div>
<div id="settings" class="header-links">
<?php
echo elgg_view('output/url', array(
        'href' => '/settings',
        'text' => '<img src="'.$elgg_site.'mod/ect_theme/graphics/settings.png" alt="'.elgg_echo('settings').'" /></br>'.elgg_echo('settings'),
        'class' => '',
));
?>
</div>
<div id="logout.png" class="header-links">
<?php
echo elgg_view('output/url', array(
        'href' => 'action/logout',
        'text' => '<img src="'.$elgg_site.'mod/ect_theme/graphics/logout.png" alt="'.elgg_echo('logout').'" /></br>'.elgg_echo('logout'),
        'class' => '',
        'is_action' => TRUE,
));
?>
</div>
