<?php
include 'connect.php';
// $req = mysqli_query($connect,"SELECT login, password FROM utilisateurs"); 
// $tab_bdd=mysqli_fetch_all($req,MYSQLI_ASSOC);

    



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="livre-or.css">
    <title>Connection</title>
</head>
<body>
<?php 
    include 'header.php';
    ?>
    <div class="millieu">
        <div class="formulaire" >
    <h1>Connexion:</h1>
        <form method="post"> 
            <fieldset>

                <legend> <span class="number">.</span>Information de log:</legend>
                <br><br>
                <input type="text" placeholder="Login" name="login" id="login"><br>
                <br>
                <input type="password" placeholder="Password" name="password" id="password"><br>
                <br>
                <button type="submit" name="button" >Me connecter</button><br>
                <br><br>

            <br><br><br></fieldset>
            </form>
    </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
</html>
