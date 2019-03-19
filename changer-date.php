<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header('Location: admin.php');
		exit();
	}

	$id_jour = $_POST['jour'];
	$date = $_POST['date'];

	require_once('config.php');
	require_once('functions.php');

	//Insertion du contenu dans la BDD
	$param_query_desc = array('ID_JOUR' => "$id_jour", 'Date' => "$date");
	$query_desc = "UPDATE jour SET Date=:Date WHERE ID_JOUR=:ID_JOUR";
	$desc = sql_query($query_desc, $param_query_desc, false);

	if (!isset($desc)) {
		echo "error inserting data in my_sql table";
	}
	else{
		header('Location: dashboard.php');
    	exit();
	}
?>