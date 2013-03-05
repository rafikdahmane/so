<?php
global $menu_option_action_id;

if (isset($_POST["commit"])) {
  $titre = (isset($_POST["titre_livre"])) ? $_POST["titre_livre"] : "";
  $auteurs = (isset($_POST["auteurs_livre"])) ? $_POST["auteurs_livre"] : "";
  $categorie = (isset($_POST["categorie_livre"])) ? $_POST["categorie_livre"] : "";  

  $update_query = "UPDATE `livres` SET ".
                    "titre = '$titre' , ".
                    "auteurs = '$auteurs' , ".
                    "categorie = '$categorie'  ".  
                  "WHERE code=".$menu_option_action_id;  
                
  if (mysql_query($update_query)) {
    echo "<p>Mise à jour effectué avec succés</p>";
    redirect("index.php?option=livres");
  } else {
    echo "<p>Erreur pendant la mise à jour du livre</p>";
  }
} else {
  $result = mysql_query("SELECT * FROM `livres` WHERE code=".$menu_option_action_id, $db);
  if (!$result) {
    echo "<p>Erreur pendant la récupération des informations à propos du livre</p>";

  } else {
    $livre = mysql_fetch_row($result);
  }

}
?>
<h2>Modifier le livre <?php echo $livre[1]; ?></h2>
<form action="index.php?option=livres&action=modifier&id=<?php echo $menu_option_action_id ?>" method="post">
  <p>
    <label>Titre : </label><br />
    <input name="titre_livre" type="text" size="25" value="<?php echo $livre[1]; ?>" />
  </p>
  <p>
    <label>Auteurs : </label><br />
    <input name="auteurs_livre" type="text" size="50" value="<?php echo $livre[2]; ?>"/>
  </p>
  <p>
    <label>Catégorie : </label><br />
    <select name="categorie_livre">
      <option value ="Programmation" <?php if ($livre[3]=="Programmation") echo 'selected="selected"';  ?>>Programmation</option>
      <option value ="Administration" <?php if ($livre[3]=="Administration") echo 'selected="selected"';  ?>>Administration</option>
      <option value ="Philosophie" <?php if ($livre[3]=="Philosophie") echo 'selected="selected"';  ?>>Philosophie</option>
    </select>
  </p>
  <input name="commit" type="submit" value="Modifier le livre" />   
</form>