<?php
foreach ($tab_chocolat as $chocolat) {
	if (isset($c)) {
		if ($c->getId() != $chocolat->getId()) {
			echo '
		<article class="other_product_article">
			<a href="index.php?controller=chocolat&action=read&id=' . rawurlencode($chocolat->getId()) . '">
				<div class="image">
					<img class="product_img" src="images/products/' . htmlspecialchars($chocolat->getImage()) . '" alt="product_image" />
				</div>
				<h2><span class="wonka_font">' . htmlspecialchars($chocolat->getType()) . '</span> - ' . htmlspecialchars($chocolat->getNom()) . ' - ' . htmlspecialchars($chocolat->getMasse()) . 'g </h2>
				<p class="product_price">' . htmlspecialchars($chocolat->getPrixKilo() * ($chocolat->getMasse() / 1000)) . '€</p>
			</a>
				<form action="index.php" method="post" class="other_product_cart">
					<input type="hidden" name="idChocolat" value="'.$c->getId().'" />
                	<input type="hidden" name="action" value="addToCart">
                	<input type="hidden" name="controller" value="cart">
					<input type="number" hidden name="quantity" class="add_one_cart" value="1" />
					<input type="submit" name="add_one_cart_submit" value="" />
				</form>

				
		</article>';
		}
	} else {
		echo '
		<article class="other_product_article">
			<a href="index.php?controller=chocolat&action=read&id=' . rawurlencode($chocolat->getId()) . '">
				<div class="image">
					<img class="product_img" src="images/products/' . rawurlencode($chocolat->getImage()) . '" alt="product_image" />
				</div>
				<h2><span class="wonka_font">' . htmlspecialchars($chocolat->getType()) . '</span> - ' . htmlspecialchars($chocolat->getNom()) . ' - ' . htmlspecialchars($chocolat->getMasse()) . 'g </h2>
				<p class="product_price">' . htmlspecialchars($chocolat->getPrixKilo() * ($chocolat->getMasse() / 1000)) . '€</p>
			</a>
				<form action="index.php" method="post" class="other_product_cart">
					<input type="hidden" name="idChocolat" value="'.$chocolat->getId().'" />
                	<input type="hidden" name="action" value="addToCart">
                	<input type="hidden" name="controller" value="cart">
					<input type="number" hidden name="quantity" class="add_one_cart" value="1" />
					<input type="submit" name="add_one_cart_submit" value="" />
				</form>';
				if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
					echo '<a href="index.php?controller=chocolat&action=delete&id=' . rawurlencode($chocolat->getId()) . '">
					<img src="images/header/delete.png" alt="delete" style="position: absolute;left: 33px;bottom: 3px;width: 30px;height: 30px;background-color: #888A8588;border-radius: 100%;display: flex;justify-content: space-around;align-items: center;"></a>
					<a href="index.php?controller=chocolat&action=update&id=' . rawurlencode($chocolat->getId()) . '">
					<img src="images/header/settings.png" alt="delete" style="position: absolute; left: 3px;bottom: 3px;width: 30px;height: 30px;background-color: #888A8588;border-radius: 100%;display: flex;justify-content: space-around;align-items: center;"></a>';
				}
		echo '</article>';
	}
}
	
?>

