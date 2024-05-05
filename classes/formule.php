<?php 

include_once "bdd.php";

class Formule {

    protected $name ;

    public function getFormule($id_formule){

        $bdd = new BDD();
        $bdd->connectionBdd();

        $std = $bdd->connection->query("SELECT `name` FROM `formule` WHERE id_formule = '$id_formule'");
        $formule = $std->fetch();

        $bdd->deconnectionBdd();

        return $formule ;
    }

    public function getAllFormule(){

        $bdd = new BDD();
        $bdd->connectionBdd();

        $std = $bdd->connection->query("SELECT `name` FROM `formule`");
        $formules = $std->fetchAll();
        
        $bdd->deconnectionBdd();

        return $formules ;
    }
}
$formules = new Formule();
$formules->getAllFormule();
var_dump($formules->getAllFormule());
?>