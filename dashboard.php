<?php
  session_start();
?>
<!-- Site fait avec ♥ par Eliaccess -->
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
  
  require_once('config.php');
  require_once('functions.php');
  
  //Préparation des variables à afficher
  $param_query_description_daguls = array('NOM_CLAN' => 'dagul');
  $query_description_daguls = "SELECT * FROM clan WHERE NOM_CLAN =:NOM_CLAN";
  $description_dagul = sql_query($query_description_daguls, $param_query_description_daguls, true);

  $param_query_description_duri = array('NOM_CLAN' => 'duri');
  $query_description_duri = "SELECT * FROM clan WHERE NOM_CLAN =:NOM_CLAN";
  $description_duri = sql_query($query_description_duri, $param_query_description_duri, true);

  $param_query_description_defi = array();
  $query_description_defi = "SELECT * FROM defi";
  $defi = sql_query($query_description_defi, $param_query_description_defi, true);

  $param_jour = array();
  $query_jour = "SELECT * FROM jour";
  $jour = sql_query($query_jour, $param_jour , true);

  $param_epreuve = array();
  $query_epreuve = "SELECT * FROM epreuve";
  $epreuve = sql_query($query_epreuve, $param_epreuve , true);

  $param_clan = array();
  $query_clan = "SELECT * FROM clan";
  $clan = sql_query($query_clan, $param_clan, true);

  if(isset($_SESSION['login']))
  {
    echo '<div id="website-container" class="admin">';
    echo ' <p class="h1" style="margin-top: 5vh;">Panel Admin</p>';
    echo '     <div class="boutton-deconnexion">';
    echo '       <a href="deconnexion.php" class="button">Déconnexion</a>';
    echo '     </div>';
    echo '    <div class="panel slide-panel">';
    echo '    <div id="txt-panel">';
    echo '      Ajouter une news';
    echo '    </div>';
    echo '    <form method="POST" action="add-news.php">';
    echo '      <div id="champ panel">';
    echo '          <input type="text" name="title" size="80" placeholder="Titre de la news" class="form-control">';
    echo '      </div>';
    echo '      <div id="champ panel">';
    echo '          <textarea name="content" cols="80" rows="10" placeholder="Contenu de la news" class="form-control"></textarea>';
    echo '      </div>';
    echo '      <div id="boutton">';
    echo '        <input type="submit" class="button" name="Suivant">';
    echo '      </div>';
    echo '    </form>';
    echo '  </div>';
    echo '  <div class="panel slide-panel">';
    echo '    <div id="txt-panel">';
    echo '      Modifier la description Duri';
    echo '    </div>';
    echo '    <form method="POST" action="add-description-duri.php" class="form-group">';
    echo '      <div id="champ panel">';
    echo '          <textarea name="content" cols="80" rows="10" placeholder="Description Duri" class="form-control">'.$description_duri[0]["Description"].'</textarea>';
    echo '      </div>';
    echo '      <div id="boutton">';
    echo '        <input type="submit" class="button" name="Suivant">';
    echo '      </div>';
    echo '    </form>';
    echo '  </div>';
    echo '  <div class="panel slide-panel">';
    echo '    <div id="txt-panel">';
    echo '      Modifier la description Dagul';
    echo '    </div>';
    echo '    <form method="POST" action="add-description-dagul.php" class="form-group">';
    echo '      <div id="champ panel">';
    echo '          <textarea name="content" cols="80" rows="10" placeholder="Description Dagul" class="form-control">'.$description_dagul[0]["Description"].'</textarea>';
    echo '      </div>';
    echo '      <div id="boutton">';
    echo '        <input type="submit" class="button" name="Suivant">';
    echo '      </div>';
    echo '    </form>';
    echo '  </div>';
    echo '  <div class="panel slide-panel">';
    echo '    <div id="txt-panel">';
    echo '      Modifier les dates des jours de l\'intégration';
    echo '    </div>';
    echo '    <form method="POST" action="change-date.php" class="form-group">';
    echo '      <div id="champ panel">';
    echo '          <select name="jour" class="form-control">';
    $i = 0;
    foreach ($jour as $key => $value) {
      echo "<option value=".$jour[$i][0].">";
      echo "Jour ".$jour[$i][0]." ----- ".$jour[$i][1]."";
      echo "</option>";
      $i++;
    }
    echo '          </select>';
    echo '      </div>';
    echo '      <div id="boutton">';
    echo '        <input type="submit" class="button" name="Suivant">';
    echo '      </div>';
    echo '    </form>';
    echo '  </div>';
    echo '  <div class="panel slide-panel">';
    echo '    <div id="txt-panel">';
    echo '      Créer une épreuve';
    echo '    </div>';
    echo '    <form method="POST" action="add-epreuve.php" class="form-group">';
    echo '      <div id="champ panel">';
    echo '          <input type="text" name="title" size="80" placeholder="Titre de l\'épreuve" class="form-control">';
    echo '      </div>';
    echo '      <div id="champ panel">';
    echo '          <textarea name="content" cols="80" rows="10" placeholder="Description de l\'épreuve" class="form-control"></textarea>';
    echo '      </div>';
    echo '      <div id="champ panel">';
    echo '          <input type="number" name="point" cols="80" rows="10" placeholder="Nombre de points que rapporte l\'épreuve au gagnant" class="form-control"></input>';
    echo '      </div>';
    echo '      <div id="champ panel">';
    echo '          <input type="time" name="heure" cols="80" rows="10" placeholder="Heure de l\'épreuve" class="form-control"></input>';
    echo '      </div>';
    echo '      <div id="boutton">';
    echo '        <input type="submit" class="button" name="Suivant">';
    echo '      </div>';
    echo '    </form>';
    echo '  </div>';
    echo '  <div class="panel slide-panel">';
    echo '    <div id="txt-panel">';
    echo '      Assigner une épreuve à un jour';
    echo '    </div>';
    echo '     <form method="POST" action="plannification-epreuve.php" class="form-group">';
    echo '      <div id="champ panel">';
    echo '          <select name="jour" class="form-control">';
    $i = 0;
    foreach ($jour as $key => $value) {
      echo "<option value=".$jour[$i][0].">";
      echo "Jour ".$jour[$i][0]."";
      echo "</option>";
      $i++;
    }
    echo '          </select>';
    echo '      </div>';
    echo '      <div id="champ panel">';
    echo '         <select name="epreuve" class="form-control">';
    $i = 0;
    foreach ($epreuve as $key => $value) {
      echo "<option value=".$epreuve[$i][0].">";
      echo "Épreuve : ".$epreuve[$i][1]."";
      echo "</option>";
      $i++;
    }
    echo '         </select>';
    echo '      </div>';
    echo '      <div id="boutton">';
    echo '        <input type="submit" class="button" name="Suivant">';
    echo '      </div>';
    echo '     </form>';
    echo '   </div>';
    ?>

    <!-- choix du gagnant de chaque épreuve -->
    <div class="panel slide-panel">
      <div id="txt-panel">
        Assigner un vainqueur à une épreuve
      </div>
      <form method="POST" class="slide-planning" style="width: 100%" action="gagner-points.php">
      <div id="planning2" class="slide-planning" style="width: 100%">
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|1">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|1">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|1">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|2">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|2">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|2">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|3">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|3">
                        Épreuve : '.$epreuve['Intitule'].'
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
                    if ($epreuve['Heure']>=$Time) {
                      echo('
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|3">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|4">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|4">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|4">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|5">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|5">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|5">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|6">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|6">
                        Épreuve : '.$epreuve['Intitule'].'
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
                      <input type="radio" name="epreuve" value="'.$epreuve['ID_EPREUVE'].'|6">
                        Épreuve : '.$epreuve['Intitule'].'
                      </input> </br>');
                    }         
                  }
              }
            ?>
          </div>
        </div>
        <div id="champ panel">
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
        </div>
        <div id="boutton">
          <input type="submit" class="button" name="Suivant">
        </div>
      </div>
      </form>
      </div>
      <div class="panel slide-panel">
        <div id="txt-panel">
          Créer un défi
        </div>
          <form method="POST" action="add-defi.php" class="form-group">
            <div id="champ panel">
              <input type="text" name="title" size="80" placeholder="Titre du défi" class="form-control">
            </div>
            <div id="champ panel">
              <textarea name="content" cols="80" rows="10" placeholder="Description du défi" class="form-control"></textarea>
            </div>
            <div id="champ panel">
              <input type="number" name="point" cols="80" rows="10" placeholder="Nombre de points que rapporte le défi au gagnant" class="form-control"></input>
            </div>
            <div id="boutton">
              <input type="submit" class="button" name="Suivant">
            </div>
          </form>
        </div>
        <div class="panel slide-panel">
        <div id="txt-panel">
          Comptabiliser les défis
        </div>
          <form method="POST" action="assigner-points.php" class="form-group">
            <select name="defi" class="form-control">
              <?php
                $i = 0;
                foreach ($defi as $key => $value) {
                  echo "<option value=".$defi[$i][0].">";
                  echo "Défi : ".$defi[$i][1]."";
                  echo "</option>";
                  $i++;
                }
              ?>
            </select>
            <div id="champ panel">
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
            </div>
            <div id="champ panel">
                <input type="number" name="nombre" placeholder="Nombre de réalisations du défi" class="form-control" required>
            </div>
            <div id="boutton">
              <input type="submit" class="button" name="Suivant">
            </div>
          </form>
        </div>


  <?php
  }
  else
  {
    $_SESSION = array();
    session_destroy();
    header('Location: admin.php');
    exit();
  }  
  ?>
</body>
</html>   