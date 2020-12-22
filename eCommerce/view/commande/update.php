<h1 id="top_page_title">Creation Commande</h1>
<div class="beige_bg form_container">
<?php
echo '
<form method="GET" action="index.php">
  
  <fieldset>
    <p>
      <label for="idUtilisateur">idUtilisateur</label> :
      <input value = "'. htmlspecialchars($idUtilisateur) .'"  type="text" placeholder="Ex : 1" name="idUtilisateur" id="idUtilisateur" required/>
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
    <input type=\'hidden\' name=\'action\' value=\''.$action.'\'>
    <input type=\'hidden\' name=\'controller\' value=\''.static::$object.'\'>
  </fieldset> 
</form>'
?>
</div>