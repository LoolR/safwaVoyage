<?php


class Play_list extends Connection{


    private $id_play_list;
    private $name_play_list;
    private $desc_play_list;
    private $media_list;
    private $id_dest_play;
    private $id_cat_play;
    private $id_voy_play;



    private $id_play_listCol="id_play_list";
    private $name_play_listCol="name_play_list";
    private $desc_play_listCol="desc_play_list";
    private $media_listCol="media_list";
    private $id_dest_playCol="id_dest_play";
    private $id_cat_playCol="id_cat_play";
    private $id_voy_playCol="id_voy_play";


    private $table="play_list";

    public function __construct($name=NULL,$desc=NULL,$media=NULL,$dest_play=NULL,$cat_play=NULL,$voy_play=NULL){
        $this->name_play_list=$name;
        $this->desc_play_list=$desc;
        $this->media_list=$media;
        $this->id_dest_play=$dest_play;
        $this->id_cat_play=$cat_play;
        $this->id_voy_play=$voy_play;

    }


    #CREATE
    public function savePlay_list(){
        $sql="INSERT INTO {$this->table} VALUES('',
              '{$this->name_play_list}',
              '{$this->desc_play_list}',
              '{$this->media_list}',
              '{$this->id_dest_play}',
              '{$this->id_cat_play}',
              '{$this->id_voy_play}')";

        echo $sql;
        $query =$this->getPDO()->query($sql);

        return $query;
    }
    #READ
    public function getPlay_list($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->id_play_list}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deletePlay_list($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->id_play_listCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updatePlay_list($id,$name,$desc,$media,$dest_play,$cat_play,$voy_play)
    {

        $sql = "UPDATE {$this->table} SET
                  {$this->name_play_listCol}='$name'
                  ,{$this->desc_play_listCol}='$desc'
                  ,{$this->media_listCol}='$media'
                  ,{$this->id_dest_playCol}='$dest_play'
                  ,{$this->id_cat_playCol}='$cat_play'
                  ,{$this->id_voy_playCol}='$voy_play'

                  WHERE {$this->id_play_listCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>

