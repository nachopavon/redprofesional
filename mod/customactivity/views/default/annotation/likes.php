<?php
/**
 * Elgg show the users who liked the object
 *
 * @uses $vars['annotation']
 */

if (!isset($vars['annotation'])) {
	return true;
}

$like = $vars['annotation'];

$user = $like->getOwnerEntity();
if (!$user) {
	return true;
}

$user_icon = elgg_view_entity_icon($user, 'tiny');
$user_link = elgg_view('output/url', array(
	'href' => $user->getURL(),
	'text' => $user->name,
	'is_trusted' => true,
));

$likes_string = elgg_echo('likes:this');

$friendlytime = elgg_view_friendly_time($like->time_created);

if ($like->canEdit()) {	
	$params = array(
			'href' => 'javascript:void(0);',
			'onclick' =>"elgg.likes.deletebylikeid({$like->id});",
			'text' => "<span class=\"elgg-icon elgg-icon-delete float-alt\"></span>",
			'title' =>  elgg_echo('deleteconfirm'),
			'is_trusted' => true,
			);
	$delete_button = elgg_view('output/url', $params);
}

$body = <<<HTML
<p class="mbn">
	$delete_button
	$user_link $likes_string
	<span class="elgg-subtext">
		$friendlytime
	</span>
</p>
HTML;

echo elgg_view_image_block($user_icon, $body);
