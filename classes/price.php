<?php
class Price {

 
    private $conn;
    
  
    public $id;
    public $prod_id;
    public $price_value;
    public $region_id;
  
    public function __construct($db){
        $this->conn = $db;
    }

    // get price by region id and product id//////////////////
    function readByIds($region_id, $prod_id) {



        // выбираем все записи
        $query = "SELECT *  FROM  price WHERE region_id = $region_id  AND prod_id = $prod_id";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // выполняем запрос
        $stmt->execute();
        
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $array;

        // if($array) $array;
        // else{
        //     return false;
        //  }
       

        // }else {

        //   $messege = "Цены не найдены.";

        //   return $messege;
        // }

   
       
    }

    function  UpdateFromApi($region_id, $prod_id, $value){

        $query ="UPDATE `price` SET `price_value` = :price WHERE region_id = $region_id  AND prod_id = $prod_id";

        $stmt = $this->conn->prepare($query);

        // выполняем запрос
      $res = $stmt->execute(array('price' =>$value));
        
      

       if ( $res ){
          return true;
       }
        
    }

    function  CreateFromApi($region_id, $prod_id, $value){
              
              $query ="INSERT INTO `price` SET `price_value` = :price, `prod_id` = :prod_id, `region_id` =:region_id";

               $stmt = $this->conn->prepare($query);
               
               $res =  $stmt->execute(array('price' => $value, 'prod_id' => $prod_id, 'region_id' =>$region_id));
 
               // Получаем id вставленной записи
               // $insert_id = $dbh->lastInsertId();
           

            if ( $res ){
                return true;
            }
    }

}
?>