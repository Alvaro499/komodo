 <?php

 class Products_model{

    private $load_conection;
    private $obj_conection;

    public function __construct(){

        $this->obj_conection = new Conexion_model();
        $this->load_conection = $this->obj_conection->conectDB();
    }

    function getProduct(){
        try{
            $get = $this->load_conection->prepare("SELECT `id_product`,`name`,`cost`,`stock`,`url` FROM product WHERE stock > 0");
            $get->execute();
            $result = $get->fetchAll();
            
            if (count($result) > 0 ) {
                
                return $result;
            }else{
                $result = 0;
                return $result;
            }
            
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }

    function getProductByBtn($color){

        try {
            $get = $this->load_conection->prepare("SELECT `id_product`,`name`,`cost`,`stock`,`url` FROM product WHERE color LIKE '%$color%' AND stock > 0");
            $get->execute();

            $result = $get->fetchAll();

            if ($result > 0) {

                return $result;
            }else{
                return 0;
                //Error: no hay resultados
            }

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function getProductBySearch($keyword){
        try {

            $get = $this->load_conection->prepare("SELECT `id_product`,`name`,`cost`,`stock`,`url` FROM product WHERE keywords LIKE '%$keyword%' OR cost LIKE '%$keyword%' AND stock > 0");
            // $GET = $THIS->load_conection->prepare("SELECT `id_product`,`name`,`cost`,`stock`,`url` FROM product WHERE MATCH(keywords, cost, color) AGAINST ('$keyword')")
            $get->execute();

            $result = $get->fetchAll();

            if ($result > 0) {

                return $result;
            }else{
                return 0;
                //Error: no hay resultados
            }
            
        } catch (PDOEException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


 }