<h1 id="top_page_title">Confection  du  Chocolat</h1>
<div class="beige_bg form_container">
    <?php
        echo '
        <form method="GET" action="index.php">
          <fieldset>
            <p>
              <label for="type">Type de produit</label> :
              <input value = "'. htmlspecialchars($type) .'" type="text" placeholder="Ex : Wonka Bar" name="type" id="type" required/>
            </p>
            <p>
              <label for="nom">Nom du poduit</label> :
              <input value = "'. htmlspecialchars($nom) .'"  type="text" placeholder="Ex : Chocolat au Lait" name="nom" id="nom" required/>
            </p>
            <p>
              <label for="prixkilo">Prix au kilo</label> :
              <input value = "'. htmlspecialchars($prixkilo) .'" type="text" placeholder="Ex : 50" name="prixkilo" id="prixkilo" required/>
            </p>
            <p>
              <label for="masse">Masse du produit en grammes</label> :
              <input value = "'. htmlspecialchars($masse) .'" type="text" placeholder="Ex : 100" name="masse" id="masse" required/>
            </p>
            <p>
              <label for="image">Lien de l\'image</label> :
              <input value = "'. htmlspecialchars($image) .'" type="text" placeholder="Ex : wonka-bar-noir.jpg" name="image" id="image" required/>
            </p>
            
              <div style="display: flex;">
                <label for="description">Description</label> :
                <textarea id="description" rows="7" cols="30" required
                placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." name="description">'.htmlspecialchars($description).'
                </textarea>
              </div>
            
            <p>
              <input type="submit" value="Envoyer" />
            </p>
            <input type=\'hidden\' name=\'action\' value=\''.$action.'\'>
            <input type=\'hidden\' name=\'controller\' value=\''.static::$object.'\'>';
          if(isset($_GET['id'])){
            echo '<input type=\'hidden\' name=\'id\' value=\''.rawurlencode($_GET['id']).'\'>';}
          echo'</fieldset> 
        </form>';
    ?>
    <p>Pour ajouter une image : Rendez vous sur la page admin <a href="index.php?page=upload" style="color : black;text-decoration: underline;">IMAGES</a>.</p>
</div>
