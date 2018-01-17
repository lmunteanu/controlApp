<?php

$errorMessage = '';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$my_article = new Article($id);

if ($my_article->id) {
   $errorMessage = "The article:  '" . $my_article->title . "' has been deleted.";
   Article::deleteById($id);
   redirect('/admin.php?page=home&deleted=' . $errorMessage);
} else {
   $errorMessage = 'Article not found!'; 
   redirect('/admin.php?page=home&deleted=' . $errorMessage);
}

$TEMPLATE_VARS['articleErrorMessage'] = $errorMessage;
$TEMPLATE_VARS['templatePath'] = 'article-delete.php';
