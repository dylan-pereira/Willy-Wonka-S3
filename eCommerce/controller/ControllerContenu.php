<?php
require_once File::build_path(array("model","ModelContenu.php")); // chargement du modèle

class ControllerContenu {
    protected static $object ='contenu';

    public static function readAll() {
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $tab_contenu = ModelContenu::selectAll();         
            $view='contenugeneral';
            $pagetitle='Liste des Contenus';
            $controller='contenu';
            require File::build_path(array("view","view.php"));}
        else{
            ControllerCommande::readMine();
        }
    }

    public static function delete(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $idCommande = $_GET['idCommande'];
            $idProduit = $_GET['idProduit'];
            ModelContenu::deleteContenu($idCommande,$idProduit);
	    header("Location: index.php?action=readAll&controller=contenu");	
	}else{
            ControllerCommande::readMine();
        }
    }

    public static function create(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $idCommande = '';
            $idProduit = '';
            $quantite ='';
            $action='created';
            $restriction='required';
            $view='update';
            $pagetitle='Création contenu';
            $controller='contenu';
            require File::build_path(array("view","view.php"));}
        else{
            ControllerCommande::readMine();
        }
    }


    public static function created(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $idCommande = $_GET['idCommande'];
            $idProduit = $_GET['idProduit'];
            $quantite = $_GET['quantite'];
            $data = array(
            "idCommande" => $idCommande,
            "idProduit" => $idProduit,
            "quantite" => $quantite);
            $contenu = new ModelContenu($idCommande,$idProduit,$quantite);
            $contenu->save($data);
	    header("Location: index.php?action=readAll&controller=contenu");	
	}else{
            ControllerCommande::readMine();
        }
    }

    //Update ne fait pas vraiment de sens dans ce controller.
    public static function update(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $idCommande = $_GET['idCommande'];
            $idProduit = $_GET['idProduit'];
            $quantite = ModelContenu::selectContenu($idCommande,$idProduit)->getQuantite();
            $restriction='readonly';
            $action='updated';
            $view='update';
            $pagetitle='Modification Contenu';
            $controller='contenu';
            require File::build_path(array("view","view.php"));}
        else{
            ControllerCommande::readMine();
        }
    }

    public static function updated(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $idCommande = $_GET['idCommande'];
            $idProduit = $_GET['idProduit'];
            $contenu = ModelContenu::selectContenu($idCommande,$idProduit);
            $data = array(
            "idCommande" => $idCommande,
            "idProduit" => $idProduit,
            "quantite" => $_GET['quantite']);
            $contenu->update($data);
	    header("Location: index.php?action=readAll&controller=contenu");	
	}else{
            ControllerCommande::readMine();
        }
    }  
}
?>
