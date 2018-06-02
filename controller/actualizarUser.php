<?php


include '../model/user.php';
include '../model/detail.php';


$method = $_SERVER['REQUEST_METHOD'];
  if($method=="POST"){
      
      $usr = new User();
      $dtl = new Detail();
      
      $usr->setEmail($_POST["email"]);
      $usr->setPassword($_POST["password"]);
      
      $dtl->genero($_POST["genero"]);
      $dtl->situacion_sentimental($_POST["situacion_sentimental"]);
      $dtl->fecha_nacimiento($_POST["fecha_nacimiento"]);
      
      $resp1 = $usr->updateUser();
      $resp2 = $dtl->updateDetail();
      
      if ($resp1[0] &&  $resp2[0]) {
          http_response_code(200);
      } else {
          http_response_code(400);
      }

  }

?>