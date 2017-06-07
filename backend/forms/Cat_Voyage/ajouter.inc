
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
<a href="../../views/cat_voyage/editer.php">
    <div class="btn btn-primary">Editer les Categories de Voyage</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class=" container">
    <form enctype="multipart/form-data" name="cat_voyageForm" action="../../actions/Cat_Voyage/ajouterAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr id="erreurline" class="info">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            
            <tr id="idnomcatvoyage" class="info">
                <td>
                    <label>Nom</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="nomcatvoyage"/>
                </td>
            </tr>
            
            <tr id="iddescriptioncatvoyage" class="info">
                <td>
                    <label>Description</label>
                </td>
                
                <td>
                    <textarea class="form-control" name="descriptioncatvoyage"></textarea>
                </td>
            </tr>
            
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer La Categorie" onclick="valider(cat_voyageForm,'ajouterCatVoyage')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>
