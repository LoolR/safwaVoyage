<?php
require_once '../../module/connection.php';
require_once '../../module/model/Cat_Voyage/Cat_Voyage.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Cat_Voyage();
		$resultat = $model->deleteCat_Voyage($id);
		if($resultat){
			echo("Suppression reussie");
		}else{
			echo("Echec de suppression");
		}
        header("Location: ../../views/cat_voyage/editer.php");

	}else{
		echo("Vous n'avez pas le droit d'acces a cette page !!");
	}
?>