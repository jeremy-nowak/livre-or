<?php
 
$insc="";
include "connect.php";


if(isset($_POST['modify'])){
    $id=$_SESSION['id'];
    $log=$_POST['login'];
    $pass=$_POST['password'];
    $repass=$_POST['password_conf'];
        if(empty($log)){
            $insc="Login laissé vide!";
        }
        elseif(empty($pass)){
            $insc="Mot de passe laissé vide!";
        }
        elseif($pass!=$repass){ 
            $insc= "Mots de passe non identiques!";
        }
    else{

    $update = "UPDATE utilisateurs SET login='$log', password='$pass' WHERE id=$id";
		echo $update;
    $request = $connect->query($update);
    $_SESSION ['login'] = $log;

		$insc="Modification effectuer" ;
    }
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="livre-or.css">
    <title>Home</title>
</head>
<body>
<header>
   <?php 
   include 'header.php';
   ?>

</header>
<div class="millieu">
<h1>Bonjour <?= $_SESSION['login']?> </h1>
 

   <div class="formulaire">
      <form method="post"> 
            <fieldset>
                <legend> <span class="number">.</span>Modification des informations:</legend><br>
                <br><br>
             
               <input type="text" placeholder="Changer le login " name="login" id="login" value="<?= $_SESSION['login']?>"><br>
             
               <br>
                <input type="password" placeholder="Nouveau password" name="password" id="password"><br>
                <br>
                <input type="password" placeholder="Confirmation nouveau password" name="password_conf" id="password"><br>
				
                
                <br>

                 <br>
                 <br>

                <button type="submit" name="modify">Valider le changement</button>
            </fieldset>
         </form>
    </div>


</div>
<footer>
<?php
   include 'footer.php';
   ?>
</footer>
</body>
</html>