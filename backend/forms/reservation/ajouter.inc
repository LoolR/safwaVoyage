<?php
require_once '../backend/module/connection.php';

$id=(isset($_GET{"id"}))?$_GET{"id"}:"";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../backend/admin/css/style.css" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Insert title here</title>
    <script language="javascript" src="../backend/js/validation.js"></script>
</head>
<body>

<div id="form" class=" container">
    <form enctype="multipart/form-data" name="ReservationForm" action="../backend/actions/Reservation/ajouterAction.php" method="post">
        <div class="well row">
            <table class="table table-hover">
                <tr id="erreurline" class="info">
                    <td colspan=2 id="bloc_erreur">
                    </td>
                </tr>
                <tr id="idres_nom" class="info">
                    <td>
                        <label>Nom</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="res_nom"/>
                    </td>
                </tr>
                <tr id="idres_prenom" class="info">
                    <td>
                        <label>Prenom</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="res_prenom"/>
                    </td>
                </tr>
                <tr id="idres_email" class="info">
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="res_email"/>
                    </td>
                </tr>

                <tr id="idres_tel" class="info">
                    <td>
                        <label>Numero de Tel</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="res_tel" />
                    </td>
                </tr>

                <tr id="idres_nbr_adulte" class="info">
                    <td>
                        <label>Adultes</label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="res_nbr_adulte"/>
                    </td>
                </tr>

                <tr id="idres_nbr_enfants" class="info">
                    <td>
                        <label>Enfants (>12ans)</label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="res_nbr_enfants"/>
                    </td>
                </tr>

                <tr id="idres_info_Reservation" class="info">
                    <td>
                        <label>Text descriptif</label>
                    </td>
                    <td>
                        <textarea class="form-control" name="res_info_Reservation"></textarea>
                    </td>
                </tr>
                        <input type="hidden" name="id_res_voy" value="<?php echo $id;?>"/>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Valider" onclick="valider(ReservationForm,'ajouterReservation')"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>
