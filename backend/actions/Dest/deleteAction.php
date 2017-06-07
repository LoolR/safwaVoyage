<?php
require_once '../../module/connection.php';
require_once '../../module/model/Dest/Dest.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Dest();
		$resultat = $model->deleteDest($id);
		if($resultat){
			echo("Suppression reussie");
		}else{
			echo("Echec de suppression");
		}
    	header("Location: ../../views/dest/editer.php");
		
	}else{
		echo("Vous n'avez pas le droit d'acces a cette page !!");
		
	}
?>