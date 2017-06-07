<?php


class Media extends Connection{
    private $id_media;
    private $nom_media;
    private $source_media;
    private $desc_media;
    private $id_type_media;
    private $slider_media;
//    private $id_play_list_media;

    private $id_mediaCol="id_media";
    private $nom_mediaCol="nom_media";
    private $source_mediaCol="source_media";
    private $desc_mediaCol="desc_media";
    private $id_type_mediaCol="id_type_media";
    private $slider_mediaCol="slider_media";
//    private $id_play_list_mediaCol="id_play_list_media";



    private $table="Media";

    public function __construct($nom=NULL,$source=NULL,$id_type=NULL,$desc=NULL,$slider=NULL/*,$id_play_list_media=NULL*/){
        $this->nom_media=$nom;
        $this->source_media=$source;
        $this->desc_media=$desc;
        $this->id_type_media=$id_type;
        $this->slider_media=$slider;
//        $this->id_play_list_media=$id_play_list_media;
     
    }


    #CREATE
    public function saveMedia(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->nom_media}','{$this->desc_media}','{$this->source_media}','{$this->id_type_media}','{$this->slider_media}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    
    
    #READ
    public function getMedia($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->id_media}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteMedia($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->id_mediaCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateMedia($id,$nom,$source,$desc,$id_type,$slider/*,$id_play_list_media*/)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->source_mediaCol}='$source'
                  ,{$this->desc_mediaCol}='$desc'
                  ,{$this->slider_mediaCol}='$slider'
                  ,{$this->id_type_mediaCol}='$id_type'
                  ,{$this->nom_mediaCol}='$nom'
                  WHERE {$this->id_mediaCol}=".$id;
        
        $query = $this->getPDO()->query($sql);
        
        return $query;
    }
}?>
