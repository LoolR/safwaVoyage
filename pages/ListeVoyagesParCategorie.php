<?php
require_once '../backend/module/connection.php';
require_once '../backend/module/model/Media/Media.php';
require_once '../backend/module/model/Cat_Voyage/Cat_Voyage.php';
require_once '../backend/module/model/Voyage/Voyage.php';
//require_once 'backend/module/model/Type_Reservation';
    
$id = (isset($_GET["id"])) ? $_GET["id"] : "";

$voyage =new Voyage();
$media =new Media();
$cat =new Cat_Voyage();

$listVoyage =$voyage->getVoyage();
$listMedia = $media->getMedia();
$listCat = $cat->getCat_Voyage();

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

                                echo ("><a href=\"Voyage_view.php?id=".$dataCat["id_cat_voy"]."\" >");
                                echo($dataCat["nom_cat_voy"]);
                                echo("</a></li>");}
                            ?>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div id="separateur"></div>
           <div class="container-fluid">
            <div class="col-md-10 " >
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
                        echo('<a href="presentation.php?id='.$id.'&idvoy='.$datavoy["id_voy"].'"><img class="img-rounded" src="../image/'.$srcimage.'" width="100%" height="100%"/></a>');
                        echo('</div><div class="col-md-7">');
                        echo('<a href="presentation.php?id='.$id.'&idvoy='.$datavoy["id_voy"].'"><h2>'.$datavoy["titre_voy"].'</h2></a>');
                            echo('<h3>'.$datavoy["s_titre_voy"].'</h3>');
                            echo('<h3>'.$datavoy["s_titre_voy"].'</h3>');
                            echo('<a href="presentation.php?id='.$id.'&idvoy='.$datavoy["id_voy"].'" class="cadredhs"><p class="dh">DHs</p><h1>'.$datavoy["prix_voy"].'</h1></a>');
                        echo('</div>');
                        echo("</li>");
                            
                        }
                    }
                     ?>
                </ul>
            </div>
            <div class="col-md-2">
                <div class="well">
                 <p>Some text..</p>
                </div>
                <div class="well">
                   <p>Some text..</p>
                </div>
            </div>
            </div><br>

<?php
require_once 'commun/footer.php';
?>
    </div>
</div>
</body>
</html>
