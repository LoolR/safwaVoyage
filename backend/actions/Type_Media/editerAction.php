<?php
require_once '../../module/connection.php';
require_once '../../module/model/Type_Media/Type_Media.php';

$nom_type_media=(isset($_POST{"nom_Type_Media"}))?$_POST{"nom_Type_Media"}:"";
$ext_type_media=(isset($_POST{"ext_Type_Media"}))?$_POST{"ext_Type_Media"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

if($nom_type_media!=""&&$ext_type_media!=""&&$id!="") {
    $categorie = new Type_Media();
    $resultat = $categorie->updateType_Media($id,addslashes($nom_type_media),addslashes($ext_type_media));
    if ($resultat) {
        echo("Enregistrement reussie");
    } else {
        echo("Echec d'enregistrement");
    }
    header("Location: ../../views/type_media/editer.php");
}else{
    echo("vous n'avez pas le droit d'acces a cette page");
}?>