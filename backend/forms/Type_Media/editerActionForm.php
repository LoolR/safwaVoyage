<?php
  session_start();
   
   if( isset( $_SESSION['username'] ) ) {

require_once'../../module/connection.php';
require_once'../../module/model/Type_Media/Type_Media.php';

 $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=''){
    
    $model= new Type_Media();
    $Type_Media = $model->getType_Media();
    while($data=$Type_Media->fetch()){
        if($data["id_type_media"]==$id){
            break;}}
    
        
    

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../../admin/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../../admin/css/style.css" rel="stylesheet" type="text/css" >
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Insert title here</title>
    <script language="javascript" src="../../js/validation.js"></script>
</head>
<body>
    <header>
            <div class="jumbotron">
                <div class="container">
                    <h1>Type de Media</h1>
                    <h3>Editeur des Types de Media</h3>
                    <a href='../../logout.php' class="btn btn-danger"><span class="glyphicons glyphicons-log-out"></span> Logout</a>

                </div>
            </div>
        </header>
<div class="container">
    <div class="well row">
<a href="../../views/type_media/editer.php">
    <div class="btn btn-primary">Editer les Types de Media</div></a>
      <a href="../../views/type_media/index.php">
    <div class="btn btn-primary">Ajouter un Type de Media</div></a>
    <a href=<?php echo '../../forms/Type_Media/editerActionForm.php?id='.$id;?>>
    <div class="btn btn-primary">Actualiser la page</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger">Annuler</div></a>
</div></div>
<div id="form" class=" container">
    <form enctype="multipart/form-data" name="Type_MediaForm" action="../../actions/Type_Media/editerAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr id="erreurline" class="info">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            <tr id="idnom_Type_Media" class="info">
                <td>
                    <label>Nom</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="nom_Type_Media"value="<?php echo($data["nom_type_media"])?>"/>
                </td>
            </tr>
            <tr id="idext_Type_Media" class="info">
                <td>
                    <label>Extensions</label>
                </td>
                
                <td>
                    <textarea class="form-control" name="ext_Type_Media"><?php echo($data["ext_type_media"])?></textarea>
                </td>
            </tr>
            
            <tr class="info">
                <td colspan=2>
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <input class="btn btn-success" type="button" value="Creer le Type" onclick="valider(Type_MediaForm,'ajouterType_Media')"/>
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
}?>