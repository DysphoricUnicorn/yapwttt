<?php

	namespace Controllers;

	class loginController extends baseController {

		function showLoginView () {
			return $this->renderView('pages/login', []);
		}

	}