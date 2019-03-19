<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header('Location: admin.php');
		exit();
	}

	$nom_clan = $_POST['clan'];
	$id_defi = $_POST['defi'];
	$occurences = $_POST['nombre'];

	require_once('config.php');
	require_once('functions.php');

	//Insertion du contenu dans la BDD
	$param_query_gagner = array('ID_DEFI' => $id_defi);

	$query_gagner_recup = "SELECT * FROM defi WHERE ID_DEFI = :ID_DEFI";
	$recup = sql_query($query_gagner_recup, $param_query_gagner, true);
	if (!isset($recup)) {
		echo "Unable to connect to mysql";
	}
	else{
		if ("duri" == $nom_clan && $occurences <> 0) {
			$new = $recup[0][5] + $occurences;
			var_dump($recup); 
			$query_gagner_increment = "UPDATE defi SET nombreDuri=$new WHERE ID_DEFI=:ID_DEFI";
			$recup = sql_query($query_gagner_increment, $param_query_gagner, false);
			echo $query_gagner_increment;
			header('Location: dashboard.php');
			exit();
		}
		elseif ("dagul" == $nom_clan && $occurences <> 0) {
			$new = $recup[0][4] + $occurences;
			var_dump($recup); 
			$query_gagner_increment = "UPDATE defi SET nombreDagul=$new WHERE ID_DEFI=:ID_DEFI";
			$recup = sql_query($query_gagner_increment, $param_query_gagner, false);
			echo $query_gagner_increment;
			header('Location: dashboard.php');
			exit();
		}
		else
		{
			echo "Error : No Defi set or Nombre de réalisations not set / NULL";
		}
	}
		
		
?>