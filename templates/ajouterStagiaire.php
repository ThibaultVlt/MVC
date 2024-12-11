<?php
$title = "Ajout d'un stagiaire";
ob_start();
?>

<h1>Ajout d'un Stagiaire</h1>
<form action="index.php?action=ajout" method="POST" id="form_ajout">
    <table>
        <tr>
            <td>Prénom</td>
            <td><input type="text" name="login_membre" id="login-membre" minlength="2" pattern="[a-z][A-Z]" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Nom</td>
            <td><input type="text" name="nom_membre" id="nom-membre" minlength="2" pattern="[a-z][A-Z]" required autocomplete="off"></td>
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