<?php
require_once File::build_path(array("config","Conf.php"));
class Model {


    public static $pdo;

    public static function Init(){
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        try{
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                                 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); 
            } else {
                echo 'Une erreur PDO est survenue.';
            }
            die();
        }
    }   

    public static function selectAll(){
    $table_name = static::$object;
    $class_name = 'Model'.ucfirst($table_name);
    
    $rep = Model::$pdo->query("SELECT * FROM p_".$table_name);

    $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
    $tab_object = $rep->fetchAll();
    return $tab_object;
    }

    public static function select($primary_value) {
        $table_name = 'p_'.static::$object;
        $class_name = 'Model'.ucfirst(static::$object);
        $primary_key = static::$primary;

        $sql = 'SELECT * FROM '.$table_name .' WHERE '. $primary_key. '=:nom_tag';
        //echo $sql;
        //echo $primary_value;
        try{
            $req_prep = Model::$pdo->prepare($sql);
            $values = array("nom_tag" => $primary_value);
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab_object = $req_prep->fetchAll();
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
        if (empty($tab_object)){
            return false;
        }
        return $tab_object[0];

    }

    public static function selectContenu($primary_value1,$primary_value2) {}

    public static function deleteContenu($primary_value1,$primary_value2){}

  public static function delete($primary_value){
    $table_name = 'p_'.static::$object;
    $class_name = 'Model'.ucfirst(static::$object);
    $primary_key = static::$primary;

    $sql = "DELETE FROM $table_name WHERE $primary_key=:nom_tag";
    try{
        $req_prep = Model::$pdo->prepare($sql);
        $values = array("nom_tag" => $primary_value);
        $req_prep->execute($values);
     } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }

  public static function update($data){
    $table_name = 'p_'.static::$object;
    $class_name = 'Model'.ucfirst(static::$object);
    $primary_key = static::$primary;

    $sql =  "UPDATE $table_name SET ";
    foreach ($data as $cle => $valeur) 
        $sql = $sql . $cle .'=:'.$cle.', ';
    $sql = rtrim($sql," \t,") ." WHERE $primary_key ='$data[$primary_key]';";
    try{
    $req_prep = Model::$pdo->prepare($sql);  
    $req_prep->execute($data);
     } catch(PDOException $e) {
        if ($e->getCode() == 23000){
          return false;
        }else{
          echo $e->getMessage();
          return;
         }
         return true;
      }
  }

  public static function save($data){
    $table_name = 'p_'.static::$object;
    $class_name = 'Model'.ucfirst(static::$object);
    //$primary_key = static::$primary;

    $sql = "INSERT INTO $table_name (";
    foreach ($data as $cle => $valeur) 
        $sql = $sql . $cle .', ';
    $sql = rtrim($sql," \t,") . ") VALUES (";
    foreach ($data as $cle => $valeur) 
        $sql = $sql .':'. $cle .', ';
    $sql = rtrim($sql," \t,") .");";

    try{
    $req_prep = Model::$pdo->prepare($sql);
    $req_prep->execute($data);

     } catch(PDOException $e) {
        if ($e->getCode() == 23000){
          return false;
        }else{
          echo $e->getMessage();
          return;
         }
         return true;
      }
  }

  
}
Model::Init();
?>
