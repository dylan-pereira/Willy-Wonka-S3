<?php
    if (isset($_POST["login-submit"])) {
        $email = $_POST["email"];
        $password = $_POST["pwd"];
        $hashedPwd = Security::hasher($password);

        if (empty($email) || empty($password)) {
            $_POST["error"] = "emptyFields";
	    ControllerUtilisateur::connexion();
            exit();
        } else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $_POST["error"] = "invalidEmail";
	    ControllerUtilisateur::connexion();
            exit();
        } else if (!ModelUtilisateur::checkPassword($email,$hashedPwd)) {
            $_POST["error"] = "invalidPwdEmailPair";
	    ControllerUtilisateur::connexion();
            exit();
        } else if (ModelUtilisateur::checkPassword($email,$hashedPwd)){
		$user = ModelUtilisateur::selectByEmail($email);
		if (is_null($user->getNonce())) {
		    $_SESSION['idUser'] = $user->getId();
		    $_SESSION['emailUser'] = $email;
		    $_SESSION['isAdmin'] = $user->getAdmin();
		    $_SESSION['nom'] = $user->getNom();
		    $_SESSION['prenom'] = $user->getPrenom();
		    
		    if (isset($_POST["remember_me"]) && $_POST["remember_me"] == "on") {
			$_SESSION['stayLogged'] = 'on';
		    }
		    header ("Location: index.php");
		} else {
		    $_POST["error"] = "invalidAccount";
		    ControllerUtilisateur::connexion();
		    exit();
		}

        } else {
	    ControllerUtilisateur::connexion();
            exit();
        }
    } else {
	ControllerUtilisateur::connexion();
        exit();
    }
?>
