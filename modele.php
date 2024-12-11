<?php
require("connect.php");

// Connexion à la BDD
function connect_db()
{
    $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
    try {
        $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $connexion = new PDO($dsn, USER, PASSWD,$option);
    } catch (PDOException $e) {
        printf("Echec connexion : %s\n", $e->getMessage());
        exit();
    }
    return $connexion;
}

// Création de la liste des Stagiaires
function get_all_stagiaires(){

    $connexion = connect_db();
    $stagiaires = array();
    $sql = "SELECT * from Membres";

    foreach ($connexion->query($sql) as $row) {
        $stagiaires[] = $row;
    }
    return $stagiaires;
}

// Suppression d'un stagiaire par id
function delete_stagiaire_by_id($id){

    $connexion = connect_db();
    $sql= "DELETE FROM membres WHERE id_membre = :id ";
    $reponse = $connexion->prepare($sql);
    $reponse->bindValue(":id", intval($_GET["id"]), PDO::PARAM_INT);
    $reponse->execute();    
}
//TODO fonction ajout et modif add stagiaire et update stagiaires
//Ajouter un stagiaire par id
function add_stagiaire_by_id($nomMembre, $loginMembre) {
    try {
        $connexion = connect_db();
        $sql = "INSERT INTO `membres`(`nom_membre`, `login_membre`) VALUES (:nom_membre, :login_membre)";
        $reponse = $connexion->prepare($sql);
        $reponse->bindParam(':nom_membre', $nomMembre);
        $reponse->bindParam(':login_membre', $loginMembre);
        $reponse->execute();
    } catch (PDOException $e) {
        throw new Exception("Erreur SQL : " . $e->getMessage());
    }
}

//Modification du stagiaire
function modifier_stagiaire_by_id($id, $nomMembre, $loginMembre) {
    $connexion = connect_db();
    $sql = "UPDATE membres SET nom_membre = :nom_membre, login_membre = :login_membre WHERE id_membre = :id";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(':id', $id, PDO::PARAM_INT);
    $reponse->bindParam(':nom_membre', $nomMembre);
    $reponse->bindParam(':login_membre', $loginMembre);
    $reponse->execute();
}

?>
