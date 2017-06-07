<?php


class Dest extends Connection{
    private $id_dest;
    private $nom_dest;
    private $id_media_dest;
    private $pays_dest;
    private $description_dest;
//    private $id_play_list_dest;
 
    

    private $id_destCol="id_dest";
    private $nom_destCol="nom_dest";
    private $id_media_destCol="id_media_dest";
    private $pays_destCol="pays_dest";
    private $description_destCol="description_dest";
//    private $id_play_list_destCol="id_play_list_dest";
    

    private $table="Dest";

    public function __construct($nom_dest=NULL,$id_media_dest=NULL,$pays_dest=NULL,$description_dest=NULL/*,$id_play=null*/){
        $this->nom_dest=$nom_dest;
        $this->id_media_dest=$id_media_dest;
        $this->pays_dest=$pays_dest;
        $this->description_dest=$description_dest;
//        $this->id_play_list_dest=$id_play;
        
     
    }

    #CREATE
    public function saveDest(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->nom_dest}','{$this->id_media_dest}','{$this->description_dest}','{$this->pays_dest}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getDest($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->id_dest}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteDest($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->id_destCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateDest($id,$nom_dest,$id_media_dest,$pays_dest,$description_dest/*,$id_play*/)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->id_media_destCol}='$id_media_dest'
                  ,{$this->pays_destCol}='$pays_dest'
                  ,{$this->description_destCol}='$description_dest'
                  ,{$this->nom_destCol}='$nom_dest'
                  WHERE {$this->id_destCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>
