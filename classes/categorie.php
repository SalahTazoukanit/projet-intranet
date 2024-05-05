<?php 
include_once "bdd.php";
class Categorie {

    protected $name ;

    public function getCategorie($id_categorie){

        $bdd = new BDD();
        $bdd->connectionBdd();

        $std = $bdd->connection->query("SELECT `name` FROM `categorie` WHERE id_categorie = '$id_categorie'");
        $categorie = $std->fetch();
        var_dump($categorie);


        $bdd->deconnectionBdd();

        return $categorie ;

    }

    public function getAllCategories(){

        $bdd = new BDD();
        var_dump($bdd);
        $bdd->connectionBdd();

        $std = $bdd->connection->query("SELECT * FROM `categorie`");
        $categories = $std->fetchAll();

        $bdd->deconnectionBdd();

        return $categories ;

    }
}

?>