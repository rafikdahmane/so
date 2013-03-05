<?php
session_start();
require_once "functions.php";      
$db = mysql_connect("localhost", "root","") or die("Erreur de connexion!");
mysql_select_db("biblio");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>BIBLIO</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <link rel="stylesheet" href="public/stylesheets/styles.css" type="text/css" />
  </head>
  <body>
    <div id="header">
      <div id="header_navigation">
      <?php  
        if ($_SESSION['lecteur_is_logged_in'] === true) {
          echo "Vous êtes authentifié en tant que : <b>".$_SESSION['lecteur_logged_in']."</b>".
              " <a href='index.php?option=logout'>Déconnexion</a>"; 
        } 
      ?>
      </div>    
      <a href="index.php"><img alt="BIBLIO" border="0" src="public/images/biblio.png" /></a>
      <h1>Gestion des emprunts de livres d'une bibliothèque</h1>
      <?php 
        if ($_SESSION['lecteur_is_logged_in'] === true) {
      ?>      
      <div id="tabs">
        <ul>
          <li><a href="index.php"><span>Accueil</span></a></li>    
          <li><a href="index.php?option=livres"><span>Livres</span></a></li>
          <li><a href="index.php?option=lecteurs"><span>Lecteurs</span></a></li>
          <li><a href="index.php?option=emprunts"><span>Emprunts</span></a></li>                              
        </ul>
      </div>
      <?php } ?>
    </div>
    <div id="content">
      <?php
      $menu_option = (isset($_GET["option"])) ? $_GET["option"] : "home";
      $menu_option_action = (isset($_GET["action"])) ? $_GET["action"] : "index" ;
      $menu_option_action_id = (isset($_GET["id"])) ? $_GET["id"] : 0 ;    
      global $menu_option_action_id;
      if ($_SESSION['lecteur_is_logged_in'] === true) {
        switch ($menu_option) {
          case "home":         
            include "home.php"; break;
          case "livres":
            switch ($menu_option_action) {
              case "index":
                include "livres/index.php"; break;
              case "ajouter":
                include "livres/ajouter.php"; break;
              case "modifier":
                include "livres/modifier.php"; break;
              case "supprimer":
                include "livres/supprimer.php"; break;                                                             
            }
            break;
          case "lecteurs":
            switch ($menu_option_action) {
              case "index":
                include "lecteurs/index.php"; break;
              case "ajouter":
                include "lecteurs/ajouter.php"; break;
              case "modifier":
                include "lecteurs/modifier.php"; break;
              case "supprimer":
                include "lecteurs/supprimer.php"; break;                                                             
            }
            break;
          case "emprunts":
            switch ($menu_option_action) {
              case "index":
                include "emprunts/index.php"; break;
              case "ajouter":
                include "emprunts/ajouter.php"; break;
              case "modifier":
                include "emprunts/modifier.php"; break;
              case "supprimer":
                include "emprunts/supprimer.php"; break;                                                             
            }
            break;
          case "logout":         
            if (isset($_SESSION['lecteur_is_logged_in'])) {
              session_destroy();
              redirect("index.php");
              mysql_close();
            }
        }
      }else{
        include "login.php"; 
      } 
      ?>
    </div>
    <div id="footer">&copy 2008 Sara Mattiche</div>
  </body>
</html>
<?php
mysql_close();
?>        