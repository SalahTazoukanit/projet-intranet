<?php
//demmarage de la session ;
session_start();
if (isset($_POST["loginButton"])) {
            include "controlers/verif.php";
         }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Admin Login Page</title>
</head>
<body>
    <header>
        <div class="logoContainer"><img src="assets/images/logoprojet.jpg" alt="logo JCPVacances"></div>
    </header>
    <div class="centralContainer">
        <form action="" method="POST">
            <div class="fieldContainer"><label for=""><strong>Username</strong></label><input name="inputUsername" type="text"></div>
            <div class="fieldContainer"><label for=""><strong>Password</strong></label><input name="inputPassword" type="password"></div>
            <?php  
                if (isset($erreur)) {
                    echo '<p class="erreur">'.$erreur.'</p>' ;
                }
            ?>
            <button name="loginButton">Login</button>
        </form>
    </div>

</body>
</html>