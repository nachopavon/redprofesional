<?php
/**
 * EPU activity river view
 */

$object = $vars['item']->getObjectEntity();
$tags = $object->getTags();

$subject = get_entity($object->owner_guid);
$subject_link = elgg_view('output/url', array(
    'href' => $subject->getURL(),
    'text' => $subject->name,
    'class' => 'elgg-river-subject',
));

$object_link = elgg_view('output/url', array(
    'href' => $object->source_link,
    'text' => $object->title,
    'class' => 'elgg-river-object',
));

$summary = $subject_link . " created " . $object_link;
if (!empty($tags) && is_array($tags)) { 
    $tags_links = array();
    //tags must be an array
    foreach ($tags as $tag) {
        $tag_link = elgg_view('output/url', array(
            'href' => 'search?q=' . $tag .'&search_type=tags',
            'text' => $tag,
            'class' => 'elgg-river-object',
        ));
        $tags_links[] = $tag_link;
    }
    $summary .= " with tags: " . implode(',', $tags_links);
}

echo elgg_view('river/item', array(
    'item' => $vars['item'],
    'message' => $object->description,
    'summary' => $summary
));
?>
