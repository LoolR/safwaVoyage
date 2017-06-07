<?php

class User extends Connection{
    private $id_user;
    private $login_user;
    private $password_user;
   
    
    private $id_userCol="id_user";
    private $login_userCol="login";
    private $password_userCol="password";
    
    private $table="user";

    public function __construct($login=NULL,$password=NULL){
        $this->login_user=$login;
        $this->password_user=$password;
        
    }


    #CREATE
    public function saveUser(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->login_user}','{$this->password_user}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    
    #READ
    public function getUser($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->id_user}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    
    #DELETE
    public function deleteUser($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->id_userCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateUser($id,$login,$password)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->login_userCol}='$login'
                  ,{$this->password_userCol}='$password'
                  WHERE {$this->id_userCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>
