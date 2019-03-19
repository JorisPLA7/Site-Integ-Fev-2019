<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header('Location: admin.php');
		exit();
	}

	$title = $_POST['title'];
	$content = $_POST['content'];
	$point = $_POST['point'];

	require_once('config.php');
	require_once('functions.php');

	//Insertion du contenu dans la BDD
	$param_query_desc = array('Intitule' => "$title", 'Description' => "$content", 'Points' => "$point");
	$query_desc = "INSERT INTO defi VALUES (NULL, :Intitule, :Description, :Points, NULL, NULL);";
	$desc = sql_query($query_desc, $param_query_desc, false);

	if (!isset($desc)) {
		echo "error inserting data in my_sql table";
	}
	else{
		header('Location: dashboard.php');
    	exit();
	}
?>