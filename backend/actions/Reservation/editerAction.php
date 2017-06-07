<?php
require_once '../../module/connection.php';
require_once '../../module/model/Reservation/Reservation.php';

$res_nom=(isset($_POST{"res_nom"}))?$_POST{"res_nom"}:"";
$res_prenom=(isset($_POST{"res_prenom"}))?$_POST{"res_prenom"}:"";
$res_email=(isset($_POST{"res_email"}))?$_POST{"res_email"}:"";
$res_nbr_adulte=(isset($_POST{"res_nbr_adulte"}))?$_POST{"res_nbr_adulte"}:"";
$res_nbr_enfants=(isset($_POST{"res_nbr_enfants"}))?$_POST{"res_nbr_enfants"}:"";
$res_tel=(isset($_POST{"res_tel"}))?$_POST{"res_tel"}:"";
$res_info=(isset($_POST{"res_info_Reservation"}))?$_POST{"res_info_Reservation"}:"";
$id_res_voy=(isset($_POST{"id_res_voy"}))?$_POST{"id_res_voy"}:"";

$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

if($res_nom!=""&&$res_prenom!=""&&$res_nbr_adulte!=""&&$res_nbr_enfants!=""&&$res_tel!=""&&$res_info!=""&&$id_res_voy!=""&&$res_email!="") {

    $Reservation = new Reservation();
    $resultat = $Reservation->updateReservation($id,addslashes($res_nom),addslashes($res_prenom),addslashes($res_email),$res_nbr_adulte,$res_nbr_enfants,$res_tel,addslashes($res_info),$id_res_voy);
    if ($resultat) {
        echo("Enregistrement reussie");
    } else {
        echo("Echec d'enregistrement");
    }
    header("Location: ../../views/Reservation/editer.php");
}else{
    echo("vous n'avez pas le droit d'acces a cette page");
}?>
