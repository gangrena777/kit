<?php

// необходимые HTTP-заголовки
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json;');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$token = 'qazwsxedc';

require_once($_SERVER['DOCUMENT_ROOT'].'/config/DB.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/classes/products.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/classes/price.php');


// получаем отправленные данные

$data = file_get_contents('php://input');

file_put_contents("api1.txt", $data);

$data2 =  json_decode($data,true);

// $txt = "<pre>".print_r($data2, true)."</pre>";
// file_put_contents('file.txt', $txt);



if( !empty($data2['key']) && $data2['key'] == $token){


        $arrTest =[];
           // проверяем есть ли в базе товар с таким id
        foreach ($data2['data'] as $key => $value) {

            $database = new Database();
            $db = $database->getConnection();

            $product = new Product($db);

            $item = $product->readById($value['product_id']);



            // $arrTest['file_id'][] = $value['product_id'];

            if($item){  //если есть такой товар   в базе ...................
              // $arrTest['item'][] = $item; 

                //  get region id   ////

                foreach ($value['prices'] as $key => $val) {  //получаем все id регионов этого товара

                      $database = new Database();
                      $db = $database->getConnection();

                      $price = new Price($db);

                      $item_price = $price->readByIds($key,$value['product_id']);  //получаем все цены данного товара во всех регионах
                      if( $item_price ){   // есть ли в базе цена в данном регионе у данного товара
                            //   $arrTest['region_old_val'][$key][] = $item_price[0]['price_value'];

                            //  $arrTest['region_name'][$key][] = $item;

                            $price_value = $val['price_purchase'].";".$val['price_selling'].";".$val['price_discount'];

                            //  $arrTest['region_new_val'][$key][] = $price_value;

                            $update_price = $price->UpdateFromApi($key,$value['product_id'], $price_value);
                            if( $update_price ){
                                  //  $arrTest['region_update'][$key][] = $value['product_name'];

                                $arrTest['success_update'][] = "Цена на товар с ID=".$value['product_id']." в регионе  region_id=".$key." успешно обнавлена.";
                            }else{
                                $arrTest['error_update'][] = "Цена на товар с ID=".$value['product_id']." в регионе  region_id=".$key." не обновилась.Ошибка!!!";
                            }
                      }
                      else{  //если нет ...создаем цену...для товара в данном регионе 
                            $price_value = $val['price_purchase'].";".$val['price_selling'].";".$val['price_discount'];

                            // $arrTest['region_empty'][$key][] = $price_value;

                            $create_price = $price->CreateFromApi($key,$value['product_id'],$price_value);

                                if( $create_price ){
                                   // $arrTest['region_create'][$key][] = $value['product_name'];
                                
                                   $arrTest['success_create'][] = "Цена на товар с ID=".$value['product_id']." в регионе  region_id=".$key." успешно создана.";
                                }else{
                                    $arrTest['error_update'][] = "Цена на товар с ID=".$value['product_id']." в регионе  region_id=".$key." не создалась.Ошибка!!!";
                                }
                    
                    
                      }

                    }
            }
            else{ 
                   
             //если нет в базе ...............

                $arrTest['error_prod'][] = "Товара с данным ID=".$value['product_id']." в базе нет.";
                 //$arrTest['item_empty'][] = $value['product_id']; 
            }
            
        }
        http_response_code(201);
        echo json_encode($arrTest, JSON_UNESCAPED_UNICODE);

}
else{
        http_response_code(404);
        echo json_encode(array("error_token" => "Не верный токен"), JSON_UNESCAPED_UNICODE);

}


?>
