<?php
/**
 * Elgg page header
 * In the default theme, the header lives between the topbar and main content area.
 */

echo '<div id="wrapper_header">';
// link back to main site.
echo elgg_view('page/elements/header_logo', $vars);

// drop-down login

echo '<div class="right-side">';
echo elgg_view('core/account/new_login_dropdown');
echo elgg_view('core/account/register');
echo elgg_view('core/account/links');
echo '</div>';
echo '</div>';

// insert site-wide navigation
echo elgg_view_menu('site');
