<?php

// необходимые HTTP-заголовки
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// получаем отправленные данные
$data = file_get_contents('php://input');
$info = json_decode($data);


if( !empty($info->user) && !empty($info->pass)){
    



    if($info->user == 'admin' && $info->pass == 'qwerty123'){

        // установим код ответа - 201 создано
        http_response_code(201);


        echo json_encode(array("message" => "Авторизация прошла успешно.Token  был создан.", "token"=>"qazwsxedc"), JSON_UNESCAPED_UNICODE);

    }else{

                    // // установим код ответа - 404 Не найдено
            http_response_code(404);

           
            echo json_encode(array("message" => "Криво авторизировался."), JSON_UNESCAPED_UNICODE);

    }

  

}else{

    // // установим код ответа - 404 Не найдено
    http_response_code(404);

   
    echo json_encode(array("message" => "Шлешь пустые данные..."), JSON_UNESCAPED_UNICODE);
}


?>
