<?php
   session_start();
   
   if( isset( $_SESSION['username'] ) ) {

require_once '../../module/connection.php';
require_once '../../module/model/Media/Media.php';
require_once '../../module/model/Dest/Dest.php';
require_once '../../module/model/Cat_Voyage/Cat_Voyage.php';
require_once '../../module/model/Voyage/Voyage.php';
$id = (isset($_GET["id"]))?$_GET["id"]:"";



if($id!=""){
    $model = new Voyage();
    $voyage = $model->getVoyage();
    while($data=$voyage->fetch()){
        if($data["id_voy"]==$id){
            break;}}
    $idmedia=$data["id_media_voy"];
    $iddest=$data["id_dest_voy"];
    $idcat=$data["id_cat_voy"];

    $media =new Media();
    $dest =new Dest();
    $cat =new Cat_Voyage();
    $listMedia = $media->getMedia();
    //$datamedia=$listMedia->fetch();
    $listDest = $dest->getDest();
    //$datadest=$listDest->fetch();
    $listCat = $cat->getCat_Voyage();
    //$datacat=$listCat->fetch();



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
            <h1>Voyage</h1>
            <h3>Gestion des voyages</h3>
            <a href='../../logout.php' class="btn btn-danger"><span class="glyphicons glyphicons-log-out"></span> Logout</a>

        </div>
    </div>
</header>

<div class="well container">
    <div class="row">
        <a href="../../views/voyage/index.php">
            <div class="btn btn-primary">Vider le formulaire</div></a>
        <a href="../../views/voyage/editer.php">
            <div class="btn btn-primary">Editer les Voyages</div></a>
            <a href=<?php echo '../../forms/voyage/editerActionForm.php?id='.$id;?>>
    <div class="btn btn-primary">Actualiser la page</div></a>
                    <a href="../../admin/index.php">
<div class="btn btn-danger"> Annuler</div></a>
    </div></div>
<div id="form" class="container">
    <form enctype="multipart/form-data" name="VoyageForm" action="../../actions/Voyage/editerAction.php" method="post">
        <div class="row">
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
                        <input class="form-control" type="text" name="titre_voy" value="<?php echo($data["titre_voy"])?>"/>
                    </td>
                </tr>
                <tr id="idstitre" class="info">
                    <td>
                        <label>Sous-Titre</label>
                    </td>
                    <td>
                        <input class="form-control" type="test" name="s_titre_voyage" value="<?php echo($data["s_titre_voy"])?>"/>
                    </td>
                </tr>
                <tr id="idtext" class="info">
                    <td>
                        <label>Text descriptif</label>
                    </td>
                    <td>
                        <textarea class="form-control" name="text_voy"><?php echo($data["text_voy"])?></textarea>
                    </td>
                </tr>
                <tr id="idinfosup" class="info">
                    <td>
                        <label>Informations Sup</label>
                    </td>
                    <td>
                        <textarea class="form-control" name="infosup"><?php echo($data["infosup"])?></textarea>
                    </td>
                </tr>
                <tr id="iditin" class="info">
                    <td>
                        <label>Itinéraire </label>
                    </td>
                    <td>
                        <textarea class="form-control" name="itin"><?php echo($data["Itineraire"])?></textarea>
                    </td>
                </tr>
                <tr id="idprix" class="info">
                    <td>
                        <label>Prix</label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="prix_voy" value="<?php echo($data["prix_voy"])?>"/>
                    </td>
                </tr>
                <tr id="iddate" class="info">
                    <td>
                        <label>Date de Depart</label>
                    </td>
                    <td>
                        <input class="form-control" type="date" name="date_voy" value="<?php echo($data["date_voy"])?>"/>
                    </td>
                </tr>
                <tr id="idduree" class="info">
                    <td>
                        <label>duree (en jours)</label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="duree_voy" value="<?php echo($data["duree_voy"])?>"/>
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
                                if($dataCat["id_cat_voy"]!=$idcat){
                                    echo("<option value='".$dataCat["id_cat_voy"]."'>");
                                    echo($dataCat["nom_cat_voy"]);
                                    echo("</option>");}
                                else{
                                    echo("<option selected value='".$dataCat["id_cat_voy"]."'>");
                                    echo($dataCat["nom_cat_voy"]);
                                    echo("</option>");
                                }
                            }
                            ?>


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
                                if($dataDest["id_dest"]!=$iddest){
                                    echo("<option value='".$dataDest["id_dest"]."'>");
                                    echo($dataDest["nom_dest"]);
                                    echo("</option>");}
                                else{
                                    echo("<option selected value='".$dataDest["id_dest"]."'>");
                                    echo($dataDest["nom_dest"]);
                                    echo("</option>");
                                }
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
                        <select name="id_media_voy">
                            <option value=''>Choisir Une Image</option>
                            <?php

                            while($dataMedia=$listMedia->fetch()){
                                if($dataMedia["id_media"]!=$idmedia){
                                    echo("<option value='".$dataMedia["id_media"]."'>");
                                    echo($dataMedia["nom_media"]);
                                    echo("</option>");}
                                else{
                                    echo("<option selected value='".$dataMedia["id_media"]."'>");
                                    echo($dataMedia["nom_media"]);
                                    echo("</option>");
                                }
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
                        <input type="checkbox" name="visibleVoyage" value="<?php echo $data["visible_voy"]; ?>"<?php if($data["visible_voy"]){echo" checked";}?>/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input type="hidden" name="id" value="<?php echo $id ?>" />
                        <input class="btn btn-success" type="button"  value="Editer Voyage" onclick="valider(VoyageForm,'ajouterVoyage')"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>
<?php }else{
            echo("vous n'avez pas le droit d'acceder a cette page");

    }

}else {
            header("Location: ../../index.php");
}
?>
