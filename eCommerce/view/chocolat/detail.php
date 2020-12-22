
<section class="page_product">
	<article class="product">
		<div class="image">
			<img class="product_img" src="images/products/<?php echo $c->getImage() ?>" alt="product_image" />
		</div>
		<div class="details">
			<h2><span class="wonka_font"><?php echo htmlspecialchars($c->getType()) ?></span> <?php echo htmlspecialchars($c->getMasse()) ?>g <?php echo htmlspecialchars($c->getNom()) ?></h2>
			<p class="detailed_info">
				<?php echo htmlspecialchars($c->getMasse()) ?> g<br />
				<?php echo htmlspecialchars($c->getPrixKilo()) ?> €/KG
			</p>
			<h2 class="product_price"><?php echo htmlspecialchars($c->getPrixKilo()*($c->getMasse()/1000)) ?>€</h2>
			<p class="product_desc">
				<?php echo htmlspecialchars($c->getDescription()) ?>
			</p>
			<form action="index.php" method="post" class="add_cart">
				<input type="hidden" name="idChocolat" value="<?php echo $c->getId(); ?>" />
				<input type="number" name="quantity" min="1" value="1" required class="quantity" />
                <input type="hidden" name="action" value="addToCart">
                <input type="hidden" name="controller" value="cart">
				<input type="submit" name="submit" value="Ajouter au panier" class="submit_to_cart">
			</form>
		</div>
	</article>
	<article class="review">
		<h2>Écrire un commentaire: </h2>
		<form action="index.php?page=wip" method="post" class="review_post"> 
			<h3><label for="review_title">Ajoutez un titre:</label></h3>
			<input type="text" name="review_title" id="review_title" maxlength="30" placeholder="Qu'est ce qui est le plus important à savoir ?" required />
			<h3><label for="review_desc">Décrivez votre expérience:</label></h3>
			<textarea placeholder="Pour quelles utilisations avez-vous employé ce produit ? Qu'est-ce que vous avez aimé ou n'avez pas aimé ?" name="review_desc" maxlength="300" rows="5" id="review_desc" required ></textarea>
			<input type="submit" class="review_post_button" name="submit_review" value="Nouveau commentaire" />
		</form>
	</article>
</section>
<section class="other_products">
	<h1 class="other_products_title">Autres produits:</h1>
	<div class="other_products_list">
	<?php
	$tab_chocolat = ModelChocolat::selectAll();   
			require File::build_path(array("view","chocolat","list.php"));
		?>
	</div>
</section>
