<?php
require_once '../../module/connection.php';
require_once '../../module/model/User/User.php';

$login=(isset($_POST{"loginuser"}))?$_POST{"loginuser"}:"";
$password=(isset($_POST{"passworduser"}))?$_POST{"passworduser"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";
if($id!=""&&$login!=""&&$password!="") {
    $password=md5($password);
    $categorie = new User();
    $resultat = $categorie->updateUser($id,addslashes($login),addslashes($password));
    if ($resultat) {
        echo("Enregistrement reussie");
    } else {
        echo("Echec d'enregistrement");
    }
    header("Location: ../../views/user/editer.php");
}else{
    echo("vous n'avez pas le droit d'acces a cette page");
}?>