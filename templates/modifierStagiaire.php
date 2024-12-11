<?php
$title = "Modification d'un stagiaire";
ob_start();
?>

<h1>Modification d'un Stagiaire</h1>
<form action="index.php?action=modif&id=<?= $stagiaire['id_membre'] ?>" method="POST">
    <table>
        <tr>
            <td>Prénom</td>
            <td><input type="text" name="login_membre" value="<?= $stagiaire['login_membre'] ?>" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Nom</td>
            <td><input type="text" name="nom_membre" value="<?= $stagiaire['nom_membre'] ?>" required autocomplete="off"></td>
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
