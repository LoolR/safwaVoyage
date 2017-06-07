

<?php
session_start();

if( isset( $_SESSION['username'] ) ) {
require_once '../../module/connection.php';
require_once '../../module/model/Media/Media.php';
require_once '../../module/model/Dest/Dest.php';
require_once '../../module/model/Cat_Voyage/Cat_Voyage.php';
require_once '../../module/model/Voyage/Voyage.php';
require_once '../../module/model/Play_list/Play_list.php';

$id = (isset($_GET["id"]))?$_GET["id"]:"";

$media =new Media();
$dest =new Dest();
$cat =new Cat_Voyage();
$voy =new Voyage();
$list = new Play_list();

$listMedia = $media->getMedia();
$listDest = $dest->getDest();
$listCat = $cat->getCat_Voyage();
$listvoy = $voy->getVoyage();

$listListplay = $list->getPlay_list();
    while($data=$listListplay->fetch()){
        if($data["id_play_list"]==$id){
            break;}}
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../../admin/css/bootstrap.css" rel="stylesheet" type="text/css" >
    <link href="../../admin/css/style.css" rel="stylesheet" type="text/css" >
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>gestion safwa</title>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
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
<header>
    <div class="jumbotron">
        <div class="container">
            <h1>Play Lists</h1>
            <h3>Editeur des Play Lists</h3>
            <a href='../../logout.php' class="btn btn-danger"><span class="glyphicons glyphicons-log-out"></span> Logout</a>
        </div>
    </div>
</header>


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
                        <input class="form-control" type="text" name="name_play_list" value="<?php echo $data['name_play_list'];?>"/>
                    </td>
                </tr>
                <tr id="description_play_list" class="info">
                    <td>
                        <label>Description</label>
                    </td>

                    <td>
                        <textarea class="form-control" name="desc_play_list"><?php echo $data['desc_play_list'];?></textarea>
                    </td>
                </tr>
                <tr id="choice_play_list" class="info">
                    <td>
                        <label>play list de :</label>
                    </td>
                    <td>
                        <input type="radio" name="selectplsylist" value="1" id="radioDest" <?php if($data['id_dest_play']!="0") echo 'checked'; else echo '';?> >Destination<br>
                        <input type="radio" name="selectplsylist" value="0" id="radioVoy" <?php if($data['id_voy_play']!="0") echo 'checked'; else echo '';?> >Voyage<br>
                        <input type="radio" name="selectplsylist" value="2" id="radioCat" <?php if($data['id_cat_play']!="0") echo 'checked'; else echo '';?> >Categorie Voyager<br>

                        <select id="selectcat" name="id_cat_voy" <?php if($data['id_cat_play']!="0") echo ''; else echo 'hidden';?> >
                            <option value=''>Choisir Une Categorie</option>
                            <?php
                            $idcat=$data['id_cat_play'];
                            while($dataCat=$listCat->fetch()){
                                if($dataCat["id_cat_voy"]!=$idcat){
                                    echo("<option value='".$dataCat["id_cat_voy"]."'>");
                                }
                                else{
                                    echo("<option selected value='".$dataCat["id_cat_voy"]."'>");
                                }
                                echo($dataCat["nom_cat_voy"]);
                                echo("</option>");
                            }
                            ?>
                        </select>
                        <select id="selectdest" name="id_dest" <?php if($data['id_dest_play']!="0") echo ''; else echo 'hidden';?> >
                            <option value=''>Choisir Une Destination</option>
                            <?php
                            $iddest=$data['id_dest_play'];
                            while($dataDest=$listDest->fetch()){
                                if($dataCat["id_dest"]!=$iddest) {
                                    echo("<option value='" . $dataDest["id_dest"] . "'>");
                                }
                                else{
                                    echo("<option selected value='".$dataCat["id_dest"]."'>");
                                }
                                echo($dataDest["nom_dest"]);
                                echo("</option>");
                            }
                            ?>
                        </select>
                        <select id="selectvoy" name="id_voy" <?php if($data['id_voy_play']!="0") echo ''; else echo 'hidden';?> >
                            <option value=''>Choisir Un Voyage</option>
                            <?php
                            $idvoy=$data['id_voy_play'];
                            while($datavoy=$listvoy->fetch()){
                                if($datavoy['id_voy']!=$idvoy) {
                                    echo("<option value='" . $datavoy["id_voy"] . "'>");
                                }
                                else{
                                    echo("<option selected value='" . $datavoy["id_voy"] . "'>");
                                }
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
                        $idsmedia = $data['media_list'];
                        $idss=array();
                        $unid=0;
                        $j=0;
                        $desimal=1;
                        for ( $i=strlen($idsmedia)-1; $i >=0 ; $i--){
//                            echo $idsmedia[$i];
                            if($idsmedia[$i]==' '&& $i!=strlen($idsmedia)-1){
                                $desimal=1;
                                array_push($idss,$unid);
                                $unid=0;
                            }
                            else if($idsmedia[$i]!=' '){
                                $unid+=$idsmedia[$i] * $desimal;
                                $desimal*=10;
                            }
                        }
                        array_push($idss,$unid);
                        sort($idss);
                        $j=0;
                        while($dataMedia=$listMedia->fetch()){
                        if($j<count($idss)){
                        if($dataMedia["id_media"]==$idss[$j]){
                        echo("<input type='checkbox' name='media[]' value='".$dataMedia["id_media"]."' checked >");
                        $j++;
                        }else{
                        echo("<input type='checkbox' name='media[]' value='".$dataMedia["id_media"]."'>");
                        }
                        }
                        else{
                        echo("<input type='checkbox' name='media[]' value='".$dataMedia["id_media"]."'>");
                        }
                        echo($dataMedia["nom_media"]);
                        echo("<br>");
                        }
                        ?>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input type="hidden" name="id" value="<?php echo $id ?>" />
                        <input class="btn btn-success" type="button"  value="Creer play list" onclick="valider(play_listForm,'ajouterplay_list')" />
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>
<?php
}else {
    header("Location: ../../index.php");
}
?>
