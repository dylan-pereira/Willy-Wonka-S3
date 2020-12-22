<?php
foreach ($tab_utilisateurs as $utilisateur){
		echo '<article class="other_product_article">
		 IdUtilisateur: <a href="index.php?controller=utilisateur&action=read&id='.rawurlencode($utilisateur->getId()).'">'.htmlspecialchars($utilisateur->getId()).'</a>
		</article>'
	;

	}
?>
