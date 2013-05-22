<?php

	// This parameter controls if default links (profile, logout, etc) must appear in the topbar or not.
	$delete_default_links = true;


	// Include a sencence like this to add a new link to the topbar menu.
	// array_push($topbar_links, new ElggMenuItem('<id>', '<name>', '<url>'));

	$elgg = new ElggMenuItem('elgg', 'Red Social', 'http://ect.int.i-administracion.junta-andalucia.es/');
	$elgg->setLinkClass("current");
	array_push($topbar_links, $elgg);
	array_push($topbar_links, new ElggMenuItem('redmine', 'Proyectos', 'http://redmine.i-administracion.junta-andalucia.es/redmine/'));
	array_push($topbar_links, new ElggMenuItem('foswiki', 'Wiki', 'http://ect.int.i-administracion.junta-andalucia.es/foswiki/'));
	array_push($topbar_links, new ElggMenuItem('etherpadlite', 'Editor colaborativo', 'http://ect.int.i-administracion.junta-andalucia.es/etherpad/'));
	array_push($topbar_links, new ElggMenuItem('bigbluebutton', 'Video Conferencia', 'http://10.240.202.97'));

?>
