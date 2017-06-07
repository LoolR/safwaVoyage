<?php

class Reservation extends Connection{
    private $id_reservation;
    private $res_nom;
    private $res_prenom;
    private $res_email;
    private $res_nbr_adulte;
    private $res_nbr_enfants;
    private $res_tel;
    private $res_info;
    private $id_res_voy;

 
    

    private $id_reservationCol="id_reservation";
    private $res_nomCol="res_nom";
    private $res_prenomCol="res_prenom";
    private $res_emailCol="res_email";
    private $res_nbr_adulteCol="res_nbr_adulte";
    private $res_nbr_enfantsCol="res_nbr_enfants";
    private $res_telCol="res_tel";
    private $res_infoCol="res_info";
    private $id_res_voyCol="id_res_voy";

    private $table="Reservation";

    public function __construct($nom=NULL,$prenom=NULL,$email=NULL,$adultes=NULL,$enfants=NULL,$tel=NULL,$info=NULL,$id_voy=NULL){

        $this->res_nom=$nom;
        $this->res_prenom=$prenom;
        $this->res_email=$email;
        $this->res_nbr_adulte=$adultes;
        $this->res_nbr_enfants=$enfants;
        $this->res_tel=$tel;
        $this->res_info=$info;
        $this->id_res_voy=$id_voy;

        
     
    }


    #CREATE
    public function saveReservation(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->res_nom}','{$this->res_prenom}','{$this->res_email}','{$this->res_nbr_adulte}','{$this->res_nbr_enfants}','{$this->res_tel}','{$this->res_info}','{$this->id_res_voy}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getReservation($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->id_reservation}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteReservation($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->id_reservation}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateReservation($id,$nom,$prenom,$email,$adultes,$enfants,$tel,$info,$id_voy)
    {
        $sql = "UPDATE {$this->table} SET
                      {$this->res_nomCol}='res_nom'
                    ,{$this->res_prenomCol}='res_prenom'
                    ,{$this->res_emailCol}='res_email'
                    ,{$this->res_nbr_adulteCol}='res_nbr_adulte'
                    ,{$this->res_nbr_enfantsCol}='res_nbr_enfants'
                    ,{$this->res_telCol}='res_tel'
                    ,{$this->res_infoCol}='res_info'
                    ,{$this->id_res_voyCol}='id_res_voy'
                  WHERE {$this->id_reservationCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>