<?php
//echo('you are in getSumm');
header('Content-Type: application/json');
//deg($_GET);
$a = isset($_GET['a']) ? $_GET['a'] : '';
$b = isset($_GET['b']) ? $_GET['b'] : '';
$c = $a + $b;
$success = (gettype($c) === 'integer');

echo json_encode(['data' => $c, 'success' => $success]);
