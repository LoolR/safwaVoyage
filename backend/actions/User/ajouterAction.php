<?php
require_once '../../module/connection.php';
require_once '../../module/model/User/User.php';

$login=(isset($_POST{"loginuser"}))?$_POST{"loginuser"}:"";
$password=(isset($_POST{"passworduser"}))?$_POST{"passworduser"}:"";
if($login!=""&&$password!="") {
    $password=md5($password);
    $utilisateur = new User(addslashes($login),addslashes($password));
    
    $resultat = $utilisateur->saveUser();
    
    if ($resultat) {
        echo("Enregistrement reussie");
    } else {
        echo("Echec d'enregistrement");
    }
    header("Location: ../../views/user/editer.php");
}else{
    echo("Vous n'avez pas le droit d'acces a cette page");
}?>