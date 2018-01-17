<?php
 
// Header de content type application/json pentru ca vom trimite tot timpul
// raspunsul in format json. Daca am trimite doar un String, nu ar mai fi nevoie
// de header.
header('Content-Type: application/json');
 
$arr = [];
array_push($arr, [
    'id' => 1234,
    'userId' => 12,
    'date' => date('Y-m-d h:i:s'),
    'text' => 'Lorem ipsum'
]);
array_push($arr, [
    'id' => 123,
    'userId' => 13,
    'date' => date('Y-m-d h:i:s'),
    'text' => 'Lorem ipsum'
]);
array_push($arr, [
    'id' => 12,
    'userId' => 1,
    'date' => date('Y-m-d h:i:s'),
    'text' => 'Lorem ipsum'
]);

//array_push($arr, $_POST);
//echo json_encode($arr);

// Date in POST trimise in clar ca si string cu variabile:
// 'param1=1&param2=2'
/*
array_push($arr, [
    'param1' => $_POST['param1'],
    'param2' => $_POST['param2']
]);
*/
// Date in POST trimise ca si json din javascript:
// 'data=JSON.stringify({ param1: 1, param2: 2 })'
//deg($_POST);

//if (isset($_POST['data'])) {
    array_push($arr, ['data' => json_decode($_POST['data'])]);
//} 
    echo json_encode(['success' => true, 'data' => $arr]);
 
/*
Daca apar ceva probleme pe partea de server - nu sunt corect datele primite,
nu s-a putut procesa datele, acces la baza de date s.a.m.d, atunci putem trimite
un raspunsu cu succes false, iar param 'data' va putea contine un mesaj de
eroare.
De exemplu, la logare, username/email si parola trimise nu corespund nici
unui user.
 
echo json_encode(['success' => false, 'data' => 'Date incorecte']);
*/