<?php
   include 'connect.php'
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

                <button type="submit" name="button" >Valider le changement</button>
                <?php if(isset($mess_error)){ ?>
                    <span><p><?= $mess_error ?></p></span>
                <?php } ?>
                <?php if(isset($mess_passwd)){ ?>
                <?= $mess_passwd ?>
                <?php } ?>
<?php

$insc="";
   if(isset($_POST['button'])&& $_POST['password']==$_POST['password_conf'] ){
      
      $user=mysqli_fetch_assoc($req);

      $pass=$_POST['password'];
      $repass=$_POST['password_conf'];
      $update = "UPDATE utilisateurs SET  password='$pass' WHERE login='$id'";
      $request = $connect->query($update);
      $insc="Modification effectuer" ;

      var_dump($user);




}
else{
   $insc= "Information vide ou incorrect";
}

?>



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