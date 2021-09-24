 <?php

 class Products_controller{

    private $load_conection;
    private $obj_conection;

    public function __construct(){

        $this->obj_conection = new Conexion_model();
        $this->load_conection = $this->obj_conection->conectDB();

    }

    function getProduct(){
        try{
            $get = $this->load_conection->prepare("SELECT WHERE stock >= 0");
            $result = $get->execute();
            return $result;

        }catch(PDOException $e){

            echo "Error:" . $e->getMessage();

        }
    }

    function getProductColor($color){

        try {
            $get = $this->load_conection->prepare("SELECT WHERE");

        } catch(PDIOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


 }