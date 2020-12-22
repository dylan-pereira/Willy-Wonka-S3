<?php if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
echo '<h1 id="top_page_title">Upload d\'Images Produits</h1>

<article>
	<h2 hidden>placeholder</h2>
	<form method="post" enctype="multipart/form-data">
			<p style="padding-bottom: 10%;"><input type="file" name="nom-du-fichier"></p>
			<p><input type="submit" value="Envoyer" class ="boutton"></p>
	</form>';
	
		if (!empty($_FILES['nom-du-fichier']) && is_uploaded_file($_FILES['nom-du-fichier']['tmp_name'])) {
 			$name = $_FILES['nom-du-fichier']['name'];
			$pic_path = File::build_path(array("images","products","$name"));
			$allowed_ext = array("jpg", "jpeg", "png");
			$explosion = explode('.',$_FILES['nom-du-fichier']['name']);
			if (!in_array(end($explosion), $allowed_ext)) {
			  echo "Mauvais type de fichier !";
			  die;
			}

			if (!move_uploaded_file($_FILES['nom-du-fichier']['tmp_name'], $pic_path)) {
			  echo "La copie a échoué";
			}else{
				echo "Le nom de l'image est : $name";
			}

			
		}
	
echo'</article>';
}else{
	echo '<p>Vous devez être administrateur pour accéder a cette page !  <a href="index.php"> Retour </a></p>';
}

?>
