<?php
   session_start();
   
   if( isset( $_SESSION['username'] ) ) {
   ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
    <head>
        <link href="../../admin/css/bootstrap.css" rel="stylesheet" type="text/css" >
        <link href="../../admin/css/style.css" rel="stylesheet" type="text/css" >
        <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
        <title>gestion safwa</title>
    </head>
    <body>
        <header>
            <div class="jumbotron">
                <div class="container">
                    <h1>Les Destinations</h1>
                    <h3>Gestion des Destinations</h3>
                    <a href='../../logout.php' class="btn btn-danger"><span class="glyphicons glyphicons-log-out"></span> Logout</a>
                </div>
            </div>
        </header>
        <?php

        include_once("../../forms/Dest/ajouter.inc");

        ?>
    </body>
</html>
<?php
}else {
            header("Location: ../../index.php");
}
?>