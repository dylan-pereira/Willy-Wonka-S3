<section class="page_product">
	<article class="other_product_article" style="width:100%">
		<?php 
		echo '<p>Utilisateur N°'.htmlspecialchars($utilisateur->getId()).'     -    '.htmlspecialchars($utilisateur->getPrenom()).', '.htmlspecialchars($utilisateur->getNom()).', '.htmlspecialchars($utilisateur->getGender()).', '.htmlspecialchars($utilisateur->getEmail()).', '.htmlspecialchars($utilisateur->getAdmin()).'</p>';
		?>
		<a href="index.php?controller=utilisateur&action=readAll">Retour</a>
	</article>
</section>
