<?php
foreach ($tab_contenu as $contenu){
		echo '<article class="other_product_article" style="flex-grow:1">
		 IdCommande: <a href="index.php?controller=commande&action=read&id='.rawurlencode($contenu->getIdCommande()).'">'.htmlspecialchars($contenu->getIdCommande()).'</a> | IdProduit: 
		<a href="index.php?controller=chocolat&action=read&id='.rawurlencode($contenu->getIdProduit()).'">'.htmlspecialchars($contenu->getIdProduit()).'</a> | Quantité: '
		.htmlspecialchars($contenu->getQuantite()).' | '
		.
	'<a href="index.php?controller=contenu&action=update&idCommande='.rawurlencode($contenu->getIdCommande()).'&idProduit='.rawurlencode($contenu->getIdProduit()).'"><img src="images/header/settings.png" alt="delete" style="width: 30px;height: 30px;background-color: #888A8588;border-radius: 100%;justify-content: space-around;align-items: center;"></a>'.
	'<a href="index.php?controller=contenu&action=delete&idCommande='.rawurlencode($contenu->getIdCommande()).'&idProduit='.rawurlencode($contenu->getIdProduit()).'"><img src="images/header/delete.png" alt="delete" style="width: 30px;height: 30px;background-color: #888A8588;border-radius: 100%;justify-content: space-around;align-items: center;"></a></article>'
	;

	}
?>
