 <?php
  require_once File::build_path(array("model","Model.php"));
  class ModelChocolat extends Model{

    protected static $object = 'chocolat';  
    protected static $primary ='id';

    private $id;
    private $type;
    private $nom;
    private $prixkilo;
    private $masse;
    private $image;
    private $description;

    // Getters
    public function getId(){return $this->id;}  

    public function getType(){return $this->type;}  

    public function getNom(){return $this->nom;}

    public function getPrixKilo(){return $this->prixkilo;}

    public function getMasse(){return $this->masse;}

    public function getImage(){return $this->image;}

    public function getDescription(){return $this->description;}

    // Setters
    public function setId($id1){$this->id = $id1;}

    public function setType($type1){$this->type = $type1;}

    public function setNom($nom1){$this->id = $nom1;}

    public function setPrixKilo($prixkilo1){$this->id = $prixkilo1;}

    public function setMasse($masse1){$this->id = $masse1;}

    public function setImage($image1){$this->id = $image1;}

    public function setDescription($description1){$this->description = $description1;}

    //Constructeur
    public function __construct($id = NULL, $t = NULL, $n = NULL, $p = NULL, $mass = NULL, $img = NULL, $desc = NULL) {
    if (!is_null($id) && !is_null($t) && !is_null($n) && !is_null($p) && !is_null($mass) && !is_null($img) && !is_null($desc)) {
      $this->id= $id;
      $this->type = $t;
      $this->nom = $n;
      $this->prixkilo = $p;
      $this->masse = $mass;
      $this->image = $img;
      $this->description= $desc;
      }

    }
}
?>