<?php
require_once '../../module/connection.php';
require_once '../../module/model/Media/Media.php';
require_once '../../module/model/Type_Media/Type_Media.php';

$titreMedia=(isset($_POST{"titremedia"}))?$_POST{"titremedia"}:"";
$idType_MediaMedia=(isset($_POST{"idtype_mediamedia"}))?$_POST{"idtype_mediamedia"}:"";
$descriptionMedia=(isset($_POST{"descriptionmedia"}))?$_POST{"descriptionmedia"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";
//$imageUploaded=(isset($_POST{"modifierlienmedia"}))?$_POST{"modifierlienmedia"}:"";
$visibleMedia = isset($_POST["slider"]) ? true : false;

if($id!=""&&$titreMedia!=""&&$descriptionMedia!="") {

$model = new Media();
    $listmedia = $model->getMedia();
    while($datamedia=$listmedia->fetch()) {
    if ($datamedia["id_media"] . "" == $id) {
        $lien = (string)$datamedia["source_media"];
        break;
        }
    }

if($idType_MediaMedia!="0"){

                $model= new Type_Media();
                $Type_Media = $model->getType_Media();
                while($data=$Type_Media->fetch()){
                    if($data["id_type_media"]==$idType_MediaMedia){
                    $extensions = (string)$data["ext_type_media"];
                    break;}}
                                    

                
        if(isset($_FILES["modifierlienmedia"])){

            echo('Traitement des données<br/>');
            $dossier = '../../../image/';
            $fichier = basename($_FILES['modifierlienmedia']['name']);
            $extension = strtolower(pathinfo($_FILES['modifierlienmedia']['name'],
                PATHINFO_EXTENSION));
            echo($extension."<br/>");
            
                $pos=strrpos ( $extensions ,$extension );
                        
            echo("verification de l'extention<br/>");
            if($pos===FALSE){
                echo("Erreur extension<br/>");
                $imageUploaded=$datamedia['source_media'];
                $idType_MediaMedia=$datamedia['id_type_media'];
            }else{
                echo("Type_Media validér<br/>");
                
                
                if(md5($fichier).".".$extension==$lien){
                    echo("c'est le meme fichier");
                    $imageUploaded=$datamedia['source_media'];
                }else{
                echo("transporter le fichier a la position{$dossier} <br/>");
                if(move_uploaded_file($_FILES['modifierlienmedia']['tmp_name'],
                    $dossier . md5($fichier).".".$extension)) //Si la fonction renvoie TRUE, c'est que elle a fonctionne..
                {
                    if($lien !=''){
                    if(unlink("../../../image/".$lien)){
                        echo("fichier supprimer avec succe<br/>");
                    }else{
                        echo("fichier non suprimer<br/>");
                    }}
                    $imageUploaded = md5($fichier).".".$extension;
                    echo("<br/>".$imageUploaded."<br/>");
                    echo 'Upload effectue avec succes !<br/>';

                }
                else
                {
                    echo 'Echec de l\'upload ! <br/>';
                    $imageUploaded=$datamedia['source_media'];
                    $idType_MediaMedia=$datamedia['id_type_media'];
                }
            }
            }

        }else{
                echo("pas de fichier");
                $imageUploaded=$datamedia['source_media'];
                $idType_MediaMedia=$datamedia['id_type_media'];
        }
}else{
                echo("pas de type");
                    $imageUploaded=$datamedia['source_media'];
                    $idType_MediaMedia=$datamedia['id_type_media'];

}

    $Media = new Media();
    $resultat = $Media->updateMedia($id,addslashes($titreMedia),$imageUploaded,addslashes($descriptionMedia),$idType_MediaMedia,$visibleMedia);
    if ($resultat) {
        echo("Enregistrement reussie");
    } else {
        echo("Echec d'enregistrement");
    }
    header("Location: ../../views/media/editer.php");
}else{
    echo("vous n'avais pas le droit d'acces a cette page");
}?>