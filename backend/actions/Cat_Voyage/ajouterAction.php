<?php
require_once '../../module/connection.php';
require_once '../../module/model/Cat_Voyage/Cat_Voyage.php';

$nom=(isset($_POST{"nomcatvoyage"}))?$_POST{"nomcatvoyage"}:"";
$desc=(isset($_POST{"descriptioncatvoyage"}))?$_POST{"descriptioncatvoyage"}:"";

if($nom!=""&&$desc!="") {
    $categorie = new Cat_Voyage(addslashes($nom),addslashes($desc));
    
    $resultat = $categorie->saveCat_Voyage();
    
    if ($resultat) {
        echo("Enregistrement reussie");
        
    } else {
        echo("Echec d'enregistrement");
    }
    header("Location: ../../views/cat_voyage/editer.php");
}else{
    echo("Vous n'avez pas le droit d'acces a cette page");
}?>