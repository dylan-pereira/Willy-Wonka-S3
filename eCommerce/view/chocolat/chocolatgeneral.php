<section class="other_products" id="general">
	<h1 id="top_page_title">Nos Chocolats</h1>
	<div class="other_products_list general">
		<?php
		$tab_chocolat = ModelChocolat::selectAll();
			require File::build_path(array("view","chocolat","list.php"));
		?>
	</div>
    <?php
    if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0)
        echo "<a href=\"index.php?controller=chocolat&action=create\"> <h1>Confectionner un nouveau produit</h1></a>";
    ?>
</section>