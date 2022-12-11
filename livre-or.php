<?php 
   include 'connect.php';

   ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="livre-or.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@900;900&display=swap');
</style>

    <title>Home</title>

    


</head>
<body>
<header>
   <?php 
   include 'header.php';
   ?>
</header>
<div class="millieu">
<?php if(isset($_SESSION["login"])){ ?>
   <h1>Bonjour <?= $_SESSION["login"]?> </h1>
   <?php } 
   else {
     echo "<h1> Mode invité sans login</h1>";
   }

   $result = $connect->query("SELECT commentaires.date, utilisateurs.login, commentaires.commentaire, commentaires.id  FROM `commentaires` INNER JOIN `utilisateurs` ON utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC");

   $a= $result -> fetch_array(MYSQLI_ASSOC); ?>
   
   <br><table class="tftable" border="1"><tr>
   
   <?php
   foreach ($a as $key => $value)
   {
      echo " <th> " . $key . " </th> ";
   }
   echo "</tr>";
   while ($a != NULL)
   {
      echo "<tr>";
      foreach ($a as $value)
      {
            echo "<td>" . $value . "</td>";
      }
      echo "</tr>";
      $a = $result -> fetch_array(MYSQLI_ASSOC);
   }
   ?>
   </table>
   
   
   

</div>
<footer>
<?php
   include 'footer.php';
   ?>
</footer>
</body>
</html>