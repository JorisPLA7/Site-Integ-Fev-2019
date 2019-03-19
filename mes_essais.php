<!DOCTYPE html>
<html>
<head>
	<title>Dashboard V2.0</title>
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
		require_once('config.php');
  		require_once('functions.php');
	?>
	<form method="POST" action="gagner-points.php">
	<div id="website-container" class="admin">
		<div id="planning" class="slide-planning">
			<div class="day">
				<div class="title-planning">
					Jour 1
				</div>
				<div class="matin">
					<?php

						$param_planning = array("ID_JOUR" => 1);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="12:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']<$Time) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="aprem">
					<?php

						$param_planning = array("ID_JOUR" => 1);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time1 ="12:00:00";
			  				$Time2 ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if (($Time1 <= $epreuve['Heure']) AND ($epreuve['Heure']<$Time2)) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="soir">
					<?php

						$param_planning = array("ID_JOUR" => 1);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']>=$Time2) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
			</div>
			<div class="day">
				<div class="title-planning">
					Jour 2
				</div>
				<div class="matin">
					<?php

						$param_planning = array("ID_JOUR" => 2);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="12:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']<$Time) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="aprem">
					<?php

						$param_planning = array("ID_JOUR" => 2);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time1 ="12:00:00";
			  				$Time2 ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if (($Time1 <= $epreuve['Heure']) AND ($epreuve['Heure']<$Time2)) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="soir">
					<?php

						$param_planning = array("ID_JOUR" => 2);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']>=$Time2) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
			</div>
			<div class="day">
				<div class="title-planning">
					Jour 3
				</div>
				<div class="matin">
					<?php

						$param_planning = array("ID_JOUR" => 3);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="12:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']<$Time) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="aprem">
					<?php

						$param_planning = array("ID_JOUR" => 3);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time1 ="12:00:00";
			  				$Time2 ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if (($Time1 <= $epreuve['Heure']) AND ($epreuve['Heure']<$Time2)) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="soir">
					<?php

						$param_planning = array("ID_JOUR" => 3);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']>=$Time2) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
			</div>
			<div class="day">
				<div class="title-planning">
					Jour 4
				</div>
				<div class="matin">
					<?php

						$param_planning = array("ID_JOUR" => 4);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="12:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']<$Time) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="aprem">
					<?php

						$param_planning = array("ID_JOUR" => 4);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time1 ="12:00:00";
			  				$Time2 ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if (($Time1 <= $epreuve['Heure']) AND ($epreuve['Heure']<$Time2)) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="soir">
					<?php

						$param_planning = array("ID_JOUR" => 4);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']>=$Time2) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
			</div>
			<div class="day">
				<div class="title-planning">
					Jour 5
				</div>
				<div class="matin">
					<?php

						$param_planning = array("ID_JOUR" => 5);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="12:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']<$Time) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="aprem">
					<?php

						$param_planning = array("ID_JOUR" => 5);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time1 ="12:00:00";
			  				$Time2 ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if (($Time1 <= $epreuve['Heure']) AND ($epreuve['Heure']<$Time2)) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="soir">
					<?php

						$param_planning = array("ID_JOUR" => 5);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']>=$Time2) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
			</div>
			<div class="day">
				<div class="title-planning">
					Jour 6
				</div>
				<div class="matin">
					<?php

						$param_planning = array("ID_JOUR" => 6);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="12:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']<$Time) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="aprem">
					<?php

						$param_planning = array("ID_JOUR" => 6);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time1 ="12:00:00";
			  				$Time2 ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if (($Time1 <= $epreuve['Heure']) AND ($epreuve['Heure']<$Time2)) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
				<div class="soir">
					<?php

						$param_planning = array("ID_JOUR" => 6);
						$query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
						$planning = sql_query($query_planning, $param_planning, true);

						foreach ($planning as $day) {

			    			$param_epreuve = array('value' => $day['ID_EPREUVE']);
			  				$query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
			  				$epreuves = sql_query($query_epreuve, $param_epreuve , true);
			  				$Time ="18:00:00";
			  				foreach ($epreuves as $epreuve) {
			  					if ($epreuve['Heure']>=$Time2) {
			  						echo('
					  				<input type="radio" value="'.$epreuve['ID_EPREUVE'].'">
						  				Épreuve : "'.$epreuve['Intitule'].'
						  			</input> </br>');
			  					} 				
			  				}
			   	 		}
					?>
				</div>
			</div>
			<div class="day">
				<div class="title-planning">
					Un jour
				</div>
				<div class="wei">
					WEI
				</div>
			</div>
		</div>
	</div>
	</form>
</body>
</html>