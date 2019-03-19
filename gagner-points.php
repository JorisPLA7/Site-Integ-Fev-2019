<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header('Location: admin.php');
		exit();
	}

	$nom_clan = $_POST['clan'];
	$recup = $_POST['epreuve'];
	echo "$recup";
	$separation = explode("|", $recup);
	$id_jour = $separation[0];
	echo " $id_jour";
	$id_epreuve = $separation[1];

	require_once('config.php');
	require_once('functions.php');

	//Insertion du contenu dans la BDD
	$param_query_gagner1 = array('ID_EPREUVE' => $id_epreuve, 'ID_JOUR' => $id_jour);
	$param_query_gagner = array('NOM_CLAN' => "$nom_clan", 'ID_EPREUVE' => $id_epreuve, 'ID_JOUR' => $id_jour);

	$query_gagner_etat = "SELECT * FROM win_epreuve WHERE ID_EPREUVE = :ID_EPREUVE AND ID_JOUR = :ID_JOUR";

	echo "$query_gagner_etat";
	echo $param_query_gagner['ID_JOUR'];
	echo $param_query_gagner['ID_EPREUVE'];

	$etat = sql_query($query_gagner_etat, $param_query_gagner1, true);

	var_dump($etat);

	if (count($etat) == 0) {
		$query_gagner_creer = "INSERT INTO win_epreuve VALUES (:NOM_CLAN, :ID_EPREUVE, :ID_JOUR)";
		$insert = sql_query($query_gagner_creer, $param_query_gagner, false);
		if (!isset($insert)) {
			echo "error inserting data in my_sql table";
		}
		else{
			echo $query_gagner_creer." 1";
			header('Location: dashboard.php');
	    	exit();
		}
	}
	else{
		$query_gagner_changer = "UPDATE win_epreuve SET NOM_CLAN=:NOM_CLAN WHERE ID_EPREUVE=:ID_EPREUVE AND ID_JOUR = :ID_JOUR";
		$update = sql_query($query_gagner_changer, $param_query_gagner, false);
		if (!isset($update)) {
			echo "error inserting data in my_sql table";
		}
		else{
			echo $query_gagner_changer;
			header('Location: dashboard.php');
	    	exit();
		}
	}
?>