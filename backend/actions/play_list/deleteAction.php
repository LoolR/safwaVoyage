<?php
require_once '../../module/connection.php';
require_once '../../module/model/Play_list/Play_list.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Play_list();
		$resultat = $model->deletePlay_list($id);
		if($resultat){
			echo("Suppression reussie");
		}else{
			echo("Echec de suppression");
		}
    	header("Location: ../../views/play_list/editer.php");
	}else{
		echo("Vous n'avez pas le droit d'acces a cette page !!");
		
	}
?>