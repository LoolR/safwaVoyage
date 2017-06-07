<?php
require_once '../../module/connection.php';
require_once '../../module/model/Type_Media/Type_Media.php';

$type_media =new Type_Media();

$listType_Media = $type_media->getType_Media();
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
<a href="../../views/media/editer.php">
    <div class="btn btn-primary">Editer les medias</div></a>
    <a href="../../views/media/index.php">
    <div class="btn btn-primary">Actualiser la page</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger">Annuler</div></a>
</div></div>

<div id="form" class="container">
    <form enctype="multipart/form-data" name="mediaForm" action="../../actions/Media/ajouterAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr id="erreurline" class="info">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            <tr id="idtitre" class="info">
                <td>
                    <label>Nom de la media</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="titremedia"/>
                </td>
            </tr>
            <tr id="idlien" class="info">
                <td>
                    <label>Lien</label>
                </td>
                <td>
                    <input type="file" name="lienmedia"/>
                </td>
            </tr>
            <tr id="iddesc" class="info">
                <td>
                    <label>Description</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="descriptionmedia"/>
                </td>
            </tr>
            <tr id="idtype_media" class="info">
            <td>
                <label>Type de Media</label>
            </td>
            <td>
                <select name="idtype_mediamedia">
                    <option value=''>choisir une fomrat</option>
                    <?php
                    while($dataType_Media=$listType_Media->fetch()){
                        echo("<option value='".$dataType_Media["id_type_media"]."'>");
                        echo($dataType_Media["nom_type_media"]);
                        echo("</option>");
                    }
                    ?>
                </select>
            </td>
            </tr>
            <tr class="info">
                <td>
                    <label>Slider ?</label>
                </td>
                <td>
                    <input type="checkbox" name="slider"/>
                </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer media" onclick="valider(mediaForm,'ajoutermedia')" />
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>