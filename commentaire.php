<?php 
   include 'connect.php';

    
    if(isset($_POST['soumettre'])){

        $commentaire = $_POST["message"];
        $login = $_SESSION['login'];
        $date = date('Y-m-d H:i:s');
        var_dump($_POST['message']);
        $int_log = $_SESSION['id'];
        $comment_clean = mysqli_real_escape_string($connect, $_POST['message']);
        
    } 
                
                
     if(isset($_SESSION['login']) && isset($_POST["soumettre"])){        
         $add_comment = "INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('$comment_clean','$int_log','$date')";
         $querry_comment = $connect->query($add_comment);
     header("location:livre-or.php");
    
     }

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
    <div class="message">
        <?php if(isset($_SESSION["login"])){ ?>
               <h1>Bonjour <?= $_SESSION["login"]?> </h1>
                <?php } 
                else {
                  echo "<h1> Mode invité sans login</h1>";
                }
        ?>
    </div>
    
<form method="post"> 
    Message :<br/>
    <textarea name="message"rows="8" cols="35"> </textarea> <br />
    <input type="submit" name="soumettre" value="Ecrire une petite pensée"/>
</form>
<?php if(isset($_SESSION["login"])){ ?>
               
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