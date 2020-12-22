<h1 id="top_page_title">Connexion</h1>
<div class="beige_bg form_container">
	<h2>Connecte toi avec ton email</h2>
	<form method="post" action="index.php">
        <?php echo (isset($_POST["error"])? "<li class=\"".$_POST["error"]."\">".(($_POST["error"]=="emptyFields")? "Veuillez remplir tous les champs.</li>":
                                                                                (($_POST["error"]=="invalidEmail")? "L'addresse email entrer ne respécte pas la forme d'une adresse email classique.</li>" :
										(($_POST["error"]=="invalidPwdEmailPair")? "L'email et le mot de passe ne correspondent pas.</li>":
										(($_POST["error"]=="invalidAccount")? "Le compte lié à ce mail n'as pas encore été validé. Veuillez vérifier vos mail.</li>":"")))):"")?>
        <fieldset class="type_field">
			<label>
				<img src="images/connexion/user-icon.png" alt="user_icon" />
				<input type="email" name="email" <?php echo ((isset($_POST["error"]))? (($_POST["error"]=="emptyFields" && !empty($email))? "" : "class=\"error\""): "");?> placeholder="Email" id="email" value="<?php echo (isset($_POST["email"])? htmlspecialchars($_POST["email"]) : "")?>" required/>
			</label>
		</fieldset>
		<fieldset class="type_field">
			<label>
				<img src="images/connexion/pass-icon.png" alt="password_icon" />
				<input type="password" name="pwd" <?php echo (isset($_POST["error"])? ((($_POST["error"]=="emptyFields" || $_POST["error"]=="invalidEmail") && !empty($password))? "" : "class=\"error\""): ""); ?> placeholder="Mot de passe" title="Pas de pattern pour plus de faciliter à test."  id="password" maxlength="32"  required/>
			</label>
		</fieldset>
		<fieldset>
			<label>
				<input type="checkbox" name="remember_me" />
				Se souvenir de moi
			</label>
		</fieldset>
		    <input type='hidden' name='action' value='connecting' >
                    <input type='hidden' name='controller' value='utilisateur'>
		<button type="submit" name="login-submit" class="submit">
			<img src="images/connexion/lock-icon.png" alt="lock_icon" />
			Sign In
		</button>
		<a href="index.php?page=resetmdp&controller=utilisateur">Mot de passe oublié ?</a>
	</form>
	<div class="register">
		<h3>Nouveau ici ?</h3>
		<a href="index.php?action=create&controller=utilisateur" class="button">Créer un compte</a>
	</div>
</div>
