<?php

	require_once(__DIR__ . '/../vendor/autoload.php');
	require_once(__DIR__ . '/../loader.php');

	use Controllers\loginController;

	prepareSession();
	setTheme();
	doRouting();

	/**
	 * Sets the theme to load for a user.
	 * Priority is as follows:
	 * 1. GET params
	 * 2. Session vars
	 * 3. Cookies
	 * Get params are used to set the theme, which is why they will always have the highest priority.
	 * Session vars (if set) should theoretically always be equal to cookie vars but in edge cases they might not.
	 * We assume that session vars will be set more recently (unless users manually change their cookies, which is not
	 * intended functionality) which is why they have priority.
	 */
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

	/**
	 * Gets the route a user requested and load the correct controller
	 */
	function doRouting () {
		$route = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

		switch ($route) {
			default:
				$lc = new loginController();
				echo($lc->showLoginView());
				break;
		}
	}