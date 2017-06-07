<?php
require_once 'backend/module/connection.php';
require_once 'backend/module/model/Media/Media.php';
require_once 'backend/module/model/Cat_Voyage/Cat_Voyage.php';
require_once 'backend/module/model/Dest/Dest.php';
//require_once 'backend/module/model/Type_Reservation';

$media =new Media();
$cat =new Cat_Voyage();
$des =new Dest();

$listMedia = $media->getMedia();
$listCat = $cat->getCat_Voyage();
$listdest = $des->getDest();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Safwa Voyage</title>
  <meta charset="ISO-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/jquery-1.12.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


</head>
<body>
<div id="globale">
    <div id="content" class="container">
        <nav id="navbar" class="navbar navbar-inverse navbar-fixed-top">
          <div id="navbar-cont" class="container-fluid">
              <div id="header" class="row">
                  <div class="col-md-4">
                      <img id="logo" src="image/logo-safwa-final.png" width="165px" height="70px">
                  </div>
                  <div id="teldiv" class="col-md-4">
                      <h2 class="tel">Pour plus d'informations</h2>
                      <h3 class="tel">Tel:+212535536263</h3>
                  </div>
                  <div id="titrediv" class="col-md-4">
                      <h2 id="titre">Agence de voyage</h2>
                  </div>
              </div>
              <div id="bardenav" class="well">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Safwa Voyage</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    
                    <?php
                      while($dataCat=$listCat->fetch()){
                        echo("<li><a href=\"pages/Voyage_view.php?id=".$dataCat["id_cat_voy"]."\" >");
                        echo($dataCat["nom_cat_voy"]);
                        echo("</a></li>");}
                    ?>
                    
                    <li><a href="pages/contact.php">Contact</a></li>
                  </ul>
                    <!--<li><a href="#">Omra</a></li>
                    <li><a href="#">Voyager organisé</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span></a></li>
                  </ul>-->
                </div>
              </div>
          </div>
        </nav>
<div id="separateur"></div>
        <div id="slidercaro" class="well-sm">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" >
              
              <?php
              $cnt=0;
              while($dataMedia=$listMedia->fetch()){
                if($dataMedia["slider_media"]){

                    if($cnt==0){

                        echo '<div class="item active" >';

                    }else{
                            echo '<div class="item">';
                    }

                    echo '<img src="image/'.$dataMedia["source_media"].'" alt="Image" /><div class="carousel-caption">';
                    echo '<div class="well"><h3>'.$dataMedia["nom_media"].'</h3>';
                    echo '<p>'.$dataMedia["desc_media"].'</p></div></div></div>';
                    $cnt++;
                  }
              }?>
              <ol class="carousel-indicators">
                <?php
                $i=0;
                while($i<$cnt){
                 if($i==0){
                    echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
                  }else{
                    echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
                  }
                  $i++;
                }
                ?>
            </ol>
              <!--<div class="item active" >
              <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>
              
            
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              
              
                  <img src="image/VOYAGE-EUROPE.jpg" alt="Image" />
                <div class="carousel-caption">
                  <h3>Sell $</h3>
                  <p>Money Money.</p>
                </div>
              </div>

              <div class="item">
                <img src="image/background.jpg" alt="Image" >
                <div class="carousel-caption">
                  <h3>More Sell $</h3>
                  <p>Lorem ipsum...</p>
                </div>
              </div>-->
              
              
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
        <div id="presentation" class="container text-center">

            <div id="collections" class="col-md-10 well-sm">
                <ul class="nav nav-tabs">
                    <li><h3><a role="button" data-toggle = "collapse" data-parent = "#accordion" href = "#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Nos Destinations
                        </a></h3></li>

<!--                     data-toggle="collapse" data-parent="#accordion" href="#collapseOne"  "-->

                    <li><h3><a role="button" data-toggle = "collapse" data-parent = "#accordion" href = "#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                            Nos Destinations1
                        </a></h3></li>
                </ul>
                <div id="accordion" >
                    <div id = "collapseOne" class = "panel-collapse collapse in">
                        <div class = "panel-body">
                            <?php
                                $i=1;
                                while($dataDest=$listdest->fetch()){
                                    $listMedia = $media->getMedia();
                                        while($destMedia=$listMedia->fetch()){
                                            if($destMedia['id_media']==$dataDest['id_media_dest']){
                                                break;
                                            }
                                        }
                                    if($i){
                                        echo '<div class="row">';
                                        echo  '<div class="col-md-6">';
                                        echo '<a href="#"><img src="image/'.$destMedia["source_media"].'" class="img-responsive"  style="height:300px; width:100%" alt="Image"></a>';
                                        echo '<h4 class="dest_ilus">'.$dataDest["nom_dest"].'</h4>';
                                        echo '</div>';
                                        $i=0;
                                    }else{
                                        echo '<div class="col-md-6">';
                                        echo '<a href="#"><img src="image/'.$destMedia["source_media"].'" class="img-responsive" style="height:300px; width:100%" alt="Image"></a>';
                                        echo '<h4 class="dest_ilus">'.$dataDest["nom_dest"].'</h4>';
                                        echo '</div>';
                                        echo '</div>';
                                        $i=1;
                                    }
                                }
                                if($i==0){
                                    echo '</div>';
                                }
                            ?>
                            </div>
                    </div>
                    <!--<div id = "collapsetwo" class = "panel-collapse collapse">
                        <div class = "panel-body">
                           <p>text text text</p>
                        </div>
                    </div>-->
                </div>
            </div>

            <div id="pub" class="col-md-2 ">
                <div class="well">
                    <p>Some text..</p>
                </div>
                <div class="well">
                    <p>Some text..</p>
                </div>
                <div class="well">
                    <p>Some text..</p>
                </div>
          </div>

        </div><br>
        <footer class="container-fluid text-center">
          <p>Footer Text</p>
        </footer>
    </div>
</div>
</body>
</html>
