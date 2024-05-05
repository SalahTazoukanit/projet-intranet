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
    include "header.php"
    ?>
    <form  class="formulaireAddEdit" action="../controlers/verifAdd.php" method="POST" enctype="multipart/form-data">
    <div class="borderFormAdd">    
        <div class="colonneUn">
            <select name="selectCategorie" id="selectCategorie">
                <option name="1">Mer</option>
                <option value="2">Montagne</option>
                <option value="3">Campagne</option>
            </select>
            <select name="selectFormule" id="formule">
                <option value="classic">Classique</option>
                <option value="deuxPourUn">2 pour 1</option>
            </select>
            <div class="dateDebut">Date debut <br><input name="dateDebut" type="date"></div>
            <div class="dateFin">Date fin <br><input name="dateFin" type="date"></div>
            <div>Hebergement <br><input name="hebergementInput" type="text"></div>
            <div>Lieu <br><input name="lieuInput" type="text"></div>
            <div>Tarif <br><input name="tarifInput" type="text"></div>
        </div>
        <div class="colonneDeux">
            <div>Image <br><input id="imageVoyage" name="imageVoyage" type="file"></div>
            <div>Description <br><textarea name="descriptionInput" id="" cols="30" rows="10"></textarea></div>
            <button type="submit">VALIDER</button>
        </div> 
        <div class="exit"><a href="adminpage.php"><i class="fa-solid fa-xmark" style="color: rgb(99, 167, 255); font-size:50px;"></i></a></div>
    </div>
    </form>
</body>
</html>