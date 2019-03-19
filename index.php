<!-- Site fait avec ♥ par Eliaccess -->
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Integ Fev !</title>
	<link rel="icon" class="favicon" type="image/png" href="./Images/logo.png" />
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="./Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./Style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./Style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<script src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/charts/node_modules/chart.js/dist/Chart.js"></script>
	<!-- Gestion du scroll avec la scroll bar -->
	<script type="text/javascript">
		$(document).ready(function () {
		    $(document).on("scroll", onScroll);
		    
		    //smoothscroll
		    $('a[href^="#"]').on('click', function (e) {
		        e.preventDefault();
		        $(document).off("scroll");
		        
		        $('a').each(function () {
		            $(this).removeClass('active');
		        })
		        $(this).addClass('active');
		      
		        var target = this.hash,
		            menu = target;
		        $target = $(target);
		        $('html, body').stop().animate({
		            'scrollTop': $target.offset().top+2
		        }, 500, 'swing', function () {
		            window.location.hash = target;
		            $(document).on("scroll", onScroll);
		        });
		    });
		});

		function onScroll(event){
		    var scrollPos = $(document).scrollTop();
		    $('#navigation a').each(function () {
		        var currLink = $(this);
		        var refElement = $(currLink.attr("href"));
		        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
		            $('#menu-center ul li a').removeClass("active");
		            currLink.addClass("active");
		        }
		        else{
		            currLink.removeClass("active");
		        }
		    });
		}
	</script>
	<?php
		require_once('config.php');
  		require_once('functions.php');
	?>
</head>
<body>
	<?php
  
	//Préparation des variables à afficher
	$param_query_news = array('NOM_CLAN' => 'dagul');
	$query_description_news = "SELECT * FROM news ORDER BY date DESC";
	$description_news = sql_query($query_description_news, $param_query_news, true);

	$param_clan = array();
  	$query_clan = "SELECT * FROM clan";
  	$clan = sql_query($query_clan, $param_clan, true);

	?>
	<nav class="navbar navbar-inverse navbar-expand-lg navbar-dark bg-dark" id="navigation">
		<li class="active">
			<img src="./Images/logo.png" title="AH BOOOOOOON ?" id="navbar-logo">
		</li>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" href="#logo">Accueil<span class="sr-only"></span></a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="#news-container">News</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#clans">Clans</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#map">Carte</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#planning">Planning</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#upload-defi">Envoyer un défi</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#score">Scores des clans</a>
			</li>
            <li class="nav-item">
                <a class="nav-link" href="#photo-profil">Filtres Facebook</a>
            </li>
			<li class="nav-item">
				<a class="nav-link" href="liens_utiles.html">Liens utiles</a>
			</li>
            <li class="nav-item">
                <a class="nav-link" href="plaquette.pdf">Plaquette</a>
            </li>
		</ul>
		</div>
	</nav>

	<div id="website-container">
		<div class="slide" id="logo">
		  	<img src="./Images/logo.png" title="AH BOOOOOOON ?" id="logo1">
		</div>
		<div class="slide" style="height: 10vh; background-image: linear-gradient(white, #e6e6e6);">	
		</div>
		<div class="slide" id="news-container">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 100%">
			  <div class="carousel-inner" style="margin-left: 10%; margin-right: 10%;">
			  	<?php
			      $i = 0;
			    	foreach ($description_news as $key => $value) {
			    		if ($description_news[$i][2] == $description_news[0][2]) {
			    			echo '<div class="carousel-item active">';
			    		}
			    		else{
			    			echo '<div class="carousel-item">';	
			    		}
					      	echo '<div id="news" class="d-block w-100" alt="'.$description_news[$i][0].'">';
					      		echo "<div class='news-title'>";
					      		echo $description_news[$i][1]." du ".$description_news[$i][3];
					      		echo "</div>";
					      		echo $description_news[$i][2];
					      	echo '</div>';
					    echo '</div>';
					    $i++;
			    	}
			  	?>
			  </div>

			  <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
		<div class="slide" style="height: 10vh; background-image: linear-gradient(#e6e6e6, #cccccc);">	
		</div>
		<div class="slide-clans" id="clans">
			<div class="slide-gauche p-2" id="duri">
                <div class="nom-clan">
                    Duriliems
                </div>
				<div class="image-clan">
					<img src="./Images/duri-logo.gif" class="image-clan-resize" title="Logo Duri">
				</div>
				<div class="description-clan">
					<?php
						$param_descri_duri = array("NOM_CLAN" => 'duri');
		              	$query_descri_duri = "SELECT * FROM clan WHERE NOM_CLAN =:NOM_CLAN";
		              	$descri_duri = sql_query($query_descri_duri, $param_descri_duri, true);
		              	echo $descri_duri[0][1];
					?>
				</div>
			</div>
			<div class="slide-droite p-2" id="dagul">
                <div class="nom-clan">
                    Daguldrakens
                </div>
				<div class="image-clan">
					<img src="./Images/dagul-logo.gif" class="image-clan-resize" title="Logo Dagul">
				</div>
				<div class="description-clan">
					<?php
						$param_descri_dagul = array("NOM_CLAN" => 'dagul');
		              	$query_descri_dagul = "SELECT * FROM clan WHERE NOM_CLAN =:NOM_CLAN";
		              	$descri_dagul = sql_query($query_descri_dagul, $param_descri_dagul, true);
		              	echo $descri_dagul[0][1];
					?>
				</div>
			</div>
		</div>
		<div class="slide" style="height: 10vh; background-image: linear-gradient(#cccccc, #b3b3b3);">	
		</div>
		<div class="slide map" id="map">
            <div style="font-family: GrecAntique; font-size: 180%; width: 80%; background: white; border-radius: 10px; padding: 1%; margin-top: 5vh; margin-bottom : 30px; text-align: center; justify-content: center;">
                Carte interactive : tu cherches un endroit ? Cherche et clique dessus !
            </div>
            <div style="width: 80%; height: 70%">
                <iframe src="https://www.google.com/maps/d/embed?mid=10lBWJvOXsiyRlCodVzI9C1JKXWy4-aXL" width="100%" height="100%"></iframe>
            </div>
		</div>
		<div class="slide" style="height: 10vh; background-image: linear-gradient(#b3b3b3, #999999);">	
		</div>
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
                <div class="matin-aprem">
                    <?php

                    $param_planning = array("ID_JOUR" => 3);
                    $query_planning = "SELECT * FROM planning WHERE ID_JOUR =:ID_JOUR";
                    $planning = sql_query($query_planning, $param_planning, true);

                    foreach ($planning as $day) {

                        $param_epreuve = array('value' => $day['ID_EPREUVE']);
                        $query_epreuve = "SELECT * FROM epreuve WHERE ID_EPREUVE = :value";
                        $epreuves = sql_query($query_epreuve, $param_epreuve , true);
                        $Time1 ="00:00:00";
                        $Time2 ="18:00:00";
                        foreach ($epreuves as $epreuve) {
                            if (($Time1 <= $epreuve['Heure']) AND ($epreuve['Heure']<$Time2)) {
                                echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
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
		                      echo($epreuve['Heure'].' : '.$epreuve['Intitule'].'</br>');
		                    }         
		                  }
		                }
		            ?>
				</div>
			</div>
		</div>
		<div class="slide" style="height: 10vh; background-image: linear-gradient(#999999, #808080);">	
		</div>
		<!-- Upload les vidéos des défis et les mets sur le disque du Site dans un dossier "Defis" -->
		<div class="slide-defi" id="upload-defi">
			<div id="image-gauche">
				<img src="./Images/duriliem.png" class="imageresize">
			</div>
			<div id="formulaire-defi">
				<form enctype="multipart/form-data" action="upload-defi.php" method="POST" class="form-group">
				   Ton nom et ton prénom :
				   <input type="text" name="name" class="form-control" required="required">
				   Ton clan :
				   <select name="clan" id="clan" class="form-control">
	                <?php
	                  $i = 0;
	                  foreach ($clan as $key => $value) {
	                    echo "<option value=".$clan[$i][0].">";
	                    echo $clan[$i][0];
	                    echo "</option>";
	                    $i++;
	                  }
	                ?>
	              </select>
				   Vidéo / Photo de défi :
				   <input type="FILE" name="file" class="form-control-file" required="required" style="margin-bottom: 15px;">
				   <input type="submit" name="Envoyer" class="button">
				</form>
			</div>
			<div id="image-droite">
				<img src="./Images/daguldraken.png" class="imageresize">
			</div>
		</div>
		<div class="slide" style="height: 10vh; background-image: linear-gradient(#808080, #666666);">	
		</div>
		<div class="slide" id="score">
			<?php
			// Comptage des points Daguls
				$points_epreuves_daguls_planning = array("NOM_CLAN" => "dagul");
		        $points_epreuves_daguls_query = "SELECT SUM(points) FROM epreuve WHERE ID_EPREUVE IN (SELECT ID_EPREUVE FROM win_epreuve WHERE NOM_CLAN=:NOM_CLAN)";
		        $points_epreuves_daguls = sql_query($points_epreuves_daguls_query, $points_epreuves_daguls_planning, true);

		        $points_defis_daguls_planning = array();
		        $points_defis_daguls_query = "SELECT 1 AS TotalRow, Sum(points) AS points, Sum(nombreDagul) AS nombreDagul, Sum(points*nombreDagul) AS Result FROM defi ORDER BY TotalRow";
		        $points_defis_daguls = sql_query($points_defis_daguls_query, $points_defis_daguls_planning, true);

		        $points_epreuves_daguls_total = $points_epreuves_daguls[0][0];
		        $points_defis_daguls_total = $points_defis_daguls[0][3];
		        $points_daguls = $points_epreuves_daguls_total + $points_defis_daguls_total;

		    // Comptage des points Duri
				$points_epreuves_duris_planning = array("NOM_CLAN" => "duri");
		        $points_epreuves_duris_query = "SELECT SUM(points) FROM epreuve WHERE ID_EPREUVE IN (SELECT ID_EPREUVE FROM win_epreuve WHERE NOM_CLAN=:NOM_CLAN)";
		        $points_epreuves_duris = sql_query($points_epreuves_duris_query, $points_epreuves_duris_planning, true);

		        $points_defis_duris_planning = array();
		        $points_defis_duris_query = "SELECT 1 AS TotalRow, Sum(points) AS points, Sum(nombreDagul) AS nombreDagul, Sum(points*nombreDuri) AS Result FROM defi ORDER BY TotalRow";
		        $points_defis_duris = sql_query($points_defis_duris_query, $points_defis_duris_planning, true);

		        $points_epreuves_duris_total = $points_epreuves_duris[0][0];
		        $points_defis_duris_total = $points_defis_duris[0][3];
		        $points_duris = $points_epreuves_duris_total + $points_defis_duris_total;
			?>
			<div id="scoreContainer">
				<!-- Affichage dans un graphique généré par Charts.js -->
				<canvas id="graph-points" width="100" height="100" ></canvas>
				<script>
			  		new Chart(document.getElementById("graph-points"),{
			  			"type":"bar",
			  			"data":{
			  				"labels":["Daguldrakens","Duriliems"],
			  				"datasets":[
			  					{"label":"Points des clans",
			  					"data":[
			  					<?php
			  						echo $points_daguls.",".$points_duris;
			  					?>
			  					],
			  					"fill":false,"backgroundColor":[
			  						"rgba(0, 0, 0, 0.5)",
			  						"rgba(255, 255, 255, 0.5)"],
			  					"borderColor":[
			  						"rgb(0, 0, 0)",
			  						"rgb(255, 255, 255)"],
			  					"borderWidth":1}]
			  			},
			  			"options":{
			  				"title": {
					            "display": true,
					            "fontColor": 'white',
					            "text": 'Scores des clans',
					            "fontSize": 20,
					            "fontFamily":'GrecAntique'
					        },
					        "scaleLabel": {
					            "display": true,
					            "fontColor": 'white',
					            "text": 'Scores des clans',
					            "fontSize": 15,
					            "fontFamily":'GrecAntique'
					        },
					        "legend": {
					            "display": false,
					            "fontColor": 'white',
					            "fontFamily":'GrecAntique'
					        },
			  				"scales":{
			  					"yAxes":[{
			  						"ticks":{"beginAtZero":true},
			  						"gridLines":{
			  							"display":false
			  						},
			  						"fontColor": 'white'
			  					}],
			  					"xAxes":[{
			  						"gridLines":{
			  							"display":false
			  						},
			  						"fontColor": 'white'
			  					}]
			  				}
			  			}
			  		});
			  	</script>
			</div>
		</div>
        <div class="slide" style="width: 100vw; height: 10vh; background-image: linear-gradient(#666666, #4d4d4d);">
        </div>
        <div id="photo-profil" class="slide">
            <form method="post" action="createPicture.php" target="UploadFrame" enctype="multipart/form-data" class="form-horizontal col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="clan" class="control-label">Choisi ton clan :</label>
                    <select name="clan" id="clan" class="form-control">
                        <option value="DURI">Duri</option>
                        <option value="DAGUL">Dagul</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo" class="control-label">Importe ta photo (format carré, genre 500x500 si tu veux) :</label>
                    <input id="photo" type="file" name="photo" class="input-file">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-lg">Génère ta photo de profil !</button>
                </div>
                <p></p>
            </form>
        </div>
	</div>
    <div class="slide" style="width: 100%; height: 10vh; background-image: linear-gradient(#4d4d4d, black);">
    </div>
    <div id="sponsors">
        <a href="https://www.facebook.com/redbearcompiegne/">
            <img src="./Images/red_bear_final.png" style="max-height: 15vh; margin : 5px">
        </a>
        <a href="http://www.kartingbowling.com/jaux-compiegne/home.php">
            <img src="./Images/speedpark_logo.png" style="max-height: 15vh; margin : 5px">
        </a>
    </div>
    <div id="sponsor-1" style="background: black">
        <a href="http://www.turtlescompiegne.fr/">
            <img src="./Images/turtle.jpg" style="width: 80%;">
        </a>
    </div>
    <div class="slide" style="width: 100%; height: 10vh; background-image: linear-gradient(black, white);">
    </div>
    <div id="sponsor-1">
        <a href="https://www.orpi.com/pontneuf/">
            <img src="./Images/orpi_banniere.png" style="width: 80%;">
        </a>
    </div>
	<footer style="background-color: black; color : white; display : flex; width: 100%; justify-content: center;">
        Copyright 2018 &copy; Association Integ Fev' - Rejoins nous sur -<a href="https://www.facebook.com/integ.fev">Facebook</a>- ou envoie un ptit -<a href="mailto: integfev@assos.utc.fr">Mail</a>- (hésite pas bb)
    </footer>
</body>
</html>