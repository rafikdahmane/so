<?php
require_once ('public/jscalendar/calendar.php');
if (isset($_POST["commit"])) {
  $numero_lecteur = (isset($_POST["numero_lecteur"])) ? $_POST["numero_lecteur"] : "";
  $code_livre = (isset($_POST["code_livre"])) ? $_POST["code_livre"] : "";
  $date_emprunt = (isset($_POST["date_emprunt"])) ? $_POST["date_emprunt"] : "";  
  $date_retour = (isset($_POST["date_retour"])) ? $_POST["date_retour"] : "";       

  $insert_query = "INSERT INTO `emprunts` (numero_lecteur, code_livre, date_emprunt,date_retour) ".
                  "VALUES ('$numero_lecteur', '$code_livre', '$date_emprunt', '$date_retour')";
  if (mysql_query($insert_query)) {
    echo "<p>Ajout effectué avec succés</p>";
    redirect("index.php?option=emprunts");
  } else {
    echo "<p>Erreur pendant l'enregistrement du nouvel emprunt</p>";
  }
} 
?>
<h2>Ajouter un nouveau emprunt</h2>
<form action="index.php?option=emprunts&action=ajouter" method="post">
  <p>
    <label>Lecteur : </label><br />
    <?php echo drop_down_from_table("numero_lecteur", "numero", "nom","lecteurs"); ?>
  </p>
  <p>
    <label>Livre : </label><br />
    <?php echo drop_down_from_table("code_livre", "code", "titre","livres"); ?>
  </p>  
  <p>
    <label>Date emprunt : </label><br />
    <?php 
      $date_emprunt_calendar = new DHTML_Calendar('public/jscalendar/', "fr", 'calendar-blue', false);
      $date_emprunt_calendar->load_files();
      $date_emprunt_calendar->make_input_field(
         // calendar options go here; see the documentation and/or calendar-setup.js
         array('firstDay'       => 1, // show Monday first         
               'showsTime'      => false,
               'showOthers'     => true,
               'ifFormat'       => '%Y-%m-%d',
               'timeFormat'     => '12'),
         array('name'        => 'date_emprunt',
               'value'       => strftime('%Y-%m-%d', strtotime('now'))
         )
      );     
    ?>
  </p>
  <p>
    <label>Date retour : </label><br />
    <?php 
      $date_retour_calendar = new DHTML_Calendar('public/jscalendar/', "fr", 'calendar-blue', false);
      //$date_emprunt_calendar->load_files();
      $date_retour_calendar->make_input_field(
         // calendar options go here; see the documentation and/or calendar-setup.js
         array('firstDay'       => 1, // show Monday first
               'showsTime'      => false,
               'showOthers'     => true,
               'ifFormat'       => '%Y-%m-%d',
               'timeFormat'     => '12'),
         array('name'        => 'date_retour',
               'value'       => strftime('%Y-%m-%d', strtotime('now'))
         )
      );     
    ?>
  </p>
  <input name="commit" type="submit" value="Ajouter l'emprunt" />   
</form>