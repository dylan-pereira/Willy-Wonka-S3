
<!-- positionnement des checkbox ( qui seront dans tout les cas en display:none) -->
<input type ="checkbox" id="checkquestion1" />
<input type ="checkbox" id="checkquestion2" />
<input type ="checkbox" id="checkquestion3" />
<input type ="checkbox" id="checkquestion4" />
<input type ="checkbox" id="checkquestion5" />


<h1 id="top_page_title">F.A.Q</h1>	



<article id ="Sommaire"><!-- Sommaire des questions -->
	<h2> Questions </h2>
	<ul>
		<li class ="deroulant">
			<a href="#questionreponse1">
				<h2>Comment l'entreprise s'est elle créée ?</h2>
			</a>
		</li>
		<li class ="deroulant">
			<a href="#questionreponse2"><h2>Comment envoyer un message à l'entreprise ?</h2>
			</a>
		</li>
		<li class ="deroulant">
			<a href="#questionreponse3"><h2>Comment acheter du chocolat ?</h2>
			</a>
		</li>
		<li class ="deroulant">
			<a href="#questionreponse4"><h2>Une allergie est survenue en mangeant du chocolat ?</h2>
			</a>
		</li>
		<li class ="deroulant">
			<a href="#questionreponse5"><h2>Est-ce que votre site est responsive ?</h2>
			</a>
		</li>
	</ul>
</article>

<article><!-- reponses aux questions -->
	<h2>Reponses</h2>
	<ul>
		<li class="deroulant" id="questionreponse1">

			<label for="checkquestion1" >
				<img src="images/ouvrir.png" alt="fleche">
				Comment l'entreprise s'est elle créée ?
			</label>

			<div class="reponse">
				<p>
					<img src="images/rodolphe_lindt.png" alt="rodolphe lindt">
				</p>
				<p>
					Nous sommes en 1879. Rodolphe Lindt, fils d'un pharmacien bernois, veut fabriquer du chocolat. À l'époque, le chocolat est dur … dur à fabriquer et dur à manger. C’est pourquoi Rodolphe Lindt, qui est confiseur et, en outre, épicurien et bon vivant, souhaite créer un nouveau chocolat, doux et fin. Au grand étonnement de la haute société bernoise, Rodolphe s’installe dans une usine vétuste où, essai après essai, il tente de mettre au point la recette du chocolat idéal. Mais les résultats obtenus ne le satisfont guère.
				</p>
				<p>
					Rodolphe observe par exemple la formation d’une pellicule blanche, que son frère Auguste analyse (il est pharmacien, comme leur père). En fait, cette pellicule s'avère être sans danger : il s'agit de graisse cristallisée. Rodolphe reprend ses essais et travaille tard dans la nuit. Il songe à rajouter des fèves de cacao, à faire cuire le beurre de cacao, chose que personne n’avait fait jusque là… Il a beau travailler la recette, multiplier les essais, réfléchir encore et toujours, quoi qu'il fasse, il ne parvient pas à se rapprocher de son objectif. Obtenir du « chocolat fin » serait-il impossible ?
				</p>
				<p>
					Un vendredi soir, Rodolphe Lindt quitte son usine en oubliant d’arrêter les machines, peut-être pressé ou par intuition, nul ne sait. Quoi qu'il en soit, les machines continuent à tourner le lendemain et le surlendemain...
				</p>
				<p>
					Lorsqu'il ouvre la porte de l’usine le lundi matin, une délicieuse odeur remplit la salle. Non seulement la masse de chocolat contenue dans la cuve de malaxage n'a pas brûlée, mais elle brille et semble très appétissante. Rodolphe goûte sa préparation et c’est une révélation : ce chocolat fond dans la bouche… un pur délice !
				</p>
			</div>

		</li>

		<li class="deroulant" id="questionreponse2">

			<label for="checkquestion2">
				<img src="images/ouvrir.png" alt="fleche">
				Comment envoyer un message à l'entreprise ?
			</label>

			<div class="reponse">
				<p>
					Pour contacté notre entreprise, vous pouvez deposé un message directement sur notre <a href="index.php?page=contact">page contact.</a>
				</p>
			</div>

		</li>

		<li class="deroulant" id="questionreponse3">

			<label for="checkquestion3">
					<img src="images/ouvrir.png" alt="fleche">
					Comment acheter du chocolat ?
			</label>

			<div class="reponse">
				<p>
					Pour acheter du chocolat, il vous suffit de vous rendre dans un de nos commerces, ou bien de procédé a l'achat directement sur <a href="index.php?controller=chocolat&action=readAll">notre page produit.</a>
				</p>
			</div>

		</li>

		<li class="deroulant" id="questionreponse4">
			<label for="checkquestion4">
					<img src="images/ouvrir.png" alt="fleche">
					Une allergie est survenue en mangeant du chocolat ?
			</label>

			<div class="reponse">
				<p>
					Il faut alors commencer a manger 5 fruits et legumes par jours.
				</p>
			</div>

		</li>

		<li class="deroulant" id="questionreponse5">
			<label for="checkquestion5">
					<img src="images/ouvrir.png" alt="fleche">
					Est-ce que votre site est responsive ?
			</label>

			<div class="reponse">
				<p>
					Bien entendu, ce site est adaptable a toutes les résolutions.
				</p>
			</div>

		</li>
	</ul>
</article>

