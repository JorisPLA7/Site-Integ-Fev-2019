<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header('Location: admin.php');
		exit();
	}

	$desc = $_POST['content'];

	require_once('config.php');
	require_once('functions.php');

	//Insertion du contenu dans la BDD
	$param_query_desc = array('Description' => "$desc", 'NOM_CLAN'=> "dagul");
	$query_desc = "UPDATE clan SET Description=:Description WHERE NOM_CLAN=:NOM_CLAN";
	$desc = sql_query($query_desc, $param_query_desc, false);

	if (!isset($desc)) {
		echo "error inserting data in my_sql table";
	}
	else{
		header('Location: dashboard.php');
    	exit();
	}
?>