<?php
  session_start();
   
   if( isset( $_SESSION['username'] ) ) {

    require_once '../../module/connection.php';
    require_once '../../module/model/Cat_Voyage/Cat_Voyage.php';
    
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=''){
    
    $model= new Cat_Voyage();
    $categorie = $model->getCat_Voyage();
    while($data=$categorie->fetch()){
        if($data["id_cat_voy"]==$id){
            break;}}
   
    
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../../admin/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../../admin/css/style.css" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Insert title here</title>
    <script language="javascript" src="../../js/validation.js"></script>
</head>
<body>
    
    <header>
            <div class="jumbotron">
                <div class="container">
                    <h1>Categorie de Voyage</h1>
                    <h3>Gestion des Categories des Voyages</h3>
                    <a href='../../logout.php' class="btn btn-danger"><span class="glyphicons glyphicons-log-out"></span> Logout</a>
                </div>
            </div>
        </header>

<div class="container">
    <div class="well row">
<a href="../../views/cat_voyage/editer.php">
    <div class="btn btn-primary">Editer les Categories de Voyage</div></a>
    <a href="../../views/cat_voyage/index.php">
    <div class="btn btn-primary">Ajouter une Categorie de Voyage</div></a>
    <a href=<?php echo '../../forms/Cat_Voyage/editerActionForm.php?id='.$id;?>>
    <div class="btn btn-primary">Actualiser la page</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>

<div id="form" class="well container">
    <form enctype="multipart/form-data" name="Cat_VoyageForm" action="../../actions/Cat_Voyage/editerAction.php" method="post">
        <div class="row">
        <table class="table table-hover">
            <tr id="erreurline" class="info">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            
            <tr id="idnom_cat_voyage" class="info">
                <td>
                    <label>Nom</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="nom_cat_voyage" value="<?php echo($data["nom_cat_voy"])?>"/>
                </td>
            </tr>
            
            <tr id="iddescription_cat_voyage" class="info">
                <td>
                    <label>Description</label>
                </td>
                
                <td>
                    <textarea class="form-control" name="description_cat_voyage"><?php echo($data["desc_cat_voy"])?></textarea>
                </td>
            </tr>
            
            <tr class="info">
                <td colspan=2>
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <input class="btn btn-success" type="button"  value="Creer La Categorie" onclick="valider(Cat_VoyageForm,'ajouterCat_Voyage')"/>
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