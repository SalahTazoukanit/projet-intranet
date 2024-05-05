<?php
    
    include "../classes/voyage.php";

    $editBtn = isset($_POST["editBtn"]) ;

    $editId = $_GET["updateId"];
    
if ($editBtn) {

            $selectCategorie = $_POST["selectCategorie"];
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
            var_dump($image_path);

            if (move_uploaded_file($_FILES["imageVoyage"]["tmp_name"],$image_path)) {
                
            $absolute_url = "http://".$_SERVER['HTTP_HOST']."/".$target_dir .$image_name ;

            $voyageEdit = new Voyage();
            $voyageEdit->editVoyage($editId,$selectCategorie,$selectFormule,$lieuInput, $descriptionInput ,$hebergementInput,$absolute_url,$dateDebut,$dateFin,$tarifInput);
            header("Location:../templates/adminpage.php");


        }else {
            
            $imageVoyage = $_POST["imageVoyage"] ;
              
            $voyageEdit = new Voyage();
            $voyageEdit->editVoyage($editId,$selectCategorie,$selectFormule,$lieuInput, $descriptionInput ,$hebergementInput,$imageVoyage,$dateDebut,$dateFin,$tarifInput);
            header("Location:../templates/adminpage.php");

        }


       
    }
?>