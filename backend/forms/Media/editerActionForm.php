<?php
  session_start();
   
   if( isset( $_SESSION['username'] ) ) {

require_once '../../module/connection.php';
require_once '../../module/model/Type_Media/Type_Media.php';
require_once '../../module/model/Media/Media.php';

$type_media =new Type_Media();

$listType_Media = $type_media->getType_Media();


$id = (isset($_GET["id"]))?$_GET["id"]:"";

 if($id!=''){
    
    $model= new Media();
    $categorie = $model->getMedia();
    while($data=$categorie->fetch()){
        if($data["id_media"]==$id){
            break;}}
        $idtypemedia=$data["id_type_media"];
        
    
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
    <header>
            <div class="jumbotron">
                <div class="container">
                    <h1>Mediatheque</h1>
                    <h3>Editeur de la Mediatheque</h3>
                    <a href='../../logout.php' class="btn btn-danger"><span class="glyphicons glyphicons-log-out"></span> Logout</a>

                </div>
            </div>
        </header>
<div class="container">
    <div class="well row">
<a href="../../views/media/editer.php">
    <div class="btn btn-primary">Editer les medias</div></a>
    <a href="../../views/media/index.php">
    <div class="btn btn-primary">Ajouter un element a la Mediatheque</div></a>
    <a href=<?php echo '../../forms/Media/editerActionForm.php?id='.$id;?>>
    <div class="btn btn-primary">Actualiser la page</div></a>
    <a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>

<div id="form" class="container">
    <form enctype="multipart/form-data" name="mediaForm" action="../../actions/Media/editerAction.php" method="post">
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
                    <input class="form-control" type="text" name="titremedia" value="<?php echo($data["nom_media"])?>"/>
                </td>
            </tr>
            <tr id="idlien" class="info" >
                <td>
                    <label>Lien</label>
                </td>
                <td>
                    <input type="file" name="modifierlienmedia" value="<?php echo($data["source_media"])?>"/>
                </td>
            </tr>
            <tr id="iddesc" class="info">
                <td>
                    <label>Description</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="descriptionmedia" value="<?php echo($data["desc_media"])?>"/>
                </td>
            </tr>
            <tr id="idtype_media" class="info">
            <td>
                <label>Type de Media</label>
            </td>
            <td>
                <select name="idtype_mediamedia">
                    <option value=''>choisir un format</option>
                    <?php

                            while($dataType_Media=$listType_Media->fetch()){
                                if($dataType_Media["id_type_media"]==$idtypemedia){
                                    echo("<option selected value='".$dataType_Media["id_type_media"]."'>");
                                    echo($dataType_Media["nom_type_media"]);
                                    echo("</option>");}
                                else{
                                    echo("<option value='".$dataType_Media["id_type_media"]."'>");
                                    echo($dataType_Media["nom_type_media"]);
                                    echo("</option>");
                                }
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
                    <input type="checkbox" name="slider" value="<?php echo $data["slider_media"]; ?>"<?php if($data["slider_media"]){echo" checked";}?> />
                </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <input class="btn btn-success" type="button"  value="Creer media" onclick="valider(mediaForm,'editermedia')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>
<?php
     
 }else{
            echo("vous n'avez pas le droit d'acceder a cette page");

    }
   }else {
            header("Location: ../../index.php");
}
?>