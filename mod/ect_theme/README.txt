This is a Elgg plugin that provide the ECT style based on the
"Seashells Theme for Elgg" of Ismayil Khayredinov.


REQUIREMENTS
============

 - Elgg version 1.8.

OPTIONALS
=========

 - If "Twitter Widget 1.7" and "Twitter API 1.8" are activated and the user set
   his twitter account then "twitter widget" appear in "thewire view"

 - If "members plugin" is activated then "online user" are displayed in 
   "thewire" and "activity" views.

 - If "elggx_userpoints" plugin is activated then "userpoints" are displayed in
   the "activity view".

 - If "profile" plugin is activated then a subset of profile view is displayed
   in the "activity view".


INSTALLATION
============

 - Copy the ``ect_theme`` directory to the mod directory in an Elgg installation.
   Later activate the plugin and move it at the bottom (need to be the plugin latest
   rendered due his code must overwrite others plugin's code).


USAGE
=====

/start.php          Usefull to change logic at the begining of the execution. 
				    (For example: change a menu, extend views)

/graphics           Contains all the pics, if you need to include new pics add
                    them to this folder

/views/default/css  This folder contains all the "css", files are php in order 
                    to let developers build the css based on some parameters.
                    (For example is common to use elgg_get_site_url() to set the
					 src of images)
					The folder is well structured and each file contain the css
					of a part of the site, but the fast method to change one css
                    is to search the "id" or "class_name" in all files with a
                    rgrep command.

/views/default/core Contains files to overwrite the core logic (login, register
					and page_header links).

/views/default/group Contains files to overwrite the group logic (adding group 
					 detail to the group view in the dashboard view.

/views/default/page/elements This folder include files that overwrite site logic
							 (header, footer and thewire-form)


/views/default/page/layaout/ This folder contains 'content/sidebar.php' used 
							 to add some logic to differents views at the
							 sidebar section.


/views/default/search Include css to change the search-box style.

/views/default/thewire Include css to change thewire plugin style.



TROUBLESHOOTING
===============

When enabling this theme some cache problems could appear so take care of the
cache issue
