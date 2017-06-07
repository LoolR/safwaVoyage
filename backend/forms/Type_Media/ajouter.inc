
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
<a href="../../views/type_media/editer.php">
    <div class="btn btn-primary">Editer les Types de Media</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger">Annuler</div></a>
</div></div>
<div id="form" class=" container">
    <form enctype="multipart/form-data" name="Type_MediaForm" action="../../actions/Type_Media/ajouterAction.php" method="post">
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
                    <input class="form-control" type="text" name="nom_Type_Media"/>
                </td>
            </tr>
            <tr id="idext_Type_Media" class="info">
                <td>
                    <label>Extensions</label>
                </td>
                
                <td>
                    <textarea class="form-control" name="ext_Type_Media"></textarea>
                </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button" value="Creer le Type" onclick="valider(Type_MediaForm,'ajouterType_Media')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>
