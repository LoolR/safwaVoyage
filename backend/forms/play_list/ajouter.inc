<?php
require_once '../../module/connection.php';
require_once '../../module/model/Media/Media.php';
require_once '../../module/model/Dest/Dest.php';
require_once '../../module/model/Cat_Voyage/Cat_Voyage.php';
require_once '../../module/model/Voyage/Voyage.php';


$media =new Media();
$dest =new Dest();
$cat =new Cat_Voyage();
$voy =new Voyage();

$listMedia = $media->getMedia();
$listDest = $dest->getDest();
$listCat = $cat->getCat_Voyage();
$listvoy = $voy->getVoyage();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../../admin/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../../admin/css/style.css" rel="stylesheet" type="text/css" >
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Insert title here</title>
    <script language="javascript" src="../../js/validation.js"></script>
    <script language="javascript" src="../../../js/jquery-2.1.4.js"></script>
    <script>
        $(document).ready(function(){
            $("#radioVoy").click(function(){
                $("#selectvoy").show();
                $("#selectdest").hide();
                $("#selectcat").hide();
            });
            $("#radioCat").click(function(){
                $("#selectvoy").hide();
                $("#selectdest").hide();
                $("#selectcat").show();
            });
            $("#radioDest").click(function(){
                $("#selectvoy").hide();
                $("#selectdest").show();
                $("#selectcat").hide();
            });

        });
    </script>
</head>
<body>
<div class="container">
    <div class="well row">
<a href="../../views/play_list/editer.php">
    <div class="btn btn-primary">Editer les Play Liste</div></a>
    <a href="../../views/play_list/index.php">
    <div class="btn btn-primary">Actualiser la page</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class=" container">
    <form enctype="multipart/form-data" name="play_listForm" action="../../actions/play_list/ajouterAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr id="erreurline" class="info">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>

            <tr id="nom_play_list" class="info">
                <td>
                    <label>nom</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="name_play_list"/>
                </td>
            </tr>
            <tr id="description_play_list" class="info">
                <td>
                    <label>Description</label>
                </td>
                
                <td>
                    <textarea class="form-control" name="desc_play_list"></textarea>
                </td>
            </tr>
            <tr id="choice_play_list" class="info">
            <td>
                <label>play list de :</label>
            </td>
            <td>
                <input type="radio" name="selectplsylist" value="1" id="radioDest" checked >Destination<br>
                <input type="radio" name="selectplsylist" value="0" id="radioVoy">Voyage<br>
                <input type="radio" name="selectplsylist" value="2" id="radioCat">Categorie Voyager<br>

<!--                <select name="choix">-->
<!--                                <option value="0"  selected="selected" >Voyage </option>-->
<!--                                <option value="1">Destination </option>-->
<!--                                <option value="2">Categorie Voyage </option>-->
<!---->
<!--                </select>-->
                <select id="selectcat" name="id_cat_voy" hidden>
                    <option value=''>Choisir Une Categorie</option>
                    <?php
                    while($dataCat=$listCat->fetch()){
                        echo("<option value='".$dataCat["id_cat_voy"]."'>");
                        echo($dataCat["nom_cat_voy"]);
                        echo("</option>");
                    }
                    ?>
                </select>
                <select id="selectdest" name="id_dest">
                    <option value=''>Choisir Une Destination</option>
                    <?php
                    while($dataDest=$listDest->fetch()){
                        echo("<option value='".$dataDest["id_dest"]."'>");
                        echo($dataDest["nom_dest"]);
                        echo("</option>");
                    }
                    ?>
                </select>
                <select id="selectvoy" name="id_voy" hidden>
                    <option value=''>Choisir Un Voyage</option>
                    <?php
                    while($datavoy=$listvoy->fetch()){
                        echo("<option value='".$datavoy["id_voy"]."'>");
                        echo($datavoy["titre_voy"]);
                        echo("</option>");
                    }
                    ?>
                </select>
            </td>
            </tr>
            <tr id="idmedia" class="info">
            <td>
                <label>Media</label>
            </td>
            <td>

                    <?php
                    while($dataMedia=$listMedia->fetch()){
                        echo("<input type='checkbox' name='media[]' value='".$dataMedia["id_media"]."'>");
                        echo($dataMedia["nom_media"]);
                        echo("<br>");
                    }
                    ?>
            </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer play list" onclick="valider(play_listForm,'ajouterplay_list')" />
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>
