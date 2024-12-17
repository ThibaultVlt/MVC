<?php
$title = "Ajout d'un stagiaire";
ob_start();
?>

<h1>Ajout d'un Stagiaire</h1>

<?php
// Vérification des erreurs et affichage des messages
if (isset($error_nom)) {
    echo "<p>$error_nom</p>";
}
if (isset($error_login)) {
    echo "<p>$error_login</p>";
}
?>

<form action="index.php?action=ajout" method="POST" id="form_ajout">
    <table>
        <tr>
            <td>Prénom</td>
            <td>
                <input type="text" name="login_membre" id="login-membre" 
                    value="<?= isset($_POST['login_membre']) ? htmlspecialchars($_POST['login_membre']) : '' ?>" 
                    minlength="2" pattern="[a-zA-Z-]{2,}" required autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>Nom</td>
            <td>
                <input type="text" name="nom_membre" id="nom-membre" 
                    value="<?= isset($_POST['nom_membre']) ? htmlspecialchars($_POST['nom_membre']) : '' ?>"
                    minlength="2" pattern="[a-zA-Z-]{2,}" required autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" id="submit" name="submit" value="Envoyer">
                <input type="reset" id="reset" value="Annuler">
            </td>
        </tr>
    </table>
    <a href="index.php">Retour à la liste</a>
</form>

<?php
$content = ob_get_clean();
include "baselayout.php";
?>
