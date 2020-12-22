<section class="other_products" id="general">
	<h1 id="top_page_title">Utilisateurs</h1>
	<div class="other_products_list general" style="display:block;">
		<?php
		$tab_utilisateurs = ModelUtilisateur::selectAll(); 
			require File::build_path(array("view","utilisateur","list.php"));
		?>
	</div>
</section>
