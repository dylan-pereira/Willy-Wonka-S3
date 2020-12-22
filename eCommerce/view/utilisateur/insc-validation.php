<?php
$pagetitle = "validation inscription";
	if (isset($_GET["id"]) && isset($_GET["validation"]) && isset ($_GET["nonce"])) {
		$id = $_GET["id"];
		$u = ModelUtilisateur::select($id);
		if (is_null($u->getNonce())) {
			echo "<p> Compte validé! Vous pouvez vous <a href=\"index.php?page=connexion&controller=utilisateur\">connecter</a></p>";
		} else if ($_GET["validation"] && $u->getNonce() == $_GET["nonce"]) {
			ModelUtilisateur::validate($id);
			if (is_null(ModelUtilisateur::select($id)->getNonce())) {
				echo "<p> Compte validé! Vous pouvez vous <a href=\"index.php?page=connexion&controller=utilisateur\">connecter</a></p>";
			}
		} else {
			echo "<p> Erreur sur le lien veuillez réessayez </p>";
		}
	} else {
		echo "<p>Inscription compléte, valider votre compte par mail!</p>";
	}

?>
