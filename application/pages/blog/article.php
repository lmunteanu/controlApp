<?php

$errorMessage = '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$my_article = new Article($id);

$new_comment = new Comment();

if (isPost()) {
   $new_comment->article_id = $my_article->id;
   //used to refill the comment form on validation error
   $new_comment->name = $_POST['comment-name'];
   $new_comment->email = $_POST['comment-email'];
   $new_comment->message = $_POST['content'];
   if (empty($_POST['comment-name'])) { //check if username is null
      $errorMessage = 'Name field can\'t be empty';
   } elseif (!isEmail($_POST['comment-email'])) {
      $errorMessage = 'The email address is not valid';
   } elseif (empty($_POST['content'])) { //check if password is null
      $errorMessage = 'Comment content can\'t be empty';
   } else { //all seems to be find, lets save it!
      $new_comment->name = $_POST['comment-name'];
      $new_comment->email = $_POST['comment-email'];
      $new_comment->message = $_POST['content'];
      $new_comment->website = 'none';
      $new_comment->date_created = getDateMysql();
      $new_comment->status = 'pending';
      $new_comment->save();
      //used to empty the comment form!
      $new_comment->name = '';
      $new_comment->email = '';
      $new_comment->message = '';
   }
}


$TEMPLATE_VARS['validationMessage'] = $errorMessage;
$TEMPLATE_VARS['comment'] = $new_comment;
$TEMPLATE_VARS['article'] = $my_article;
$TEMPLATE_VARS['templatePath'] = 'article.php';


