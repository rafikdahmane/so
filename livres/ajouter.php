<?php
if (isset($_POST["commit"])) {
  $titre = (isset($_POST["titre_livre"])) ? $_POST["titre_livre"] : "";
  $auteurs = (isset($_POST["auteurs_livre"])) ? $_POST["auteurs_livre"] : "";
  $categorie = (isset($_POST["categorie_livre"])) ? $_POST["categorie_livre"] : "";  
  
  $insert_query = "INSERT INTO `livres` (titre, auteurs, categorie) VALUES ('$titre', '$auteurs', '$categorie')";
  if (mysql_query($insert_query)) {
    echo "<p>Ajout effectué avec succés</p>";
    redirect("index.php?option=livres");
  } else {
    echo "<p>Erreur pendant l'enregistrement du nouveu livre</p>";
  }
} 
?>
<h2>Ajouter un nouveau livre</h2>
<form action="index.php?option=livres&action=ajouter" method="post">
  <p>
    <label>Titre : </label><br />
    <input name="titre_livre" type="text" size="25" />
  </p>
  <p>
    <label>Auteurs : </label><br />
    <input name="auteurs_livre" type="text" size="50" />
  </p>
  <p>
    <label>Catégorie : </label><br />
    <select name="categorie_livre">
      <option value ="Programmation">Programmation</option>
      <option value ="Administration">Administration</option>
      <option value ="Philosophie">Philosophie</option>
    </select>
  </p>
  <input name="commit" type="submit" value="Ajouter le livre" />   
</form>