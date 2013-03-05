<?php
global $menu_option_action_id;

if (isset($_POST["commit"])) {
  $nom = (isset($_POST["nom_lecteur"])) ? $_POST["nom_lecteur"] : "";
  $prenom = (isset($_POST["prenom_lecteur"])) ? $_POST["prenom_lecteur"] : "";
  $adresse = (isset($_POST["adresse_lecteur"])) ? $_POST["adresse_lecteur"] : "";  
  
  $update_query = "UPDATE `lecteurs` SET ".
                    "nom = '$nom' , ".
                    "prenom = '$prenom' , ".
                    "adresse = '$adresse'  ".  
                  "WHERE numero=".$menu_option_action_id;  
                
  if (mysql_query($update_query)) {
    echo "<p>Mise à jour effectué avec succés</p>";
    redirect("index.php?option=lecteurs");
  } else {
    echo "<p>Erreur pendant la mise à jour du lecteur</p>";
  }
} else {
  $result = mysql_query("SELECT nom, prenom, adresse FROM `lecteurs` WHERE numero=".$menu_option_action_id, $db);
  if (!$result) {
    echo "<p>Erreur pendant la récupération des informations à propos du lecteur</p>";
  } else {
    $lecteur = mysql_fetch_row($result);
  }
}
?>
<h2>Modifier le lecteur <?php echo $lecteur[1]; ?></h2>
<form action="index.php?option=lecteurs&action=modifier&id=<?php echo $menu_option_action_id ?>" method="post">
  <p>
    <label>Nom : </label><br />
    <input name="nom_lecteur" type="text" size="25" value="<?php echo $lecteur[0]; ?>" />
  </p>
  <p>
    <label>Prénom : </label><br />
    <input name="prenom_lecteur" type="text" size="25" value="<?php echo $lecteur[1]; ?>" />
  </p>  
  <p>
    <label>Adresse : </label><br />
    <input name="adresse_lecteur" type="text" size="50" value="<?php echo $lecteur[2]; ?>" />
  </p>
  <input name="commit" type="submit" value="Modifier le lecteur" />   
</form>