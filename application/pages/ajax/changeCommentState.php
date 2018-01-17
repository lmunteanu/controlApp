<?php
//echo('you are in getComm');
header('Content-Type: application/json');

$commentId = $_GET['commentId'];
$status = isset($_GET['status']) ? $_GET['status'] : null;

if (empty($commentId) || !is_numeric($commentId)) 
{
   echo json_encode('invalid comment id!');
   exit;
}

$comment = new Comment($commentId);

if ($status === 'approved') 
{
   $comment->status = $status;
   $comment->save();
} 
else 
{
   $comment->status = $status;
   $comment->save();
}
echo json_encode($comment);