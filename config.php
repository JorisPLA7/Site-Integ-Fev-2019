<?php
	header('Content-Type: text/html; charset=utf-8');
	header('Access-Control-Allow-Origin: *');

	define('DB_HOST', 'host');
	define('DB_NAME', 'nom_bdd');
	define('DB_USER', 'nom_usr_sql');
	define('DB_PASS', 'mdp_usr_sql');

	define('DEBUG', false);
	date_default_timezone_set('Europe/Paris');
?>