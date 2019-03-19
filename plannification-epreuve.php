<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header('Location: admin.php');
		exit();
	}

	$jour = $_POST['jour'];
	$epreuve = $_POST['epreuve'];

	require_once('config.php');
	require_once('functions.php');

	//Insertion du contenu dans la BDD
	$param_query_desc = array('ID_EPREUVE' => $epreuve, 'ID_JOUR' => $jour);
	$query_desc = "INSERT INTO planning VALUES (:ID_JOUR, :ID_EPREUVE);";
	$desc = sql_query($query_desc, $param_query_desc, false);

	if (!isset($desc)) {
		echo "error inserting data in my_sql table";
	}
	else{
		header('Location: dashboard.php');
    	exit();
	}
?>