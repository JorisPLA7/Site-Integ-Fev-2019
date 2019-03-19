<?php
  //Fonction de connexion à la BDD
  function sqlConnect() {

      try {
          $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(\PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8'));
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(Exception $e) {
          die('line '.__LINE__ .': Error : '.$e->getMessage());
      }
      return $db;
  }
  $db = sqlConnect();

  //Execution de requêtes
  function sql_query($query_string,$params, $get = true){
      global $db;
      $query = $db-> prepare($query_string);
      foreach ($params as $key => $param) {
          $type = PDO::PARAM_STR;
          switch (true){
              case is_null($param)||$param==="":
                  $type = PDO::PARAM_NULL;
                  $query -> bindValue(':'.$key,NULL,$type);
                  break;
              case is_numeric($param):
                  $type = PDO::PARAM_INT;
                  $query -> bindValue(':'.$key,$param,$type);
                  break;
              default:
                  $query -> bindValue(':'.$key,$param,$type);
                  break;
          }
      }
      if ($query->execute()){
          if($get){
              $data = $query->fetchAll();
              return $data;
          }else{
              $data['query_success']=true;
              $data['last_insert_id']=$db-> lastInsertId();
              return $data;
          }
      }else{
          return false;
      }
  }
?>