<?php
require_once '../../module/connection.php';
require_once '../../module/model/Media/Media.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";
    
	if($id!=""){
		#suppression
		$model = new Media();
        $listmedia = $model->getMedia();
        while($datamedia=$listmedia->fetch()) {
            if ($datamedia["id_media"] . "" == $id) {
                $lien = (string)$datamedia["source_media"];
                break;
            }
        }
        $resultat = $model->deleteMedia($id);
		if($resultat){
			echo("Suppression reussie de la base de donnee<br/>");
			    $dossier = '../../../image/';
	
            if(unlink($dossier.$lien)){
                echo("fichier suprimer avec succe<br/>");
            }else{
                echo("fichier non suprimer<br/>");
            }
        }else{
			echo("Echec de suppression<br/>");
		}
        header("Location: ../../views/media/editer.php");
	}else{
		echo("Vous n'avais pas le droit d'acces a cette page !!");
		
	}
?>