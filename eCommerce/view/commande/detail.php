<section class="page_product">
	<article class="other_product_article" style="width:100%">
		<?php 
		$tab_contenu = ModelCommande::selectAllContenu($commande->getId());
		if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
			echo '<p style="padding: 20px;">Commande N°'.htmlspecialchars($commande->getId()).'     -    '.htmlspecialchars(ModelUtilisateur::select($commande->getIdUtilisateur())->getNom()).','.htmlspecialchars(ModelUtilisateur::select($commande->getIdUtilisateur())->getPrenom()).'</p>';
		}else{//si pas admin il est forcément dans Mes commandes donc on peut afficher ses infos sans faire de requêtes.
			echo '<p style="padding: 20px;">Commande N°'.htmlspecialchars($commande->getId()).'     -    '.htmlspecialchars($_SESSION["nom"]).', '.htmlspecialchars($_SESSION["prenom"]).'</p>';
		}

		echo'
		<table style ="width: 100%; text-align: center;">
    		<thead>
		        <tr>
		            <th>Produit</th>
		            <th>Quantité</th>
		            <th>Prix Unitaire</th>	
		            <th>Prix Total</th>
		            <th>Actions</th>
		        </tr>
		    </thead>
		    <tbody>';
		if($tab_contenu != null){
			$total=0;
		foreach ($tab_contenu as $contenu){
			$total =$total + $contenu['quantite']*$contenu['prixkilo']*$contenu['masse']/1000;
		echo '
		        <tr>
		            <td><a style="color: grey"  href="index.php?controller=chocolat&action=read&id='.rawurlencode($contenu['id']).'">'.htmlspecialchars($contenu['type']).' '.htmlspecialchars($contenu['nom']).'</a></td>
		            <td>'.htmlspecialchars($contenu['quantite']).'</td>
		            <td>'.htmlspecialchars($contenu['prixkilo']*$contenu['masse']/1000).'€</td>
		            <td>'.htmlspecialchars($contenu['quantite']*$contenu['prixkilo']*$contenu['masse']/1000).'€</td>
		            <td>';

		            if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
		            	echo'
		            	<a href="index.php?controller=contenu&action=update&idCommande='.rawurlencode($commande->getId()).'&idProduit='.rawurlencode($contenu['id']).'"><img src="images/header/settings.png" alt="delete" style="width: 30px;height: 30px;background-color: #888A8588;border-radius: 100%;justify-content: space-around;align-items: center;"></a>
		            	<a href="index.php?controller=contenu&action=delete&idCommande='.rawurlencode($commande->getId()).'&idProduit='.rawurlencode($contenu['id']).'"><img src="images/header/delete.png" alt="delete" style="width: 30px;height: 30px;background-color: #888A8588;border-radius: 100%;justify-content: space-around;align-items: center;"></a>';
		            }
		        echo '</tr>';}
		}else{
			echo '<p>Cette commande est vide</p>';
		}
		echo '
				<tr>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td>';
		            if(isset($total)){
		            	echo htmlspecialchars($total)."€";}
		            echo '
		            </td>
		        </tr>
			</tbody>
		</table>';

		?>
		<a style="color: black"  href="index.php?controller=commande&action=readAll">Retour</a>
	</article>
</section>