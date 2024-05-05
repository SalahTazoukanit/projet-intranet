<?php
    $id_voyage = $voyage["id_voyage"];

    $allVoyages =

     '<div class="voyageInfo">
        <img src='.$voyage["image"].'>
        <div class="infos">
            <h3>'.$voyage['lieu'].'</h3>
            <p>'.$voyage["description"].'</p>
            <p><strong>Hebergement</strong> : '.$voyage["hebergement"].'</p>
            <div><strong> Date de debut</strong> : '.$voyage["date_debut"].'<br>
            <strong>Date de fin</strong> : '.$voyage["date_fin"].'</div>
            <p><strong>Tarif </strong>: '.$voyage["tarif"].' Euros</p>
        </div>   
    </div> 
    <div class="buttons">
        <a href="editFormulaire.php?updateId='.$id_voyage.'"><button id="editVoyage" name="editBtn">Modifier</button></a>
        <a href="../controlers/verifRemove.php?removedId='.$id_voyage.'"><button id="removeBtn" name="removeBtn">Supprimer</button></a>
    </div>' ;
    
    echo $allVoyages ;
?>
