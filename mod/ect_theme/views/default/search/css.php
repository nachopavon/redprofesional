<?php
/**
 * Elgg Search css
 * 
 */
?>

/**********************************
Search plugin
***********************************/
.elgg-page-header .elgg-search {
    display: block;
    position: absolute;
	bottom: -10px;
    right: 50px;
    padding: 0px 0px 0px 30px;
    height: 27px;
    margin-top: 5px;
    width: 120px;
    vertical-align: middle;
    z-index: 1;
    background: url(<?php echo elgg_get_site_url(); ?>mod/ect_theme/graphics/search.png) no-repeat left top;

}
.elgg-page-header .elgg-search input[type=text] {
	width: 184px;
    max-width: 95%;
}
.elgg-page-header .elgg-search input[type=submit] {
	display: none;
}
.elgg-search input[type=text] {
    background-color: white;
    border: 1px solid #E8E8E8;
    color: #00539F;
    font-size: 12px;
    height: 27px;
    padding: 2px 5px;
    width: 100%;
    margin-top: -3px;
}

.search-list li {
	padding: 5px 0 0;
}
.search-heading-category {
	margin-top: 20px;
	color: #666666;
}

.search-highlight {
	background-color: #bbdaf7;
}
.search-highlight-color1 {
	background-color: #bbdaf7;
}
.search-highlight-color2 {
	background-color: #A0FFFF;
}
.search-highlight-color3 {
	background-color: #FDFFC3;
}
.search-highlight-color4 {
	background-color: #ccc;
}
.search-highlight-color5 {
	background-color: #4690d6;
}
