<?php

include_once "bdd.php";

class Voyage {

    protected $id_categorie ;
    protected $id_formule ;
    protected $lieu ;
    protected $description ;
    protected $hebergement ;
    protected $image ;
    protected $date_debut ;
    protected $date_fin ;
    protected $tarif ;

    public function addVoyage($id_categorie,$id_formule,$lieu, $description ,$hebergement,$image,$date_debut,$date_fin,$tarif){
        //creation d'une istance ;
        $db = new BDD();

        //connection à la bdd ;
        $db->connectionBdd();

        //ajout des valeurs dans la table voyage ;
        //this->connexion de db ;
        $std = $db->connection->query("INSERT INTO voyage (id_categorie,id_formule,lieu,description,hebergement,image,date_debut,date_fin,tarif) VALUES ('$id_categorie' ,'$id_formule' ,'$lieu', '$description' ,'$hebergement','$image','$date_debut','$date_fin','$tarif')");
        // $std->execute(); 

        //deconnexion de la base de donnée ;
        $db->deconnectionBdd();
    }

    public function getAllVoyages(){

        $db = new BDD();
        $db->connectionBdd();

        $std = $db->connection->prepare("SELECT * FROM voyage");
        $std->execute();
        $voyages = $std->fetchAll();

        $db->deconnectionBdd();

        return $voyages;
    }

    public function removeVoyage($id_voyage){

        $db = new BDD();
        $db->connectionBdd();

        $std = $db->connection->prepare("DELETE FROM voyage WHERE id_voyage = $id_voyage");
        $std->execute();

        $db->deconnectionBdd();
    }

    public function editVoyage($editId,$id_categorie,$id_formule,$lieu, $description ,$hebergement,$image,$date_debut,$date_fin,$tarif){

        $db = new BDD();
        $db->connectionBdd();

        $std = $db->connection->query("UPDATE `voyage` SET `id_voyage`= '$editId', `id_categorie`= '$id_categorie' ,`id_formule`= '$id_formule' ,`lieu`= '$lieu',`description`= '$description',`hebergement`= '$hebergement' ,`image`= '$image' ,`date_debut`= '$date_debut' ,`date_fin`= '$date_fin' ,`tarif`='$tarif' WHERE `id_voyage`= '$editId'");

        $db->deconnectionBdd();
    }

    public function getVoyageFromId($editId){

        $db = new BDD();
        $db->connectionBdd();

        // $std = $db->connection->query("SELECT * FROM  `voyage` INNER JOIN `categorie` ON voyage.id_categorie = categorie.id_categorie WHERE `id_voyage` = '$editId'");
        $std = $db->connection->query("SELECT * FROM  `voyage` WHERE `id_voyage` = '$editId'");
        
        $voyage = $std->fetchAll(PDO::FETCH_ASSOC);

        $db->deconnectionBdd();

        return $voyage ;
    }

    public function getInfosFromLieu($searchBar){
        
        $bd = new BDD();
        $bd->connectionBdd();

        $std = $bd->connection->query("SELECT * FROM  `voyage` WHERE `lieu` like '%$searchBar%'");
        
        $voyageInfos = $std->fetchAll(PDO::FETCH_ASSOC);
        
        $bd->deconnectionBdd();
        
        return $voyageInfos ;

    }
    public function getInfosFromCategorie($filterCat){
        
        $bd = new BDD();
        $bd->connectionBdd();

        $std = $bd->connection->query("SELECT * FROM  `voyage` WHERE `id_categorie` = '$filterCat'");
        
        $voyageInfos = $std->fetchAll(PDO::FETCH_ASSOC);
        
        $bd->deconnectionBdd();
        
        return $voyageInfos ;

    }
    
}

?>