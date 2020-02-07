<?php

	namespace Controllers;

	use Twig\Error\LoaderError;
	use Twig\Error\RuntimeError;
	use Twig\Error\SyntaxError;

	class baseController {

		/**
		 * Renders a view and returns it as a string.
		 * @param string $name <p>The name of the template relative to /Views without the .twig.html ending</p>
		 * @param array $props <p>Any variables you want to give to the view</p>
		 * @return string
		 * @throws LoaderError
		 * @throws RuntimeError
		 * @throws SyntaxError
		 */
		final function renderView (string $name, array $props) {
			$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
			$twig = new \Twig\Environment($loader, ['cache' => __DIR__ . '/../Storage/ViewCache']);
			$props['theme'] = constant("theme");
			return $twig->render($name . '.html.twig', $props);
		}

	}
