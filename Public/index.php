<?php

	require_once(__DIR__ . '/../vendor/autoload.php');
	require_once(__DIR__ . '/../loader.php');

	use Controllers\loginController;

	if (isset($_GET['theme'])) {
		switch ($_GET['theme']) {
			default:
				define("theme", "solarized");
				break;
		}
	} else {
		define("theme", "solarized");
	}

	$route = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

	switch ($route) {
		default:
			$lc = new loginController();
			echo($lc->showLoginView());
			break;
	}
