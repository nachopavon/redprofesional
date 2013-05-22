<?php
	/**
	 * Redmine tags for elgg.
	 * This is a simple mod which will map issue numbers (#xxxx) and changesets number [xxxx] to a ticket 
	 * or changeset which appear in a blog post or wire posting to a Redmine repo.
	 * 
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ignacio Pavon
	 * @copyright Ignacio Pavon 2011
	 * @link http://www.juntadeandalucia.es
	 */

	function redminetags_init()
	{
		global $CONFIG;
		
		// Register our post processing hook
		register_plugin_hook('display', 'view', 'redminetags_rewrite');
		
		// define views we want to rewrite codes on (means we don't have to process *everything*)
		$CONFIG->redminetags_views = array(
			'object/thewire',
			'object/blog'
	//		'object/riverdashboard'
		);
		 
		// Get the base path
		$CONFIG->redmine_baseurl = get_plugin_setting('redmine_baseurl', 'redminetags');
		
		if (!$CONFIG->redmine_baseurl)
			$CONFIG->redmine_baseurl = "http://redmine.i-administracion.junta-andalucia.es/redmine";
			
		// Sanitise path
		$CONFIG->redmine_baseurl = trim($CONFIG->redmine_baseurl,' /');
		$CONFIG->redmine_baseurl .= "/";
	}
	
	function redminetags_rewrite($hook, $entity_type, $returnvalue, $params)
	{
		global $CONFIG;
		
		$view = $params['view'];
		
		if ((($view)) && (in_array($view, $CONFIG->redminetags_views)))
		{
			// Search and replace ticket numbers
			$returnvalue =  preg_replace_callback('/(#)([0-9]+)/i', 
		       	create_function(
		            '$matches',
		            '
		       			global $CONFIG; 
		       			
		       			return "<a href=\"{$CONFIG->redmine_baseurl}issues/{$matches[2]}\">{$matches[0]}</a>";
		       		'
		    ), $returnvalue);
			
		    // Search and replace changesets
	/*	    $returnvalue =  preg_replace_callback('/(\[)([0-9]+)(\])/i', 
		       	create_function(
		            '$matches',
		            '
		       			global $CONFIG; 
		       			
		       			return "<a href=\"{$CONFIG->redmine_baseurl}changeset/{$matches[2]}\">{$matches[0]}</a>";
		       		'
		    ), $returnvalue);*/
		    
		    return $returnvalue;
		}
	}
	
	register_elgg_event_handler('init','system','redminetags_init');
?>
