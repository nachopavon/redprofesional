<?php
	$redmine_baseurl = $vars['entity']->redmine_baseurl;
	if (!$redmine_baseurl)
		$redmine_baseurl = "https://redmine.i-administracion.junta-anadalucia.es/redmine";

?>
<p>
	<?php echo elgg_echo('redminetags:baseurl'); ?>
	<?php
		echo elgg_view('input/url', array(
			'internalname' => 'params[redmine_baseurl]',
			
			'value' => $redmine_baseurl
		));
	?>
	
</p>
