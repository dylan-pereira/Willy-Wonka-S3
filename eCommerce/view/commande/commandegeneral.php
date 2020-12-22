<section class="other_products" id="general">
	<h1 id="top_page_title">Commandes</h1>
	<div class="other_products_list general" style="display:block;">
		<?php
		$tab_chocolat = ModelCommande::selectAll(); 
			require File::build_path(array("view","commande","list.php"));

		?>
	</div>
	<a href="index.php?controller=commande&action=create"> <h1>Nouvelle commande</h1></a>
</section>
