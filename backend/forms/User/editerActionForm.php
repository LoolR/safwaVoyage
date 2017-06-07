<?php
      session_start();
   
   if( isset( $_SESSION['username'] ) ) {

    require_once '../../module/connection.php';
    require_once '../../module/model/User/User.php';
    
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=''){
    
    $model= new User();
    $categorie = $model->getUser();
    while($data=$categorie->fetch()){
        if($data["id_user"]==$id){
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
                    <h1>Utilisateur</h1>
                    <h3>Gestion des Utilisateurs</h3>
                    <a href='../../logout.php' class="btn btn-danger"><span class="glyphicons glyphicons-log-out"></span> Logout</a>

                </div>
            </div>
        </header>

<div class="container">
    <div class="well row">
<a href="../../views/user/editer.php">
    <div class="btn btn-primary">Editer les Utilisateurs</div></a>
    <a href="../../views/user/index.php">
    <div class="btn btn-primary">Ajouter un utilisateur</div></a>
    <a href=<?php echo '../../forms/User/editerActionForm.php?id='.$id;?>>
    <div class="btn btn-primary">Actualiser la page</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>

<div id="form" class="well container">
    <form enctype="multipart/form-data" name="UserForm" action="../../actions/User/editerAction.php" method="post">
        <div class="row">
        <table class="table table-hover">
            <tr id="erreurline" class="info">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            
            <tr id="idloginuser" class="info">
                <td>
                    <label>Lobin</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="loginuser" value="<?php echo($data["login"])?>"/>
                </td>
            </tr>
            
            <tr id="idpassworduser" class="info">
                <td>
                    <label>Password</label>
                </td>
                
                <td>
                    <input class="form-control" type="password" name="passworduser"/>
                </td>
            </tr>
            
            <tr class="info">
                <td colspan=2>
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <input class="btn btn-success" type="button"  value="applique les modifications" onclick="valider(UserForm,'ajouterUser')"/>
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
            sleep(5);
            header("Location: ../../index.php");


    }
       
   }else {
            header("Location: ../../index.php");
}
?>