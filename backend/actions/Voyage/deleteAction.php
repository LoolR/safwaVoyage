<?php
require_once '../../module/connection.php';
require_once '../../module/model/Voyage/Voyage.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Voyage();
		$resultat = $model->deleteVoyage($id);
		if($resultat){
			echo("Suppression reussie");
		}else{
			echo("Echec de suppression");
		}
    	header("Location: ../../views/voyage/editer.php");
	}else{
		echo("Vous n'avez pas le droit d'acces a cette page !!");
		
	}
?>