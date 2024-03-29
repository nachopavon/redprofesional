<?php
/**
 * Navigation
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

/* ***************************************
	PAGINATION
*************************************** */
.elgg-pagination {
	margin: 10px 0;
	display: block;
	text-align: center;
}
.elgg-pagination li {
	display: inline;
	margin: 0 6px 0 0;
	text-align: center;
}
.elgg-pagination a, .elgg-pagination span {
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	
	padding: 2px 6px;
	color: #4690d6;
	border: 1px solid #4690d6;
	font-size: 12px;
}
.elgg-pagination a:hover {
	background: #4690d6;
	color: white;
	text-decoration: none;
}
.elgg-pagination .elgg-state-disabled span {
	color: #CCCCCC;
	border-color: #CCCCCC;
}
.elgg-pagination .elgg-state-selected span {
	color: #555555;
	border-color: #555555;
}

/* ***************************************
	TABS
*************************************** */
.elgg-tabs {
	margin-bottom: 5px;
	border-bottom: 2px solid #cccccc;
	display: table;
	width: 100%;
}
.elgg-tabs li {
	float: left;
	border: 2px solid #ccc;
	border-bottom: 0;
	background: #eee;
	margin: 0 0 0 10px;
	
	-webkit-border-radius: 5px 5px 0 0;
	-moz-border-radius: 5px 5px 0 0;
	border-radius: 5px 5px 0 0;
}
.elgg-tabs a {
	text-decoration: none;
	display: block;
	padding: 3px 10px 0 10px;
	text-align: center;
	height: 21px;
	color: #999;
}
.elgg-tabs a:hover {
	background: #dedede;
	color: #4690D6;
}
.elgg-tabs .elgg-state-selected {
	border-color: #ccc;
	background: white;
}
.elgg-tabs .elgg-state-selected a {
	position: relative;
	top: 2px;
	background: white;
}

/* ***************************************
	BREADCRUMBS
*************************************** */
.elgg-breadcrumbs {
	font-size: 80%;
	font-weight: bold;
	line-height: 1.2em;
	color: #bababa;
}
.elgg-breadcrumbs > li {
	display: inline-block;
}
.elgg-breadcrumbs > li:after{
	content: "\003E";
	padding: 0 4px;
	font-weight: normal;
}
.elgg-breadcrumbs > li > a {
	display: inline-block;
	color: #999;
}
.elgg-breadcrumbs > li > a:hover {
	color: #0054a7;
	text-decoration: underline;
}

.elgg-main .elgg-breadcrumbs {
	position: relative;
	top: -2px;
	left: 0;
}

/* ***************************************
	TOPBAR MENU
*************************************** */
.elgg-menu-topbar {
	float: left;
}

.elgg-menu-topbar > li {
	float: left;
}

.elgg-menu-topbar > li > a {
	padding: 2px 15px 0;
    font-weight: bolder;
	color: #eee;
	margin-top: 1px;
}

.elgg-menu-topbar > li > a:hover {
    color: #FF941A;
	text-decoration: none;
    font-weight: bolder;
}

.elgg-menu-topbar-alt {
	float: right;
}

.elgg-menu-topbar .elgg-icon {
	vertical-align: middle;
	margin-top: -1px;
}

.elgg-menu-topbar > li > a.elgg-topbar-logo {
	margin-top: 0;
	padding-left: 5px;
	width: 38px;
	height: 20px;
}

.elgg-menu-topbar > li > a.elgg-topbar-avatar {
	width: 18px;
	height: 18px;
}

.elgg-menu-topbar .elgg-menu-item-messages  {
        display: none;
}

/* ***************************************
	SITE MENU
*************************************** */
.elgg-menu-site {
	z-index: 1;
}

.elgg-menu-site > li > a {
	font-weight: bold;
	padding: 3px 13px 0px 13px;
}

.elgg-menu-site > li > a:hover {
	text-decoration: none;
}


.elgg-menu-site-default {
    background: none repeat scroll 0 0 #F4F4F4;
    border: 2px solid #E8E8E8;
    bottom: -15px;
    height: 40px;
    left: 0;
    padding-bottom: 0;
    padding-right: 40px;
    margin-left: 0px;
    padding-top: 0;
    position: absolute;
    width: 990px;
}

.elgg-menu-site-default > li {
	float: left;
	margin-right: 1px;
    height: 23px;
    background: #F4F4F4;
    padding-top:8px;
}

.elgg-menu-site-default > li > a {
    text-decoration: none;
    color: black;
    position: relative;
    text-transform: uppercase;
    font: normal normal normal 11px/18px 'Trebuchet MS', Arial, Helvetica, Tahoma, sans-serif;
    font-weight: bold;
    
}


.elgg-menu-site-default > li:hover {
    background: #FFFFFF;
    height: 32px;
    padding-top:8px;
    
}


.elgg-menu-site-default > .elgg-state-selected > a,
.elgg-menu-site-default > li:hover > a {
    color:#00539F;
    padding-left:25px;
}

.elgg-menu-site-default > .elgg-menu-item-activity:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Activity_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-blog:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Blogs_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-bookmarks:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Bookmarks_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-file:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Files_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-groups:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Groups_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-members:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Members_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-pages:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Pages_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-thewire:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/The_wire_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-events:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Event_calendar_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-polls:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Polls_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-encuestas:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Polls_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-videos:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Videos_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-questions:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Questions_icon.png) no-repeat 5px;
}
.elgg-menu-site-default > .elgg-menu-item-photos:hover > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/Photos_icon.png) no-repeat 5px;
}


.elgg-body-profile > div {
    padding: 10px 0 0 !important;
}

.elgg-module-aside-profile {
    min-width: 210px !important;
}


.groupdetails {
    float: right;
    padding-right: 10px;
    position: relative;
}
.elgg-menu-site-more {
	display: none;
	position: relative;
	left: -1px;
	width: 100%;
	z-index: 1;
	min-width: 150px;
	border: 1px solid #999;
	border-top: 0;
	
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
	
	-webkit-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
}

li:hover > .elgg-menu-site-more {
	display: block;
}

.elgg-menu-site-more > li > a {
	background: white;
	color: #555;
	
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
	
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
}
.elgg-menu-site-more > li > a:hover {
	background: #4690D6;
	color: white;
}
.elgg-menu-site-more > li:last-child > a,
.elgg-menu-site-more > li:last-child > a:hover {
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}

.elgg-more > a:before {
	content: "\25BC";
	font-size: smaller;
	margin-right: 4px;
}

/* ***************************************
	TITLE
*************************************** */
.elgg-menu-title {
	float: right;
}

.elgg-menu-title > li {
	display: inline-block;
	margin-left: 4px;
}

/* ***************************************
	FILTER MENU
*************************************** */
.elgg-menu-filter {
	margin-bottom: 5px;
	border-bottom: 2px solid #ccc;
	display: table;
	width: 100%;
}
.elgg-menu-filter > li {
	float: left;
	border: 2px solid #ccc;
	border-bottom: 0;
	background: #eee;
	margin: 0 0 0 10px;
	
	-webkit-border-radius: 5px 5px 0 0;
	-moz-border-radius: 5px 5px 0 0;
	border-radius: 5px 5px 0 0;
}
.elgg-menu-filter > li:hover {
	background: #dedede;
}
.elgg-menu-filter > li > a {
	text-decoration: none;
	display: block;
	padding: 3px 10px 0;
	text-align: center;
	height: 21px;
	color: #999;
}
.elgg-menu-filter > li > a:hover {
	background: #dedede;
	color: #4690D6;
}
.elgg-menu-filter > .elgg-state-selected {
	border-color: #ccc;
	background: white;
}
.elgg-menu-filter > .elgg-state-selected > a {
	position: relative;
	top: 2px;
	background: white;
}

/* ***************************************
	PAGE MENU
*************************************** */
.elgg-menu-page {
	margin-bottom: 15px;
}

.elgg-menu-page a {
	display: block;
	
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	
	background-color: white;
	margin: 0 0 3px;
	padding: 2px 4px 2px 8px;
}
.elgg-menu-page a:hover {
	background-color: #0054A7;
	color: white;
	text-decoration: none;
}
.elgg-menu-page li.elgg-state-selected > a {
	background-color: #4690D6;
	color: white;
}
.elgg-menu-page .elgg-child-menu {
	display: none;
	margin-left: 15px;
}
.elgg-menu-page .elgg-menu-closed:before, .elgg-menu-opened:before {
	display: inline-block;
	padding-right: 4px;
}
.elgg-menu-page .elgg-menu-closed:before {
	content: "\002B";
}
.elgg-menu-page .elgg-menu-opened:before {
	content: "\002D";
}

/* ***************************************
	HOVER MENU
*************************************** */
.elgg-menu-hover {
	display: none;
	position: absolute;
	z-index: 10000;

	width: 165px;
	border: solid 1px;
	border-color: #E5E5E5 #999 #999 #E5E5E5;
	background-color: #FFF;
	
	-webkit-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
	-moz-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
	box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
}
.elgg-menu-hover > li {
	border-bottom: 1px solid #ddd;
}
.elgg-menu-hover > li:last-child {
	border-bottom: none;
}
.elgg-menu-hover .elgg-heading-basic {
	display: block;
}
.elgg-menu-hover a {
	padding: 2px 8px;
	font-size: 92%;
}
.elgg-menu-hover a:hover {
	background: #ccc;
	text-decoration: none;
}
.elgg-menu-hover-admin a {
	color: red;
}
.elgg-menu-hover-admin a:hover {
	color: white;
	background-color: red;
}


/* ***************************************
	Profile MENU
*************************************** */

#profile-owner-block > .elgg-menu-owner-block li a {
    color: #00539F;
    text-decoration: none;
    outline: none;
    font-weight: bolder;
    padding-left: 25px;
}

#profile-owner-block > .elgg-menu-owner-block li a:hover {
    color: #FF941A;
    text-decoration: none;
    outline: none !important;
    font-weight: bolder;
    background-color: white;
}


#profile-owner-block > .elgg-menu-owner-block > .elgg-menu-item-blog > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/profile/blog.png) no-repeat 3px white;
}
#profile-owner-block > .elgg-menu-owner-block > .elgg-menu-item-file > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/profile/file.png) no-repeat 3px white;
}
#profile-owner-block > .elgg-menu-owner-block > .elgg-menu-item-bookmarks > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/profile/bookmarks.png) no-repeat 3px white;
}
#profile-owner-block > .elgg-menu-owner-block > .elgg-menu-item-thewire > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/profile/messages.png) no-repeat 3px white;
}
#profile-owner-block > .elgg-menu-owner-block > .elgg-menu-item-photos > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/profile/photos.png) no-repeat 3px white;
}
#profile-owner-block > .elgg-menu-owner-block > .elgg-menu-item-pages > a {
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/profile/pages.png) no-repeat 3px white;
}


/* ***************************************
	FOOTER
*************************************** */
.elgg-menu-footer > li,
.elgg-menu-footer > li > a {
	display: inline-block;
	color:#999;
}

.elgg-menu-footer > li:after {
	content: "\007C";
	padding: 0 4px;
}

.elgg-menu-footer-default {
	float: right;
}

.elgg-menu-footer-alt {
	float: left;
}

/* ***************************************
	ENTITY AND ANNOTATION
*************************************** */
<?php // height depends on line height/font size ?>
.elgg-menu-entity, elgg-menu-annotation {
	float: right;
	margin-left: 15px;
	font-size: 90%;
	color: #aaa;
	line-height: 16px;
	height: 16px;
}
.elgg-menu-entity > li, .elgg-menu-annotation > li {
	margin-left: 15px;
}
.elgg-menu-entity > li > a, .elgg-menu-annotation > li > a {
	color: #aaa;
}
<?php // need to override .elgg-menu-hz ?>
.elgg-menu-entity > li > a, .elgg-menu-annotation > li > a {
	display: block;
}
.elgg-menu-entity > li > span, .elgg-menu-annotation > li > span {
	vertical-align: baseline;
}

/* ***************************************
	OWNER BLOCK
*************************************** */
.elgg-menu-owner-block li a {
	display: block;
	
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	
	background-color: white;
	margin: 3px 0 5px 0;
	padding: 2px 4px 2px 8px;
}
.elgg-menu-owner-block li a:hover {
	background-color: #0054A7;
	color: white;
	text-decoration: none;
}
.elgg-menu-owner-block li.elgg-state-selected > a {
	background-color: #4690D6;
	color: white;
}

/* ***************************************
	LONGTEXT
*************************************** */
.elgg-menu-longtext {
	float: right;
}

/* ***************************************
	RIVER
*************************************** */
.elgg-menu-river {
	float: right;
	margin-left: 15px;
	font-size: 90%;
	color: #aaa;
	line-height: 16px;
	height: 16px;
}
.elgg-menu-river > li {
	display: inline-block;
	margin-left: 5px;
}
.elgg-menu-river > li > a {
	color: #aaa;
	height: 16px;
}
<?php // need to override .elgg-menu-hz ?>
.elgg-menu-river > li > a {
	display: block;
}
.elgg-menu-river > li > span {
	vertical-align: baseline;
}

/* ***************************************
	SIDEBAR EXTRAS (rss, bookmark, etc)
*************************************** */
.elgg-menu-extras {
	margin-bottom: 20px;
}
