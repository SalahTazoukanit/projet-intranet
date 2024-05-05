<?php include "../controlers/verifEdit.php"; ?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>formulaire</title>
</head>
<body>

    <?php
    include "header.php";
    if ($_GET["updateId"]) {
        $voyage = new Voyage();

        if (!empty($voyage->getVoyageFromId($_GET["updateId"]))) {
            $voyageInfos = $voyage->getVoyageFromId($_GET["updateId"])[0];
        }
    }

    include "../classes/formule.php";
    $formules = new Formule();              
    include "../classes/categorie.php";
    $categories = new Categorie(); 

    ?>
    <form  class="formulaireAddEdit" action="" method="POST" enctype="multipart/form-data">
    <div class="borderFormAdd">    
        <div class="colonneUn">
            <select name="selectCategorie" id="selectCategorie">
                <?php                             
                    foreach ($categories->getAllCategories() as $categorie) {
                        if ($categorie["name"] == 'non-assigné') {
                            echo '<option value="'.$categorie["id_categorie"].'" selected="selected">'.$categorie["name"].'</option>' ;
                        }else{
                            echo '<option value="'.$categorie["id_categorie"].'">'.$categorie["name"].'</option>' ;
                        }
                    }
                ?>
            </select>
            <select name="selectFormule" id="formule"> 
                    <option <?php if ($voyageInfos["id_formule"] == 1) {
                        echo 'selected' ;
                    }?> value="1">Classic</option>

                    <option <?php if ($voyageInfos["id_formule"] == 2) {
                        echo "selected";
                    } ?> value="2">2 pour 1</option>
            </select>
            <div class="dateDebut">Date debut <br><input value="<?php echo(isset($voyageInfos["date_debut"])) ? $voyageInfos["date_debut"] : ' '; ?>" name="dateDebut" type="date"></div>
            <div class="dateFin">Date fin <br><input value="<?php echo (isset($voyageInfos["date_fin"])) ? $voyageInfos["date_fin"] : ' '; ?>" name="dateFin" type="date"></div>
            <div>Hebergement <br><input value="<?php echo (isset($voyageInfos["hebergement"])) ? $voyageInfos["hebergement"] : ' ';?>" name="hebergementInput" type="text"></div>
            <div>Lieu <br><input value=" <?php echo (isset($voyageInfos["lieu"])) ? $voyageInfos["lieu"] : ' ';?>" name="lieuInput" type="text"></div>
            <div>Tarif <br><input value="<?php echo (isset($voyageInfos["tarif"])) ? $voyageInfos["tarif"] : ' ';?>" name="tarifInput" type="text"></div>
        </div>
        <div class="colonneDeux">
            <div>Image <br><input value="<?php echo (isset($voyageInfos["image"])) ? $voyageInfos["image"] : ' ';?>" name="imageVoyage" type="file"></div>       
            <div>Description <br><textarea placeholder="" value="" name="descriptionInput" id="" cols="30" rows="10"><?php echo (isset($voyageInfos["description"])) ? $voyageInfos["description"] : ' ';?></textarea></div>
            <button name="editBtn">MODIFIER</button>
        </div> 
        <div class="exit"><a href="adminpage.php"><i class="fa-solid fa-xmark" style="color: rgb(99, 167, 255); font-size:50px;"></i></a></div>
    </div>
    </form>
</body>
</html>