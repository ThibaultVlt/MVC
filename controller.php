<?php
require_once 'modele.php';

function listeStagiaires(){
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
}

function supprimer_stagiaire($id){

    delete_stagiaire_by_id($id);
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
}

// Affiche une erreur dans une vue erreur.php
// qui centralise toutes les levées d'Exceptions 
function erreur($msgErreur) {
    require 'templates/erreur.php';
}
// TODO Ajout stagiaire fonction & modification

//Ajouter un stagiaire
function ajouter_stagiaire($nomMembre, $loginMembre){
    add_stagiaire_by_id($nomMembre, $loginMembre);
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
}

//Modifier le stagiaire
function modifier_stagiaire($id, $nomMembre, $loginMembre) {
    modifier_stagiaire_by_id($id, $nomMembre, $loginMembre);
    header('Location: index.php');
    exit();
}

function get_stagiaire_by_id($id) {
    $connexion = connect_db();
    $sql = "SELECT * FROM membres WHERE id_membre = :id";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(':id', $id, PDO::PARAM_INT);
    $reponse->execute();
    return $reponse->fetch(PDO::FETCH_ASSOC);
}
?>



