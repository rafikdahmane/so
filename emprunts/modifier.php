<?php
global $menu_option_action_id;
require_once ('public/jscalendar/calendar.php');
if (isset($_POST["commit"])) {
  $numero_lecteur = (isset($_POST["numero_lecteur"])) ? $_POST["numero_lecteur"] : "";
  $code_livre = (isset($_POST["code_livre"])) ? $_POST["code_livre"] : "";
  $date_emprunt = (isset($_POST["date_emprunt"])) ? $_POST["date_emprunt"] : "";  
  $date_retour = (isset($_POST["date_retour"])) ? $_POST["date_retour"] : "";  
  
  $update_query = "UPDATE `emprunts` SET ".
                    "numero_lecteur = '$numero_lecteur' , ".
                    "code_livre = '$code_livre' , ".
                    "date_emprunt = '$date_emprunt' , ".                    
                    "date_retour = '$date_retour'  ".  
                  "WHERE numero=".$menu_option_action_id;              
  if (mysql_query($update_query)) {
    echo "<p>Mise à jour effectué avec succés</p>";
    redirect("index.php?option=emprunts");
  } else {
    echo "<p>Erreur pendant la mise à jour du emprunt</p>";
  }
} else {
  $result = mysql_query("SELECT numero, numero_lecteur, code_livre, date_emprunt, date_retour FROM `emprunts` WHERE numero=".$menu_option_action_id, $db);
  if (!$result) {
    echo "<p>Erreur pendant la récupération des informations à propos de l'emprunt</p>";
  } else {
    $emprunt = mysql_fetch_row($result);
  }
}
?>
<h2>Modifier l'emprunt <?php echo $emprunt[0]; ?></h2>
<form action="index.php?option=emprunts&action=modifier&id=<?php echo $menu_option_action_id ?>" method="post">
 <p>
    <label>Lecteur : </label><br />
    <?php echo drop_down_from_table("numero_lecteur", "numero", "nom","lecteurs",$emprunt[1]); ?>
  </p>
  <p>
    <label>Livre : </label><br />
    <?php echo drop_down_from_table("code_livre", "code", "titre","livres",$emprunt[2]); ?>
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
               'value'       =>  $emprunt[3]
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
               'value'       => $emprunt[4]
         )
      );     
    ?>
  </p>
  <input name="commit" type="submit" value="Modifier l'emprunt" />   
</form>