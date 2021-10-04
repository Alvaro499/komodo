<?php

class Order_model{

    private $load_conection;
    private $obj_conection;

    function __construct(){
        $this->obj_conection = new Conexion_model();
        $this->load_conection = $this->obj_conection->conectDB();
    }

    function sendOrder(){
        try {

            $get = $this->load_conection->prepare("INSERT");
            $result = $get->execute();

            if ($result) {
                return 1;
                //1 = exito al insertar

            }else{
                return 0;
                //2 = error al insertar en la base de datos
            }
            
            
        } catch (PDOException $e) {
            echo "Error de" . $e->getMessage();
        }
    }



}