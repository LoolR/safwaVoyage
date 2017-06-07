<?php

class Connection{

    private $host = "localhost";
    private $pwd = "";
    private $user = "root";
    private $port="3307";
    private $dbname = "SafwaVoyageBD";
    private $connection;

    public function __construct(){
    }
        public function getPDO()
        {
            try {

                $this->connection = new PDO("mysql:host={$this->host};port={$this->port};dbname=".$this->dbname,$this->user,$this->pwd);
                return $this->connection;

            } catch (Exception $e) {
                echo("Exception ".$e->getMessage());
            }
        }
}?>
