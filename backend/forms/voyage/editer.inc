<?php

require_once '../../module/connection.php';
require_once '../../module/model/Voyage/Voyage.php';

$model = new Voyage();
$Voyage = $model->getVoyage();
?>
<div class="container">
    <div class="well row">

<a href="../../views/voyage/index.php">
    <div class="btn btn-primary">Ajouter un Voyage </div></a>
    <a href="../../views/voyage/editer.php">
    <div class="btn btn-primary">Actualiser la Page </div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Titre</b></td><td><b>Sous Titre</b></td><td><b>Prix</b></td><td><b>Media</b></td><td><b>Text</b></td>
                        <td><b>Date</b></td><td><b>Durée</b></td><td><b>Destination</b></td><td><b>Categorie</b></td><td><b>Visible</b></td>
                        <td><b>Informations Sup</b></td><td><b>Itinéraire</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $Voyage->fetch()){
                    
                    echo("<tr>");
                    echo("<td>".$data['id_voy']."</td>");
                    echo("<td>".$data['titre_voy']."</td>");
                    echo("<td>".$data['s_titre_voy']."</td>");
                    echo("<td>".$data['prix_voy']."</td>");
                    echo("<td>".$data['id_media_voy']."</td>");
                    echo("<td>".$data['text_voy']."</td>");
                    echo("<td>".$data['date_voy']."</td>");
                    echo("<td>".$data['duree_voy']."</td>");
                    echo("<td>".$data['id_dest_voy']."</td>");
                    echo("<td>".$data['id_cat_voy']."</td>");
                    echo("<td>".$data['visible_voy']."</td>");
                    echo("<td>".$data['infosup']."</td>");
                    echo("<td>".$data['Itineraire']."</td>");
                    echo("<td><a href='../../actions/Voyage/deleteAction.php?id=".$data['id_voy']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/voyage/editerActionForm.php?id=" .$data['id_voy']."'>Editer</a></td>");
                    echo("</tr>");


                    /*`infosup`, `Itinéraire`)*/
                }
                ?>
            </table>
        </div>
    </div>
