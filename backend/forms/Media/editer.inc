<?php

require_once '../../module/connection.php';
require_once '../../module/model/Media/Media.php';

$model = new Media();
#recuperation de la liste des medias dans la variable $media
#grace � la m�thode getMedia le parammetre Id n'est pas obligatiore
$Media = $model->getMedia();
?>
<div class="container">
    <div class="well row">
        <a href="../../views/media/index.php">
    <div class="btn btn-primary">Ajouter un element a la Mediatheque</div></a>
<a href="../../views/media/editer.php">
    <div class="btn btn-primary">Actualiser la page</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>Nom</b></td><td><b>Description</b></td><td><b>Source</b></td><td><b>Type Media</b></td><td><b>Slider</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $Media->fetch()){
                    //tant que je recoi des enregistrement de la table media
                    //je continue a afficher les resultat sous forme de <td>
                    //fetch()=recuperation de resultat sous forme de tableau
                    echo("<tr>");
                    echo("<td>".$data['id_media']."</td>");
                    echo("<td>".$data['nom_media']."</td>");
                    echo("<td>".$data['desc_media']."</td>");
                    echo("<td>".$data['source_media']."</td>");
                    echo("<td>".$data['id_type_media']."</td>");
                    echo("<td>".$data['slider_media']."</td>");
                    echo("<td><a href='../../actions/Media/deleteAction.php?id=".$data['id_media']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/Media/editerActionForm.php?id=" .$data['id_media']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
