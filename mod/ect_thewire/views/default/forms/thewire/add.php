<?php
/**
 * Wire add form body
 *
 * @uses $vars['post']
 */

elgg_load_js('elgg.thewire');

$post = elgg_extract('post', $vars);

$text = elgg_echo('post');
$text_twitter = elgg_echo('thewire:tweet');
if ($post) {
	$text = elgg_echo('thewire:reply');
    $text_twitter = elgg_echo('thewire:reply_tweet');
}

if ($post) {
	echo elgg_view('input/hidden', array(
		'name' => 'parent_guid',
		'value' => $post->guid,
	));
}

echo elgg_view('input/plaintext', array(
	'name' => 'body',
	'class' => 'mtm',
	'id' => 'thewire-textarea',
));
?>
<div id="thewire-characters-remaining">
	<span>140</span> <?php echo elgg_echo('thewire:charleft'); ?>
</div>
<div class="elgg-foot mts">
<?php

echo elgg_view('input/submit', array(
        'name' => "tweet",
	'value' => $text,
	'id' => 'thewire-submit-button',
));


// check twitter is active
$access_key = elgg_get_plugin_user_setting('access_key', $user_guid, 'twitter_api');
$access_secret = elgg_get_plugin_user_setting('access_secret', $user_guid, 'twitter_api');
if ($access_key && $access_secret) {
        echo elgg_view('input/submit', array(
                'name' => "tweet",
                'value' => $text_twitter,
                'id' => 'thewire-submit-button',
        ));
}

?>
</div>
