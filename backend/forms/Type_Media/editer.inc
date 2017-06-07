<?php

require_once '../../module/connection.php';
require_once '../../module/model/Type_Media/Type_Media.php';

$model = new Type_Media();
#recuperation de la liste des Type_Medias dans la variable $Type_Media
#grace � la m�thode getType_Media le parammetre Id n'est pas obligatiore
$Type_Media = $model->getType_Media();
?>



<div class="container">
    <div class="well row">

    <a href="../../views/type_media/index.php">
    <div class="btn btn-primary">ajouter une Type de Media</div></a>
    <a href="../../views/type_media/editer.php">
    <div class="btn btn-primary">Actualiser la page</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger">Annuler</div></a>
</div></div>

<div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Nom</b></td><td><b>extension</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $Type_Media->fetch()){
                    echo("<tr>");
                    echo("<td>".$data['id_type_media']."</td>");
                    echo("<td>".$data['nom_type_media']."</td>");
                    echo("<td>".$data['ext_type_media']."</td>");
                    
                    echo("<td><a href='../../actions/Type_Media/deleteAction.php?id=".$data['id_type_media']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/Type_Media/editerActionForm.php?id=" .$data['id_type_media']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
