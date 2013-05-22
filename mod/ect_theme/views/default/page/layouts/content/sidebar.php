<?php
/**
 * Main content sidebar
 *
 * @uses $vars['content] The content for the sidebar
 */

echo $vars['content'];


if(get_input('handler') == 'activity') {
    // Action links from profile        

    if (elgg_is_active_plugin('profile')) {
        echo '<div class="elgg-module elgg-module-aside elgg-module-aside-profile">';
            echo '<div class="elgg-head">';
            echo '<h3>'.elgg_echo('profile').'</h3>';
            echo '</div>';
            echo '<div class="elgg-body elgg-body-profile" >';
            echo elgg_view('profile/owner_block');
            echo '</div>';
        echo '</div>';
    }

    if (elgg_is_active_plugin('elggx_userpoints')) {

        // Userpoints
        echo '<div class="elgg-module elgg-module-aside">';
            echo '<div class="elgg-head">';
            echo '<h3>'.elgg_echo('elggx_userpoints:userpoints').'</h3>';
            echo '</div>';
            echo '<div class="elgg-body">';
            echo elgg_view('widgets/toppoints/view');
            echo '</div>';
        echo '</div>';
    }
}

if(get_input('handler') == 'thewire') {

    if (elgg_is_active_plugin('twitter_api') && elgg_is_active_plugin('twitter')) {
	    $guid = elgg_get_logged_in_user_guid();
        $twitter_name = elgg_get_plugin_user_setting('twitter_name', $guid, 'twitter_api');
        $twitter_num = '4';

        // next Code from 'views/widgets/twitter/content.php' of Twitter Widget plugin, 
        // cant use call to the view due need username and num parameters
        // Use the username of the Twitter Api
        if (!empty($twitter_name)) {
        echo '<div class="elgg-module elgg-module-aside">';
            echo '<div class="elgg-head">';
            echo '<h3>Twitter</h3>';
            echo '</div>';
            echo '<div class="elgg-body">';
    echo '<div id="twitter_widget">
	    <ul id="twitter_update_list"></ul>
	    <p class="visit_twitter"><a href="http://twitter.com/'.$twitter_name.'">ir a mi twitter</a></p>
	    <script src="http://twitter.com/javascripts/blogger.js" type="text/javascript"></script>
	    <script src="http://twitter.com/statuses/user_timeline/'.$twitter_name.'.json?callback=twitterCallback2&amp;count=10" type="text/javascript"></script>
    </div>';

            echo '</div></div>';
        }
    }
}


if(get_input('handler') == 'activity' ||  get_input('handler') == 'thewire') {

    if (elgg_is_active_plugin('members')) {
	    $onlineusers = find_active_users(600,30);	
	
        echo '<div class="elgg-module elgg-module-aside">';
            echo '<div class="elgg-head">';
            echo '<h3>'.elgg_echo('admin:widget:online_users').'</h3>';
            echo '</div>';
            echo '<div class="elgg-body">';
            //     echo $users_online = get_online_users();  // Alternative to see (Image - Name) display mode

		    foreach($onlineusers as $user){
			    echo '<div class="elgg-member">';
			    echo elgg_view_entity_icon($user, 'small') . "</div>";
                
		    }
            echo '</div>';
        echo '</div>';
    }
} 



