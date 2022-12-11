<?php
//MysQl connexion:
   include 'connect.php';
// $mysqli = mysqli_connect("localhost", "root", "", "moduleconnexion");
//$connect = mysqli_connect("localhost", "jeremy", "ultraplesk83", "jeremy-nowak_module");
if(isset($_USER["user"])){
    header("location: profil.php");
}





if(isset($_POST['soumettre'])){
    $check = 1;
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_conf = $_POST['password_conf'];

    // !empty permet de verifier que tout les champs soit rempli -->
    if(isset($_POST["login"], $_POST["password"]) && !empty($_POST["login"]) && !empty($_POST["password"]))
    {
        $req = mysqli_query($connect,"SELECT login, password FROM utilisateurs");    

        $bdd = $req->fetch_all();

        if($password !== $password_conf){
            $mess_passwd = "Les mots de pass ne correspondent pas";   //Si les mots de passe ne sont pas identique alors il y aura un message d'erreur
        }

        elseif($password == $password_conf){                 //boucle si les mots de pass sont bon alors on verifiera si le login en input existe deja dans la BDD.
            for($x =0; isset($bdd[$x][0]); $x++){           // et mise a 0 de la variable $check
                if($bdd[$x][0] == $login){
                    $mess_error = "Donnée invalide";
                $check = 0;
                break;
                } 
            }
        } 
    }
}
            //si toutes les conditions enuméré sont validé y compris la variable $check alors on enregistrera les informations d'inscription
if(isset($_POST['soumettre']) && isset($_POST["login"], $_POST["password"]) && $check ==1){        
$request = mysqli_query($connect, "INSERT INTO utilisateurs (login, password) VALUES ('$login', '$password')");header("location:connexion.php");

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="livre-or.css">
    <title>Inscription</title>
</head>
<body>

    <?php include 'header.php'?>
<div class="millieu">
    <div class="formulaire" >
    <h1>Inscription:</h1>
        <form method="post"> 
            <fieldset>
                <legend> <span class="number">.</span>Informations:</legend><br>
                <br><br>
                <br>
                <input type="text" placeholder="Login" name="login" id="login"><br>
                <br>
                <input type="password" placeholder="Password" name="password" id="password"><br>
                <br>
                <input type="password" placeholder="Password confirmation" name="password_conf" id="password"><br>
                
                <br>
                <?php if(isset($mess_passwd)){ ?>
                <?= $mess_passwd ?>
                <?php } ?>
             
                 <br>
                 <br>

                <button type="submit" name="soumettre" >Valider</button>
                <?php if(isset($mess_error)){ ?>
                    <span><p><?= $mess_error ?></p></span>
                <?php } ?>

            </fieldset>
            </form>
    </div>
</div>
<?php include 'footer.php'?>
</body>
</html>
     







