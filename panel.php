<?php
  session_start();
  $login = $_POST['login'];
  $password = $_POST['password'];
  $pass_md5 = md5($password);

  //Test des conditions sur les formats de login et password pour éviter les injections SQL
  if ((strlen($password)>=16) OR (strpos($password, '%') !== false) OR (strpos($password, "\\") !== false) OR (strpos($password, "(") !== false) OR (strpos($password, '<') !== false) OR (strpos($login, '%') !== false) OR (strpos($login, "\\") !== false) OR (strpos($login, "(") !== false) OR (strpos($login, '<') !== false)) {
    $_SESSION = array();
    session_destroy();
    header('Location: '.$_SERVER["HTTP_REFERER"].'');
    exit();
  }
  
  require_once('config.php');
  require_once('functions.php');

  //On vérifie si l'user existe en regardant dans le BDD, en hashant le mdp en MD5 et on compte le nombre d'users valides
  $param_query_verif = array('USER_NAME' => $login, 'PASS' => $pass_md5);
  $query_verif = "SELECT COUNT(*) FROM users WHERE username =:USER_NAME AND password =:PASS";
  $count = sql_query($query_verif, $param_query_verif, true);

  if ($count[0]['COUNT(*)'] == 1) {
    $_SESSION['login']='Admin';
    header('Location: dashboard.php');
    exit();
  }
  else
  {
    $_SESSION = array();
    session_destroy();
    header('Location: '.$_SERVER["HTTP_REFERER"].'');
    exit();
  }
?>