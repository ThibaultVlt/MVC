<?php
$title = "Liste des Stagiaires";
ob_start();
?>
<h1>Liste des Stagiaires</h1>
    <table class="montableau">
        <thead>
            <th> ID Membre </th>
            <th> Prénom Membre </th>
            <th> Nom Membre </th>
            <th> Suppression </th>
        </thead>
        <?php
            foreach($stagiaires as $stagiaire){
                echo "<tr>";
                echo "<td class='colid'> $stagiaire[id_membre] </td>";
                echo "<td> $stagiaire[login_membre] </td>";
                echo "<td> $stagiaire[nom_membre] </td>";
                echo "<td class='colsuppr'>
                <a href='index.php?action=suppr&id=$stagiaire[id_membre]'>Supprimer</a> | 
                <a href='index.php?action=form_modif&id=$stagiaire[id_membre]'>Modifier</a>
                </td>";
            }
        ?>
        </tr>
        <tfoot>
            <tr>
                <td colspan="4" class="lien-ajout"><a href="index.php?action=form_ajout">Ajouter un Stagiaire</a></td>
            </tr>
        </tfoot>
    </table>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>
