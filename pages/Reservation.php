<?php
require_once '../backend/module/connection.php';
require_once '../backend/module/model/Voyage/Voyage.php';
$id=(isset($_GET{"id"}))?$_GET{"id"}:"";

if($id!=""){
$model = new Voyage();
$voyage = $model->getVoyage();
while($data=$voyage->fetch()){
    if($data["id_voy"]==$id){
        break;}}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
    <head>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" >
        <link href="../backend/admin/css/style.css" rel="stylesheet" type="text/css" >
        <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
        <title>gestion safwa</title>
    </head>
    <body>
        <header>
            <div class="jumbotron">
                <div class="container">
                    <h1>Reservation</h1>
                    <h3><?php echo $data["titre_voy"];?></h3>
                </div>
            </div>
        </header>
        <?php

        include_once("../backend/forms/reservation/ajouter.inc");

        ?>
</body>
</html>
<?php
}else{
    echo("vous n'avez pas le droit d'acceder a cette page");

}
    ?>