<?php
/**
 * Created by PhpStorm.
 * User: ASUS ROG
 * Date: 10/12/2016
 * Time: 11:23 PM
 */

require_once '../../module/connection.php';
require_once '../../module/model/Contact/Contact.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
        #suppression
        $model = new Contact();
        $resultat = $model->deleteContact($id);
        if($resultat){
            echo("Suppression reussie");
        }else{
            echo("Echec de suppression");
        }
        header("Location: ../../views/contact/editer.php");

    }else{
        echo("Vous n'avez pas le droit d'acces a cette page !!");

    }
?>