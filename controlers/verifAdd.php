<?php
    session_start();
   
    //classe voyage
    include "../classes/voyage.php";
    // var_dump($_POST);
    //default category = 4 
    
if ($_SERVER["REQUEST_METHOD"]=="POST") {
      //si le button ajouter,modifier ou supprimer est cliqué ;
    $validateButton = isset($_POST["validateButton"]);

    if (!isset($_POST["selectCategorie"])) {
        $selectCategorie = 4;
    }
    else{
        $selectCategorie = $_POST["selectCategorie"] ;
    }

    $selectFormule = $_POST["selectFormule"] ;
    $dateDebut = $_POST["dateDebut"] ;
    $dateFin = $_POST["dateFin"] ;
    $hebergementInput = $_POST["hebergementInput"] ;
    $lieuInput = $_POST["lieuInput"] ;
    $tarifInput = $_POST["tarifInput"] ;
    // $imageVoyage = $_POST["imageVoyage"] ;
    $descriptionInput = $_POST["descriptionInput"] ;

    //direction à partir de mon projet
    $target_dir = "PHP/SQL-ProjetIntranet/uploads/" ;
    //je recuper mon input file via cette methode et pas avec la methode POST;
    $image_name = basename($_FILES["imageVoyage"]["name"]);
    var_dump($_FILES["imageVoyage"]);
    $image_path = $_SERVER["DOCUMENT_ROOT"] . "/" .$target_dir . $image_name ;
    // var_dump($image_path);

    //ajoute d'un voyage avec image;
    // if ($validateButton) { 

        if (move_uploaded_file($_FILES["imageVoyage"]["tmp_name"],$image_path)) {
            
            $absolute_url = "http://".$_SERVER['HTTP_HOST']."/".$target_dir .$image_name ;
            var_dump($absolute_url);
            $voyageAdded = new Voyage() ; 

            $voyageAdded->addVoyage($selectCategorie,$selectFormule,$lieuInput,$descriptionInput,$hebergementInput,$absolute_url,$dateDebut,$dateFin,$tarifInput);
            header("Location:../templates/adminpage.php"); 

            //session ouverte pour afficher un message de reussite à adminpage.php ;
            $_SESSION["validateButton"] = "OPERATION REUSSITE !";

        }else if(move_uploaded_file($_FILES["imageVoyage"]["tmp_name"],$image_path)==null){
            
            $voyageAdded = new Voyage() ; 

            $voyageAdded->addVoyage($selectCategorie,$selectFormule,$lieuInput,$descriptionInput,$hebergementInput,$absolute_url,$dateDebut,$dateFin,$tarifInput);
            header("Location:../templates/adminpage.php"); 

            //session ouverte pour afficher un message de reussite à adminpage.php ;
            $_SESSION["validateButton"] = "OPERATION REUSSITE !";
        }
    // }
}
  

?>