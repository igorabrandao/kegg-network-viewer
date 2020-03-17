<?php
	// PROTECT FROM DIRECT ACCESS
	if ( ! defined('ABSPATH') ) exit;

	// START SESSION
	session_start();

	// CHOOSE THE OPERATION MODE
	if ( ! defined('DEBUG') || DEBUG === false )
	{
		// HIDDE ALL ERRORS
		error_reporting(0);
		ini_set("display_errors", 0); 
	}
	else
	{
		// SHOW ALL ERRORS
		error_reporting(E_ALL);
		ini_set("display_errors", 1); 
	}

	// GLOBAL FUNCTIONS
	require_once ABSPATH . '/functions/global-functions.php';

	// SYSTEM IGNITION!!!
	$igor_mvc = new IgorMVC();
?>