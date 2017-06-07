<?php
require_once '../../module/connection.php';
require_once '../../module/model/Dest/Dest.php';

$nom_dest=(isset($_POST{"nom_dest"}))?$_POST{"nom_dest"}:"";
$id_media_dest=(isset($_POST{"description_dest"}))?$_POST{"description_dest"}:"";
$pays_dest=(isset($_POST{"pays_dest"}))?$_POST{"pays_dest"}:"";
$description_dest=(isset($_POST{"id_media_voy"}))?$_POST{"id_media_voy"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";




if($nom_dest!=""&&$id_media_dest!=""&&$pays_dest!=""&&$description_dest!=""&&$id!="") {
    $categorie = new Dest();
    $resultat = $categorie->updateDest($id,addslashes($nom_dest),$id_media_dest,$pays_dest,addslashes($description_dest));
    if ($resultat) {
        echo("Enregistrement reussie");
    } else {
        echo("Echec d'enregistrement");
    }

    header("Location: ../../views/dest/editer.php");
}else{
    echo("vous n'avez pas le droit d'acces a cette page");
}?>