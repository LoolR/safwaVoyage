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

if($res_nom!=""&&$res_prenom!=""&&$res_nbr_adulte!=""&&$res_nbr_enfants!=""&&$res_tel!=""&&$id_res_voy!=""&&$res_email!="") {

    $Reservation = new Reservation(addslashes($res_nom),$res_prenom,addslashes($res_email),addslashes($res_nbr_adulte),$res_nbr_enfants,$res_tel,$res_info,$id_res_voy);
    $resultat = $Reservation->saveReservation();
    if ($resultat) {
        echo("Enregistrement réussie");

    } else {
        echo("Echec d'enregistrement");
    }

}else{
    echo("vous n'avez pas le droit d'accés à cette page");
}?>
