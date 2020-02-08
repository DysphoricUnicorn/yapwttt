<?php

	require_once(__DIR__ . '/../vendor/autoload.php');
	require_once(__DIR__ . '/../loader.php');

	use Controllers\loginController;

	setTheme();

	$route = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

	switch ($route) {
		default:
			$lc = new loginController();
			echo($lc->showLoginView());
			break;
	}

	function setTheme () {
		if (isset($_GET['theme'])) {
			$theme = $_GET['theme'];
		} else if (isset($_SESSION['theme'])) {
			$theme = $_SESSION['theme'];
		} else if (isset($_COOKIE['theme'])) {
			$theme = $_SESSION['theme'];
		}
		if (isset($theme)) {
			switch ($theme) {
				default:
					define("theme", "solarized");
					break;
			}
		} else {
			define("theme", "solarized");
		}
		$_SESSION['theme'] = constant('theme');
		setcookie('theme', constant('theme'));
	}

	/**
	 * Starts a session if none is active
	 */
	function prepareSession () {
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
	}