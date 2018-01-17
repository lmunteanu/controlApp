<?php
error_reporting(E_ALL);

require_once("../../application/classes/DBMySqlInterface.php");
require_once("../../application/classes/DBMySql.php");
require_once("../../application/classes/BaseObjectInterface.php");
require_once("../../application/classes/BaseObject.php");
require_once("../../application/classes/Comment.php");

echo "test <br>";

echo Comment::$TABLE_NAME . "<br>";

$all_comments = Comment::getAll('where article_id = 1');

echo count($all_comments);

var_dump($all_comments);

$my_comment = new Comment();
$gicu_comment = $my_comment->read("name", "gicu");
var_dump($gicu_comment);


$my_comment2 = new Comment();
$my_comment2->getBy("id",2);
var_dump($my_comment2);

$my_comment3 = new Comment();
$my_comment3->getBy("id",8);
echo "***before***";
var_dump($my_comment3);
$my_comment3->name='testing123';
$my_comment3->save();
echo "***after***";
var_dump($my_comment3);


$my_comment4 = new Comment();
$my_comment4->article_id=1;
$my_comment4->name='testing5';
$my_comment4->email='email-is@gmail.com';
$my_comment4->website='www.com';
$my_comment4->message='this is a test message';
$my_comment4->date_created= date("Y-m-d H:i:s");
$my_comment4->status='pending';
$my_comment4->save();

var_dump($my_comment4);