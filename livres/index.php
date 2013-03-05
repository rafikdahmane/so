<h2>Liste des livres</h2>
<a href="index.php?option=livres&action=ajouter">Ajouter un nouveau livre</a>
<br /><br />
<?php 
  $result = mysql_query("SELECT * FROM `livres`", $db);
  if (mysql_num_rows($result) > 0) {
?>  
  <table border="1">
    <tr>
      <th>Code</th>
      <th>Titre</th>
      <th>Auteurs</th>
      <th>Catégorie</th>
      <th colspan="2">Actions</th>
    </tr>                                      
  <?php while($row=mysql_fetch_row($result)){ ?>
    <tr>
       <td><?php echo $row[0]; ?></td>
       <td><?php echo $row[1]; ?></td>
       <td><?php echo $row[2]; ?></td>
       <td><?php echo $row[3]; ?></td>
       <td><?php echo '<a href="index.php?option=livres&action=modifier&id='.$row[0].'"'; ?>>Modifier</a></td>
       <td><?php echo '<a href="index.php?option=livres&action=supprimer&id='.$row[0].'"'; ?>>Supprimer</a></td>                                   
    </tr>
  <?php } ?>
  </table>
<?php 
  } else {
    echo "<p>Aucun livre enregistré!</p>";
  } 
  mysql_free_result($result);  
?>   
<br />
<a href="index.php?option=livres&action=ajouter">Ajouter un nouveau livre</a>