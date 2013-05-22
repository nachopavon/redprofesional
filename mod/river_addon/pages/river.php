<?php
/**
 * Main activity stream list page
 */

elgg_load_js('river');

$options = array();

$page_type = preg_replace('[\W]', '', get_input('page_type', 'all'));
$type = preg_replace('[\W]', '', get_input('type', 'all'));
$subtype = preg_replace('[\W]', '', get_input('subtype', ''));

if ($subtype) {
    $selector = "type=$type&subtype=$subtype";
} else {
    $selector = "type=$type";
}

if ($type != 'all') {
    $options['type'] = $type;
    if ($subtype) {
        $options['subtype'] = $subtype;
    }
}

switch ($page_type) {
    case 'mine':
        $title = elgg_echo('river:mine');
        $page_filter = 'mine';
        $options['subject_guid'] = elgg_get_logged_in_user_guid();
        break;
    case 'friends':
        $title = elgg_echo('river:friends');
        $page_filter = 'all';
        $user_guid = elgg_get_logged_in_user_guid();
        $options['relationship_guid'] = $user_guid;
        $options['relationship'] = 'friend';
        $groups_guid = elgg_get_user_groups($user_guid);
        $options['groups_guid'] = $groups_guid;
	break;
    default:
        $title = elgg_echo('river:all');
        $page_filter = 'all';
        break;
}

if (!elgg_is_xhr()) {

	$options['offset'] = (int)(get_input('offset'));
    $options['data-options'] = htmlentities(json_encode($options), ENT_QUOTES, 'UTF-8');

    if ($page_type == 'friends') {

        $offset = $options['offset'];
        $limit = 20;

        if(count($options['groups_guid']) > 0){
            $sql = elgg_get_groups_river_query($options);
            $sql .= " UNION ";
        }

        $sql .= elgg_get_friends_river_query($options);

        $count_query = "SELECT COUNT(id) as total FROM (";
        $count_query .= $sql;
        $count_query .= ") union_count";

        $sql .= " ORDER BY posted DESC";
        $sql .= " LIMIT {$offset},{$limit}";
        $items = get_data($sql, "elgg_row_to_elgg_river_item");

        $count_row = get_data_row($count_query);
        $count = (int)$count_row->total;

        if (!empty($items)) {
            $view_options = array(
                "pagination" => true,
                "count" => $count,
                "items" => $items,
                "list_class" => "elgg-list-river elgg-river",
                "limit" => $limit,
                "offset" => $offset
            );
            $activity = elgg_view('page/components/list', $view_options);
        }
    } else {
        $activity = elgg_list_river($options);
    }

    $content = elgg_view('core/river/filter', array('selector' => $selector));

    $sidebar = elgg_view('core/river/sidebar');

    $params = array(
        'content' => $content . $activity,
        'sidebar' => $sidebar,
        'filter_context' => $page_filter,
        'class' => 'elgg-river-layout',
    );

    $body = elgg_view_layout('content', $params);

    echo elgg_view_page($title, $body);
} else {

    $sync = get_input('sync');
    $ts = (int) get_input('time');
    if (!$ts) {
        $ts = time();
    }
    $options = get_input('options');

    if ($sync == 'new') {
        $options['wheres'] = array("rv.posted > {$ts}");
        $options['order_by'] = 'rv.posted asc';
        $options['limit'] = 0;
    }

    if ($page_type == 'friends'){
        $user_guid = elgg_get_logged_in_user_guid();
        $groups_guid = elgg_get_user_groups($user_guid);
        $options['groups_guid'] = $groups_guid;

        if(count($groups_guid) > 0){
            $sql = elgg_get_groups_river_query($options);
            $sql .= " UNION ";
        }

        $options['relationship_guid'] = $user_guid;
        $options['relationship'] = 'friend';

        $sql .= elgg_get_friends_river_query($options);
        $sql .= " ORDER BY posted ASC";
        $items = get_data($sql, "elgg_row_to_elgg_river_item");
    } else {
        $items = elgg_get_river($options);
    }

	if (is_array($items) && count($items) > 0) {
		foreach ($items as $key => $item) {
			$id = "item-{$item->getType()}-{$item->id}";
			$time = $item->posted;

			$html = "<li id=\"$id\" class=\"elgg-item\" data-timestamp=\"$time\">";
			$html .= elgg_view_list_item($item, $vars = array());
			$html .= '</li>';

			$output[] = $html;
		}
	}
	print(json_encode($output));
	exit;
}


function elgg_get_user_groups($user_guid) {
    $group_options = array(
        "type" => "group",
        "limit" => false
    );
    $group_options['relationship_guid'] = $user_guid;
    $group_options['relationship'] = 'member';
    $groups = elgg_get_entities_from_relationship($group_options);
    foreach ($groups as $group) {
        $groups_guid[$group->name] = $group->getGUID();
    }
    return $groups_guid;
}


function elgg_get_groups_river_query(array $options = array()) {

    $defaults = array(
        'groups_guid'          => array(),

        'types'                => ELGG_ENTITIES_ANY_VALUE,
        'subtypes'             => ELGG_ENTITIES_ANY_VALUE,
        'type_subtype_pairs'   => ELGG_ENTITIES_ANY_VALUE,

        'count'                => FALSE,
        'wheres'               => array(),
    );

    $options = array_merge($defaults, $options);

    $groups_guid = $options['groups_guid'];
    $dbprefix = elgg_get_config("dbprefix");
    $wheres = $options['wheres'];

    if ($options['count']) {
        $query = "SELECT count(DISTINCT rv.id) as total";
    } else {
        $query = "SELECT DISTINCT rv.*";
    }

    $query .= " FROM {$dbprefix}river rv";
    $query .= " INNER JOIN {$dbprefix}entities AS entities1 ON rv.object_guid = entities1.guid";
    $query .= " WHERE (entities1.container_guid in (" . implode(",", $groups_guid) . ")";
    $query .= " OR rv.object_guid IN (" . implode(",", $groups_guid) . "))";

    $type = $options['type'];
    $subtype = $options['subtype'];

    if(!empty($type) && $type != "all"){
        $filter_where = " (rv.type = '" . sanitise_string($type) . "'";

        if(!empty($subtype)){
            $filter_where .= " AND rv.subtype = '" . sanitise_string($subtype) . "'";
        }

        $filter_where .= ")";
        $query .= " AND " . $filter_where;
    }

    $query .= " AND ";

    if(!empty($wheres)){
        foreach ($wheres as $w) {
            $query .= " $w AND ";
    }}

    $query .= get_access_sql_suffix("entities1");
    return $query;
}


function elgg_get_friends_river_query(array $options = array()) {
    global $CONFIG;

    $defaults = array(
        'ids'                  => ELGG_ENTITIES_ANY_VALUE,

        'subject_guids'        => ELGG_ENTITIES_ANY_VALUE,
        'object_guids'         => ELGG_ENTITIES_ANY_VALUE,
        'annotation_ids'       => ELGG_ENTITIES_ANY_VALUE,
        'action_types'         => ELGG_ENTITIES_ANY_VALUE,

        'relationship'         => NULL,
        'relationship_guid'    => NULL,
        'inverse_relationship' => FALSE,

        'types'                => ELGG_ENTITIES_ANY_VALUE,
        'subtypes'             => ELGG_ENTITIES_ANY_VALUE,
        'type_subtype_pairs'   => ELGG_ENTITIES_ANY_VALUE,

        'posted_time_lower'    => ELGG_ENTITIES_ANY_VALUE,
        'posted_time_upper'    => ELGG_ENTITIES_ANY_VALUE,

        'limit'                => 20,
        'offset'               => 0,
        'count'                => FALSE,

        'order_by'             => 'rv.posted desc',
        'group_by'             => ELGG_ENTITIES_ANY_VALUE,

        'wheres'               => array(),
        'joins'                => array(),
    );

    $options = array_merge($defaults, $options);

    $singulars = array('id', 'subject_guid', 'object_guid', 'annotation_id', 'action_type', 'type', 'subtype');
    $options = elgg_normalise_plural_options_array($options, $singulars);

    $wheres = $options['wheres'];

    $wheres[] = elgg_get_guid_based_where_sql('rv.id', $options['ids']);
    $wheres[] = elgg_get_guid_based_where_sql('rv.subject_guid', $options['subject_guids']);
    $wheres[] = elgg_get_guid_based_where_sql('rv.object_guid', $options['object_guids']);
    $wheres[] = elgg_get_guid_based_where_sql('rv.annotation_id', $options['annotation_ids']);
    $wheres[] = elgg_river_get_action_where_sql($options['action_types']);
    $wheres[] = elgg_get_river_type_subtype_where_sql('rv', $options['types'],
        $options['subtypes'], $options['type_subtype_pairs']);

    if ($options['posted_time_lower'] && is_int($options['posted_time_lower'])) {
        $wheres[] = "rv.posted >= {$options['posted_time_lower']}";
    }

    if ($options['posted_time_upper'] && is_int($options['posted_time_upper'])) {
        $wheres[] = "rv.posted <= {$options['posted_time_upper']}";
    }

    $joins = $options['joins'];

    if ($options['relationship_guid']) {
        $clauses = elgg_get_entity_relationship_where_sql(
                'rv.subject_guid',
                $options['relationship'],
                $options['relationship_guid'],
                $options['inverse_relationship']);
        if ($clauses) {
            $wheres = array_merge($wheres, $clauses['wheres']);
            $joins = array_merge($joins, $clauses['joins']);
        }
    }

    // see if any functions failed
    // remove empty strings on successful functions
    foreach ($wheres as $i => $where) {
        if ($where === FALSE) {
            return FALSE;
        } elseif (empty($where)) {
            unset($wheres[$i]);
        }
    }

    // remove identical where clauses
    $wheres = array_unique($wheres);

    if (!$options['count']) {
        $query = "SELECT DISTINCT rv.* FROM {$CONFIG->dbprefix}river rv ";
    } else {
        $query = "SELECT count(DISTINCT rv.id) as total FROM {$CONFIG->dbprefix}river rv ";
    }

    // add joins
    foreach ($joins as $j) {
        $query .= " $j ";
    }

    // add wheres
    $query .= ' WHERE ';

    foreach ($wheres as $w) {
        $query .= " $w AND ";
    }

    $query .= elgg_river_get_access_sql();

    return $query;
}
