<h2>Liste des emprunts</h2>
<a href="index.php?option=emprunts&action=ajouter">Ajouter un nouvel emprunt</a>
<br /><br />
<?php 
  $select_query = "SELECT e.numero, lc.nom, lv.titre, date_emprunt,date_retour ".
                  "FROM `emprunts` e, `lecteurs` lc, `livres` lv ".
                  "WHERE e.numero_lecteur = lc.numero ".
                  "AND e.code_livre = lv.code";
       
  $result = mysql_query($select_query, $db);                   
  if (mysql_num_rows($result) > 0) {
?>  
  <table border="1">
    <tr>
      <th>Numéro</th>    
      <th>Lecteur</th>
      <th>Livre</th>
      <th>Date emprunt</th>
      <th>Date retour</th>      
      <th colspan="2">Actions</th>
    </tr>                                      
  <?php while($row=mysql_fetch_row($result)){ ?>
    <tr>
       <td><?php echo $row[0]; ?></td>    
       <td><?php echo $row[1]; ?></td>
       <td><?php echo $row[2]; ?></td>
       <td><?php echo $row[3]; ?></td>
       <td><?php echo $row[4]; ?></td>       
       <td><?php echo '<a href="index.php?option=emprunts&action=modifier&id='.$row[0].'"'; ?>>Modifier</a></td>
       <td><?php echo '<a href="index.php?option=emprunts&action=supprimer&id='.$row[0].'"'; ?>>Supprimer</a></td>                                   
    </tr>
  <?php } ?>
  </table>
<?php 
  } else {
    echo "<p>Aucun emprunt enregistré!</p>";
  } 
  mysql_free_result($result);
?>   
<br />
<a href="index.php?option=emprunts&action=ajouter">Ajouter un nouvel emprunt</a>