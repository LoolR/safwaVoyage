<div class="container">
    <div class="well row">

<a href="../../views/cat_voyage/index.php">
    <div class="btn btn-primary">Ajouter une Categorie de Voyage </div></a>
    <a href="../../views/cat_voyage/editer.php">
    <div class="btn btn-primary">Actualiser la Page </div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>

<?php

require_once '../../module/connection.php';
require_once '../../module/model/Cat_Voyage/Cat_Voyage.php';

$model = new Cat_Voyage();
$Cat_Voyage = $model->getCat_Voyage();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Nom</b></td><td><b>Description</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $Cat_Voyage->fetch()){
                    
                    echo("<tr>");
                    echo("<td>".$data['id_cat_voy']."</td>");
                    echo("<td>".$data['nom_cat_voy']."</td>");
                    echo("<td>".$data['desc_cat_voy']."</td>");
                    echo("<td><a href='../../actions/Cat_Voyage/deleteAction.php?id=".$data['id_cat_voy']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/Cat_Voyage/editerActionForm.php?id=" .$data['id_cat_voy']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
