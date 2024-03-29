<?php

	/**
	 * Tag Cumulus
	 * 
	 * @package tag_cumulus
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Pedro Prez/ura soul
	 */

	if (!empty($vars['subtype'])) {
		$subtype = "&entity_subtype=" . urlencode($vars['subtype']);
	} else {
		$subtype = "";
	}
	if (!empty($vars['object'])) {
		$object = "&entity_type=" . urlencode($vars['object']);
	} else {
		$object = "";
	}
	
	if (!empty($vars['speed']))
		$speed = (int)$vars['speed'];
	else
		{
		$speed = elgg_get_plugin_setting('speed', 'tag_cumulus');
		if ((($speed >= 25) && ($speed <= 500)) != TRUE)
			$speed = TAG_CUMULUS_SPEED;
		}
		
	if (!empty($vars['tcolor_max']))
		$tcolor_max = $vars['tcolor_max'];
	else
		{
		$tcolor_max = elgg_get_plugin_setting('tcolor_max', 'tag_cumulus');
		if ($tcolor_max =='')
			$tcolor_max = TAG_CUMULUS_COLOR_MAX;
		}
	if (!empty($vars['hi_color_max']))
		$hi_color_max = $vars['hi_color_max'];
	else
		{
		$hi_color_max = elgg_get_plugin_setting('hi_color_max', 'tag_cumulus');
		if ($hi_color_max =='')
			$hi_color_max = TAG_CUMULUS_HI_COLOR_MAX;
		}
				
	if (!empty($vars['tcolor']))
		$tcolor = $vars['tcolor'];
	else
		{
		$tcolor = elgg_get_plugin_setting('tcolor', 'tag_cumulus');
		if ($tcolor == '')
			$tcolor = TAG_CUMULUS_T_COLOR;
		}
	if (!empty($vars['tcolor2']))
		$tcolor2 = $vars['tcolor2'];
	else
		{
		$tcolor2 = elgg_get_plugin_setting('tcolor2', 'tag_cumulus');
		if ($tcolor2 =='')
		$tcolor2 = TAG_CUMULUS_T_COLOR2;
		}
	if (!empty($vars['hicolor']))
		$hicolor = $vars['hicolor'];
	else
		{
		$hicolor = elgg_get_plugin_setting('hi_color', 'tag_cumulus');
		if ($hicolor == '')
		$hicolor = TAG_CUMULUS_HI_COLOR;
		}	
	
	if (!empty($vars['wmode']))
		$wmode = $vars['wmode'];
	else
		{
		$wmode = elgg_get_plugin_setting('wmode', 'tag_cumulus');
		if ($wmode =='')
		$wmode = TAG_CUMULUS_WMODE;
		}

	if (!empty($vars['width']))
		$width = $vars['width'];
	else
		{
		$width = elgg_get_plugin_setting('default_width', 'tag_cumulus');
		if ($width == '')
		$width = TAG_CUMULUS_WIDTH;
		}	

	if (!empty($vars['background']))
		$background = $vars['background'];
	else
		{
		$background = elgg_get_plugin_setting('background_color', 'tag_cumulus');
		if ($background='')
		$background = TAG_CUMULUS_BACKGROUND;
		}
	
	
	if (empty($vars['tagcloud']) && !empty($vars['value']))
		$vars['tagcloud'] = $vars['value'];
		
	if (!empty($vars['tagcloud']) && is_array($vars['tagcloud'])) {
        
        $counter = 0;
        $cloud = array();
        $max = 0;
        foreach($vars['tagcloud'] as $tag) {
           	if ($tag->total > $max) {
        		$max = $tag->total;
        	}
        }
       
        foreach($vars['tagcloud'] as $tag) {
            $size = round((log($tag->total) / log($max)) * 100) + 30;
            if($size){
            	
            	switch($size)
			    {
			    	case ($size <= 40):
			    		$style = "9";
			    		break;
			
			    	case ($size <= 60):
			    		$style = "10";
			    		break;
			    		
			    	case ($size <= 80):
			    		$style = "12";
			    		break;
			    		
			    	case ($size <= 100):
			    		$style = "14";
			    		break;
			    		
			    	case ($size <= 120):
			    		$style = "16";
			    		break;
			    		
			    	case ($size <= 140):
			    		$style = "22";
			    		break;
			    	
			    	default:
			    		$style = "9";
			    		break;
			    }
            	
            	$item = new StdClass();
		$item_url =  $vars['url'] . "search?q=". urlencode(utf8_encode($tag->tag));
		
		if ($vars['subtype'])
		  $item_url .=  urlencode(utf8_encode($subtype . $object . "&search_type=tags"));
		$item->url = $item_url;
            	$item->style = $style; 
            	$item->title = htmlentities($tag->tag, ENT_QUOTES, 'UTF-8');
            	
            	$cloud[] = $item;
            }
        }
        
        $cumulus = "";
        if(is_array($cloud) && !empty($cloud)){
        	
        	foreach($cloud as $item){
        		
        		$item_color ='';
				switch($item->style){
					case 9:
						$item_color =  "color='$tcolor' hicolor='$hicolor'";
					break;
					case 10:
						$item_color =  "color='$tcolor' hicolor='$hicolor'";
					break;
					case 12:
						$item_color =  "color='$tcolor2' hicolor='$hicolor'";
					break;
					case 14:
						$item_color =  "color='$tcolor2' hicolor='$hicolor'";
					break;
					case 16:
						$item_color =  "color='$tcolor_max' hicolor='$hi_color_max'";
					break;
					case 22:
						$item_color =  "color='$tcolor_max' hicolor='$hi_color_max'";
					break;
				}
         		$cumulus .= "<a href='{$item->url}' style='{$item->style}' {$item_color}>{$item->title}</a>";
        	}
        }
     }

$height = $width;
?>

<div id="tag_cumulus"><div style="padding: 15px;">please ensure the web browser has the flash plugin and javascript enabled.</div></div>

<script type="text/javascript">
	
	var so = new SWFObject("<?php echo $vars['url'] ?>/mod/tag_cumulus/vendors/tagcloud.swf", "tagcloud", "<?php echo $height; ?>", "<?php echo $width; ?>", "7", "<?php echo $background; ?>");

	// uncomment next line to enable transparency
	so.addParam("wmode", "<?php echo $wmode ?>");
	so.addVariable("hicolor", "<?php echo $hicolor ?>");
	so.addVariable("tcolor", "<?php echo $tcolor ?>");
	so.addVariable("mode", "tags");
	so.addVariable("distr", "true");
	so.addVariable("tspeed", "<?php echo $speed ?>");
	so.addVariable("tagcloud", "<tags><?php echo $cumulus ?></tags>");
	
	so.write("tag_cumulus");
	
</script>
