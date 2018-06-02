<?php
include("../model/Detail.php");

$detalle = new Detail();
$array_deatil = Array();
$array_deatil = $detalle->listarDetail();

$resp = [];
foreach ($array_deatil as $d){
    $detailArray = $d->toArray();
    array_push($resp , $detailArray);
}

header('Content-Type: application/json');

echo json_encode($resp);


?>