<?php

class Cat_Voyage extends Connection{

    private $id_cat_voy;
    private $nom_cat_voy;
    private $desc_cat_voy;
   
    
    private $id_cat_voyCol="id_cat_voy";
    private $nom_cat_voyCol="nom_cat_voy";
    private $desc_cat_voyCol="desc_cat_voy";
    
    private $table="Cat_Voyage";

    public function __construct($nom=NULL,$desc=NULL){
        $this->nom_cat_voy=$nom;
        $this->desc_cat_voy=$desc;
        
    }


    #CREATE
    public function saveCat_Voyage(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->nom_cat_voy}','{$this->desc_cat_voy}')";

        $query =$this->getPDO()->query($sql);

        return $query;
    }

    #READ
    public function getCat_Voyage($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->id_cat_voy}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    
    #DELETE
    public function deleteCat_Voyage($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->id_cat_voyCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateCat_Voyage($id,$nom,$desc)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->nom_cat_voyCol}='$nom'
                  ,{$this->desc_cat_voyCol}='$desc'
                  WHERE {$this->id_cat_voyCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>
