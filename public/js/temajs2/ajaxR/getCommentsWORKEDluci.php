<?php
//echo('you are in getComm');
header('Content-Type: application/json');

$articleId = $_GET['articleId'];

if (empty($articleId) || !is_numeric($articleId)) 
{
   echo json_encode(['data' => 'invalid article id', 'success' => false]);
   exit;
}

$comment = new Comment();

$myCommments = $comment->getAll('WHERE article_id = ' . $articleId);

echo json_encode(['data' => $myCommments, 'success' => true]);
//echo json_encode([$myCommments]);