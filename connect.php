

<?php
$connect = mysqli_connect("localhost", "root", "", "livreor");
// $connect = mysqli_connect("localhost", "jeremy", "ultraplesk83", "jeremy-nowak_livreor");
if (session_id() =='' ){
    session_start();
}





if(isset($_POST['button'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $req = mysqli_query($connect,"SELECT id, login, password FROM utilisateurs WHERE login='$login' AND password='$password'");


    if(mysqli_num_rows($req)===1){
        $user=mysqli_fetch_assoc($req);
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['password'] = $user['password'];

        
        

            

            if($user['login']=='admin'){
                $userid = mysqli_fetch_assoc($req);
                
                header('location: admin.php');
                $_SESSION['login'] = $user['login'];
            }

            elseif($user['login']== $login){
                 header('location: profil.php');
                $_SESSION['login'] = $user['login'];                
            }
            

        }   
        


 }
             
?>