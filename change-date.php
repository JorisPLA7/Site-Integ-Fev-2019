<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Integ Fev !</title>
  <link rel="icon" type="image/png" href="./Images/logo.png" />
  <meta charset="utf-8"/>
  <HTML lang="fr">
  <link rel="stylesheet" type="text/css" href="./Style/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="./Style/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./Style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <script src="./js/bootstrap.min.js"></script>
</head>
<body>

<?php
	$jour = $_POST['jour'];

	if(!isset($_SESSION['login'])){
		header('Location: admin.php');
		exit();
	}
	else{
		echo '<div id="website-container" class="admin">';
	    echo ' <p class="h1" style="margin-top: 5vh;">Changement de date</p>';
	    echo '      <div class="boutton-deconnexion">';
	    echo '        <a href="deconnexion.php" class="button">Déconnexion</a>';
	    echo '      </div>';
	    echo '  <div class="panel slide-panel">';
	    echo '    <div id="txt-panel">';
	    echo '      Choisir une date';
	    echo '    </div>';
	    echo '    <form method="POST" action="changer-date.php">';
	    echo '      <div id="champ panel">';
	    echo '          <input type="date" name="date" class="form-control">';
	    echo '			<input name="jour" type="hidden" value="'.$jour.'">';
	    echo '      </div>';
	    echo '      <div id="boutton">';
	    echo '        <input type="submit" class="button" name="Suivant">';
	    echo '      </div>';
	    echo '    </form>';
	    echo '  </div>';
	} 
?>
</body>