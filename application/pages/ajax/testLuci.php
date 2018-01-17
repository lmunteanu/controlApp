<?php

header('Content-Type: application/json');

//echo "test";

$arr = [];

array_push($arr, [
   'id' => 1234,
   'userId' => 9,
   'date' => date('Y-m-d h:i:s'),
   'text' => 'lorem ipsum'
]);
array_push($arr, [
   'id' => 2345,
   'userId' => 10,
   'date' => date('Y-m-d h:i:s'),
   'text' => 'lorem ipsum'
]);
array_push($arr, [
   'id' => 3456,
   'userId' => 11,
   'date' => date('Y-m-d h:i:s'),
   'text' => 'lorem ipsum'
]);
array_push($arr, [
   'id' => 4567,
   'userId' => 12,
   'date' => date('Y-m-d h:i:s'),
   'text' => 'lorem ipsum'
]);

array_push($arr, $_POST);


echo json_encode($arr);