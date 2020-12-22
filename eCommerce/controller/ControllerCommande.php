<?php
require_once File::build_path(array("model","ModelCommande.php")); // chargement du modèle

class ControllerCommande {
    protected static $object ='commande';

    public static function readAll() {
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $tab_commande = ModelCommande::selectAll();         
            $view='commandegeneral';
            $pagetitle='Liste des Commandes';
            $controller='commande';
            require File::build_path(array("view","view.php"));}
        else{
            ControllerCommande::readMine();
        }
    }

    public static function readMine() {
        if(isset($_SESSION["idUser"])){
            $tab_commande = ModelCommande::selectMine($_SESSION["idUser"]);     
            $view='commandegeneral';
            $pagetitle='Liste des Commandes';
            $controller='commande';
            require File::build_path(array("view","view.php"));
        }else{
            $controller='utilisateur';
            $view='connexion';
            $pagetitle='Connexion';
            require File::build_path(array("view","view.php"));
        }  
    }

    public static function read(){
	if(isset($_GET['id'])){
		$c = $_GET['id'];
		$commande = ModelCommande::select($c);
		    if ($commande == null){
			$controller='error';
			$view='errorgeneral';
			$pagetitle='Oups :(';
			require File::build_path(array("view","view.php"));
		    }else{
			if ((isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) || $_SESSION['idUser'] == $commande->getIdUtilisateur()) {
				$view='detail';
				$pagetitle='Détails commande';
				$controller='commande';
				require File::build_path(array("view","view.php"));
			}else{
			    ControllerCommande::readMine();
			}
		    }
	}else{
	    $controller='error';
	    $view='errorgeneral';
	    $pagetitle='Oups :(';
	    require File::build_path(array("view","view.php"));
	}
        
    }

    public static function delete(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $id = $_GET['id'];
            ModelCommande::delete($id);
	    header("Location: index.php?action=readAll&controller=commande");	
	}else{
            ControllerCommande::readMine();
        }
    }

    public static function create(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $id = '';
            $idUtilisateur = '';
            $action='created';
            $restriction='';
            $view='update';
            $pagetitle='Création commande';
            $controller='commande';
            require File::build_path(array("view","view.php"));
	}else{
            ControllerChocolat::readAll();
        }
    }


    public static function created(){
        if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
            $idUtilisateur = $_GET['idUtilisateur'];
            $data = array(
                "id" => 'null',
                "idUtilisateur" => $idUtilisateur);
            ModelCommande::save($data);
	    header("Location: index.php?action=readAll&controller=commande");	
	}else{
            ControllerCommande::readMine();
        }
    }

    
}
?>
