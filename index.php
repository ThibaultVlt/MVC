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
                    throw new Exception("<span>Aucun identifiant de stagiaire envoyé</span>");
                }
            break;
            case "form_ajout":
                require "templates/ajouterStagiaire.php";
            break;
            case "ajout":
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'ajout') {
                    // Récupération des données envoyées
                    $nomMembre = $_POST['nom_membre'];
                    $loginMembre = $_POST['login_membre'];
                    // Initialisation des variables d'erreur
                    $error_nom = $error_login = '';
                    // Validation du prénom (login)
                    if (empty($loginMembre)) {
                        $error_login = "Prénom obligatoire.";
                    } elseif (!preg_match('/^[a-zA-Z-]{2,}$/', $loginMembre)) {
                        $error_login = "Le prénom doit comporter au moins 2 caractères et ne contenir que des lettres ou des tirets.";
                    }
                
                    // Validation du nom
                    if (empty($nomMembre)) {
                        $error_nom = "Nom obligatoire.";
                    } elseif (!preg_match('/^[a-zA-Z-]{2,}$/', $nomMembre)) {
                        $error_nom = "Le nom doit comporter au moins 2 caractères et ne contenir que des lettres ou des tirets.";
                    }
                    // Si aucune erreur, ajouter le stagiaire
                    if (empty($error_nom) && empty($error_login)) {
                        ajouter_stagiaire($nomMembre, $loginMembre);
                        // Redirection vers la liste après ajout
                        header('Location: index.php');
                        exit();
                    }
                }
            break;
            case "form_modif":
                if (isset($_GET["id"])) {
                    // Récupérer les données du stagiaire
                    $stagiaire = get_stagiaire_by_id($_GET["id"]);
                    require "templates/modifierStagiaire.php";
                } else {
                    throw new Exception("ID stagiaire manquant");
                }
            break;
            case "modif":
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_GET['id'], $_POST['nom_membre'], $_POST['login_membre'])) {
                        // Récupérer les données du formulaire
                        $nomMembre = $_POST['nom_membre'];
                        $loginMembre = $_POST['login_membre'];
                        // Validation des champs
                        $error_nom = $error_login = '';
                        if (empty($nomMembre)) {
                            $error_nom = "Nom obligatoire.";
                        }
                        if (empty($loginMembre)) {
                            $error_login = "Prénom obligatoire.";
                        }
                        if (empty($error_nom) && empty($error_login)) {
                            modifier_stagiaire($_GET['id'], $nomMembre, $loginMembre);
                            header('Location: index.php');
                            exit();
                        } else {
                            // Si des erreurs sont présentes, afficher à nouveau le formulaire
                            $stagiaire = get_stagiaire_by_id($_GET['id']);
                            require "templates/modifierStagiaire.php";
                        }
                    }
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
