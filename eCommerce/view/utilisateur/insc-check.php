<?php
    if(isset($_POST["signup-submit"])) {

        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $gender = $_POST["gender"];
        $other_gender = $_POST["other_gender"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $pwd_repeat = $_POST["pwd-repeat"];

        if (empty($prenom) || empty($nom) || empty($email) || empty($pwd) || empty($pwd_repeat) || (empty($gender) && empty($other_gender))) {
            $_POST["error"] = "emptyFields";
	    ControllerUtilisateur::create();
            exit();
        } else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $_POST["error"] = "invalidEmail";
            unset($_POST["email"]);
	    ControllerUtilisateur::create();
            exit();
        } else if (ModelUtilisateur::selectByEmail($email)) {
            $_POST["error"] = "emailAlreadyUsed";
            unset($_POST["email"]);
	    ControllerUtilisateur::create();
            exit();
        } else if ($pwd != $pwd_repeat) {
            $_POST["error"] = "passwordRepeat";
	    ControllerUtilisateur::create();
            exit();
        } else {
            if (isset($_POST["other_gender"]) && !empty($_POST['other_gender'])) {
                $gender = $other_gender;
	    }

            $hashed_pwd = Security::hasher($pwd);
            $nonce = Security::generateRandomHex();

            $data = array(
                "prenom" => $prenom,
                "nom" => $nom,
                "gender" => $gender,
                "email" => $email,
                "password" => $hashed_pwd,
                "admin" => 1,
                "nonce" => $nonce
            );
            ControllerUtilisateur::created($data);

	    $link = "https://".$_SERVER["SERVER_NAME"].$_SERVER["PHP_SELF"]."?controller=utilisateur&page=insc-validation&validation=true&nonce=".$nonce."&id=".ModelUtilisateur::selectByEmail($email)->getID();
            $msg = "Cliquez sur le lien qui suit pour activez votre compte Willy Wonka:\n <a href=\"".$link."\">".$link."</a>";
            $msg = wordwrap($msg, 70);

	    $pattern = "/^([A-Za-z]{1,})(@yopmail[.]com)$/i";
	    if(preg_match($pattern, $email)) {
		    mail($email, "Validation de votre compte Willy Wonka", $msg);  // version ??.yopmail.fr 

	    } else {
		    mail("bob@yopmail.com", "Validation de votre compte Willy Wonka", $msg);  // version bob.yopmail.fr 
	//            mail($email, "Validation de votre compte Willy Wonka", $msg);  // version normal
	    }



        }

    } else {
	ControllerUtilisateur::create();
        exit();
    }

?>

