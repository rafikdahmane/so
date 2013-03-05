<h2>Liste des lecteurs</h2>
<a href="index.php?option=lecteurs&action=ajouter">Ajouter un nouveau lecteur</a>
<br /><br />
<?php 
  $result = mysql_query("SELECT numero, nom, prenom, adresse FROM `lecteurs`", $db);
  if (mysql_num_rows($result) > 0) {
?>  
  <table border="1">
    <tr>
      <th>Numéro</th>      
      <th>Nom</th>
      <th>Prénom</th>
      <th>Adresse</th>
      <th colspan="2">Actions</th>
    </tr>                                      
  <?php while($row=mysql_fetch_row($result)){ ?>
    <tr>
       <td><?php echo $row[0]; ?></td>    
       <td><?php echo $row[1]; ?></td>
       <td><?php echo $row[2]; ?></td>
       <td><?php echo $row[3]; ?></td>
       <td><?php echo '<a href="index.php?option=lecteurs&action=modifier&id='.$row[0].'"'; ?>>Modifier</a></td>
       <td><?php echo '<a href="index.php?option=lecteurs&action=supprimer&id='.$row[0].'"'; ?>>Supprimer</a></td>                                   
    </tr>
  <?php } ?>
  </table>
<?php 
  } else {
    echo "<p>Aucun lecteur enregistré!</p>";
  } 
  mysql_free_result($result);
?>   
<br />
<a href="index.php?option=lecteurs&action=ajouter">Ajouter un nouveau lecteur</a>