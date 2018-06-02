<?php

include '../model/Producto.php';

$method = $_SERVER['REQUEST_METHOD'];
  if($method=="POST"){
    $user = new User();
    $user->setId($_POST["id"]);
    //$producto->setCodigo($_POST["codigo"]);
    //$producto->setValor($_POST["valor"]);
    $resp = $user->delUser();
    if($resp[0]){
      http_response_code(200);
    }else{
      http_response_code(400);
    }
    echo $resp[1];
  }
  
  
?>
