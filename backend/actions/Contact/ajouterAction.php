<?php
/**
 * Created by PhpStorm.
 * User: ASUS ROG
 * Date: 10/12/2016
 * Time: 8:50 PM
 */
require_once '../../module/connection.php';
require_once '../../module/model/Contact/Contact.php';

$nom_contact=(isset($_POST{"nom_contact"}))?$_POST{"nom_contact"}:"";
$prenom_contact=(isset($_POST{"prenom_contact"}))?$_POST{"prenom_contact"}:"";
$tel=(isset($_POST{"tel_contact"}))?$_POST{"tel_contact"}:"";
$email=(isset($_POST{"email_contact"}))?$_POST{"email_contact"}:"";
$desc=(isset($_POST{"desc_contact"}))?$_POST{"desc_contact"}:"";

if($nom_contact!=""&&$desc!="") {
    $categorie = new Contact(addslashes($nom_contact),addslashes($prenom_contact),addslashes($tel),addslashes($email),addslashes($desc));
    $resultat = $categorie->saveContact();
    if ($resultat) {
        echo("Enregistrement reussie");

    } else {
        echo("Echec d'enregistrement");
    }
    header('Location: ../../../pages/contact.php');
}else{
    header('Location: ../../../pages/contact.php');
}?>