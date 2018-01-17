<?php
header('Content-Type: application/json');
$x = json_decode($_POST['data']);
//deg($x);
$a = $x->param1;
$b = $x->param2;
$user = 'user1';
$pass = 'pass1';
$success = (($a === $user) && ($b === $pass)) ? true : false;
$status = $success ? 'login succed' : 'login failed';
//deg($_POST);

echo json_encode(['data' => $status, 'success' => $success]);