<?php
require_once '../../module/connection.php';
require_once '../../module/model/Play_list/Play_list.php';
require_once '../../module/model/Dest/Dest.php';
require_once '../../module/model/Cat_Voyage/Cat_Voyage.php';

$media =new Play_list();
$dest =new Dest();
$cat =new Cat_Voyage();

$listMedia = $media->getPlay_list();
$listDest = $dest->getDest();
$listCat = $cat->getCat_Voyage();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../../admin/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../../admin/css/style.css" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Insert title here</title>
    <script language="javascript" src="../../js/validation.js"></script>
</head>
<body>
<div class="container">
    <div class="well row">
    <a href="../../views/voyage/index.php">
    <div class="btn btn-primary">Vider le formulaire</div></a>
<a href="../../views/voyage/editer.php">
    <div class="btn btn-primary">Editer les Voyages</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class=" container">
    <form enctype="multipart/form-data" name="VoyageForm" action="../../actions/Voyage/ajouterAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr id="erreurline" class="info">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            <tr id="idtitre" class="info">
                <td>
                    <label>Titre</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="titre_voy"/>
                </td>
            </tr>
            <tr id="idstitre" class="info">
                <td>
                    <label>Sous-Titre</label>
                </td>
                <td>
                    <input class="form-control" type="test" name="s_titre_voyage"/>
                </td>
            </tr>
            <tr id="idtext" class="info">
                <td>
                    <label>Text descriptif</label>
                </td>
                <td>
                    <textarea class="form-control" name="text_voy"></textarea>
                </td>
            </tr>
            <tr id="idinfosup" class="info">
                <td>
                    <label>Informations Sup</label>
                </td>
                <td>
                    <textarea class="form-control" name="infosup"></textarea>
                </td>
            </tr>
            <tr id="iditin" class="info">
                <td>
                    <label>Itinéraire </label>
                </td>
                <td>
                    <textarea class="form-control" name="itin"></textarea>
                </td>
            </tr>
            <tr id="idprix" class="info">
                <td>
                    <label>Prix</label>
                </td>
                <td>
                    <input class="form-control" type="number" name="prix_voy"/>
                </td>
            </tr>
            <tr id="iddate" class="info">
                <td>
                    <label>Date de Depart</label>
                </td>
                <td>
                    <input class="form-control" type="date" name="date_voy"/>
                </td>
            </tr>
            <tr id="idduree" class="info">
                <td>
                    <label>duree (en Jours)</label>
                </td>
                <td>
                    <input class="form-control" type="number" name="duree_voy"/>
                </td>
            </tr>
            <tr id="idcat" class="info">
            <td>
                <label>Categorie du Voyage</label>
            </td>
            <td>
                <select name="id_cat_voy">
                    <option value=''>Choisir Une Categorie</option>
                    <?php
                    while($dataCat=$listCat->fetch()){
                        echo("<option value='".$dataCat["id_cat_voy"]."'>");
                        echo($dataCat["nom_cat_voy"]);
                        echo("</option>");
                    }
                    ?>
                </select>
            </td>
            </tr>

            <tr id="iddest" class="info">
            <td>
                <label>Destination</label>
            </td>
            <td>
                <select name="id_dest">
                    <option value=''>Choisir Une Destination</option>
                    <?php
                    while($dataDest=$listDest->fetch()){
                        echo("<option value='".$dataDest["id_dest"]."'>");
                        echo($dataDest["nom_dest"]);
                        echo("</option>");
                    }
                    ?>
                </select>
            </td>
            </tr>

            <tr id="idmedia" class="info">
            <td>
                <label>Play list</label>
            </td>
            <td>
                <select name="id_media_voy">
                    <option value=''>Choisir Une play list</option>
                    <?php
                    while($dataMedia=$listMedia->fetch()){
                        echo("<option value='".$dataMedia["id_play_list"]."'>");
                        echo($dataMedia["name_play_list"]);
                        echo("</option>");
                    }
                    ?>
                </select>
            </td>
            </tr>
            <tr class="info">
                <td>
                    <label>Publier ?</label>
                </td>
                <td>
                    <input type="checkbox" name="visibleVoyage"/>
                </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer Voyage" onclick="valider(VoyageForm,'ajouterVoyage')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>
