<?php
	/**
	 * View a single page
	 *
	 * @package ElggPages
	 */
	
	$page_guid = (int) get_input('guid');
	$page = get_entity($page_guid);
	if (!$page) {
		forward();
	}
	
	// load pages library
	elgg_load_library('elgg:pages');
	
	elgg_set_page_owner_guid($page->getContainerGUID());
	
	group_gatekeeper();
	
	$container = elgg_get_page_owner_entity();
	
	$title = $page->title;
	
	// make breadcrumb
	elgg_push_breadcrumb(elgg_echo("pages"), "pages/all");
	if (elgg_instanceof($container, 'group')) {
		elgg_push_breadcrumb($container->name, "pages/group/$container->guid/all");
	} else {
		elgg_push_breadcrumb($container->name, "pages/owner/$container->username");
	}
	pages_prepare_parent_breadcrumbs($page);
	elgg_push_breadcrumb($title);
	
	$content = elgg_view_entity($page, array('full_view' => true));
	
	if($page->allow_comments != "no"){
		$content .= elgg_view_comments($page);
	}
	
	// can add subpage if can edit this page and write to container (such as a group)
	if ($page->canEdit() && $container->canWriteToContainer(0, 'object', 'page')) {
		$url = "pages/add/$page->guid";
		elgg_register_menu_item('title', array(
				'name' => 'subpage',
				'href' => $url,
				'text' => elgg_echo('pages:newchild'),
				'link_class' => 'elgg-button elgg-button-action',
		));
	}
	
	elgg_load_css("lightbox");
	elgg_load_js("lightbox");
	
	elgg_register_menu_item('title', array(
						'name' => 'export',
						'href' => "pages/export/" . $page->getGUID(),
						'text' => elgg_echo('export'),
						'link_class' => 'elgg-button elgg-button-action pages-tools-lightbox',
	));
	$body = elgg_view_layout('content', array(
		'filter' => '',
		'content' => $content,
		'title' => $title,
		'sidebar' => elgg_view('pages/sidebar/navigation'),
	));
	
	echo elgg_view_page($title, $body);
