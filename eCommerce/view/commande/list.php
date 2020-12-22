<?php
if($tab_commande!=null){
	foreach ($tab_commande as $commande){
			echo '<a href="index.php?controller=commande&action=read&id='.rawurlencode($commande->getId()).'">
		<article class="other_product_article" style="width:100%">
		  IdCommande:'.htmlspecialchars($commande->getId()).' | IdUtilisateur: '
		.htmlspecialchars($commande->getIdUtilisateur()).' |</article> </a>';
	}
}else{
	echo '<p> Vous n\'avez pas de commandes. Allez sur <a href="index.php?controller=chocolat&action=readAll"> Chocolat</a> pour commander ! </p>';
}
?>

