<?php
 /***************************************************************************
	*                            TwizaNex Smart Community Software
	*                            ---------------------------------
	*  Start.php:  gutwacaptcha for Elgg 1.8.Z
    *	
	*     begin                : Mon Mar 23 2011
	*     copyright            : (C) 2011 TwizaNex Group
	*     website              : http://www.TwizaNex.com/
	* This file is part of TwizaNex - Smart Community Software
	*
	* @package Twizanex
	* @link http://www.twizanex.com/
	* TwizaNex is free software. This work is licensed under a GNU Public License version 2. 
	* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
	* @author Tom Ondiba <twizanex@yahoo.com>
	* @copyright Twizanex Group 2011
	* TwizaNex is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
	* without even the implied warranty of  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
	* See the GNU Public License version 2 for more details. 
	* For any questions or suggestion write to write to twizanex@yahoo.com
	***************************************************************************/


function gutwacaptcha_init() 
    {
	  //put the check at the very end
	  elgg_extend_view('register/extend', 'gutwacaptcha/register', 1000);
      elgg_extend_view('forgottenpassword/extend', 'gutwacaptcha/register', 999);

	 //block user registration if they don't check the box
	 elgg_register_plugin_hook_handler('action', 'register', 'gutwacaptcha_register_hook');
	 //elgg_register_plugin_hook_handler('action', 'register', 'process_si_contact_form');
	
	 // Register a function that provides some default override actions 
	 
    elgg_register_plugin_hook_handler('action', 'user/requestnewpassword', 'gutwacaptcha_register_hook'); 
	
	}
		
		
    /***********************TM: Here The Magic begins*********************************/

    function gutwacaptcha_register_hook() {
	 
        // this makes the page to be sticky so that the user does not loss the information!
		
		elgg_make_sticky_form('register');
		
        // The form processor PHP code

            $captcha = get_input('sirisana_input'); 
            
	   // get the form input to check if the input is empty and trow error if empty

		$siritupu = get_input('sirisana_input');	
 	
	    if (empty($siritupu)){	
		register_error(elgg_echo('sirikinasa:isblank'));		
		forward(REFERER);	}

	    if (!include_once(dirname(dirname(__FILE__)) . "/gutwacaptcha/securimage.php"))
		{
		// this is for debugging for testing... it helps to know if the file is right 
	  //  echo "Could not load file. Please check your Elgg captcha file (securimage.php) for all required files."; 
	    }
	
        $securimage = new Securimage();

        if ($securimage->check($captcha) == false) {
        $errors['captcha_error'] = register_error(elgg_echo('gutwacaptcha:required'));
		
		// Forward on success, assume everything else is an error...
		forward(REFERER); // Get our of here !Huh huh
	    } 
    
        }

    // make sure it comes after all the plugins priority 1001
	elgg_register_event_handler('init', 'system', 'gutwacaptcha_init'); // Here we go, Have fun

