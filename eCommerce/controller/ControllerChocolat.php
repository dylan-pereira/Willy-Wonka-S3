<?php
require_once File::build_path(array("model","ModelChocolat.php")); // chargement du modèle

class ControllerChocolat {
    protected static $object ='chocolat';

    public static function readAll() {
        $tab_chocolat = ModelChocolat::selectAll();
        $view='chocolatgeneral';
        $pagetitle='Liste des Chocolats';
        $controller='chocolat';
        require File::build_path(array("view","view.php"));
    }

    public static function read(){
        
        $chocolat = $_GET['id'];
        $c = ModelChocolat::select($chocolat);
        if ($c == null){
            $controller='error';
            $view='errorgeneral';
            $pagetitle='Oups :(';
            require File::build_path(array("view","view.php"));
        }else{
            $view='detail';
            $pagetitle='Page Produit';
            $controller='chocolat';
            require File::build_path(array("view","view.php"));
        }
    }

    public static function delete(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $id = $_GET['id'];
            ModelChocolat::delete($id);
	    header("Location: index.php?action=readAll&controller=chocolat");	
        } else {
            ControllerChocolat::readAll();
        }
    }

    public static function create(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $type = '';
            $nom = '';
            $prixkilo = '';
            $masse = '';
            $image = '';
            $description = '';
            $action='created';

            $restriction='required';
            $view='update';
            $pagetitle='Confection Chocolat';
            $controller='chocolat';
            require File::build_path(array("view","view.php"));
        } else {
            ControllerChocolat::readAll();
        }
    }

    public static function created(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $data = array(
            "type" => $_GET['type'],
            "nom" => $_GET['nom'],
            "prixkilo" => $_GET['prixkilo'],
            "masse" => $_GET['masse'],
            "image" => $_GET['image'],
            "description" => $_GET['description']);

            ModelChocolat::save($data);

	    header("Location: index.php?action=readAll&controller=chocolat");	
        } else {
            ControllerChocolat::readAll();
        }
    }

    public static function update(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
		if(isset($_GET["id"]) && !empty($_GET["id"])) {
		    $id = $_GET['id'];
			$c = ModelChocolat::select($id);
		    $type = $c->getType();
		    $nom = $c->getNom();
		    $prixkilo = $c->getPrixKilo();
		    $masse = $c->getMasse();
		    $image = $c->getImage();
		    $description = $c->getDescription();

		    $restriction='readonly';
		    $action='updated';

		    $view='update';
		    $pagetitle='Modification Chocolat';
		    $controller='chocolat';
		    require File::build_path(array("view","view.php"));
		} else {
		    $pagetitle="Oups :/";
 		    $view="erroraction";
		    $controller="error";
		    require File::build_path(array("view","view.php"));
		}
        } else {
            ControllerChocolat::readAll();
        }
    }

    public static function updated(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $id = $_GET['id'];
            $chocolat = ModelChocolat::select($id);

            $data = array(
            "id" => $id,
            "type" => $_GET['type'],
            "nom" => $_GET['nom'],
            "prixkilo" => $_GET['prixkilo'],
            "masse" => $_GET['masse'],
            "image" => $_GET['image'],
            "description" => $_GET['description']);
            $chocolat->update($data);

	    header("Location: index.php?action=readAll&controller=chocolat");	
        } else {
            ControllerChocolat::readAll();
        }
    }

}
?>
