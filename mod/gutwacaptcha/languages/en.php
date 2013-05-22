<?php
$english = array(
             
    'image:agree' => "Are you human? What code is in the image on the LEFT? *:",
	'sirikinasa:isblank' => "Enter the characters or text shown in the image.",

	'gutwacaptcha:required' => "Sorry, security code entered did not match the text in the image.",
	
	/**
	* Account // tom: used added this from validationbyemail plugin and elgg/languages... this were not trigered when using this plugin!
	*/
	
	'registerok' => "You have successfully registered for %s.",
	'uservalidationbyemail:registerok' => "To activate your account, please confirm your email address by clicking on the link we just sent you.",
	
	
	// catch the automated machines
	
	    'gutwacaptcha:colour' => 'Background color of the register from',
        'gutwacaptcha:emailsiteowner' => 'Email me spammers address',
        'gutwacaptcha:myemailaddress' => 'Email address to send spammers addresses to',
        'gutwacaptcha:spammercaught' => 'Spammer caught',
        'gutwacaptcha:spammerdetails' => 'The email address of the spammer is %s'

	
	
	
	
);

add_translation("en",$english);