<?php
//echo('you are in getComm');
header('Content-Type: application/json');

$articleId = $_GET['articleId'];
$filtered = isset($_GET['filter']) ? $_GET['filter'] : null;

if (empty($articleId) || !is_numeric($articleId)) 
{
   echo json_encode('invalid article id!');
   exit;
}
$comment = new Comment();

if ($filtered === null) 
{
   $myCommments = $comment->getAll('WHERE article_id = ' . $articleId);
} 
else 
{
   $myCommments = $comment->getAll('WHERE `article_id` = ' . $articleId . ' AND `status` = \'approved\'');
}
echo json_encode($myCommments);