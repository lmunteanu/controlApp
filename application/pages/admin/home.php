<?php
$deleteMSG = "";

$articlePerPage = ADMIN_ARTICLE_PER_PAGE; //can be set within init.php

$p = isset($_GET['p']) ? $_GET['p'] : 1;
$deleteMSG = isset($_GET['deleted']) ? $_GET['deleted'] : '';

//get number of articles
$articlesCountn0 = Article::getCount(sprintf(
   'WHERE `user_id` = %u', User::getLogged()->id
));

$articlesCount = $articlesCountn0 > 0 ? $articlesCountn0 : 1;

if ($articlesCountn0 < 1) { 
    $_SESSION['globalError'] = 'You have no articles yet!';
} 

//get number of pages
$totalPages = ceil($articlesCount / $articlePerPage);

//avoid error if "the page is not number" or "smaller then 1" or "$p larger then total pages"
if (
      ((!is_numeric($p)) || (intval($p) < 1) || ((intval($p) > intval($totalPages))))
      && 
      ($articlesCount > 0) //problem if user has no articles ... redirected to admin over and over
   ) 
   { 
      $_SESSION['globalError'] = 'sorry, unavailable page';
      redirect('/admin.php');
} 

$limit = ($p - 1) * $articlePerPage . ',' . $articlePerPage;

$articles = Article::getAll(sprintf(
   'WHERE user_id = %u ORDER BY date_created DESC LIMIT %s',
   User::getLogged()->id, $limit
));


$TEMPLATE_VARS['totalPages'] = $totalPages;
$TEMPLATE_VARS['currentPage'] = $p;
$TEMPLATE_VARS['deleted'] = $deleteMSG;
$TEMPLATE_VARS['articles'] = $articles;
$TEMPLATE_VARS['templatePath'] = 'home.php';