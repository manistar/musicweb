<?php
	// session_start();
	require_once "admin/GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("528043536352-hdo8fvc7q285ksg69ai33ptra16ea07k.apps.googleusercontent.com");
	$gClient->setClientSecret("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");
	$gClient->setApplicationName("Besttimelive");
	$gClient->setRedirectUri("https://besttimelive.com/google_siginup.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
