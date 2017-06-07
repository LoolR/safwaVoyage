
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
<div class="container">
    <div class="well row">
<a href="../../views/user/editer.php">
    <div class="btn btn-primary">Editer les Categories de Voyage</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class=" container">
    <form enctype="multipart/form-data" name="userForm" action="../../actions/User/ajouterAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr id="erreurline" class="info">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            
            <tr id="idloginuser" class="info">
                <td>
                    <label>login</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="loginuser"/>
                </td>
            </tr>
            
            <tr id="idpassworduser" class="info">
                <td>
                    <label>Description</label>
                </td>
                
                <td>
                    <input class="form-control" type="password" name="passworduser"/>
                </td>
            </tr>
            
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Ajouter l'utilisateur" onclick="valider(userForm,'ajouterUser')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>
