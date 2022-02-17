<?php
	/*** GENERAL CONFIG's ***/

	// EXECUTION TIME
	define( 'NO_TIMEOUT_PROCESSING', -1 );
	ini_set('MAX_EXECUTION_TIME', -1);

    // OS
	define( 'OS', strtoupper(substr(PHP_OS, 0, 3)) );

	// ROOT PATH
	define( 'ABSPATH', dirname( __FILE__ ) );

	// UPLOAD URI
	define( 'UP_ABSPATH', ABSPATH . '/resources/' );

	// NETOWRKS URI
	define( 'NETWORK_ABSPATH', ABSPATH . '/resources/networks/' );

	// CHMOD FULL PERMISSION
	define( 'FULL_PERMISSION', 0777 );

	// HOME URI
	define( 'HOME_URI', 'http://localhost/kpv' );

	// ACTIVE TAB
	$GLOBALS['ACTIVE_TAB'] = 'Painel_Controle';

	// ACTIVE COOKIE
	$GLOBALS['ACTIVE_COOKIE'] = '';

	// SESSION_COOKIE
	define( 'SESSION_COOKIE', 'INT' );

	// HOSTNAME
	define( 'HOSTNAME', 'localhost' );

	// DB NAME
	define( 'DB_NAME', 'kpv' );

	// DB USER
	define( 'DB_USER', 'root' );

	// DB PASSWORD
	define( 'DB_PASSWORD', 'Q<S/KhJ/Mxr{)a{JqyB^,ua44?PJqu' );

	// PDO's CONNECTION CHARSET
	define( 'DB_CHARSET', 'utf8' );

	// IF DEVELOPING KEEP TRUE!
	define( 'DEBUG', true );

	// MAX FILE_UPLOAD SIZE
	define( 'MAX_FILE_SIZE', (1024*10000) ); //100 MB

	// RSCRIPT PATH
	define( 'RPROJECT_PATH', '/mnt/64AE6120AE60EBCC/Arquivos\ Igor/Faculdades/UFRN/4\ -\ Mestrado/Pesquisas/System\ biology\ approaches\ in\ the\ investigation\ of\ bottlenecks\ in\ KEGG\ pathways/KeggPathwayAPs' );
	define( 'RSCRIPT_PATH', '/bin/functions/dynamicGraph.R' );
	define( 'RSCRIPT_OUTPUT', '/output/network' );

	/*** DO NOT EDIT FROM HERE!!! ***/

	// LOADER CALLING (SYSTEM IGNITION)
	require_once ABSPATH . '/loader.php';
?>
