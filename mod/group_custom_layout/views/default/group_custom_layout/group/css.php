<?php 
	$group = $vars["group"];
	$layout = $vars["layout"];
?>
<style type="text/css">
<?php 
	if(!empty($layout->enable_background) && $layout->enable_background == 'yes') { ?>
		body {
			background-image: url(<?php echo elgg_get_site_url(); ?>group_custom_layout/get_background/<?php echo $group->getGUID(); ?>) !important;
		}
	<?php 
	}

	if(!empty($layout->enable_colors) && $layout->enable_colors == 'yes') { 
		if(elgg_is_active_plugin('widget_manager') && (elgg_get_plugin_setting('group_enable', 'widget_manager') == 'yes') && $group->widget_manager_enable == 'yes') { ?>		
			.elgg-module-widget > .elgg-head {
				border: 1px solid <?php echo $layout->border_color; ?>;
				background: <?php echo $layout->background_color; ?>; 
			}
			
			.elgg-module-widget > .elgg-body {
				border-left: 1px solid <?php echo $layout->border_color; ?>; 
				border-bottom: 1px solid <?php echo $layout->border_color; ?>; 
				border-right: 1px solid <?php echo $layout->border_color; ?>;
				background: <?php echo $layout->background_color; ?>;
	
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}
			
			.elgg-module-widget > .elgg-head h3,
			.elgg-module-widget > .elgg-head h3 a {
				color: <?php echo $layout->title_color; ?>;
			}	
		<?php } else { ?>
			.elgg-module-group > .elgg-head {
				border: 1px solid <?php echo $layout->border_color; ?>;
				background: <?php echo $layout->background_color; ?>; 
				margin-bottom: 0px;
			}
			
			.elgg-module-group > .elgg-body {
				border-left: 1px solid <?php echo $layout->border_color; ?>; 
				border-bottom: 1px solid <?php echo $layout->border_color; ?>; 
				border-right: 1px solid <?php echo $layout->border_color; ?>;
				background: <?php echo $layout->background_color; ?>;
				padding: 10px;
			}
			
			.elgg-module-group > .elgg-head h3,
			.elgg-module-group > .elgg-head h3 a {
				color: <?php echo $layout->title_color; ?>;
			}
		<?php 
		}
	}
	?>
	</style>