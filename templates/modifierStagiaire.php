<?php
$title = "Modification d'un stagiaire";
ob_start();
?>

<h1>Modification d'un Stagiaire</h1>

<?php
// Vérification des erreurs et affichage des messages
if (isset($error_nom)) {
    echo "<p'>$error_nom</p>";
}
if (isset($error_login)) {
    echo "<p>$error_login</p>";
}
?>

<form action="index.php?action=modif&id=<?= $stagiaire['id_membre'] ?>" method="POST">
    <table>
        <tr>
            <td>Prénom</td>
            <td>
                <input type="text" name="login_membre" 
                    value="<?= isset($stagiaire['login_membre']) ? htmlspecialchars($stagiaire['login_membre']) : '' ?>" 
                    minlength="2" pattern="[a-zA-Z-]{2,}" required autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>Nom</td>
            <td>
                <input type="text" name="nom_membre" 
                    value="<?= isset($stagiaire['nom_membre']) ? htmlspecialchars($stagiaire['nom_membre']) : '' ?>" 
                    minlength="2" pattern="[a-zA-Z-]{2,}" required autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Modifier">
                <input type="reset" value="Annuler">
            </td>
        </tr>
    </table>
    <a href="index.php">Retour à la liste</a>
</form>

<?php
$content = ob_get_clean();
include "baselayout.php";
?>
