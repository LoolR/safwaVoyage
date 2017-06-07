<?php


class Voyage extends Connection{
    private $id_voy;
    private $titre_voy;
    private $s_titre_voy;
    private $prix_voy;
    private $id_media_voy;
    private $text_voy;
    private $date_voy;
    private $duree_voy;
    private $id_dest_voy;
    private $id_cat_voy;
    private $visible_voy;
    private $infosup;
    private $itin;
//    private $id_play_list_voyage;

/*`infosup`, `Itinéraire`)*/

    private $id_voyCol="id_voy";
    private $titre_voyCol="titre_voy";
    private $s_titre_voyCol="s_titre_voy";
    private $prix_voyCol="prix_voy";
    private $id_media_voyCol="id_media_voy";
    private $text_voyCol="text_voy";
    private $date_voyCol="date_voy";
    private $duree_voyCol="duree_voy";
    private $id_dest_voyCol="id_dest_voy";
    private $id_cat_voyCol="id_cat_voy";
    private $visible_voyCol="visible_voy";
    private $infosupCol="infosup";
    private $itinCol="Itineraire";
//    private $id_play_list_voyageCol="id_play_list_voyage";


    private $table="Voyage";

    public function __construct($titre=NULL,$idmedia=NULL,$text=NULL,$s_titre=NULL,$id_cat=NULL,$id_dest=NULL,$duree=NULL,$date=NULL,$prix=NULL,$visible=NULL,$infosup=NULL,$itin=NULL/*,$id_play=NULL*/){
        $this->titre_voy=$titre;
        $this->s_titre_voy=$s_titre;
        $this->prix_voy=$prix;
        $this->id_media_voy=$idmedia;
        $this->text_voy=$text;
        $this->date_voy=$date;
        $this->duree_voy=$duree;
        $this->id_dest_voy=$id_dest;
        $this->id_cat_voy=$id_cat;
        $this->visible_voy=$visible;
        $this->infosup=$infosup;
        $this->itin=$itin;
//        $this->id_play_list_voyage=$id_play;

    }


    #CREATE
    public function saveVoyage(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->titre_voy}','{$this->s_titre_voy}','{$this->prix_voy}','{$this->id_media_voy}','{$this->text_voy}','{$this->date_voy}','{$this->duree_voy}','{$this->id_dest_voy}','{$this->id_cat_voy}','{$this->visible_voy}','{$this->infosup}','{$this->itin}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getVoyage($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->id_voy}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteVoyage($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->id_voyCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateVoyage($id,$titre,$idmedia,$text,$s_titre,$id_cat,$id_dest,$duree,$date,$prix,$visible,$infosup,$itin)
    {
        
        $sql = "UPDATE {$this->table} SET
                  {$this->s_titre_voyCol}='$s_titre'
                  ,{$this->titre_voyCol}='$titre'
                  ,{$this->id_media_voyCol}='$idmedia'
                  ,{$this->text_voyCol}='$text'
                  ,{$this->id_cat_voyCol}='$id_cat'
                  ,{$this->id_dest_voyCol}='$id_dest'
                  ,{$this->duree_voyCol}='$duree'
                  ,{$this->date_voyCol}='$date'
                  ,{$this->prix_voyCol}='$prix'
                  ,{$this->visible_voyCol}='$visible'
                  ,{$this->infosupCol}='$infosup'
                  ,{$this->itinCol}='$itin'
                  WHERE {$this->id_voyCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>

