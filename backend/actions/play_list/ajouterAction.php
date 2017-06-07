<?php
require_once '../../module/connection.php';
require_once '../../module/model/Play_list/Play_list.php';

$ch=(isset($_POST{'selectplsylist'}))?$_POST{"selectplsylist"}:"";    // echo the choice
echo $ch;
        if($ch==0){
            $ids=(isset($_POST{"id_voy"}))?$_POST{"id_voy"}:"";
        }
        else if ($ch==1){
            $ids=(isset($_POST{"id_dest"}))?$_POST{"id_dest"}:"";
        }
        else if ($ch==2){
            $ids=(isset($_POST{"id_cat_voy"}))?$_POST{"id_cat_voy"}:"";
        }


$name_play_list=(isset($_POST{"name_play_list"}))?$_POST{"name_play_list"}:"";
$desc_play_list=(isset($_POST{"desc_play_list"}))?$_POST{"desc_play_list"}:"";


$amedia = $_POST['media'];
$idsmedia= "";
if(!empty($amedia))
{
    $N = count($amedia);
    for($i=0; $i < $N; $i++)
    {
        $idsmedia = $idsmedia.$amedia[$i] . " ";
    }
}

if($name_play_list!=""&&$desc_play_list!=""&&$idsmedia!=""&&$ids!="") {

    if($ch==0){
        $playlist = new Play_list(addslashes($name_play_list), addslashes($desc_play_list), $idsmedia,'-1','-1',$ids);
    }
    else if ($ch==1){
        $playlist = new Play_list(addslashes($name_play_list), addslashes($desc_play_list), $idsmedia,$ids,'-1','-1');
    }
    else if ($ch==2){
        $playlist = new Play_list(addslashes($name_play_list), addslashes($desc_play_list), $idsmedia,'-1',$ids,'-1');
}

    $resultat = $playlist->savePlay_list();


    if ($resultat) {
        echo("Enregistrement reussie");
        header('Refresh: 2; URL = editer.inc');
    } else {
        echo("Echec d'enregistrement");
    }
    header("Location: ../../views/play_list/editer.php");
}else{
    echo("vous n'avez pas le droit d'accés à cette page");
}?>