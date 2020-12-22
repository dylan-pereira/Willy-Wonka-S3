
			<h1 id="top_page_title"> Contact</h1>

			<form action="index.php?page=wip" method="post">


				<fieldset><h2>Informations personnelles</h2>
					<div>
		 				<span>Sexe</span>

						<input type="radio" id="mec" name="sexe" value="homme" checked>
		  				<label for="mec">Homme</label>

		  				<input type="radio" id="meuf" name="sexe" value="femme">
		  				<label for="meuf">Femme</label>
		  				
	  				</div>
	  				<div>
	  					<div>
		  					<label for="surname">Nom * </label>
							<input id="surname" name="uname" type="text" placeholder="Entrez votre nom ici." required>
						</div>
						<div>
							<label for="firstname">Prénom * </label>
							<input id="firstname" name="fname" type="text" placeholder="Entrez votre prénom ici." required>
						</div>
					</div>
	  				
					<div>
						<label for="pays">Pays d'origine</label>
						<select name="paysorigine" id="pays">
						    <option value="us">USA</option>
						    <option value="it">Italie</option>
						    <option value="es">Espagne</option>
						    <option value="us">USA</option>
						    <option value="uk">Royaume-Uni</option>
						    <option value="fr" selected>France</option>
						    <option value="cn">Chine</option>
						    <option value="vn">Viêt Nam</option>
						</select>
					</div>
					<div>
		  				<label for="courrier">E-mail * </label>
						<input id="courrier" name="mail" type="email" placeholder="votremail@domaine.com" required>
					</div>
				</fieldset>
				<fieldset><h2>Quand souhaitez vous être recontacté ?</h2>
					<div>
		  				<label for="datereco">Date à laquelle vous souhaitez être recontacté * </label>
						<input id="datereco" name="daterecontact" type="date" required>
					</div>
					
				</fieldset>
				<fieldset><h2>Informations à nous communiquées</h2>
					<div id ="sexe">
						<label for="engagement">Vous avez entendu parlé de nous via ?</label>
						<select name="nivenga" id="engagement">
	    					<option value="">--Merci de sélectionner une proposition--</option>
						    <option value="site">Notre site Web</option>
						    <option value="moteur">Un moteur de recherche</option>
						    <option value="reco">Une recommandation</option>
						    <option value="media">Par les médias</option>
						    <option value="employé">Par l'un de nos employés</option>
						    <option value="autre">Autre</option>
						</select>
					</div>
					<div id="mot">
						<label for="message">Un mot a nous dire ?</label>
						<textarea  name="messagechuck" id="message" rows="7" cols="30"></textarea>
					</div>
					</fieldset>
				<div  >
					<input type="submit" value="Envoyer" class ="boutton">
				</div>
			</form>
		