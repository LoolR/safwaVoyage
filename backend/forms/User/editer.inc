<div class="container">
    <div class="well row">

<a href="../../views/user/index.php">
    <div class="btn btn-primary">Ajouter utilisateur </div></a>
    <a href="../../views/user/editer.php">
    <div class="btn btn-primary">Actualiser la Page </div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>

<?php

require_once '../../module/connection.php';
require_once '../../module/model/User/User.php';

$model = new User();
$User = $model->getUser();
?>
    <div id="formEditer" class="container">
        <div class="well row">
            <table class="table table-striped" >
                    <tr>
                        <td><b>#</b></td><td><b>login</b></td><td><b>Password</b></td><td colspan="2"><b>Action</b></td>
                    </tr>
                <?php
                while($data = $User->fetch()){
                    
                    echo("<tr>");
                    echo("<td>".$data['id_user']."</td>");
                    echo("<td>".$data['login']."</td>");
                    echo("<td>".$data['password']."</td>");
                    echo("<td><a href='../../actions/User/deleteAction.php?id=".$data['id_user']."'>Suprimer</a></td>");
                    echo("<td><a href='../../forms/User/editerActionForm.php?id=" .$data['id_user']."'>Editer</a></td>");
                    echo("</tr>");

                }
                ?>
            </table>
        </div>
    </div>
