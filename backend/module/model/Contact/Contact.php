<?php
/**
 * Created by PhpStorm.
 * User: ASUS ROG
 * Date: 10/12/2016
 * Time: 9:10 PM
 */

class Contact extends Connection{
    private $id_contact;
    private $nom_contact;
    private $prenom_contact;
    private $tel_contact;
    private $email_contact;
    private $desc_contact;



    private $id_contactCol="id_contact";
    private $nom_contactCol="nom_contact";
    private $prenom_contactCol="prenom_contact";
    private $tel_contactCol="tel_contact";
    private $email_contactCol="email_contact";
    private $desc_contactCol="desc_contact";


    private $table="Contact";

    public function __construct($nom_contact=NULL,$prenom_contact=NULL,$tel_contact=NULL,$email_contact=NULL,$desc_contact=null){
        $this->nom_contact=$nom_contact;
        $this->prenom_contact=$prenom_contact;
        $this->tel_contact=$tel_contact;
        $this->email_contact=$email_contact;
        $this->desc_contact=$desc_contact;


    }

    #CREATE
    public function saveContact(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->nom_contact}','{$this->prenom_contact}','{$this->tel_contact}','{$this->email_contact}','{$this->desc_contact}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getContact($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->id_contact}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteContact($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->id_contactCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateContact($id,$nom,$prenom,$tel,$email,$desc)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->$nom_contactCol}='$nom'
                  ,{$this->pays_destCol}='$prenom'
                  ,{$this->description_destCol}='$tel'
                  ,{$this->nom_destCol}='$email'
                  ,{$this->id_play_list_destCol}='$desc'
                  WHERE {$this->id_destCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>