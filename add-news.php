<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header('Location: admin.php');
		exit();
	}

	$title = $_POST['title'];
	$desc = $_POST['content'];

	date_default_timezone_set('Europe/Paris');
	$date = date("Ymd");

	require_once('config.php');
	require_once('functions.php');

	//Insertion du contenu dans la BDD
	$param_query_news = array('Intitule' => $title, 'Description' => $desc, "date" => $date);
	$query_news = "INSERT INTO news VALUES (NULL, :Intitule, :Description, :date)";
	$news = sql_query($query_news, $param_query_news, false);

	if (!isset($news)) {
		echo "error inserting data in my_sql table";
	}
	else{
		header('Location: dashboard.php');
    	exit();
	}
?>