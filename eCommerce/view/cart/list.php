<section class="other_products" id="general">
    <h1 id="top_page_title">Panier</h1>
    <section class="cart">
        <?php
        if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
            echo '<p style="padding: 20px;">Votre panier     -    '.((isset($_SESSION["idUser"]))?(htmlspecialchars(ModelUtilisateur::select($_SESSION["idUser"])->getNom()).' '.htmlspecialchars(ModelUtilisateur::select($_SESSION["idUser"])->getPrenom())):("Invité")).'</p>
                <table style ="width: 100%; text-align: center;">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix Unitaire</th>
                            <th>Quantité</th>
                            <th>Prix Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>';

            $total = 0;
            $i = 0;

            foreach ($_SESSION["cart"] as $item) {
                if ($item["quantity"] != 0) {
                    $chocolat = ModelChocolat::select($item["id"]);
                    $total = $total + $item["quantity"] * $chocolat->getMasse() * $chocolat->getPrixKilo() / 1000;
                    echo '
                    <tr>
                        <td><a style="color: gray" href="index.php?controller=chocolat&action=read&id=' . rawurlencode($chocolat->getId()) . '">' . htmlspecialchars($chocolat->getType()) . ' ' . htmlspecialchars($chocolat->getNom()) . ' ' . htmlspecialchars($chocolat->getMasse()) . 'g</a></td>
                        <td>' . htmlspecialchars($chocolat->getPrixKilo() * $chocolat->getMasse() / 1000) . '€</td>
                        <td><a style="color: gray" href="index.php?controller=cart&action=minusOne&idProduct=' . rawurlencode($chocolat->getId()) . '">-</a> ' . htmlspecialchars($item["quantity"]) . ' <a style="color: gray" href="index.php?controller=cart&action=addOne&idProduct=' . rawurlencode($chocolat->getId()) . '">+</a></td>
                        <td>' . htmlspecialchars($item["quantity"] * $chocolat->getPrixKilo() * $chocolat->getMasse() / 1000) . '€</td>
                        <td>
                            <a href="index.php?controller=cart&action=deleteFromCart&idProduct=' . rawurlencode($chocolat->getId()) . '"><img src="images/header/delete.png" alt="delete" style="width: 30px;height: 30px;background-color: #888A8588;border-radius: 100%;justify-content: space-around;align-items: center;"></a>
                    </tr>';
                }
                $i++;
            }
            echo '
				<tr>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td>'.htmlspecialchars($total).'€</td>
		        </tr>
				<tr>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td><a style="color: gray" href="index.php?controller=cart&action=payer">Payer</a></td>
		        </tr>
			</tbody>
		</table>';
            echo "<p><a style=\"color: gray\" href=\"index.php?controller=cart&action=emptyCart\">vider le panier</a></p>";
        } else {
            echo "<h2>Votre panier est vide pour le moment.</h2>
            <p>Votre panier est là pour vous servir. Donnez-lui un but: remplissez le de chocolats.</p>
            <p>Continuez vos achats sur <a href=\"index.php?controller=chocolat&action=readAll\">willywonka.fr</a>.</p>";
        }
        ?>
    </section>
</section>
