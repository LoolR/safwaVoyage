<?php

require_once '../../module/connection.php';
require_once '../../module/model/Play_list/Play_list.php';

$model = new Play_list();
$playList = $model->getPlay_list();
?>
<div class="container">
    
    <div class="well row">
        <a href="../../views/play_list/index.php">
    <div class="btn btn-primary">Ajouter les Play Listes</div></a>
<a href="../../views/play_list/editer.php">
    <div class="btn btn-primary">Actualiser la page</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Nom</b></td><td><b>Description</b></td><td><b>Media liste</b></td><td><b>Destination</b></td><td><b>Categorie de voyage</b></td><td><b>Voyage</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $playList->fetch()){
                    echo("<tr>");
                    echo("<td>".$data['id_play_list']."</td>");
                    echo("<td>".$data['name_play_list']."</td>");
                    echo("<td>".$data['desc_play_list']."</td>");
                    echo("<td>".$data['media_list']."</td>");
                    echo("<td>".$data['id_dest_play']."</td>");
                    echo("<td>".$data['id_cat_play']."</td>");
                    echo("<td>".$data['id_voy_play']."</td>");
                    echo("<td><a href='../../actions/play_list/deleteAction.php?id=".$data['id_play_list']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/play_list/editerActionForm.php?id=" .$data['id_play_list']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
