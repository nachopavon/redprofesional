<?php
/**
 * Elgg register link
 */

if (elgg_is_logged_in()) {
	return true;
}

?>
<div id="register">
<?php
echo elgg_view('output/url', array(
        'href' => '/register',
        'text' => '<img src="'.elgg_get_site_url().'mod/ect_theme/graphics/register.png" alt="'.elgg_echo('register').'" /></br>'.elgg_echo('register'),
        'class' => '',
));
?>
</div>
