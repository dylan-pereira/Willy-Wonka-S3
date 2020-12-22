			<h1 id="top_page_title">Inscription</h1>
			<div class="beige_bg form_container">
				<h2>Créer ton compte avec ton pseudo</h2>
				<form method="post" action="index.php">
                    <?php echo (isset($_POST["error"])? "<li class=\"".$_POST["error"]."\">".(($_POST["error"]=="emptyFields")? "Veuillez remplir tous les champs.</li>":
                                                                                (($_POST["error"]=="invalidEmail")? "L'addresse email entrer ne respécte pas la forme d'une adresse email classique.</li>" :
                                                                                (($_POST["error"]=="emailAlreadyUsed")? "L'email est déjà associé à un compte, essayez de vous <a href=\"index.php?page=connexion&controller=utilisateur\">connecter</a>.</li>":
                                                                                (($_POST["error"]=="passwordRepeat")? "Les mot de passe ne sont pas identiques.</li>" :"")))): "");?>
                    <div class="nom_prenom">
                        <fieldset class="type_field">
                            <label>
                                <img src="images/connexion/user-icon.png" alt="user_icon" />
                                <input type="text" name="prenom" <?php echo ((isset($_POST["error"]))? (($_POST["error"]=="emptyFields")? ((empty($prenom))? "class=\"error\"" : ""): "") : "");?> placeholder="Prenom" value="<?php echo ((isset($_POST["prenom"]))? htmlspecialchars($_POST["prenom"]): "");?>" maxlength="32" required />
                            </label>
                        </fieldset>
                        <fieldset class="type_field">
                            <label>
                                <img src="images/connexion/user-icon.png" alt="user_icon" />
                                <input type="text" name="nom" <?php echo ((isset($_POST["error"]))? (($_POST["error"]=="emptyFields")? ((empty($nom))? "class=\"error\"" : ""): "") : "");?> placeholder="Nom" value="<?php echo ((isset($_POST["nom"]))? htmlspecialchars($_POST["nom"]): "");?>"  maxlength="32" required />
                            </label>
                        </fieldset>
                    </div>
                    <fieldset class="type_field">
                        <label for="gender">
                            <img src="images/connexion/gender-icon.png" alt="user_icon" />
                        </label>
                        <div <?php echo ((isset($_POST["error"]))? (($_POST["error"]=="emptyFields")? ((empty($gender))? "class=\"error\"" : ""): "") : "");?> >
                            <div>
                                <input type="radio" id="male" name="gender" value="Homme" <?php echo ((isset($_POST["gender"]) && $_POST["gender"]=="Homme")? "checked":""); ?> required>
                                <label for="male">Homme</label>
                            </div>
                            <div>
                                <input type="radio" id="female" name="gender" value="Femme"  <?php echo ((isset($_POST["gender"]) && $_POST["gender"]=="Femme")? "checked":""); ?> required>
                                <label for="female">Femme</label>
                            </div>
                            <div>
                                <input type="radio" id="non_specifie" name="gender" value="Non spécifié"  <?php echo ((isset($_POST["gender"]) && $_POST["gender"]=="Non spécifié")? "checked":""); ?> required>
                                <label for="non_specifie">Non Spécifié</label>
                            </div>
                            <div>
                                <input type="radio" id="other" name="gender" value="other" <?php echo (isset($_POST["other_gender"])? "checked":""); ?> required>
                                <label for="other"><input type="text" name="other_gender" placeholder="autre" value="<?php echo ((isset($_POST["other_gender"]))? htmlspecialchars($_POST["other_gender"]): "");?>" maxlength="32"></label>
                            </div>
                        </div>
                    </fieldset>
					<fieldset class="type_field">
						<label>
							<img src="images/connexion/email-icon.png" alt="email_icon" />
							<input type="email" name="email" <?php echo (isset($_POST["email"])? (($_POST["error"]=="emptyFields")? ((empty($email))? "class=\"error\"": ""):(($_POST["error"]!="passwordRepeat")? "class=\"error\"" : "" )) : "" ) ?> placeholder="Email" value="<?php echo ((isset($_POST["email"]))? htmlspecialchars($_POST["email"]): "");?>" maxlength="64" required />
						</label>
					</fieldset>
					<fieldset class="type_field">
						<label>
							<img src="images/connexion/pass-icon.png" alt="password_icon" />
							<input type="password" name="pwd" <?php echo (isset($_POST["error"])? (($_POST["error"]=="emptyFields")? ((empty($pwd))? "class=\"error\"": ""): (($_POST["error"]=="passwordRepeat")? "class=\"error\"" : "" )):""); ?> placeholder="Nouveau mot de passe" title="Doit contenir au minimum 8 charactere, dont 1 chiffre, 1 lettre miniscule, 1 lettre majuscule et 1 signe" maxlength="32" required />
						</label>
					</fieldset>
					<fieldset class="type_field">
						<label>
							<img src="images/connexion/pass-icon.png" alt="password_icon" />
							<input type="password" name="pwd-repeat" <?php echo (isset($_POST["error"])? (($_POST["error"]=="emptyFields")? ((empty($pwd_repeat))? "class=\"error\"": ""): (($_POST["error"]=="passwordRepeat")? "class=\"error\"" : "" )):""); ?> placeholder="Vérifié Mot de passe" maxlength="32" required />
						</label>
					</fieldset>
                    <input type='hidden' name='action' value='creating' >
                    <input type='hidden' name='controller' value='utilisateur'>
					<button type="submit" name="signup-submit" class="submit">
						Créer un compte
					</button>
				</form>
			</div>

