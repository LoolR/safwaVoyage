<?php
require_once '../../module/connection.php';
require_once '../../module/model/Media/Media.php';
require_once '../../module/model/Type_Media/Type_Media.php';

$titreMedia=(isset($_POST{"titremedia"}))?$_POST{"titremedia"}:"";
$idType_MediaMedia=(isset($_POST{"idtype_mediamedia"}))?$_POST{"idtype_mediamedia"}:"";
$descriptionMedia=(isset($_POST{"descriptionmedia"}))?$_POST{"descriptionmedia"}:"";

$slider = isset($_POST["slider"]) ? true : false;


if($titreMedia!=""&$idType_MediaMedia!=""&&$descriptionMedia!="") {

if(isset($_FILES["lienmedia"])){
    //echo('Traitement des données');
    #specifier le chemin vers le repertoire des images
    $dossier = '../../../image/';
    #permet de recupe le nom du fichier
    $fichier = basename($_FILES['lienmedia']['name']);
    #permet de recuperer l'extension du fichier et le transformer en minuscule
    $extension = strtolower(pathinfo($_FILES['lienmedia']['name'],
        PATHINFO_EXTENSION));
    /*echo '</br>';
    echo($extension);
    echo '</br>';*/
    echo $idType_MediaMedia;
    
    $model= new Type_Media();
    $Type_Media = $model->getType_Media();
    while($data=$Type_Media->fetch()){
        if($data["id_type_media"]==$idType_MediaMedia){
            break;}}
    $extensions = (string)$data["ext_type_media"];
    
    /*echo '</br>';
    echo $extensions;
    echo '</br>';*/
    $pos=strrpos ( $extensions ,$extension );
    
    /*echo("verification de l'extention");
    echo '</br>';*/
    if($pos===FALSE){
        echo("Erreur extension");
    }else{
        //echo("Type_Media valide");
        //echo("transporter le fichier a la position{$dossier}");
        if(move_uploaded_file($_FILES['lienmedia']['tmp_name'],
            $dossier . md5($fichier).".".$extension)) //Si la fonction renvoie TRUE, c'est que ca fonctionne...
        {
            $imageUploaded = md5($fichier).".".$extension;
            echo("</br>");
            echo 'Upload effectue avec succes ! nom='.$imageUploaded;

        }
        else
        {
            echo 'Echec de l\'upload !';
        }
    }

    }else{
        echo("erreur de lien");
    }
    //echo("<br>".$titreMedia."<br>".$imageUploaded."<br>".$idType_MediaMedia."<br>".$descriptionMedia."<br>".$slider."<br>");
    $mediatheque = new Media(addslashes($titreMedia),$imageUploaded,$idType_MediaMedia,addslashes($descriptionMedia),$slider);
    $resultat = $mediatheque->saveMedia();
    if ($resultat) {
        echo("Enregistrement reussie");
    } else {
        echo("Echec d'enregistrement");
    }
    header("Location: ../../views/media/editer.php");
}else{
    echo("vous n'avez pas le droit d'acces a cette page");
}?>