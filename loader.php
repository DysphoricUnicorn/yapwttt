<?php
	if (file_exists(__DIR__ . '/config.php')) {
		require_once(__DIR__ . '/config.php');
	} else {
		die("ERROR: YAPWTTT is not set up properly. Please follow the deployment guide inside README.md");
	}
	require_once(__DIR__ . '/Controllers/baseController.php');
	require_once(__DIR__ . '/Controllers/loginController.php');
