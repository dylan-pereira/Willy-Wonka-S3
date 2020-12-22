 <?php
  require_once File::build_path(array("model","Model.php"));
  class ModelContenu extends Model{

    protected static $object = 'contenu';  
    protected static $primary1 ='idCommande';
    protected static $primary2 ='idProduit';

    private $idCommande;
    private $idProduit;
    private $quantite;


    // Getters
    public function getIdCommande(){return $this->idCommande;}   

    public function getIdProduit(){return $this->idProduit;}

    public function getQuantite(){return $this->quantite;}


    // Setters
    public function setIdCommande($idCommande1){$this->idCommande = $idCommande1;}

    public function setIdProduit($idProduit1){$this->idProduit = $idProduit1;}


    //Constructeur
    public function __construct($idC = NULL, $idP = NULL, $q = NULL) {
    if (!is_null($idC) && !is_null($idP) && !is_null($q)) {
      $this->idCommande= $idC;
      $this->idProduit = $idP;
      $this->quantite = $q;
      }
    }

    public static function selectContenu($primary_value1, $primary_value2) {
        $table_name = 'p_'.static::$object;
        $class_name = 'Model'.ucfirst(static::$object);
        $primary_key1 = static::$primary1;
        $primary_key2 = static::$primary2;

        $sql = 'SELECT * FROM '.$table_name .' WHERE '. $primary_key1. '=:nom_tag1'.' AND '. $primary_key2. '=:nom_tag2';
        //echo $sql;
        //echo $primary_value;
        try{
            $req_prep = Model::$pdo->prepare($sql);
            $values = array("nom_tag1" => $primary_value1,"nom_tag2" => $primary_value2);
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

    public static function deleteContenu($primary_value1, $primary_value2){
    $table_name = 'p_'.static::$object;
    $class_name = 'Model'.ucfirst(static::$object);
    $primary_key1 = static::$primary1;
    $primary_key2 = static::$primary2;

    $sql = "DELETE FROM $table_name WHERE $primary_key1=:nom_tag1 AND $primary_key2=:nom_tag2";
    try{
        $req_prep = Model::$pdo->prepare($sql);
        $values = array("nom_tag1" => $primary_value1,"nom_tag2" => $primary_value2);
        $req_prep->execute($values);
     } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }

  public static function update($data){
    $table_name = 'p_'.static::$object;
    $class_name = 'Model'.ucfirst(static::$object);
    $primary_key1 = static::$primary1;
    $primary_key2 = static::$primary2;

    $sql =  "UPDATE $table_name SET ";
    foreach ($data as $cle => $valeur) 
        $sql = $sql . $cle .'=:'.$cle.', ';
    $sql = rtrim($sql," \t,") ." WHERE $primary_key1 ='$data[$primary_key1]' AND $primary_key2 ='$data[$primary_key2]';";
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
?>
