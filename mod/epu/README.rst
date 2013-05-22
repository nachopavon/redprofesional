This is a Elgg plugin to expose everything necessary by EPU script.


REQUIREMENTS
============

 - Elgg plugins: userpoints, apiadmin. They need to be activated in the
   administration panel control.
   (apiadmin 1.8b1: http://community.elgg.org/pg/plugins/download/730552)
   (userpoints: http://community.elgg.org/pg/plugins/download/813381) 

 - Ldap Auth 0.1 is needed. Even if this plugin gives a compatibilty
   warning with Elgg 1.8 it works. The username filter attribute should be
   ``uid``. The search attributes, in normal conditions, should be
   ``firstname:givenname, lastname:sn, mail:mail``. Make sure that the
   ``Create Users`` option is enabled.
   Ldap Auth rlso require ldap-utils and php5-ldap. Restart apache2 after
   install these  libraries.

 - The username length must be longer than 5 characters

 - The email must be unique. When a user tries to log in for the first time
   it will only work if no user exists in the database with the same email.
   This includes the admin user.

 - Tagcloud plugin needs to be activated in order to be able to add the
   tagcloud widget to each user. This plugin comes with the standard Elgg
   distribution.

 - Elgg version 1.8.


INSTALLATION
============

 - Copy the ``epu`` directory to the mod directory in an Elgg
   installation.


TROUBLESHOOTING
===============

 - If you have problems accessing the Elgg MySQL database with the elgg
   MySQL user try granting access for ``localhost`` only instead of the
   generic ``%``. Thus, instead of creating the elgg user as described in
   the official documentation: ``CREATE USER myuser IDENTIFIED BY
   'mypassword';``, try: CREATE USER myuser @ 'localhost' IDENTIFIED BY
   'mypassword';

 - Setting the timezone in the ``php.ini`` avoids some strange errors
   derived from the ``date()`` builtin function. I don't know if they
   are relevant though.

 - If LDAP authentication works but Elgg gives an error message reporting
   the user couldn't be created make sure all the fields in LDAP required
   by the plugin are present when mapping. They should normally be:
   ``givenname, sn and mail``.
   If you decide to use LDAP authentication, be careful that no one 
   try to register in elgg by the normal way. (The old credentials may 
   conflict with those provided by the ldap).

 - If there are problems displaying the bugs. Try to clean the view
   cache by accessing ``/upgrade.php``


DEBUGGING
=========

These are the steps to setup XDebug with NetBeans. You can choose any
other way to debug PHP.

 - Install XDebug.

 - Configure ``php.ini``.

   zend_extension=/usr/lib/php/modules/xdebug.so
   xdebug.remote_enable=on xdebug.remote_host=127.0.0.1
   xdebug.remote_port=9000 xdebug.remote_handler=dbgp

 - Start a PHP project in NetBeans with making the elgg directory
   project folder.

 - In PHP NetBeans options set evaluate variables and unset open
   window (so that it doesn't open browser windows).

 - If debugging EPU, add URL parameter to ``post_elgg_activity``
   function: params['XDEBUG_SESSION_START'] = 'netbeans-xdebug'

 - Set breakpoints in the code with NetBeans and run the debugger.

 - Run EPU main script.


TESTING API
===========

 - You can delete all activity using
   ``http://<DOMAIN/PATH_TO_ELGG_ROOT>/services/api/rest/xml/?method=delete_activity``
   API function.  For this to work properly you have to be logged as
   admin.
