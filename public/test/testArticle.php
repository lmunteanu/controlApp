<?php
error_reporting(E_ALL);

require_once("../../application/classes/DBMySqlInterface.php");
require_once("../../application/classes/DBMySql.php");
require_once("../../application/classes/BaseObjectInterface.php");
require_once("../../application/classes/BaseObject.php");
require_once("../../application/classes/Article.php");
require_once("../../application/functions.php");

echo "test <br>";

echo Article::$TABLE_NAME . "<br>";
$stringToShort = "cineva merge la piata si vine inapoi si apoi iar asa si asa";
$stringToShort2 = "cineva merge";
echo shortArticle($stringToShort2,10) . "<br>";

echo shortArticle2($stringToShort2,10);

var_dump(Article::countIt('published')); 

echo Article::countIt('published')[0]['total'];
/*
$all_articles = Article::getAll('WHERE `user_id` = 1');

echo count($all_articles);

var_dump($all_articles);

$my_article = new Article();
$gicu_article = $my_article->read("user_id", 3);
var_dump($gicu_article);

$theArticles = Article::deleteById(111);
*/

/*
$my_article2 = new Article();
$my_article2->getBy("id",2);
var_dump($my_article2);

$my_article3 = new Article();
$my_article3->getBy("id",10);
echo "***before***";
var_dump($my_article3);
$my_article3->title='testing123';
$my_article3->save();
echo "***after***";
var_dump($my_article3);


$my_article4 = new Article();
$my_article4->user_id=1;
$my_article4->title='testingX';
$my_article4->description='the test has been made2';
$my_article4->date_created= date("Y-m-d H:i:s");
$my_article4->date_published= date("Y-m-d H:i:s");
//$my_article4->date_updated= date("Y-m-d H:i:s"); //removed its null anyway
$my_article4->status='published';
$my_article4->save();

var_dump($my_article4);
*/