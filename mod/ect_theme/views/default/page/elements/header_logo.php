<?php
/**
 * Elgg header logo
 */

$site = elgg_get_site_entity();
$site_url = elgg_get_site_url();

?>
<div class="left-side">
    <h1><a href="<?php echo $site_url; ?>"><?php echo $site->name; ?></a></h1><br>
    <h2><a href="<?php echo $site_url; ?>"><?php echo $site->description ?></a></h2>
</div>

