<?php

namespace Core;
/**
 * 
 */
class View
{
	public static function renderTemplate($template, $args = []) {
		static $twig = null;
		extract($args, EXTR_SKIP);
			
		if($twig === null) {
			$loader = new \Twig_Loader_Filesystem('App/Views');
			$twig = new \Twig_Environment($loader);
		}

		array_push($args, ['base_url' => $_SESSION['base_url']]);
		echo $twig->render($template, $args);
	}
}

?>