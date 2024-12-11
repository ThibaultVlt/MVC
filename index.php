<?php
require_once 'controller.php';

try{
    
    if (!isset($_GET["action"])) {
        
        listeStagiaires();

    }else if(isset($_GET["action"])){
        
        switch($_GET["action"]){
            case "suppr":
                if(isset($_GET["id"])){
                    supprimer_stagiaire($_GET["id"]);
                }else{
                    throw new Exception("<span style='color:red'>Aucun identifiant de stagiaire envoyé</span>");
                }
                break;
            case "form_ajout":
                require "templates/ajouterStagiaire.php";
                break;
            case "ajout":
                    if (!empty($_POST["nom_membre"]) && !empty($_POST["login_membre"])) {
                        $nomMembre = $_POST["nom_membre"];
                        $loginMembre = $_POST["login_membre"];
                        ajouter_stagiaire($nomMembre, $loginMembre);
                    } else {
                        throw new Exception("<span style='color:red'>Aucun stagiaire n'a été ajouté</span>");
                    }
                break;
            case "form_modif":
                if (isset($_GET["id"])) {
                    $stagiaire = get_stagiaire_by_id($_GET["id"]); // Récupérer le stagiaire à modifier
                    require "templates/modifierStagiaire.php";
                } else {
                    throw new Exception("<span style='color:red'>Aucun identifiant de stagiaire envoyé</span>");
                }
                break;
            case "modif":
                if (isset($_GET["id"]) && isset($_POST["nom_membre"]) && isset($_POST["login_membre"])) {
                    modifier_stagiaire($_GET["id"], $_POST["nom_membre"], $_POST["login_membre"]);
                    listeStagiaires(); // Retour à la liste après modification
                } else {
                    throw new Exception("<span style='color:red'>Les données pour la modification sont incomplètes</span>");
                }
                break;
        }

    } else {

        throw new Exception("<h1>Page non trouvée !!!</h1>");
    }

}catch(Exception $e){

    $msgErreur = $e->getMessage();
    echo erreur($msgErreur);
}
//TODO gérer le action  ajout et modification
?>
