<?php
	require_once('vendor/autoload.php');
	$f3 = Base::instance();

	// Load configuration
	$f3->config('config.ini');

	$f3->route('GET /',
		function($f3) {
			echo "Hey There";
		}
	);
	/****** COMMON COMPONENET  *****/
	require 'apis/common/jwt_helper.php';

	/****** LOGIN COMPONENET  *****/
	require 'apis/testing/testingRouter.php';
	$f3->run();
?>
