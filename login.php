<?php

if (isset($_POST["commit"])) {
  $nom_lecteur = (isset($_POST["nom_lecteur"])) ? $_POST["nom_lecteur"] : "";
  $mot_de_passe = (isset($_POST["mot_de_passe_lecteur"])) ? $_POST["mot_de_passe_lecteur"] : "";
  
  $password_query="SELECT mot_de_passe FROM `lecteurs` WHERE nom='$nom_lecteur'";
  $result = mysql_query($password_query, $db);
  if (!$result) {
    echo "<p>Erreur pendant la récupération des informations à propos du lecteur</p>";
  } else {
    $password = mysql_fetch_row($result);
    if ($password[0] === $mot_de_passe) {
      $_SESSION['lecteur_is_logged_in'] = true;
      $_SESSION['lecteur_logged_in'] = $nom_lecteur;
      redirect("index.php");
    } else {
      echo "<p class=\"error\">Nom d'utilisateur ou mot de passe incorrect!</p>";
    }
  }
  mysql_free_result($result);
} 
?>

<h2>Authentification</h2>
<p>Veuillez entrer votre nom d'utilisateur et votre et mot de passe pour accéder au au système</p>
<form action="index.php?option=login" method="post">
  <p>
    <label>Nom d'utilisateur : </label><br />
    <input name="nom_lecteur" type="text" size="25" />
  </p>
  <p>
    <label>Mot de passe : </label><br />
    <input name="mot_de_passe_lecteur" type="password" size="25" />
  </p>  
  <input name="commit" type="submit" value="Connexion" />   
</form>

<h2>Authentification</h2>
<p>Veuillez entrer votre nom d'utilisateur et votre et mot de passe pour accéder au au système</p>
<form action="index.php?option=login" method="post">
  <p>
    <label>Nom d'utilisateur : </label><br />
    <input name="nom_lecteur" type="text" size="25" />
  </p>
  <p>
    <label>Mot de passe : </label><br />
    <input name="mot_de_passe_lecteur" type="password" size="25" />
  </p>  
  <input name="commit" type="submit" value="Connexion" />   
</form>