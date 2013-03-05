<?php
if (isset($_POST["commit"])) {
  $nom = (isset($_POST["nom_lecteur"])) ? $_POST["nom_lecteur"] : "";
  $prenom = (isset($_POST["prenom_lecteur"])) ? $_POST["prenom_lecteur"] : "";
  $adresse = (isset($_POST["adresse_lecteur"])) ? $_POST["adresse_lecteur"] : "";
  $mot_de_passe = (isset($_POST["mot_de_passe_lecteur"])) ? $_POST["mot_de_passe_lecteur"] : "";
    
  $insert_query = "INSERT INTO `lecteurs` (nom, prenom, adresse, mot_de_passe) VALUES ('$nom', '$prenom', '$adresse','$mot_de_passe')";
  if (mysql_query($insert_query)) {
    echo "<p>Ajout effectué avec succés</p>";
    redirect("index.php?option=lecteurs");
  } else {
    echo "<p>Erreur pendant l'enregistrement du nouveau lecteur</p>";
  }
} 
?>
<h2>Ajouter un nouveau lecteur</h2>
<form action="index.php?option=lecteurs&action=ajouter" method="post">
  <p>
    <label>Nom : </label><br />
    <input name="nom_lecteur" type="text" size="25" />
  </p>
  <p>
    <label>Prénom : </label><br />
    <input name="prenom_lecteur" type="text" size="25" />
  </p>  
  <p>
    <label>Adresse : </label><br />
    <input name="adresse_lecteur" type="text" size="50" />
  </p>
  <p>
    <label>Mot de passe : </label><br />
    <input name="mot_de_passe_lecteur" type="password" size="25" />
  </p>
  <input name="commit" type="submit" value="Ajouter le lecteur" />   
</form>