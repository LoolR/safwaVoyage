<?php
   session_start();
   
   if( isset( $_SESSION['username'] ) ) {
   ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>gestion safwa</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body>
    
      <div id="entete" class="jumbotron">
        <div class="container">
          <h1>Bienvenu <?php echo $_SESSION['username'];?>  dans le panel de gestion de Safwa Voyage</h1>
          <a href='../logout.php' class="btn btn-danger"><span class="glyphicons glyphicons-log-out"></span> Logout</a>
        </div>
      </div>
<div id="global" class="container-fluid">
      <div id="cont" class="well container">
              <div class="row">
                <h2>Panel de Gestion</h2>
              </div>
              <div class="row">
                <h4 class="titre col-md-3">Gestion des Voyages:</h4>
                <a href="../views/voyage/index.php" type="button" class="col-md-3 btn">Voyages</a>
                <a href="../views/cat_voyage/index.php" type="button" class="col-md-3 btn">Categorie de Voyage</a>
                <a href="../views/dest/index.php" type="button" class="col-md-3 btn">Destination</a>
              </div>
              <div class="row">
                <h4 class="titre col-md-3">Gestion des Mediatheque:</h4>
                  <a href="../views/media/index.php" type="button" class="col-md-3 btn">Mediatheque</a>
                  <a href="../views/type_media/index.php" type="button" class="col-md-3 btn">Type Media</a>
                  <a href="../views/play_list/index.php" type="button" class="col-md-3 btn">Play Lists</a>
              </div>
              <div class="row">
                <h4 class="titre col-md-3">Gestion des Utilisateurs:</h4>
                <a href="../views/user/index.php" type="button" class="col-md-3 btn">Utilisateurs</a>
                  <a href="../views/contact/index.php" type="button" class="col-md-3 btn">Contact</a>
              </div>
              <!--<div class="row">
                <h4 class="titre col-md-3">Gestion des Hotels:</h4>
                <a href="#" type="button" class="col-md-3 btn">Hotel</a>
              </div>-->
              <!--<div class="row">
                <h4 class="titre col-md-3">Gestion des Reservation:</h4>
                <a href="#" type="button" class="col-md-3 btn">Reservation</a>
                <a href="#" type="button" class="col-md-3 btn">Type de Reservation</a>
                <a href="#" type="button" class="col-md-3 btn">Billet</a>
              </div>-->
      </div>
    </div>
  </body>
</html>
<?php
}else {
            header("Location: ../index.php");
}
?>