<?php
require_once '../../module/connection.php';
require_once '../../module/model/Voyage/Voyage.php';

$titre=(isset($_POST{"titre_voy"}))?$_POST{"titre_voy"}:"";
$date_voyage=(isset($_POST{"date_voy"}))?$_POST{"date_voy"}:"";
$duree=(isset($_POST{"duree_voy"}))?$_POST{"duree_voy"}:"";
$prix=(isset($_POST{"prix_voy"}))?$_POST{"prix_voy"}:"";
$text=(isset($_POST{"text_voy"}))?$_POST{"text_voy"}:"";
$idmedia=(isset($_POST{"id_media_voy"}))?$_POST{"id_media_voy"}:"";
$s_titre=(isset($_POST{"s_titre_voyage"}))?$_POST{"s_titre_voyage"}:"";
$id_cat=(isset($_POST{"id_cat_voy"}))?$_POST{"id_cat_voy"}:"";
$id_dest=(isset($_POST{"id_dest"}))?$_POST{"id_dest"}:"";
$itin=(isset($_POST{"itin"}))?$_POST{"itin"}:"";
$infosup=(isset($_POST{"infosup"}))?$_POST{"infosup"}:"";
$visibleVoyage = isset($_POST["visibleVoyage"]) ? true : false;

if($titre!=""&&$date_voyage!=""&&$prix!=""&&$text!=""&&$idmedia!=""&&$s_titre!=""&&$id_cat!=""&&$id_dest!=""&&$infosup!=""&&$itin!="") {

    $Voyage = new Voyage(addslashes($titre),$idmedia,addslashes($text),addslashes($s_titre),$id_cat,$id_dest,$duree,$date_voyage,$prix,$visibleVoyage,addslashes($infosup),addslashes($itin));
    $resultat = $Voyage->saveVoyage();
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
    header("Location: ../../views/voyage/editer.php");
}else{
    echo("vous n'avez pas le droit d'accés à cette page");
}?>
