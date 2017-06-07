<?php
require_once '../../module/connection.php';
require_once '../../module/model/Type_Media/Type_Media.php';

$nom_type_media=(isset($_POST{"nom_Type_Media"}))?$_POST{"nom_Type_Media"}:"";
$ext_type_media=(isset($_POST{"ext_Type_Media"}))?$_POST{"ext_Type_Media"}:"";

if($nom_type_media!=""&&$ext_type_media!="") {
    $categorie = new Type_Media(addslashes($nom_type_media),addslashes($ext_type_media));
    $resultat = $categorie->saveType_Media();
    if ($resultat) {
        echo("Enregistrement reussie");
    } else {
        echo("Echec d'enregistrement");
    }
    header("Location: ../../views/type_media/editer.php");
}else{
    echo("vous n'avez pas le droit d'acces a cette page");
}?>