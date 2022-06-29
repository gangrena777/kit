<?php


function GetToken($user,$pass) {


    $url = 'https://co32660.tmweb.ru/api/product/token.php';
    $curl = curl_init($url);

    $data = array(

    	'user' => $user,
    	'pass' => $pass
    );
    $post = json_encode($data);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
 
  
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    
   
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $json = curl_exec($curl);
    if ($json === false) {
        echo '<h1>Ошибка curl: ' . curl_error($curl) . '</h1>';
        
    }
    curl_close($curl);
   
    return json_decode($json, true);

}

$token ='qazwsxedc';

function UpdatePrice($token, $arrData) {


    $url = 'https://co32660.tmweb.ru/api/product/work.php';
   
    $curl = curl_init($url);

    $data = array(

    	'key' => $token,
    	'data' => $arrData
    	
    );


    $post = json_encode($data, JSON_UNESCAPED_UNICODE);
   
    //curl_setopt($curl, CURLOPT_HEADER, false);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
 
  
    curl_setopt($curl, CURLOPT_POST, TRUE);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    
   
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $json = curl_exec($curl);
    if ($json === false) {
        echo '<h1>Ошибка curl: ' . curl_error($curl) . '</h1>';
        
    }
    curl_close($curl);
   
    return json_decode($json, true);

}




  

 $message = GetToken('admin', 'qwerty123');



echo $message['message'];
echo "<br>";
echo $message['token'];


//require('ArrExample.php');

//$Prods = json_decode(file_get_contents('data_example2.json'));

// echo "<pre>";
// print_r($Prods);
// echo "</pre>";




// $res = UpdatePrice('qazwsxedc', $Prods);

// echo "<pre>";
// print_r($res);
// echo "</pre>";




?>