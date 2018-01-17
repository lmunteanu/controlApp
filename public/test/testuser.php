<?php
error_reporting(E_ALL);

require_once("../../application/classes/DBMySqlInterface.php");
require_once("../../application/classes/DBMySql.php");
require_once("../../application/classes/BaseObjectInterface.php");
require_once("../../application/classes/BaseObject.php");
require_once("../../application/classes/User.php");

echo "test <br>";

echo User::$TABLE_NAME . "<br>";

$all_users = User::getAll('where type = "user"');

echo count($all_users);

var_dump($all_users);

$my_user = new User();
$admin_users = $my_user->read("type", "admin");
var_dump($admin_users);


$my_user2 = new User();
$my_user2->getBy("id",2);
var_dump($my_user2);

$my_user3 = new User();
$my_user3->getBy("id",8);
var_dump($my_user3);
$my_user3->name='testing';
$my_user3->save();
var_dump($my_user3);
//echo $my_user->name;

$my_user4 = new User();
$my_user4->name='testing3';
$my_user4->email='emails@gmail.com';
$my_user4->password='passwdss';
$my_user4->type='user';
$my_user4->date_created= date("Y-m-d H:i:s");
$my_user4->save();

var_dump($my_user4);