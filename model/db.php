<?php


class Conexion_model{

    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "komodo_db";

    public function conectDB(){
        try {
            $conect = new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->user,$this->pass);
            $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conect;
        } catch (PDOException $e) {
            echo "La conexion con la base de datos fallo" . $e->getMessage();
        }
    }
}