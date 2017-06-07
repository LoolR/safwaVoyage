<?php

require_once '../../module/connection.php';
require_once '../../module/model/Dest/Dest.php';

$model = new Dest();
$Dest = $model->getDest();
?>
<div class="container">
    
    <div class="well row">
        <a href="../../views/dest/index.php">
    <div class="btn btn-primary">Ajouter les Destinations</div></a>
<a href="../../views/dest/editer.php">
    <div class="btn btn-primary">Actualiser la page</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Nom</b></td><td><b>Id_Media</b></td><td><b>Pays</b></td><td><b>Description</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $Dest->fetch()){
                    
                    echo("<tr>");
                    echo("<td>".$data['id_dest']."</td>");
                    echo("<td>".$data['nom_dest']."</td>");
                    echo("<td>".$data['id_media_dest']."</td>");
                    echo("<td>".$data['pays_dest']."</td>");
                    echo("<td>".$data['description_dest']."</td>");
                    echo("<td><a href='../../actions/Dest/deleteAction.php?id=".$data['id_dest']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/Dest/editerActionForm.php?id=" .$data['id_dest']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
