<?php

   require_once('config/DB.php');
   require_once('classes/products.php');



// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// инициализируем объект
$product = new Product($db);
// запрашиваем товары
$data2 = $product->read();

//$data = $product->readById(1);

echo "<pre>";
print_r($data2);
echo "</pre>";




?>