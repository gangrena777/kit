<?php
class Product {

 
    private $conn;


    
    public $id;
    public $name;
    public $description;
  
    // конструктор для соединения с базой данных
    public function __construct($db){
        $this->conn = $db;
    }



    // метод read() - получение товаров
    function read() {



        // выбираем все записи
        $query = "SELECT prod.name, prod.description, prod.id, rgn.region_name, prc.price_value
                    FROM  price prc
                    LEFT JOIN region rgn ON prc.region_id = rgn.id
                    LEFT JOIN product prod ON prc.prod_id = prod.id
                    ORDER BY prod.id";

    
        $stmt = $this->conn->prepare($query);

    
        $stmt->execute();

       $num = $stmt->rowCount();
        // проверка, найдено ли больше 0 записей

        if($num>0) {

            // массив товаров
             $products_arr = array();
            // получаем содержимое нашей таблицы
            // fetch() быстрее, чем fetchAll()
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                // извлекаем строку
                extract($row);

                $product_item = array(
                    "id"=> $id,
                  
                    "name" => $name,
                    "description" =>$description,
                     "price" => $price_value,
                    
                     "region" => $region_name
                );

                array_push($products_arr, $product_item);

       
            }

            return $products_arr;


  
        }else {

          $messege = "Товары не найдены.";

          return $messege;
        }

   
       
    }

    function readById($id){



        $query = "SELECT * FROM `product` WHERE `id` = :id";

        $sth = $this->conn->prepare($query);
        $sth->execute(array('id' => $id));

        $data = $sth->fetch(PDO::FETCH_ASSOC);

        if($data){
             return    $data;
         }else{
            return false;
         }
       

    }
}
?>