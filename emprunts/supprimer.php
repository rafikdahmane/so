<?php
global $menu_option_action_id;
$delete_query = "DELETE FROM `emprunts` WHERE numero=".$menu_option_action_id;
if (mysql_query($delete_query)) {
  echo "<p>Suppression effectuée avec succés</p>";
  redirect("index.php?option=emprunts");
} else {
  echo "<p>Erreur pendant la suppression</p>";
}
?>