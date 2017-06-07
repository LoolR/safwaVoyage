<?php

require_once '../../module/connection.php';
require_once '../../module/model/Reservation/Reservation.php';

$model = new Reservation();
$Reservation = $model->getReservation();
?>
<div class="container">
    <div class="well row">

        <a href="../../views/reservation/index.php">
            <div class="btn btn-primary">Actualiser la Page</div></a>
        <a href="../../admin/index.php">
            <div class="btn btn-danger"> Annuler</div></a>
    </div></div>
<div id="formEditer" class="container">
    <div class="well row">
        <table class="table table-striped" >
            <tr>
                <td><b>#</b></td><td><b>Nom Client</b></td><td><b>Prenom Client</b></td><td><b>Email</b></td><td><b>Nbr Adultes</b></td><td><b>Nbr enfants</b></td>
                <td><b>Tel</b></td><td><b>Info sup</b></td><td><b>Id Voyage</b></td><td><b>Action</b></td>
            </tr>
            <?php
            while($data = $Reservation->fetch()){

                echo("<tr>");
                echo("<td>".$data['id_reservation']."</td>");
                echo("<td>".$data['res_nom']."</td>");
                echo("<td>".$data['res_prenom']."</td>");
                echo("<td>".$data['res_email']."</td>");
                echo("<td>".$data['res_nbr_adulte']."</td>");
                echo("<td>".$data['res_nbr_enfants']."</td>");
                echo("<td>".$data['res_tel']."</td>");
                echo("<td>".$data['res_info']."</td>");
                echo("<td>".$data['id_res_voy']."</td>");
                echo("<td><a href='../../actions/Reservation/deleteAction.php?id=".$data['id_voy']."'>Suprimer</a></td>");
                echo("</tr>");

            }
            ?>
        </table>
    </div>
</div>
