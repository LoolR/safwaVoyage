<?php

require_once '../../module/connection.php';
require_once '../../module/model/Contact/Contact.php';

$model = new Contact();
$Contact = $model->getContact();
?>
<div class="container">

    <div class="well row">
        <a href="../../views/contact/editer.php">
            <div class="btn btn-primary">Actualiser la page</div></a>
        <a href="../../admin/index.php">
            <div class="btn btn-danger"> Annuler</div></a>
    </div></div>
<div id="formEditer" class="container">
    <div class="well row">
        <table class="table table-striped" >
            <tr>
                <td><b>#</b></td><td><b>Nom</b></td><td><b>Prenom</b></td><td><b>Tel</b></td><td><b>Email</b></td><td><b>Message</b></td><td colspan="2"><b>Action</b></td>
            </tr>
            <?php
            while($data = $Contact->fetch()){

                echo("<tr>");
                echo("<td>".$data['id_contact']."</td>");
                echo("<td>".$data['nom_contact']."</td>");
                echo("<td>".$data['prenom_contact']."</td>");
                echo("<td>".$data['tel_contact']."</td>");
                echo("<td>".$data['email_contact']."</td>");
                echo("<td>".$data['desc_contact']."</td>");
                echo("<td><a href='../../actions/Contact/deleteAction.php?id=".$data['id_contact']."'>Supprimer</a></td>");
//                echo("<td><a href='../../forms/Dest/editerActionForm.php?id=" .$data['id_contact']."'>Editer</a></td>");
                echo("</tr>");

            }
            ?>
        </table>
    </div>
</div>
