<?php
require_once File::build_path(array("controller","ControllerChocolat.php"));
require_once File::build_path(array("controller","ControllerCommande.php"));
require_once File::build_path(array("controller","ControllerUtilisateur.php"));
require_once File::build_path(array("controller","ControllerContenu.php"));
require_once File::build_path(array("controller","ControllerCart.php"));

if(isset($_GET['action']) || isset($_GET['controller']) || isset($_POST['action']) || isset($_POST['controller'])){
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}else if(isset($_POST['action'])) {
		$action = $_POST['action'];
	}else{
		$action='readAll';
	}

	if(isset($_GET['controller'])){
	 	$controller = $_GET['controller'];
	}else if (isset($_POST["controller"])){
	 	$controller = $_POST['controller'];
	}else{
		$controller = 'chocolat';
	}

	$controller_class = 'Controller'.ucfirst($controller);
	$class_methods = get_class_methods($controller_class);


	if(class_exists($controller_class) && !isset($_GET["page"])){
		if(in_array($action, $class_methods)){
			$controller_class::$action(); 
		}else{
			$controller='error';
		    $view='erroraction';
		    $pagetitle='Oups :(';
		    require File::build_path(array("view","view.php"));
		}
	}elseif (isset($_GET["page"])) {
		$view = $_GET["page"];
		$pagetitle = $view;
		require_once File::build_path(array("view","view.php"));
	}else{
		$controller='error';
		$view='errorcontroller';
		$pagetitle='Oups :(';
		require File::build_path(array("view","view.php"));
	}


}else{
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
 		$page = "accueil";
	}
	$view=$page;
	$pagetitle=ucfirst($page);
	require_once File::build_path(array("view","view.php"));

}
?>
