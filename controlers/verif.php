<?php

$inputUsername = $_POST["inputUsername"];
$inputPassword = $_POST["inputPassword"];
$password_regex = "/^(?=.*?[a-z])(?=.*?[0-9]).{4,}$/" ;
$erreur ="";

//incluse classe bdd ;
include "./classes/bdd.php";
//connection à la base de donnée ;
$db = new BDD();
$db->connectionBdd();

//requete pour selectionner l'utilisateur (admin ou client) qui a pour username les identifiants qui on été rentrées ;
$response = $db->connection->query("SELECT * FROM `user` WHERE `username` = '$inputUsername'") ;
$resultUser = $response->fetchAll();
// var_dump($resultUser);

//conditions pour le login pour chaque utilisateur (admin et client) ;
if($resultUser && !empty($resultUser)){
    foreach ($resultUser as $user) {

        if ($user["id_role"] === 1 && $user["password"] === $inputPassword && preg_match($password_regex, $inputPassword) ) {
            //rediger vers la page administrateur ;            
            header("Location: ./templates/adminpage.php");
            //variable de type sessions ;
            $_SESSION["username"] = $inputUsername ;
        }
        else if($user["id_role"] === 2 && $user["password"] === $inputPassword && $inputPassword && preg_match($password_regex, $inputPassword)){

            $erreur = "Impossible effectuer l'acces , vous n'êtes pas un administrateur !";

        }
        else if(empty($inputPassword) || empty($inputUsername)){

            $erreur = "Veuillez remplir le champ manquant !";
   
        }else if($user["id_role"] === 1 || $user["id_role"] === 2 && $user["password"] !== $inputPassword ){

            $erreur = "Mot de pass incorrecte , veuillez la reinserer !";
        }
        else if($user["id_role"] !== 1 && $user["id_role"] !== 1) {

            $erreur = "compte inexistant !";

        }
    
    }
}

if (!isset($user["password"]) && !isset($user["id_role"])) {
        
    $erreur = " Username non reconnu!";
        
}

if(empty($inputPassword) && empty($inputUsername)){

    $erreur = "Veuillez remplir les champs manquantes !";

}

    
$db->deconnectionBdd();

?>

