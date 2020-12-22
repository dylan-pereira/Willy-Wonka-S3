 <?php
  require_once File::build_path(array("model","Model.php"));
  class ModelCommande extends Model{

    protected static $object = 'commande';  
    protected static $primary ='id';

    private $id;
    private $idUtilisateur;


    // Getters
    public function getId(){return $this->id;}   

    public function getIdUtilisateur(){return $this->idUtilisateur;}

    // Setters
    public function setId($id1){$this->id = $id1;}

    public function setIdUtilisateur($idUtilisateur){$this->idUtilisateur = $idUtilisateur;}


    //Constructeur
    public function __construct($id = NULL, $idU = NULL) {
    if (!is_null($id) && !is_null($idU)) {
      $this->id= $id;
      $this->idUtilisateur = $idU;
      }
    }

    public static function selectAllContenu($idCommande){
      $table_name = 'p_contenu';
      $class_name = 'ModelContenu';
      
      $sql = 'SELECT p_chocolat.id, type, p_chocolat.nom, quantite, prixkilo, masse FROM p_commande
              JOIN p_contenu ON p_commande.id=p_contenu.idCommande  
              JOIN p_chocolat ON p_contenu.idProduit=p_chocolat.id 
              WHERE idCommande =:nom_tag';
      try{
            $req_prep = Model::$pdo->prepare($sql);
            $values = array("nom_tag" => $idCommande);
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_ASSOC);
            $tab_object = $req_prep->fetchAll();
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
        if (empty($tab_object)){
            return false;
        }
      return $tab_object;
    }

    public static function selectMine($idUtilisateur){

      $sql = 'SELECT * FROM p_commande WHERE idUtilisateur=:nom_tag';
      try{
            $req_prep = Model::$pdo->prepare($sql);
            $values = array("nom_tag" => $idUtilisateur);
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
            $tab_object = $req_prep->fetchAll();
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
        if (empty($tab_object)){
            return false;
        }
      return $tab_object;
    }

}
?>
