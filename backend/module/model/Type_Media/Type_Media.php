<?php

class Type_Media extends Connection{
    private $id_type_media;
    private $nom_type_media;
    private $ext_type_media;
   
    
    private $id_type_mediaCol="id_type_media";
    private $nom_type_mediaCol="nom_type_media";
    private $ext_type_mediaCol="ext_type_media";
    
    private $table="Type_Media";

    public function __construct($nom=NULL,$ext=NULL){
        $this->nom_type_media=$nom;
        $this->ext_type_media=$ext;
        
    }
    public function getExtensionFormmat($id){
        $sql="SELECT {$this->ext_type_mediaCol} FROM {$this->table} WHERE {$this->id_type_mediaCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }

    #CREATE
    public function saveType_Media(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->nom_type_media}','{$this->ext_type_media}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getType_Media($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->id_type_media}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteType_Media($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->id_type_mediaCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateType_Media($id,$nom,$ext)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->nom_type_mediaCol}='$nom'
                  ,{$this->ext_type_mediaCol}='$ext'
                
                  WHERE {$this->id_type_mediaCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>
