<?php
/***************************************
*                                      *
* User pentru test: testit@testit.com  *
*           parola: Minimum123-        *
*                                      *
****************************************/
$articlePerPage = BLOG_ARTICLE_PER_PAGE; //can be set within init.php

$p = isset($_GET['p']) ? $_GET['p'] : 1;
$ss = isset($_GET['s']) ? $_GET['s'] : ''; //escape string to be added!!!

//quick escape fix!
$conn = new DBMySql();
$conn->connect();
$s = isset($_GET['s']) ? $conn->escape($_GET['s']) : '';

$limit = ($p - 1) * $articlePerPage . ',' . $articlePerPage;

if (!$s) //if not a search
{
      //get number of articles when not searching
   $articlesCount = Article::getCount("WHERE status='published'");
   $articles = Article::getAll(sprintf(
      "WHERE status='published' ORDER BY date_published DESC LIMIT %s",
      $limit
   ));
} 
else //if this is a search
{
      //get number of articles when search is on
   $articlesCount = Article::getCount(sprintf(
      "WHERE status='published' AND `title` LIKE '%%%s%%'",
      $s
   ));
   $articles = Article::getAll(sprintf(
      "WHERE `status`='published' AND `title` LIKE '%%%s%%' ORDER BY `date_published` DESC LIMIT %s",
      $s, $limit
   ));
}
   
//get number of pages
$totalPages = ceil($articlesCount / $articlePerPage);

//avoid error if "the page is not number" or "smaller then 1" or "$p larger then total pages"
if ((!is_numeric($p)) || (intval($p) < 1) || ((intval($p) > intval($totalPages)))) { 
    $_SESSION['globalError'] = 'error: Page Not Found!';
    redirect('/index.php');
} 


//$articles = Article::getAll("WHERE status='published' ORDER BY date_published ASC");

$TEMPLATE_VARS['totalPages'] = $totalPages;
$TEMPLATE_VARS['currentPage'] = $p;
$TEMPLATE_VARS['prevPage'] = $p--;
$TEMPLATE_VARS['nextPage'] = $p++;
$TEMPLATE_VARS['articles'] = $articles;
$TEMPLATE_VARS['searchText'] = isset($_GET['s']) ? '&s=' . $_GET['s'] : '';
$TEMPLATE_VARS['templatePath'] = 'blog.php';