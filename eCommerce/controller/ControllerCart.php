<?php
//require_once File::build_path(array("model","ModelChocolat.php")); // chargement du modèle

class ControllerCart {
    protected static $object ='cart';

    public static function showCart() {
        $pagetitle = 'Panier';
        $controller='cart';
        $view='list';
        require File::build_path(array("view","view.php"));

    }

    public static function addToCart() {
        $id = $_POST['idChocolat'];
        $quantity = $_POST['quantity'];

        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }
        if (!isset($_SESSION["cartSize"])) {
            $_SESSION["cartSize"] = 0;
        }

        $added = false;
        for ($i=0;$i<sizeof($_SESSION["cart"]);$i++) {
            if (isset($_SESSION["cart"][$i]) && $_SESSION["cart"][$i]["id"] == $id) {
                $_SESSION["cart"][$i]["quantity"] += $quantity;
                $added = true;
            }
        }

        if (!$added) {
            array_push($_SESSION['cart'], array("id" => $id, "quantity" => $quantity));
            $_SESSION["cartSize"] += 1;
        }

	header("Location: index.php?action=showCart&controller=cart");	
    }

    public static function deleteFromCart() {
        $id = $_GET["idProduct"];
        for ($i=0;$i<sizeof($_SESSION["cart"]);$i++) {
            if ($_SESSION["cart"][$i]["id"] == $id) {
                $_SESSION["cart"][$i]["quantity"] = 0;
            }

        }

        $empty = false;
        foreach ($_SESSION["cart"] as $item) {
            if ($item["quantity"] != 0) {
                $empty = true;
            }
        }
        if (!$empty) {
            $_SESSION['cart'] = array();
        }


	header("Location: index.php?action=showCart&controller=cart");	
    }

    public static function addOne() {
        $id = $_GET["idProduct"];
        for ($i=0;$i<sizeof($_SESSION["cart"]);$i++) {
            if ($_SESSION["cart"][$i]["id"] == $id) {
                $_SESSION["cart"][$i]["quantity"] += 1;
            }

        }
	header("Location: index.php?action=showCart&controller=cart");	
    }

    public static function minusOne() {
        $id = $_GET["idProduct"];
        for ($i=0;$i<sizeof($_SESSION["cart"]);$i++) {
            if ($_SESSION["cart"][$i]["id"] == $id) {
                $_SESSION["cart"][$i]["quantity"] -= 1;
            }

        }

        $empty = false;
        foreach ($_SESSION["cart"] as $item) {
            if ($item["quantity"] != 0) {
                $empty = true;
            }
        }
        if (!$empty) {
            $_SESSION['cart'] = array();
        }

	header("Location: index.php?action=showCart&controller=cart");	
    }

    public static function emptyCart() {
        $_SESSION['cart'] = array();

	header("Location: index.php?action=showCart&controller=cart");	
    }

    public static function payer() {
	if (isset($_SESSION["idUser"])) {
		$dataCommande = array(
		    "idUtilisateur" => $_SESSION["idUser"]);

		ModelCommande::save($dataCommande);

		$idCommande = Model::$pdo->lastInsertId();

		foreach ($_SESSION["cart"] as $item) {
		    $dataContenu = array(
			"idCommande" => $idCommande,
			"idProduit" => $item["id"],
			"quantite" => $item["quantity"]
		    );
		    ModelContenu::save($dataContenu);
		}
		$_SESSION["cart"] = array();
		header("Location: index.php?action=readMine&controller=commande");
	} else {
		ControllerUtilisateur::connexion();
	}
    }
    
}
?>
