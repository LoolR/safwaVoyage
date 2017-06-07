<?php
require_once '../backend/module/connection.php';
require_once '../backend/module/model/Media/Media.php';
require_once '../backend/module/model/Voyage/Voyage.php';
require_once '../backend/module/model/Cat_Voyage/Cat_Voyage.php';

//require_once 'backend/module/model/Type_Reservation';
    
$id = (isset($_GET["id"]))?$_GET["id"]:"";
$idvoy = (isset($_GET["idvoy"]))?$_GET["idvoy"]:"";

$voyage =new Voyage();
$media =new Media();
$cat =new Cat_Voyage();


$listCat = $cat->getCat_Voyage();
$listVoyage =$voyage->getVoyage();
$listMedia = $media->getMedia();


    while($datavoy=$listVoyage->fetch()){
        if($datavoy["id_voy"]==$idvoy){
            break;}}
$idvoymedia=$datavoy['id_media_voy'];
$listMedia = $media->getMedia();
    while($ilust= $listMedia->fetch()){
        if($ilust["id_media"] == $idvoymedia){
            $srcimage=$ilust["source_media"];break;
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Safwa Voyage</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
        <script src="../js/reservation.js"></script>
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
                        if($dataCat["id_cat_voy"] == $id){echo("class=\"active\" ");}
                        echo ("><a href=\"Voyage_view.php?id=".$dataCat["id_cat_voy"]."\" >");
                        echo($dataCat["nom_cat_voy"]);
                        echo("</a></li>");}
                    ?>
                    
                    <li><a href="contact.php">Contact</a></li>
                  </ul>
                   <div></div>
                </div>
              </div>
          </div>
        </nav>
        <div id="separateur"></div>

        <div class="container-fluid">
           <div class="col-md-10 well">
              <?php
                echo ("<h1 class='text-success'>".$datavoy['titre_voy']."</h1>");
                echo ("<h2 class='text-danger'>".$datavoy['s_titre_voy']."</h2>");
                echo ('<img class="img-rounded" src="../image/'.$srcimage.'" width="100%" height="500px"/>');
                echo ('<p id="text_page">'.$datavoy['text_voy'].'</p>');
                echo ('<a href="#" onclick="aproposde('.$id.','.$idvoy.')" class="btn btn-success" role="button">Reserver</a>');
              ?>
            </div>
            
            <div class="col-md-2">
              <div class="well">
                 <p>Some text..</p>
                </div>
                <div class="well">
                   <p>Some text..</p>
                </div>
            </div>
            </div>
            <br>

<?php
require_once 'commun/footer.php';
?>
    </div>
</div>
</body>
</html>
