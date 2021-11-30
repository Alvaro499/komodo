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

    // function getProductBySearch($keyword){
    //     try {

    //         $get = $this->load_conection->prepare("SELECT `id_product`,`name`,`cost`,`stock`,`url` FROM product WHERE keywords LIKE '%$keyword%' OR cost LIKE '%$keyword%' AND stock > 0");
    //         $GET = $THIS->load_conection->prepare("SELECT `id_product`,`name`,`cost`,`stock`,`url` FROM product WHERE MATCH(keywords, cost, color) AGAINST ('$keyword')")
    //         $get->execute();

    //         $result = $get->fetchAll();

    //         if ($result > 0) {

    //             return $result;
    //         }else{
    //             return 0;
    //         }
            
    //     } catch (PDOEException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    function getProductBySearch($keyword){
        try {
            $ban_characters = array("color","colores","pulseras","pulsera","piedra","piedras","de","entre","para","y"," ");
            $array_keywords = explode(" ",$keyword);
            $new_array = str_ireplace($ban_characters,"#",$array_keywords);

            $consult = "SELECT `id_product`, `name`, `cost`, `stock`, `url` FROM product WHERE stock > 0 AND keywords LIKE '%" . $new_array[0] . "%' OR  cost LIKE '%" . $new_array[0] . "%' OR color LIKE '%" . $new_array[0] . "%' OR description LIKE '%" . $new_array[0] . "%' OR name LIKE '%" . $new_array[0] . "%'";
    
            for ($i=0; $i < count($new_array); $i++) { 

                $consult .= "OR cost LIKE '%" . $new_array[$i] . "%' OR color LIKE '%" . $new_array[$i] . "%' OR description LIKE '%" . $new_array[$i] . "%' OR name LIKE '%" . $new_array[$i] . "%'";
            }
            // echo $consult;
            $get = $this->load_conection->prepare($consult);
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

    function getProductForIndex(){
        try {

            $get = $this->load_conection->prepare("SELECT `name`, `url` FROM product WHERE stock > 0 ORDER BY RAND() LIMIT 8");
            $get->execute();

            $result = $get->fetchAll();
            return $result;
            
        } catch (PDOEEXCEPTION $e) {
            echo "Error: " . $e->getMessage();
        }
    }
 }