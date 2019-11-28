<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: AccountKey,x-requested-with, Content-Type, origin, authorization, accept, client-security-token, host, date, cookie, cookie2");


include_once 'database.php';
include_once 'taskClass.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$product = new taskClass($connection);


$post 	= file_get_contents("php://input");
$data 	= json_decode($post, true);
if($data){
  print_r($data);
  echo $data['title'];
  $product->title = '1';
  $product->description = 2;

  if($product->create()){
      http_response_code(201);
      $task = [
        'title' => 1,
        'description' => 2,
        'id'    => 3
      ];
      echo json_encode($task);
    }else{
      http_response_code(422);
    }
  }
?>