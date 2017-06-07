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
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>

    <!-- Start Top Bar -->

        <div class="top-bar">
          <div class="top-bar-left">
            <ul class="menu">
              <li class="menu-text"><img id="logo" src="image/logo-safwa-final.png" height="70px" width="165px" ></li>
              <li class="active"><a href="#">Home</a></li>
              <?php
              while($dataCat=$listCat->fetch()){
                echo("<li><a href=\"pages/Voyage_view.php?id=".$dataCat["id_cat_voy"]."\" >");
                echo($dataCat["nom_cat_voy"]);
                echo("</a></li>");}
              ?>
              <li><a href="page/contact.php">Contact</a></li>
            </ul>
          </div>
          <div class="top-bar-right">
            <ul class="menu">
              <li class="menu-text"><h2> Safwa Voyage </h2></li>
            </ul>
          </div>
      </div>



<!--     End Top Bar -->


    <div id="slider" class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
      <ul class="orbit-container">
        <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
        <button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
<!--        <li class="orbit-slide is-active">-->
<!--          <img src="http://placehold.it/2000x750">-->
<!--        </li>-->
<!--        <li class="orbit-slide">-->
<!--          <img src="http://placehold.it/2000x750">-->
<!--        </li>-->
        <?php
        $cnt=0;
        while($dataMedia=$listMedia->fetch()){
          if($dataMedia["slider_media"]){
            if($cnt==0){
              echo '<li class="orbit-slide is-active" >';
              $cnt++;
            }else{
              echo '<li class="orbit-slide">';}
            echo '<img src="image/'.$dataMedia["source_media"].'" alt="Image" height="100px" width="100%" />';
            #echo '<h3>'.$dataMedia["nom_media"].'</h3>';
            #echo '<p>'.$dataMedia["desc_media"].'</p></li></div>';
            echo '</li>';

          }}?>
      </ul>
    </div>

    <div class="row column text-center">
      <h2>Our Newest Products</h2>
      <hr>
    </div>

    <div class="row small-up-2 large-up-4">
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/300x400">
        <h5>Nulla At Nulla Justo, Eget</h5>
        <p>$400</p>
        <a href="#" class="button expanded">Buy</a>
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/300x400">
        <h5>Nulla At Nulla Justo, Eget</h5>
        <p>$400</p>
        <a href="#" class="button expanded">Buy</a>
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/300x400">
        <h5>Nulla At Nulla Justo, Eget</h5>
        <p>$400</p>
        <a href="#" class="button expanded">Buy</a>
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/300x400">
        <h5>Nulla At Nulla Justo, Eget</h5>
        <p>$400</p>
        <a href="#" class="button expanded">Buy</a>
      </div>
    </div>

    <hr>

    <div class="row column">
      <div class="callout primary">
        <h3>Really big special this week on items.</h3>
      </div>
    </div>

    <hr>

    <div class="row column text-center">
      <h2>Some Other Neat Products</h2>
      <hr>
    </div>

    <div class="row small-up-2 medium-up-3 large-up-6">
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/300x400">
        <h5>Nulla At Nulla Justo, Eget</h5>
        <p>$400</p>
        <a href="#" class="button small expanded hollow">Buy</a>
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/300x400">
        <h5>Nulla At Nulla Justo, Eget</h5>
        <p>$400</p>
        <a href="#" class="button small expanded hollow">Buy</a>
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/300x400">
        <h5>Nulla At Nulla Justo, Eget</h5>
        <p>$400</p>
        <a href="#" class="button small expanded hollow">Buy</a>
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/300x400">
        <h5>Nulla At Nulla Justo, Eget</h5>
        <p>$400</p>
        <a href="#" class="button small expanded hollow">Buy</a>
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/300x400">
        <h5>Nulla At Nulla Justo, Eget</h5>
        <p>$400</p>
        <a href="#" class="button small expanded hollow">Buy</a>
      </div>
      <div class="column">
        <img class="thumbnail" src="http://placehold.it/300x400">
        <h5>Nulla At Nulla Justo, Eget</h5>
        <p>$400</p>
        <a href="#" class="button small expanded hollow">Buy</a>
      </div>
    </div>

    <hr>
    <div class="row">
      <div class="medium-4 columns">
        <h4>Top Products</h4>
        <div class="media-object">
          <div class="media-object-section">
            <img class="thumbnail" src="http://placehold.it/100x100">
          </div>
          <div class="media-object-section">
            <h5>Nunc Eu Ullamcorper Orci</h5>
            <p>Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque.</p>
          </div>
        </div>
        <div class="media-object">
          <div class="media-object-section">
            <img class="thumbnail" src="http://placehold.it/100x100">
          </div>
          <div class="media-object-section">
            <h5>Nunc Eu Ullamcorper Orci</h5>
            <p>Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque.</p>
          </div>
        </div>
        <div class="media-object">
          <div class="media-object-section">
            <img class="thumbnail" src="http://placehold.it/100x100">
          </div>
          <div class="media-object-section">
            <h5>Nunc Eu Ullamcorper Orci</h5>
            <p>Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque.</p>
          </div>
        </div>
      </div>
      <div class="medium-4 columns">
        <h4>Top Products</h4>
        <div class="media-object">
          <div class="media-object-section">
            <img class="thumbnail" src="http://placehold.it/100x100">
          </div>
          <div class="media-object-section">
            <h5>Nunc Eu Ullamcorper Orci</h5>
            <p>Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque.</p>
          </div>
        </div>
        <div class="media-object">
          <div class="media-object-section">
            <img class="thumbnail" src="http://placehold.it/100x100">
          </div>
          <div class="media-object-section">
            <h5>Nunc Eu Ullamcorper Orci</h5>
            <p>Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque.</p>
          </div>
        </div>
        <div class="media-object">
          <div class="media-object-section">
            <img class="thumbnail" src="http://placehold.it/100x100">
          </div>
          <div class="media-object-section">
            <h5>Nunc Eu Ullamcorper Orci</h5>
            <p>Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque.</p>
          </div>
        </div>
      </div>
      <div class="medium-4 columns">
        <h4>Top Products</h4>
        <div class="media-object">
          <div class="media-object-section">
            <img class="thumbnail" src="http://placehold.it/100x100">
          </div>
          <div class="media-object-section">
            <h5>Nunc Eu Ullamcorper Orci</h5>
            <p>Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque.</p>
          </div>
        </div>
        <div class="media-object">
          <div class="media-object-section">
            <img class="thumbnail" src="http://placehold.it/100x100">
          </div>
          <div class="media-object-section">
            <h5>Nunc Eu Ullamcorper Orci</h5>
            <p>Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque.</p>
          </div>
        </div>
        <div class="media-object">
          <div class="media-object-section">
            <img class="thumbnail" src="http://placehold.it/100x100">
          </div>
          <div class="media-object-section">
            <h5>Nunc Eu Ullamcorper Orci</h5>
            <p>Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="callout large secondary">
      <div class="row">
        <div class="large-4 columns">
          <h5>Vivamus Hendrerit Arcu Sed Erat Molestie</h5>
          <p>Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit.</p>
        </div>
        <div class="large-3 large-offset-2 columns">
          <ul class="menu vertical">
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
          </ul>
        </div>
        <div class="large-3 columns">
          <ul class="menu vertical">
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
          </ul>
        </div>
      </div>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
