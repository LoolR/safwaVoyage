<?php
require_once '../backend/module/connection.php';
require_once '../backend/module/model/Media/Media.php';
require_once '../backend/module/model/Cat_Voyage/Cat_Voyage.php';
require_once '../backend/module/model/Voyage/Voyage.php';
require_once '../backend/module/model/Play_list/Play_list.php';
//require_once 'backend/module/model/Type_Reservation';
    
$id = (isset($_GET["id"])) ? $_GET["id"] : "";

$voyage =new Voyage();
$media =new Media();
$cat =new Cat_Voyage();
$playliste=new Play_list();

$listVoyage =$voyage->getVoyage();
$listMedia = $media->getMedia();
$listCat = $cat->getCat_Voyage();
$listlist = $playliste->getPlay_list();

$playmedia=array();

While ($datalist=$listlist->fetch()){
    if($id == $datalist['id_cat_play']){
        $playmedia= explode(" ",$datalist['media_list']);
        break;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Safwa Voyage</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <script src="../js/jquery-1.12.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>


</head>
<body>
<div id="globale">
    <div id="content" class="container">
        <?php
        require_once 'commun/menu.php';
        ?>
                            <li ><a href="../index.php">Home</a></li>
                            <?php
                              while($dataCat=$listCat->fetch()){

                                echo("<li ");

                                if($dataCat["id_cat_voy"] == $id)
                                {
                                    echo("class=\"active\" ");
                                }

                                echo ("><a href=\"ListeVoyagesParCategorie.php?id=".$dataCat["id_cat_voy"]."\" >");
                                echo($dataCat["nom_cat_voy"]);
                                echo("</a></li>");}
                            ?>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
<!--        <div id="separateur"></div>-->

    <?
    require_once 'commun/corosel.php';
    ?>
<div id="slidercaro" class="well-sm">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox" >
            <?php
            if (!empty($playmedia)){
                $cnt=0;
                while($dataMedia=$listMedia->fetch()){
                    if($dataMedia["id_media"] == $playmedia[$cnt]){
                        if($cnt==0){
                            echo '<div class="item active" >';
                        }else{
                            echo '<div class="item">';
                        }
                        echo '<img src="../image/'.$dataMedia["source_media"].'" alt="Image" /><div class="carousel-caption">';
                        /*echo '<div class="well"><h3>'.$dataMedia["nom_media"].'</h3>';
                        echo '<p>'.$dataMedia["desc_media"].'</p></div></div></div>';*/
                        echo "</div></div>";
                        $cnt++;
                    }
                }
            }else{
                $cnt=0;
                while($dataMedia=$listMedia->fetch()){
                    if($dataMedia["slider_media"]){
                        if($cnt==0){
                            echo '<div class="item active" >';
                        }else{
                            echo '<div class="item">';
                        }
                        echo '<img src="../image/'.$dataMedia["source_media"].'" alt="Image" /><div class="carousel-caption">';
                        /*echo '<div class="well"><h3>'.$dataMedia["nom_media"].'</h3>';
                        echo '<p>'.$dataMedia["desc_media"].'</p></div></div></div>';*/
                        echo "</div></div>";
                        $cnt++;
                    }
                }
            }?>
            <ol class="carousel-indicators">
                <?php
                /*$i=0;
                while($i<$cnt){
                     if($i==0){
                        echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
                      }else{
                        echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
                      }
                      $i++;
                }*/
                ?>
            </ol>



        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>






           <div id="listContainer" class="container-fluid">
            <div class="col-md-9 " >
                <ul class="list-group">
                    <?php
                    while($datavoy=$listVoyage->fetch()){
                        
                        if($datavoy["id_cat_voy"]==$id&&$datavoy["visible_voy"]){
                            $idvoymedia = $datavoy["id_media_voy"];
                            $ilusts = $media->getMedia();
                            while($ilust= $ilusts->fetch()){
                                if($ilust["id_media"] == $idvoymedia)
                                {
                                    $srcimage=$ilust["source_media"];
                                }
                            }
                        echo("<li class='listevoyage well row'>");
                        echo('<div class="col-md-5">');
                        echo('<a href="Voyage_View.php?id='.$id.'&idvoy='.$datavoy["id_voy"].'"><img class="img-rounded" src="../image/'.$srcimage.'" width="100%" height="100%"/></a>');
                        echo('</div><div class="col-md-7">');
                        echo('<a href="Voyage_View.php?id='.$id.'&idvoy='.$datavoy["id_voy"].'"><h2>'.$datavoy["titre_voy"].'</h2></a>');
                            echo('<h3>'.$datavoy["s_titre_voy"].'</h3>');
                            echo('<h3>'.$datavoy["s_titre_voy"].'</h3>');
                            echo('<a href="Voyage_View.php?id='.$id.'&idvoy='.$datavoy["id_voy"].'" class="cadredhs"><p class="dh">DHs</p><h1>'.$datavoy["prix_voy"].'</h1></a>');
                        echo('</div>');
                        echo("</li>");
                            
                        }
                    }
                     ?>
                </ul>
            </div>
            <?php
            include_once 'commun/Pub.php';
            ?>
            </div><br>

<?php
require_once 'commun/footer.php';
?>
    </div>
</div>
</body>
</html>
